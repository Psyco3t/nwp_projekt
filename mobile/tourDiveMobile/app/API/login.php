<?php
require_once '../../../../php/db_config.php';
require_once  '../../../../php/config.php';
require '../../../../php/functions.php';
require '../../../../vendor/autoload.php';

$method=$_SERVER["REQUEST_METHOD"];
//echo $method;
$encodedData=file_get_contents('php://input');
$decodedData=json_decode($encodedData,true);

$userEmail=trim($decodedData['email']);
$userPassword=$decodedData['password'];

echo $userEmail;
echo $userPassword;

// $userEmail=mysqli_real_escape_string(databaseConnect(), $_POST['email']);
// $userPassword=mysqli_real_escape_string(databaseConnect(), $_POST['password']);

$sql="SELECT password FROM users WHERE email='$userEmail'";
$result=PDOexec($sql)->fetchColumn();
$sqlE="SELECT email FROM users WHERE email='$userEmail'";
$userEmailCheck=PDOexec($sqlE)->fetchColumn();
$sqlA="SELECT permissions FROM users WHERE email='$userEmail' AND permissions='admin'";
$adminCheck=PDOexec($sqlA)->fetchColumn();

if($adminCheck>0)
{
    session_start();
    $_SESSION['admin']=true;
}
if(password_verify($userPassword, $result)==true and $userEmailCheck===$userEmail)
{
    if(activeCheck($userEmail)>0)
    {
        session_start();
        $_SESSION['loggedIN']=true;
        $name=PDOexec("SELECT id_user FROM users WHERE email='$userEmail'")->fetchColumn();
        LogRecord($name);
        $_SESSION['uid']=PDOexec("SELECT id_user FROM users WHERE email='$userEmail'")->fetchColumn();
        http_response_code(200);
        //header('Location:../../index.php');
        exit();
    }
    else
    {
        //header('Location:../../html/login.php?error=2');
        echo 'error 2';
        $_SESSION['loggedIN']=false;
        exit();
    }
}
else
{
    echo $result;
    //header('Location:../../html/login.php?error=1');
    $loginArr=array('login'=>'false');
    json_encode($loginArr);
    echo 'error 1';
    $_SESSION['loggedIN']=false;
    exit;
}