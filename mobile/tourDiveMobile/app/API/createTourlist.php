<?php
require_once 'URL.php';
require_once '../../../../php/functions.php';
session_start();
$attractions = GetAttractions();
$row=$_GET['row'];
$uid = $_SESSION['uid'];
$name=mysqli_real_escape_string(databaseConnect(), $_POST['name']);

$check=PDOexec("SELECT * FROM tourlist WHERE `listname`='$name'")->rowCount();


if($check!=0)
{
    header("Location:../UI/tourcat.php?error=1");
    exit();
}
else
{
    $data=array("name"=>$name,
        "uid"=>$uid,
        "getRow"=>$row,
        "type"=>'addList');
        //$url='http://localhost/nwP_Projekt/mobile/tourDiveMobile/app/API/submit.php';
        $api=curl_init($url);
        $payload=json_encode($data);
        curl_setopt($api, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($api, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8'));
        curl_setopt($api, CURLOPT_RETURNTRANSFER, true);
        $result=curl_exec($api);
        curl_close($api);
}
header("Location:../UI/tourcat.php?row=$row");
exit();
