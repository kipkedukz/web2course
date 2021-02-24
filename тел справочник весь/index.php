<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
</head>
<body>
<?php
require_once 'connection.php'; // подключаем скрипт

$link = mysqli_connect($host, $user, $password, $database) 
	or die("Ошибка " . mysqli_error($link)); 
	
$query ="SELECT * FROM phone";

$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
if($result)
{
	$rows = mysqli_num_rows($result); // количество полученных строк
	
	echo "<table><tr><th>Id</th><th>фамилия</th><th>имя</th><th>телефон</th><th></th><th></th></tr>";
	for ($i = 0 ; $i < $rows ; ++$i)
	{
		$row = mysqli_fetch_row($result);
		echo "<tr>";
			for ($j = 0 ; $j < 4 ; ++$j) echo "<td>$row[$j]</td>";
			echo "<td><a href = 'edit.php?id=$row[0]'>edit.php/$row[0]</td><td><a href = 'delete.php?id=$row[0]'>delete.php?id=$row[0]</td>";
		echo "</tr>";
	}
	echo "</table>";
	
	// очищаем результат
	mysqli_free_result($result);
}

mysqli_close($link);
?>

<a href="add.php">Add</a>
</body>
</html>