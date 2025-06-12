import React from "react";

export default function FormInput({
  label,
  id,
  type = "text",
  placeholder,
  name,
  value,
  onChange,
  error,
}) {
  return (
    <div>
      <label htmlFor={id}>{label}</label>
      <input
        type={type}
        id={id}
        name={name}
        placeholder={placeholder}
        value={value}
        onChange={onChange}
        style={{ borderColor: error ? "red" : "#ccc" }}
      />
      {error && <div style={{ color: "red", fontSize: "0.8rem" }}>{error}</div>}
    </div>
  );
}
