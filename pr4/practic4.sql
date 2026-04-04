CREATE DATABASE guestbook

USE guestbook;

-- ТАБЛИЦЯ USERS
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL UNIQUE,
    date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- ТАБЛИЦЯ COMMENTS
CREATE TABLE comments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    name VARCHAR(100) NOT NULL,
    text TEXT NOT NULL,
    date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- отримати КОМЕНТАРІ
SELECT * FROM comments;

-- додати коментарі
INSERT INTO comments (email, name, text)
VALUES ('test@gmail.com', 'Karina', 'comment');

-- знайти користувача
SELECT * FROM users WHERE email = 'test@gmail.com';

-- додати користувача
INSERT INTO users (email, password)
VALUES ('test@gmail.com', '123456')
