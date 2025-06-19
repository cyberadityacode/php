# __call() magic Method

In PHP, the __call() magic method is invoked automatically when you try to call an undefined or inaccessible method on an object.

```php
public function __call($name, $arguments)
```

- $name: Name of the method being called.

- $arguments: Array of arguments passed to the method.

## Real-World Example

Imagine you’re building a dynamic API client, where method names represent API actions, but those methods aren’t explicitly defined.

> Important Notes

* Only works for non-static method calls.

* For undefined static method calls, use __callStatic() instead.

* Overusing __call() can make debugging harder; use it wisely.