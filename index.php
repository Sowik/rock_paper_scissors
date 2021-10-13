<?php
include_once 'header.php'
?>


    <div class="rezultat">
        <br>
        <p>Login To Play</p>
        <br>
        <p>Rock beats Scissors. Paper beats Rock. Scissors beat Paper.</p>
    </div>

    <div class="choices">
        <div class="choice" id="rock">
            <img src="images/kamyk.png" alt="kamyk">
        </div>

        <div class="choice" id="paper">
            <img src="images/hartiq.png" alt="hartiq">
        </div>

        <div class="choice" id="nojica">
            <img src="images/nojica.png" alt="nojica">
        </div>
    </div>

<?php
if (isset($_GET["error"])) {
    if($_GET["error"] == "stmtfailed" ){
        echo "<p> Stmt failed!</p>";
    }
}
?>
<?php
include_once 'footer.php'
?>