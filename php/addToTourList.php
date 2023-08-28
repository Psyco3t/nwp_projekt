<?php
require_once '../php/functions.php';
/*session_start();
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
else if(!empty($_SESSION['agencyID']))
{
    header("Location:../html/tourPage.php?row=$getRow&failure=4");
    exit();
}
else
{
    PDOexec("INSERT INTO tours (attraction_id,user_id) VALUES('$attractId','$uid')");
    $count=PDOexec("SELECT viewCount from attractions WHERE attraction_id='$attractId'")->fetchColumn();
    echo $count;
    $count=$count+1;
    updateView($attractId, $count);
    header("Location:../html/tourPage.php?row=$getRow&success=1");
    exit();
}*/

session_start();
if(isset($_POST['delete']))
{
    $getRow=$_GET['row'];
    $uid=$_SESSION['uid'];
    $name=mysqli_real_escape_string(databaseConnect(), $_POST['tourList']);
    PDOexec("DELETE FROM tourlist WHERE `listname`='$name' AND `user_id`='$uid'");
    header("Location:../html/tourcat.php?row=$getRow");
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
    header("Location:../html/tourPage.php?row=$getRow&failure=2");
    exit();
}
else if ($rowCount>0)
{
    //echo $attractId;
    //echo $getRow;
    header("Location:../html/tourPage.php?row=$getRow&failure=1");
    exit();
}
else if(!empty($_SESSION['agencyID']))
{
    header("Location:../html/tourPage.php?row=$getRow&failure=4");
    exit();
}
else
{
    if($check>0)
    {
        PDOexec("UPDATE tourlist SET `attraction_id`='$attractId' WHERE `listname`='$name'");
        $count=PDOexec("SELECT viewCount from attractions WHERE attraction_id='$attractId'")->fetchColumn();
        echo $count;
        $count=$count+1;
        updateView($attractId, $count);
        header("Location:../html/tourPage.php?row=$getRow&success=1");
        exit();
    }
    PDOexec("INSERT INTO tourlist (`listname`,`user_id`,`attraction_id`) VALUES ('$name','$uid','$attractId')");
    $count=PDOexec("SELECT viewCount from attractions WHERE attraction_id='$attractId'")->fetchColumn();
    echo $count;
    $count=$count+1;
    updateView($attractId, $count);
    header("Location:../html/tourPage.php?row=$getRow&success=1");
    exit();
}