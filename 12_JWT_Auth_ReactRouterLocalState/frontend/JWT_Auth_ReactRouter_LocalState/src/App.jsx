import { BrowserRouter, Route, Routes } from "react-router-dom";
import RegisterUser from "./components/RegisterUser";
import LoginPage from "./pages/LoginPage";
import Dashboard from "./pages/Dashboard";
import ProtectedRoute from "./components/ProtectedRoute";

export default function App() {
  return (
    <BrowserRouter>
      <Routes>
        <Route path="/" element={<LoginPage /> } />
        <Route path="/signup" element={<RegisterUser />} />
        <Route
          path="/dashboard"
          element={
            <ProtectedRoute>
              <Dashboard />
            </ProtectedRoute>
          }
        />
      </Routes>
    </BrowserRouter>
    /*  <div>
      <h1>Signup</h1>
      <RegisterUser />

      <br />

      <LoginPage />
    </div> */
  );
}
