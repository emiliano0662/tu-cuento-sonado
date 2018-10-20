<?php session_start();

$_name = (empty($_SESSION['name']))? '' : $_SESSION['name'];
$_image_user = (empty($_SESSION['image_user']))? NULL : $_SESSION['image_user'];
$_typography = (empty($_SESSION['typography']))? NULL : $_SESSION['typography'];

require('script-image-ttf-text-justified.php');

$img = imagecreatetruecolor(850, 425);

// Hacer que los canales alfa funcionen
imagealphablending($img, true);
imagesavealpha($img, true);

$trans_bg = imagecolorallocatealpha($img, 0, 0, 0, 127);

imagefill($img, 0, 0, $trans_bg);

if(empty($_image_user)) {

    // Imagen Fondo
    $cur_bg = imagecreatefrompng("../images/background/3-empty.png");

    // Imagen Fondo
    imagecopy($img, $cur_bg, 0,0,0,0, 850,425);

} else {

    // Imagen Fondo
    $cur_bg = imagecreatefrompng("../images/background/3.png");
    // Imagen Usuario
    $cur_skin = imagecreatefrompng("../assistant/imguser/".$_image_user);
    
    // Imagen Fondo
    imagecopy($img, $cur_bg, 0,0,0,0, 850,425);
    // Imagen Usuario sobre Fondo
    imagecopy($img, $cur_skin, 105,70,0,0, 136,168);
}

//Texto
$text_color = imagecolorallocate($img,115,32,34);

$text_img = "Desde un lugar muy lejano se ha elaborado con mucho amor este cuento para ti ".$_name."; esperamos que te guste y disfrutes todas las aventuras.";

imagettftextjustified($img,18,0,495,110,$text_color,"../fonts/Neucha.ttf",((empty($_typography))? $text_img : strtoupper($text_img)),240,3,1.3);

// Liberar memoria
imagedestroy($cur_bg);

if(!empty($_image_user)) {

    imagedestroy($cur_skin);
}

header('Content-Type: image/png');
header("Cache-Control: private, max-age=10800, pre-check=10800");
header("Expires: " . date(DATE_RFC822,strtotime("1 day")));

imagepng($img);

imagedestroy($img);

?>