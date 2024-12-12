<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management System</title>
    <link rel="stylesheet" href="./assets/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

</head>
<body>
    <?php 
    include './assets/users.html';
    ?>
<div class="admin-container">
  <h6>User Management System</h6>
    <!-- Search Bar with Button -->
    <div class="search">
        <div>
            <input type="text" id="search-bar" placeholder="Search by First or Last Name" / >
         <button id="search-btn" class="btn">Search</button></div>
         <div>
         <button id="add-user-btn" class="btn save-btn">Add User</button>
         </div>
    </div>
 
  <div id="user-table"></div>
</div>


<div id="edit-user-modal" class="modal">
    <div class="modal-content">
        <span id="close-modal" class="close">&times;</span>
        <h2>Edit User</h2>
        <form id="user-edit-form">
            <div class="form-group">
                <label for="edit-first-name">First Name:</label>
                <input type="text" id="edit-first-name" required />
            </div>
            <div class="form-group">
                <label for="edit-middle-name">Middle Name:</label>
                <input type="text" id="edit-middle-name" />
            </div>
            <div class="form-group">
                <label for="edit-last-name">Last Name:</label>
                <input type="text" id="edit-last-name" required />
            </div>
            <div class="form-group">
                <label for="edit-gender">Gender:</label>
                <select id="edit-gender">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            <div class="form-group">
                <label for="edit-age">Age:</label>
                <input type="number" id="edit-age" required />
            </div>
            <div class="form-group">
                <label for="edit-birthdate">Birthdate:</label>
                <input type="date" id="edit-birthdate" required />
            </div>
            <div class="form-group">
                <label for="edit-email">Email:</label>
                <input type="email" id="edit-email" required />
            </div>
            <div class="form-group">
                <label for="edit-role">Role:</label>
                <input type="text" id="edit-role" required />
            </div>
            <div class="form-group">
                <label for="edit-status">Status:</label>
                <input type="text" id="edit-status" required />
            </div>
            <div class="form-group">
                <label for="edit-username">Username:</label>
                <input type="text" id="edit-username" required />
            </div>
            <div class="form-group">
                <label for="edit-password">Password:</label>
                <input type="password" id="edit-password" />
            </div>
            <div class="form-buttons">
                <button type="submit" class="btn save-btn">Save Changes</button>
                <button type="button" id="cancel-edit" class="btn cancel-btn">Cancel</button>
            </div>
        </form>
    </div>
</div>

<!-- Add User Modal -->
<div id="add-user-modal" class="modal">
    <div class="modal-content">
        <span id="close-add-modal" class="close">&times;</span>
        <h2>Add New User</h2>
        <form id="add-user-form">
            <div class="form-group">
                <label for="add-first-name">First Name:</label>
                <input type="text" id="add-first-name" required />
            </div>
            <div class="form-group">
                <label for="add-middle-name">Middle Name:</label>
                <input type="text" id="add-middle-name" />
            </div>
            <div class="form-group">
                <label for="add-last-name">Last Name:</label>
                <input type="text" id="add-last-name" required />
            </div>
            <div class="form-group">
                <label for="add-gender">Gender:</label>
                <select id="add-gender" required>
                    <option value="">Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            <div class="form-group">
                <label for="add-age">Age:</label>
                <input type="number" id="add-age" required />
            </div>
            <div class="form-group">
                <label for="add-birthdate">Birthdate:</label>
                <input type="date" id="add-birthdate" required />
            </div>
            <div class="form-group">
                <label for="add-email">Email:</label>
                <input type="email" id="add-email" required />
            </div>
            <div class="form-group">
                <label for="add-role">Role:</label>
                <input type="text" id="add-role" required />
            </div>
            <div class="form-group">
                <label for="add-status">Status:</label>
                <input type="text" id="add-status" required />
            </div>
            <div class="form-group">
                <label for="add-username">Username:</label>
                <input type="text" id="add-username" required />
            </div>
            <div class="form-group">
                <label for="add-password">Password:</label>
                <input type="password" id="add-password" required />
            </div>
            <div class="form-buttons">
                <button type="submit" class="btn save-btn">Add User</button>
                <button type="button" id="cancel-add" class="btn cancel-btn">Cancel</button>
            </div>
        </form>
    </div>
</div>



 <script type="module" src="js/main.js">
        // Close modal when clicking the close button
document.getElementById('close-modal').onclick = function () {
    document.getElementById('edit-user-modal').style.display = 'none';
};

// Close modal when clicking the cancel button in the form
document.getElementById('cancel-edit').onclick = function () {
    document.getElementById('edit-user-modal').style.display = 'none';
};

// Close modal when clicking outside the modal content
window.onclick = function (event) {
    const modal = document.getElementById('edit-user-modal');
    if (event.target === modal) {
        modal.style.display = 'none';
    }
};

    </script>
</body>
</html>
