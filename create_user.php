<?php

ob_start();
session_start();
include_once 'config.php';



// Connect to server and select database.
$link = new mysqli("$host", "$username", "$password", $db_name);
if($link->connect_error){
    die("Connection failed: ". $link->connect_error);
}

// Define $myusername and $mypassword

    $login = $_POST["login"];
    $password = $_POST["pwd"];
    $email = $_POST["email"];
    $lastid = mysqli_insert_id($link);

    //Protect mysql injection
    $login = stripcslashes($login);
    $password = stripcslashes($password);
    $email = stripcslashes($email);

    //Hashing password using salt

    $password = sha1($password.$salt);

    $sql = "INSERT INTO $tbl_name (id,login,pwd,email) VALUES ('$lastid','$login', '$password', '$email')";
        if ($link->query($sql) === TRUE) {
            echo "Вы успешно зарегистрированы";
        } else {
            echo "Error: " . $sql . "<br>" . $link->error;
        }

    $_SESSION['login'] = $login;
    $_SESSION['password'] = $password;

    $link->close();


session_abort();
ob_end_flush();
?>
