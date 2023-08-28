<?php
require_once '../../../../php/functions.php';
if(isset($_POST['select']))
{
 
 $attractions=GetAttractions();
 $name=mysqli_real_escape_string(databaseConnect(), $_POST['listname']);
 $uid=$_SESSION['uid'];
 $getRow=$_GET['row'];
 //echo $getRow;
 $attractId=$attractions[$getRow]['attraction_id'];
 $check=PDOexec("SELECT * FROM tourlist WHERE attraction_id='0' AND user_id='$uid'")->rowCount();
 $rowCount=PDOexec("SELECT * FROM tourlist WHERE user_id='$uid' AND attraction_id='$attractId' AND `listname`='$name'")->rowCount();
 $data=array(["name"=>$name,
 "uid"=>$uid,
 "getRow"=>$getRow,
 "attractID"=>$attractId,
 "rowCount"=>$rowCount,
 "check"=>$check,
 "type"=>'addToList']);

 $url='http://localhost/nwP_Projekt/mobile/tourDiveMobile/app/API/submit.php';
 $api=curl_init($url);
 $payload=json_encode($data);
 curl_setopt($api, CURLOPT_POSTFIELDS, $payload);
 curl_setopt($api, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8'));
 curl_setopt($api, CURLOPT_RETURNTRANSFER, true);
 $result=curl_exec($api);
 curl_close($api);
 header("Location:../UI/tourPage.php?row=$getRow&success=1");
 exit();
}
