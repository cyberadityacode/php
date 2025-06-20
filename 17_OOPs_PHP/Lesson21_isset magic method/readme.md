# __isset() Magic method

The __isset() magic method in PHP is invoked when you use the isset() function (or empty()) on inaccessible or non-existing properties of an object. It's one of PHP’s magic methods that allows developers to define behavior for dynamic or protected/private property access.

```php
__isset(string $name): bool
```

- $name – The name of the property being checked.

- Returns – true or false, depending on whether the property is considered set.

##  When is __isset() called?

It's called when:

* The property does not exist, or

* The property is inaccessible (private or protected),

* And you try to check it using isset() or empty().