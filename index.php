<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
        <title>Hanny</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:700,300,400&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    </head>
    <body>
        
        <img src="./img/logo.png" class="logoBG">

        <div class="spacer" ></div>

        <div class="menuObal" >

            <div class="menuNadpis" >
                <h1><img src="./img/logo.png" class="logoMini">Hanny Photography</h1>
            </div>

            <div class="menuPolozky" >
                <span class="menuPolozka menuInfo">Info</span> | <span class="menuPolozka menuKontakt">Kontakt</span> | <span class="menuPolozka menuCenik">Ceník</span>
            </div>

            <div class="menuKategorie" >
                Ženy ⋅ Muži ⋅ Rodina/Děti ⋅ Těhotné  ⋅ Svatby ⋅ Akt/Budoir ⋅ Retro ⋅ Sklo/Produkty ⋅ Páry
            </div>

        </div>
        <?php
        //include 'slider.php';
        include 'myslider.php';
        ?>

        <img src="./img/site.png" class="sites">


        <script>
            $(document).ready(function () {

                setSpacer();
            });

            $(window).resize(function () {


                setSpacer();
            });

            function setSpacer() {
                $(".spacer").height($(window).height() / 100 * 15);
            }

        </script>

    </body>
</html>
