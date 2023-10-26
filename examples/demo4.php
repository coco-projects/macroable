<?php

    require '../vendor/autoload.php';


    class A
    {
        private int        $val  = 1;
        private static int $val2 = 3;

        use \Coco\macroable\Macroable;
    }


    class C
    {
        public function hello()
        {
            echo 'hello_C';
        }
    }


    $obj = new A();
    $obj::injectMethod('greet', [
        new C(),
        'hello',
    ]);

    echo $obj->greet();
    echo PHP_EOL;
    echo $obj::greet();