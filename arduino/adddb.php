<?php
require_once'config/cfg.php'; //Подключили конфиги БД
//Начало приёма данных с платы
////Создали переменную ГЕТ принемаюмую с ARDUINO





/*

$temp = new SendMethod(); // создали обькт класса SendMethod
	$temp->get(qwer);

//Запрос к БД
$result = "INSERT INTO `arduino`.`web_monitor` (`id`, `val`) VALUES (NULL, '$temp->val')";
// Выстрел в БД
if (isset($temp->val))
{
	$query = mysqli_query($dbconnect,$result);
	if ($query == 'true'){
		echo "<br>All is Good<br>";
 }
	    else{
		echo "<br>What is happening ???<br>";
 }

}
else{
	echo "<br>No input DATA<br>";
}

echo $temp->val;
*/
$temps = getvars(temp);

echo $temps;
?>