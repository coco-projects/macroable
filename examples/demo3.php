<?php

    require '../vendor/autoload.php';


    class A
    {
        private int        $val  = 1;
        private static int $val2 = 3;

        use \Coco\macroable\Macroable;
    }


    class B
    {
        public static function hello()
        {
            echo 'hello_B';
        }
    }

    $obj = new A();
    $obj::injectMethod('greet', 'B::hello');

    echo $obj->greet();
    echo PHP_EOL;
    echo $obj::greet();