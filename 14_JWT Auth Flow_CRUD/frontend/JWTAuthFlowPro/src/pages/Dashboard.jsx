import React, { useState } from "react";
import { useNavigate } from "react-router";
import AddTask from "../components/AddTask";
import TaskList from "../components/TaskList";

export default function Dashboard() {
  const [refresh, setRefresh] = useState(false);
  const navigate = useNavigate();

  const handleLogout = () => {
    localStorage.removeItem("token");
    navigate("/");
  };

  return (
    <div>
      <h1>Welcome to Dashboard</h1>

      <button onClick={handleLogout}>Logout</button>
      <div>
        <h1>Super CRUD Task App</h1>
        <AddTask onTaskAdded={() => setRefresh(!refresh)} />
        <TaskList key={refresh} />
      </div>
    </div>
  );
}
