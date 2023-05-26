<?php
session_start();
require_once '../functions.php';
$logins = getAgencies();
echo $uid = $logins[$_GET['row']]['agency_id'];
echo $name = $logins[$_GET['row']]['name'];
PDOexec("DELETE FROM agencies WHERE agency_id='$uid' AND name='$name'");
header('Location:../../html/admin.php?AgencyView');
exit();