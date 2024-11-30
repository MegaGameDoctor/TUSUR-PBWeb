# TUSUR-PBWeb
## Описание
WEB часть проекта представляет собою небольшой сайт, на котором отображается актуальное состояние полотна, таблица лидеров с возможностью просмотреть индивидуальный профиль, а также ссылки на скачивание мобильного приложения. Для получения всех перечисленных значений сайт обращается к базе данных MySQL. Также сайт включает в себя маленькое WEB API, позволяющее получить актуальное изображение полотна (api/getCanvasImage.php). Бэкенд сайта написан на языке PHP.
## API
Для обращения к API используется метод GET. Начальная ссылка: https://pbtusur.ru/PBP/api/<МЕТОД>
1) getCanvasImage.php - Возвращает изображение полотна. Обязательных параметров нет, но в запрос может быть добавлен параметр size, если стандартное значения размера 500 на 500 не подходит.
2) getPlayerData.php - Возвращает указанный параметр игрока. Обязательные параметры - player и parameter. player - ник игрока, а parameter - название получаемого параметра (player STR, painted INT, nextPixel LONG(BIGINT))
3) paintPixel.php - Позволяет закрасить пиксель на полотне и оповестить все активные устройства. Обязательные параметры - player, x, y и color. player - ник игрока, x и y - координаты на полотне, color - цвет
## Размещение
Чтобы разместить и подключить сайт PBWeb - достаточно загрузить его в любую удобную дирректорию WEB сервера и указать данные для подключения к базе данных в файле config.php.
