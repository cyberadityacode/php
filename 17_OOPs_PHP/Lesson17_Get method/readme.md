# What is __get() in PHP?

The __get() is a magic method in PHP that is automatically called when trying to access a non-existing or inaccessible (e.g., private/protected) property of an object.

```php
public function __get(string $name)
```

