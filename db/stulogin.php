<?php
session_start();
include "./db_init.php";
header("content-type:text/html; charset=utf-8");


$stunum = $_POST['stunum'];
$stupw = $_POST['stupw'];



$stmt = $dbh->prepare('select * from member where userid=:stunum and userpw=:stupw and status = 1 or status = 2');
$stmt->bindParam(':stunum', $stunum);
$stmt->bindParam(':stupw', $stupw);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);



if($stunum==null){
	$arr = array ('status'=>'fail','reason'=>'아이디 또는 비밀번호가 올바르지 않습니다.');
	echo json_encode($arr);
}else if($stupw==null){
	$arr = array ('status'=>'fail','reason'=>'아이디 또는 비밀번호가 올바르지 않습니다.');
	echo json_encode($arr);
} else{
	if($row > 0){


		$_SESSION['stunum']=$row['userid'];
		$_SESSION['username']=$row['username'];
		$arr = array ('status'=>'success');
		echo json_encode($arr);

	}else{
		$arr = array ('status'=>'fail','reason'=>'아이디 또는 비밀번호가 올바르지 않습니다.');
		echo json_encode($arr);
	}
}


?>
