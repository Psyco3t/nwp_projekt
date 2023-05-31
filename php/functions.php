<?php
require_once 'config.php';
require_once 'db_config.php';
require dirname(__DIR__).'/vendor/autoload.php';
use Detection\MobileDetect;

function createCode($length)
{
    $down = 97;
    $up = 122;
    $i = 0;
    $code = "";

    /*
      48-57  = 0 - 9
      65-90  = A - Z
      97-122 = a - z
    */

    $div = mt_rand(3, 9); // 3

    while ($i < $length) {
        if ($i % $div == 0)
            $character = strtoupper(chr(mt_rand($down, $up)));
        else
            $character = chr(mt_rand($down, $up)); // mt_rand(97,122) chr(98)
        $code .= $character; // $code = $code.$character; //
        $i++;
    }
    return $code;
}

/**
 * @param $sql
 * @return false|PDOStatement|void
 * input SQL query and then it returns the query result, and also executes
 */
function PDOexec($sql)
{
    require_once 'config.php';
    require_once 'db_config.php';
    require dirname(__DIR__).'/vendor/autoload.php';
    //require '../vendor/autoload.php';
    $dsn="mysql:host=localhost;dbname=nwp_projket;charset=UTF8";
    try{
        $pdo=new PDO($dsn,'root','');
        if($pdo)
        {
            $stmnt=$pdo->prepare($sql);
            $stmnt->execute();
            return $stmnt;
        }
    }catch (PDOException $e)
    {
        echo $e->getMessage();
    }
}

function LogRecord($username)
{
    require_once 'config.php';
    require_once 'db_config.php';
    require_once 'functions.php';
    require dirname(__DIR__).'/vendor/autoload.php';
    $dsn="mysql:host=localhost;dbname=nwp_projket;charset=UTF8";
    $detect = new MobileDetect();
    $browser = strtolower($_SERVER['HTTP_USER_AGENT']);
    $device = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');
    $ip=getIpAddress();
    //$time=time();
    PDOexec("INSERT INTO logs (user_id,browser,ip_address,device_type) VALUES('$username','$browser','$ip','$device')");
}

function getIpAddress()
{

    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }

    if(!filter_var($ip, FILTER_VALIDATE_IP)) {
        $ip = "unknown";
    }

    return $ip;
}
function getLogins()
{
    require_once 'config.php';
    require_once 'db_config.php';
    require_once 'functions.php';
    require dirname(__DIR__).'/vendor/autoload.php';
    $dsn="mysql:host=localhost;dbname=nwp_projket;charset=UTF8";
    return PDOexec("SELECT user_id,browser,ip_address,LastLoginDate,device_type FROM logs")->fetchAll(PDO::FETCH_ASSOC);
}
function getUsers()
{
    require_once 'config.php';
    require_once 'db_config.php';
    require_once 'functions.php';
    require dirname(__DIR__).'/vendor/autoload.php';
    $dsn="mysql:host=localhost;dbname=nwp_projket;charset=UTF8";
    return PDOexec("SELECT id_user,first_name,last_name,email,permissions,active FROM users")->fetchAll(PDO::FETCH_ASSOC);
}

function getAgencies()
{
    require_once 'config.php';
    require_once 'db_config.php';
    require_once 'functions.php';
    require dirname(__DIR__).'/vendor/autoload.php';
    $dsn="mysql:host=localhost;dbname=nwp_projket;charset=UTF8";
    return PDOexec("SELECT agency_id,name,city_name,status FROM agencies")->fetchAll(PDO::FETCH_ASSOC);
}

function getAgenciesAll()
{
    require_once 'config.php';
    require_once 'db_config.php';
    require_once 'functions.php';
    require dirname(__DIR__).'/vendor/autoload.php';
    $dsn="mysql:host=localhost;dbname=nwp_projket;charset=UTF8";
    return PDOexec("SELECT agency_id,name,city_name,status,logo FROM agencies")->fetchAll(PDO::FETCH_ASSOC);
}

function getAllCities()
{
    require_once 'config.php';
    require_once 'db_config.php';
    require_once 'functions.php';
    require dirname(__DIR__).'/vendor/autoload.php';
    $dsn="mysql:host=localhost;dbname=nwp_projket;charset=UTF8";
    return PDOexec("SELECT city_id,city_name FROM cities")->fetchAll(PDO::FETCH_ASSOC);
}

function addAgency($name,$city,$status,$logo)
{
    require_once 'config.php';
    require_once 'db_config.php';
    require_once 'functions.php';
    require dirname(__DIR__).'/vendor/autoload.php';
    $dsn="mysql:host=localhost;dbname=nwp_projket;charset=UTF8";
    return PDOexec("INSERT INTO agencies (`name`, `city_name`, `status`, `logo`) VALUES ('$name','$city','$status','$logo') ")->fetchAll(PDO::FETCH_ASSOC);
}
function ViewAttractions()
{
    require_once 'config.php';
    require_once 'db_config.php';
    require_once 'functions.php';
    require dirname(__DIR__).'/vendor/autoload.php';
    $dsn="mysql:host=localhost;dbname=nwp_projket;charset=UTF8";
    return PDOexec("SELECT  attraction_id,city_id,name,details,address,latitude,longitude,active,agency_id FROM attractions")->fetchAll(PDO::FETCH_ASSOC);
}

