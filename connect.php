<?php
include "config.php";
$err = false;
$db = mysqli_connect($host, $dbuser, $dbpass, $dbname) or die("Не удаётся подключиться к базе");
?>