# JWT Auth FLOW CRUD - React+PHP+MYSQL

A full-stack boilerplate with a **React.js frontend**, **PHP backend**, and **MySQL** database. This project provides user authentication using JWT, a RESTful API architecture, and scalable directory structure.

---

##  Project Structure

```
project-root/
│
├── backend/                 # PHP API
│   ├── config/              # DB connection
│   ├── controllers/         # PHP logic
│   ├── utils/               # JWT helper etc.
│   └── public/              # Entry point 
(index.php)
│   middlewares              

├── frontend/                # React App
│   ├── public/
│   └── src/
│       ├── components/
│       └── pages/
│
└── database/
    └── schema.sql           # DB schema setup
```

---

##  Prerequisites

* Node.js (v18+ recommended)
* Composer
* PHP (v8.0+)
* MySQL Server
* XAMPP/LAMP (if using local server)
* Git

---

##  Installation

### 1. Clone the Repo

```bash
git clone https://github.com/cyberadityacode/php/tree/main/15_JWT%20Auth%20Flow_CRUD%20-REFINED

cd 15_JWT_AUTO_FLOW_CRUD-REFINED
```

### 2. Backend Setup

```bash
cd backend
composer install
```

#### Update DB Config

Edit `backend/config/db.php`:

```php
define('DB_HOST', 'localhost');
define('DB_NAME', 'supercrud');
define('DB_USER', 'root');
define('DB_PASS', '');
```

#### Import the SQL Schema

Use phpMyAdmin or CLI:

```sql
CREATE DATABASE supercrud;
USE supercrud;
-- then run schema from database/schema.sql
```

Or:

```bash
mysql -u root -p supercrud < database/schema.sql
```

### 3. Frontend Setup

```bash
cd ../frontend
npm install
```

Update `frontend/src/config.js`:

```js
export const API_BASE_URL = "http://localhost/react-php-mysql/backend/public";
```

---

##  Running the App

###  Backend (PHP API)

Start local server (use XAMPP or PHP built-in server):

```bash
cd backend/public
php -S localhost:80
```

###  Frontend (React App)

```bash
cd frontend
npm start
```

By default:
React runs on `http://localhost:5173`
PHP backend runs on `http://localhost:80`

---

##  Features

* JWT Auth (Login/Register)
* Protected Routes (Frontend)
* Role-based Access (Optional)
* MySQL Database
* Clean MVC Structure (PHP)

---


##  Technologies Used

* React.js (Vite or CRA)
* PHP 8+
* MySQL
* JWT for authentication
* Axios for API calls
* Composer for dependencies

---

<video controls src="bandicam 2025-06-14 13-17-50-807.mp4" title="Title"></video>