<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php
    $logform='<div style="display: flex;">
        <form action="#" method="post" id="singup">
            <label for="email">email: </label>
            <input type="email" name="email" id="email" required>
            <label for="pwd">password: </label>
            <input type="password" name="pwd" id="pwd" required>
            <select name="lang" id="">
                <option value="fr">fr</option>
                <option value="en">en</option>
            </select>
            <input type="submit" value="login">
        </form>
    </div>';
    if (isset($_POST["email"]) and isset($_POST["pwd"]) and isset($_POST["lang"])) {
        $_SESSION["email"] = htmlspecialchars($_POST["email"]);
        $_SESSION["pwd"] = htmlspecialchars($_POST["pwd"]);
        setcookie("language",$_POST["lang"],time()+3600);
    }
    if (isset($_POST["deconnecter"])) {
        session_destroy();
    }
    if (isset($_SESSION["pwd"]) and isset($_SESSION["email"])) {
        echo '<br>you are connected';
        $logform='<form action="#" method="post">
            <input type="hidden" name="deconnecter" id="deconnecter" value="1" required>
            <input type="submit" value="deconnecter">
        </form>';
    }
    echo $logform;
    if (isset($_COOKIE["language"])) {
        if ($_COOKIE["language"]=="fr") {
            echo"<br>bonjour";
        }elseif ($_COOKIE["language"]=="en") {
            echo"<br>hello";
        }
    }
    ?>
</body>
</html>