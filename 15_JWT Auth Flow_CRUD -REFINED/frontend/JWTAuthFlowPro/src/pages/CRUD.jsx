import React, { useState } from "react";
import { useNavigate } from "react-router";
import AddTask from "../components/AddTask";
import TaskList from "../components/TaskList";
import Header from "../components/Layout/Header";
export default function CRUD() {
  const [refresh, setRefresh] = useState(false);
  const navigate = useNavigate();

  const handleLogout = () => {
    localStorage.removeItem("token");
    navigate("/");
  };
  return (
    <div>
      <h3>React CRUD with JWT Auth Flow using PHP and MYSQL</h3>
      <button onClick={handleLogout}>Logout</button>
      <div>
        <AddTask onTaskAdded={() => setRefresh(!refresh)} />
        <TaskList key={refresh} />
      </div>
    </div>
  );
}