function GetAttractions()
{
    require_once 'config.php';
    require_once 'db_config.php';
    require_once 'functions.php';
    require dirname(__DIR__).'/vendor/autoload.php';
    $dsn="mysql:host=localhost;dbname=nwp_projket;charset=UTF8";
    return PDOexec("SELECT  attraction_id,city_id,name,details,address,latitude,longitude,active,agency_id,image FROM attractions")->fetchAll(PDO::FETCH_ASSOC);
}

function GetImages()
{
    require_once 'config.php';
    require_once 'db_config.php';
    require_once 'functions.php';
    require dirname(__DIR__).'/vendor/autoload.php';
    $dsn="mysql:host=localhost;dbname=nwp_projket;charset=UTF8";
    return PDOexec("SELECT  image_id,image,attraction_id FROM images")->fetchAll(PDO::FETCH_ASSOC);
}

function returnCity($city)
{
    require_once 'config.php';
    require_once 'db_config.php';
    require_once 'functions.php';
    require dirname(__DIR__).'/vendor/autoload.php';
    $dsn="mysql:host=localhost;dbname=nwp_projket;charset=UTF8";
    $array = PDOexec("SELECT city_name FROM cities WHERE city_id='$city'")->fetchAll(PDO::FETCH_ASSOC);
    return $array[0]['city_name'];
}
function getComments($id)
{
    require_once 'config.php';
    require_once 'db_config.php';
    require_once 'functions.php';
    require dirname(__DIR__).'/vendor/autoload.php';
    $dsn="mysql:host=localhost;dbname=nwp_projket;charset=UTF8";
    return PDOexec("SELECT comment_id,attraction_id,text,user_id,status FROM comments WHERE attraction_id='$id'")->fetchAll(PDO::FETCH_ASSOC);
}

function getUserCommentID($id)
{
    require_once 'config.php';
    require_once 'db_config.php';
    require_once 'functions.php';
    require dirname(__DIR__).'/vendor/autoload.php';
    $dsn="mysql:host=localhost;dbname=nwp_projket;charset=UTF8";
    return PDOexec("SELECT user_id FROM comments WHERE user_id='$id'")->fetchAll(PDO::FETCH_ASSOC);
}

function getCommentsColumn($id)
{
    require_once 'config.php';
    require_once 'db_config.php';
    require_once 'functions.php';
    require dirname(__DIR__).'/vendor/autoload.php';
    $dsn="mysql:host=localhost;dbname=nwp_projket;charset=UTF8";
    return PDOexec("SELECT comment_id,attraction_id,text,user_id,status FROM comments WHERE attraction_id='$id'")->rowCount();
}

function getUser($id)
{
    require_once 'config.php';
    require_once 'db_config.php';
    require_once 'functions.php';
    require dirname(__DIR__).'/vendor/autoload.php';
    $dsn="mysql:host=localhost;dbname=nwp_projket;charset=UTF8";
    return PDOexec("SELECT id_user,first_name,last_name,email,permissions,active FROM users WHERE id_user='$id'")->fetchAll(PDO::FETCH_ASSOC);
}

function activeCheck($email)
{
    require_once 'config.php';
    require_once 'db_config.php';
    require_once 'functions.php';
    require dirname(__DIR__).'/vendor/autoload.php';
    $dsn="mysql:host=localhost;dbname=nwp_projket;charset=UTF8";
    return PDOexec("SELECT id_user,first_name,last_name,email,permissions,active FROM users WHERE email='$email' AND active=1")->rowCount();
}

function checkAgencyStatus()
{
    require_once 'config.php';
    require_once 'db_config.php';
    require_once 'functions.php';
    require dirname(__DIR__).'/vendor/autoload.php';
    $dsn="mysql:host=localhost;dbname=nwp_projket;charset=UTF8";
    return PDOexec("SELECT agency_id,name,city_name,status,logo FROM agencies WHERE status='enabled'")->rowCount();
}

function fetchFromList($userID)
{
    require_once 'config.php';
    require_once 'db_config.php';
    require_once 'functions.php';
    require dirname(__DIR__).'/vendor/autoload.php';
    $dsn="mysql:host=localhost;dbname=nwp_projket;charset=UTF8";
    return PDOexec("SELECT * FROM attractions INNER JOIN tours ON attractions.attraction_id=tours.attraction_id INNER JOIN users ON tours.user_id=users.id_user WHERE user_id='$userID'")->fetchAll(PDO::FETCH_ASSOC);
}

function fetchFromFavorites($userID)
{
    require_once 'config.php';
    require_once 'db_config.php';
    require_once 'functions.php';
    require dirname(__DIR__).'/vendor/autoload.php';
    $dsn="mysql:host=localhost;dbname=nwp_projket;charset=UTF8";
    return PDOexec("SELECT * FROM attractions INNER JOIN favorites ON attractions.attraction_id=favorites.attraction_id INNER JOIN users ON favorites.user_id=users.id_user WHERE user_id='$userID'")->fetchAll(PDO::FETCH_ASSOC);
}

function getActiveAttractions()
{
    require_once 'config.php';
    require_once 'db_config.php';
    require_once 'functions.php';
    require dirname(__DIR__).'/vendor/autoload.php';
    $dsn="mysql:host=localhost;dbname=nwp_projket;charset=UTF8";
    return PDOexec("SELECT  attraction_id,city_id,name,details,address,latitude,longitude,active,agency_id,image FROM attractions WHERE active='enable'")->fetchAll(PDO::FETCH_ASSOC);
}