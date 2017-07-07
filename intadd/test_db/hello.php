<?php header("Content-Type: text/html; charset=UTF-8");
?>
<section id ='class' class='class-box'>
				<div class="container" style="margin-top :5%; margin-bottom:7%">
					      <header>
                                                                        <h2><strong>공지사항</strong></h2>
                                                                </header>
                                                </div>
					     <div class="track-info-content" style="width:1080px; margin-left:auto; margin-right:auto; height:auto">

                                        <table class="ex1">
                                        <thead>
                                        <tr>
                                                <th scope="col">IDX</th>
                                                <th scope="col">수업명</th>
						<th scope="col">제목</th>
                                                <th scope="col">교수님 </th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <?php
                                        $stuname = $_SESSION['stunum'];
					$stmt2=$dbh->prepare('select * from subject_anounce_check where idx=:idx');

					$stmt2->bindParam(':idx',$_GET['idx']);
					$stmt2->execute();

					$stmt2->setAttribute(PDO::FETCH_ASSOC);
					if($row=$stmt2->fetch()){
						$stmt3=$dbh->prepare('select * from subject_anounce where class_name=:class_name');
						$stmt3->bindParam(':class_name',$row['class_name']);
						$stmt3->execute();
						$stmt3->setAttribute(PDO::FETCH_ASSOC);
						if($row2=$stmt3->fetch()){
						print $row2['title'];
						print $row2['pro_name'];
						print $row2['content'];
						print $row2['time'];
						}


					}	

					$read='O';
					$stmt4=$dbh->prepare('update subject_anounce_check set readcheck=:readcheck where idx=:idx and class_name= :class_name');
					$stmt4->bindParam(':idx',$_GET['idx']);
					$stmt4->bindParam(':class_name',$row['class_name']);
					$stmt4->bindParam(':readcheck',$read);
					$stmt->execute();
			

					?>
                                        </tbody>
                                        </table>
					</section>

<?php /*
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>

<?php
session_start();
include"./../../db/db_init.php";
$stuname = $_SESSION['stunum'];
print $stuname;
$stmt2=$dbh->prepare('select * from subject_anounce_check where userid=:userid');

$stmt2->bindParam(':userid',$stuname);
$stmt2->execute();

$stmt2->setAttribute(PDO::FETCH_ASSOC);
while($row=$stmt2->fetch()){
$stmt3=$dbh->prepare('select * from subject_anounce where class_name=:class_name');
$stmt3->bindParam(':class_name',$row['class_name']);
$stmt3->execute();
$stmt3->setAttribute(PDO::FETCH_ASSOC);
while($row2=$stmt3->fetch()){
echo " <tr>
	<td class='date2'>".$row2['idx']."</td>
	<td class='date2'>". $row2['title']."</td>
	<td class='date1'>".$row2['pro_name']."</td>
	<td cladd='date1'>".$row2['time'].",</td></tr>";

}


}

?>
</head>

<html>*/?>
