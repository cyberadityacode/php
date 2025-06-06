# Form integration of PHP with React

> Frontend

## React JS

In handleSubmit async function, within try block I have requested my PHP Server file formHandler.php. It works with POST method and 2 essential properties to delivery request. (Headers which contains Content-type and body which create new instance of URLSearchParams(formData)).

```jsx
const res = await fetch(
  "http://localhost/php/02_Form_PHP_React/backend/formHandler.php",
  {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    body: new URLSearchParams(formData),
  }
);
```

This Line

```jsx
body: new URLSearchParams(formData);
```

is used to convert a Javascript Object (like my formData) into a URL encoded string, which looks like this:

```
name=aditya&email=adityadubey793@gmail.com&age=31&favouritepet=cow
```

### Why this is needed?

When you're sending data using:

```
Content-Type: application/x-www-form-urlencoded
```

the server (PHP) expects data in the format like:

```
key1=value1&key2=value2&key3=value3 and so on...
```

## Example in Practice

My formData object is:

```
{
    username: "aditya",
    email: "adityadubey793@gmail.com",
    age: 31,
    favouritepet: "cow",
  }

```

Then:

```
new URLSearchParams(formData).toString()
```

Will Produce

```
"username=aditya&email=adityadubey793@gmail.com&age=31&favouritepet=cow"
```

Which is exactly what PHP expects in $\_POST. (inside formHandler.php (at backend))

## How PHP Reads It

PHP’s $\_POST["username"] gets aditya, and $\_POST["age"] gets 31 — just like from a traditional HTML form submission.

# Alternative: Using FormData

If I use:

```jsx
const formData = new FormData();
formData.append("name", "aditya");
formData.append("email", "adityadubey793@gmail.com");
```

Then I must not set the Content-Type header manually — the browser will handle it.

To Suffice:

new URLSearchParams(formData):

- Converts JS object → URL-encoded string

- Works with Content-Type: application/x-www-form-urlencoded

- Perfect for sending data to PHP via POST

FormData is best for file uploads or mixed data.

# Amazing Error while Creating this App.

```
Access to fetch at 'http://localhost/php/02_Form_PHP_React/backend/formHandler.php' from origin 'http://localhost:5173' has been blocked by CORS policy: No 'Access-Control-Allow-Origin' header is present on the requested resource.
```

You're seeing this error because CORS (Cross-Origin Resource Sharing) is blocking the request from your React app (on port 5173) to your PHP backend (on port 80 or another port via localhost/php/...).

## What’s Happening

Your frontend: http://localhost:5173 (React dev server)

Your backend: http://localhost/php/... (PHP via XAMPP or Apache)

These are considered different origins because of the different ports.

# How to Fix It (Add CORS Headers in PHP)

In your PHP file (formHandler.php), add the following at the top, before any output:

```php
<?php
// Allow requests from any origin (for development only)
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

// If this is a preflight OPTIONS request, return 200 and exit
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

```

## Why This Works?

- Access-Control-Allow-Origin: \* allows any domain (like localhost:5173) to access the backend.

- OPTIONS method is used by browsers before sending a POST (this is called a preflight request).

Without this, the browser blocks your fetch request for security reasons.

# Note: In Production

In production, never use \* for Access-Control-Allow-Origin. Instead, specify your allowed domain:

```php
header("Access-Control-Allow-Origin: https://yourdomain.com");
```

---

In the handleSubmit async function, I am getting response from my server

```jsx
const text = await res.text();
```

That line reads the raw response from PHP as plain text, which can include HTML.

## But how do you display HTML properly?

In React, by default, it treats all strings as plain text, not HTML (for security reasons).

To render it as HTML in your JSX:

```jsx
<div dangerouslySetInnerHTML={{ __html: response }} />
```

## Warning

dangerouslySetInnerHTML should only be used when:

- You trust the HTML source (like your own PHP server).

- You sanitize any user-generated input on the server to prevent XSS (Cross-Site Scripting).

Final Code

```jsx
<p>Server Response:</p>
<div dangerouslySetInnerHTML={{ __html: response }} />

```

This will render your PHP-generated HTML properly on the page.

# Backend PHP

> Important tip

**htmlspecialchar()**

Converts all applicable characters to their HTML entity equivalents, including accented letters, symbols, and currency signs.
It is used for security purpose to prevent application from HTML Injection/XSS Attacks.

```php
echo htmlspecialchars("<b>hello</b>");
// Output: &lt;b&gt;hello&lt;/b&gt;
```

**htmlentities()**
Converts all applicable characters to their HTML entity equivalents, including accented letters, symbols, and currency signs.

```php
echo htmlentities("© 2025");
// Output: &copy; 2025
```
