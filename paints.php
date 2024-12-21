<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PixelBattle - Закрашивания</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <nav class="top-menu">
        <ul>
            <li><a href="index.php">Главная</a></li>
            <li><a href="chat.php">Чат</a></li>
            <li><font color="#ff9800">Закрашивания</font></li>
            <li><a href="download.php">Скачать</a></li>
        </ul>
    </nav>
<h2>История закрашиваний</h2>
<?php
include "connect.php";
$stmt = $db->prepare("SELECT COUNT(*) FROM app_pixel_logs");
$stmt->execute() or die("Не удалось обработать запрос");
$result = $stmt->get_result();

if ($top = mysqli_fetch_array($result)) {
echo <<<HTML
<h3>(Последние 100, Всего: {$top['COUNT(*)']})</h3>
HTML;
}
?>
    <table>
        <thead>
            <tr>
                <th>Координаты</th>
                <th>Прошлый Цвет</th>
                <th>Новый Цвет</th>
                <th>Игрок</th>
                <th>Дата</th>
            </tr>
        </thead>
        <tbody>
<?php
$stmt = $db->prepare("SELECT * FROM app_pixel_logs ORDER BY time DESC LIMIT 100");
$stmt->execute() or die("Не удалось обработать запрос");
$result = $stmt->get_result();

while ($top = mysqli_fetch_array($result)) {
$lastColorStr = colorToName($top['previousColor']);
$newColorStr = colorToName($top['newColor']);
$date = date('d-m-Y (H:i:s)', $top['time'] / 1000);
echo <<<HTML
            <tr>
                <td>({$top['x']};{$top['y']})</td>
                <td>{$lastColorStr}</td>
                <td>{$newColorStr}</td>
                <td>{$top['player']}</td>
                <td>{$date}</td>
            </tr>
HTML;
}
?>
        </tbody>
    </table>

    
</body>
</html>