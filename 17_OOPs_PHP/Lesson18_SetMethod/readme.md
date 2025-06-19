#  What is __set() in PHP?

The __set() magic method in PHP is automatically invoked when:

You try to assign a value to an inaccessible or non-existent property of an object.

```php
public function __set(string $name, mixed $value): void
```

Pivotal Use Case 

* Input Validation or Type Casting 
You can intercept the value before it's saved
Check inputValidationTypeCasting.php

* Dynamic Configuration/Settings System

