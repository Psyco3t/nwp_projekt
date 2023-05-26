<?php
require_once '../php/functions.php';
session_start();
$attractions=GetAttractions();

$uid=$_SESSION['uid'];
$getRow=$_GET['row'];
$attractId=$attractions[$getRow]['attraction_id'];
$rowCount=PDOexec("SELECT * FROM tours WHERE user_id='$uid' AND attraction_id='$attractId'")->rowCount();

if($_SESSION['loggedIN']==false)
{
    header("Location:../html/tourPage.php?row=$getRow&failure=2");
    exit();
}
else if ($rowCount>0)
{
    header("Location:../html/tourPage.php?row=$getRow&failure=1");
    exit();
}
else
{
    PDOexec("INSERT INTO tours (attraction_id,user_id) VALUES('$attractId','$uid')");
    header("Location:../html/tourPage.php?row=$getRow&success=1");
    exit();
}
