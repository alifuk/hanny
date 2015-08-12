<?php

try {

    session_start();
    //include './ImageResize.php';

    $error = array();
    $extension = array("jpeg", "jpg", "png", "gif");

    if (empty($_FILES["files"]["name"][0])) {
        echo "nevybrali ste fotky (nebo na server nic neprislo)";
        //print_r($_FILES["files"]);
        exit();
    }

    foreach ($_FILES["files"]["tmp_name"] as $key => $tmp_name) {
//echo $key;
        $file_name = $_FILES["files"]["name"][$key];
        $file_tmp = $_FILES["files"]["tmp_name"][$key];
        $ext = pathinfo($file_name, PATHINFO_EXTENSION);
        if (in_array($ext, $extension)) {

            $im = new Imagick($file_tmp);
            $im->thumbnailImage(5000, 1050, true);
            $im->setImageCompressionQuality(80);
            $im->writeImage("../foto/" . $_SESSION['slozka'] . "big/" . $file_name);

            $im->thumbnailImage(5000, 500, true);
            $im->setImageCompressionQuality(75);
            $im->writeImage("../foto/" . $_SESSION['slozka'] . "small/" . $file_name);

            unset($im);

            /*
              $imageB = new ImageResize($file_tmp);
              $imageB->resizeToHeight(1050);
              $imageB->quality_jpg = 80;


              $tmpN = basename($file_tmp, ".tmp");
              $file_tmpB = str_replace($tmpN, $tmpN . "B", $file_tmp);
              //echo PHP_EOL . $file_tmpB . PHP_EOL;

              $imageB->save("big.jpg");

              copy("big.jpg", "../foto/" . $_SESSION['slozka'] . "big/" . $file_name);

              $imageS = new ImageResize($_FILES["files"]["tmp_name"][$key]);
              $imageS->resizeToHeight(500);
              $imageS->quality_jpg = 80;
              $imageS->save("small.jpg");

              copy("small.jpg", "../foto/" . $_SESSION['slozka'] . "small/" . $file_name);

              unlink("big.jpg");
              unlink("small.jpg");
             */
            $_SESSION['nahrano'] = true;
        }
    }
    
    $_SESSION['velka'] = true;
    header("Location: fotky.php");
} catch (Exception $ex) {

    echo "chyba, zavolejte mi na 606544258 a opravime to :)";
    array_push($error, "$file_name, ");
    print_r($ex);
}