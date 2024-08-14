<?php

$cookie_name1 = "num";
$cookie_name2 = "op";

$num = "";

if(isset($_POST['num'])) {
    if ($_POST['num'] == 'c') {
        $num = "";
        setcookie($cookie_name1, "", time() - 3600, "/");
        setcookie($cookie_name2, "", time() - 3600, "/");
    } else {
        $num = isset($_POST['input']) ? $_POST['input'].$_POST['num'] : $_POST['num'];
    }
}

if(isset($_POST['op'])) {
    $cookie_value1 = isset($_POST['input']) ? $_POST['input'] : '';
    setcookie($cookie_name1, $cookie_value1, time() + (86400 * 30), "/");

    $cookie_value2 = $_POST['op'];
    setcookie($cookie_name2, $cookie_value2, time() + (86400 * 30), "/");
    $num = "";
}

if(isset($_POST['equal'])) {
    $num = isset($_POST['input']) ? $_POST['input'] : '';
    if (isset($_COOKIE['num']) && isset($_COOKIE['op'])) {
        $result = "";
        switch($_COOKIE['op']) {
            case "+":
                $result = $_COOKIE['num'] + $num;
                break;
            case "-":
                $result = $_COOKIE['num'] - $num;
                break;
            case "*":
                $result = $_COOKIE['num'] * $num;
                break;
            case "/":
                if ($num != 0) {
                    $result = $_COOKIE['num'] / $num;
                } else {
                    $result = "Error: Division by zero!";
                }
                break;
            case "%":
                if ($num != 0) {
                    $result = $_COOKIE['num'] % $num;
                } else {
                    $result = "Error: Division by zero!";
                }
                break;
            case "^":
                $result = pow($_COOKIE['num'], $num);
                break;
            case "√":
                if ($_COOKIE['num'] >= 0) {
                    $result = sqrt($_COOKIE['num']);
                } else {
                    $result = "Error: Negative square root!";
                }
                break;
            default:
                $result = $num;
        }
        $num = $result;
        
        setcookie($cookie_name1, "", time() - 3600, "/");
        setcookie($cookie_name2, "", time() - 3600, "/");
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advanced Calculator</title>
    <style>

        *, *::before, *::after  {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        html    {
            font-size: 62.5%;
        }

        body    {
            background-color: rgb(201, 201, 201);
            display: flex;
            justify-content: center;
        }

        .clc__container {
        background-color: black;
        border: 2px solid white;
        margin-top: 10%; 
        width: 370px;
        height: auto;
        border-radius: 20px;
        box-shadow: 10px 10px 40px;
    }
    .dsply {
        background-color: black;
        border: 1px solid white;
        height: 115px;
        width: 98.2%;
        font-size: 80px;
        font-weight: 400;
        color: #fff;
        margin-top: 10px;
    }
    .numbtn {
        padding: 20px 35px;
        border-radius: 50px;
        font-weight: 600;
        font-size: x-large;
        background-color: gray;
    }
    .clcbtn, .clcbtn-special {
        padding: 20px 35px;
        border-radius: 50px;
        font-weight: 600;
        font-size: x-large;
        background-color: orange;
    }
    .c {
        padding: 20px 35px;
        border-radius: 50px;
        font-weight: 600;
        font-size: x-large;
        background-color: red;
    }
    .equal {
        padding: 20px 35px;
        border-radius: 50px;
        font-weight: 600;
        font-size: x-large;
        background-color: green;
    }
    .clcbtn:hover, .numbtn:hover, .c:hover, .equal:hover, .clcbtn-special:hover {
        color: whitesmoke;
    }
    </style>
</head>
<body>
    <div class="clc__container">
        <form action="" method="post">
            <input type="text" class="dsply" name="input" value="<?php echo htmlspecialchars($num); ?>"> <br> <br>
            <input type="submit" class="numbtn" name="num" value="7">
            <input type="submit" class="numbtn" name="num" value="8">
            <input type="submit" class="numbtn" name="num" value="9">
            <input type="submit" class="clcbtn" name="op" value="+"> <br>
            <input type="submit" class="numbtn" name="num" value="4">
            <input type="submit" class="numbtn" name="num" value="5">
            <input type="submit" class="numbtn" name="num" value="6">
            <input type="submit" class="clcbtn" name="op" value="-"> <br>
            <input type="submit" class="numbtn" name="num" value="1">
            <input type="submit" class="numbtn" name="num" value="2">
            <input type="submit" class="numbtn" name="num" value="3">
            <input type="submit" class="clcbtn" name="op" value="*"> <br>
            <input type="submit" class="c" name="num" value="c">
            <input type="submit" class="numbtn" name="num" value="0">
            <input type="submit" class="equal" name="equal" value="=">
            <input type="submit" class="clcbtn" name="op" value="/"> <br>
            <input type="submit" class="clcbtn-special" name="op" value="%">
            <input type="submit" class="clcbtn-special" name="op" value="^">
            <input type="submit" class="clcbtn-special" name="op" value="√">
        </form>
    </div>
</body>
</html>
