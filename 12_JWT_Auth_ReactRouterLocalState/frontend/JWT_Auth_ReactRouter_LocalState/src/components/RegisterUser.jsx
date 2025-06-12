import React, { useState } from "react";
import FormInput from "./FormInput";
import { validateField, validateForm } from "../lib/formValidation";
import { formFields } from "../lib/formFields";
import { getPasswordStrength } from "../lib/passwordStrength";
import { registerUser } from "../api/registerUserAPI";

export default function RegisterUser() {
  const [formData, setFormData] = useState(() =>
    formFields.reduce((acc, field) => {
      acc[field.name] = "";
      return acc;
    }, {})
  );

  /*   const [formData, setFormData] = useState({
    username:"",
    password:"",
    confirmPassword:"",
  });
 */
  const [errors, setErrors] = useState({});
  const [passwordStrength, setPasswordStrength] = useState(null);
  const [loading, setLoading] = useState(false);

  const handleChange = (e) => {
    const { name, value } = e.target;
    if (name === "password") {
      setPasswordStrength(getPasswordStrength(value));
    }
    setFormData((prev) => ({
      ...prev,
      [name]: value,
    }));

    // Real time Validation for the changed Field only
    const fieldError = validateField(name, value, {
      ...formData,
      [name]: value, //simulate updated form data
    });

    setErrors((prevErrors) => ({
      ...prevErrors,
      [name]: fieldError,
    }));
  };

  const handleFormSignup = async (e) => {
    e.preventDefault();

    const validationErrors = validateForm(formFields, formData);
    if (Object.keys(validationErrors).length > 0) {
      setErrors(validationErrors);
      return;
    }
    setErrors({});
    console.log("Form Submitted: ", formData);
    // I will send formData to an API here

    try {
      const response = await registerUser("/signup", formData);
      console.log("received response from our php server");
      console.log(response);
    } catch (error) {
      setErrors(error.message || "Something went wrong");
    } finally {
    }

    //empty the fields after submit
    setFormData(() =>
      formFields.reduce((acc, field) => {
        acc[field.name] = "";
        return acc;
      }, {})
    );
  };

  return (
    <div>
      <form onSubmit={handleFormSignup} method="post">
        {formFields.map((field) => (
          <React.Fragment key={field.id}>
            <FormInput
              {...field}
              value={formData[field.name]}
              onChange={handleChange}
              error={errors[field.name]}
            />
            {field.name === "password" && passwordStrength && (
              <div
                style={{ color: passwordStrength.color, marginBottom: "10px" }}
              >
                Password Strength: {passwordStrength.label}
              </div>
            )}
          </React.Fragment>
        ))}

        <button type="submit" disabled={loading}>
          {loading ? "Submitting..." : "Register"}
        </button>
      </form>
    </div>
  );
}
