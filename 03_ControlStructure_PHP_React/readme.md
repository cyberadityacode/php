# Control Structure in PHP

> Match expression

Introduced in PHP 8.0 (2020),which is indeed similar to a switch statement—but more powerful, concise, and type-safe.

## Basic Syntax of match in PHP:

```php
$result = match($value) {
    condition1 => result1,
    condition2 => result2,
    default => defaultResult,
};
```

## Advantages over switch:

```

| Feature               | `switch`            | `match`                          |
| --------------------- | ------------------- | -------------------------------- |
| Requires `break`?     | ✅ Yes               | ❌ No                             |
| Returns a value?      | ❌ No (needs manual) | ✅ Yes                            |
| Type-safe comparison? | ❌ Loose (`==`)      | ✅ Strict (`===`)                 |
| Exhaustiveness check? | ❌ No                | ✅ Fails if no match & no default |

```


## Example: With strict type check

```php
<?php
$value = 1;

$result = match($value) {
    1 => "One (integer)",
    "1" => "One (string)",  // Will NOT match because of strict comparison
};
echo $result;
?>


OUTPUT 

One (integer)
```

## Notes:
- match is an expression, not a statement—so it returns a value.

- All cases must be covered, or you must provide a default clause—or it will throw an error.

- You may apply multiple condition within same statement.

Example:

```php
   $message = match ($day) {
        "Monday", "Tuesday" => "Yeah...Start of the Week!",
        "Friday" => "Almost Weekend!",
        "Sunday" => "Rest Day." ,
        default => "$day, Just another amazing day!",
    };
```


# Key Difference between match and switch

```
| Feature                      | `switch`                     | `match`                        |
| ---------------------------- | ---------------------------- | ------------------------------ |
| **Syntax length**            | More verbose (break needed)  | More concise                   |
| **Type comparison**          | Loose (`==`)                 | Strict (`===`)                 |
| **Returns value?**           | No (must manually assign)    | Yes (returns directly)         |
| **Fallthrough risk?**        | Yes, if `break` is forgotten | No fallthrough                 |
| **Exhaustiveness required?** | No                           | Yes, or you must use `default` |
```

## Type Strictness Demo

```php
<?php
$value = "1"; // string

$resultSwitch = "";
switch ($value) {
    case 1: $resultSwitch = "Integer 1"; break;
    case "1": $resultSwitch = "String 1"; break;
}
echo "Switch result: $resultSwitch\n"; // "Integer 1" (matches loosely)

$resultMatch = match($value) {
    1 => "Integer 1",
    "1" => "String 1",
};
echo "Match result: $resultMatch\n"; // "String 1" (matches strictly)
?>


```
# TASK - User Role-Based Dashboard

Build a simple interface where a user selects a role (admin, editor, or viewer) from a dropdown in React. Based on the selected role:

- React will send a numeric code to the PHP backend.

- The backend will use a match expression to return a role-based welcome message.

- React will display the response.

## Components
* **Frontend (React)**

- Dropdown for role selection.

- switch statement to convert selected string role → numeric code.

- Sends the code to the backend using fetch (POST).

- Displays the response message from PHP.

* **Backend (PHP)**

- Accepts POST request with a role code.

- Uses match to return the appropriate message.

