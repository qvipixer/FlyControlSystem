<?php
include 'confdb.php'; //Подключили конфиги БД
//Начало приёма данных с платы
////Создали переменную ГЕТ принемаюмую с ARDUINO
if (isset($_GET['val'])){ // Если сушествует суперглобальный масив GET с поле val
    	$val = $_GET['val'];// Тогда присваеваем $val значение поля суперглоб масива GET['val']

    if ($val== ' '){// Если значение переменнуой пустая строка
    	unset($val);// Тогда удаляем переменную $val
    }
}
//Запрос к БД
$result = "INSERT INTO `arduino`.`web_monitor` (`id`, `val`) VALUES (NULL, '$val')";
// Выстрел в БД
if (isset($val)){ //Если переменная $val сушествует.
	$query = mysqli_query($dbconnect,$result); // Тогда выполняем запроск БД.
    if ($query == 'true'){ //Если запрос прошёл успешно.
	    echo "All is Good";
	}
    else{
	    echo "What is happening ???";
	}
}
    else{
	echo "No input DATA";
    }
?>