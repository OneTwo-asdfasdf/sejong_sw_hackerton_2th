<?php
include "../db/db_init.php";
session_start();
$stunum = $_POST['stunum'];

//$stunum = $_SESSION['stunum'];
//$stunum = "14010969";
$v1 = 0;
$v2 = 0;
$v3 = 0;
$v4 = 0;
$v5 = 0;
$v6 = 0;
$v7 = 0;
$v8 = 0;
$v9 = 0;
$v10 = 0;
$type1 = "v1";
$type2 = "v2";
$type3 = "v3";
$type4 = "v4";
$type5 = "v5";
$type6 = "v6";
$type7 = "v7";
$type8 = "v8";
$type9 = "v9";
$type10 = "v10";
$v1_done = array();
$v2_done = array();
$v3_done = array();
$v4_done = array();
$v5_done = array();
$v6_done = array();
$v7_done = array();
$v8_done = array();
$v9_done = array();
$v10_done = array();
$v1_not_done = array();
$v2_not_done = array();
$v3_not_done = array();
$v4_not_done = array();
$v5_not_done = array();
$v6_not_done = array();
$v7_not_done = array();
$v8_not_done = array();
$v9_not_done = array();
$v10_not_done = array();
$stmt = $dbh->prepare('select * from subject_complete where userid=:stunum');
$stmt->bindParam(':stunum', $stunum);
$stmt->execute();

$rows = $stmt->fetchAll();

foreach ($rows as $row) {
    $content = $row['class_name'];
    $stmt_check = $dbh->prepare('select * from track_check where content=:content and type=:type');
    $stmt_check->bindParam(':content', $content);
    $stmt_check->bindParam(':type', $type1);
    $stmt_check->execute();
    $count = $stmt_check->rowCount();
    if ($count >0){
      $v1 = $v1+1;
      array_push($v1_done, $content);
    } else {
      array_push($v1_not_done, $content);
    }

}
foreach ($rows as $row) {
    $content = $row['class_name'];
    $stmt_check = $dbh->prepare('select * from track_check where content=:content and type=:type');
    $stmt_check->bindParam(':content', $content);
    $stmt_check->bindParam(':type', $type2);
    $stmt_check->execute();
    $count = $stmt_check->rowCount();
    if ($count >0){
      $v2 = $v2+1;
      array_push($v2_done, $content);
    } else {
      array_push($v2_not_done, $content);
    }
}
foreach ($rows as $row) {
    $content = $row['class_name'];
    $stmt_check = $dbh->prepare('select * from track_check where content=:content and type=:type');
    $stmt_check->bindParam(':content', $content);
    $stmt_check->bindParam(':type', $type3);
    $stmt_check->execute();
    $count = $stmt_check->rowCount();
    if ($count >0){
      $v3 = $v3+1;
      array_push($v3_done, $content);
    } else {
      array_push($v3_not_done, $content);
    }
}
foreach ($rows as $row) {
    $content = $row['class_name'];
    $stmt_check = $dbh->prepare('select * from track_check where content=:content and type=:type');
    $stmt_check->bindParam(':content', $content);
    $stmt_check->bindParam(':type', $type4);
    $stmt_check->execute();
    $count = $stmt_check->rowCount();
    if ($count >0){
      $v4 = $v4+1;
      array_push($v4_done, $content);
    } else {
      array_push($v4_not_done, $content);
    }
}
foreach ($rows as $row) {
    $content = $row['class_name'];
    $stmt_check = $dbh->prepare('select * from track_check where content=:content and type=:type');
    $stmt_check->bindParam(':content', $content);
    $stmt_check->bindParam(':type', $type5);
    $stmt_check->execute();
    $count = $stmt_check->rowCount();
    if ($count >0){
      $v5 = $v5+1;
      array_push($v5_done, $content);
    } else {
      array_push($v5_not_done, $content);
    }
}
foreach ($rows as $row) {
    $content = $row['class_name'];
    $stmt_check = $dbh->prepare('select * from track_check where content=:content and type=:type');
    $stmt_check->bindParam(':content', $content);
    $stmt_check->bindParam(':type', $type6);
    $stmt_check->execute();
    $count = $stmt_check->rowCount();
    if ($count >0){
      $v6 = $v6+1;
      array_push($v6_done, $content);
    } else {
      array_push($v6_not_done, $content);
    }
}
foreach ($rows as $row) {
    $content = $row['class_name'];
    $stmt_check = $dbh->prepare('select * from track_check where content=:content and type=:type');
    $stmt_check->bindParam(':content', $content);
    $stmt_check->bindParam(':type', $type7);
    $stmt_check->execute();
    $count = $stmt_check->rowCount();
    if ($count >0){
      $v7 = $v7+1;
      array_push($v7_done, $content);
    } else {
      array_push($v7_not_done, $content);
    }
}
foreach ($rows as $row) {
    $content = $row['class_name'];
    $stmt_check = $dbh->prepare('select * from track_check where content=:content and type=:type');
    $stmt_check->bindParam(':content', $content);
    $stmt_check->bindParam(':type', $type8);
    $stmt_check->execute();
    $count = $stmt_check->rowCount();
    if ($count >0){
      $v8 = $v8+1;
      array_push($v8_done, $content);
    } else {
      array_push($v8_not_done, $content);
    }
}

foreach ($rows as $row) {
    $content = $row['class_name'];
    $stmt_check = $dbh->prepare('select * from track_check where content=:content and type=:type');
    $stmt_check->bindParam(':content', $content);
    $stmt_check->bindParam(':type', $type9);
    $stmt_check->execute();
    $count = $stmt_check->rowCount();
    if ($count >0){
      $v9 = $v9+1;
      array_push($v9_done, $content);
    } else {
      array_push($v9_not_done, $content);
    }
}

foreach ($rows as $row) {
    $content = $row['class_name'];
    $stmt_check = $dbh->prepare('select * from track_check where content=:content and type=:type');
    $stmt_check->bindParam(':content', $content);
    $stmt_check->bindParam(':type', $type10);
    $stmt_check->execute();
    $count = $stmt_check->rowCount();
    if ($count >0){
      $v10 = $v10+1;
      array_push($v10_done, $content);
    } else {
      array_push($v10_not_done, $content);
    }
}



$arr = array ('v1'=>$v1,'v1_done'=>$v1_done,'v1_not_done'=>$v1_not_done,
              'v2'=>$v2,'v2_done'=>$v2_done,'v2_not_done'=>$v2_not_done,
              'v3'=>$v3,'v3_done'=>$v3_done,'v3_not_done'=>$v3_not_done,
              'v4'=>$v4,'v4_done'=>$v4_done,'v4_not_done'=>$v4_not_done,
              'v5'=>$v5,'v5_done'=>$v5_done,'v5_not_done'=>$v5_not_done,
              'v6'=>$v6,'v6_done'=>$v6_done,'v6_not_done'=>$v6_not_done,
              'v7'=>$v7,'v7_done'=>$v7_done,'v7_not_done'=>$v7_not_done,
              'v8'=>$v8,'v8_done'=>$v8_done,'v8_not_done'=>$v8_not_done,
              'v9'=>$v9,'v9_done'=>$v9_done,'v9_not_done'=>$v9_not_done,
              'v10'=>$v10,'v10_done'=>$v10_done,'v10_not_done'=>$v10_not_done
            );
echo json_encode($arr);






?>
