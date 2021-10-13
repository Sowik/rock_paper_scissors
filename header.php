<?php
session_start();
?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Rock Paper Scissors Game</title>
</head>

<header>

    <!---<h1>Rock Paper Scissors</h1>--->
    <link rel="stylesheet" href="css/styles.css">

    <nav>
        <h1>Rock Paper Scissors</h1>
        <?php
        if(isset($_SESSION['username'])){
            echo '<li><a href="play.php">Home</a></li>';
        }
        else{
            echo '<li><a href="index.php">Home</a></li>';
        }
        ?>
        <li><a href="leaderboard.php">Leaderboard</a></li>
        <?php
            if(isset($_SESSION['username'])){
                echo '<li><a href="profile.php">Profile</a></li>';
                echo '<li><a href="Includes/logout.inc.php">Logout</a></li>';
            }
            else{
                echo '<li><a href="singup.php">Sign Up</a></li>';
                echo '<li><a href="login.php">Login</a></li>';
            }
        ?>
    </nav>
</header>
<body>
