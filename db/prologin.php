<?php
session_start();
include "./db_init.php";
header("content-type:text/html; charset=utf-8");


$userid = $_POST['proid'];
$userpw = $_POST['propw'];



$stmt = $dbh->prepare('select * from member where userid=:userid and userpw=:userpw and status=0');
$stmt->bindParam(':userid', $userid);
$stmt->bindParam(':userpw', $userpw);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);



if(userid==null){
	$arr = array ('status'=>'fail','reason'=>'아이디 또는 비밀번호가 올바르지 않습니다.');
	echo json_encode($arr);
}else if(userpw==null){
	$arr = array ('status'=>'fail','reason'=>'아이디 또는 비밀번호가 올바르지 않습니다.');
	echo json_encode($arr);
} else{
	if($row > 0){


		$_SESSION['proid']=$row['userid'];
		$_SESSION['proname']=$row['username'];
		$arr = array ('status'=>'success');
		echo json_encode($arr);

	}else{
		$arr = array ('status'=>'fail','reason'=>'아이디 또는 비밀번호가 올바르지 않습니다.');
		echo json_encode($arr);
	}
}


?>
