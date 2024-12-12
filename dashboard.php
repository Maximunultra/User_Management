<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="stylesheet" href="./assets/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  
</head>
<body>
  <?php 
    include './assets/dashboard.html';
    ?>
<div class="admin-container">
  <h6>User Management System</h6>
    <!-- Search Bar with Button -->
    
    <!-- Sorting-->
    <div class="sorting">
      <label for="sort-users">Sort by:</label>
        <select id="sort-users">
        <option>Select</option>
          <option value="name">Name</option>
          <option value="role">Role</option>
          <option value="registration_date">Registration Date</option>
        </select>
    </div>

    <div id="user-statistics" class="statistics">
    <h2>User Statistics</h2>
    <p>Total Users: <span id="total-users">0</span></p>
    <p>Active Users: <span id="active-users">0</span></p>
    <p>Inactive Users: <span id="inactive-users">0</span></p>
</div>
  <div id="user-table"></div>
</div>

  

<script type="module" src="js/users.js"></script>

</body>
</html>