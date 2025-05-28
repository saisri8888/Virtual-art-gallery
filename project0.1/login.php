<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Virtual Art Gallery</title>
    <style>
        /* Advanced CSS Styling */
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #ff9a9e, #fad0c4);
            background-image: url(images/login.jpg);
            background-size: 99.9% 100%;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.2);
            background-image: url(images/login.jpg);
            width: 400px;
            padding: 20px;
            text-align: center;
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
            font-size: 28px;
        }

        label {
            display: block;
            margin: 10px 0 5px;
            font-weight: bold;
            color: #555;
        }

        input[type="text"],
        input[type="password"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 14px;
        }

        button {
            background-color:#F8CECE;
            background-image: url(images/login.jpg);
            color: #fff;
            border: none;
            padding: 12px 20px;
            font-size: 16px;
            color:black;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        button:hover {
            background-color: #85b5dc;
            transform: scale(1.05);
        }

        p {
            margin: 10px 0 0;
            color: #777;
        }

        a {
            color: green;
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }

        .success {
            color: green;
            font-weight: bold;
            margin: 20px 0;
        }

        .error {
            color: red;
            font-weight: bold;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Login - Virtual Art Gallery</h1>
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            require 'database.php'; // Ensure this connects to your database

            $username = $_POST['username'];
            $password = $_POST['password'];

            $stmt = $pdo->prepare("SELECT password FROM users WHERE username = ?");
            $stmt->execute([$username]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['password'])) {
                header('Location: main.php'); // Redirect to main page
                exit();
            } else {
                echo "<p class='error'>Invalid username or password. <a href='login.php'>Try again</a></p>";
            }
        }
        ?>
        <form id="login-form" method="POST" action="">
            <label for="login-username">Username:</label>
            <input type="text" id="login-username" name="username" required>

            <label for="login-password">Password:</label>
            <input type="password" id="login-password" name="password" required>

            <button type="submit">Login</button>
        </form>
        <p>Don't have an account? <a href="register.php">Register here</a>.</p>
    </div>
</body>
</html>
