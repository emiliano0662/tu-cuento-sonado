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
$cur_bg = imagecreatefrompng("../images/background/14.png");
// Cargar imagen Piel
$cur_skin = imagecreatefrompng("../images/".$get_type."/page-12/skin/".$get_skin.".png");
// Cargar imagen Ojos
$cur_eyes = imagecreatefrompng("../images/".$get_type."/page-12/eyes/".$get_eyes.".png");
// Cargar imagen Cabello
$cur_hair = imagecreatefrompng("../images/".$get_type."/page-12/hair/".$get_hair.".png");

// Imagen Fondo
imagecopy($img, $cur_bg, 0,0,0,0,850,425);
// Copia sobre la imagen Piel
imagecopy($img, $cur_skin, 0,0,0,0, 850, 425);
// Copia sobre la imagen Ojos
imagecopy($img, $cur_eyes, 0,0,0,0, 850, 425);
// Copia sobre la imagen Cabello
imagecopy($img, $cur_hair, 0,0,0,0, 850, 425);

//Texto
$text_color = imagecolorallocate($img,0,0,0);

$text_img = "La ardilla, el sapo y el conejo estaban muy agradecidos con EMILIANO y Domt.";

imagettftextjustified($img,11,0,40,50,$text_color,"../fonts/Neucha.ttf",$text_img,280,3,1.3);

$text_img = "Pero a EMILIANO se le había ocurrido una gran idea para que Domt jugara con sus amigos.";

imagettftextjustified($img,11,0,40,110,$text_color,"../fonts/Neucha.ttf",$text_img,280,3,1.3);

$text_img = "EMILIANO se aproximó y se subió aobre la espalda de Domt y acercándose al oído le susurró:";

imagettftextjustified($img,11,0,450,300,$text_color,"../fonts/Neucha.ttf",$text_img,280,3,1.3);

$text_img = "- Vamos al lago a llenar tu trompa de agua...";

imagettftextjustified($img,11,0,450,360,$text_color,"../fonts/Neucha.ttf",$text_img,280,3,1.3);

// Liberar memoria
imagedestroy($cur_bg);
imagedestroy($cur_skin);
imagedestroy($cur_eyes);
imagedestroy($cur_hair);

header('Content-Type: image/png');

imagepng($img);

imagedestroy($img);

?>