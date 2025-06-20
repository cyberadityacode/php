# Magic Constants in PHP

In PHP, **magic constants** are predefined constants that change depending on where they are used. They are called **"magic"** because their value is not fixed — it changes depending on the context in which they're used.

---

##  PHP Magic Constants — Quick Overview

| Constant        | Description                           |
| --------------- | ------------------------------------- |
| `__LINE__`      | Current line number of the file       |
| `__FILE__`      | Full path and filename of the file    |
| `__DIR__`       | Directory of the file                 |
| `__FUNCTION__`  | Name of the function                  |
| `__CLASS__`     | Name of the class                     |
| `__TRAIT__`     | Name of the trait                     |
| `__METHOD__`    | Name of the method (class + function) |
| `__NAMESPACE__` | Name of the current namespace         |

---

##  Example and Real-World Use Cases

### 1.  `__FILE__` – Full Path of Current File

```php
echo __FILE__;
```

 **Use case:** Logging or debugging where the script is located.

 **Example in real world:**

```php
file_put_contents('log.txt', "Error in " . __FILE__);
```

---

### 2.  `__DIR__` – Directory Path of the File

```php
echo __DIR__;
```

 **Use case:** Including other files relative to current directory.

🔧 **Example:**

```php
require_once __DIR__ . '/config.php';
```

---

### 3. `__LINE__` – Current Line Number

```php
echo __LINE__;
```

 **Use case:** Debugging with line reference.

 **Example:**

```php
echo "Debug at line " . __LINE__;
```

---

### 4.  `__FUNCTION__` – Current Function Name

```php
function test() {
    echo __FUNCTION__;
}
test(); // Output: test
```

 **Use case:** Logging function calls or errors.

 **Example:**

```php
function processUser() {
    logError("Failed in " . __FUNCTION__);
}
```

---

### 5.  `__CLASS__` – Current Class Name

```php
class MyClass {
    public function showClass() {
        echo __CLASS__;
    }
}
$obj = new MyClass();
$obj->showClass(); // Output: MyClass
```

 **Use case:** Logging class-based events.

---

### 6.  `__METHOD__` – Class + Function Name

```php
class MyClass {
    public function myMethod() {
        echo __METHOD__; // Output: MyClass::myMethod
    }
}
```

**Use case:** Debugging or logging which method is executing.

---

### 7.  `__NAMESPACE__` – Current Namespace

```php
namespace MyApp;

echo __NAMESPACE__; // Output: MyApp
```

**Use case:** When dynamically resolving classes or debugging large codebases with many namespaces.

---

## Real-World WordPress Example

### Plugin Path Using `__FILE__` and `__DIR__`

```php
// In a plugin main file
define('MY_PLUGIN_PATH', plugin_dir_path(__FILE__));
define('MY_PLUGIN_URL', plugin_dir_url(__FILE__));

include_once(MY_PLUGIN_PATH . 'includes/my-helper.php');
```

### Logging with `__METHOD__`

```php
class Logger {
    public static function log($message) {
        error_log(__METHOD__ . " - $message");
    }
}
Logger::log('Plugin initialized');
```

---

##  Summary

| Magic Constant            | Common Use                                          |
| ------------------------- | --------------------------------------------------- |
| `__FILE__`                | Absolute file path (used in includes, plugin setup) |
| `__DIR__`                 | Directory path (for relative file operations)       |
| `__LINE__`                | Debugging line numbers                              |
| `__FUNCTION__`            | Track function calls                                |
| `__CLASS__`, `__METHOD__` | Class/method debugging/logging                      |
| `__NAMESPACE__`           | Namespace resolution in modular apps                |

---

