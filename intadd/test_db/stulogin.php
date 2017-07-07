<?php


$dbh = new PDO('mysql:host=localhost;dbname=reo_star;charset=utf8', 'root', 'reo_star123');



$stmt = $dbh->prepare("INSERT INTO class_subject (class_name,class_token,pro_name,sub) VALUES (:class_name,:calss_tokent,:pro_name,:sub)");
$stmt->bindParam(':class_name',$class);
$stmt->bindParam(':class_toeken',$toekn);
$stmt->bindParam(':pro_name',$pro);
$stmt_>bindParam(':sub',$sub);

// insert one row
$name = 'one';
$value = 1;
$stmt->execute();

// insert another row with different values
$name = 'two';
$value = 2;
$stmt->execute();
?>
