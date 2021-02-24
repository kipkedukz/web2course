<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
</head>
<body>
<?php
require_once 'connection.php'; // подключаем скрипт
 
if(isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['phone'])){
 
    // подключаемся к серверу
    $link = mysqli_connect($host, $user, $password, $database) 
        or die("Ошибка " . mysqli_error($link)); 
     
    // экранирования символов для mysql
    $name = htmlentities(mysqli_real_escape_string($link, $_POST['name']));
    $surname = htmlentities(mysqli_real_escape_string($link, $_POST['surname']));
    $phone = htmlentities(mysqli_real_escape_string($link, $_POST['phone']));
    // создание строки запроса
    $query ="INSERT INTO phone VALUES(NULL, '$name','$surname', '$phone')";
     
    // выполняем запрос
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
    if($result)
    {
        echo "<span style='color:blue;'>Данные добавлены</span>";
    }
    else echo "$result";
    // закрываем подключение
    mysqli_close($link);
}
?>
<h2>Добавить новую модель</h2>
<form method="POST">
<p>ИМЯ<br> 
<input type="text" name="name" /></p>
<p>ФАМИЛИЯ<br> 
<input type="text" name="surname" /></p>
<p>Телефон<br> 
<input type="number" name="phone" /></p>
<input type="submit" value="Добавить">
</form>
</body>
</html>