<?php
include_once 'header.php'
?>

    <section class="signup-from">
        <h2>Sign Up</h2>
        <div class="signup-form-div">
            <form action="Includes/singup.inc.php" method="post">
                <input type="text" name="username" placeholder="Username">
                <input type="text" name="email" placeholder="Email">
                <input type="password" name="password" placeholder="Password">
                <input type="password" name="passwordrpt" placeholder="Repeat Password">
                <button type="submit" name="submit">Sign Up</button>
            </form>
        </div>
        <?php
        if (isset($_GET["error"])) {
            if($_GET["error"] == "emptyinput" ){
                echo "<p> Fill in all fields!</p>";
            }
            elseif ($_GET["error"] == "invalidusername") {
                echo "<p> Choose a proper username!</p>";
            }
            elseif ($_GET["error"] == "invalidemail") {
                echo "<p> Invalid email!</p>";
            }
            elseif ($_GET["error"] == "passwordsnotmatching") {
                echo "<p> Passwords not matching!</p>";
            }
            elseif ($_GET["error"] == "usernameexists") {
                echo "<p> Username already taken!</p>";
            }
            elseif ($_GET["error"] == "stmtfailed") {
                echo "<p> Something went wrong, try again!</p>";
            }
            elseif ($_GET["error"] == "none") {
                echo "<p> You have signed up!</p>";
            }
        }
        ?>
    </section>
<?php
include_once 'footer.php'
?>
