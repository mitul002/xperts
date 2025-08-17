-- XPERTS PROJECT DATABASE STRUCTURE
-- Simple database setup for the project

-- Create database
CREATE DATABASE IF NOT EXISTS xperts_db;
USE xperts_db;

-- Users table for login/signup
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Sample data for testing
INSERT INTO users (username, email, password) VALUES
('testuser', 'test@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'), -- password: password
('demo', 'demo@xperts.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi');    -- password: password

-- Optional: Orders table for future expansion
CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    service_name VARCHAR(100),
    provider_name VARCHAR(100),
    price DECIMAL(10,2),
    status ENUM('pending', 'ongoing', 'completed', 'cancelled') DEFAULT 'pending',
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Sample orders
INSERT INTO orders (user_id, service_name, provider_name, price, status) VALUES
(1, 'Electrical Repair', 'Molly Clark', 75.00, 'ongoing'),
(1, 'Home Cleaning', 'Ivy Adams', 120.00, 'completed'),
(1, 'Plumbing Service', 'Bob Johnson', 90.00, 'completed');
