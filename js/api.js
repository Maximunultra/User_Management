// api.js

// Function to fetch users
export async function fetchUsers() {
  const response = await fetch('/User_Management/fetch_users.php');
  return await response.json();
}

// Function to add a new user
export async function addUser(userData) {
  const response = await fetch('/User_Management/add_user.php', {
      method: 'POST',
      headers: {
          'Content-Type': 'application/json',
      },
      body: JSON.stringify(userData),
  });
  return await response.json();
}

// Function to delete a user
export async function deleteUser(id) {
  const response = await fetch(`/User_Management/delete_user.php?id=${id}`, {
      method: 'DELETE',
  });
  return await response.json();
}

// Function to update an existing user
export async function updateUser(updatedUser) {
  const response = await fetch('/User_Management/updated_user.php', {
      method: 'POST',
      headers: {
          'Content-Type': 'application/json',
      },
      body: JSON.stringify(updatedUser),
  });

  const result = await response.json();
  return result;  // Return the result of the update (success or error)
}
