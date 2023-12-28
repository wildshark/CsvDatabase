# CsvDatabase Class

The `CsvDatabase` class is a PHP implementation for simple CRUD operations on data stored in CSV files. It provides methods to retrieve, create, update, and delete data in a CSV file representing a specific entity.

## How It Works

### Installation

1. Download the `CsvDatabase.php` file.
2. Include the file in your PHP project.

### Example Usage

```php
<?php
// Include the CsvDatabase class definition
include 'CsvDatabase.php';

// Initialize CsvDatabase for the "User" entity
$csvDatabase = new CsvDatabase('users.csv');

// Example 1: Get all users
$allUsers = $csvDatabase->getAll();
print_r($allUsers);

// Example 2: Get user by ID
$userById = $csvDatabase->getById(2);
print_r($userById);

// Example 3: Create a new user
$newUser = $csvDatabase->create([
    'name' => 'Alice Johnson',
    'email' => 'alice@example.com',
]);
print_r($newUser);

// Example 4: Update user
$updatedUser = $csvDatabase->update(3, [
    'name' => 'Robert Smith',
]);
print_r($updatedUser);

// Example 5: Delete user
$deletedUser = $csvDatabase->delete(1);
print_r($deletedUser);

// Verify changes
$updatedUsers = $csvDatabase->getAll();
print_r($updatedUsers);
?>
