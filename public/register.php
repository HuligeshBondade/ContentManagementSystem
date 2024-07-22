<?php
session_start();
require 'C:\xampp\htdocs\cms\config\config.php';

// Registration Logic
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    $username = $_POST['reg_username'];
    $password = password_hash($_POST['reg_password'], PASSWORD_BCRYPT);

    $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);

    if ($stmt->execute()) {
        $reg_success = "Registration successful! You can now login.";
    } else {
        $reg_error = "Error: " . $stmt->error;
    }
}

// Login Logic
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        header("Location: admin_dashboard.php");
        exit();
    } else {
        $login_error = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Register - Simple CMS</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        header {
            background-color: #333;
            color: #fff;
            padding: 1rem 0;
            text-align: center;
        }
        main {
            margin: 2rem auto;
            max-width: 800px;
            padding: 1rem;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        form {
            display: flex;
            flex-direction: column;
        }
        form label {
            margin-top: 1rem;
        }
        form input {
            padding: 0.5rem;
            margin-top: 0.5rem;
        }
        form button {
            margin-top: 1rem;
            padding: 0.5rem;
            background-color: #333;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        form button:hover {
            background-color: #555;
        }
        .error {
            color: red;
            margin-top: 1rem;
        }
        .success {
            color: green;
            margin-top: 1rem;
        }
    </style>
</head>
<body>
    <header>
        <h1>Admin Login & Registration</h1>
    </header>
    <main>
        <section>
            <h2>Login</h2>
            <form id="loginForm" method="post" action="">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                <button type="submit" name="login">Login</button>
                <?php if (isset($login_error)) { echo '<p class="error">' . $login_error . '</p>'; } ?>
            </form>
        </section>
        <section>
            <h2>Register</h2>
            <form id="registerForm" method="post" action="">
                <label for="reg_username">Username:</label>
                <input type="text" id="reg_username" name="reg_username" required>
                <label for="reg_password">Password:</label>
                <input type="password" id="reg_password" name="reg_password" required>
                <button type="submit" name="register">Register</button>
                <?php if (isset($reg_success)) { echo '<p class="success">' . $reg_success . '</p>'; } ?>
                <?php if (isset($reg_error)) { echo '<p class="error">' . $reg_error . '</p>'; } ?>
            </form>
        </section>
    </main>
    <script>
        // Embedded JavaScript
        document.addEventListener("DOMContentLoaded", function() {
            const loginForm = document.getElementById('loginForm');
            const registerForm = document.getElementById('registerForm');

            loginForm.addEventListener('submit', function(event) {
                const username = document.getElementById('username').value.trim();
                const password = document.getElementById('password').value.trim();
                const errorMessage = document.querySelector('#loginForm .error');

                if (username === '' || password === '') {
                    event.preventDefault();
                    errorMessage.innerText = 'Please fill in both fields.';
                }
            });

            registerForm.addEventListener('submit', function(event) {
                const regUsername = document.getElementById('reg_username').value.trim();
                const regPassword = document.getElementById('reg_password').value.trim();
                const regErrorMessage = document.querySelector('#registerForm .error');

                if (regUsername === '' || regPassword === '') {
                    event.preventDefault();
                    regErrorMessage.innerText = 'Please fill in both fields.';
                }
            });
        });
    </script>
</body>
</html>
