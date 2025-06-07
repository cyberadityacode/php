# Mastering Arrays in PHP (Standalone)

## Fundamentals

1. **Create Indexed Arrays**

- Store names of 5 fruits.

- Print each fruit using a loop.

- Find total elements using count().

2. **Create Associative Arrays**

- Create an array storing a user's name, email, and age.
- Update the age.
- Add a new key location.
- Loop through and display each key and value.

* ucfirst($key) makes the first letter of each key uppercase for better formatting.

3. **Multidimensional Arrays**

- Create an array of 3 users (each with name, age, email).
- Display all user names using nested loops.
- Write a function to search a user by email and return their full data.

4. **Array Functions Practice**

Use these PHP functions on different examples:

- **array_push** add elements at the end of an array(append)
- **array_unshift** add elements at the beginning of an array (prepend).

- **array_pop** - removes the last element of an array.
- **array_shift** - removes the first element of an array.
- **array_merge** - merges two or more arrays

If the input arrays have the same string keys, then the later value will overwrite the earlier one.

If the arrays contain numeric keys, the values are appended and the keys are reindexed.

> Use + (array union) if you want to preserve keys and not overwrite values:

- **array_merge_recursive** -

Merges arrays recursively.

When two arrays have the same string key, both values are kept and grouped into an array.

Note: When keys collide, the values are wrapped in an array rather than being overwritten or merged deeply.

- **array_slice** - is used to extract a portion of an array without modifying the original array.

- **array_splice** - is used to extract a portion of an array by modifying the original array.

- **in_array** - is used to check if a value exists in an array.

- **array_keys** - function returns all the keys from an array.

- **array_values** - function returns all the values from an array, re-indexed numerically from 0.

- **array_filter** - function filters elements of an array using a callback function, returning only the elements that pass the test.

- array_filter(array $array, ?callable $callback = null, int $mode = 0): array

- **array_map** -function is used to apply a callback function to each element of one or more arrays and return a new array of the results.

array_map(callable $callback, array $array1, array ...$arrays): array
$callback – A function to apply to each element.
$array1, ...$arrays – One or more arrays to process in parallel.

- **array_reduce** reduces an array to a single value by repeatedly applying a callback function.

array_reduce(array $array, callable $callback, mixed $initial = null): mixed

$array – The input array.

$callback – A function with 2 parameters:

$carry (the running total/result so far)

$item (the current array element)

$initial – (optional) Initial value for the carry/result.

---

# Challenge01

You have a list of products. Each product has a name and a price.
You want to:

Filter out products with invalid or missing prices

Apply tax (e.g., 10%) to each price

Calculate the total cost after tax
Write a function to add a new product or update quantity if it exists.
Write a function to remove a product by name.

