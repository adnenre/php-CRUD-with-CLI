<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Database;
use App\Models\User;
use App\Helpers\EnvLoader;

// Load environment variables
EnvLoader::load();

// Initialize database and user model
$database = new Database();
$pdo = $database->connect();
$user = new User($pdo);


echo "PHP PDO CRUD CLI\n";
echo "-----------------\n";

function showMenu() {
    echo "\nChoose an option:\n";
    echo "1. Create User\n";
    echo "2. Read All Users\n";
    echo "3. Read User by ID\n";
    echo "4. Update User\n";
    echo "5. Delete User\n";
    echo "6. Exit\n";
    echo "Your choice: ";
}
function jsonResponse($array) {
    echo json_encode($$array, JSON_PRETTY_PRINT) . "\n";
}
$choice = '';

while ($choice != 6) {
    showMenu();
    $response = fgets(STDIN);
    $choice = (int)trim($response); // Convert user input to an integer

    switch ($choice) {
        case 1:
            echo "Enter Username: ";
            $username = trim(fgets(STDIN));
            echo "Enter Email: ";
            $email = trim(fgets(STDIN));
            if ($user->create($username, $email)) {
                jsonResponse(["message" => "User created successfully."]);
            } else {
                jsonResponse(["error" => "Failed to create user."]);
            }
            break;

        case 2:
            $users = $user->readAll();
            jsonResponse($users);
            break;

        case 3:
            echo "Enter User ID: ";
            $id = (int)trim(fgets(STDIN));
            $userData = $user->readById($id);
            if ($userData) {
                jsonResponse($userData);
            } else {
                echo "User not found.\n";
            }
            break;

        case 4:
            echo "Enter User ID to Update: ";
            $id = (int)trim(fgets(STDIN));
            echo "Enter New Username: ";
            $username = trim(fgets(STDIN));
            echo "Enter New Email: ";
            $email = trim(fgets(STDIN));
            if ($user->update($id, $username, $email)) {
                echo "User updated successfully.\n";
            } else {
                echo "Failed to update user.\n";
            }
            break;

        case 5:
            echo "Enter User ID to Delete: ";
            $id = (int)trim(fgets(STDIN));
            if ($user->delete($id)) {
                echo "User deleted successfully.\n";
            } else {
                echo "Failed to delete user.\n";
            }
            break;

        case 6:
            echo "Exiting...\n";
            exit;

        default:
            echo "Invalid choice. Please select a valid option.\n";
            break;
    }
}
