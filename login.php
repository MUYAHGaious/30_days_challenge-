<?php
session_start();


$servername = 'localhost';  
$username = 'root';
$password = 'muyah'; 
$dbname = 'portfolio_db';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT password FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("s", $email);

    if (!$stmt->execute()) {
        die("Execute failed: " . $stmt->error);
    }

    $stmt->store_result();
    $stmt->bind_result($hashed_password);

    if ($stmt->fetch()) {
        if (password_verify($password, $hashed_password)) {
            $_SESSION['user'] = $email;
            echo "Login successful!";
        } else {
            echo "Invalid password!";
        }
    } else {
        echo "No user found with that email!";
    }

    $stmt->close();
    
    header("Location: dashboard.php");
}

$conn->close();


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        *,*::before, *::after   {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        html    {
            font-family: 'Courier New', Courier, monospace;
            font-size: 62.5%;
        }

        body    {
            background-image: url('img/lava.jpg');
            background-size: cover;
            background-position: center;
        }

        body::before    {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgb(0, 0, 0, 0.5);
            pointer-events: none;

        }
        .container  {
            
            padding: 60px;
            width: 600px;
            margin: auto;
            margin-top: 45px;
            box-shadow: 2px 2px 30px rgb(222, 1, 1);
            backdrop-filter: blur(10px);
        }
        input, button   {
            width: 100%;
            margin-bottom: 10px;
            border:1px solid skyblue;
            padding: 10px;
            font-family: inherit;
            border-radius: 5px;
            
        }
        h1 {
            text-align: center;
            margin-bottom: 10px;
            font-size: 6rem;
            color: rgb(222, 1, 1);
            backdrop-filter: blur(10px);
        }

        button  {
            background-color: rgb(222, 1, 1);
            border: none;
            color: rgb(255, 255, 255);
            transition: all 0.5s ease-in-out;
        }

        button:hover    {
            background-color: rgb(222, 1, 1, 0.5);
            
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Login</h1>
        <form action="" method="post">
            <input type="email" name="email" id="email" placeholder="Email" required>

            <input type="password" name="password" id="password" placeholder="password" required>

            <button type="submit" name="login" value="Login">Login</button>
        </form>
    </div>
    
</body>
</html>