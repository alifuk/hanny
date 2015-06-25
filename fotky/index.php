<?php
session_start();
if (isset($_SESSION['fotograf']) && $_SESSION['fotograf'] != null) {
    header("Location: ./fotky.php");
    die();
}

if (isset($_POST['heslo']) && $_POST['heslo'] == "cangeljenej") {
    $_SESSION['fotograf'] = "admin";
    header("Location: ./fotky.php");
    die();
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <title>Správa fotek</title>
        
    </head>
    <body>
        <h1 style='text-align: center;'>Správa fotek</h1>
        <form class="form-inline center-block" method="post" action="./index.php" style=" max-width: 326px; width: 100%;">
            <div class="form-group">
                <label for="exampleInputName2">Heslo: </label>
                <input type="password" class="form-control" id="exampleInputName2" placeholder="vložte heslo" name="heslo">
            </div>
            <button type="submit" class="btn btn-default">Přihlásit</button>
        </form>
    </body>
</html>

