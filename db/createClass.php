<?php
session_start();
include "./db_init.php";



$class_name = $_POST['class_name'];
$sub = $_POST['sub'];
$start_time = $_POST['start_time'];
$end_time = $_POST['end_time'];
$day = $_POST['day'];
$pro_name = $_SESSION['proname'];

$time = time();
$hash = hash('sha256', $time);


$stmt = $dbh->prepare('insert into class_subject (class_name, sub, pro_name, class_token) values (:class_name, :sub, :pro_name, :class_token)');
$stmt->bindParam(':class_name', $class_name);
$stmt->bindParam(':sub', $sub);
$stmt->bindParam(':pro_name', $pro_name);
$stmt->bindParam(':class_token', $hash);
$stmt->execute();


$stmt2 = $dbh->prepare('insert into class_subject_doing_time (class_token, start_time, end_time, day) values (:class_token, :start_time, :end_time, :day)');
$stmt2->bindParam(':class_token', $hash);
$stmt2->bindParam(':start_time', $start_time);
$stmt2->bindParam(':end_time', $end_time);
$stmt2->bindParam(':day', $day);
$stmt2->execute();


$arr = array ('status'=>'success');
echo json_encode($arr);






?>
