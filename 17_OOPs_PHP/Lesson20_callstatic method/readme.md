# __callStatic() method

The __callStatic() method in PHP is a magic method that is triggered when invoking inaccessible or non-existent static methods in a class.

```php
public static function __callStatic(string $name, array $arguments)
```
- $name: The name of the method being called.

- $arguments: An enumerated array containing the parameters passed to the method.



