<?php
session_start();
include "./db_init.php";




//
//
// $result1 = system('python ./check.py', $result);
//
//
//
//
// $result2 = (string)$result1;
//
// $result = str_replace("'", "", $result2);
// $result = str_replace("]", "", $result2);
// $result = str_replace("[", "", $result2);
//
// $result = preg_replace("/#\&\+\-%@=\/\\\:;\.'\"\^`~\_|\!\?\*$#<>()\[\]\{\}\[/i", "", $result2);
//
// echo $result;
// $test = explode(']', $result);
//
// echo $test[0];




$my_array = array (
    array (
    'ver' => '0',
    'sub' => '001',
    'day' => '화',
    'start_time' => '10:30',
    'end_time' => '12:00',
    'name' => '소프트웨어코딩기초',
    'assi1' => '16011115',
    'assi2' => '14010969',
    ),
    array (
    'ver' => '1',
    'sub' => '002',
    'day' => '화',
    'start_time' => '16:30',
    'end_time' => '18:00',
    'name' => '소프트웨어코딩기초',
    'assi1' => '14010969',
    'assi2' => '15011098',
    ),
    array (
    'ver' => '2',
    'sub' => '003',
    'day' => '수',
    'start_time' => '09:00',
    'end_time' => '10:30',
    'name' => '소프트웨어코딩기초',
    'assi1' => '16011115',
    'assi2' => 'no',
    ),
    array (
    'ver' => '3',
    'sub' => '004',
    'day' => '목',
    'start_time' => '10:30',
    'end_time' => '12:00',
    'name' => '소프트웨어코딩기초',
    'assi1' => '15011098',
    'assi2' => 'no',
    ),
    array (
    'ver' => '4',
    'sub' => '005',
    'day' => '목',
    'start_time' => '16:30',
    'end_time' => '18:00',
    'name' => '소프트웨어코딩기초',
    'assi1' => 'no',
    'assi2' => 'no',
    ),
);


$my_object = (object) $my_array;

// encode php array to json string
$my_array_json_string = json_encode($my_array);
$my_object_json_string = json_encode($my_object);

echo $my_array_json_string;

?>
