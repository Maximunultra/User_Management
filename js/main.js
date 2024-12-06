import { fetchUsers, addUser, deleteUser, updateUser } from './api.js';
import { renderUsers, setupEventListeners } from './dom.js';

async function loadUsers() {
    const users = await fetchUsers();
    renderUsers(users);
}

async function handleAddUser() {
    const userData = {
        First_Name: prompt("Enter First Name:"),
        Middle_Name: prompt("Enter Middle Name:"),
        Last_Name: prompt("Enter Last Name:"),
        Gender: prompt("Enter Gender:"),
        Age: prompt("Enter Age:"),
        Birthdate: prompt("Enter Birthdate (YYYY-MM-DD):"),
        Email: prompt("Enter Email:"),
        Role: prompt("Enter Role:"),
        Status: prompt("Enter Status (e.g., Active):"),
        Username: prompt("Enter Username:"),
        Password: prompt("Enter Password:")
    };

    if (userData.First_Name && userData.Email && userData.Username) {
        await addUser(userData);
        loadUsers();
    }
}

async function handleDeleteUser(id) {
    const confirmDelete = confirm('Are you sure you want to delete this user?');
    if (confirmDelete) {
        await deleteUser(id);
        loadUsers();
    }
}

async function handleEditUser(userId) {
    const response = await fetch(`/User_Management/get_user.php?id=${userId}`);
    const user = await response.json();

    // Populate the form with the current user data
    document.getElementById('edit-first-name').value = user.First_Name;
    document.getElementById('edit-middle-name').value = user.Middle_Name;
    document.getElementById('edit-last-name').value = user.Last_Name;
    document.getElementById('edit-gender').value = user.Gender;
    document.getElementById('edit-age').value = user.Age;
    document.getElementById('edit-email').value = user.Email;
    document.getElementById('edit-role').value = user.Role;
    document.getElementById('edit-status').value = user.Status;
    document.getElementById('edit-username').value = user.Username;
    document.getElementById('edit-password').value = ''; // Don't pre-fill password

    // Show the form
    document.getElementById('edit-user-form').style.display = 'block';

    // Handle form submission
    document.getElementById('user-edit-form').onsubmit = async function (event) {
        event.preventDefault();

        const updatedUser = {
            id: userId,
            First_Name: document.getElementById('edit-first-name').value,
            Middle_Name: document.getElementById('edit-middle-name').value,
            Last_Name: document.getElementById('edit-last-name').value,
            Gender: document.getElementById('edit-gender').value,
            Age: document.getElementById('edit-age').value,
            Email: document.getElementById('edit-email').value,
            Role: document.getElementById('edit-role').value,
            Status: document.getElementById('edit-status').value,
            Username: document.getElementById('edit-username').value,
            Password: document.getElementById('edit-password').value,
        };

        // Send the updated data to the backend
        await updateUser(updatedUser);


        // Reload users
        loadUsers();

        // Hide the form
        document.getElementById('edit-user-form').style.display = 'none';
    };

    // Handle cancel button click
    document.getElementById('cancel-edit').onclick = function () {
        document.getElementById('edit-user-form').style.display = 'none';
    };
}

loadUsers();
setupEventListeners(handleAddUser, handleDeleteUser, handleEditUser);
