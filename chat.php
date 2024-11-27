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
        </ul>
    </nav>
<h3>Сообщения чата (Последние 100)</h3>
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
include "connect.php";
$topData = mysqli_query($db, "SELECT * FROM app_chat_logs ORDER BY id DESC LIMIT 100") or die("Не удалось обработать запрос");

while ($top = mysqli_fetch_array($topData)) {
$date = date('d-m-Y (H:i:s)', $top['date'] / 1000);
echo <<<HTML
            <tr>
                <td>{$top['player']}</td>
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