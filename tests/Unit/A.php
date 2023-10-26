<?php

    namespace Coco\Tests\Unit;

class A
{
    private int $val = 1;
    private static int $val2 = 2;

    use \Coco\macroable\Macroable;
}
