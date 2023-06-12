<?php
require_once '../functions.php';
require_once '../../vendor/autoload.php';

$uri=mysqli_real_escape_string(databaseConnect(), $_POST['uri']);
$name=mysqli_real_escape_string(databaseConnect(), $_POST['name']);
$qrcode=(new \chillerlan\QRCode\QRCode())->render($uri,'../../qrCodes/'.$name.'.png');

PDOexec("INSERT INTO qr_code (`code`,`file_name`) VALUES ('$uri','$name')");


printf('<img src="%s" alt="QR Code" />', $qrcode);

header('Location:../../html/admin.php?generateQRCode');
exit();