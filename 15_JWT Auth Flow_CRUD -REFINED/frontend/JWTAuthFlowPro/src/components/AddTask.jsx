import React, { useState } from "react";
import { createTask } from "../api/taskApi";

export default function AddTask({ onTaskAdded }) {
  const [taskName, setTaskName] = useState("");

  const handleAdd = async () => {
    if (!taskName.trim()) return;

    await createTask({
      task_name: taskName,
      status_id: 1, // default in progress
    });

    setTaskName("");
    onTaskAdded(); //refresh the task list
  };
  return (
    <div style={{ textAlign: "center" }}>
      <h3>Add Task</h3>
      <input
        type="text"
        placeholder="Enter Task"
        value={taskName}
        onChange={(e) => setTaskName(e.target.value)}
        style={{ padding: "10px", fontSize: "1.1rem" }}
      />
      <button
        onClick={handleAdd}
        style={{ padding: "10px", fontSize: "1.1rem" }}
      >
        Add
      </button>
    </div>
  );
}
