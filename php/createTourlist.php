<?php

require_once '../php/functions.php';
session_start();
$attractions = GetAttractions();
$row=$_GET['row'];
$uid = $_SESSION['uid'];
$name=mysqli_real_escape_string(databaseConnect(), $_POST['name']);

$check=PDOexec("SELECT * FROM tourlist WHERE `listname`='$name'")->rowCount();

if($check!=0)
{
    header("Location:../html/tourcat.php?error=1");
    exit();
}
else
{
    PDOexec("INSERT INTO tourlist (`listname`,user_id) VALUES('$name','$uid')");
}
header("Location:../html/tourcat.php?row=$row");
exit();
