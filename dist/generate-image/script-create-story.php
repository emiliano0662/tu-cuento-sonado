<?php require('/fpdf/fpdf.php');

$get_skin = (empty($_POST['skin']))? '1' : $_POST['skin'];
$get_eyes = (empty($_POST['eyes']))? '1' : $_POST['eyes'];
$get_hair = (empty($_POST['hair']))? '1' : $_POST['hair'];

$get_gender = (empty($_POST['gender']))? 'girl' : $_POST['gender'];

$get_name = (empty($_POST['name']))? '' : $_POST['name'];
$get_typography = (empty($_POST['typography']))? '1' : $_POST['typography'];
$get_dedication = (empty($_POST['dedication']))? '' : $_POST['dedication'];

$img_user = (empty($_POST['hidden_croppie_img_file']))? NULL : $_POST['hidden_croppie_img_file'];

if (!empty($img_user))  {

    list($type, $img_user) = explode(';', $img_user);
    list(, $img_user)      = explode(',', $img_user);

    $img_user = base64_decode($img_user);

    $imageName = rand(0, 1000).date("YmdHis").".png";
    
    $destinationPath = dirname(__FILE__).'/assistant/imguser/';

    file_put_contents($destinationPath.$imageName, $img_user);

    $img_user = $imageName;
}

$code_image = rand(0, 1000).date("YmdHis");

$image_create = imagecreatetruecolor(850,425);

imagealphablending($image_create, true);
imagesavealpha($image_create, true);


// Imagen Fondo Uno
$imagecreatefrompng = imagecreatefrompng("./images/background/1.png");
imagecopy($image_create,$imagecreatefrompng,0,0,0,0,850,425);

// Imagen Piel
$imagecreatefrompng = imagecreatefrompng("./images/".$get_gender."/page-1/skin/".$get_skin.".png");
imagecopy($image_create,$imagecreatefrompng,0,0,0,0,850,425);

// Imagen Ojos
$imagecreatefrompng = imagecreatefrompng("./images/".$get_gender."/page-1/eyes/".$get_eyes.".png");
imagecopy($image_create,$imagecreatefrompng,0,0,0,0,850,425);

// Imagen Cabello
$imagecreatefrompng = imagecreatefrompng("./images/".$get_gender."/page-1/hair/".$get_hair.".png");
imagecopy($image_create,$imagecreatefrompng,0,0,0,0,850,425);

imagepng($image_create, "./assistant/imgfinal/".$code_image."-page-1.png");

imagedestroy($imagecreatefrompng);


// Imagen Fondo Dos
$imagecreatefrompng = imagecreatefrompng("./images/background/2.png");
imagecopy($image_create,$imagecreatefrompng,0,0,0,0,850,425);

// Imagen Piel
$imagecreatefrompng = imagecreatefrompng("./images/".$get_gender."/page-2/skin/".$get_skin.".png");
imagecopy($image_create,$imagecreatefrompng,0,0,0,0,850,425);

// Imagen Ojos
$imagecreatefrompng = imagecreatefrompng("./images/".$get_gender."/page-2/eyes/".$get_eyes.".png");
imagecopy($image_create,$imagecreatefrompng,0,0,0,0,850,425);

// Imagen Cabello
$imagecreatefrompng = imagecreatefrompng("./images/".$get_gender."/page-2/hair/".$get_hair.".png");
imagecopy($image_create,$imagecreatefrompng,0,0,0,0,850,425);

imagepng($image_create, "./assistant/imgfinal/".$code_image."-page-2.png");

imagedestroy($imagecreatefrompng);


// Imagen Fondo Tres
$imagecreatefrompng = imagecreatefrompng("./images/background/3.png");
imagecopy($image_create,$imagecreatefrompng,0,0,0,0,850,425);

// Imagen Piel
$imagecreatefrompng = imagecreatefrompng("./images/".$get_gender."/page-3/skin/".$get_skin.".png");
imagecopy($image_create,$imagecreatefrompng,0,0,0,0,850,425);

// Imagen Ojos
$imagecreatefrompng = imagecreatefrompng("./images/".$get_gender."/page-3/eyes/".$get_eyes.".png");
imagecopy($image_create,$imagecreatefrompng,0,0,0,0,850,425);

// Imagen Cabello
$imagecreatefrompng = imagecreatefrompng("./images/".$get_gender."/page-3/hair/".$get_hair.".png");
imagecopy($image_create,$imagecreatefrompng,0,0,0,0,850,425);

imagepng($image_create, "./assistant/imgfinal/".$code_image."-page-3.png");

imagedestroy($imagecreatefrompng);


// Imagen Fondo Cuatro
$imagecreatefrompng = imagecreatefrompng("./images/background/4.png");
imagecopy($image_create,$imagecreatefrompng,0,0,0,0,850,425);

// Imagen Piel
$imagecreatefrompng = imagecreatefrompng("./images/".$get_gender."/page-4/skin/".$get_skin.".png");
imagecopy($image_create,$imagecreatefrompng,0,0,0,0,850,425);

