import React from "react";
import { NavLink } from "react-router-dom";
import "./Header.css";

export default function Header() {
  const handleLogout = () => {
    localStorage.removeItem("token");
    navigate("/");
  };

  return (
    <div className="navbar">
      <ul>
        <li>
          <NavLink to="/dashboard">Dashboard</NavLink>
        </li>
        <li>
          <NavLink to="/dashboard/crud">React CRUD</NavLink>
        </li>
        <li>
          <NavLink to="/dashboard/location">Location App</NavLink>
        </li>

        <li>
          <NavLink onClick={handleLogout}>Logout</NavLink>
        </li>
      </ul>
    </div>
  );
}
