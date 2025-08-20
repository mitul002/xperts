<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "xperts_db";

// Connect to MySQL (without selecting database first)
$connect = new mysqli($host, $user, $pass);
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}

// Create database if not exists
$connect->query("CREATE DATABASE IF NOT EXISTS $db");

// Select the database
$connect->select_db($db);

// Create users table if not exists
$createUsersTable = "
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
$connect->query($createUsersTable);
?>
