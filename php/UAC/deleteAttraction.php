<?php
session_start();
require_once '../functions.php';
$logins = ViewAttractions();
echo $uid = $logins[$_GET['row']]['attraction_id'];
echo $name = $logins[$_GET['row']]['name'];
PDOexec("DELETE FROM attractions WHERE attraction_id='$uid' AND name ='$name'");
$uri=$_SESSION['referer'];
if(str_contains($uri, 'agencyAdmin.php'))
{
    header('Location:../../html/agencyAdmin.php?ViewAttractions');
}
else
{
    header('Location:../../html/admin.php?ViewAttractions');
}
exit();