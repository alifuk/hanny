<?php

$kat = "produkty";
$homepage = file_get_contents('http://www.hanny-photo.cz/'.$kat);
mkdir($kat);
preg_match_all('/http:\/\/hanny-photo.cz\/wp-content\/gallery\/'.$kat.'\/\w+.jpg/', $homepage, $matches);

print_r($matches);


$i = 1;
foreach ($matches[0] as $foto) {
    $url = $foto;
    $img = $kat ."/".$i.'.jpg';
    file_put_contents($img, file_get_contents($url));
    $i++;
}
?>