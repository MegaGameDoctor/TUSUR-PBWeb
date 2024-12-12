<?php
include "../connect.php";

if(isset($_GET['player']) && isset($_GET['secret']) && $_GET['secret'] == "KFl9d3dKDK32L") {
$replaceColorWithString = isset($_GET['replaceColorWithString']);
$count = 10;

if(isset($_GET['count'])) {
$count = $_GET['count'];
}

$stmt = $db->prepare("SELECT * FROM app_pixel_logs WHERE player = ? ORDER BY time DESC LIMIT ?");
$stmt->bind_param("si", $_GET['player'], $count);
$stmt->execute() or die("Не удалось обработать запрос");
$result = $stmt->get_result();
$output = "";
$counter = 0;
while ($top = mysqli_fetch_array($result)) {
    $counter++;
    $newColor = $top['newColor'];
    $previousColor = $top['previousColor'];
    if($replaceColorWithString) {
        $newColor = colorToName($newColor);
        $previousColor = colorToName($previousColor);
    }
    
    $output = $output . $top['x'] . ";" . $top['y'] . ";" . $newColor . ";" . $previousColor . "@!@";
}
if($counter > 0) {
echo $output;
} else {
echo "EMPTY";
}
} else {
echo "no secret or data";
}
?>