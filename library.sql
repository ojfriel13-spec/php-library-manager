CREATE DATABASE IF NOT EXISTS library;

USE library;

CREATE TABLE IF NOT EXISTS books (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    author VARCHAR(255) NOT NULL,
    genre VARCHAR(100),
    year INT,
    available TINYINT(1) DEFAULT 1
);

INSERT INTO books (title, author, genre, year, available) VALUES
('The Pragmatic Programmer', 'Andrew Hunt', 'Technology', 1999, 1),
('Clean Code', 'Robert C. Martin', 'Technology', 2008, 1),
('You Don\'t Know JS', 'Kyle Simpson', 'Technology', 2015, 1);
