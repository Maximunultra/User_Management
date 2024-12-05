<?php 
require_once 'constant/config.php'; // Include your database connection file

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $birth = $_POST['birthdate'];
    $age = $_POST['age'];
    $role = $_POST['role'];
    $status = $_POST['status'];
    $uname = $_POST['username'];
    $pass = $_POST['password'];

    // SQL query to update user details
    $sql = "UPDATE users 
            SET 
                First_Name = :fname, 
                Middle_Name = :mname, 
                Last_Name = :lname, 
                Gender = :gender, 
                Age = :age, 
                Birthdate = :birth, 
                Email = :email, 
                Role = :role, 
                Status = :status, 
                Username = :uname, 
                Password = :pass 
            WHERE id = :id";

    try {
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':fname', $fname);
        $stmt->bindParam(':mname', $mname);
        $stmt->bindParam(':lname', $lname);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':birth', $birth);
        $stmt->bindParam(':age', $age);
        $stmt->bindParam(':role', $role);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':uname', $uname);
        $stmt->bindParam(':pass', $pass);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        echo "<script>alert('Record updated successfully.'); window.location.href='index.php';</script>";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} 

if (isset($_GET['id'])) {
    $id = $_GET['id']; 
    $sql = "SELECT * FROM users WHERE id = :id";
    try {
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $fname = $row["First_Name"];
            $mname = $row["Middle_Name"];
            $lname = $row["Last_Name"];
            $gender = $row["Gender"];
            $age = $row["Age"];
            $birth = $row["Birthdate"];
            $email = $row["Email"];
            $role = $row["Role"];
            $status = $row["Status"];
            $uname = $row["Username"];
            $pass = $row["Password"];
        } else {
            header('Location: index.php');
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="./assets/style.css">
</head>
<body>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <h2>Edit User</h2>
        <label for="fname">First Name</label>
        <input type="text" name="fname" value="<?php echo $fname; ?>" required>
        
        <label for="mname">Middle Name</label>
        <input type="text" name="mname" value="<?php echo $mname; ?>">

        <label for="lname">Last Name</label>
        <input type="text" name="lname" value="<?php echo $lname; ?>" required>

        <label for="gender">Gender</label>
        <select name="gender" required>
            <option value="Male" <?php echo $gender == 'Male' ? 'selected' : ''; ?>>Male</option>
            <option value="Female" <?php echo $gender == 'Female' ? 'selected' : ''; ?>>Female</option>
        </select>

        <label for="age">Age</label>
        <input type="number" name="age" value="<?php echo $age; ?>" required>

        <label for="birthdate">Birthdate</label>
        <input type="date" name="birthdate" value="<?php echo $birth; ?>" required>

        <label for="email">Email</label>
        <input type="email" name="email" value="<?php echo $email; ?>" required>

        <label for="role">Role</label>
        <select name="role" required>
            <option value="Admin" <?php echo $role == 'Admin' ? 'selected' : ''; ?>>Admin</option>
            <option value="User" <?php echo $role == 'User' ? 'selected' : ''; ?>>User</option>
        </select>

        <label for="status">Status</label>
        <select name="status" required>
            <option value="Active" <?php echo $status == 'Active' ? 'selected' : ''; ?>>Active</option>
            <option value="Inactive" <?php echo $status == 'Inactive' ? 'selected' : ''; ?>>Inactive</option>
        </select>

        <label for="username">Username</label>
        <input type="text" name="username" value="<?php echo $uname; ?>" required>

        <label for="password">Password</label>
        <input type="text" name="password" value="<?php echo $pass; ?>" required>

        <input type="submit" name="update" value="Update">
    </form>
</body>
</html>
