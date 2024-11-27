# TUSUR-PBWeb
## Описание
WEB часть проекта представляет собою небольшой сайт, на котором отображается актуальное состояние полотна, таблица лидеров с возможностью просмотреть индивидуальный профиль, а также ссылки на скачивание мобильного приложения. Для получения всех перечисленных значений сайт обращается к базе данных MySQL. Также сайт включает в себя маленькое WEB API, позволяющее получить актуальное изображение полотна (api/getCanvasImage.php). Бэкенд сайта написан на языке PHP.
## Размещение
Чтобы разместить и подключить сайт PBWeb - достаточно загрузить его в любую удобную дирректорию WEB сервера и указать данные для подключения к базе данных в файле config.php.
# API
Для обращения к api/getCanvasImage.php должен использоваться метод GET. Обязательных параметров нет, но в запрос может быть добавлен параметр size, если стандартное значения размера 500 на 500 не подходит.
