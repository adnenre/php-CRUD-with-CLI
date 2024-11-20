# PHP CRUD WITH CLI

This is a simple PHP CLI application that performs basic CRUD (Create, Read, Update, Delete) operations on a user table in a MySQL database using PDO (PHP Data Objects). The script interacts with the database through a Command-Line Interface (CLI) and outputs results as JSON in the terminal.

## Prerequisites

Before running the script, make sure you have the following:

- PHP (Version 7.4 or higher)
- Composer (for dependency management)
- MySQL or MariaDB database running
- A `.env` file configured with your database credentials

## Installation

### Step 1: Clone the Repository

Clone this repository to your local machine:

```bash
git clone https://github.com/yourusername/php-with-CRUD-cli.git
cd php-crud-with-cli
composer install
```

### Step 2: Install Dependencies

```bash
composer install
```

### Step 3: Set Up Environment Variables

modifie the name of .env.example file in the root directory of the project and configure the database credentials:

### Step 4: Set Up Database

```sql
CREATE DATABASE your_database_name;

USE your_database_name;

```

### Step 5: Run the CLI Script

```bash
php public/CLI.php
```

### CLI Menu and Commands

## PHP PDO CRUD CLI

Choose an option:

1. Create User
2. Read All Users
3. Read User by ID
4. Update User
5. Delete User
6. Exit
   Your choice:
