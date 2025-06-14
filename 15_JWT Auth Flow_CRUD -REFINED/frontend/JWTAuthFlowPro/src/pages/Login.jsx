import React, { useState } from "react";
import { Navigate, useNavigate } from "react-router";

export default function LoginRegisterPage() {
  const token = localStorage.getItem("token");
  if (token) return <Navigate to="/dashboard" replace />;

  const navigate = useNavigate();
  const [activeTab, setActiveTab] = useState("login");

  const [loginForm, setLoginForm] = useState({ username: "", password: "" });
  const [registerForm, setRegisterForm] = useState({
    username: "",
    password: "",
    email: "",
  });

  const [response, setResponse] = useState("");

  const handleChange = (e, formType) => {
    const { name, value } = e.target;
    if (formType === "login") {
      setLoginForm((prev) => ({ ...prev, [name]: value }));
    } else {
      setRegisterForm((prev) => ({ ...prev, [name]: value }));
    }
  };

  const handleLogin = async (e) => {
    e.preventDefault();
    try {
      const res = await fetch(
        "http://localhost/php/15_JWT%20Auth%20Flow_CRUD%20-REFINED/backend/public/login.php",
        {
          method: "POST",
          headers: { "Content-Type": "application/json" },
          body: JSON.stringify(loginForm),
        }
      );
      const data = await res.json();
      if (data.status === "success") {
        localStorage.setItem("token", data.token);
        navigate("/dashboard");
      } else {
        setResponse(data.message || "Login failed");
      }
    } catch (err) {
      console.error(err);
    }
  };

  const handleRegister = async (e) => {
    e.preventDefault();
    try {
      const res = await fetch(
        "http://localhost/php/15_JWT%20Auth%20Flow_CRUD%20-REFINED/backend/public/register.php",
        {
          method: "POST",
          headers: { "Content-Type": "application/json" },
          body: JSON.stringify(registerForm),
        }
      );
      const data = await res.json();
      setResponse(data.message);
      if (data.status === "success") {
        setRegisterForm({ username: "", password: "", email: "" });
        setActiveTab("login");
      }
    } catch (err) {
      console.error(err);
    }
  };

  return (
    <div style={styles.container}>
      <div style={styles.card}>
        <h3 style={{ textAlign: "center" }}>
          JWT Auth Flow -React,PHP & MYSQL
        </h3>
        <div style={styles.tabHeader}>
          <button
            style={{
              ...styles.tab,
              ...(activeTab === "login" ? styles.activeTab : {}),
            }}
            onClick={() => setActiveTab("login")}
          >
            Login
          </button>
          <button
            style={{
              ...styles.tab,
              ...(activeTab === "register" ? styles.activeTab : {}),
            }}
            onClick={() => setActiveTab("register")}
          >
            Register
          </button>
        </div>

        {activeTab === "login" && (
          <form onSubmit={handleLogin} style={styles.form}>
            <input
              type="text"
              name="username"
              placeholder="Username"
              value={loginForm.username}
              onChange={(e) => handleChange(e, "login")}
              style={styles.input}
              required
            />
            <input
              type="password"
              name="password"
              placeholder="Password"
              value={loginForm.password}
              onChange={(e) => handleChange(e, "login")}
              style={styles.input}
              required
            />
            <button type="submit" style={styles.button}>
              Login
            </button>
          </form>
        )}

        {activeTab === "register" && (
          <form onSubmit={handleRegister} style={styles.form}>
            <input
              type="text"
              name="username"
              placeholder="Username"
              value={registerForm.username}
              onChange={(e) => handleChange(e, "register")}
              style={styles.input}
              required
            />
            <input
              type="password"
              name="password"
              placeholder="Password"
              value={registerForm.password}
              onChange={(e) => handleChange(e, "register")}
              style={styles.input}
              required
            />
            <input
              type="email"
              name="email"
              placeholder="Email"
              value={registerForm.email}
              onChange={(e) => handleChange(e, "register")}
              style={styles.input}
              required
            />
            <button type="submit" style={styles.button}>
              Register
            </button>
          </form>
        )}

        {response && (
          <p
            style={{
              marginTop: "1rem",
              color: response.toLowerCase().includes("success")
                ? "green"
                : "red",
            }}
          >
            {response}
          </p>
        )}
      </div>
    </div>
  );
}

const styles = {
  container: {
    minHeight: "100vh",
    display: "flex",
    alignItems: "center",
    justifyContent: "center",
    background: "#f0f0f0",
    padding: "20px",
  },
  card: {
    width: "100%",
    maxWidth: "400px",
    background: "#fff",
    padding: "20px",
    borderRadius: "8px",
    boxShadow: "0 4px 12px rgba(0,0,0,0.1)",
  },
  tabHeader: {
    display: "flex",
    marginBottom: "15px",
  },
  tab: {
    flex: 1,
    padding: "10px",
    cursor: "pointer",
    background: "#ddd",
    border: "none",
    fontWeight: "bold",
  },
  activeTab: {
    background: "#fff",
    borderBottom: "2px solid #007bff",
  },
  form: {
    display: "flex",
    flexDirection: "column",
    gap: "10px",
  },
  input: {
    padding: "10px",
    fontSize: "14px",
    borderRadius: "5px",
    border: "1px solid #ccc",
  },
  button: {
    padding: "10px",
    fontSize: "14px",
    backgroundColor: "#007bff",
    color: "white",
    border: "none",
    borderRadius: "5px",
    cursor: "pointer",
  },
};
