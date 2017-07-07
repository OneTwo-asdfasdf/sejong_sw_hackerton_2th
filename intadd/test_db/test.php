<?php
$servername = "localhost";
$username = "root";
$password = "reo_star123";

//Creating connection for mysql
$conn = new PDO("mysql:host=$servername;dbname=reo_star", $username, $password);
$conn2=new PDO("mysql:host=$servername;dbname=reo_star", $username, $password);



// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


if(!$_POST['name'] || !$_POST['pro'] || !$_POST['sub'] || !$_POST['stime'] || !$_POST['etime'] || !$_POST['day']){

exit('no data');
}


$d=date("Y-m-d H:i:s");

$token=md5($_POST["name"].$d);


$sql = "INSERT INTO class_subject (class_name, class_token, pro_name,sub)
VALUES ('".$_POST["name"]."','".$token."','".$_POST["pro"]."','".$_POST['sub']."')";


if ($conn->query($sql)) {
echo "<script type= 'text/javascript'>alert('New Record Inserted Successfully');</script>";
}
else{
echo "<script type= 'text/javascript'>alert('Data not successfully Inserted.');</script>";
}

print "A";

$sql2 = "INSERT INTO class_subject_doing_time (class_token, start_time,end_time,day)
VALUES ('".$token."','".$_POST["stime"]."','".$_POST["etime"]."','".$_POST['day']."')";


if ($conn2->query($sql2)) {
#success
}
else{
	print "C";
}

echo $e->getMessage();



?>
