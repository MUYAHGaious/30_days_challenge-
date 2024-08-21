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

if (isset($_POST['register'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    
    $sql = "INSERT INTO users (first_name, last_name, email, password) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $first_name, $last_name, $email, $hashed_password);
    if ($stmt->execute()) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $stmt->error;
    }
    header("Location: dashboard.php");
}

$conn->close();



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
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
        h1  {
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

        .profile_img  {
            display: flex;
            justify-content: center;
            width: 100%;
            height: auto;
            border-radius: 50%;
            }

            textarea{
                width: 100%;
                min-height: 100px;
                margin-bottom: 10px;
            }
    </style>
</head>
<body>
    <div class="container">
        <img  class="profile_img" src="img/lava3.jpg" alt="profile image" width="150px">
        <h1>Edit</h1>
        <form action="" method="post">
            <input type="text" name="first_name" id="first_name" placeholder="First Name" required>

            <input type="text" name="last_name" id="last_name" placeholder="Last Name" required>

            <input type="email" name="email" id="email" placeholder="Email" required>

            <input type="number" name="contact" placeholder="Contact">
            
            
            <textarea name="bio" id="bio" col="300" row="300" placeholder="Bio"></textarea>

            <button type="submit" name="register" value="Register">Save</button>
        </form>
    </div>
    
</body>
</html>