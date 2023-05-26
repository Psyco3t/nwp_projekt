<?php
session_start();
require_once 'functions.php';
$logins=getLogins();
echo $uid=$logins[$_GET['row']]['user_id'];
echo $date=$logins[$_GET['row']]['LastLoginDate'];
PDOexec("DELETE FROM logs WHERE user_id='$uid' AND LastLoginDate='$date'");
header('Location:../html/admin.php?Logins');
exit();