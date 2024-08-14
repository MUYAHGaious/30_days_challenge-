<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        *, *::before, *::after  {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            }

         body {
            font-family: Arial, sans-serif;
            background-color: rgb(0, 0, 0);
            display: flex;
            justify-content: center;
            align-items: center;
                
            }

        .login-container {
            background-color: rgb(0, 0, 0);
                color: rgb(255, 255, 255);
                padding: 20px;
                border-radius: 8px;
                box-shadow: 3px 2px 10px rgb(255, 0, 200);
                width: 450px;
                height: auto;
                margin-top: 4%;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: rgb(91, 0, 71);
            border: none;
            border-radius: 4px;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: rgb(255, 0, 200);
        }

        .error {
            color: red;
            margin-bottom: 10px;
        }

    </style>
</head>
<body>

    <div class="login-container">
        <h2>Login</h2>
        <?php
    
        $username = $password = "";
        $usernameErr = $passwordErr = "";

        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
            if (empty($_POST["username"])) {
                $usernameErr = "Username is required";
            } else {
                $username = htmlspecialchars($_POST["username"]);
                
                if (!preg_match("/^[a-zA-Z0-9_]{5,15}$/", $username)) {
                    $usernameErr = "Username must be 5-15 characters long and contain only letters, numbers, and underscores.";
                }
            }

        
            if (empty($_POST["password"])) {
                $passwordErr = "Password is required";
            } else {
                $password = htmlspecialchars($_POST["password"]);
                
                if (!preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/", $password)) {
                    $passwordErr = "Password must be at least 8 characters long and include both letters and numbers.";
                }
            }

            
            if ($usernameErr == "" && $passwordErr == "") {
                
                session_start();
                $_SESSION['username'] = $username;
                header("Location: dashboard.php");
                exit; 
            }
        }
        ?>

        <form method="post" action="">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" value="<?php echo $username; ?>">
            <span class="error"><?php echo $usernameErr; ?></span>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password">
            <span class="error"><?php echo $passwordErr; ?></span>

            <input type="submit" value="Login">
        </form>
    </div>

</body>
</html>
