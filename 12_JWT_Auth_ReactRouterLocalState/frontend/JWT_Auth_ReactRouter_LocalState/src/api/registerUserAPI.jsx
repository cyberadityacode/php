import axios from "axios";

// create an axios instance

const api = axios.create({
  baseURL: "",
  headers: {
    "Content-Type": "application/json",
  },
});

export const registerUser = async (endpoint, formData) => {
  try {
    const response = await api.post(endpoint, formData);
    return response.data;
  } catch (error) {
    console.error("POST Request Error: ", error);
    throw error.response?.data || error.message;
  }
};
