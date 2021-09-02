<?php
ob_start();
session_start();
include_once 'config.php';

// Connect to server and select database.
$link = new mysqli("$host", "$username", "$password", $db_name);

if($link->connect_error){
    die("Connection failed: ". $link->connect_error);
}


$login = $_POST["login"];
$password = $_POST["pwd"];

$password = sha1($password.$salt);


$result=mysqli_query($link,"SELECT * FROM $tbl_name where login = '$login' AND pwd = '$password'");

$oldIp=mysqli_query($link,"SELECT ip FROM $tbl_name where login = '$login'");
$oldIp=$oldIp->fetch_assoc();
$oldIp=$oldIp['ip'];

$user = mysqli_fetch_assoc($result);


if(count($user) > 0)
{
    $_SESSION['auth'] = "true";
    if(!empty($_REQUEST['checkbox']))
    {
        $userIp = $_SERVER['REMOTE_ADDR'];
        if($userIp != $oldIp)
        {
            $_SESSION['match'] = "false";
        }
        else
        {
            $_SESSION['match'] = "true";
        }

        $password= sha1($password.$userIp.$salt);
        setcookie("password", $password, time() + (30*24*60*60));//month
        mysqli_query($link,"UPDATE users SET ip = '$userIp' WHERE login = '$login'");
        mysqli_query($link,"UPDATE users SET cookie = '$password' WHERE login = '$login'");



    }
    else
    {
        $password = sha1($password.$salt);
        setcookie("password", $password, time() + 900);//hour
        mysqli_query($link,"UPDATE users SET cookie = '$password' WHERE login = '$login'");
    }
}
else {
    $_SESSION['correct'] = "false";
    header("location:/login.php");
    exit();
}

header("location:/index.php");

$link->close();
ob_end_flush();
?>
