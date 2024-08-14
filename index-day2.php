<?php

$first_name = $last_name = $email = $phone = $dob = $gender = $address = "";
$errors = [];


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $first_name = htmlspecialchars(trim($_POST['first_name']));
    $last_name = htmlspecialchars(trim($_POST['last_name']));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $phone = htmlspecialchars(trim($_POST['phone']));
    $dob = htmlspecialchars(trim($_POST['dob']));
    $gender = htmlspecialchars(trim($_POST['gender']));
    $address = htmlspecialchars(trim($_POST['address']));

    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    }

    
    if (!preg_match('/^[0-9]{10}$/', $phone)) {
        $errors[] = "Phone number must be 10 digits long";
    }

    
    if (!strtotime($dob)) {
        $errors[] = "Invalid date of birth";
    }

    
    if (empty($errors)) {
        
        echo "<h2>Your Submitted Information</h2>";
        echo "<p>First Name: $first_name</p>";
        echo "<p>Last Name: $last_name</p>";
        echo "<p>Email Address: $email</p>";
        echo "<p>Phone Number: $phone</p>";
        echo "<p>Date of Birth: $dob</p>";
        echo "<p>Gender: $gender</p>";
        echo "<p>Address: $address</p>";
        exit; 
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Information Form</title>
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

            .form-container {
                background-color: rgb(0, 0, 0);
                color: rgb(255, 255, 255);
                padding: 20px;
                border-radius: 8px;
                box-shadow: 3px 2px 10px rgb(255, 0, 200);
                width: 350px;
                height: auto;
                margin-top: 4%;
            }

            h2 {
                text-align: center;
                margin-bottom: 20px;
            }

            label {
                margin-bottom: 8px;
                font-weight: bold;
            }

            input[type="text"],
            input[type="email"],
            input[type="date"],
            select,
            textarea {
                width: 100%;
                padding: 8px;
                margin-bottom: 20px;
                border: none ;
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
    <div class="form-container">
        <h2>Personal Information</h2>
        <?php

        if (!empty($errors)) {
            foreach ($errors as $error) {
                echo "<p class='error'>$error</p>";
            }
        }
        ?>
        <form action="" method="POST">
            <label for="first_name">First Name:</label>
            <input type="text" id="first_name" name="first_name" value="<?php echo htmlspecialchars($first_name); ?>" required>

            <label for="last_name">Last Name:</label>
            <input type="text" id="last_name" name="last_name" value="<?php echo htmlspecialchars($last_name); ?>" required>

            <label for="email">Email Address:</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required>

            <label for="phone">Phone Number:</label>
            <input type="text" id="phone" name="phone" value="<?php echo htmlspecialchars($phone); ?>" required>

            <label for="dob">Date of Birth:</label>
            <input type="date" id="dob" name="dob" value="<?php echo htmlspecialchars($dob); ?>" required>

            <label for="gender">Gender:</label>
            <select id="gender" name="gender" required>
                <option value="male" <?php echo ($gender === 'male') ? 'selected' : ''; ?>>Male</option>
                <option value="female" <?php echo ($gender === 'female') ? 'selected' : ''; ?>>Female</option>
            </select>

            <label for="address">Address:</label>
            <textarea id="address" name="address" rows="4" required><?php echo htmlspecialchars($address); ?></textarea>

            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>
