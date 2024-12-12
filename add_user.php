<?php
require 'constant/config.php';

$data = json_decode(file_get_contents("php://input"), true);

$firstName = $data['First_Name'];
$middleName = $data['Middle_Name'];
$lastName = $data['Last_Name'];
$gender = $data['Gender'];
$age = $data['Age'];
$birthdate = $data['Birthdate'];
$email = $data['Email'];
$role = $data['Role'];
$status = $data['Status'];
$username = $data['Username'];
$password = password_hash($data['Password'], PASSWORD_DEFAULT);

try {
    $stmt = $conn->prepare("INSERT INTO users (First_Name, Middle_Name, Last_Name, Gender, Age, Birthdate, Email, Role, Status, Username, Password) 
                            VALUES (:firstName, :middleName, :lastName, :gender, :age, :birthdate, :email, :role, :status, :username, :password)");
    $stmt->execute([
        ':firstName' => $firstName,
        ':middleName' => $middleName,
        ':lastName' => $lastName,
        ':gender' => $gender,
        ':age' => $age,
        ':birthdate' => $birthdate,
        ':email' => $email,
        ':role' => $role,
        ':status' => $status,
        ':username' => $username,
        ':password' => $password
    ]);

    // Get the ID of the newly added user
    $newId = $conn->lastInsertId();

    // Return success along with the new user ID
    echo json_encode(['success' => true, 'id' => $newId]);

} catch (PDOException $e) {
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}
?>
