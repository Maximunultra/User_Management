export function renderUsers(users) {
  const userTable = document.getElementById('user-table');
  userTable.innerHTML = `
      <table>
          <thead>
              <tr>
                  <th>ID</th>
                  <th>First Name</th>
                  <th>Middle Name</th>
                  <th>Last Name</th>
                  <th>Gender</th>
                  <th>Age</th>
                  <th>Email</th>
                  <th>Role</th>
                  <th>Status</th>
                  <th>Actions</th>
              </tr>
          </thead>
          <tbody>
              ${users
                  .map(
                      (user) => `
                  <tr><td>${user.id}</td>
                      <td>${user.First_Name}</td>
                      <td>${user.Middle_Name}</td>
                      <td>${user.Last_Name}</td>
                      <td>${user.Gender}</td>
                      <td>${user.Age}</td>
                      <td>${user.Email}</td>
                      <td>${user.Role}</td>
                      <td>${user.Status}</td>
                      <td>
                         <button class="edit-btn" data-id="${user.id}">Edit</button>
                          <button class="delete-btn" data-id="${user.id}">Delete</button>
                      </td>
                  </tr>`
                  )
                  .join('')}
          </tbody>
      </table>
  `;
}

export function setupEventListeners(addUserCallback, deleteUserCallback, editUserCallback) {
    document.getElementById('add-user-btn').addEventListener('click', addUserCallback);

    document.addEventListener('click', (event) => {
        // Handle delete button click
        if (event.target.classList.contains('delete-btn')) {
            const userId = event.target.getAttribute('data-id');
            deleteUserCallback(userId);
        }

        // Handle edit button click
        if (event.target.classList.contains('edit-btn')) {
            const userId = event.target.getAttribute('data-id');
            editUserCallback(userId); // Pass user ID to edit callback
        }
    });
}

