# get functions in PHP

**built-in "get\_\*" functions** in PHP that retrieve metadata about classes, objects, methods, properties, etc.

Here's a list of useful `get_*` functions in PHP, particularly for **object-oriented programming**, along with real-world use cases for each.

---

###  List of `get_*` Functions in PHP (OOP Context)

| Function                    | Description                                                 | Real-world Use Case                                                    |
| --------------------------- | ----------------------------------------------------------- | ---------------------------------------------------------------------- |
| `get_class()`               | Returns the name of the class of an object                  | Debugging, logging, or dynamically handling object types               |
| `get_parent_class()`        | Returns the name of the parent class of an object or class  | Useful for checking inheritance                                        |
| `get_class_methods()`       | Returns an array of method names for a class                | Used in reflection, auto-documentation, or dynamically calling methods |
| `get_class_vars()`          | Returns default properties of a class                       | Inspecting class definitions (not instance values)                     |
| `get_object_vars()`         | Returns accessible non-static properties of an object       | Serialization, debugging, or templating systems                        |
| `get_called_class()`        | Returns the class name from where a static method is called | Late static binding and static factory patterns                        |
| `get_declared_classes()`    | Returns all declared classes                                | Class loaders, framework-level logic                                   |
| `get_declared_interfaces()` | Returns all declared interfaces                             | Used by frameworks or tools to register implementations                |
| `get_declared_traits()`     | Returns all declared traits                                 | Useful for checking trait usage in large apps                          |
| `gettype()`                 | Returns the type of a variable                              | Used for validation and debugging                                      |
| `get_resource_type()`       | Returns type of a resource (e.g., `curl`, `gd`)             | Helps when managing streams or file handlers                           |
| `get_defined_vars()`        | Returns all defined variables in current scope              | Debugging and template engines                                         |
| `get_defined_functions()`   | Returns all defined functions                               | Meta-programming, debugging tools                                      |
| `get_defined_constants()`   | Returns all defined constants                               | Useful for debugging, logging, and exposing app config                 |

---

### Real-World Examples

#### 1. `get_class()` – Get class name of an object

```php
class User {}
$user = new User();

echo get_class($user);  // Outputs: User
```

 **Use Case**: Useful in debugging or writing polymorphic logic.

---

#### 2. `get_class_methods()` – Get all methods of a class

```php
class Product {
    public function save() {}
    public function delete() {}
}

print_r(get_class_methods('Product'));
```

 **Use Case**: Dynamic method invocation or API auto-documentation tools.

---

#### 3. `get_parent_class()` – Inheritance check

```php
class Animal {}
class Dog extends Animal {}

echo get_parent_class(new Dog());  // Outputs: Animal
```

 **Use Case**: Logging object hierarchies, enforcing architecture rules.

---

#### 4. `get_object_vars()` – Get object’s public properties

```php
class Book {
    public $title = "1984";
    public $author = "Orwell";
}
$book = new Book();

print_r(get_object_vars($book));
```

 **Use Case**: JSON serialization, templating systems, custom serializers.

---

#### 5. `get_called_class()` – Late static binding

```php
class A {
    public static function who() {
        echo get_called_class(); // Output: B if called by B
    }
}
class B extends A {}

B::who();  // Outputs: B
```

 **Use Case**: Static factories, polymorphic static methods.

---

###  Summary

These `get_*` functions are extremely helpful for:

* **Debugging**
* **Reflection and dynamic programming**
* **Framework development**
* **Templating and serialization**
* **Static analysis and auto-documentation**

---

