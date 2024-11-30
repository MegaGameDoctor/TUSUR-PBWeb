<?php
include "../connect.php";
if(!isset($_GET['player']) || !isset($_GET['parameter'])) {
    die("no data");
}
$player = $_GET['player'];
$parameter = $_GET['parameter'];

if($parameter != "painted" && $parameter != "nextPixel") {
    die("Недопустимый параметр");
}

$stmt = $db->prepare("SELECT * FROM app_players WHERE player=?");
$stmt->bind_param("s", $player);
$stmt->execute() or die("Не удалось обработать запрос");
$result = $stmt->get_result();

if($top = mysqli_fetch_array($result)) {
    echo $top[$parameter];
} else {
    die("NO_DATA");
}

?>