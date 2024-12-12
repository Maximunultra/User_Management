<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="./assets/log.css">
    <script>
        function closeModal() {
    const modal = document.getElementById("error-modal");
    if (modal) {
        modal.style.display = "none";
        window.location.href = "log.php";
    }
}

window.addEventListener("click", (event) => {
    const modal = document.getElementById("error-modal");
    if (modal && event.target === modal) {
        closeModal();
    }
});

    </script>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form method="post" action="validation.php">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <input class="btn" type="submit" name="submit" value="Login">
        </form>
    </div>

    <!-- Error Modal -->
    <?php
    session_start();
    if (isset($_SESSION['error_message'])) {
        echo '
        <div id="error-modal" class="modal">
            <div class="modal-content">
                <span class="close-btn" onclick="closeModal()">&times;</span>
                <p>' . $_SESSION['error_message'] . '</p>
            </div>
        </div>
        ';
        unset($_SESSION['error_message']); // Clear the error message
    }
    ?>
</body>
</html>
