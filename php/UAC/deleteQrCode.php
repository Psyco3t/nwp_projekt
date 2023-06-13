<?php
session_start();
require_once '../functions.php';
$uid=$_SESSION['agencyID'];
if(empty($uid)==false)
{
    $contacts = getQrCodes($uid);
    $qrID = $contacts[$_GET['row']]['id_qr_code'];
    PDOexec("DELETE FROM qr_code WHERE UID='$uid' AND id_qr_code='$qrID'");
}
else
{
    $uid=$_SESSION['uid'];
    $contacts = getQrCodes($uid);
    $qrID = $contacts[$_GET['row']]['id_qr_code'];
    PDOexec("DELETE FROM qr_code WHERE UID='$uid' AND id_qr_code='$qrID' ");
}
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