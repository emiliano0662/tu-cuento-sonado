<?php
$get_type = (empty($_GET['type']))? 'girl' : $_GET['type'];
$get_skin = (empty($_GET['skin']))? '1' : $_GET['skin'];
$get_eyes = (empty($_GET['eyes']))? '1' : $_GET['eyes'];
$get_hair = (empty($_GET['hair']))? '1' : $_GET['hair'];
$get_hairstyle = (empty($_GET['hairstyle']))? '1' : $_GET['hairstyle'];

$img = imagecreatetruecolor(230, 200);

// Hacer que los canales alfa funcionen
imagealphablending($img, true);
imagesavealpha($img, true);

$trans_bg = imagecolorallocatealpha($img, 0, 0, 0, 127);

imagefill($img, 0, 0, $trans_bg);

// Cargar imagen Piel
$cur_skin = imagecreatefrompng("./images/".$get_type."/skin/".$get_skin.".png");
// Cargar imagen Ojos
$cur_eyes = imagecreatefrompng("./images/".$get_type."/eyes/".$get_eyes.".png");
// Cargar imagen Cabello
$cur_hair = imagecreatefrompng("./images/".$get_type."/hair/type-two-".$get_hairstyle."/".$get_hair.".png");

// Copia sobre la imagen Piel
imagecopy($img, $cur_skin, 0,0,0,0, 230, 200);
// Copia sobre la imagen Ojos
imagecopy($img, $cur_eyes, 0,0,0,0, 230, 200);
// Copia sobre la imagen Cabello
imagecopy($img, $cur_hair, 0,0,0,0, 230, 200);

// Liberar memoria
imagedestroy($cur_skin);
imagedestroy($cur_eyes);
imagedestroy($cur_hair);

header('Content-Type: image/png');

imagepng($img);

imagedestroy($img);

?>