<?php

session_start();
include "./db_init.php";

$pro_name = $_POST['pro_name'];


$stmt2=$dbh->prepare('select * from subject_anounce_check where pro_name =:pro_name');
$pro_name="홍길동";
$stmt2->bindParam(':pro_name',$pro_name);
$stmt2->execute();

//$stmt2->setAttribute(PDO::FETCH_ASSOC);
$my_array = array ();
$abc =0;
while($row=$stmt2->fetch()){

  $array_1 = array(
    'idx' => $row['idx'],
    'class_name' => $row['class_name'],
    'userid' => $row['userid'],
    'readcheck' => $row['readcheck'],
  );



  $my_array[$abc] = $array_1;
  $abc = $abc + 1;
  //array_push($my_array[], $array_1);

}

$my_object = (object) $my_array;

// encode php array to json string
$my_array_json_string = json_encode($my_array);
$my_object_json_string = json_encode($my_object);

echo $my_array_json_string;





?>
