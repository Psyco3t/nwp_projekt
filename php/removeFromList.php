<?php

require_once '../php/functions.php';
session_start();
$attractions = GetAttractions();

$uid = $_SESSION['uid'];
$getRow = $_GET['row'];
//$attractId = $attractions[$getRow]['attraction_id'];
$attractID=$_GET['aId'];
$rowCount = PDOexec("DELETE FROM tourlist WHERE user_id='$uid' AND attraction_id='$attractID'");

header("Location:../html/about-us.php");
exit();
