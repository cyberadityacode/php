import axios from "axios";

// create an axios instance

const api = axios.create({
  baseURL: "http://localhost/php/12_JWT_Auth_ReactRouterLocalState/",
  headers: {
    "Content-Type": "application/json",
  },
});

export const registerUser = async (endpoint, formData) => {
  try {
    const response = await api.post(endpoint, formData);
    return response.data;
  } catch (error) {
   console.error("POST Request Error (Full): ", error.response?.data || error);
    throw error.response?.data || { message: "Unknown Error" };
  }
};
