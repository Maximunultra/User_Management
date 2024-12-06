<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management System</title>
</head>
<body>
    <div id="user-table">
        <!-- Table for displaying users -->
    </div>
    <button id="add-user-btn">Add User</button>

    <div id="edit-user-form" style="display: none;">
    <h2>Edit User</h2>
    <form id="user-edit-form">
        <label>First Name:</label>
        <input type="text" id="edit-first-name">
        <label>Middle Name:</label>
        <input type="text" id="edit-middle-name">
        <label>Last Name:</label>
        <input type="text" id="edit-last-name">
        <label>Gender:</label>
        <input type="text" id="edit-gender">
        <label>Age:</label>
        <input type="number" id="edit-age">
        <label>Email:</label>
        <input type="email" id="edit-email">
        <label>Role:</label>
        <input type="text" id="edit-role">
        <label>Status:</label>
        <input type="text" id="edit-status">
        <label>Username:</label>
        <input type="text" id="edit-username">
        <label>Password:</label>
        <input type="password" id="edit-password">
        <button type="submit">Save Changes</button>
        <button type="button" id="cancel-edit">Cancel</button>
    </form>
</div>

    <script type="module" src="js/main.js"></script>
</body>
</html>
