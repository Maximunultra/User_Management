<?php
// Include database configuration
include 'constant/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve sanitized inputs from the form
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $gender = $_POST['gender'];
    $birth = $_POST['birth'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $status = $_POST['status'];
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];
    try {
        // SQL Query to insert user details into the database
        $query = "INSERT INTO users (first_name, middle_name, last_name, gender, birthdate, age, email, role, status, username, password) 
                  VALUES (:fname, :mname, :lname, :gender, :birth, :age, :email, :role, :status, :uname, :Pass)";
        $stmt = $conn->prepare($query);

        // Bind parameters
        $stmt->bindValue(':fname', $fname);
        $stmt->bindValue(':mname', $mname);
        $stmt->bindValue(':lname', $lname);
        $stmt->bindValue(':gender', $gender);
        $stmt->bindValue(':birth', $birth);
        $stmt->bindValue(':age', $age);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':role', $role);
        $stmt->bindValue(':status', $status);
        $stmt->bindValue(':uname', $uname);
        $stmt->bindValue(':Pass', $pass);

        // Execute the query
        if ($stmt->execute()) {
            echo "User registered successfully.";
        } else {
            echo "Failed to register the user.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>