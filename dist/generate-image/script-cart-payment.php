<?php

$today       = date("dmYHis"); 
$send_url    = 'https://sandbox.gateway.payulatam.com/ppp-web-gateway';
$encrypt_key = '4Vj8eK4rloUd272L48hsrarnUA';
$api_key     = '5tedccvna3v5qlj9k0e62s7b5f';

$data = array(
    'accountId'         => "505658", 
    'merchantId'        => "504698",
    'referenceCode'     => "Pay".$today,
    'tax'               => 0,
    'taxReturnBase'     => 0,
    'amount'            => 30,
    'currency'          => "USD",
    'description'       => "crea tu cuento",
    'responseUrl'       => "",
    'confirmationUrl'   => "",
    'test'              => 1,
    'buyerEmail'        => "",
    'buyerFullName'     => "",
    'lng'               => 'en'
);

$aux = $encrypt_key."~".$data['merchantId']."~".$data['referenceCode']."~".$data['amount']."~".$data['currency'];

$data['signature'] = md5($aux);

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Tu Cuento Soñado</title>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
</head>

<body>

<table width="300" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" valign="middle">Cargando...</td>
  </tr>
</table>

<form id="pay" method="post" action="<?=$send_url?>" target="_self">

    <?php foreach($data as $key => $value): ?>

        <input name="<?=$key?>" type="hidden" value="<?=$value?>">

    <?php endforeach ?>

</form>

<script type="text/javascript">

$(document).ready(function() {
    
    //$("#pay").submit();
    
});

</script>
</body>
</html>
