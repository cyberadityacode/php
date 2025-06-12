// Validate Single field (used for real time Validation)

export const validateField = (name, value, formData) => {
  switch (name) {
    case "email":
      if (!value.trim()) return "Email is required";
      //   !/^[^\s@]+@[^\s@]+\.[^\s@]+$/
      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

      if (!emailRegex.test(value)) return "Invalid Email Address";
      break;

    case "password":
      if (!value.trim()) return "Password is required";
      // /^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{7,}$/
      const passwordRegex =
        /^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{7,}$/;

      if (!passwordRegex.test(value)) {
        return "Password must be atleast 7 characters, include uppercase, numbers and special characters";
      }
      break;

    case "confirmPassword":
      if (!value.trim()) return "Please confirm your Password";
      if (value !== formData.password) return "Password does not match";
      break;

    default:
      if (!value.trim()) return `${name} is required`;
  }
  return "";
};

export const validateForm = (formFields, formData) => {
  const errors = {};

  formFields.forEach((field) => {
    const error = validateField(field.name, formData[field.name], formData);
    if (error) {
      errors[field.name] = error;
    }
  });
  return errors;
};
