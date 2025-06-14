# JWT Auth Flow - Login, Signup, Protected Routes using React Router and LocalStorage



```
src/
├── App.jsx
├── main.jsx
├── routes/
│   └── router.jsx
├── pages/
│   ├── Login.jsx
│   └── Dashboard.jsx
├── components/
│   └── PrivateRoute.jsx
```

2. routes/router.jsx

> main.jsx

```jsx
ReactDOM.createRoot(document.getElementById("root")).render(
  <React.StrictMode>
    <RouterProvider router={router} />
  </React.StrictMode>
);
```

3.  components/PrivateRoute.jsx

4.  pages/Login.jsx

5.  pages/Dashboard.jsx
