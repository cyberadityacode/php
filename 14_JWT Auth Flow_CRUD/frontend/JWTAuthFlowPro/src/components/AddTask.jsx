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
    <div>
      <h1>Add Task</h1>
      <input
        type="text"
        placeholder="Enter Task"
        value={taskName}
        onChange={(e) => setTaskName(e.target.value)}
      />
      <button onClick={handleAdd}>Add</button>
    </div>
  );
}
