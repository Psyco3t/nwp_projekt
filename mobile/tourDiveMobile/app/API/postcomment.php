<?php
session_start();

require_once '../../../../php/functions.php';
require_once '../../../../php/db_config.php';
require_once '../../../../php/config.php';
require_once 'URL.php';

$row=$_GET['row'];
$attractions=GetAttractions();
$text = mysqli_real_escape_string(databaseConnect(), $_POST['comment']);
$attractionID=$attractions[$row]['attraction_id'];
$user_id=$_SESSION['uid'];
$status='public'; //placeholder

$data=array(
"uid"=>$user_id,
"getRow"=>$row,
"attractID"=>$attractionID,
"status"=>$status,
"text"=>$text,
"type"=>'postComment');
//$url='http://localhost/nwP_Projekt/mobile/tourDiveMobile/app/API/submit.php';
$api=curl_init($url);
$payload=json_encode($data);
curl_setopt($api, CURLOPT_POSTFIELDS, $payload);
curl_setopt($api, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($api, CURLOPT_POST, true);
curl_setopt($api, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8'));
curl_setopt($api, CURLOPT_RETURNTRANSFER, true);
$result=curl_exec($api);
if(curl_exec($api)===false){
 echo 'curl error '.curl_error($api); 
}
else
{
 echo 'success';
}
curl_close($api);

//header("Location:../UI/tourPage.php?row=$row");
//exit();