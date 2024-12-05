<head>
    <link rel="stylesheet" href="./assets/style.css">
</head>
<table>
<input type="text" id="searchInput" placeholder="Search users...">

    <thead>
        <tr>
            <th>Full Name</th>
            <th>Gender</th>
            <th>Age</th>
            <th>Birthdate</th>
            <th>Email</th>
            <th>Role</th>
            <th>Status</th>
            <th>Username</th>
            <th>Password</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include 'constant/config.php';

        try {
            // Prepare the query to fetch all users
            $stmt = $conn->prepare("SELECT * FROM users");
            $stmt->execute();

            // Fetch results as associative array
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                // Combine First_Name, Middle_Name, and Last_Name for the Full Name
                $fullName = "{$row['First_Name']} {$row['Middle_Name']} {$row['Last_Name']}";

                // Convert Status to a readable format
                $status = $row['Status'] == 'active' ? 'Active' : 'Inactive';

                echo "<tr>
                        <td>{$fullName}</td>
                        <td>{$row['Gender']}</td>
                        <td>{$row['Age']}</td>
                        <td>{$row['Birthdate']}</td>
                        <td>{$row['Email']}</td>
                        <td>{$row['Role']}</td>
                        <td>{$status}</td>
                        <td>{$row['Username']}</td>
                        <td>{$row['Password']}</td>
                        <td>
                            <a href='edit_user.php?id={$row['ID']}'>Edit</a> |
                            <a href='delete_user.php?id={$row['ID']}' onclick='return confirm(\"Are you sure you want to delete this user?\")'>Delete</a>
                        </td>
                      </tr>";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        ?>
    </tbody>
</table>

<!-- Statistic of User-->
<?php
// Using PDO for database interaction
try {
    // Query to get total users
    $stmt = $conn->prepare("SELECT COUNT(*) as count FROM users");
    $stmt->execute();
    $total_users = $stmt->fetch(PDO::FETCH_ASSOC)['count'];

    // Query to get active users
    $stmt = $conn->prepare("SELECT COUNT(*) as count FROM users WHERE status='active'");
    $stmt->execute();
    $active_users = $stmt->fetch(PDO::FETCH_ASSOC)['count'];

    // Calculate inactive users
    $inactive_users = $total_users - $active_users;
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<div>
    <p>Total Users: <?php echo $total_users; ?></p>
    <p>Active Users: <?php echo $active_users; ?></p>
    <p>Inactive Users: <?php echo $inactive_users; ?></p>
</div>


<script>
    document.getElementById('searchInput').addEventListener('keyup', function () {
    const filter = this.value.toLowerCase();
    const rows = document.querySelectorAll('tbody tr');

    rows.forEach(row => {
        const text = row.textContent.toLowerCase();
        row.style.display = text.includes(filter) ? '' : 'none';
    });
});

</script>




