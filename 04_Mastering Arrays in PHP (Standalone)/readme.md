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




, array_slice, in_array, array_keys, array_values, array_filter, array_map
