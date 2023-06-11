<?php
require_once '../php/functions.php';
session_start();

$name=mysqli_real_escape_string(databaseConnect(), $_POST['name']);
$subject=mysqli_real_escape_string(databaseConnect(), $_POST['subject']);
$email=mysqli_real_escape_string(databaseConnect(), $_POST['email']);
$message=mysqli_real_escape_string(databaseConnect(), $_POST['message']);

PDOexec("INSERT INTO contact (`name`,`subject`,`email`,`message`) VALUES ('$name','$subject','$email','$message')");
header('Location:../../html/contact-us.php?success=1');
exit();