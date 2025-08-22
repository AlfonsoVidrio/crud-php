# CRUD PHP

A simple CRUD (Create, Read, Update, Delete) system developed in PHP with MySQL and Bootstrap for user management.

## 📋 Features

- ✅ **Create** new users
- ✅ **Read** and display user list
- ✅ **Update** existing user information
- ✅ **Delete** users with confirmation
- ✅ Feedback messages with auto-hide
- ✅ Required field validation

## 🛠️ Technologies Used

- **Backend:** PHP 8+
- **Database:** MySQL
- **Frontend:** HTML5, CSS3, Bootstrap 5
- **Icons:** Bootstrap Icons
- **JavaScript:** For confirmations and messages

## 📦 Project Structure

```
CRUD_php/
├── controller/          # Application controllers
│   ├── register.php    # User registration logic
│   ├── edit.php        # User update logic
│   └── delete.php      # User deletion logic
├── model/              # Data model
│   └── connection.php  # Database connection
├── utils/              # Utilities
│   └── messages.php    # Function to display messages
├── edit.php           # User editing page
├── index.php          # Main page
└── README.md          # This file
```

## 🚀 Installation

1. **Clone the repository:**
   ```bash
   git clone https://github.com/AlfonsoVidrio/crud-php.git
   cd crud-php
   ```

2. **Configure the database:**
   - Create a database named `crud_php`
   - Execute the following SQL to create the table:

   ```sql
   CREATE TABLE users (
       id INT AUTO_INCREMENT PRIMARY KEY,
       name VARCHAR(100) NOT NULL,
       lastname VARCHAR(100) NOT NULL,
       dni VARCHAR(20) NOT NULL UNIQUE,
       birthday DATE NOT NULL,
       email VARCHAR(150) NOT NULL UNIQUE
   );
   ```

3. **Configure the connection:**
   - Edit `model/connection.php` with your database credentials:
   ```php
   $connection = new mysqli("localhost", "your_username", "your_password", "crud_php", 3306);
   ```

4. **Start the server:**
   ```bash
   php -S localhost:8000
   ```

5. **Access the application:**
   Open your browser at `http://localhost:8000`

## 📸 Screenshot
<img width="1920" height="868" alt="crud-php" src="https://github.com/user-attachments/assets/e443b969-ae6f-4bc8-98b1-292788e3a130" />

