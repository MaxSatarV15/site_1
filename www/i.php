<?php
//запросы
require_once 'setting.php';

// подключение
$connection = new mysqli($host, $user, $pass, $data);
if ($connection->connect_error) die('Error connection');

//запрос данных
$query = 'SELECT * FROM accs';
$result = $connection->query($query);
if (!$result) die('Error result');

// echo '<pre>';
// print_r($result);
// echo '</pre>';

// mysqli_result Object
// (
//     [current_field] => 0
//     [field_count] => 6
//     [lengths] => 
//     [num_rows] => 0
//     [type] => 0
// )

$rows = $result->num_rows;
for ($i = 0; $i < $rows; ++$i) {
	$result->data_seek($i);
	echo 'Name: ' . $result->ferch_assoc()['name'] . '<br>';
}

$result->close();
$connection->close();