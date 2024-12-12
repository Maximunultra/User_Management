<?php
include 'constant/config.php';
session_start();

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    try {
        // Prepare and execute the query
        $query = "SELECT * FROM users WHERE Username = :username";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($password == $row['Password']) {
                // Successful login, check user role
                $role = $row['Role'];
                $_SESSION['ID'] = $row['ID'];

                if ($role == 'User') {
                    $_SESSION['User'] = $row['Username'];
                    header("Location: /User_Management/breed_tool.php");
                    exit();
                    if ($status == 'Active') {
                        $_SESSION['User'] = $row['Username'];
                        exit();
                    } elseif ($status == 'Inactive') {
                        $error_message = 'Your account is inactive. Please contact the administrator.';
                    }
                }
            } else {
                echo 'Invalid username or password.';
            }
        } else {
            echo 'Invalid username or password.';
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
