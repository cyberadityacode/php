import React, { useState } from "react";

export default function App() {
  const [formData, setFormData] = useState({
    username: "",
    email: "",
    age: "",
    favouritepet: "",
  });
  const [response, setResponse] = useState("");

  const handleChange = (e) => {
    setFormData({ ...formData, [e.target.name]: e.target.value });
  };

  const handleSubmit = async (e) => {
    e.preventDefault();

    // Validation onSubmit

    if (!formData.username && !formData.email) {
      setResponse("Please enter Username and Email");
      return;
    }

    // Lets talk to our Server

    try {
      const res = await fetch(
        "http://localhost/php/02_Form_PHP_React/backend/formHandler.php",
        {
          method: "POST",
          headers: {
            "Content-Type": "application/x-www-form-urlencoded",
          },
          body: new URLSearchParams(formData),
        }
      );
      const text = await res.text();
      setResponse(text);
    } catch (error) {
      console.error(error);
      setResponse("An error occured :", error.message);
    }
  };

  return (
    <div>
      <form onSubmit={handleSubmit}>
        <label htmlFor="username">Username</label>
        <input
          type="text"
          name="username"
          id="username"
          placeholder="Enter username..."
          value={formData.username}
          onChange={handleChange}
        />

        <label htmlFor="email">Email</label>
        <input
          type="email"
          name="email"
          id="email"
          placeholder="Enter Email..."
          value={formData.email}
          onChange={handleChange}
        />

        <label htmlFor="age">Age</label>
        <input
          type="number"
          name="age"
          id="age"
          placeholder="Enter Age..."
          value={formData.age}
          onChange={handleChange}
        />

        <label htmlFor="favouritepet">Favourite Pet</label>
        <select
          name="favouritepet"
          id="favouritepet"
          value={formData.favouritepet}
          onChange={handleChange}
        >
          <option value="None">None</option>
          <option value="cow">Cow</option>
          <option value="dog">Dog</option>
          <option value="cat">Cat</option>
        </select>

        <button type="submit">Submit</button>
      </form>
      <h1>Server Response in Plain Text: {response}</h1>

      <h1>Server Reponse in HTML</h1>

      <div dangerouslySetInnerHTML={{ __html: response }} />
    </div>
  );
}
