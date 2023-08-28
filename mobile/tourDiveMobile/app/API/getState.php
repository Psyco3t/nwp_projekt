<?php
session_start();

if(isset($_SESSION['loggedIN']) and isset($_SESSION['admin']))
{
 $state=$_SESSION['loggedIN'];
 $admin=$_SESSION['admin'];
 $loginState=array(
  "login"=>var_export($state, true),
 "admin"=>var_export($admin, true));
 header("Content-Type: application/json; charset=utf-8");
 echo json_encode($loginState);
 http_response_code(200);
}
else if(isset($_SESSION['loggedIN']))
{
 $state=$_SESSION['loggedIN'];
 $loginState=array("login"=>var_export($state, true));
 header("Content-Type: application/json; charset=utf-8");
 echo json_encode($loginState);
 http_response_code(200);
}
else
{
 $state='false';
 $loginState=array('login'=>$state);
 header("Content-Type: application/json; charset=utf-8");
 echo json_encode($loginState);
 http_response_code(200);
}