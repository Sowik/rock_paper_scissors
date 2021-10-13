<?php
include_once 'header.php';

if(!isset($_SESSION['username'])){
    header('location: ./login.php');
    exit();
}
?>

    <table id="highScores">
        <tr>
            <th>Player</th>
            <th>Highest Score</th>

        </tr>

<?php
require_once 'Includes/dbh.inc.php';
$sql2 = "SELECT userName, userHighScore FROM users ORDER BY userHighScore DESC LIMIT 20;";
$result = mysqli_query($conn, $sql2);
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {?>
    <tr>
        <td><?php echo $row['userName'];?></td>
        <td><?php echo $row['userHighScore'];?></td>
    </tr>

<?php  } ?>
    </table>
<?php
include_once 'footer.php'
?>