<?php
session_start();

if (!isset($_SESSION['fotograf'])) {
    header("Location: ./index.php");
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
<?php
if (!isset($_SESSION['slozka'])) {
    echo "<h2 style='text-align: center;'>Zvolte kategorii</h2>";
}
?>
        
        
        
        
        
        
        
    </body>
</html>