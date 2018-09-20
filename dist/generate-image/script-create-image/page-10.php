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
$cur_bg = imagecreatefrompng("../images/background/10.png");
// Cargar imagen Piel
$cur_skin = imagecreatefrompng("../images/".$get_type."/page-8/skin/".$get_skin.".png");
// Cargar imagen Cabello
$cur_hair = imagecreatefrompng("../images/".$get_type."/page-8/hair/".$get_hair.".png");

// Imagen Fondo
imagecopy($img, $cur_bg, 0,0,0,0,850,425);
// Copia sobre la imagen Piel
imagecopy($img, $cur_skin, 0,0,0,0, 850, 425);
// Copia sobre la imagen Cabello
imagecopy($img, $cur_hair, 0,0,0,0, 850, 425);

//Texto
$text_color = imagecolorallocate($img,0,0,0);

$text_img = "De repente EMILIANO observó que las aves volaban por encima de los árboles bastante asustadas. Cuando miró a lo lejos vio que salía bastante humo entre los arboles";

imagettftextjustified($img,11,0,75,70,$text_color,"../fonts/Neucha.ttf",$text_img,280,3,1.3);

$text_img = "EMILIANO y Dinky vamos a mirar que sucede allí, que en ese lugar se encontraban jugando en conejo, el sapo y la ardilla.";

imagettftextjustified($img,11,0,600,130,$text_color,"../fonts/Neucha.ttf",$text_img,220,3,1.3);

// Liberar memoria
imagedestroy($cur_bg);
imagedestroy($cur_skin);
imagedestroy($cur_hair);

header('Content-Type: image/png');

imagepng($img);

imagedestroy($img);

?>