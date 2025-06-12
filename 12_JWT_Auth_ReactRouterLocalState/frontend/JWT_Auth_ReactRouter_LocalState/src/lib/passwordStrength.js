export const getPasswordStrength = (password) => {
  let score = 0;
  if (password.length >= 7) score++;
  if (/[A-Z]/.test(password)) score++;
  if (/[a-z]/.test(password)) score++;
  if (/\d/.test(password)) score++;
  if (/[@$!%*?&]/.test(password)) score++;

  if (score <= 2) return { label: "Weak", color: "red" };
  if (score === 3 || score === 4) return { label: "Moderate", color: "orange" };

  return { label: "Strong", color: "green" };
};
