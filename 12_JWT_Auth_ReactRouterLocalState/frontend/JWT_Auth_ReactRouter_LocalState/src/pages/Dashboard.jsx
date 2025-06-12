import { useEffect, useState } from "react";

export default function Dashboard() {
  const [user, setUser] = useState(null);

  const [loading, setLoading] = useState(true);

  const handleLogout = () => {
    localStorage.removeItem("token");
    window.location.href = "/";
  };

  useEffect(() => {
    const fetchUser = async () => {
      const token = localStorage.getItem("token");
      try {
        const res = await fetch(
          "http://localhost/php/12_JWT_Auth_ReactRouterLocalState/backend/get_user_profile.php",
          {
            method: "GET",
            headers: {
              Authorization: "Bearer " + token,
            },
          }
        );

        const data = await res.json();
        console.log("inside dashboard");
        console.log(data);
        if (data.status === "success") {
          setUser(data.user); //This is the username
            console.log("got user data");
          console.log(user);
        } else {
          // Invalid token redirect to login

          localStorage.removeItem("token");
          window.location.href = "/";
        }
      } catch (error) {
        console.error(error);
        window.location.href = "/";
      } finally {
        setLoading(false);
      }
    };
    fetchUser();
  }, []);

  return (
    <div>
      <h1>Welcome to Dashboard</h1>
      <p>Hello {user?.username}! , You have successfully logged in!</p>

      <ul>
        <li>Email:{user?.email}</li>
        <li>Created At:{user?.created_at}</li>
      </ul>

      <button onClick={handleLogout}>Logout</button>
    </div>
  );
}
