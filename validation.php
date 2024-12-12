<?php
include 'constant/config.php';
session_start();

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $error_message = '';

    try {
        // Prepare and execute the query
        $query = "SELECT * FROM users WHERE Username = :username";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($password == $row['Password']) {
                // Successful login, check user status
                $status = $row['Status'];
                $_SESSION['ID'] = $row['ID'];
                
                if ($status == 'Active') {
                    $_SESSION['admin'] = $row['Username'];
                    header("Location: /User_Management/dashboard.php");
                    exit();
                } elseif ($status == 'Inactive') {
                    $error_message = 'Your account is inactive. Please contact the administrator.';
                }
            } else {
                $error_message = 'Invalid Password.';
            }
        } else {
            $error_message = 'Invalid Username.';
        }
    } catch (PDOException $e) {
        $error_message = "Error: " . $e->getMessage();
    }

    // Pass error message to the frontend
    if (!empty($error_message)) {
        $_SESSION['error_message'] = $error_message;
        header("Location: /User_Management/log.php"); // Reload the login page
        exit();
    }
}
?>
