<?php
$get_gender = (empty($_GET['gender']))? 'girl' : $_GET['gender'];
$get_type   = (empty($_GET['type']))? '1' : $_GET['type'];
$get_color  = (empty($_GET['color']))? '1' : $_GET['color'];

$img = imagecreatetruecolor(230, 200);

// Hacer que los canales alfa funcionen
imagealphablending($img, true);
imagesavealpha($img, true);

$trans_bg = imagecolorallocatealpha($img, 0, 0, 0, 127);

imagefill($img, 0, 0, $trans_bg);

$cur_skin = imagecreatefrompng("./images/".$get_gender."/hair/type-".$get_type."/".$get_color.".png");

imagecopy($img, $cur_skin, 0,0,0,0, 200, 200);

// Liberar memoria
imagedestroy($cur_skin);

header('Content-Type: image/png');

imagepng($img);

imagedestroy($img);

?>