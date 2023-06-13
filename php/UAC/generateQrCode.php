<?php
require_once '../functions.php';
require_once '../../vendor/autoload.php';
session_start();

$uri=mysqli_real_escape_string(databaseConnect(), $_POST['uri']);
$name=mysqli_real_escape_string(databaseConnect(), $_POST['name']);
$qrcode=(new \chillerlan\QRCode\QRCode())->render($uri,'../../qrCodes/'.$name.'.png');
$uid=$_SESSION['agencyID'];
if(empty($uid)==false)
{
    PDOexec("INSERT INTO qr_code (`code`,`file_name`,UID) VALUES ('$uri','$name','$uid')");
}
else
{
    $uid=$_SESSION['uid'];
    PDOexec("INSERT INTO qr_code (`code`,`file_name`,UID) VALUES ('$uri','$name','$uid')");
}


printf('<img src="%s" alt="QR Code" />', $qrcode);

$uri=$_SESSION['referer'];
if(str_contains($uri, 'agencyAdmin.php'))
{
    header('Location:../../html/agencyAdmin.php?generateQRCode');
}
else
{
    header('Location:../../html/admin.php?generateQRCode');
}
exit();