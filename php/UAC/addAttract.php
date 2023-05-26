<?php
session_start();

require_once '../functions.php';
require_once '../db_config.php';
require_once '../config.php';

$city_id = mysqli_real_escape_string(databaseConnect(), $_POST['city_id']);
$name = mysqli_real_escape_string(databaseConnect(), $_POST['Name']);
$details = mysqli_real_escape_string(databaseConnect(), $_POST['Details']);
$image = $_FILES[$row.'Image']['name'];
$address=mysqli_real_escape_string(databaseConnect(), $_POST['Address']);
$lat = mysqli_real_escape_string(databaseConnect(), $_POST['Latitude']);
$long = mysqli_real_escape_string(databaseConnect(), $_POST['Longitude']);
$active = mysqli_real_escape_string(databaseConnect(), $_POST['Active']);
$agency_id = mysqli_real_escape_string(databaseConnect(), $_POST['agency_id']);

$target = "../../uploads/".basename($image);

PDOexec("INSERT INTO attractions (`city_id`, `name`, `details`,`image`,`address`,`latitude`,`longitude`,`active`,`agency_id`) VALUES ('$city_id','$name','$details','$image','$address','$lat','$long','$active','$agency_id') ");
if (move_uploaded_file($_FILES[$row.'Image']['tmp_name'], $target)) {
    $msg = "Image uploaded successfully";
}else{
    $msg = "Failed to upload image";
}
header('Location:../../html/admin.php?ViewAttractions');
exit();