-- Create the database
CREATE DATABASE IF NOT EXISTS webdata;

-- Use the database
USE webdata;

-- Create the users table
CREATE TABLE IF NOT EXISTS users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(50) NOT NULL
);

-- Create the games table
CREATE TABLE IF NOT EXISTS games (
    game_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    title VARCHAR(100) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);

-- Insert sample users
INSERT INTO users (username, password) VALUES
('john_doe', 'password123'),
('jane_smith', 'abc@123'),
('bob_jackson', 'passw0rd!'),
('emily_davis', 'secure_password'),
('michael_wilson', 'P@55w0rd!');

-- Insert sample games
INSERT INTO games (user_id, title, price) VALUES
(1, 'Shadow of the Colossus', 19.99),
(2, 'Eternal Horizon', 29.99),
(3, 'Mystic Quest', 14.99),
(4, 'Legends of Avalon', 24.99),
(5, 'Galactic Odyssey', 39.99);
