<?php
require_once '../db_config.php';
require_once  '../config.php';
require '../../php/functions.php';
require '../../vendor/autoload.php';

$email=mysqli_real_escape_string(databaseConnect(), $_POST['email']);
$password=mysqli_real_escape_string(databaseConnect(), $_POST['password']);

$sql="SELECT password FROM users WHERE email='$email'";
$result=PDOexec($sql)->fetchColumn();
$sqlE="SELECT email FROM users WHERE email='$email'";
$emailCheck=PDOexec($sqlE)->fetchColumn();
$sqlA="SELECT permissions FROM users WHERE email='$email' AND permissions='admin'";
$adminCheck=PDOexec($sqlA)->fetchColumn();

if($adminCheck>0)
{
    session_start();
    $_SESSION['admin']=true;
}
if(password_verify($password, $result)==true and $emailCheck===$email)
{
    if(activeCheck($email)>0)
    {
        session_start();
        $_SESSION['loggedIN']=true;
        $name=PDOexec("SELECT id_user FROM users WHERE email='$email'")->fetchColumn();
        LogRecord($name);
        $_SESSION['uid']=PDOexec("SELECT id_user FROM users WHERE email='$email'")->fetchColumn();
        header('Location:../../index.php');
        exit();
    }
    else
    {
        header('Location:../../html/login.php?error=2');
        exit();
    }
}
else
{
    echo $result;
    header('Location:../../html/login.php?error=1');
    exit;
}