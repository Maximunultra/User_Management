<?php
require 'constant/config.php';
try {
    $stmt = $conn->query("SELECT id,First_Name, Middle_Name, Last_Name, Gender, Age,Birthdate, Email, Role, Status,Username, Password ,Created_Time FROM users");
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($users);
} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}


?>
