<?php
header("Content-Type: text/html; charset=UTF-8");
include "../db/db_init.php";


?>
<section id ='class' class='class-box'>
				<div class="container" style="margin-top :5%; margin-bottom:7%">
                                        <?php
                                        $stmt2=$dbh->prepare('select * from subject_anounce_check where idx=:idx');

                                        $stmt2->bindParam(':idx',$_GET['no']);
                                        $stmt2->execute();
					
                                        $stmt2->setAttribute(PDO::FETCH_ASSOC);
                                        while($row=$stmt2->fetch()){
                                                $stmt3=$dbh->prepare('select * from subject_anounce where class_name=:class_name ');
                                                $stmt3->bindParam(':class_name',$row['class_name']);
						$class=$row['class_name'];
                                                $stmt3->execute();
                                                $stmt3->setAttribute(PDO::FETCH_ASSOC);
                                                while($row2=$stmt3->fetch()){
                                                $num=$row2['idx'];
						print "<font size ='10'>제목 : ".$row2['title']."</br>";
						print "내용 : ".$row2['content']."</br>";
						print "교수님 이름 : ".$row2['pro_name']."</br>";
						print "게시 날짜 : ".$row2['time']."</br></font>";
                                                }

                                        }
					$read='O';
					$stmt4=$dbh->prepare('update subject_anounce_check set readcheck =:readcheck where class_name=:class_name and userid=:userid');
					$stmt4->bindParam(':class_name',$class);
					$stmt4->bindParam(':readcheck',$read);
					$stmt4->bindParam(':userid',$_GET['user_id']);
					$stmt4->execute();
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
