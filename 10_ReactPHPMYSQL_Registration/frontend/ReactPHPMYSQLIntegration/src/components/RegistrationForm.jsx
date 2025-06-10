import React, { useReducer, useState } from "react";
import { validate } from "../lib/formValidations";

export default function RegistrationForm() {
  const [formData, setFormData] = useState({
    username: "",
    password: "",
    email: "",
    dob: "",
    profession: "",
  });

  const [errors, setErrors] = useState({});

  const handleChange = (e) => {
    const { name, value } = e.target;
    setFormData((prev) => ({
      ...prev,
      [name]: value,
    }));

    // Clearing Errors on Change
    setErrors((prev) => ({
      ...prev,
      [name]: "",
    }));
  };

  const handleSubmit = async (e) => {
    e.preventDefault();
    const validationErrors = validate(formData);

    if (Object.keys(validationErrors).length > 0) {
      setErrors(validationErrors);
    } else {
      console.log("good to proceed form to the server");

      try {
        await fetch("/api/submit", {
          method: "POST",
          headers: { "Content-Type": "application/json" },
          body: JSON.stringify(formData),
        });
      } catch (error) {
        console.error("Form Submission Failed!", error);
      }

      setFormData({
        username: "",
        password: "",
        email: "",
        dob: "",
        profession: "",
      });
    }
  };

  return (
    <div className="registration-form">
      <form onSubmit={handleSubmit}>
        <div>
          <label htmlFor="username">Username:</label>
          <input
            type="text"
            name="username"
            id="username"
            value={formData.username}
            onChange={handleChange}
            placeholder="Enter your Username"
          />
          {errors.username && (
            <span style={{ color: "red" }}>{errors.username}</span>
          )}
        </div>

        <div>
          <label htmlFor="password">Password:</label>
          <input
            type="password"
            name="password"
            id="password"
            value={formData.password}
            onChange={handleChange}
            placeholder="Enter your Password"
          />
          {errors.password && (
            <span style={{ color: "red" }}>{errors.password}</span>
          )}
        </div>

        <div>
          <label htmlFor="email">Email:</label>
          <input
            type="email"
            name="email"
            id="email"
            value={formData.email}
            onChange={handleChange}
            placeholder="Enter your Email"
          />
          {errors.email && <span style={{ color: "red" }}>{errors.email}</span>}
        </div>

        <div>
          <label htmlFor="dob">DOB:</label>
          <input
            type="date"
            name="dob"
            id="dob"
            value={formData.dob}
            onChange={handleChange}
          />
          {errors.dob && <span style={{ color: "red" }}>{errors.dob}</span>}
        </div>

        <div>
          <label htmlFor="dob">Profession:</label>
          <select
            name="profession"
            id="profession"
            value={formData.profession}
            onChange={handleChange}
          >
            <option value="none">Select Profession</option>
            <option value="engineer">Engineer</option>
            <option value="nonengineer">Non Engineer</option>
            <option value="wannabeengineer">Wannabe Engineer</option>
          </select>
          {errors.profession && (
            <span style={{ color: "red" }}>{errors.profession}</span>
          )}
        </div>
        <button type="submit">Register</button>
      </form>
    </div>
  );
}
