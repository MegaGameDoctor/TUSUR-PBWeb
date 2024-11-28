<?php
include "../connect.php";
if(!isset($_GET['player']) || !isset($_GET['parameter'])) {
    die("no data");
}
$player = $_GET['player'];
$parameter = $_GET['parameter'];

if($parameter != "painted") {
    die("Недопустимый параметр");
}

$playerData = mysqli_query($db, "SELECT * FROM app_players") or die("Не удалось получить данные об игроке");

if($top = mysqli_fetch_array($playerData)) {
    die($top[$parameter]);
}

?>