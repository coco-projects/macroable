
# Macroable

##### Provide a trait that dynamically injects a specified method or closure into a specified object during runtime execution.

---

### Here's a quick example:

```php
<?php

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


```

## Installation

You can install the package via composer:

```bash
composer require coco-project/macroable
```

## Usage

>For more examples, please refer to the "examples" folder.

You can add a new method to a class using `injectMethod`:

```php
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

```


## Testing

``` bash
composer test
```

## License

---

The MIT License (MIT).
