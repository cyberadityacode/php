# Destruct Method

In PHP, the __destruct() method is a magic method that is automatically called when an object is destroyed or goes out of scope. It’s typically used for cleanup operations, such as closing file handles, releasing resources, or saving state.

```php
class MyClass {
    function __destruct() {
        // cleanup code here
        echo "Object is being destroyed";
    }
}

```
When the script ends or the object is no longer referenced, PHP automatically calls the __destruct() method.

## Real-World Use Cases of __destruct()

1. Closing a Database Connection
2. Writing to a Log File
3. Releasing External Resources (e.g., API handles, sockets)
4. Authentication tokens/sessions

### Key Points:
- You don’t call __destruct() directly.

- PHP automatically invokes it at the end of the script or when the object is explicitly unset().

- Great for resource management and preventing memory/resource leaks.

