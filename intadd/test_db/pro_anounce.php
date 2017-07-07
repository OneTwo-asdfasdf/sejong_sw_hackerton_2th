<?php
session_start();
include"./../../db/db_init.php";
$pro_name = $_SESSION['proname'];

$class_name=$_POST['class_name'];
$title=$_POST['title'];
$content=$_POST['content'];
$time=date("Y-m-d H:i:s");
$pro_name=$pro_name;

$sub=$_POST['sub'];
$defualt='X';
$stmt= $dbh->prepare('insert into subject_anounce (class_name,title,content,time,pro_name,sub) values(:class_name, :title, :content, :time, :pro_name, :sub)');

$stmt->bindParam(':class_name',$class_name);
$stmt->bindParam(':title',$title);
$stmt->bindParam(':content',$content);
$stmt->bindParam(':time',$time);
$stmt->bindParam(':pro_name',$pro_name);
$stmt->bindParam(':sub',$sub);
$stmt->execute();

$stmt2=$dbh->prepare('select * from subject_complete where class_name =:class_name');

$stmt2->bindParam(':class_name',$class_name);
$stmt2->execute();
$stmt2->setAttribute(PDO::FETCH_ASSOC);
while($row=$stmt2->fetch()){
$stmt3=$dbh->prepare('insert into subject_anounce_check (class_name,pro_name,sub,time,userid,readcheck) values(:class_name, :pro_name, :sub, :time, :userid, :readcheck)');
$stmt3->bindParam(':class_name',$class_name);
$stmt3->bindParam(':pro_name',$pro_name);
$stmt3->bindParam(':sub',$sub);
$stmt3->bindParam(':time',$time);
$stmt3->bindParam(':userid',$row['userid']);
$stmt3->bindParam(':readcheck',$defualt);
$stmt3->execute();
}
header("location:./../../professor/promain.php");
exit(1);
?>
