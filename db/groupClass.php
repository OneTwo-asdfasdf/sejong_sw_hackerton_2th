<?php
session_start();
include "./db_init.php";



$group_choose = $_POST['group_choose'];
$chk_info = $_POST['checkArray'];
$chk_info_count = $chk_info;


foreach ($chk_info as $row) {

  $stmt = $dbh->prepare('UPDATE class_subject set group_choose = :group_choose where idx=:idx');
  $stmt->bindParam(':group_choose', $group_choose);
  $stmt->bindParam(':idx', $row);
  $stmt->execute();


}





$arr = array ('status'=>'success');
echo json_encode($arr);

?>
