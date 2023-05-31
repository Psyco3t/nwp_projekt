<?php
session_start();
if(isset($_SESSION['admin']))
{
 $_SESSION['admin']=false;
}
$_SESSION['loggedIN']=false;
if(isset($_SESSION['agency']))
{
    $_SESSION['agency'] = false;
}

if(isset($_SESSION['isAgency']))
{
    $_SESSION['isAgency']=false;
}

session_destroy();
header('Location:../index.php');