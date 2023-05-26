<?php
session_start();

require_once '../functions.php';
require_once '../db_config.php';
require_once '../config.php';
$users = getUsers();
$name = mysqli_real_escape_string(databaseConnect(), $_POST[$row . 'name']);
$city = mysqli_real_escape_string(databaseConnect(), $_POST[$row . 'city']);
$status = mysqli_real_escape_string(databaseConnect(), $_POST[$row . 'status']);
$logo = $_FILES[$row.'logo']['name'];
$password = mysqli_real_escape_string(databaseConnect(), $_POST[$row . 'password']);
$passwordHash=password_hash($password, PASSWORD_BCRYPT);
$target = "../../uploads/".basename($image);

PDOexec("INSERT INTO agencies (`name`, `city_name`, `status`, `logo`,`password`) VALUES ('$name','$city','$status','$logo','$passwordHash') ");

if (move_uploaded_file($_FILES[$row.'logo']['tmp_name'], $target)) {
    $msg = "Image uploaded successfully";
}else{
    $msg = "Failed to upload image";
}

header('Location:../../html/admin.php?AddAgency');
exit();