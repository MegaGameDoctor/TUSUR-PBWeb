<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PixelBattle - Чат</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <nav class="top-menu">
        <ul>
            <li><a href="index.php">Главная</a></li>
            <li><font color="#ff9800">Чат</font></li>
            <li><a href="paints.php">Закрашивания</a></li>
        </ul>
    </nav>
<h2>Сообщения чата</h2>
<?php
include "connect.php";
$stmt = $db->prepare("SELECT COUNT(*) FROM app_chat_logs");
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
                <th>Игрок</th>
                <th>Сообщение</th>
                <th>Дата</th>
            </tr>
        </thead>
        <tbody>
<?php
$stmt = $db->prepare("SELECT * FROM app_chat_logs ORDER BY id DESC LIMIT 100");
$stmt->execute() or die("Не удалось обработать запрос");
$result = $stmt->get_result();

while ($top = mysqli_fetch_array($result)) {
$date = date('d-m-Y (H:i:s)', $top['date'] / 1000);
echo <<<HTML
            <tr>
                <td><a href="profile.php?player={$top['player']}">{$top['player']}</a></td>
                <td>{$top['message']}</td>
                <td>{$date}</td>
            </tr>
HTML;
}
?>
        </tbody>
    </table>

    
</body>
</html>