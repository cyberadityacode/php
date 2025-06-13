import React, { useState } from "react";

export default function Register() {
  const [formData, setFormData] = useState({
    username: "",
    password: "",
    email: "",
  });
  const [response, setResponse] = useState("");

  const handleChange = (e) => {
    const { name, value } = e.target;

    setFormData((prev) => ({
      ...prev,
      [name]: value,
    }));
  };

  const handleRegister = async (e) => {
    e.preventDefault();
    try {
      const response = await fetch(
        "http://localhost/php/13_JWT%20Auth%20Flow_PHPReactMySQL_Pro/backend/public/register.php",
        {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify(formData),
        }
      );

      const data = await response.json();
      console.log(data);
      if (data.status === "success") {
        setResponse(data);
      } else {
        setResponse(data);
      }
    } catch (error) {
      console.error(error);
    } finally {
      setFormData({
        username: "",
        password: "",
        email: "",
      });
    }
  };
  return (
    <div>
      <form onSubmit={handleRegister}>
        <div>
          <label htmlFor="username">Username:</label>
          <input
            type="text"
            placeholder="Enter Username"
            name="username"
            id="username"
            value={formData.username}
            onChange={handleChange}
          />
        </div>

        <div>
          <label htmlFor="password">Password:</label>
          <input
            type="text"
            placeholder="Enter Password"
            name="password"
            id="password"
            value={formData.password}
            onChange={handleChange}
          />
        </div>

        <div>
          <label htmlFor="email">Email:</label>
          <input
            type="email"
            placeholder="Enter Email"
            name="email"
            id="email"
            value={formData.email}
            onChange={handleChange}
          />
        </div>

        <button type="submit">Signup</button>
      </form>

      {response && (
        <p
          style={
            response?.status === "success"
              ? { color: "green" }
              : { color: "red" }
          }
        >
          {response?.message}
        </p>
      )}
    </div>
  );
}
