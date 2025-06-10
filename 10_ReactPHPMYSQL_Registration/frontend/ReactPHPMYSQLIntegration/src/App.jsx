import React from "react";
import RegistrationForm from "./components/RegistrationForm";
import LoginForm from "./components/LoginForm";

export default function App() {
  return (
    <section>
      <div>
        <h1 className="heading-login">Login</h1>
        <LoginForm />
      </div>
      <div>
        <h1 className="heading-registration">
          Registration Form with React+PHP+MYSQL Integration
        </h1>
        <RegistrationForm />
      </div>
    </section>
  );
}
