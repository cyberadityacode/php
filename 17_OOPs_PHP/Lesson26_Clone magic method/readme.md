# \_\_clone() Magic Method in PHP

The \_\_clone() magic method in PHP is automatically invoked when an object is cloned using the clone keyword.

## Purpose

It allows you to:

- Customize how an object is cloned.

- Deep-copy internal (nested) objects.

- Reset or adjust properties after cloning.

```php

public function __clone(): void
```

## Real-World Use Cases

 1. Deep Copy of Objects
If a property is an object, PHP’s default clone performs shallow copy (the nested object is shared). Use __clone() to clone it deeply.

## Aditya's Note

When we clone objects using clone keyword, it easily copies properties and methods of the refered object, but If we had used objects from another class it won't clone them. i.e, nested cloning of the another class object is not performed using simple clone.


