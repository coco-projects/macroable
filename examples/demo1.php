<?php

    require '../vendor/autoload.php';


    class A
    {
        private int $val = 1;

        use \Coco\macroable\Macroable;
    }

    $obj = new A();

    $obj::injectMethod('add', function($num) {
        return $this->val + $num;
    });

    echo $obj->add(10);  //11
