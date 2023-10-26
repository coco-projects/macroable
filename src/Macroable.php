<?php

    declare(strict_types = 1);

    namespace Coco\macroable;

    use BadMethodCallException;
    use Closure;

trait Macroable
{
    /**
     * @var array
     */
    protected static array $methods = [];

    /**
     * @param string   $name
     * @param callable $macro
     *
     * @return void
     */
    public static function injectMethod(string $name, callable $macro): void
    {
        static::$methods[$name] = $macro;
    }

    /**
     * @param string $name
     *
     * @return bool
     */
    public static function hasMethod(string $name): bool
    {
        return isset(static::$methods[$name]);
    }

    /**
     * @param $method
     * @param $parameters
     *
     * @return mixed
     */
    public static function __callStatic($method, $parameters)
    {
        if (!static::hasMethod($method)) {
            throw new BadMethodCallException("Method {$method} does not exist.");
        }

        $macro = static::$methods[$method];

        if ($macro instanceof Closure) {
            return call_user_func_array($macro->bindTo(null, static::class), $parameters);
        }

        return call_user_func_array($macro, $parameters);
    }

    /**
     * @param $method
     * @param $parameters
     *
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        if (!static::hasMethod($method)) {
            throw new BadMethodCallException("Method {$method} does not exist.");
        }

        $macro = static::$methods[$method];

        if ($macro instanceof Closure) {
            return call_user_func_array($macro->bindTo($this, static::class), $parameters);
        }

        return call_user_func_array($macro, $parameters);
    }
}
