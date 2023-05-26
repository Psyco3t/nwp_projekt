<?php
session_start();

require_once 'functions.php';
require_once 'db_config.php';
require_once 'config.php';

$row=$_GET['row'];
$attractions=GetAttractions();
$text = mysqli_real_escape_string(databaseConnect(), $_POST['comment']);
$attractionID=$attractions[$row]['attraction_id'];
$user_id=$_SESSION['uid'];
$status='public'; //placeholder

PDOexec("INSERT INTO comments (`attraction_id`,`text`,`user_id`,`status`) VALUES('$attractionID','$text','$user_id','$status')");
header("Location:../html/tourPage.php?row=$row");
exit();