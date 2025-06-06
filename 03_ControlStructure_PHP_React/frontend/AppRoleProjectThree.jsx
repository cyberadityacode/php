/* 
    Note: This Remote Component is moved to 02 Project
    I have placed over there, because I don't want to reinstall react packages.
*/

import { useState } from "react";
import React from "../../02_Form_PHP_React/frontend/frontEndPHPForm/node_modules/";

export default function AppRoleProjectThree() {
  const [role, setRole] = useState("");
  const [message, setMessage] = useState("");

  const handleChange = async (e) => {
    const selectedRole = e.target.value;
    setRole(selectedRole);

    let rolecode;
    switch (selectedRole) {
      case "admin":
        rolecode = 1;
        break;
      case "editor":
        rolecode = 2;
        break;
      case "viewer":
        rolecode = 3;
        break;
      default:
        rolecode = 0;
        break;
    }
    // Lets talk to our PHP server
    const response = await fetch(
      "http://localhost/php/03_ControlStructure_PHP_React/backend/role.php",
      {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({ code: rolecode }),
      }
    );
    const data = await response.json();
    console.log(data);
    setMessage(data.message);
  };

  return (
    <div>
      <h1>Select Users Role</h1>
      <select value={role} onChange={handleChange}>
        <option value="">Choose Role</option>
        <option value="admin">Admin</option>
        <option value="editor">Editor</option>
        <option value="viewer">Viewer</option>
      </select>

      <p>Message: {message}</p>
    </div>
  );
}
