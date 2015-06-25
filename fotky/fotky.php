<?php
session_start();

if (!isset($_SESSION['fotograf'])) {
    header("Location: ./index.php");
    die();
}

if (isset($_GET['slozka'])) {
    $_SESSION['slozka'] = $_GET['slozka'];
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../bootstrap.css">
        <title>Správa fotek</title>
    </head>
    <body>
        <h1 style='text-align: center;'>Správa fotek</h1>
        <?php
        if (!isset($_SESSION['slozka'])) {
            echo "<h2 style='text-align: center;'>Zvolte kategorii:</h2>";
        } else {
            echo "<h2 style='text-align: center;'>Zvolená kategorie: ";
            switch ($_SESSION['slozka']) {
                case "zeny":
                    echo "ženy";
                    break;
                case "rodina":
                    echo "Rotina/Děti";
                    break;
                case "svatby":
                    echo "Svatby";
                    break;
                case "akt":
                    echo "Akt/Budoir";
                    break;
                case "tehotne":
                    echo "Těhotné";
                    break;
                case "pary":
                    echo "Páry";
                    break;
                case "muzi":
                    echo "Muži";
                    break;
                case "retro":
                    echo "Retro";
                    break;
                case "produkty":
                    echo "Produkty";
                    break;
            }
            echo "</h2><br>";
            echo "<h4 style='text-align: center;'>Změnit kategorii:</h4>";
        }
        ?>

        <div style="width: 300px; margin: 0 auto;">
            <a href='fotky.php?slozka=zeny' style='text-align: center;'>Ženy</a><br>
            <a href='fotky.php?slozka=akt' style='text-align: center;'>Akt</a><br>
            <a href='fotky.php?slozka=muzi' style='text-align: center;'>Muži</a><br>
            <a href='fotky.php?slozka=pary' style='text-align: center;'>Páry</a><br>
            <a href='fotky.php?slozka=produkty' style='text-align: center;'>Produkty</a><br>
            <a href='fotky.php?slozka=retro' style='text-align: center;'>Retro</a><br>
            <a href='fotky.php?slozka=rodina' style='text-align: center;'>Rodina</a><br>
            <a href='fotky.php?slozka=svatby' style='text-align: center;'>Svatby</a><br>
            <a href='fotky.php?slozka=tehotne' style='text-align: center;'>Těhotné</a><br>
        </div>
        <div style="width: 500px; margin: 0 auto;">
            
            <?php
            if(isset($_SESSION['nahrano']) && $_SESSION['nahrano'] == true){
                echo "<h3 style='color:green;'>fotky nahrány!</h3>";
                $_SESSION['nahrano'] = false;
            }
            
            if(isset($_SESSION['smazano']) && $_SESSION['smazano'] == true){
                echo "<h3 style='color:green;'>fotka smazána!</h3>";
                $_SESSION['smazano'] = false;
            }
            
            ?>
            
            

            <?php
            if (isset($_SESSION['slozka'])) {
                
                include './uploadForm.php';
                
                $dir = "../foto/" . $_SESSION['slozka'] . "small/";
                $files = scandir($dir, 1);

                foreach ($files as $fotka) {
                    if ($fotka != "." && $fotka != "..") {
                        echo "<div style='margin-bottom: 20px;' ><img  src='" . $dir . $fotka . "' style='max-height: 200px; max-width: 200px;'><a href='smazatFoto.php?name=" . $fotka . "'> Smazat fotku</a></div>";
                    }
                }
            }
            ?>

        </div>




    </body>
</html>