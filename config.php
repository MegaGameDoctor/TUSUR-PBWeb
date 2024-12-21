<?php

# Подключение к базе данных
$host = "-";
$dbuser = "-";
$dbpass = "-";
$dbname = "-";

# Прочее
function colorToName($color) {
if($color == -16777216) {
return "<font color='black'>Чёрный</font>";
} else if($color == -12566464) {
return "<font color='gray'>Тёмно-серый</font>";
} else if($color == -8355712) {
return "<font color='silver'>Серый</font>";
} else if($color == -1) {
return "<font color='white'>Белый</font>";
} else if($color == -65536) {
return "<font color='red'>Красный</font>";
} else if($color == -32768) {
return "<font color='orange'>Оранжевый</font>";
} else if($color == -256) {
return "<font color='yellow'>Жёлтый</font>";
} else if($color == -7617718) {
return "<font color='lime'>Лаймовый</font>";
} else if($color == -14390489) {
return "<font color='green'>Зелёный</font>";
} else if($color == -16711681) {
return "<font color='aqua'>Голубой</font>";
} else if($color == -16760577) {
return "<font color='blue'>Синий</font>";
} else if($color == -8388353) {
return "<font color='fuchsia'>Пурпурный</font>";
} else if($color == -4194049) {
return "<font color='purple'>Фиолетовый</font>";
} else if($color == -153674) {
return "<font color='pink'>Розовый</font>";
} else {
return "NONE";
}
}
?>