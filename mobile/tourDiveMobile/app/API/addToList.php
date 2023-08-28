<?php
require_once 'URL.php';
require_once '../../../../php/functions.php';

session_start();
if(isset($_POST['delete']))
{
    $getRow=$_GET['row'];
    $uid=$_SESSION['uid'];
    $name=mysqli_real_escape_string(databaseConnect(), $_POST['tourList']);
    $data=array(["name"=>$name,
        "uid"=>$uid,
        "getRow"=>$getRow,
        "type"=>'removeList']);
        //$url='http://localhost/nwP_Projekt/mobile/tourDiveMobile/app/API/submit.php';
        $api=curl_init($url);
        $payload=json_encode($data);
        curl_setopt($api, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($api, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8'));
        curl_setopt($api, CURLOPT_RETURNTRANSFER, true);
        $result=curl_exec($api);
        curl_close($api);
        var_dump($data);
    header("Location:../UI/tourcat.php?row=$getRow");
    exit();
}
$attractions=GetAttractions();
$name=mysqli_real_escape_string(databaseConnect(), $_POST['tourList']);
$uid=$_SESSION['uid'];
$getRow=$_GET['row'];
echo $getRow;
$attractId=$attractions[$getRow]['attraction_id'];
$check=PDOexec("SELECT * FROM tourlist WHERE attraction_id='0' AND user_id='$uid'")->rowCount();
$rowCount=PDOexec("SELECT * FROM tourlist WHERE user_id='$uid' AND attraction_id='$attractId' AND `listname`='$name'")->rowCount();


if($_SESSION['loggedIN']==false)
{
    header("Location:../UI/tourPage.php?row=$getRow&failure=2");
    exit();
}
else if ($rowCount>0)
{
    //echo $attractId;
    //echo $getRow;
    header("Location:../UI/tourPage.php?row=$getRow&failure=1");
    exit();
}
else if(!empty($_SESSION['agencyID']))
{
    header("Location:../UI/tourPage.php?row=$getRow&failure=4");
    exit();
}
else
{
    if($check>0)
    {
        PDOexec("UPDATE tourlist SET `attraction_id`='$attractId' WHERE `listname`='$name'");
        $count=PDOexec("SELECT viewCount from attractions WHERE attraction_id='$attractId'")->fetchColumn();
        //echo $count;
        $count=$count+1;
        updateView($attractId, $count);

        $data=array(["name"=>$name,
        "uid"=>$uid,
        "getRow"=>$getRow,
        "attractID"=>$attractId,
        "rowCount"=>$rowCount,
        "check"=>$check,
        "type"=>'addToList']);
        //$url='http://localhost/nwP_Projekt/mobile/tourDiveMobile/app/API/submit.php';
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
    PDOexec("INSERT INTO tourlist (`listname`,`user_id`,`attraction_id`) VALUES ('$name','$uid','$attractId')");
    $count=PDOexec("SELECT viewCount from attractions WHERE attraction_id='$attractId'")->fetchColumn();
    //echo $count;
    $count=$count+1;
    updateView($attractId, $count);

    $data=array("name"=>$name,
        "uid"=>$uid,
        "getRow"=>$getRow,
        "attractID"=>$attractId,
        "rowCount"=>$rowCount,
        "check"=>$check,
        "type"=>'addToList');
        //$url='http://localhost/nwP_Projekt/mobile/tourDiveMobile/app/API/submit.php';
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