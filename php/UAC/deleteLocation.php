<?php
session_start();
require_once '../functions.php';
$logins = getAllCities();
echo $uid = $logins[$_GET['row']]['city_id'];
echo $name = $logins[$_GET['row']]['city_name'];
PDOexec("DELETE FROM cities WHERE city_id='$uid' AND city_name='$name'");
header('Location:../../html/admin.php?ViewLocations');
exit();