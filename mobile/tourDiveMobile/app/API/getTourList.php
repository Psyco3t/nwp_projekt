<?php
session_start();
require_once '../../../../php/functions.php';
$attractions=GetAttractions();
$name=mysqli_real_escape_string(databaseConnect(), $_POST['tourList']);
$attractId=$attractions[$getRow]['attraction_id'];
$check=PDOexec("SELECT * FROM tourlist WHERE listname='$name'")->rowCount();

if($check>0)
{
    header("Location:../UI/about-us.php?select");
    $_SESSION['listname']=PDOexec("SELECT DISTINCT listname FROM tourlist WHERE listname='$name'")->fetchColumn();
    exit();
}
else
{
    header("Location:../UI/about-us.php?error=1");
    exit();
}