<?php
include "../connect.php";
if(!isset($_GET['player']) || !isset($_GET['hashedPassword']) || !isset($_GET['color']) || !isset($_GET['x']) || !isset($_GET['y'])) {
    die("no data");
}
$player = $_GET['player'];
$hashedPassword = $_GET['hashedPassword'];
$color = $_GET['color'];
$x = $_GET['x'];
$y = $_GET['y'];

$stmt = $db->prepare("SELECT * FROM app_canvas_state WHERE x = ? AND y = ?");
$stmt->bind_param("ii", $x, $y);
$stmt->execute() or die("Не удалось обработать запрос");
$result = $stmt->get_result();

if($oldPixelData = mysqli_fetch_array($result)) {
if($oldPixelData['color'] == $color) {
    echo "SAME_PIXEL";
} else {
$stmt = $db->prepare("SELECT * FROM app_players WHERE player = ? AND password = ?");
$stmt->bind_param("ss", $player, $hashedPassword);
$stmt->execute() or die("Не удалось обработать запрос");
$result = $stmt->get_result();

if($top = mysqli_fetch_array($result)) {
    $now = floor(microtime(true) * 1000);
    if($top['nextPixel'] > $now) {
        echo "DELAY:" . (($top['nextPixel'] - $now) / 1000);
    } else if (colorToName($color) == "NONE") {
        echo "NO_COLOR";
    } else {
        $stmt = $db->prepare("INSERT INTO core_requests (`action`, `data`, `status`) VALUES ('paintPixel', ?, 'WAITING')");
        $data = $player . "@!@" . $hashedPassword . "@!@" . $x . "@!@" . $y . "@!@" . $color;
        $stmt->bind_param("s", $data);
        
        $stmt->execute() or die("Не удалось обработать запрос");
        echo "SUCCESS";
    }
} else {
    echo "NO_PLAYER";
}
}
} else {
    echo "INCORRECT_COORDS";
}
?>