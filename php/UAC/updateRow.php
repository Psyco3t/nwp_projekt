<?php
session_start();

require_once '../functions.php';
require_once '../db_config.php';
require_once '../config.php';
$users = getUsers();
$row=$_GET['row'];
$fname=mysqli_real_escape_string(databaseConnect(), $_POST[$row.'first_name']);
$lname=mysqli_real_escape_string(databaseConnect(), $_POST[$row.'last_name']);
$perm=mysqli_real_escape_string(databaseConnect(), $_POST[$row.'permissions']);
$active=mysqli_real_escape_string(databaseConnect(), $_POST[$row.'active']);
$uid=mysqli_real_escape_string(databaseConnect(), $_POST[$row.'id_user']);
PDOexec("UPDATE users SET `first_name`='$fname',`last_name`='$lname',`permissions`='$perm',`active`='$active' WHERE id_user='$uid'");
header('Location:../../html/admin.php?Users');
exit();