<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PixelBattle</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <nav class="top-menu">
        <ul>
            <li><font color="#ff9800">Главная</font></li>
            <li><a href="chat.php">Чат</a></li>
            <li><a href="paints.php">Закрашивания</a></li>
            <li><a href="download.php">Скачать</a></li>
        </ul>
    </nav>
    <h1>Полотно</h1>
    <img src="https://pbtusur.ru/PBP/api/getCanvasImage.php" draggable="false">
    <h1>Таблица лидеров</h1>
<?php
include "connect.php";
$stmt = $db->prepare("SELECT COUNT(*) FROM app_players");
$stmt->execute() or die("Не удалось обработать запрос");
$result = $stmt->get_result();
if ($top = mysqli_fetch_array($result)) {
echo <<<HTML
<h3>(Первые 10, Всего {$top['COUNT(*)']})</h3>
HTML;
}
?>
    <table>
        <thead>
            <tr>
                <th>Место</th>
                <th>Ник</th>
                <th>Закрашено</th>
            </tr>
        </thead>
        <tbody>
<?php
$stmt = $db->prepare("SELECT * FROM app_players ORDER BY painted DESC LIMIT 10");
$stmt->execute() or die("Не удалось обработать запрос");
$result = $stmt->get_result();
$pose = 1;
while ($top = mysqli_fetch_array($result)) {
echo <<<HTML
            <tr>
                <td>{$pose}</td>
                <td><a href="profile.php?player={$top['player']}">{$top['player']}</a></td>
                <td>{$top['painted']}</td>
            </tr>
HTML;
$pose++;
}
?>
        </tbody>
    </table>

    
</body>
</html>