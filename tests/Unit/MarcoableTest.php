<?php

    declare(strict_types = 1);

    namespace Coco\Tests\Unit;

    use PHPUnit\Framework\TestCase;

final class MarcoableTest extends TestCase
{
    public function testA()
    {
        $obj = new A();

        $obj::injectMethod('add', function () {
            return $this->val + 10;
        });

        $result = $obj->add();

        $this->assertEquals($result, 11);
    }

    public function testB()
    {
        $obj = new A();

        $obj::injectMethod('add', function () {
            return static::$val2 + 10;
        });

        $result = $obj::add();

        $this->assertEquals($result, 12);
    }

    public function testC1()
    {
        $obj = new A();

        $obj::injectMethod('greet', [
            new B(),
            'hello1',
        ]);

        $result = $obj->greet();

        $this->assertEquals($result, 'hello_111');
    }


    public function testD1()
    {
        $obj = new A();

        $obj::injectMethod('greet', [
            new B(),
            'hello1',
        ]);

        $result = $obj::greet();

        $this->assertEquals($result, 'hello_111');
    }

    public function testC2()
    {
        $obj = new A();

        $obj::injectMethod('greet', [
            new B(),
            'hello2',
        ]);

        $result = $obj->greet();

        $this->assertEquals($result, 'hello_222');
    }


    public function testD2()
    {
        $obj = new A();

        $obj::injectMethod('greet', [
            new B(),
            'hello2',
        ]);

        $result = $obj::greet();

        $this->assertEquals($result, 'hello_222');
    }

    public function testE()
    {
        $obj = new A();

        $obj::injectMethod('greet', 'Coco\Tests\Unit\B::hello2');

        $result = $obj::greet();

        $this->assertEquals($result, 'hello_222');
    }

    public function testF()
    {
        $this->expectException(\BadMethodCallException::class);
        $obj = new A();

        $obj::injectMethod('greet', 'Coco\Tests\Unit\B::hello2');

        $result = $obj->greet1();
    }

    public function testG()
    {
        $this->expectException(\BadMethodCallException::class);

        $obj = new A();

        $obj::injectMethod('greet', 'Coco\Tests\Unit\B::hello2');
        $result = $obj::greet1();
    }
}
