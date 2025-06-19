# Auoload method in PHP

In older versions of PHP, the __autoload() magic method was used to automatically load class definitions from files when a class was used but not yet included with include or require.

```php
function __autoload($className) {
    include $className . '.php';
}
```

> Note:
__autoload() is deprecated as of PHP 7.2.0 and removed in PHP 8.0.0.

- It is replaced by the spl_autoload_register() function, which is more flexible and allows multiple autoloaders.

