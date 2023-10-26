<?php

    require '../vendor/autoload.php';


    class A
    {
        private int        $val  = 1;
        private static int $val2 = 2;

        use \Coco\macroable\Macroable;
    }

    $obj = new A();

    $obj::injectMethod('add', function() {
        return static::$val2 + 10;
    });

    echo $obj::add();