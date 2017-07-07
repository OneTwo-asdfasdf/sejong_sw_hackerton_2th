<?php


header("content-type:text/html; charset=utf-8");

session_start();
session_destroy();
$arr = array ('status'=>'success');
echo json_encode($arr);
?>
