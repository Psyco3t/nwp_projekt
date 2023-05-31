<?php

require_once '../db_config.php';
require_once '../config.php';
require '../../php/functions.php';
require '../../vendor/autoload.php';

$name = mysqli_real_escape_string(databaseConnect(), $_POST['name']);
$password = mysqli_real_escape_string(databaseConnect(), $_POST['password']);

$sql = "SELECT password FROM agencies WHERE name='$name'";
$result = PDOexec($sql)->fetchColumn();
$sqlE = "SELECT name FROM agencies WHERE name='$name'";
$emailCheck = PDOexec($sqlE)->fetchColumn();
$sqlA = "SELECT * FROM agencies WHERE name='$name' AND status='enabled'";
$adminCheck = PDOexec($sqlA)->fetchColumn();

if ($adminCheck > 0) {
    session_start();
    $_SESSION['agency'] = true;
}
else
{
    header('Location:../../html/agencyLogin.php?error=2');
    exit;
}
if (password_verify($password, $result) == true and $emailCheck === $name) {
    if(checkAgencyStatus()>0)
    {
        session_start();
        $_SESSION['loggedIN'] = true;
        $_SESSION['isAgency']=true;
        $id=PDOexec("SELECT agency_id from agencies where name='$name'")->fetchColumn();
        $_SESSION['agencyID']=$id;
        //$name = PDOexec("SELECT agency_id FROM agencies WHERE name='$name'")->fetchColumn();
        //LogRecord($name);
        header('Location:../../index.php');
        exit();
    }
    else
    {
        header('Location:../../html/agencyLogin.php?error=3');
        exit();
    }
} else {
    echo $result;
    header('Location:../../html/agencyLogin.php?error=1');
    exit;
}