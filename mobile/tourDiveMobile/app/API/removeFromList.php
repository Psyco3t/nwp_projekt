<?php
require_once 'URL.php';
require_once '../../../../php/functions.php';
session_start();
$attractions = GetAttractions();

$uid = $_SESSION['uid'];
$getRow = $_GET['row'];
//$attractId = $attractions[$getRow]['attraction_id'];
$attractID=$_GET['aId'];
//$rowCount = PDOexec("DELETE FROM tourlist WHERE user_id='$uid' AND attraction_id='$attractID'");
$data=array(
 "uid"=>$uid,
 "attractID"=>$attractID,
 "row"=>$getRow,
 "type"=>'DeleteTour');
$api=curl_init($url);
 $payload=json_encode($data);
 curl_setopt($api, CURLOPT_POSTFIELDS, $payload);
 curl_setopt($api, CURLOPT_CUSTOMREQUEST, "DELETE");
 curl_setopt($api, CURLOPT_POST, true);
 curl_setopt($api, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8'));
 curl_setopt($api, CURLOPT_RETURNTRANSFER, true);
 $result=curl_exec($api);
 curl_close($api);
header("Location:../UI/about-us.php?select");
exit();
