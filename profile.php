<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PixelBattle - Профиль</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <nav class="top-menu">
        <ul>
            <li><a href="index.php">Главная</a></li>
            <li><a href="chat.php">Чат</a></li>
        </ul>
    </nav>
<?php
include "connect.php";
if(isset($_GET['player'])) $player = $_GET['player'];
$stmt = $db->prepare("SELECT * FROM app_players WHERE player = ?");
$stmt->bind_param("s", $player);
$stmt->execute() or die("Не удалось обработать запрос");
$result = $stmt->get_result();

if($top = mysqli_fetch_array($result)) {
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
$stmt = $db->prepare("SELECT * FROM app_pixel_logs WHERE player = ? ORDER BY time DESC LIMIT 100");
$stmt->bind_param("s", $player);
$stmt->execute() or die("Не удалось обработать запрос");
$result = $stmt->get_result();

while ($top = mysqli_fetch_array($result)) {
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