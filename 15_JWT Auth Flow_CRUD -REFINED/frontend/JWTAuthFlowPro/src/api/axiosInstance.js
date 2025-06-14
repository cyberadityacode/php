import axios from "axios";

const axiosInstance = axios.create({
  baseURL: "http://localhost/php/14_JWT%20Auth%20Flow_CRUD/backend/public/",
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
