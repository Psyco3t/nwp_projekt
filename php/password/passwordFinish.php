<?php
require_once '../db_config.php';
require_once '../functions.php';

$password=mysqli_real_escape_string(databaseConnect(), $_POST['password']);
$password2=mysqli_real_escape_string(databaseConnect(), $_POST['passwordRepeat']);
if($password2!=$password)
{
    header("Location:../html/resetPass.php?error=1");
    exit();
}

$passCrypt=password_hash($password, PASSWORD_BCRYPT);
$token=$_GET['token'];
$sql="UPDATE users SET password='$passCrypt'
WHERE new_password='$token'";
$pdo=new PDO($dsn,'root','');

$pass=$pdo->prepare($sql);
$pass->execute();

header("Location:/NWP_Projekt/html/login.php?success=2");
exit();