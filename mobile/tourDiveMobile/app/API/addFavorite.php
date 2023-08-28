<?php
require_once 'URL.php';
require_once '../../../../php/functions.php';
session_start();
$attractions = getActiveAttractions();

$uid = $_SESSION['uid'];
$getRow = $_GET['row'];
$attractId = $attractions[$getRow]['attraction_id'];
$rowCount = PDOexec("SELECT * FROM favorites WHERE user_id='$uid' AND attraction_id='$attractId'")->rowCount();

if ($_SESSION['loggedIN'] == false) {
    header("Location:../UI/tourPage.php?row=$getRow&failure=2");
    exit();
} else if ($rowCount > 0) {
    header("Location:../UI/tourPage.php?row=$getRow&failure=3");
    exit();
} else {
    $data=array(
        "uid"=>$uid,
        "attractID"=>$attractId,
        "type"=>'addFavorite');
    $api=curl_init($url);
        $payload=json_encode($data);
        curl_setopt($api, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($api, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($api, CURLOPT_POST, true);
        curl_setopt($api, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8'));
        curl_setopt($api, CURLOPT_RETURNTRANSFER, true);
        $result=curl_exec($api);
        curl_close($api);
        //this here is bullshit
    header("Location:../UI/tourPage.php?row=$getRow&success=2");
    exit();
}
