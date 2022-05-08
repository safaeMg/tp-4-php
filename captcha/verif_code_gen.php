<?php
session_start();
header("Content-type: image/png");
$_img = imagecreatefrompng("fond_verif_img.png");
$avant_plan = imagecolorallocate($_img, 255, 255, 255);
$nombre = mt_rand(100000, 999999);
$_SESSION["captcha_code"] = $nombre;
imagestring($_img, 5, 18, 8, $nombre, $avant_plan);
imagepng($_img);
?>