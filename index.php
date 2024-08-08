
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<style>
    *,*::before, *::after   {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    html    {
        font-size: 62.5%;
        font-family: 'nunito', sans-serif;
    }

    body    {
        background-color: black;
    }

    button, .form__input    {
        font-family: inherit;
        padding: 1rem;
        border-radius: 10px;
        margin: 1rem;
        width: 90%;
        border: none;
    }

    .log__container {
        width: 45%;
        height: auto;
        padding: 3rem 1rem;
        border-radius: 20px;
        margin: 5rem auto;
        box-shadow: 2px 2px 8px hsl(318, 100%, 69%);
    }

    .form__label    {
        color: whitesmoke;
        font-size: 1.5rem;
        font-weight: 400;

    }

    p .button  {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 70%;
        margin:auto ;
        background-color: hsl(318, 69%, 23%);
        cursor: pointer;
        color: white;
        border-radius: 10px;
        padding: 1rem;
    }
 
    p a{
        text-decoration: none;
        color: whitesmoke;
        margin: 1rem;
    }
    .p__head{
        display: flex;
        justify-content: center;
        align-items: center;
        color: whitesmoke;
        font-size: 3rem;
    }
    a:any-link:hover  {
        color: hsl(318, 100%, 69%);
    }
    .button:hover   {
       background-color: hsl(318, 100%, 69%);
    }
    p   {
        color: whitesmoke;
    }
</style>
<body>
    <div class="log__container">
        <p class="p__head">LOGIN</p>
        <form action="index.php" method="post">
            <p>
                <label for="username" class="form__label">Username </label>
                <input type="text" name="username" id="username" class="form__input" >
            </p>
            <p>
                <label for="password" class="form__label">Password </label>
                <input type="password" name="password" id="password" class="form__input">
            </p>
            <br>

            <p>
                <input type="submit" value="login" name="login" class="button">
            </p>
            <p>
                <a href="">Forgot password?</a>
            </p>
        </form>
    </div>
    <?php
if(isset($_POST["login"]))
{
    $username= $_POST["username"];

    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
    echo "<p>your password is  and username {$username}</p>";

};

/* function sanitizinput($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    } */
    


?>
</body>
</html>