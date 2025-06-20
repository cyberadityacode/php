# __toString() Magic Method in PHP

The __toString() magic method is automatically called when an object is treated as a string, for example:

- Echoing an object: echo $obj;

- Casting to string: (string) $obj

```php
public function __toString(): string
```

##  Real-World Use Cases

1. Logging and Debugging
You can convert objects into readable string formats for logs or error messages:

2. Representing Database Models
For simple model objects, it’s useful for displaying a meaningful string when echoed:


> Returning non-string values from __toString() will cause fatal errors.