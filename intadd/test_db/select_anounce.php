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
						$num=$row['idx'];
						echo " <tr>
                                                      <td class='date2'><a target='_blank' href='./hello.php?no=$num&user_id=$stuname'>".$row2['idx']."</a></td>
                                                        <td class='date1'>".$row2['class_name']."</td>
                                                        <td class='date1'>".$row2['title']."</td>
                                                        <td class='date1'>".$row2['pro_name']."</td></tr>";

						}


					}				

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
