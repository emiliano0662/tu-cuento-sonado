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
$cur_bg = imagecreatefrompng("../images/background/12.png");
// Cargar imagen Piel
$cur_skin = imagecreatefrompng("../images/".$get_type."/page-10/skin/".$get_skin.".png");
// Cargar imagen Ojos
$cur_eyes = imagecreatefrompng("../images/".$get_type."/page-10/eyes/".$get_eyes.".png");
// Cargar imagen Cabello
$cur_hair = imagecreatefrompng("../images/".$get_type."/page-10/hair/type-".$get_hairstyle."/".$get_hair.".png");
// Imagen Fondo index 1
$cur_bg_index_1 = imagecreatefrompng("../images/background/11-index-1.png");

// Imagen Fondo
imagecopy($img, $cur_bg, 0,0,0,0,850,425);
// Copia sobre la imagen Piel
imagecopy($img, $cur_skin, 0,0,0,0, 850, 425);
// Copia sobre la imagen Ojos
imagecopy($img, $cur_eyes, 0,0,0,0, 850, 425);
// Copia sobre la imagen Cabello
imagecopy($img, $cur_hair, 0,0,0,0, 850, 425);
// Imagen Fondo index 1
imagecopy($img, $cur_bg_index_1, 0,0,0,0,850,425);

//Texto
$text_color = imagecolorallocate($img,255,255,255);

$text_img = $_name." les gritaba:";

imagettftextjustified($img,11,0,20,100,$text_color,"../fonts/Neucha.ttf",((empty($_typography))? $text_img : strtoupper($text_img)),160,3,1.3);

$text_img = "- Amigos aléjense del fuego lo que más puedan. Los vamos a ayudar.";

imagettftextjustified($img,11,0,20,150,$text_color,"../fonts/Neucha.ttf",((empty($_typography))? $text_img : strtoupper($text_img)),160,3,1.3);

// Liberar memoria
imagedestroy($cur_bg);
imagedestroy($cur_skin);
imagedestroy($cur_hair);
imagedestroy($cur_eyes);
imagedestroy($cur_bg_index_1);

header('Content-Type: image/png');
header("Cache-Control: private, max-age=10800, pre-check=10800");
header("Expires: " . date(DATE_RFC822,strtotime("1 day")));

imagepng($img);

imagedestroy($img);

?>