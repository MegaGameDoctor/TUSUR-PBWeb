<?php
include "../connect.php";
if(!isset($_GET['player']) || !isset($_GET['hashedPassword'])) {
    die("no data");
}
$player = $_GET['player'];
$hashedPassword = $_GET['hashedPassword'];

$stmt = $db->prepare("SELECT * FROM app_players WHERE player = ?");
$stmt->bind_param("s", $player);
$stmt->execute() or die("Не удалось обработать запрос");
$result = $stmt->get_result();

if($top = mysqli_fetch_array($result)) {
    if($top['password'] == $hashedPassword) {
        echo "YES";
    } else {
        echo "INCORRECT_PASSWORD";
    }
} else {
    echo "NO_PLAYER";
}

?>