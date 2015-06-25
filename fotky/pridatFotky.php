<?php

session_start();
include './ImageResize.php';

$error = array();
$extension = array("jpeg", "jpg", "png", "gif");
print_r($_FILES);
foreach ($_FILES["files"]["tmp_name"] as $key => $tmp_name) {
    echo $key;
    $file_name = $_FILES["files"]["name"][$key];
    $file_tmp = $_FILES["files"]["tmp_name"][$key];
    $ext = pathinfo($file_name, PATHINFO_EXTENSION);
    if (in_array($ext, $extension)) {


        $imageB = new ImageResize($file_tmp);
        $imageB->resizeToHeight(1050);
        $imageB->quality_jpg = 80;


        $tmpN = basename($file_tmp, ".tmp");
        $file_tmpB = str_replace($tmpN, $tmpN . "B", $file_tmp);
        echo PHP_EOL . $file_tmpB . PHP_EOL;

        $imageB->save("big.jpg");

        copy("big.jpg", "../foto/" . $_SESSION['slozka'] . "big/" . $file_name);

        $imageS = new ImageResize($_FILES["files"]["tmp_name"][$key]);
        $imageS->resizeToHeight(500);
        $imageS->quality_jpg = 80;
        $imageS->save("small.jpg");

        copy("small.jpg", "../foto/" . $_SESSION['slozka'] . "small/" . $file_name);

        unlink("big.jpg");
        unlink("small.jpg");

        $_SESSION['nahrano'] = true;
    } else {
        echo "Chyba, zavolejte mi na 606544258 a opravíme to :)";
        array_push($error, "$file_name, ");
    }
}
?>