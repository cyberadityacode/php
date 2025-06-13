import React, { useState } from "react";

export default function Login() {
  const [loginForm, setLoginForm] = useState({
    username: "",
    password: "",
  });

  const handleChange = (e) => {
    const { name, value } = e.target;
    setLoginForm((prev) => ({
      ...prev,
      [name]: value,
    }));
  };

  const handleLogin = async (e) => {
    e.preventDefault();
    try {
      const response = await fetch(
        "http://localhost/php/13_JWT%20Auth%20Flow_PHPReactMySQL_Pro/backend/public/login.php",
        {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify(loginForm),
        }
      );

      const data = await response.json();
      console.log(data);

      if (data.status === "success") {
        // store token in local storage
        localStorage.setItem("token", data.token);
        alert("login successfull");
      } else {
        alert(data.message || "Login Failed");
      }
    } catch (error) {
      console.error(error);
    }
  };
  return (
    <div>
      <h1>Login</h1>
      <form onSubmit={handleLogin}>
        <input
          type="text"
          value={loginForm.username}
          onChange={handleChange}
          name="username"
          placeholder="Enter Username"
        />
        <input
          type="text"
          value={loginForm.password}
          onChange={handleChange}
          name="password"
          placeholder="Enter Password"
        />
        <button type="submit">Login</button>
      </form>
    </div>
  );
}
