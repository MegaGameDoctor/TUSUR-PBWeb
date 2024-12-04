<?php
include "../connect.php";

$stmt = $db->prepare("SELECT * FROM app_canvas_state");
$stmt->execute() or die("Не удалось обработать запрос");
$result = $stmt->get_result();
$output = "";
while ($top = mysqli_fetch_array($result)) {
    $output = $output . $top['x'] . ";" . $top['y'] . ";" . $top['color'] . "@!@";
}

echo $output;
?>