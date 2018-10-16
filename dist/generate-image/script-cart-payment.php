<?php

$today       = date("dmYHis"); 
$send_url    = 'https://sandbox.gateway.payulatam.com/ppp-web-gateway';
$api_key     = '4Vj8eK4rloUd272L48hsrarnUA';

$data = array(
    'accountId'         => "512321", 
    'merchantId'        => "508029",
    'referenceCode'     => "TCS-".$today,
    'tax'               => 0,
    'taxReturnBase'     => 0,
    'amount'            => 10000,
    'currency'          => "COP",
    'description'       => "Tu Cuento Soñado",
    'responseUrl'       => "",
    'confirmationUrl'   => "",
    'test'              => 1,
    'buyerEmail'        => $_POST['email'],
    'buyerFullName'     => $_POST['name']." ".$_POST['surname'],
    'lng'               => 'es'
);

$aux = $api_key."~".$data['merchantId']."~".$data['referenceCode']."~".$data['amount']."~".$data['currency'];

$data['signature'] = md5($aux);

?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Tu Cuento Soñado</title>

    <style type="text/css">
        #windows-fixed {
            width: 100%;
            height: 100vh;
            position: fixed;
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: center;
        }
        #windows-fixed h3 {
            font-family: 'Arial';
            font-size: 40px;
            color: #000;
        }
    </style>

</head>
<body>

    <div id="windows-fixed"><h3>Cargando...</h3></div>

    <form id="pay" method="post" action="<?=$send_url?>" target="_self">

        <?php foreach($data as $key => $value): ?>

            <input name="<?=$key?>" type="hidden" value="<?=$value?>">

        <?php endforeach ?>

    </form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script type="text/javascript">$(document).ready(function() { $("#pay").submit(); });</script>

</body>
</html>