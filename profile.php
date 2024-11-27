<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PixelBattle - Профиль</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
include "connect.php";
if(isset($_GET['player'])) $player = $_GET['player'];
$userData = mysqli_query($db, "SELECT * FROM app_players WHERE player='" . $player . "'") or die("Не удалось обработать запрос");

if($top = mysqli_fetch_array($userData)) {
$player = $top['player'];
$painted = $top['painted'];
echo <<<HTML
<h1>Игрок '{$player}'</h1>
<h3>Все закрашивания ({$painted})</h3>
HTML;
} else {
echo <<<HTML
<h1>Такого игрока нет</h1>
HTML;
die();
}
?>
    <table>
        <thead>
            <tr>
                <th>Координаты</th>
                <th>Цвет</th>
                <th>Дата</th>
            </tr>
        </thead>
        <tbody>
<?php
$topData = mysqli_query($db, "SELECT * FROM app_pixel_logs WHERE player='" . $player . "' ORDER BY time DESC LIMIT 100") or die("Не удалось загрузить данные о закрашиваниях");

while ($top = mysqli_fetch_array($topData)) {
$colorStr = colorToName($top['newColor']);
$date = date('d-m-Y (H:i:s)', $top['time'] / 1000);
echo <<<HTML
            <tr>
                <td>({$top['x']};{$top['y']})</td>
                <td>{$colorStr}</td>
                <td>{$date}</td>
            </tr>
HTML;
}
?>
        </tbody>
    </table>

    
</body>
</html>