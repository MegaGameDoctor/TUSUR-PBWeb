<?php
include "../connect.php";

$stmt = $db->prepare("SELECT COUNT(*) FROM app_canvas_state");
$stmt->execute() or die("Не удалось обработать запрос");
$result = $stmt->get_result();

if($top = mysqli_fetch_array($result)) {
$x = sqrt($top['COUNT(*)']);
$y = $x;
} else {
die("Внутренняя ошибка");
}

$gd = imagecreatetruecolor($x, $y);

$stmt = $db->prepare("SELECT * FROM app_canvas_state");
$stmt->execute() or die("Не удалось обработать запрос");
$result = $stmt->get_result();

while ($top = mysqli_fetch_array($result)) {
if($top['color'] == -16777216) {
$color = imagecolorallocate($gd, 0, 0, 0);
} else if($top['color'] == -12566464) {
$color = imagecolorallocate($gd, 64, 64, 64);
} else if($top['color'] == -8355712) {
$color = imagecolorallocate($gd, 128, 128, 128);
} else if($top['color'] == -1) {
$color = imagecolorallocate($gd, 255, 255, 255);
} else if($top['color'] == -65536) {
$color = imagecolorallocate($gd, 255, 0, 0);
} else if($top['color'] == -32768) {
$color = imagecolorallocate($gd, 255, 128, 0);
} else if($top['color'] == -256) {
$color = imagecolorallocate($gd, 255, 255, 0);
} else if($top['color'] == -7617718) {
$color = imagecolorallocate($gd, 139, 195, 74);
} else if($top['color'] == -14390489) {
$color = imagecolorallocate($gd, 36, 107, 39);
} else if($top['color'] == -16711681) {
$color = imagecolorallocate($gd, 0, 255, 255);
} else if($top['color'] == -16760577) {
$color = imagecolorallocate($gd, 0, 64, 255);
} else if($top['color'] == -8388353) {
$color = imagecolorallocate($gd, 128, 0, 255);
} else if($top['color'] == -4194049) {
$color = imagecolorallocate($gd, 192, 0, 255);
} else if($top['color'] == -153674) {
$color = imagecolorallocate($gd, 253, 167, 182);
}

imagesetpixel($gd, $top['x'], $top['y'], $color);
}

$size = 500;
if(isset($_GET['size'])) {
$size = $_GET['size'];
}
header('Content-Type: image/png');
$destination = imagecreatetruecolor($size, $size);
imagecopyresampled($destination, $gd, 0, 0, 0, 0, $size, $size, $x, $y);
imagepng($destination);

?>