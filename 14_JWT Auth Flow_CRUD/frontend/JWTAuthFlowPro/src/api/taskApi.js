import axiosInstance from "./axiosInstance";

export const fetchTasks = async () => {
  const response = await axiosInstance.get("tasks.php");
  return response.data;
};

export const createTask = async (taskData) => {
  const response = await axiosInstance.post("tasks.php", taskData);
  return response.data;
};

export const updateTask = async (taskId, updatedData) => {
  const response = await axiosInstance.put(
    `tasks.php?id=${taskId}`,
    updatedData
  );
  return response.data;
};

export const deleteTask = async (taskId) => {
  const response = await axiosInstance.delete(`tasks.php?id=${taskId}`);
  return response.data;
};


