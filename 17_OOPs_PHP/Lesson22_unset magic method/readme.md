# __unset() magic method

The __unset() magic method in PHP is triggered when you use the unset() function on an inaccessible (private or protected) or non-existent property of an object.

```php
public function __unset(string $name): void
```

