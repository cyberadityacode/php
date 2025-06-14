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
      setResponse(data);
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
    <div style={styles.container}>
      <form onSubmit={handleRegister} style={styles.card}>
        <h2 style={styles.title}>Register</h2>

        <div style={styles.formGroup}>
          <label htmlFor="username" style={styles.label}>
            Username:
          </label>
          <input
            type="text"
            placeholder="Enter Username"
            name="username"
            id="username"
            value={formData.username}
            onChange={handleChange}
            style={styles.input}
            required
          />
        </div>

        <div style={styles.formGroup}>
          <label htmlFor="password" style={styles.label}>
            Password:
          </label>
          <input
            type="password"
            placeholder="Enter Password"
            name="password"
            id="password"
            value={formData.password}
            onChange={handleChange}
            style={styles.input}
            required
          />
        </div>

        <div style={styles.formGroup}>
          <label htmlFor="email" style={styles.label}>
            Email:
          </label>
          <input
            type="email"
            placeholder="Enter Email"
            name="email"
            id="email"
            value={formData.email}
            onChange={handleChange}
            style={styles.input}
            required
          />
        </div>

        <button type="submit" style={styles.button}>
          Sign Up
        </button>

        {response && (
          <p
            style={{
              marginTop: "1rem",
              color: response?.status === "success" ? "green" : "red",
            }}
          >
            {response?.message}
          </p>
        )}
      </form>
    </div>
  );
}

const styles = {
  container: {
    minHeight: "100vh",
    display: "flex",
    alignItems: "center",
    justifyContent: "center",
    background: "#f0f2f5",
    padding: "20px",
  },
  card: {
    width: "100%",
    maxWidth: "400px",
    padding: "30px",
    background: "#fff",
    boxShadow: "0 4px 8px rgba(0,0,0,0.1)",
    borderRadius: "10px",
  },
  title: {
    textAlign: "center",
    marginBottom: "20px",
    color: "#333",
  },
  formGroup: {
    marginBottom: "15px",
    display: "flex",
    flexDirection: "column",
  },
  label: {
    marginBottom: "5px",
    fontWeight: "500",
    fontSize: "14px",
    color: "#555",
  },
  input: {
    padding: "10px",
    fontSize: "16px",
    border: "1px solid #ccc",
    borderRadius: "5px",
    outline: "none",
  },
  button: {
    width: "100%",
    padding: "10px",
    backgroundColor: "#007bff",
    color: "white",
    fontSize: "16px",
    border: "none",
    borderRadius: "5px",
    cursor: "pointer",
    marginTop: "10px",
  },
};
