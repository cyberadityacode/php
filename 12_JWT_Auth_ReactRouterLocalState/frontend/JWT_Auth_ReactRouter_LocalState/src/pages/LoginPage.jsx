import React, { useState } from "react";
import { useNavigate } from "react-router-dom";
import RegisterUser from "../components/RegisterUser";

export default function LoginPage() {
  const [username, setUsername] = useState("");
  const [password, setPassword] = useState("");
  const [errorMessage, setErrorMessage] = useState("");

  const navigate = useNavigate();

  const handleSubmit = async (e) => {
    e.preventDefault();

    // Send POST to PHP Backend

    try {
      const response = await fetch(
        "http://localhost/php/12_JWT_Auth_ReactRouterLocalState/backend/login.php",
        {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify({ username, password }),
        }
      );
      const data = await response.json();
      if (data.status === "success" && data.token) {
        // Save token into local storage

        localStorage.setItem("token", data.token);
        // Redirect to dashboard
        navigate("/dashboard");
      } else {
        setErrorMessage(data.message);
      }
    } catch (error) {
      console.error(error);
      setErrorMessage("Something Went Wrong. Please try later");
    }
  };
  return (
    <>
      <div>
        <h2>Login</h2>
        <form onSubmit={handleSubmit}>
          <div>
            <label>Username</label>
            <input
              type="text"
              value={username}
              required
              onChange={(e) => setUsername(e.target.value)}
            />
          </div>

          <div>
            <label>Password</label>
            <input
              type="text"
              value={password}
              required
              onChange={(e) => setPassword(e.target.value)}
            />
          </div>

          <button type="submit">Login</button>
          {errorMessage && <p style={{ color: "red" }}>{errorMessage}</p>}
        </form>
      </div>
      <div style={{marginTop:'50px'}}>
        <h2>Signup</h2>
        <RegisterUser />
      </div>
    </>
  );
}
