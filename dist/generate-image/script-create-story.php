<?php session_start();

$_SESSION['name'] = (empty($_POST['name']))? NULL : strtoupper($_POST['name']);
$_SESSION['typography'] = (empty($_POST['typography']))? NULL : $_POST['typography'];
$_SESSION['dedication'] = (empty($_POST['dedication']))? NULL : $_POST['dedication'];

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

$_SESSION['image_user'] = $img_user;

?>