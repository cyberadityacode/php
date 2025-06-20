# __sleep() Magic Method in PHP

The __sleep() magic method is called automatically when an object is serialized using serialize().

The __sleep() magic method is called automatically when an object is serialized using serialize().

```php
public function __sleep(): array
```

It must return an array of property names that should be serialized.


> In PHP, serialize() is a function that converts a value (like an array or object) into a storable string representation.

##  Why Use serialize()?

Serialization is used to:

1. Store complex data (like arrays or objects) in places that can only hold strings, e.g., files, databases, or sessions.

2. Send data across networks or APIs in a consistent format.

3. Temporarily freeze and later restore data structures.

```php
string serialize(mixed $value)
```

- $value: Any value you want to convert (array, object, etc.)

- Returns: A string representation

```php
$data = ["name" => "aditya", "age" => 31];

$serialized = serialize($data);
echo $serialized;
//a:2:{s:4:"name";s:6:"aditya";s:3:"age";i:31;}
That string encodes the original array structure.
```

## unserialize()

To convert it back into the original array:

```php
$original = unserialize($serialized);
print_r($original);

```

> Serialized data is PHP-specific (not portable across languages).

For cross-language data storage or transmission, use JSON instead:
json_encode() / json_decode()


