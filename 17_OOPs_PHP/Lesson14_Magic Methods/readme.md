# Magic Methods in PHP

In PHP, **magic methods** are special methods that start with double underscores (`__`) and are automatically invoked by PHP in certain situations. They **"magically"** respond to specific actions or behaviors like object creation, method calls, serialization, or debugging.

---

##  Common Magic Methods in PHP

| Magic Method     | Trigger / Purpose                                             |
| ---------------- | ------------------------------------------------------------- |
| `__construct()`  | Called when an object is created (constructor)                |
| `__destruct()`   | Called when an object is destroyed (destructor)               |
| `__call()`       | Called when invoking inaccessible/non-existent methods        |
| `__callStatic()` | Called when invoking inaccessible/non-existent static methods |
| `__get()`        | Triggered when accessing an inaccessible property             |
| `__set()`        | Triggered when setting a value to an inaccessible property    |
| `__isset()`      | Called by `isset()` on inaccessible properties                |
| `__unset()`      | Called by `unset()` on inaccessible properties                |
| `__toString()`   | Called when an object is treated as a string                  |
| `__invoke()`     | Called when an object is called as a function                 |
| `__sleep()`      | Called before `serialize()`                                   |
| `__wakeup()`     | Called during `unserialize()`                                 |
| `__clone()`      | Called when an object is cloned                               |
| `__debugInfo()`  | Used by `var_dump()` to customize output                      |

---

##  Example of Some Common Magic Methods

### 1. `__construct()` and `__destruct()`

```php
class Person {
    public function __construct() {
        echo "Object created\n";
    }

    public function __destruct() {
        echo "Object destroyed\n";
    }
}

$p = new Person(); // Output: Object created
```

---

### 2. `__get()` and `__set()`

```php
class Demo {
    private $data = [];

    public function __get($name) {
        return $this->data[$name] ?? "Property '$name' not found";
    }

    public function __set($name, $value) {
        $this->data[$name] = $value;
    }
}

$obj = new Demo();
$obj->title = "PHP Magic";
echo $obj->title; // Output: PHP Magic
```

---

### 3. `__call()`

```php
class Magic {
    public function __call($name, $arguments) {
        echo "Trying to call '$name' with arguments: " . implode(', ', $arguments);
    }
}

$m = new Magic();
$m->sayHello("World"); // Output: Trying to call 'sayHello' with arguments: World
```

---

### 4. `__toString()`

```php
class Book {
    public function __toString() {
        return "Book object";
    }
}

$b = new Book();
echo $b; // Output: Book object
```

---

##  Summary

* Magic methods provide powerful **hooks** into how your objects behave.
* They are widely used in **OOP, frameworks (like Laravel, Symfony)**, and **libraries** to handle dynamic method/property access or lifecycle events.

---
