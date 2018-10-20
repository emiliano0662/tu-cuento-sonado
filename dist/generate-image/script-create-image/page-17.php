<?php session_start();

$_typography = (empty($_SESSION['typography']))? NULL : $_SESSION['typography'];

require('script-image-ttf-text-justified.php');

$img = imagecreatetruecolor(850, 425);

// Hacer que los canales alfa funcionen
imagealphablending($img, true);
imagesavealpha($img, true);

$trans_bg = imagecolorallocatealpha($img, 0, 0, 0, 127);

imagefill($img, 0, 0, $trans_bg);

// Imagen Fondo
$cur_bg = imagecreatefrompng("../images/background/17.png");

// Imagen Fondo
imagecopy($img, $cur_bg, 0,0,0,0,850,425);

//Texto
$text_color = imagecolorallocate($img,103,55,0);

$text_img = "Ahora juguemos a las escondidas con los animales del bosque... cuenta hasta 3 y encuéntralos.";

imagettftextjustified($img,12,0,200,105,$text_color,"../fonts/Neucha.ttf",((empty($_typography))? $text_img : strtoupper($text_img)),200,3,1.3);

// Liberar memoria
imagedestroy($cur_bg);

header('Content-Type: image/png');
header("Cache-Control: private, max-age=10800, pre-check=10800");
header("Expires: " . date(DATE_RFC822,strtotime("1 day")));

imagepng($img);

imagedestroy($img);

?>