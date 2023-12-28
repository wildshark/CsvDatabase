<?php
// Include the CsvDatabase class definition

// Example 1: Get all users
$csvDatabase = new CsvDatabase('users.csv');
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
