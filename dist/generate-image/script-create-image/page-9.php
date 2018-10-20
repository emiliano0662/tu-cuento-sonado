<?php session_start();

$_name = (empty($_SESSION['name']))? '' : $_SESSION['name'];
$_typography = (empty($_SESSION['typography']))? NULL : $_SESSION['typography'];

require('script-image-ttf-text-justified.php');

$get_type = (empty($_GET['type']))? 'girl' : $_GET['type'];
$get_skin = (empty($_GET['skin']))? '1' : $_GET['skin'];
$get_eyes = (empty($_GET['eyes']))? '1' : $_GET['eyes'];
$get_hair = (empty($_GET['hair']))? '1' : $_GET['hair'];
$get_hairstyle = (empty($_GET['hairstyle']))? '1' : $_GET['hairstyle'];

$img = imagecreatetruecolor(850, 425);

// Hacer que los canales alfa funcionen
imagealphablending($img, true);
imagesavealpha($img, true);

$trans_bg = imagecolorallocatealpha($img, 0, 0, 0, 127);

imagefill($img, 0, 0, $trans_bg);

// Imagen Fondo
$cur_bg = imagecreatefrompng("../images/background/9.png");
// Cargar imagen Piel
$cur_skin = imagecreatefrompng("../images/".$get_type."/page-7/skin/".$get_skin.".png");
// Cargar imagen Cabello
$cur_hair = imagecreatefrompng("../images/".$get_type."/page-7/hair/type-".$get_hairstyle."/".$get_hair.".png");

// Imagen Fondo
imagecopy($img, $cur_bg, 0,0,0,0,850,425);
// Copia sobre la imagen Piel
imagecopy($img, $cur_skin, 0,0,0,0, 850, 425);
// Copia sobre la imagen Cabello
imagecopy($img, $cur_hair, 0,0,0,0, 850, 425);

//Texto
$text_color = imagecolorallocate($img,85,80,81);

$text_img = $_name." y Dinky le dan un fuerte abrazo a Domt y le dicen:";

imagettftextjustified($img,13,0,510,160,$text_color,"../fonts/Neucha.ttf",((empty($_typography))? $text_img : strtoupper($text_img)),280,3,1.3);

$text_img = "- No te preocupes, juntos buscaremos un juego en el que todos nos podamos divertir.";

imagettftextjustified($img,13,0,510,230,$text_color,"../fonts/Neucha.ttf",((empty($_typography))? $text_img : strtoupper($text_img)),280,3,1.3);

// Liberar memoria
imagedestroy($cur_bg);
imagedestroy($cur_skin);
imagedestroy($cur_hair);

header('Content-Type: image/png');
header("Cache-Control: private, max-age=10800, pre-check=10800");
header("Expires: " . date(DATE_RFC822,strtotime("1 day")));

imagepng($img);

imagedestroy($img);

?>