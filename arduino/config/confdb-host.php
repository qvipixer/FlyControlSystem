<?php
header('Content-Type: text/html; charset= utf-8'); // Преводим кодировку страницы на UTF-8
$dbhost = "sql308.gegahost.net"; // переменная хоста БД
$dbuser = "gega_16844819"; // переменная имени пользователя БД
$dbpass = "Qq1w2e3"; // переменная Пароля пользователя БД
$dbname = "gega_16844819_ard"; // переменная базы данных
$dbtable = "web_monitor"; //переменная таблицвы в выбраной БД

$dbconnect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) // переменная функции подключения к БД
    or die ('Not connected:'.mysqli_connect_error()); // если нету подключениея к БД то отключаемся с ошибкой

$dbbaseselect = mysqli_select_db($dbconnect, $dbname) // Выбераем БД
    or die ('Can\'t use arduino:'.mysqli_connect_error()); // Если выбранная БД несуществует то отключаемся с ошибкой


if (!$dbconnect) // Проверяем подключение к БД
{
   echo("I could not connect to database \n"); // Нету подключения к БД
}
else
{
    echo("All is good we connected database $dbname \n</br>"); // Есть подключение к БД
}


mysqli_set_charset($dbconnect,"utf8"); // Преводим кодировку страницы на UTF-8

mysqli_query($dbconnect, 'SET names "utf8"'); // Преводим кодировку страницы на UTF-8
?>