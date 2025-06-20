# __wakeup() Magic Method in PHP

The __wakeup() magic method is automatically called when an object is restored using unserialize().

## Purpose
It is used to:

- Reinitialize resources (like DB connections, file handles).

- Prepare the object to be usable again after deserialization.

```php
public function __wakeup(): void
```

##  Real-World Use Cases

1. Re-establish Database Connections
You can skip serializing a live DB connection in __sleep(), and reestablish it in __wakeup():