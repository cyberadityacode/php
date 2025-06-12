✅ Perfect plan! Starting with **JWT Auth using React Router + local state** gives you a solid foundation. Then we’ll level up to the **Redux Toolkit version** for larger, scalable apps.

---

## 🌟 Phase 1: JWT Auth with React Router + Local State

We'll use:

* **React Router** for route handling & protection
* **Local state + `localStorage`** for login persistence
* **PHP backend** to issue and verify JWTs

---

### 🔐 Flow Overview

```
[User Login Form]
   ↓
[POST: /login.php]
   ↓
[JWT Token Issued]
   ↓
[Store in localStorage]
   ↓
[Send token with requests]
   ↓
[Access protected routes]
```

---

## 🧱 Step-by-Step Guide – Phase 1

### ✅ 1. Database: `users` table (already done)

### ✅ 2. Install Frontend Packages

```bash
npm create vite@latest jwt-auth-app --template react
cd jwt-auth-app
npm install react-router-dom axios
```

---

### ✅ 3. Backend - PHP JWT Setup

**Install Firebase JWT via Composer** (on server):

```bash
composer require firebase/php-jwt
```

### 🔐 `login.php`

```php
<?php
require 'vendor/autoload.php';
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

header("Content-Type: application/json");
require_once "dbh.inc.php";

$data = json_decode(file_get_contents("php://input"), true);
$email = $data["email"];
$password = $data["password"];

$stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if ($user && password_verify($password, $user["password"])) {
    $payload = [
        "user_id" => $user["id"],
        "username" => $user["username"],
        "exp" => time() + 3600 // 1 hour
    ];

    $jwt = JWT::encode($payload, "YOUR_SECRET_KEY", "HS256");

    echo json_encode(["token" => $jwt, "user" => $user["username"]]);
} else {
    echo json_encode(["error" => "Invalid credentials"]);
}
```

---

### ✅ 4. React App – Basic Structure

```
src/
├── components/
│   ├── Login.jsx
│   ├── Dashboard.jsx
│   └── ProtectedRoute.jsx
├── App.jsx
└── main.jsx
```

---

### 🔐 `components/Login.jsx`

```jsx
import { useState } from "react";
import axios from "axios";
import { useNavigate } from "react-router-dom";

export default function Login() {
  const [email, setEmail] = useState("");
  const [password, setPassword] = useState("");
  const navigate = useNavigate();

  const handleLogin = async () => {
    try {
      const res = await axios.post("http://localhost/php/login.php", {
        email,
        password,
      });

      if (res.data.token) {
        localStorage.setItem("token", res.data.token);
        localStorage.setItem("username", res.data.user);
        navigate("/dashboard");
      } else {
        alert("Login failed");
      }
    } catch (err) {
      alert("Server error");
    }
  };

  return (
    <div>
      <h2>Login</h2>
      <input placeholder="Email" onChange={e => setEmail(e.target.value)} />
      <input placeholder="Password" type="password" onChange={e => setPassword(e.target.value)} />
      <button onClick={handleLogin}>Login</button>
    </div>
  );
}
```

---

### ✅ `components/Dashboard.jsx`

```jsx
export default function Dashboard() {
  const username = localStorage.getItem("username");
  const logout = () => {
    localStorage.removeItem("token");
    localStorage.removeItem("username");
    window.location.href = "/";
  };

  return (
    <div>
      <h2>Welcome, {username}</h2>
      <button onClick={logout}>Logout</button>
    </div>
  );
}
```

---

### 🔐 `components/ProtectedRoute.jsx`

```jsx
import { Navigate } from "react-router-dom";

export default function ProtectedRoute({ children }) {
  const token = localStorage.getItem("token");
  if (!token) {
    return <Navigate to="/" />;
  }
  return children;
}
```

---

### ✅ `App.jsx` with React Router

```jsx
import { BrowserRouter, Routes, Route } from "react-router-dom";
import Login from "./components/Login";
import Dashboard from "./components/Dashboard";
import ProtectedRoute from "./components/ProtectedRoute";

function App() {
  return (
    <BrowserRouter>
      <Routes>
        <Route path="/" element={<Login />} />
        <Route
          path="/dashboard"
          element={
            <ProtectedRoute>
              <Dashboard />
            </ProtectedRoute>
          }
        />
      </Routes>
    </BrowserRouter>
  );
}

export default App;
```

---

## ✅ Test the Flow

1. Login with a valid user.
2. JWT is stored in localStorage.
3. Access `/dashboard` — works if token exists.
4. Remove token → redirected to login.

---

## ⏭️ NEXT STEP: Redux Version

Once you’re done testing this version:

* I’ll help you build the same flow using **Redux Toolkit** (with full token management, user slice, refresh token logic, etc.)

Would you like a GitHub-ready version or a zip of this starter template as well?
