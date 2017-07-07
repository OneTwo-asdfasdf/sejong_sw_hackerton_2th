<!DOCTYPE HTML>
<?php
session_start();
if ($_SESSION['proname'] == null){
	echo "<script>location.href='../index.php';</script>";
    exit();
}
$proname = $_SESSION['proname'];
$pro_name = $_SESSION['proname'];
include "../db/db_init.php";
?>




<html>
	<head>
		<title>REO</title>
		<meta charset="utf-8" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="../static/assets/css/main.css" />
		<link rel="stylesheet" href="assets/css/main.css" />

		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<style type="text/css">
			table.ex1 {width:90%; margin:0 auto; text-align:right; border-collapse:collapse;}
			.ex1 th, .ex1 td {padding:5px 10px}
			.ex1 caption {font-weight:700; font-size:20px; padding:5px; color:#52C0FF;; text-align:left; margin-bottom:5px; margin-left: 10%;}
			.ex1 thead th {background:#52C0FF; color:#fff; text-align:center; border-right:1px solid #fff}
			.ex1 tbody th {text-align:left; width:12%}
			.ex1 tbody td.date1 {text-align:center; width:8%}
			.ex1 tbody td.date2 {text-align:center; width:0.5%}
			.ex1 tbody td.desc {text-align:left; width:35%}
			.ex1 tbody tr.odd {background:#f9f9f9}
			.ex1 tbody tr.odd th {background:#f2f2f2}
			.ex1 tbody tr:hover {background:#ADC2D5;}
			.ex1 tbody tr:hover th {background:#ADC2D5; color:#1BA6B2}
			.ex1 tfoot tr {border-top:6px solid #E9F7F6; color:#1BA6B2}
			.ex1 tfoot th {text-align:left; padding-left:10px}
			p.ex1 {font-weight:700; font-size:20px; padding:5px; color:#334151;; text-align:left; margin-bottom:5px; margin-left: 10%;}
			label, #toggle{display:none;}                                            /*체크박스 이름표와, 체크박스 숨김*/
			#header{display:none; z-index:999;}                                                      /*메뉴 숨김*/
			#toggle:checked + #header{display:block;}                          /*체크박스 선택되면 메뉴가 나타남*/
			label {display:block;background: url('/static/img/menu1.png'); width: 64px; height: 64px;background-repeat: no-repeat; float: left; background-size: 32px; margin: 15px;margin-top: 20px;margin-right: 0;}
			ul.track-drop {
				display: none;
			}
			li.track-choose:hover ul.track_drop{
				display: block;
			}
			ul.class-drop {
				display: none;
			}
			li.class-choose:hover ul.class-drop{
				display: block;
			}
			ul.assi-drop {
				display: none;
			}
			li.assi-choose:hover ul.assi-drop{
				display: block;
			}

		</style>
	</head>

	<body>






		<div id="partner-dialog">
			<div style="text-align: right;">
				<img id="partner-close-dialog1" src="/static/img/close_btn.png" width="32px;">
			</div>
			<div class="partner-intro">
				<table class="ex1" width="550" height="600">
				<thead>
        <tr align="center">
					<th scope="col">.</th>
					<th scope="col">월</th>
					<th scope="col">화</th>
					<th scope="col">수</th>
					<th scope="col">목</th>
					<th scope="col">금</th>
        </tr>
			</thead>

        <tr align="center">
            <td class='date2'>9:00</td>
            <td class='date2'></td>
            <td class='date2'></td>
            <td bgcolor="#52C0FF" class='date2'>16011115</td>
            <td class='date2'></td>
            <td class='date2'></td>
        </tr>

        <tr align="center">
					<td class='date2'>10:30</td>
					<td class='date2'></td>
					<td bgcolor="#52C0FF" class='date2'>16011115<br>14010969</td>
					<td class='date2'></td>
					<td bgcolor="#52C0FF" class='date2'>15011098</td>
					<td class='date2'></td>
        </tr>

        <tr align="center">
					<td class='date2'>12:00</td>
					<td class='date2'></td>
					<td class='date2'></td>
					<td class='date2'></td>
					<td class='date2'></td>
					<td class='date2'></td>
        </tr>

        <tr align="center">
					<td class='date2'>13:30</td>
					<td class='date2'></td>
					<td class='date2'></td>
					<td class='date2'></td>
					<td class='date2'></td>
					<td class='date2'></td>
        </tr>

        <tr align="center">
					<td class='date2'>15:00</td>
					<td class='date2'></td>
					<td class='date2'></td>
					<td class='date2'></td>
					<td class='date2'></td>
					<td class='date2'></td>
        </tr>

        <tr align="center">
					<td class='date2'>16:30</td>
					<td class='date2'></td>
					<td bgcolor="#52C0FF" class='date2'>14010969</br>15011098</td>
					<td class='date2'></td>
					<td class='date2'></td>
					<td bgcolor="#52C0FF" class='date2'>no</td>
        </tr>

        <tr align="center">
					<td bgcolor="#52C0FF" class='date2'>18:00</td>
					<td class='date2'></td>
					<td class='date2'></td>
					<td class='date2'></td>
					<td class='date2'></td>
					<td class='date2'></td>
        </tr>

        <tr align="center">
					<td bgcolor="#52C0FF" class='date2'>19:30</td>
					<td class='date2'></td>
					<td class='date2'></td>
					<td class='date2'></td>
					<td class='date2'></td>
					<td class='date2'></td>
        </tr>
    </table>


			</div>


		</div>

		<div id="dialog-background"></div>












	<article style="position: fixed; z-index: 1001; width: 100%; height: 50px; line-height: 50px;">
		<header style="width:100%; height:64px; /*background:rgba(0,181,173,0.8);*/ background:#52C0FF; ">
			<label id="toggle1"></label>
			<input type="checkbox" id ="toggle"/>
			<p style="font-size:20px; font-weight:600; margin:0 0 0 100px; float:left; color:#fff; line-height:64px;"/><span style="color:#A31432; color:#fff; font-size:30px">REO_</span><span style="color:#fff; font-size:20px">PROFESSOR</span></p>

		<p style="font-size:15px; font-weight:600; padding-right: 30px; margin:0 0 0 100px; float:right; color:#fff; line-height:70px;"><a style="color: #fff; href="#"><?php echo $proname; ?> 님 환영합니다.</a></p>
		</header>
	</article>



		<!-- Header -->
			<div style="padding-top: 50px; background:#fff;" status="0"  id="header">

				<div class="top">
					<!-- Logo -->
						<div id="logo">

							<h1 style="color:#7FB0CC; font-weight:800;"  id="title"><?php echo $proname; ?></h1>
							<p style="color:#7FB0CC;">PROFESSOR</p>

						</div>

					<!-- Nav -->
						<nav id="nav">

							<ul>
								<li height="70px;"><a href="#" id="class-choose" class="skel-layers-ignoreHref active"><span style="color:#7FB0CC; font-weight:600;" class="icon fa-caret-square-o-down">수업관리</span></a></li>
								<ul class="class-drop" id="class-drop" status="0">
									<li><a href="#" id="class-view" class="skel-layers-ignoreHref"><span style="color:#7FB0CC; font-weight:600;" class="icon fa-home">공지사항</span></a></li>
									<li><a href="#" id="class-create" class="skel-layers-ignoreHref"><span style="color:#7FB0CC; font-weight:600;" class="icon fa-home">수업생성</span></a></li>
								</ul>
								<li><a href="#" id="assi-choose" class="skel-layers-ignoreHref"><span style="color:#7FB0CC; font-weight:600;" class="icon fa-caret-square-o-down">조교관리</span></a></li>
								<ul class="assi-drop" id="assi-drop" status="0">
									<li><a href="#" id="assi-list" class="skel-layers-ignoreHref"><span style="color:#7FB0CC; font-weight:600;" class="icon fa-book">강의목록</span></a></li>
									<li><a href="#" id="assi-person-list" class="skel-layers-ignoreHref"><span style="color:#7FB0CC; font-weight:600;" class="icon fa-book">조교목록</span></a></li>
									<li><a href="#" id="assi-tweet" class="skel-layers-ignoreHref"><span style="color:#7FB0CC; font-weight:600;" class="icon fa-book">강의트윗</span></a></li>
								</ul>

							</ul>
						</nav>

				</div>

				<div  class="bottom">

					<!-- Social Icons -->
						<ul class="icons">
							<li><a href="#" id="logout-button"><span style="color: #7FB0CC;" class="label">Logout</span></a></li>

						</ul>

				</div>

			</div>

		<!-- Main -->
			<div style="margin:0; padding-top: 50px;" id="main" >

				<!-- class -->
	<section id="class" class="class-box">
 
   <div class="container" style="margin-top: 5%; margin-bottom: 7%;">
                                                        <header>
                                                                <h2><strong>공지사항 작성</strong></h2>
                                                        </header>
                                        </div>



                                                <form style="margin-left:20%; margin-right:20%;" method="post" action="./../intadd/test_db/pro_anounce.php">
                                                        <div class="row" style="text-align:center; float:none;">
                                                                <div class="6u$" style="margin:auto; float:none;"><input style="font-size: 15px;" type="text" name="class_name" id="sub" placeholder="과목명" /></div>
                                                                <div class="6u$" style="margin:auto; float:none;"><input style="font-size: 15px;" type="text" name="sub" id="start_time" placeholder="분반" /></div>
                                                                <div class="6u$" style="margin:auto; float:none;"><input style="font-size: 15px;" type="text" name="title" id="end_time" placeholder="제목" /></div>
                                                                <div class="6u$" style="margin:auto; float:none;"><input style="font-size: 15px;" type="text" name="content" id="day" placeholder="내용" /></div>


                                                                <div style="margin:10px auto 10px auto; float:none; width:262px; font-size:11px; color:rgba(81,98,111,1);  text-align:center;" id="create-result"></div>
                                                                <div class="col-md-12  text-center" style=" margin:auto; float:none;">
                                                                        <p><input type="submit" value="확인" ></p>
                                                                </div>

                                                        </div>
                                                </form>



</section>
 <section id="class" class="class-box">
                                                <div class="container" style="margin-top: 5%; margin-bottom: 7%;">
                                                                <header>
                                                                        <h2><strong>공지사항</strong></h2>
                                                                </header>
                                                </div>
                                                
                                        <div class="track-info-content" style="width:1080px; margin-left:auto; margin-right:auto; height:auto">

                                        <table class="ex1">
                                        <thead>
                                        <?php include("./../intadd/test_db/pro_anounce_check.php");?>
                                        </tbody>
                                        </table>

                                                </div>






                                        </section>
	
			<section id="class-create" class="class-create-box" style="display:none;">
						<div class="container" style="margin-top: 5%; margin-bottom: 7%;">
								<header>
									<h2><strong>수업목록</strong></h2>
								</header>
						</div>

						<div class="track-info-content" style="width:1080px; margin-left:auto; margin-right:auto; height:auto">

						<table class="ex1">
						<thead>
						<tr>
							<th scope="col">IDX</th>
							<th scope="col">수업명</th>
							<th scope="col">분반</th>
							<th scope="col">Professor</th>
						</tr>
						</thead>
						<tbody>

						<?php
							$stmt = $dbh->prepare('select * from class_subject where pro_name=:pro_name');
							$stmt->bindParam(":pro_name", $pro_name);
							$stmt->execute();
							$row = $stmt->fetchAll();

							foreach ($row as $row) {


							echo "
							<tr>
								<td class='date2'>".$row['idx']."</td>
								<td class='date1'>".$row['class_name']."</td>
								<td class='date1'>".$row['sub']."</td>
								<td class='date1'>".$row['pro_name']."</td></tr>";
							}
						?>
						</tbody>
						</table>

					</div>
					<div class="container" style="margin-top: 5%; margin-bottom: 7%;">
							<header>
								<h2><strong>수업생성</strong></h2>
							</header>
					</div>



						<form style="margin-left:20%; margin-right:20%;" method="post">
							<div class="row" style="text-align:center; float:none;">
								<div class="6u$" style="margin:auto; float:none;"><input style="font-size: 15px;" type="text" name="name" id="class_name" placeholder="수업 이름" /></div>
								<div class="6u$" style="margin:auto; float:none;"><input style="font-size: 15px;" type="text" name="name" id="sub" placeholder="분반 번호" /></div>
								<div class="6u$" style="margin:auto; float:none;"><input style="font-size: 15px;" type="text" name="name" id="start_time" placeholder="수업시작시간" /></div>
								<div class="6u$" style="margin:auto; float:none;"><input style="font-size: 15px;" type="text" name="name" id="end_time" placeholder="수업종료시간" /></div>
								<div class="6u$" style="margin:auto; float:none;"><input style="font-size: 15px;" type="text" name="name" id="day" placeholder="수업 요일" /></div>


								<div style="margin:10px auto 10px auto; float:none; width:262px; font-size:11px; color:rgba(81,98,111,1);  text-align:center;" id="create-result"></div>
								<div class="col-md-12  text-center" style=" margin:auto; float:none;">
									<p><a class="btn btn-primary" id="createBtn">확인</a></p>
								</div>

							</div>
						</form>





					</section>



				<!-- conainter -->


				<section id="assi-list" class="assi-list-box" style="display:none;" >
					<div class="container" style="margin-top: 5%; margin-bottom: 7%;">
							<header>
								<h2><strong>강의목록</strong></h2>
							</header>
					</div>

					<div class="track-info-content" style="width:1080px; margin-left:auto; margin-right:auto; height:auto">

					<table class="ex1">
					<thead>
					<tr>
						<th scope="col">수업명</th>
						<th scope="col">분반</th>
					</tr>
					</thead>
					<tbody>

					<?php
					$group_choose = "0";
						$stmt = $dbh->prepare('select * from class_subject where pro_name=:pro_name and group_choose=:group_choose');
						$stmt->bindParam(":pro_name", $pro_name);
						$stmt->bindParam(":group_choose", $group_choose);
						$stmt->execute();
						$row = $stmt->fetchAll();
						$stmt2 = $dbh->prepare('select * from class_subject where pro_name=:pro_name group by group_choose');
						$stmt2->bindParam(":pro_name", $pro_name);
						$stmt2->execute();
						$row2 = $stmt2->fetchAll();
						foreach ($row as $row) {

							if ($row['group_choose'] == "0"){
								$group = $row['class_name'];
								$sub = $row['sub'];
							} else {
								$group = $row['group_choose'];
								$sub = "group";
							}

						echo "
						<tr class='asdf' name='".$group."' sub='".$sub."'>
							<td class='date1'>".$group."</td>
							<td class='date1'>".$sub."</td></tr>";
						}
						foreach ($row2 as $row){
							if ($row['group_choose'] == "0"){
								continue;
							} else {
								$group = $row['group_choose'];
								$sub = "group";
							}
							echo "
							<tr class='asdf' name='".$group."' sub='".$sub."'>
								<td class='date1'>".$group."</td>
								<td class='date1'>".$sub."</td></tr>";
						}
					?>
					</tbody>
					</table>
				</div>



					<div class="container" style="margin-top: 5%; margin-bottom: 7%;">
							<header>
								<h2><strong>강의 그룹</strong></h2>
							</header>
					</div>
					<div class="track-info-content" style="width:1080px; margin-left:auto; margin-right:auto; height:auto">

					<table class="ex1">
					<thead>
					<tr>
						<th scope="col">IDX</th>
						<th scope="col">수업명</th>
						<th scope="col">분반</th>
						<th scope="col">그룹</th>
						<th scope="col">그룹선택</th>
					</tr>
					</thead>
					<tbody>

					<?php
						$stmt = $dbh->prepare('select * from class_subject where pro_name=:pro_name');
						$stmt->bindParam(":pro_name", $pro_name);
						$stmt->execute();
						$row = $stmt->fetchAll();
						$count_row = $stmt->rowCount();
						$count=0;
						foreach ($row as $row) {
							$count = $count+1;
							if ($row['group_choose'] == "0"){
								$group = "NO";
							} else {
								$group = $row['group_choose'];
							}

						echo "
						<tr>
							<td class='date2'>".$row['idx']."</td>
							<td class='date1'>".$row['class_name']."</td>
							<td class='date1'>".$row['sub']."</td>
							<td class='date1'>".$group."</td>
							<td class='date1'><input id='chk_box".$count."' type='checkbox' class='chk_info' name='chk_info' value=".$row['idx']."></td></tr>";
						}
					?>
					</tbody>
					</table>
					<form style="margin-left:20%; margin-right:20%; margin-top:30px; margin-bottom:30px;" method="post">
						<div class="row" style="text-align:center; float:none;">
							<div class="6u$" style="margin:auto; float:none;"><input style="font-size: 15px;" type="text" name="name" id="group_choose" placeholder="그룹명" /></div>
						</div>
					</form>
					<div id='count_row' value='<?php echo $count_row ?>' class="col-md-12  text-center" style=" margin:auto; float:none;">
						<p><a class="btn btn-primary" id="groupBtn">확인</a></p>
					</div>


				</div>


					<div class="track-info-content" style="width:1080px; margin-left:auto; margin-right:auto; height:auto">
					</div>
				</section>


				<section id="assi-person-list" class="assi-person-box" style="display:none;" >
					<div class="container" style="margin-top: 5%; margin-bottom: 7%;">
							<header>
								<h2><strong>조교목록</strong></h2>
							</header>
					</div>

					<div class="track-info-content" style="width:1080px; margin-left:auto; margin-right:auto; height:auto">

					<table class="ex1">
					<thead>
					<tr>
						<th scope="col">IDX</th>
						<th scope="col">이름</th>
						<th scope="col">학번</th>
					</tr>
					</thead>
					<tbody>

					<?php
						$status = 2;
						$stmt3 = $dbh->prepare('select * from member where status=:status');
						$stmt3->bindParam(":status", $status);
						$stmt3->execute();
						$row = $stmt3->fetchAll();
						foreach ($row as $row) {



						echo "
						<tr>
							<td class='date2'>".$row['idx']."</td>
							<td class='date1'>".$row['username']."</td>
							<td class='date1'>".$row['userid']."</td>";
						}
					?>
					</tbody>
					</table>
				</div>



					<div class="track-info-content" style="width:1080px; margin-left:auto; margin-right:auto; height:auto">
					</div>
				</section>


				<section id="assi-tweet" class="assi-tweet-box" style="display:none;" >
					<div class="container" style="margin-top: 5%; margin-bottom: 7%;">
							<header>
								<h2><strong>강의트윗</strong></h2>
							</header>
					</div>



					<div class="track-info-content" style="width:1080px; margin-left:auto; margin-right:auto; height:auto">
					</div>
				</section>




				<!-- stuinfo -->


			</div>

		<!-- Footer -->
			<div id="footer" margin style="background: #fff; margin:0;">

				<!-- Copyright -->
				<div id="footer-wrapper" style="background-color:rgb(255, 255, 255); background-image: none;">
					<ul class="menu" style="text-align: center;" >
						<li><img src="../static/img/support1.png"  /></li>
						</br>
						</br>
						<p>Copyright &copy; 2017 레오와 별이 (SSG). All rights reserved.</p>
					</ul>


				</div>

			</div>

		<!-- Scripts -->
			<script src="../static/assets/js/jquery.min.js"></script>
			<script src="../static/assets/js/jquery.scrolly.min.js"></script>
			<script src="../static/assets/js/jquery.scrollzer.min.js"></script>
			<script src="../static/assets/js/skel.min.js"></script>
			<script src="../static/assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="../static/assets/js/main.js"></script>
			<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
			<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>
			<script type="text/javascript">

				$("#class-view").on("click", function(){
					$(".container-box").hide();
					$(".track-intro-box").hide();
					$(".track-reco-box").hide();
					$(".track-info-box").hide();
					$(".stuinfo-box").hide();
					$(".class-box").fadeIn(1000);
					$(".assi-tweet-box").hide();
					$(".class-create-box").hide();
					$(".assi-list-box").hide();
					$(".assi-person-box").hide();

				});
				$("#class-create").on("click", function(){
					$(".container-box").hide();
					$(".track-intro-box").hide();
					$(".track-reco-box").hide();
					$(".track-info-box").hide();
					$(".stuinfo-box").hide();
					$(".class-box").hide();
					$(".class-create-box").fadeIn(1000);
					$(".assi-tweet-box").hide();
					$(".assi-list-box").hide();
					$(".assi-person-box").hide();

				});


				$("#assi-list").on("click", function(){
					$(".container-box").hide();
					$(".track-intro-box").hide();
					$(".track-reco-box").hide();
					$(".class-create-box").hide();
					$(".track-info-box").hide();
					$(".assi-list-box").fadeIn(1000);
					$(".assi-tweet-box").hide();
					$(".stuinfo-box").hide();
					$(".class-box").hide();
					$(".assi-person-box").hide();

				});
				$("#assi-person-list").on("click", function(){
					$(".container-box").hide();
					$(".track-intro-box").hide();
					$(".track-reco-box").hide();
					$(".class-create-box").hide();
					$(".track-info-box").hide();
					$(".assi-list-box").hide();
					$(".assi-tweet-box").hide();
					$(".assi-person-box").fadeIn(1000);
					$(".stuinfo-box").hide();
					$(".class-box").hide();

				});
				$("#assi-tweet").on("click", function(){
					$(".container-box").hide();
					$(".assi-person-box").hide();
					$(".track-intro-box").hide();
					$(".track-reco-box").hide();
					$(".class-create-box").hide();
					$(".track-info-box").hide();
					$(".assi-tweet-box").fadeIn(1000);
					$(".assi-list-box").hide();
					$(".stuinfo-box").hide();
					$(".class-box").hide();

				});


				$("#stuinfo-view").on("click", function(){
					$(".class-box").hide();
					$(".container-box").hide();

					$(".stuinfo-box").fadeIn(1000);
				});


				$("#create_btn").on("click", function(){
					createClass();
				});

				$("#delete_btn").on("click", function(){
					deleteClass();
				});
				$("#logout-button").on("click", function(){
					logout();
				});

				$("#get_track").on("click", function(){
					get_track();
				})


				$("#createBtn").on("click", function(){
					createClass();
				});

				$(".asdf").on("click", function(){
					$("#partner-dialog,#dialog-background").show();

					var name = $(this).attr("name");
					var sub = $(this).attr("sub");
					var data = new FormData();
					data.append("name", name);
					data.append("sub", sub);
					$.ajax({
						type: "POST",
						url: "../db/schedule_handle.php",
						data: data,
						dataType: "json",
						processData: false,
						contentType: false,
						success: function(data){



						}
					});

				});
				$(function(){
					$("#partner-close-dialog1").click(function(){
						$("#partner-dialog,#dialog-background").hide();
					});

				});


				$("#groupBtn").on("click", function(){
					groupClass();
				});

				function groupClass(){
					var group_choose = $("#group_choose").val();
					var checkboxValues = [];
				     $("input[name='chk_info']:checked").each(function(i) {
				         checkboxValues.push($(this).val());
				     });

				  var data = { "group_choose": group_choose, "checkArray": checkboxValues };

					$.ajax({
						type: "POST",
						url: "../db/groupClass.php",
						data: data,
						success: function(data) {

								window.location.reload();
						}
					});




				}









				function createClass(){
					var class_name = $("#class_name").val();
					var sub = $("#sub").val();
					var start_time = $("#start_time").val();
					var end_time = $("#end_time").val();
					var day = $("#day").val();
					var data = new FormData();
					data.append("class_name", class_name);
					data.append("sub", sub);

					data.append("start_time", start_time);
					data.append("end_time", end_time);
					data.append("day", day);
					$.ajax({
						type: "POST",
						url: "../db/createClass.php",
						data: data,
						dataType: "json",
						processData: false,
						contentType: false,
						success: function(data){
							if (data.status === "success"){
								window.location.reload();
							} else {
								$("#create-result").html(data['reason']);

							}
						}
					});
				}

				function deleteClass(){
					var deleteNum = $("#deleteNum").val();
					var data = new FormData();
					data.append("deletenum", deleteNum);
					$.ajax({
						type: "POST",
						url: "../db/deleteClass.php",
						data: data,
						dataType: "json",
						processData: false,
						contentType: false,
						success: function(data){
							if (data.status === "success"){
								window.location.reload();
							} else {
								$("#create-result").html(data['reason']);
							}
						}
					});
				}







				function logout(){
					var data = new FormData();
					$.ajax({
						type: "POST",
						url: "../db/logout.php",
						data: data,
						dataType: "json",
						processData: false,
						success: function(data){
							if (data['status'] == "success") {

                            location.href="/";

                        } else {



                        }
						}
					});
				}



				$("#con_create_btn").on("click", function(){
					createContainer();
				});

				$("#con_delete_btn").on("click", function(){
					deleteContainer();
				});

				$("#toggle1").on("click", function(){
						var status = $("#header").attr("status");

						if (status == 0){


								$("#header").animate({width:'toggle'},350);
								$("#header").attr("status",1)

						}

						if (status == 1){
								$("#header").animate({width:'toggle'},200);
								$("#header").attr("status",0)
						}

					});

				function createContainer(){
					var createContainerName = $("#createContainerName").val();
					var createContainerTag = $("#createContainerTag").val();

					var data = new FormData();
					data.append("name", createContainerName);
					data.append("tag", createContainerTag);

					$.ajax({
						type: "POST",
						url: "../db/createContainer.php",
						data: data,
						dataType: "json",
						processData: false,
						contentType: false,
						success: function(data){
							if (data['status'] === "success"){
								window.location.reload();
							} else{

							}
						}
					});
				}


				function deleteContainer(){
					var deleteConNum = $("#deleteConNum").val();
					var data = new FormData();
					data.append("num", deleteConNum);
					$.ajax({
						type: "POST",
						url: "../db/deleteContainer.php",
						data: data,
						dataType: "json",
						processData: false,
						contentType: false,
						success: function(data){
							if (data['status'] === "success"){
								window.location.reload();
							} else{

							}
						}
					});
				}

				$("#track-choose").on('click',function(){


					var status = $(".track-drop").attr("status");

					if (status == "0"){
						$("#track-drop").fadeIn(100);
						$("#track-drop").attr("status",1)
					}

					if (status==1){
						$("#track-drop").fadeOut(100);
						$("#track-drop").attr("status",0)
					}
				})
				$("#class-choose").on('click',function(){


					var status = $(".class-drop").attr("status");

					if (status == "0"){
						$("#class-drop").fadeIn(100);
						$("#class-drop").attr("status",1)
					}

					if (status==1){
						$("#class-drop").fadeOut(100);
						$("#class-drop").attr("status",0)
					}
				})
				$("#assi-choose").on('click',function(){


					var status = $(".assi-drop").attr("status");

					if (status == "0"){
						$("#assi-drop").fadeIn(100);
						$("#assi-drop").attr("status",1)
					}

					if (status==1){
						$("#assi-drop").fadeOut(100);
						$("#assi-drop").attr("status",0)
					}
				})








			</script>











	</body>
</html>