// Imagen Ojos
$imagecreatefrompng = imagecreatefrompng("./images/".$get_gender."/page-4/eyes/".$get_eyes.".png");
imagecopy($image_create,$imagecreatefrompng,0,0,0,0,850,425);

// Imagen Orejas
$imagecreatefrompng = imagecreatefrompng("./images/".$get_gender."/page-4/ear/".$get_skin.".png");
imagecopy($image_create,$imagecreatefrompng,0,0,0,0,850,425);

// Imagen Cabello
$imagecreatefrompng = imagecreatefrompng("./images/".$get_gender."/page-4/hair/".$get_hair.".png");
imagecopy($image_create,$imagecreatefrompng,0,0,0,0,850,425);

imagepng($image_create, "./assistant/imgfinal/".$code_image."-page-4.png");

imagedestroy($imagecreatefrompng);


// Imagen Fondo Cinco
$imagecreatefrompng = imagecreatefrompng("./images/background/5.png");
imagecopy($image_create,$imagecreatefrompng,0,0,0,0,850,425);

// Imagen Piel
$imagecreatefrompng = imagecreatefrompng("./images/".$get_gender."/page-5/skin/".$get_skin.".png");
imagecopy($image_create,$imagecreatefrompng,0,0,0,0,850,425);

// Imagen Ojos
$imagecreatefrompng = imagecreatefrompng("./images/".$get_gender."/page-5/eyes/".$get_eyes.".png");
imagecopy($image_create,$imagecreatefrompng,0,0,0,0,850,425);

// Imagen Cabello
$imagecreatefrompng = imagecreatefrompng("./images/".$get_gender."/page-5/hair/".$get_hair.".png");
imagecopy($image_create,$imagecreatefrompng,0,0,0,0,850,425);

imagepng($image_create, "./assistant/imgfinal/".$code_image."-page-5.png");

imagedestroy($imagecreatefrompng);


// Imagen Fondo Seis
$imagecreatefrompng = imagecreatefrompng("./images/background/6.png");
imagecopy($image_create,$imagecreatefrompng,0,0,0,0,850,425);

// Imagen Piel
$imagecreatefrompng = imagecreatefrompng("./images/".$get_gender."/page-6/skin/".$get_skin.".png");
imagecopy($image_create,$imagecreatefrompng,0,0,0,0,850,425);

// Imagen Ojos
$imagecreatefrompng = imagecreatefrompng("./images/".$get_gender."/page-6/eyes/".$get_eyes.".png");
imagecopy($image_create,$imagecreatefrompng,0,0,0,0,850,425);

// Imagen Cabello
$imagecreatefrompng = imagecreatefrompng("./images/".$get_gender."/page-6/hair/".$get_hair.".png");
imagecopy($image_create,$imagecreatefrompng,0,0,0,0,850,425);

imagepng($image_create, "./assistant/imgfinal/".$code_image."-page-6.png");

imagedestroy($imagecreatefrompng);


$pdf = new FPDF();

$pdf->AddPage('L',array(112,225),0);
$pdf->Image("./assistant/imgfinal/".$code_image."-page-1.png",0,0,0,0,'PNG',false);

$pdf->AddPage('L',array(112,225),0);
$pdf->Image("./assistant/imgfinal/".$code_image."-page-2.png",0,0,0,0,'PNG',false);

$pdf->AddPage('L',array(112,225),0);
$pdf->Image("./assistant/imgfinal/".$code_image."-page-3.png",0,0,0,0,'PNG',false);

$pdf->AddPage('L',array(112,225),0);
$pdf->Image("./assistant/imgfinal/".$code_image."-page-4.png",0,0,0,0,'PNG',false);

$pdf->AddPage('L',array(112,225),0);
$pdf->Image("./assistant/imgfinal/".$code_image."-page-5.png",0,0,0,0,'PNG',false);

$pdf->AddPage('L',array(112,225),0);
$pdf->Image("./assistant/imgfinal/".$code_image."-page-6.png",0,0,0,0,'PNG',false);

$pdf->Output("F","./pdf/".$code_image.".pdf",false);


if (file_exists("./assistant/imgfinal/".$code_image."-page-1.png")) { unlink("./assistant/imgfinal/".$code_image."-page-1.png"); }
if (file_exists("./assistant/imgfinal/".$code_image."-page-2.png")) { unlink("./assistant/imgfinal/".$code_image."-page-2.png"); }
if (file_exists("./assistant/imgfinal/".$code_image."-page-3.png")) { unlink("./assistant/imgfinal/".$code_image."-page-3.png"); }
if (file_exists("./assistant/imgfinal/".$code_image."-page-4.png")) { unlink("./assistant/imgfinal/".$code_image."-page-4.png"); }
if (file_exists("./assistant/imgfinal/".$code_image."-page-5.png")) { unlink("./assistant/imgfinal/".$code_image."-page-5.png"); }
if (file_exists("./assistant/imgfinal/".$code_image."-page-6.png")) { unlink("./assistant/imgfinal/".$code_image."-page-6.png"); }

if (!empty($img_user)) { unlink("./assistant/imguser/".$img_user); }

?>