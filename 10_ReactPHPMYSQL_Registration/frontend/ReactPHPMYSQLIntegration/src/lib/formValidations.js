export const validate = (formData) => {
  const newErrors = {};
  if (!formData.username) newErrors.username = "Username is Required";
  if (!formData.password) newErrors.password = "Password is Required";
  if (!formData.email) newErrors.email = "Email is Required";
  if (!formData.dob) newErrors.dob = "DOB is Required";
  if (!formData.profession) newErrors.profession = "Profession is Required";

  if (!formData.profession || formData.profession === "none") {
    newErrors.profession = "Profession is Required";
  }
  return newErrors;
};
