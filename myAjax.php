<?php
if(isset($_POST, $_POST['functionname'], $_POST['arguments'])) {
    switch($_POST['functionname']) {
        case 'gameOver' :
            gameOver($_POST['arguments'][0]);
            break;
        default:
            echo "Unknown method!";
            break;
    }
}
else {
    echo "No score posted!";
}

function gameOver($highScore){
    session_start();
    require_once 'Includes/dbh.inc.php';
    $user = $_SESSION['userid'];


    $sql2 = "SELECT userHighScore FROM users WHERE userId = $user;";

    $result = mysqli_query($conn, $sql2);


    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
             $currentScore = $row["userHighScore"];
        }
    }


    if($currentScore < $highScore){
        require_once 'Includes/dbh.inc.php';
        $sql = "UPDATE users SET userHighScore = $highScore WHERE userId = $user;";

        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ./play.php?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "s", $highScore);
        mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);
        mysqli_close($conn);

        header("Refresh:0");
        exit();
    }
    else{
        header("Refresh:0");
        exit();
    }
}

