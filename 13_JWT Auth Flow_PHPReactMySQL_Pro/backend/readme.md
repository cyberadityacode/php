# JWT Auth flow using PHP React MYSQL - Pro

## Step 1

```
/backend/
├── config/
│   └── db.php
├── controllers/
│   ├── AuthController.php
├── middleware/
│   └── verify_token.php
├── utils/
│   ├── jwt_helper.php
├── public/
│   ├── login.php
│   ├── register.php
│   ├── get_user.php


```

## Step 2 - STEP 2: Install Firebase PHP-JWT

Install using Composer:
composer require firebase/php-jwt

## STEP 3: Database Setup with Prepared Statements

```sql
CREATE TABLE users (
 id INT AUTO_INCREMENT PRIMARY KEY,
 name VARCHAR(100) NOT NULL,
 email VARCHAR(100) UNIQUE NOT NULL,
 password VARCHAR(255) NOT NULL,
 created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

## STEP 4: Create Reusable DB Connection (config/db.php)

## STEP 5: Create JWT Helper (utils/jwt_helper.php)

It is used to generate and verify JWT token using Firebase

## STEP 6: Build AuthController (controllers/AuthController.php)

Class which contain register and login function

Now Create login.php and register.php

## STEP 7: Verify Token Middleware (middleware/verify_token.php)
It will verify token and Pass user info to next script

##  STEP 8: Frontend: React Integration

1. Setup Folder Structure (React)

```
src/
├── components/
│   ├── Login.jsx
│   ├── Register.jsx
│   ├── Dashboard.jsx
├── services/
│   └── authService.js
├── App.jsx
└── main.jsx


```
2. Create authService.js – 📦 Backend Integration
