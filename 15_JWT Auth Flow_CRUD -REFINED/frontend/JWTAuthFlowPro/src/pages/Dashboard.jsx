import { useEffect, useState } from "react";
import { fetchTasks } from "../api/taskApi";

export default function Dashboard() {
  const [taskStats, setTaskStats] = useState({
    total: 0,
    inProgress: 0,
    halted: 0,
    completed: 0,
  });

  useEffect(() => {
    const loadTaskStats = async () => {
      try {
        const tasks = await fetchTasks();
        const total = tasks.length;
        const inProgress = tasks.filter((t) => t.status_id === 1).length;
        const halted = tasks.filter((t) => t.status_id === 2).length;
        const completed = tasks.filter((t) => t.status_id === 3).length;

        setTaskStats({
          total,
          inProgress,
          halted,
          completed,
        });
      } catch (error) {
        console.error(error);
      }
    };
    loadTaskStats();
  }, []);

  return (
    <div style={{ padding: "20px" }}>
      <h1>Welcome to the Dashboard</h1>
      <p>Proof Of Concept (POC) # JWT Auth Flow - Login, Signup, Protected Routes using React Router and LocalStorage</p>

      <div
        style={{
          display: "grid",
          gridTemplateColumns: "repeat(auto-fit, minmax(250px, 1fr))",
          gap: "20px",
          marginTop: "20px",
        }}
      >
        <div style={cardStyle}>
          <h2>Total Tasks</h2>
          <h2>{taskStats.total}</h2>
        </div>
        <div style={cardStyle}>
          <h2>In Progress</h2>
          <h2>{taskStats.inProgress}</h2>
        </div>
        <div style={cardStyle}>
          <h2>Completed</h2>
          <h2>{taskStats.completed}</h2>
        </div>
        <div style={cardStyle}>
          <h2>Halted</h2>
          <h2>{taskStats.halted}</h2>
        </div>
      </div>
    </div>
  );
}

const cardStyle = {
  border: "1px solid #ddd",
  borderRadius: "10px",
  padding: "20px",
  boxShadow: "0 2px 6px rgba(0,0,0,0.1)",
  textAlign: "center",
  backgroundColor: "#f9f9f9",
};
