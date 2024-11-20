<?php

namespace App;

use PDO;
use PDOException;

class Database {
    private PDO $pdo;

    public function connect(): PDO {
        try {
            $host = $_ENV['DB_HOST'];
            $db_name = $_ENV['DB_NAME'];
            $username = $_ENV['DB_USER'];
            $password = $_ENV['DB_PASSWORD'];
            $charset = $_ENV['DB_CHARSET'];

            $dsn = "mysql:host={$host};dbname={$db_name};charset={$charset}";
            $this->pdo = new PDO($dsn, $username, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Create `users` table if it doesn't exist
            $this->createTable();
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }

        return $this->pdo;
    }

    private function createTable(): void {
        $sql = "CREATE TABLE IF NOT EXISTS users (
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    username VARCHAR(50) NOT NULL UNIQUE,
                    email VARCHAR(100) NOT NULL UNIQUE,
                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                )";
        $this->pdo->exec($sql);
    }
}
