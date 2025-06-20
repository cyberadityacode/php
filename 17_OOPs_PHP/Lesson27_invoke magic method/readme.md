# __invoke() magic method

The __invoke() magic method in PHP is called when an object is used as a function. It allows objects to be "invokable" like a regular function.

```php
public function __invoke($arg1, $arg2, ...) {
    // logic here
}

```
## Real-World Meaning
You can define what should happen when the object is "called" like a function — typically used in:

- Function-like behavior with state

- Dependency Injection

- Closures or callbacks

- Middleware systems

Command pattern

## What is a Callback Handler?

A callback in PHP is a function or method passed to another function to be executed later.

A callback handler using __invoke() means you’re using an object as a function. This allows the object to:

1. Maintain internal state

2. Use constructor dependencies

3. Behave like a regular function (but be more powerful)

