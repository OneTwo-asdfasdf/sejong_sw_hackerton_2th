<?php


//데이터베이스 로그인 또는 기타 정보들

//db설정
$dbServer = '127.0.0.1';
$dbUser = 'root';
$dbPass = 'reo_star123';
$dbName = 'reo_star';

//Mysql DSN 문자열
$dsn = "mysql:host={$dbServer};dbname={$dbName};charset=utf8";
try {
	//MYSQL db 접속
	$dbh = new PDO($dsn, $dbUser, $dbPass);
	//준비된 명령문의 에뮬레이션 비활성화
	$dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	//ERROR 발생시 예외 발생
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
	echo 'ERROR : ' . h($e->getMessage());
}

?>
