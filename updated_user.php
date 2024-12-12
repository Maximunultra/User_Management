<?php
require 'constant/config.php';

// Get the data from the request body
$data = json_decode(file_get_contents('php://input'), true);

// Check if data is valid
if ($data) {
    try {
        // Prepare the SQL query to update the user
        $stmt = $conn->prepare("UPDATE users SET
            First_Name = :First_Name, 
            Middle_Name = :Middle_Name, 
            Last_Name = :Last_Name, 
            Gender = :Gender,
            Age = :Age, 
            Email = :Email, 
            Role = :Role, 
            Status = :Status, 
            Username = :Username, 
            Password = :Password 
            WHERE id = :id");

        // Execute the query with the data
        $stmt->execute([
            ':First_Name' => $data['First_Name'],
            ':Middle_Name' => $data['Middle_Name'],
            ':Last_Name' => $data['Last_Name'],
            ':Gender' => $data['Gender'],
            ':Age' => $data['Age'],
            ':Email' => $data['Email'],
            ':Role' => $data['Role'],
            ':Status' => $data['Status'],
            ':Username' => $data['Username'],
            ':Password' => $data['Password'],
            ':id' => $data['id'], // Use the ID from the request
        ]);

        echo json_encode(['success' => true]);
    } catch (PDOException $e) {
        echo json_encode(['error' => $e->getMessage()]);
    }
} else {
    echo json_encode(['error' => 'Invalid data']);
}
?>
