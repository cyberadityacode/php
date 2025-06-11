import React, { useState } from "react";

export default function CreateTask() {
  const [showModel, setShowModel] = useState(false);
  const [selectedTaskIndex, setSelectedTaskIndex] = useState(null);


  const handleOpenModel = (index) => {
    setSelectedTaskIndex(index);
    setShowModel(true);
  };

  const handleCloseModel = () => {
    setShowModel(false);
  };

  return (
    <section>
      <div className="input-control">
        <h1>Create Task</h1>
        <form>
          <input type="text" name="task" placeholder="Enter Task" />
          <button type="submit">Add</button>
        </form>
        <div className="search-task">
          <input type="text" placeholder="search" />
        </div>
      </div>

      <div className="list-task">
        <table>
          <thead>
            <tr>
              <th>Sr. No.</th>
              <th>Task</th>
              <th>Created/Completed</th>
              <th>Add/View Details</th>
              <th>Update</th>
              <th>Done</th>
            </tr>
          </thead>
          <tbody>
            {[...Array(10)].map((_, index) => (
              <tr key={index}>
                <td>{index + 1}</td>
                <td>Prayer</td>
                <td>11 June 2025 8:08 AM (InProgress)</td>
                <td>
                  <button onClick={() => handleOpenModel(index)}>
                    Add Details
                  </button>
                </td>
                <td>
                  <button>Update</button>
                </td>
                <td>
                  <button>Done</button>
                </td>
              </tr>
            ))}
          </tbody>
        </table>
      </div>

      {/* Model Component */}
      {showModel && (
        <div className="model-overlay">
          <div className="model">
            <h2>Add Task Details</h2>
            <input type="text" value={"Prayer"} />
            <textarea rows="4" placeholder="Enter Task Description"></textarea>
            <select  >
                <option value="InProgress">InProgress</option>
                <option value="Halted">Halted</option>
                <option value="Completed">Completed</option>
            </select>
            <div className="model-actions">
              <button onClick={handleCloseModel}>Close</button>
              <button>Save</button>
            </div>
          </div>
        </div>
      )}
    </section>
  );
}
