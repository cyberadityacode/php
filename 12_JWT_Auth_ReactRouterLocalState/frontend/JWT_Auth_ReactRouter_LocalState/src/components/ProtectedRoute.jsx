import React, { useEffect, useState } from "react";
import { Navigate } from "react-router-dom";

export default function ProtectedRoute({ children }) {
  const [isValid, setIsValid] = useState(null);

  useEffect(() => {
    const verifyToken = async () => {
      const token = localStorage.getItem("token");
      console.log("Fetched Token:", token);
      if (!token) {
        setIsValid(false);
        return;
      }
      try {
        const res = await fetch(
          "http://localhost/php/12_JWT_Auth_ReactRouterLocalState/backend/verify_token.php",
          {
            method: "GET",
            headers: {
              Authorization: "Bearer " + token,
            },
          }
        );

        const data = await res.json();
        console.log("Token Verify Response:", data);
        if (data.status === "success") {
          setIsValid(true);
        } else {
          setIsValid(false);
        }
      } catch (error) {
        console.error(error);
        setIsValid(false);
      }
    };

    verifyToken();
  }, []);

  //   still checking token

  if (isValid === null) return <p>Loading...</p>;

  //   if not valid-> Redirect to login
  if (!isValid) return <Navigate to="/" />;
  // Valid token → show the page
  return children;
}
