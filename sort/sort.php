$array = array(1, 0, 6, 9, 4, 5, 2, 3, 8, 7); // исходный массив
 
// перебираем массив
for ($j = 0; $j < count($array) - 1; $j++){
    for ($i = 0; $i < count($array) - $j - 1; $i++){
        // если текущий элемент больше следующего
        if ($array[$i] > $array[$i + 1]){
            // меняем местами элементы
            $tmp_var = $array[$i + 1];
            $array[$i + 1] = $array[$i];
            $array[$i] = $tmp_var;
        }
    }
}
 
// вывод результата
var_dump($array);
