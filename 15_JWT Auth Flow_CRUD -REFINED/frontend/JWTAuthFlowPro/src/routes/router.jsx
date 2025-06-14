import { createBrowserRouter, RouterProvider } from "react-router-dom";
import Login from "../pages/Login";
import Dashboard from "../pages/Dashboard";
import PrivateRoute from "../components/PrivateRoute";
import CRUD from "../pages/CRUD";
import Redux from "../pages/Redux";
import Location from "../pages/Location";
import AppLayout from "../components/Layout/AppLayout";

/* const router = createBrowserRouter([
  {
    path: "/",
    element: <Login />,
  },
  {
    path: "/dashboard",
    element: (
      <PrivateRoute>
        <Dashboard />
      </PrivateRoute>
    ),
  },
  {
    path: "/crud",
    element: (
      <PrivateRoute>
        <CRUD />
      </PrivateRoute>
    ),
  },
  {
    path: "/redux",
    element: (
      <PrivateRoute>
        <Redux />
      </PrivateRoute>
    ),
  },
  {
    path: "/location",
    element: (
      <PrivateRoute>
        <Location />
      </PrivateRoute>
    ),
  },
]); */
const router = createBrowserRouter([
  {
    path: "/",
    element: <Login />,
  },
  {
    path: "/dashboard",
    element: (
      <PrivateRoute>
        <AppLayout />
      </PrivateRoute>
    ),
    children: [
      {
        index: true, // default nested route for /dashboard
        element: <Dashboard />,
      },
      {
        path: "crud",
        element: <CRUD />,
      },
      {
        path: "location",
        element: <Location />,
      },
      {
        path: "redux",
        element: <Redux />,
      },
    ],
  },
]);

export default router;
