import React, { useEffect, useState } from "react";
import { deleteTask, fetchTasks, updateTask } from "../api/taskApi";

export default function TaskList() {
  const [tasks, setTasks] = useState([]);
  const [editingTaskId, setEditingTaskId] = useState(null);
  const [editValues, setEditValues] = useState({ task_name: "", status_id: 1 });

  const [searchQuery, setSearchQuery] = useState("");
  const [statusFilter, setStatusFilter] = useState("all");
  const [sortBy, setSortBy] = useState("created_at_desc");

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
          return 0;
      }
    });

  return (
    <div style={{ padding: "20px" }}>
      <h2>Task Management</h2>

      <div style={{ display: "flex", gap: "10px", marginBottom: "20px" }}>
        <input
          type="text"
          placeholder="Search by name"
          value={searchQuery}
          onChange={(e) => setSearchQuery(e.target.value)}
          style={{ padding: "10px", fontSize: "1.1rem" }}
        />

        <select
          value={statusFilter}
          onChange={(e) => setStatusFilter(e.target.value)}
          style={{ padding: "10px", fontSize: "1.1rem" }}
        >
          <option value="all">All Status</option>
          <option value={1}>In Progress</option>
          <option value={2}>Halted</option>
          <option value={3}>Completed</option>
        </select>

        <select
          value={sortBy}
          onChange={(e) => setSortBy(e.target.value)}
          style={{ padding: "10px", fontSize: "1.1rem" }}
        >
          <option value="created_at_desc">Newest First</option>
          <option value="created_at_asc">Oldest First</option>
          <option value="name_asc">Name A-Z</option>
          <option value="name_desc">Name Z-A</option>
          <option value="status_asc">Status Asc</option>
          <option value="status_desc">Status Desc</option>
        </select>
      </div>

      {filteredTasks.length === 0 ? (
        <p>No Task Found</p>
      ) : (
        <table
          border="1"
          cellPadding="10"
          style={{ width: "100%", borderCollapse: "collapse" }}
        >
          <thead>
            <tr>
              <th>ID</th>
              <th>Task Name</th>
              <th>Status</th>
              <th>Created At</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            {filteredTasks?.map((task) => (
              <tr key={task.task_id}>
                <td>{task.task_id}</td>
                <td>
                  {editingTaskId === task.task_id ? (
                    <input
                      value={editValues.task_name}
                      onChange={(e) =>
                        setEditValues({
                          ...editValues,
                          task_name: e.target.value,
                        })
                      }
                    />
                  ) : (
                    task.task_name
                  )}
                </td>
                <td>
                  {editingTaskId === task.task_id ? (
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
                  ) : (
                    getStatusLabel(task.status_id)
                  )}
                </td>
                <td>{new Date(task.created_at).toLocaleString()}</td>
                <td>
                  {editingTaskId === task.task_id ? (
                    <>
                      <button onClick={handleUpdate}>Save</button>
                      <button onClick={handleCancel}>Cancel</button>
                    </>
                  ) : (
                    <>
                      <button onClick={() => handleEditClick(task)}>
                        Edit
                      </button>
                      <button onClick={() => handleDelete(task.task_id)}>
                        Delete
                      </button>
                    </>
                  )}
                </td>
              </tr>
            ))}
          </tbody>
        </table>
      )}
    </div>
  );
}

function getStatusLabel(id) {
  return (
    {
      1: "In Progress",
      2: "Halted",
      3: "Completed",
    }[id] || "Unknown"
  );
}
