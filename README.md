# TaskBoard
Lite Task board web application 

a Kanban style board built entirely from scratch using Vanilla PHP, MySQL, and Vanilla JavaScript. 

This project was developed without the use of heavy frameworks to explore and the fundamentals of web architecture, RESTful API design, relational databases, and web security.

## ✨ Features

* **Kanban UI:** style progression (To Do ➔ Doing ➔ Done) using the JavaScript Fetch API, allowing for seamless state updates without page reloads.
* **RESTful-style API:** A custom-built backend API that serves clean JSON to the frontend.
* **Secure Authentication:** Session-based user login with cryptographic password hashing.
* **Multi-Tenant Data:** Relational database architecture ensuring users can only interact with and view their own data.
* **Defense-in-Depth Security:** Built-in protection against common web vulnerabilities (SQLi, XSS, IDOR).

## 🛠️ Tech Stack

* **Frontend:** HTML5, CSS3 (Flexbox), Vanilla JavaScript (ES6+ Promises/Fetch).
* **Backend:** PHP 8+ (Session Management, API Routing).
* **Database:** MySQL 9+ (accessed securely via PHP Data Objects - PDO).

## 🛡️ Security Highlights

As a proof-of-concept for secure web development, this application implements a few key security measures:
* **SQL Injection (SQLi) Prevention:** Strict use of PDO Prepared Statements for all database queries.
* **Cross-Site Scripting (XSS) Mitigation:** Output sanitization using `htmlspecialchars` to neutralize malicious DOM injections.
* **Secure Cryptography:** Passwords are never stored in plain text; they are hashed using `password_hash()` (Bcrypt).
* **Insecure Direct Object Reference (IDOR) Protection:** Backend API strictly enforces `user_id` validation against the active session before executing `UPDATE` or `DELETE` commands.

---

## 🚀 Getting Started

If you'd like to run this project locally, follow these steps.

### 1. Prerequisites
* PHP 8.0 or higher (with `pdo_mysql` extension enabled in `php.ini`)
* MySQL Server

### 2. Database Setup

Log into your MySQL server and create a database called taskboard with the following tables 

Taskboard ["id", "username", "password", "created_on", "last_login" ,"is_active"]
tasks["id", "label", "description", "user_id", "status", "is_hidden"]

### 3. Environment Variables 

ou will need to connect the PHP backend to your local database.
Open backend/db.php and update the variables to match your local MySQL credentials:

```bash
$host = "localhost"; // or 127.0.0.1
$db   = "taskboard";
$user = "root";      // Replace with your MySQL username
$password = "";      // Replace with your MySQL password
```

### 4. running the server

```bash
php -S localhost:8000 -t public
```
