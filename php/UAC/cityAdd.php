<?php
session_start();

require_once '../functions.php';
require_once '../db_config.php';
require_once '../config.php';
$name = mysqli_real_escape_string(databaseConnect(), $_POST['cityName']);
echo $name;
PDOexec("INSERT INTO cities (`city_name`) VALUES ('$name') ");
header('Location:../../html/admin.php?ViewLocations');
exit();