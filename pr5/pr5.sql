CREATE DATABASE guestbook;

USE guestbook;

CREATE TABLE comments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255),
    name VARCHAR(255),
    text TEXT,
    created_at DATETIME
);