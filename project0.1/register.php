<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Virtual Art Gallery</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Advanced CSS Styling */
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #89f7fe, #66a6ff);
            background-image: url(images/index.jpg);
            margin: 0;
            padding: 0;
            display: flex;
            color:black;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-image: url(images/register.jpg);
            background-size: 100% 100%;
        }

        .container {
            background-color: #ffffff;
            background-image: url(images/register.jpg);
            background-size: 99.9% 98.0%;
            border-radius: 15px;
            box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.2);
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
            color:black;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 14px;
        }

        button {
            background-color:#737373;
            background-image: url(images/register.jpg);
            background-size: 100% 100%;
            color:black;
            border: none;
            padding: 12px 20px;
            font-size: 16px;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        button:hover {
            background-color:#FDE6E6;
            transform: scale(1.05);
        }

        p {
            margin: 10px 0 0;
            color: black;
        }

        a {
            color: purple;            ;
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
        <h1>Register - Virtual Art Gallery</h1>
        <?php
        // PHP Backend Code
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            require 'database.php'; // Ensure this file connects to your database

            $username = $_POST['username'];
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

            // Prepare the SQL query to insert user details
            $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
            try {
                $stmt->execute([$username, $password]);
                echo "<p class='success'>Registration successful! <a href='login.php'>Login here</a></p>";
            } catch (PDOException $e) {
                if ($e->errorInfo[1] === 1062) { // Error code for duplicate entry
                    echo "<p class='error'>Username already exists. <a href='register.php'>Try again</a></p>";
                } else {
                    echo "<p class='error'>Error: " . $e->getMessage() . "</p>";
                }
            }
        }
        ?>
        <form id="register-form" method="POST" action="">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Register</button>
        </form>
        <p>Already have an account? <a href="login.php">Login here</a>.</p>
    </div>
</body>
</html>
