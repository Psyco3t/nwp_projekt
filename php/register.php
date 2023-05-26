<?php
require_once 'db_config.php';
require_once 'config.php';
require_once 'functions.php';
require '../vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//$username=mysqli_real_escape_string(databaseConnect(), $_POST['username']);
$password=mysqli_real_escape_string(databaseConnect(), $_POST['password']);
$firstName=mysqli_real_escape_string(databaseConnect(), $_POST['firstName']);
$lastName=mysqli_real_escape_string(databaseConnect(), $_POST['lastName']);
$passwordRepeat=mysqli_real_escape_string(databaseConnect(), $_POST['repeatPass']);
$email=mysqli_real_escape_string(databaseConnect(), $_POST['email']);
$CurrentTime=date('Y-m-d H:m:s');
$expiryDate=date('Y-m-d H:m:s',strtotime($CurrentTime)+86400);


if(empty($password))
{
    header('Location:../html/registration.php');
    exit();
}
if(empty($firstName))
{
    header('Location:../html/registration.php');
    exit();
}
if(empty($lastName))
{
    header('Location:../html/registration.php');
    exit();
}
if($password!==$passwordRepeat)
{
    header('Location:../html/registration.php');
    exit();
}
if(empty($email))
{
    header('Location:../html/registration.php');
    exit();
}
$dsn="mysql:host=localhost;dbname=nwp_projket;charset=UTF8";

$sqlE="SELECT email FROM users WHERE email='$email'";
$emailFromDb=PDOexec($sqlE)->fetchColumn();
echo $emailFromDb;
if($email===$emailFromDb)
{
    header('Location:../html/registration.php?emailE=1');
    exit();
}
else
{
    try{
        $pdo=new PDO($dsn,'root','');
        if($pdo)
        {
            $token=createCode(40);
            $passwordHashed = password_hash($password, PASSWORD_BCRYPT);
            $sql="INSERT INTO users(first_name,last_name,password,email,registry_expires,activationToken) VALUES('$firstName','$lastName','$passwordHashed','$email','$expiryDate','$token')";

            $statement=$pdo->prepare($sql);

            $pdo->exec($sql);

            $mail = new PHPMailer;

            $mail->isSMTP();
            $mail->Host = 'localhost';
            $mail->SMTPAuth = false;
            $mail->Port = 1025;

            $mail->setFrom('tourDive@gmail.com', 'TourDive');
            $mail->addAddress($email, $firstName);
            $mail->addReplyTo('tourDiveSupport@gmail.com', 'Information');

            /*$mail->addAttachment('/tmp/file.tar.gz');
            $mail->addAttachment('/tmp/image.jpg', 'new.jpg');
            $mail->isHTML(true);*/

            $message="To activate your account click on the following link <br> <a>http://localhost/NWP_Projekt/html/login.php?token=".$token."</a>";
            $mail->Subject = 'Your account activation';
            $mail->msgHTML($message); //insert token here

            if(!$mail->send()) {
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            } else {
                echo 'Message has been sent';
            }
        }

        $userID=$pdo->lastInsertId();

        //echo $userID;
        session_start();
        $_SESSION['token']=$token;
        $_SESSION['lastInsert']=$userID;

    }catch (PDOException $e){
        echo $e->getMessage();
    }
}
header("Location:../html/registration.php?activationMsg=1");
exit();