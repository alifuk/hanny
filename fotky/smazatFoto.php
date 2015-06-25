<?php

session_start();

unlink("../foto/".$_SESSION['slozka']."small/".$_GET['name']);
unlink("../foto/".$_SESSION['slozka']."big/".$_GET['name']);


        $_SESSION['smazano'] = true;
        header('Location: ' . $_SERVER['HTTP_REFERER']);












?>