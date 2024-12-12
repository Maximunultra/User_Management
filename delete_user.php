<?php
require 'constant/config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id']; // Get the id from the query string

    try {
        // Prepare the delete statement
        $stmt = $conn->prepare("DELETE FROM users WHERE id = :id");
        $stmt->execute([':id' => $id]); // Execute the delete statement

        // Respond with JSON
        echo json_encode(['success' => true]);
    } catch (PDOException $e) {
        // Handle any error that occurs during deletion
        echo json_encode(['error' => $e->getMessage()]);
    }
} else {
    echo json_encode(['error' => 'ID parameter missing']);
}
?>