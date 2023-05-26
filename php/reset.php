<?php
require '../vendor/autoload.php';
use \PHPMailer\PHPMailer\PHPMailer;

require_once 'db_config.php';
require_once 'config.php';
require_once 'functions.php';


$email=mysqli_real_escape_string(databaseConnect(), $_POST['email']);
if(empty($email))
{
    header('Location:../html/registration.php?error=2');
    exit();
}
try{
$pdo=NEW PDO($dsn,'root','');
if($pdo)
{

  $sql="SELECT * FROM users WHERE email='$email'";
  $statement=$pdo->prepare($sql);
  $statement->execute();
  if($count=$statement->rowCount()>0)
   {
      echo $count;

      $token = createCode(40);
      $mail = new PHPMailer;

      $mail->isSMTP();
      $mail->Host = 'localhost';
      $mail->SMTPAuth = false;
      $mail->Port = 1025;

      $mail->setFrom('tourDive@gmail.com', 'TourDive');
      $mail->addAddress($email, 'User');
      $mail->addReplyTo('tourDiveSupport@gmail.com', 'Password Reset');

      /*$mail->addAttachment('/tmp/file.tar.gz');
      $mail->addAttachment('/tmp/image.jpg', 'new.jpg');
      $mail->isHTML(true);*/

      $message = "Someone has requested a password reset for your account click on the link to reset your password <br> <a>http://localhost/NWP_Projekt/html/resetPass.php?token=" . $token . "</a>";
      $mail->Subject = 'Password Reset';
      $mail->msgHTML($message); //insert token here
       $mail->send();
      $sql = "UPDATE users 
      SET new_password='$token'
      WHERE email='$email'";
      $pass=$pdo->prepare($sql);
      $pass->execute();

      header("Location:../html/login.php?success=1");
      exit();
   }
  }
  else
  {
      header("Location:../html/registration.php?error=1");
      exit();
  }
}
catch (PDOException $e){
    echo $e->getMessage();
}
