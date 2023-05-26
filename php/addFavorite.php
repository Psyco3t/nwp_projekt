<?php

require_once '../php/functions.php';
session_start();
$attractions = getActiveAttractions();

$uid = $_SESSION['uid'];
$getRow = $_GET['row'];
$attractId = $attractions[$getRow]['attraction_id'];
$rowCount = PDOexec("SELECT * FROM favorites WHERE user_id='$uid' AND attraction_id='$attractId'")->rowCount();

if ($_SESSION['loggedIN'] == false) {
    header("Location:../html/tourPage.php?row=$getRow&failure=2");
    exit();
} else if ($rowCount > 0) {
    header("Location:../html/tourPage.php?row=$getRow&failure=3");
    exit();
} else {
    PDOexec("INSERT INTO favorites (user_id,attraction_id) VALUES('$uid','$attractId')");
    header("Location:../html/tourPage.php?row=$getRow&success=2");
    exit();
}
