<?php

session_start();

require_once '../functions.php';
require_once '../db_config.php';
require_once '../config.php';
$attractID = mysqli_real_escape_string(databaseConnect(), $_POST['attractionID']);
$images=PDOexec("SELECT `image` FROM images WHERE attraction_id='$attractID'")->rowCount();
$id=PDOexec("SELECT `image_id` FROM images WHERE attraction_id='$attractID'")->fetchColumn(0);
$id2=$id+1;
$id3=$id+2;
$id4=$id+3;
$pic0 = $_FILES['pic0']['name'];
$pic1 = $_FILES['pic1']['name'];
$pic2 = $_FILES['pic2']['name'];
$pic3 = $_FILES['pic3']['name'];
$pics = array($pic0,$pic1,$pic2,$pic3);
if($images>0)
{
    PDOexec("UPDATE images SET `image`='$pic0' WHERE `attraction_id`='$attractID' AND `image_id`='$id'");
    PDOexec("UPDATE images SET `image`='$pic1' WHERE `attraction_id`='$attractID' AND `image_id`='$id2'");
    PDOexec("UPDATE images SET `image`='$pic2' WHERE `attraction_id`='$attractID' AND `image_id`='$id3'");
    PDOexec("UPDATE images SET `image`='$pic3' WHERE `attraction_id`='$attractID' AND `image_id`='$id4'");
}
else
{
    PDOexec("INSERT INTO images (`image`, `attraction_id`) VALUES ('$pic0','$attractID') ");
    PDOexec("INSERT INTO images (`image`, `attraction_id`) VALUES ('$pic1','$attractID') ");
    PDOexec("INSERT INTO images (`image`, `attraction_id`) VALUES ('$pic2','$attractID') ");
    PDOexec("INSERT INTO images (`image`, `attraction_id`) VALUES ('$pic3','$attractID') ");
}


for ($item=0;3>=$item;$item++)
{
    $target = "../../uploads/" . basename($pics[$item]);
    if (move_uploaded_file($_FILES['pic'.$item]['tmp_name'], $target)) {
        $msg = "Image uploaded successfully";
    } else {
        $msg = "Failed to upload image";
    }
}
header('Location:../../html/agencyAdmin.php?ManagePictures');
exit();