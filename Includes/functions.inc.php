<?php

function emptyInputSignup($name, $email, $pwd, $pwdRepeat){
    $result = false;

    if (empty($name) || empty($email) || empty($pwd) || empty($pwdRepeat)) {
        $result = true;
    }

    return $result;

}

function invalidUsername($name){
    $result = false;

    if (!preg_match("/^[a-zA-Z0-9]*$/",$name)) {
        $result = true;
    }

    return $result;

}

function invalidEmail($email){
    $result = false;

    if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
        $result = true;
    }

    return $result;

}

function pwdMatch($pwd, $pwdRepeat){
    $result = false;

    if ($pwd !== $pwdRepeat) {
        $result = true;
    }

    return $result;

}

function usernameExists($conn, $name, $email){
    $sql = "SELECT * FROM users WHERE userName = ? OR userEmail = ?;";

    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../singup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $name, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else{
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function createUser($conn, $name, $email, $pwd){
    $sql = "INSERT INTO users (userName, userEmail, userPwd) VALUES (?, ? ,?);";

    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../singup.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sss", $name, $email, $hashedPwd);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);

    header("location: ../singup.php?error=none");
    exit();

}

function emptyInputLogin($name, $pwd){
    $result = false;

    if (empty($name)|| empty($pwd)) {
        $result = true;
    }

    return $result;

}

function loginUser($conn,$username, $pwd) {
    $usernameExists = usernameExists($conn, $username, $username); //checks for username or email, zatova i na dvete mesta sym slojil username

    if($usernameExists === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $usernameExists["userPwd"];
    $checkPwd = password_verify($pwd,$pwdHashed);

    if ($checkPwd === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    }
    elseif ($checkPwd === true){
        session_start();
        $_SESSION['userid'] = $usernameExists["userId"];
        $_SESSION['username'] = $usernameExists["userName"];
        header("location: ../play.php");
        exit();
    }
}
