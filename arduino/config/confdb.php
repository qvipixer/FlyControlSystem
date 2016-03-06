<?php
header('Content-Type: text/html; charset= utf-8'); // Преводим кодировку страницы на UTF-8
$dbhost = "localhost"; // переменная хоста БД
$dbuser = "arduino"; // переменная имени пользователя БД
$dbpass = "arduino"; // переменная Пароля пользователя БД
$dbname = "arduino"; // переменная базы данных
$dbtable = "web_monitor"; //переменная таблицвы в выбраной БД

$dbconnect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) // переменная функции подключения к БД
    or die ('<br>Not connected:'.mysqli_connect_error()); // если нету подключениея к БД то отключаемся с ошибкой

$dbbaseselect = mysqli_select_db($dbconnect, $dbname) // Выбераем БД
    or die ('<br>Can\'t use arduino:'.mysqli_connect_error()); // Если выбранная БД несуществует то отключаемся с ошибкой


if (!$dbconnect) // Проверяем подключение к БД
{
   echo("<br>I could not connect to database \n<br>"); // Нету подключения к БД
}
else
{
    echo("<br>All is good we connected database $dbname \n<br>"); // Есть подключение к БД
}


mysqli_set_charset($dbconnect,"utf8"); // Преводим кодировку страницы на UTF-8

mysqli_query($dbconnect, 'SET names "utf8"'); // Преводим кодировку страницы на UTF-8
?>