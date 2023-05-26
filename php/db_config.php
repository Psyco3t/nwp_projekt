<?php
function databaseConnect()
{
    $connection = mysqli_connect(PARAMS["HOST"], PARAMS["USER"], PARAMS['PASSWORD'], PARAMS['DATABASE']) or die(mysqli_connect_error());
    if (mysqli_connect_errno()) {
        echo 'Failed to connect to MYSQL' . mysqli_connect_error();
    }
    mysqli_query($connection, "SET NAMES utf8") or die(mysqli_error($connection));
    mysqli_query($connection, "SET CHARACTER SET utf8") or die(mysqli_error($connection));
    mysqli_query($connection, "SET COLLATION_CONNECTION='utf8_general_ci'") or die(mysqli_error($connection));
    return $connection;
}
$dsn="mysql:host=localhost;dbname=nwp_projket;charset=UTF8";