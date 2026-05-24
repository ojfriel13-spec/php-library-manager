# PHP Library Manager

A simple CRUD web application built with PHP and MySQL for managing a library book catalogue.

## Built With

- PHP
- MySQL (PDO)
- HTML / CSS

## Features

- View all books in the library
- Add new books with form validation
- Edit existing book details
- Delete books with a confirmation prompt
- Availability tracking (in/out)

## Pages

- `index.php` — lists all books in a table
- `add.php` — form to add a new book
- `edit.php` — form to edit an existing book
- `delete.php` — handles deletion and redirects back
- `config.php` — database connection using PDO

## Setup

1. Import `library.sql` into your MySQL database
2. Update `config.php` with your database credentials
3. Run with a local server such as XAMPP or WAMP

## Notes

Built to practise PHP server-side development, PDO database interaction, form validation, and basic CRUD operations.
