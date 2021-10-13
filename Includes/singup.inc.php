<?php

if (isset($_POST["submit"])){

    $name = $_POST["username"];
    $email = $_POST["email"];
    $pwd = $_POST["password"];
    $pwdRepeat = $_POST["passwordrpt"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputSignup($name, $email, $pwd, $pwdRepeat) !== false){
        header("location: ../singup.php?error=emptyinput");
        exit();
    }

    if (invalidUsername($name) !== false){
        header("location: ../singup.php?error=invalidusername");
        exit();
    }

    if (invalidEmail($email) !== false){
        header("location: ../singup.php?error=invalidemail");
        exit();
    }

    if (pwdMatch($pwd, $pwdRepeat) !== false){
        header("location: ../singup.php?error=passwordsnotmatching");
        exit();
    }

    if (usernameExists($conn, $name, $email) !== false){
        header("location: ../singup.php?error=usernameexists");
        exit();
    }

    createUser($conn, $name, $email, $pwd);

}
else{
    header("location: ../singup.php");
    exit();
}