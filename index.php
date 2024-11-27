<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PixelBattle</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>Полотно</h1>
    <img src="https://pbtusur.ru/PBP/api/getCanvasImage.php" draggable="false">
    <h1>Таблица лидеров</h1>
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
include "connect.php";
$topData = mysqli_query($db, "SELECT * FROM app_players ORDER BY painted DESC LIMIT 3") or die("Не удалось загрузить данные о игроках");
$pose = 1;
while ($top = mysqli_fetch_array($topData)) {
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