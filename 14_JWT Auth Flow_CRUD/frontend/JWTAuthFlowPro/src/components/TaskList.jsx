import React, { useEffect, useState } from "react";
import { deleteTask, fetchTasks, updateTask } from "../api/taskApi";

export default function TaskList() {
  const [tasks, setTasks] = useState([]);
  const [editingTaskId, setEditingTaskId] = useState(null);
  const [editValues, setEditValues] = useState({ task_name: "", status_id: 1 });

  //   Search Functionality
  const [searchQuery, setSearchQuery] = useState("");
  const [statusFilter, setStatusFilter] = useState("all");

  const [sortBy, setSortBy] = useState("created_at_desc");

  //   updating rendered task based on the filter

  const filteredTasks = tasks
    .filter((task) => {
      const matchSearch = task.task_name
        .toLowerCase()
        .includes(searchQuery.toLowerCase());

      const matchStatus =
        statusFilter === "all" || task.status_id === parseInt(statusFilter);
      return matchSearch && matchStatus;
    })
    .sort((a, b) => {
      switch (sortBy) {
        case "name_asc":
          return a.task_name.localeCompare(b.task_name);
        case "name_desc":
          return b.task_name.localeCompare(a.task_name);

        case "status_asc":
          return a.status_id - b.status_id;

        case "status_desc":
          return b.status_id - a.status_id;

        case "created_at_asc":
          return new Date(a.created_at) - new Date(b.created_at);
        case "created_at_desc":
          return new Date(b.created_at) - new Date(a.created_at);

        default:
          return new Date(b.created_at) - new Date(a.created_at);
      }
    });

  const loadTasks = async () => {
    const data = await fetchTasks();
    setTasks(data);
  };
  useEffect(() => {
    loadTasks();
  }, []);

  const handleDelete = async (id) => {
    await deleteTask(id);
    loadTasks();
  };

  const handleEditClick = (task) => {
    setEditingTaskId(task.task_id);
    setEditValues({ task_name: task.task_name, status_id: task.status_id });
  };

  const handleCancel = () => {
    setEditingTaskId(null);
    setEditValues({ task_name: "", status_id: 1 });
  };
  const handleUpdate = async () => {
    await updateTask(editingTaskId, editValues);
    setEditingTaskId(null);
    setEditValues({ task_name: "", status_id: 1 });
    loadTasks();
  };

  return (
    <div>
      <h1>Search Task</h1>
      <input
        type="text"
        placeholder="Search Task"
        value={searchQuery}
        onChange={(e) => setSearchQuery(e.target.value)}
      />

      <select
        value={statusFilter}
        onChange={(e) => setStatusFilter(e.target.value)}
      >
        <option value="all">All Status</option>
        <option value={1}>In Progress</option>
        <option value={2}>Halted</option>
        <option value={3}>Completed</option>
      </select>

      <select value={sortBy} onChange={(e) => setSortBy(e.target.value)}>
        <option value="created_at_desc">Newest First</option>
        <option value="created_at_asc">Oldest First</option>
        <option value="name_asc">Name A-Z</option>
        <option value="name_desc">Name Z-A</option>
        <option value="status_asc">Status Ascending</option>
        <option value="status_desc">Status Descending</option>
      </select>

      <h1>Task List</h1>

      {filteredTasks?.length === 0 ? (
        <p>No Task Found</p>
      ) : (
        <ul>
          {filteredTasks?.map((task) => (
            <li key={task.task_id}>
              {editingTaskId === task.task_id ? (
                <div>
                  <input
                    type="text"
                    value={editValues.task_name}
                    onChange={(e) =>
                      setEditValues({
                        ...editValues,
                        task_name: e.target.value,
                      })
                    }
                  />

                  <select
                    value={editValues.status_id}
                    onChange={(e) =>
                      setEditValues({
                        ...editValues,
                        status_id: parseInt(e.target.value),
                      })
                    }
                  >
                    <option value={1}>In Progress</option>
                    <option value={2}>Halted</option>
                    <option value={3}>Completed</option>
                  </select>
                  <button onClick={handleUpdate}>Save</button>
                  <button onClick={() => setEditValues(null)}>Cancel</button>
                  <button onClick={handleCancel}>Cancel</button>
                </div>
              ) : (
                <div>
                  <strong>{task.task_name}</strong> - Status:{" "}
                  {getStatusLabel(task.status_id)}
                  <button onClick={() => handleEditClick(task)}>Edit</button>
                  <button onClick={() => handleDelete(task.task_id)}>
                    Delete
                  </button>
                </div>
              )}
            </li>
          ))}
        </ul>
      )}
    </div>
  );
}
// optional helper function to display status name

function getStatusLabel(id) {
  return (
    {
      1: "InProgress",
      2: "Halted",
      3: "Completed",
    }[id] || "Unknown"
  );
}
