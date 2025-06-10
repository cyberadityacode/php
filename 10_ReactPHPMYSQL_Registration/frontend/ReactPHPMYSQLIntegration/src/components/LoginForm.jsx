import React, { useState } from "react";
import { validateLogin } from "../lib/formValidations";

export default function LoginForm() {
  const [formData, setFormData] = useState({
    username: "",
    password: "",
  });
  const [errors, setErrors] = useState({});
  const [serverResponse, setServerResponse] = useState({});
  const handleChange = (e) => {
    const { name, value } = e.target;

    setFormData((prev) => ({
      ...prev,
      [name]: value,
    }));
  };

  const handleLogin = async (e) => {
    e.preventDefault();

    const validationErrorsLogin = validateLogin(formData);
    if (Object.keys(validationErrorsLogin).length > 0) {
      setErrors(validationErrorsLogin);
    } else {
      try {
        console.log("Login Success Process Starts!");
        setIsLogging(true);

        const response = await fetch(
          "http://localhost/php/10_ReactPHPMYSQL_Registration/backend/includes/login.inc.php",
          {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify(formData),
          }
        );

        const data = await response.json();
        console.log(data);
        if (data.status === "success" || data.status === "error") {
          setServerResponse(data);
        } else {
          setServerResponse({
            status: "error",
            message: "Unexpected response format",
          });
        }
      } catch (error) {
        console.error(error);
      } finally {
        setIsLogging(false);
      }
    }
  };
  const [isLogging, setIsLogging] = useState(false);
  return (
    <div className="registration-form">
      <form onSubmit={handleLogin}>
        <div>
          <label htmlFor="username.login">Username:</label>
          <input
            type="text"
            name="username"
            id="username.login"
            value={formData.username}
            onChange={handleChange}
            placeholder="Enter your Username"
          />
          {errors.username && (
            <span style={{ color: "red" }}>{errors.username}</span>
          )}
        </div>
        <div>
          <label htmlFor="password.login">Password:</label>
          <input
            type="password"
            name="password"
            id="password.login"
            value={formData.password}
            onChange={handleChange}
            placeholder="Enter your Password"
          />
          {errors.password && (
            <span style={{ color: "red" }}>{errors.password}</span>
          )}
        </div>
        <button type="submit" disabled={isLogging}>
          {isLogging ? "Logging in..." : "Login"}
        </button>
      </form>

      {/* {serverResponse &&  <p>{serverResponse.message } {serverResponse.user?.username ? "Hello "+ serverResponse.user?.username :""}</p>} */}

      {serverResponse?.status === "error" && (
        <p style={{ color: "red" }}>{serverResponse.message}</p>
      )}
      {serverResponse?.status === "success" && (
        <p style={{ color: "green" }}>
          {serverResponse.message}{" "}
          {serverResponse.user?.username &&
            `Hello ${serverResponse.user.username}`}
        </p>
      )}
    </div>
  );
}
