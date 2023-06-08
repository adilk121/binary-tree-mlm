<?php
session_start();
$code = rand(1000, 9999);
//header
$_SESSION["code"] = $code;
$im = imagecreatetruecolor(60, 28);
$bg = imagecolorallocate($im, 100, 160, 181);
$fg = imagecolorallocate($im, 255, 255, 255); // Changed to use white color for text
imagefill($im, 0, 0, $bg);
imagestring($im, 10, 10, 5,  $code, $fg);
header("Cache-Control: no-cache, must-revalidate");
header('Content-type: image/png');
imagepng($im);
imagedestroy($im);
?>
