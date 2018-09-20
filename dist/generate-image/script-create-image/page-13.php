<?php require('script-image-ttf-text-justified.php');

$get_type = (empty($_GET['type']))? 'girl' : $_GET['type'];
$get_skin = (empty($_GET['skin']))? '1' : $_GET['skin'];
$get_eyes = (empty($_GET['eyes']))? '1' : $_GET['eyes'];
$get_hair = (empty($_GET['hair']))? '1' : $_GET['hair'];

$img = imagecreatetruecolor(850, 425);

// Hacer que los canales alfa funcionen
imagealphablending($img, true);
imagesavealpha($img, true);

$trans_bg = imagecolorallocatealpha($img, 0, 0, 0, 127);

imagefill($img, 0, 0, $trans_bg);

// Imagen Fondo
$cur_bg = imagecreatefrompng("../images/background/13.png");
// Cargar imagen Piel
$cur_skin = imagecreatefrompng("../images/".$get_type."/page-11/skin/".$get_skin.".png");
// Cargar imagen Ojos
$cur_eyes = imagecreatefrompng("../images/".$get_type."/page-11/eyes/".$get_eyes.".png");
// Cargar imagen Cabello
$cur_hair = imagecreatefrompng("../images/".$get_type."/page-11/hair/".$get_hair.".png");

// Imagen Fondo
imagecopy($img, $cur_bg, 0,0,0,0,850,425);
// Copia sobre la imagen Piel
imagecopy($img, $cur_skin, 0,0,0,0, 850, 425);
// Copia sobre la imagen Ojos
//imagecopy($img, $cur_eyes, 0,0,0,0, 850, 425);
// Copia sobre la imagen Cabello
imagecopy($img, $cur_hair, 0,0,0,0, 850, 425);

//Texto
$text_color = imagecolorallocate($img,0,0,0);

$text_img = "EMILIANO era muy listo y se le ocurrió una gran idea.";

imagettftextjustified($img,10,0,270,20,$text_color,"../fonts/Neucha.ttf",$text_img,180,3,1.3);

$text_img = "SE subío sobre la espalda de Domt y lo llevo hasta un lago que se encontraba cerca, y le dijo:";

imagettftextjustified($img,10,0,270,53,$text_color,"../fonts/Neucha.ttf",$text_img,180,3,1.3);

$text_img = "Dom llena tu trompa de agua, y así podremos apagar el fuego.";

imagettftextjustified($img,9,0,285,140,$text_color,"../fonts/Neucha.ttf",$text_img,75,3,1.3);

$text_img = "Así lo hicieron una y otra vez. Domt llenaba su trompa de agua y la vertía sobre el fuego, hasta que logró apagarlo.";

imagettftextjustified($img,9,0,560,90,$text_color,"../fonts/Neucha.ttf",$text_img,250,3,1.3);

// Liberar memoria
imagedestroy($cur_bg);
imagedestroy($cur_skin);
imagedestroy($cur_eyes);
imagedestroy($cur_hair);

header('Content-Type: image/png');

imagepng($img);

imagedestroy($img);

?>