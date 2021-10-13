<?php
    include_once 'header.php';

    if(!isset($_SESSION['username'])){
        header('location: ./login.php');
        exit();
    }
?>


<div class="tablica">
    <div id="user-label" class="badge">user</div>
    <div id="computer-label" class="badge">comp</div>
    <span id="user-score">0</span>:<span id="computer-score">0</span>
</div>

<div class="rezultat">
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

<p id="msg">Make your move</p>
<?php
if (isset($_GET["error"])) {
    if($_GET["error"] == "stmtfailed" ){
        echo "<p> Stmt failed!</p>";
    }
}
?>
<?php
include_once 'footer.php';
?>