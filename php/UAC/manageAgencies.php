<?php
session_start();

require_once '../functions.php';
require_once '../db_config.php';
require_once '../config.php';
$users = getAgenciesAll();
$row = $_GET['row'];
$name = mysqli_real_escape_string(databaseConnect(), $_POST[$row . 'name']);
$city = mysqli_real_escape_string(databaseConnect(), $_POST[$row . 'cities']);
$status = mysqli_real_escape_string(databaseConnect(), $_POST[$row . 'status']);
$logo = mysqli_real_escape_string(databaseConnect(), $_POST[$row . 'logo']);
$uid = mysqli_real_escape_string(databaseConnect(), $_POST[$row . 'agency_id']);
PDOexec("UPDATE agencies SET `name`='$name',`city_name`='$city',`status`='$status',`logo`='$logo' WHERE agency_id='$uid'");
header('Location:../../html/admin.php?ManageAgency');
exit();