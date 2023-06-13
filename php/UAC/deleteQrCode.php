<?php
session_start();
require_once '../functions.php';
$contacts = getQrCodes();
echo $uid = $contacts[$_GET['row']]['id_qr_code'];
PDOexec("DELETE FROM qr_code WHERE id_qr_code='$uid' ");
$uri = $_SESSION['referer'];
if(str_contains($uri, 'agencyAdmin.php'))
{
    header('Location:../../html/agencyAdmin.php?generateQRCode');
}
else
{
    header('Location:../../html/admin.php?generateQRCode');
}
exit();