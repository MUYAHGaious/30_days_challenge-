<?php
session_start();

if (!isset($_SESSION['randomNumber'])) {
    $_SESSION['randomNumber'] = rand(1, 100);
    $_SESSION['attempts'] = 5;
    $_SESSION['message'] = "Let's Play! Guess a number between 1 and 100!";
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $guess = intval($_POST['guess']);
    
    if ($guess < 1 || $guess > 100) {
        $_SESSION['message'] = "Oops! Please enter a number between 1 and 100.";
    } else {
        $_SESSION['attempts']--;

        if ($guess < $_SESSION['randomNumber']) {
            $_SESSION['message'] = "Too low! Try again!";
        } elseif ($guess > $_SESSION['randomNumber']) {
            $_SESSION['message'] = "Too high! Keep guessing!";
        } else {
            $_SESSION['message'] = "Yay! You guessed it right! The number was " . $_SESSION['randomNumber'] . ". Starting a new game!";
            session_unset();
            session_destroy();
        }

        if ($_SESSION['attempts'] <= 0) {
            $_SESSION['message'] = "Oh no! You're out of attempts! The number was " . $_SESSION['randomNumber'] . ". Let's start a new game!";
            session_unset();
            session_destroy();
        }
    }

    header("Location: index-day5.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guess the Number Game</title>
    <style>
         *, *::before, *::after  {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            }

        body {
            font-family: 'Comic Neue', cursive;
            background-color: rgb(224, 247, 250);
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .game-container {
            background-color: papayawhip;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 350px;
            margin-top: 4%;
            animation: pop-in 0.7s ease-out;
        }
        @keyframes pop-in {
            0% { transform: scale(0.7); opacity: 0; }
            100% { transform: scale(1); opacity: 1; }
        }
        h2 {
            margin-bottom: 20px;
            color: #ff6f00;
            font-size: 28px;
        }
        input[type="number"] {
            width: 80%;
            padding: 10px;
            margin-bottom: 15px;
            border: 2px solid #ff6f00;
            border-radius: 10px;
            font-size: 18px;
            color: #ff6f00;
            text-align: center;
            outline: none;
        }
        input:focus {
            outline: 5px solid #ff6f00;
        }
        input[type="submit"] {
            width: 80%;
            padding: 12px;
            background-color: #ff6f00;
            border: none;
            border-radius: 10px;
            color: white;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #e65100;
        }
        .message {
            margin-top: 20px;
            font-size: 20px;
            color: #ff7043;
            animation: bounce-in 0.5s;
        }
        @keyframes bounce-in {
            0% { transform: translateY(-20px); opacity: 0; }
            100% { transform: translateY(0); opacity: 1; }
        }
        .balloon {
            position: absolute;
            top: 5%;
            right: 5%;
            width: 50px;
            animation: float 4s ease-in-out infinite;
        }
        .balloon img {
            width: 100%;
        }
        @keyframes float {
            0% { transform: translateY(0); }
            50% { transform: translateY(-30px); }
            100% { transform: translateY(0); }
        }
    </style>
</head>
<body>

    <div class="balloon">
        <img src="../phpTask/img/balloons.jpeg" alt="Balloon">
    </div>

    <div class="game-container">
        <h2>Guess the Number!</h2>
        <form method="post" action="">
            <input type="number" name="guess" min="1" max="100" placeholder="Enter a number..." required>
            <input type="submit" value="Guess!">
        </form>
        <div class="message">
            <?php
            if (isset($_SESSION['message'])) {
                echo $_SESSION['message'];
                echo "<br>Attempts left: " . ($_SESSION['attempts'] ?? 5);
            }
            ?>
        </div>
    </div>

</body>
</html>
