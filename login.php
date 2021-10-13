<?php
include_once 'header.php'
?>

<section class="signup-from">
    <h2>Login</h2>
    <div class="signup-form-div">
        <form action="Includes/login.inc.php" method="post">
            <input type="text" name="username" placeholder="Username or Email">
            <input type="password" name="password" placeholder="Password">
            <button type="submit" name="submit">Login</button>
        </form>
    </div>
    <?php
    if (isset($_GET["error"])) {
        if($_GET["error"] == "emptyinput" ){
            echo "<p> Fill in all fields!</p>";
        }
        elseif ($_GET["error"] == "wronglogin") {
            echo "<p> Incorrect login information!</p>";
        }
    }
    ?>
</section>
<?php
include_once 'footer.php'
?>
