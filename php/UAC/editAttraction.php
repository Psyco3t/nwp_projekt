<?php

session_start();

require_once '../functions.php';
require_once '../db_config.php';
require_once '../config.php';
//$users = getAgenciesAll();

$row = $_GET['row'];
$uid=mysqli_real_escape_string(databaseConnect(), $_POST[$row.'attraction_id']);
$name = mysqli_real_escape_string(databaseConnect(), $_POST[$row . 'name']);
$city_id = mysqli_real_escape_string(databaseConnect(), $_POST[$row . 'city_id']);
$details = mysqli_real_escape_string(databaseConnect(), $_POST[$row . 'details']);
$address = mysqli_real_escape_string(databaseConnect(), $_POST[$row . 'address']);
$latitude = mysqli_real_escape_string(databaseConnect(), $_POST[$row . 'latitude']);
$longitude = mysqli_real_escape_string(databaseConnect(), $_POST[$row . 'longitude']);
$active = mysqli_real_escape_string(databaseConnect(), $_POST[$row . 'active']);
$agency_id = mysqli_real_escape_string(databaseConnect(), $_POST[$row . 'agency_id']);

$image = $_FILES[$row.'image']['name'];
echo $image;

// image file directory
$target = "../../uploads/".basename($image);
PDOexec("UPDATE attractions SET `name`='$name',`city_id`='$city_id',`details`='$details',`image`='$image',`address`='$address',`latitude`='$latitude',`longitude`='$longitude',`active`='$active' WHERE `attraction_id`='$uid'");

if (move_uploaded_file($_FILES[$row.'image']['tmp_name'], $target)) {
    $msg = "Image uploaded successfully";
}else{
    $msg = "Failed to upload image";
}
header('Location:../../html/admin.php?editAttraction=');
exit();