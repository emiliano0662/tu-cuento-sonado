<?php require('script-image-ttf-text-justified.php');

$img = imagecreatetruecolor(850, 425);

// Hacer que los canales alfa funcionen
imagealphablending($img, true);
imagesavealpha($img, true);

$trans_bg = imagecolorallocatealpha($img, 0, 0, 0, 127);

imagefill($img, 0, 0, $trans_bg);

// Imagen Fondo
$cur_bg = imagecreatefrompng("../images/background/3.png");
// Imagen Usuario
$cur_skin = imagecreatefrompng("../assistant/imguser/10420180920030100.png");

// Imagen Fondo
imagecopy($img, $cur_bg, 0,0,0,0, 850,425);
// Imagen Usuario sobre Fondo
imagecopy($img, $cur_skin, 105,70,0,0, 136,168);

//Texto
$text_color = imagecolorallocate($img,115,32,34);

$text_img = "Desde un lugar muy lejano se ha elaborado con mucho amor este cuento para ti Emiliano; esperamos que te guste y disfrutes todas las aventuras.";

imagettftextjustified($img,18,0,495,110,$text_color,"../fonts/Neucha.ttf",$text_img,240,3,1.3);

// Liberar memoria
imagedestroy($cur_bg);

header('Content-Type: image/png');

imagepng($img);

imagedestroy($img);

?>