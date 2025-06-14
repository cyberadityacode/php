import axios from "axios";

const axiosInstance = axios.create({
  baseURL: "https://f8k7xb9l-80.inc1.devtunnels.ms/php/14_JWT%20Auth%20Flow_CRUD/backend/public/",
  headers: {
    "Content-Type": "application/json",
  },
});

axiosInstance.interceptors.request.use((config) => {
  const token = localStorage.getItem("token");
  if (token) {
    config.headers["Authorization"] = `Bearer ${token}`;
  }
  return config;
});

export default axiosInstance;
