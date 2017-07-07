<!DOCTYPE HTML>
<?php
session_start();
if ($_SESSION['stunum'] == null){
	echo "<script>location.href='../index.php';</script>";
   exit();
}
$stuname = $_SESSION['username'];
$stunum = $_SESSION['stunum'];
include "../db/db_init.php";

?>





<html>
	<head>
		<title>REO</title>
		<meta charset="utf-8" />
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







	<article style="position: fixed; z-index: 1001; width: 100%; height: 50px; line-height: 50px;">
		<header style="width:100%; height:64px; /*background:rgba(0,181,173,0.8);*/ background:#52C0FF; ">
			<label id="toggle1"></label>
			<input type="checkbox" id ="toggle"/>
			<p style="font-size:20px; font-weight:600; margin:0 0 0 100px; float:left; color:#fff; line-height:64px;"/><span style="color:#A31432; color:#fff; font-size:30px">REO_</span><span style="color:#fff; font-size:20px">STUDENT</span></p>

		<p style="font-size:15px; font-weight:600; padding-right: 30px; margin:0 0 0 100px; float:right; color:#fff; line-height:70px;"><a style="color: #fff; href="#"><?php echo $stuname; ?> 님 환영합니다.</a></p>
		</header>
	</article>



		<!-- Header -->
			<div style="padding-top: 50px; background:#fff;" status="0"  id="header">

				<div class="top">
					<!-- Logo -->
						<div id="logo">

							<h1 style="color:#7FB0CC; font-weight:800;"  id="title"><?php echo $stuname; ?></h1>
							<p style="color:#7FB0CC;">STUDENT</p>

						</div>

					<!-- Nav -->
						<nav id="nav">

							<ul>
								<li height="70px;"><a href="#" id="class-choose" class="skel-layers-ignoreHref active"><span style="color:#7FB0CC; font-weight:600;" class="icon fa-caret-square-o-down">수업관리</span></a></li>
								<ul class="class-drop" id="class-drop" status="0">
									<li><a href="#" id="class-view" class="skel-layers-ignoreHref"><span style="color:#7FB0CC; font-weight:600;" class="icon fa-home">공지사항</span></a></li>
								</ul>
								<li><a href="#" id="track-choose" class="skel-layers-ignoreHref"><span style="color:#7FB0CC; font-weight:600;" class="icon fa-caret-square-o-down">트랙관리</span></a></li>
								<ul class="track-drop" id="track-drop" status="0">
									<li><a href="#" id="track-intro" class="skel-layers-ignoreHref"><span style="color:#7FB0CC; font-weight:600;" class="icon fa-th">트랙소개</span></a></li>
									<li><a href="#" id="track-reco" class="skel-layers-ignoreHref"><span style="color:#7FB0CC; font-weight:600;" class="icon fa-th">트랙추천</span></a></li>
									<li><a href="#" id="track-info" class="skel-layers-ignoreHref"><span style="color:#7FB0CC; font-weight:600;" class="icon fa-th">나의트랙정보</span></a></li>
								</ul>
								<li><a href="#" id="assi-choose" class="skel-layers-ignoreHref"><span style="color:#7FB0CC; font-weight:600;" class="icon fa-caret-square-o-down">조교관리</span></a></li>
								<ul class="assi-drop" id="assi-drop" status="0">
									<li><a href="#" id="assi-list" class="skel-layers-ignoreHref"><span style="color:#7FB0CC; font-weight:600;" class="icon fa-book">강의목록</span></a></li>
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
					<?php include "./../intadd//test_db/select_anounce.php"?>
					<section id="track-intro" class="track-intro-box" style="display:none">
						<div class="container" style="margin-top: 5%; margin-bottom: 7%;">
								<header>
									<h2><strong>트랙 소개</strong></h2>
								</header>
						</div>

						<div class="track-info-content" style="width:1080px; margin-left:auto; margin-right:auto; height:auto">

							<div style="width:480px; height:480px; float:left;">
								<img src="/static/img/sejonglogo.png">
							</div>
							<div style="width:120px; height:480px; float:left;">
							</div>
							<div style="width:480px; height:480px; float:left;">
								<p>세종대학교 소프트웨어융합대학은 2017년도 부터 트랙제도를 시행합니다.</br>소프트웨어 기술 발전에 맞춰 분야별로 이수할 수 있도록 도와주는 시스템입니다.</br>트랙은 총 10가지로 해당 트랙 커리큘럼과 소개를 참고하여 수강하시면 좋을 것 같습니다</p>
							</div>

						</div>
						<div class="track-info-content" style="width:1080px; margin-left:auto; margin-right:auto; height:auto">

							<div style="width:480px; height:480px; float:left;">
								<img src="/static/img/ga1.jpg" width="380px;">
								<p>가상현실</p>

							</div>
							<div style="width:120px; height:480px; float:left;">
							</div>
							<div style="width:480px; height:480px; float:left;">
								<p>가상현실에 대한 관심도가 높아지면서 가상으로 할 수 있는 것들이 많아지고 있다. 이러한 가상현실을 실현하기 위해 그래픽스, 가상 및 증강현실 등 관련있는 분야를 공부하고자 한다.</p>
								<ul class="actions">
									<li><a href="/images/ga1.png" target="_blank" style="background-color:#52C0FF; padding:10px; padding-left:20px; padding-right:20px; border-radius: 0.35em; color:#fff;" >Course</a></li>
								</ul>
							</div>

						</div>
						<div class="track-info-content" style="width:1080px; margin-left:auto; margin-right:auto; height:auto">

							<div style="width:480px; height:480px; float:left;">
								<img src="/static/img/ga2.jpg" width="380px;">
								<p>인공지능</p>
							</div>
							<div style="width:120px; height:480px; float:left;">
							</div>
							<div style="width:480px; height:480px; float:left;">
								<p>알파고의 등장과 함께 인공지능에 대한 관심도가 높아지고 있다. 인공지능을 구현하기 위해 배워야할 기계학습이나 인공지능이 많이 사용되는 컴퓨터 비전 및 패턴 인식 등 관련있는 분야를 공부하고자 한다.</p>
								<ul class="actions">
									<li><a href="/images/ga6.png" target="_blank" style="background-color:#52C0FF; padding:10px; padding-left:20px; padding-right:20px; border-radius: 0.35em; color:#fff;" >Course</a></li>
								</ul>
							</div>

						</div>
						<div class="track-info-content" style="width:1080px; margin-left:auto; margin-right:auto; height:auto">

							<div style="width:480px; height:480px; float:left;">
								<img src="/static/img/sw.jpg" width="380px;">
								<p>응용SW</p>
							</div>
							<div style="width:120px; height:480px; float:left;">
							</div>
							<div style="width:480px; height:480px; float:left;">
								<p>프로그래밍을 공부하여 간단한 프로그램 뿐만 아니라 더 다양한 서비스를 제공하기 위해 생활 속에 응용할 수 있고 많이 사용되는 분야를 공부하고자한다.</p>
								<ul class="actions">
									<li><a href="/images/ga4.png" target="_blank" style="background-color:#52C0FF; padding:10px; padding-left:20px; padding-right:20px; border-radius: 0.35em; color:#fff;" >Course</a></li>
								</ul>
							</div>

						</div>
						<div class="track-info-content" style="width:1080px; margin-left:auto; margin-right:auto; height:auto">

							<div style="width:480px; height:480px; float:left;">
								<img src="/static/img/hci.jpeg" width="380px;">
								<p>HCI&VC</p>
							</div>
							<div style="width:120px; height:480px; float:left;">
							</div>
							<div style="width:480px; height:480px; float:left;">
								<p>이제는 컴퓨터와 사람은 떼어놓을 수 없는 그런 시대가 되었다. 컴퓨터와 사람이 서로 상호작용하기 위해 필요한 분야를 공부하고자 한다.</p>
								<ul class="actions">
									<li><a href="/images/ga9.png" target="_blank" style="background-color:#52C0FF; padding:10px; padding-left:20px; padding-right:20px; border-radius: 0.35em; color:#fff;" >Course</a></li>
								</ul>
							</div>

						</div>
						<div class="track-info-content" style="width:1080px; margin-left:auto; margin-right:auto; height:auto">

							<div style="width:480px; height:480px; float:left;">
								<img src="/static/img/multimedia.jpg" width="380px;">
								<p>멀티미디어</p>
							</div>
							<div style="width:120px; height:480px; float:left;">
							</div>
							<div style="width:480px; height:480px; float:left;">
								<p>현재 사람들이 접하는 미디어의 양은 셀 수 없을 정도로 많고, 앞으로도 미디어 사용량은 늘어갈 것이다. 이러한 추세에 따라 미디어와 관련된 다양한 분야를 공부하고자 한다.</p>
								<ul class="actions">
									<li><a href="/images/ga2.png" target="_blank" style="background-color:#52C0FF; padding:10px; padding-left:20px; padding-right:20px; border-radius: 0.35em; color:#fff;" >Course</a></li>
								</ul>
							</div>

						</div>
						<div class="track-info-content" style="width:1080px; margin-left:auto; margin-right:auto; height:auto">

							<div style="width:480px; height:480px; float:left;">
								<img src="/static/img/iot.png" width="380px;">
								<p>사물인터넷</p>
							</div>
							<div style="width:120px; height:480px; float:left;">
							</div>
							<div style="width:480px; height:480px; float:left;">
								<p>요즘에는 IOE(Internet Of Everything)라고 할 정도로 많은 사물에 인터넷이 사용된다. 사물간의 통신, 그리고 사물 내에서 어떻게 처리되는지 알기위해 필요한 분야를 공부하고자 한다.</p>
								<ul class="actions">
									<li><a href="/images/ga5.png" target="_blank" style="background-color:#52C0FF; padding:10px; padding-left:20px; padding-right:20px; border-radius: 0.35em; color:#fff;" >Course</a></li>
								</ul>
							</div>

						</div>
						<div class="track-info-content" style="width:1080px; margin-left:auto; margin-right:auto; height:auto">

							<div style="width:480px; height:480px; float:left;">
								<img src="/static/img/system.jpg" width="380px;">
								<p>시스템응용</p>
							</div>
							<div style="width:120px; height:480px; float:left;">
							</div>
							<div style="width:480px; height:480px; float:left;">
								<p>현재 대부분의 사람들은 시스템을 다루기 보다는 응용 프로그램을 다루는 일을 많이 한다. 하지만 시스템을 잘 다룰 수 있는 능력은 여전히 필요하고 중요하다. 이런 시스템과 관련된 분야를 공부하고자 한다.</p>
								<ul class="actions">
									<li><a href="/images/ga7.png" target="_blank" style="background-color:#52C0FF; padding:10px; padding-left:20px; padding-right:20px; border-radius: 0.35em; color:#fff;" >Course</a></li>
								</ul>
							</div>

						</div>
						<div class="track-info-content" style="width:1080px; margin-left:auto; margin-right:auto; height:auto">

							<div style="width:480px; height:480px; float:left;">
								<img src="/static/img/intelligence.jpg" width="380px;">
								<p>지능형인지</p>
							</div>
							<div style="width:120px; height:480px; float:left;">
							</div>
							<div style="width:480px; height:480px; float:left;">
								<p>이제 많은 것들을 사람이 아닌 기계나 프로그램이 해주기를 바라고 있다. 그러기 위해서는 컴퓨터와 사람은 소통할 수 있어야하고 컴퓨터는 사람의 생활 방식을 이해해야한다. 이런 추세에 맞춰 컴퓨터가 사람처럼 동작하기 위해 필요한 분야를 공부하고자 한다.</p>
								<ul class="actions">
									<li><a href="/images/ga8.png" target="_blank" style="background-color:#52C0FF; padding:10px; padding-left:20px; padding-right:20px; border-radius: 0.35em; color:#fff;" >Course</a></li>
								</ul>
							</div>

						</div>
						<div class="track-info-content" style="width:1080px; margin-left:auto; margin-right:auto; height:auto">

							<div style="width:480px; height:480px; float:left;">
								<img src="/static/img/datascience.jpg" width="380px;">
								<p>데이터사이언스</p>
							</div>
							<div style="width:120px; height:480px; float:left;">
							</div>
							<div style="width:480px; height:480px; float:left;">
								<p>인터넷이 보급화되고 확산되면서 많은 양의 데이터가 쏟아져나오고 있다. 우리는 이제 이 데이터를 이용하여 일상 생활에활용할 수 있어야하며 모든 데이터가 아닌 필요한 데이터만 뽑아낼 필요가 있다.데이터를 좀 더 효과적으로 사용하기 위해 필요한 분야를 공부하고자 한다.</p>
								<ul class="actions">
									<li><a href="/images/ga3.png" target="_blank" style="background-color:#52C0FF; padding:10px; padding-left:20px; padding-right:20px; border-radius: 0.35em; color:#fff;" >Course</a></li>
								</ul>
							</div>

						</div>
						<div class="track-info-content" style="width:1080px; margin-left:auto; margin-right:auto; height:auto">

							<div style="width:480px; height:480px; float:left;">
								<img src="/static/img/security.png.jpg" width="380px;">
								<p>정보보호</p>
							</div>
							<div style="width:120px; height:480px; float:left;">
							</div>
							<div style="width:480px; height:480px; float:left;">
								<p>컴퓨터의 사용량이 증가함에 따라 정보의 중요성 또한 증가하고 있다. 이러한 정보를 보호하고 올바르게 사용할 수 있도록 우리는 인터넷, 프로그램이 사용되는 모든 곳에 안전 장치를 할 필요가 있다.우리가 좀 더 데이터를 안전하게 사용할 수 있도록 하기 위해 필요한 분야를 공부하고자 한다.</p>
								<ul class="actions">
									<li><a href="/images/ga10.png" target="_blank" style="background-color:#52C0FF; padding:10px; padding-left:20px; padding-right:20px; border-radius: 0.35em; color:#fff;" >Course</a></li>
								</ul>
							</div>

						</div>



					</section>

				<!-- conainter -->


					<section id="track-reco" class="track-reco-box" style="display:none">
						<div class="container" style="margin-top: 5%; margin-bottom: 7%;">
								<header>
									<h2><strong>트랙 추천</strong></h2>
								</header>
						</div>


						<div class="track-info-content" style="width:1080px; margin-left:auto; margin-right:auto; height:auto">

							<div style="margin-bottom: 50px;">
								<div style="border-top:1px solid #287E7D; border-bottom:1px solid #287E7D; margin-bottom: 50px; padding: 10px;"><p style="font-weight: 200; font-size: 15px; margin: 0px;">
									1. 가상현실에 관심이 있다</p></div>
								<div style="text-align: center;"><input type="radio" name="chk1" value="YES"> YES <input type="radio" name="chk1" value="NO"> NO </div>
							</div>


							<div style="margin-bottom: 50px;">
								<div style="border-top:1px solid #287E7D; border-bottom:1px solid #287E7D; margin-bottom: 50px; padding: 10px;"><p style="font-weight: 200; font-size: 15px; margin: 0px;">
									2. 게임 속 현실을 만들어보고 싶다</p></div>
								<div style="text-align: center;"><input type="radio" name="chk2" value="YES"> YES <input type="radio" name="chk2" value="NO"> NO </div>
							</div>
							<div style="margin-bottom: 50px;">
								<div style="border-top:1px solid #287E7D; border-bottom:1px solid #287E7D; margin-bottom: 50px; padding: 10px;"><p style="font-weight: 200; font-size: 15px; margin: 0px;">
									3. 그래픽이 들어간 미디어에 관심이 있다</p></div>
								<div style="text-align: center;"><input type="radio" name="chk3" value="YES"> YES <input type="radio" name="chk3" value="NO"> NO </div>
							</div>



							<div style="margin-bottom: 50px;">
								<div style="border-top:1px solid #287E7D; border-bottom:1px solid #287E7D; margin-bottom: 50px; padding: 10px;"><p style="font-weight: 200; font-size: 15px; margin: 0px;">
									4. 인공지능에 관심이 있다</p></div>
								<div style="text-align: center;"><input type="radio" name="chk4" value="YES"> YES <input type="radio" name="chk4" value="NO"> NO </div>
							</div>
							<div style="margin-bottom: 50px;">
								<div style="border-top:1px solid #287E7D; border-bottom:1px solid #287E7D; margin-bottom: 50px; padding: 10px;"><p style="font-weight: 200; font-size: 15px; margin: 0px;">
									5. 프로그램을 어떻게 학습하는지 궁금하다</p></div>
								<div style="text-align: center;"><input type="radio" name="chk5" value="YES"> YES <input type="radio" name="chk5" value="NO"> NO </div>
							</div>
							<div style="margin-bottom: 50px;">
								<div style="border-top:1px solid #287E7D; border-bottom:1px solid #287E7D; margin-bottom: 50px; padding: 10px;"><p style="font-weight: 200; font-size: 15px; margin: 0px;">
									6. 지능적인 방법을 사용하여 프로그램을 만들어보고 싶다</p></div>
								<div style="text-align: center;"><input type="radio" name="chk6" value="YES"> YES <input type="radio" name="chk6" value="NO"> NO </div>
							</div>



							<div style="margin-bottom: 50px;">
								<div style="border-top:1px solid #287E7D; border-bottom:1px solid #287E7D; margin-bottom: 50px; padding: 10px;"><p style="font-weight: 200; font-size: 15px; margin: 0px;">
									7. 웹이나 모바일 프로그래밍 등을 좋아한다</p></div>
								<div style="text-align: center;"><input type="radio" name="chk7" value="YES"> YES <input type="radio" name="chk7" value="NO"> NO </div>
							</div>
							<div style="margin-bottom: 50px;">
								<div style="border-top:1px solid #287E7D; border-bottom:1px solid #287E7D; margin-bottom: 50px; padding: 10px;"><p style="font-weight: 200; font-size: 15px; margin: 0px;">
									8. 다양한 종류의 소프트웨어를 개발하고 싶다</p></div>
								<div style="text-align: center;"><input type="radio" name="chk8" value="YES"> YES <input type="radio" name="chk8" value="NO"> NO </div>
							</div>
							<div style="margin-bottom: 50px;">
								<div style="border-top:1px solid #287E7D; border-bottom:1px solid #287E7D; margin-bottom: 50px; padding: 10px;"><p style="font-weight: 200; font-size: 15px; margin: 0px;">
									9. 여러 소프트웨어에 사용되는 분야를 공부하고 싶다</p></div>
								<div style="text-align: center;"><input type="radio" name="chk9" value="YES"> YES <input type="radio" name="chk9" value="NO"> NO </div>
							</div>





							<div style="margin-bottom: 50px;">
								<div style="border-top:1px solid #287E7D; border-bottom:1px solid #287E7D; margin-bottom: 50px; padding: 10px;"><p style="font-weight: 200; font-size: 15px; margin: 0px;">
									10. 컴퓨터와 사람이 작용하는 방식을 공부하고 싶다</p></div>
								<div style="text-align: center;"><input type="radio" name="chk10" value="YES"> YES <input type="radio" name="chk10" value="NO"> NO </div>
							</div>
							<div style="margin-bottom: 50px;">
								<div style="border-top:1px solid #287E7D; border-bottom:1px solid #287E7D; margin-bottom: 50px; padding: 10px;"><p style="font-weight: 200; font-size: 15px; margin: 0px;">
									11. 컴퓨터와 사람이 상호작용하여 할 수 있는 것들을 알고 싶다</p></div>
								<div style="text-align: center;"><input type="radio" name="chk11" value="YES"> YES <input type="radio" name="chk11" value="NO"> NO </div>
							</div>
							<div style="margin-bottom: 50px;">
								<div style="border-top:1px solid #287E7D; border-bottom:1px solid #287E7D; margin-bottom: 50px; padding: 10px;"><p style="font-weight: 200; font-size: 15px; margin: 0px;">
									12. 웹 기반 시스템을 개발하는 것이 재미있다</p></div>
								<div style="text-align: center;"><input type="radio" name="chk12" value="YES"> YES <input type="radio" name="chk12" value="NO"> NO </div>
							</div>



							<div style="margin-bottom: 50px;">
								<div style="border-top:1px solid #287E7D; border-bottom:1px solid #287E7D; margin-bottom: 50px; padding: 10px;"><p style="font-weight: 200; font-size: 15px; margin: 0px;">
									13. 다양한 미디어 처리에 관심이 많다</p></div>
								<div style="text-align: center;"><input type="radio" name="chk13" value="YES"> YES <input type="radio" name="chk13" value="NO"> NO </div>
							</div>
							<div style="margin-bottom: 50px;">
								<div style="border-top:1px solid #287E7D; border-bottom:1px solid #287E7D; margin-bottom: 50px; padding: 10px;"><p style="font-weight: 200; font-size: 15px; margin: 0px;">
									14. 음성이나 영상을 처리하는 것이 재미있다</p></div>
								<div style="text-align: center;"><input type="radio" name="chk14" value="YES"> YES <input type="radio" name="chk14" value="NO"> NO </div>
							</div>
							<div style="margin-bottom: 50px;">
								<div style="border-top:1px solid #287E7D; border-bottom:1px solid #287E7D; margin-bottom: 50px; padding: 10px;"><p style="font-weight: 200; font-size: 15px; margin: 0px;">
									15. 신호 처리 과정을 알아보고 싶다</p></div>
								<div style="text-align: center;"><input type="radio" name="chk15" value="YES"> YES <input type="radio" name="chk15" value="NO"> NO </div>
							</div>




							<div style="margin-bottom: 50px;">
								<div style="border-top:1px solid #287E7D; border-bottom:1px solid #287E7D; margin-bottom: 50px; padding: 10px;"><p style="font-weight: 200; font-size: 15px; margin: 0px;">
									16. 내가 사용하는 시스템이 어떻게 동작하는지 알고 싶다</p></div>
								<div style="text-align: center;"><input type="radio" name="chk16" value="YES"> YES <input type="radio" name="chk16" value="NO"> NO </div>
							</div>
							<div style="margin-bottom: 50px;">
								<div style="border-top:1px solid #287E7D; border-bottom:1px solid #287E7D; margin-bottom: 50px; padding: 10px;"><p style="font-weight: 200; font-size: 15px; margin: 0px;">
									17. 시스템에 사용되는 언어나 컴파일러가 동작하는 방식이 알고 싶다</p></div>
								<div style="text-align: center;"><input type="radio" name="chk17" value="YES"> YES <input type="radio" name="chk17" value="NO"> NO </div>
							</div>
							<div style="margin-bottom: 50px;">
								<div style="border-top:1px solid #287E7D; border-bottom:1px solid #287E7D; margin-bottom: 50px; padding: 10px;"><p style="font-weight: 200; font-size: 15px; margin: 0px;">
									18. 시스템을 설계하는 방법을 공부하고 싶다</p></div>
								<div style="text-align: center;"><input type="radio" name="chk18" value="YES"> YES <input type="radio" name="chk18" value="NO"> NO </div>
							</div>




							<div style="margin-bottom: 50px;">
								<div style="border-top:1px solid #287E7D; border-bottom:1px solid #287E7D; margin-bottom: 50px; padding: 10px;"><p style="font-weight: 200; font-size: 15px; margin: 0px;">
									19. 지능적인 프로그램을 만들고 싶다</p></div>
								<div style="text-align: center;"><input type="radio" name="chk19" value="YES"> YES <input type="radio" name="chk19" value="NO"> NO </div>
							</div>
							<div style="margin-bottom: 50px;">
								<div style="border-top:1px solid #287E7D; border-bottom:1px solid #287E7D; margin-bottom: 50px; padding: 10px;"><p style="font-weight: 200; font-size: 15px; margin: 0px;">
									20. 시스템이 영상정보 등과 같은 미디어 정보를 인지하는 방식을 알고 싶다</p></div>
								<div style="text-align: center;"><input type="radio" name="chk20" value="YES"> YES <input type="radio" name="chk20" value="NO"> NO </div>
							</div>
							<div style="margin-bottom: 50px;">
								<div style="border-top:1px solid #287E7D; border-bottom:1px solid #287E7D; margin-bottom: 50px; padding: 10px;"><p style="font-weight: 200; font-size: 15px; margin: 0px;">
									21. 지능을 가진 프로그램이 동작하는 방식을 알고싶다</p></div>
								<div style="text-align: center;"><input type="radio" name="chk21" value="YES"> YES <input type="radio" name="chk21" value="NO"> NO </div>
							</div>




							<div style="margin-bottom: 50px;">
								<div style="border-top:1px solid #287E7D; border-bottom:1px solid #287E7D; margin-bottom: 50px; padding: 10px;"><p style="font-weight: 200; font-size: 15px; margin: 0px;">
									22. 많은 데이터를 처리하는 방식을 알고 싶다</p></div>
								<div style="text-align: center;"><input type="radio" name="chk22" value="YES"> YES <input type="radio" name="chk22" value="NO"> NO </div>
							</div>
							<div style="margin-bottom: 50px;">
								<div style="border-top:1px solid #287E7D; border-bottom:1px solid #287E7D; margin-bottom: 50px; padding: 10px;"><p style="font-weight: 200; font-size: 15px; margin: 0px;">
									23. 빅데이터를 이용하여 학습모델을 만들어보고 싶다</p></div>
								<div style="text-align: center;"><input type="radio" name="chk23" value="YES"> YES <input type="radio" name="chk23" value="NO"> NO </div>
							</div>
							<div style="margin-bottom: 50px;">
								<div style="border-top:1px solid #287E7D; border-bottom:1px solid #287E7D; margin-bottom: 50px; padding: 10px;"><p style="font-weight: 200; font-size: 15px; margin: 0px;">
									24. 빅데이터를 이용하여 지능형 시스템에 적용해보고싶다</p></div>
								<div style="text-align: center;"><input type="radio" name="chk24" value="YES"> YES <input type="radio" name="chk24" value="NO"> NO </div>
							</div>



							<div style="margin-bottom: 50px;">
								<div style="border-top:1px solid #287E7D; border-bottom:1px solid #287E7D; margin-bottom: 50px; padding: 10px;"><p style="font-weight: 200; font-size: 15px; margin: 0px;">
									25. 정보보호에 관심이 많다</p></div>
								<div style="text-align: center;"><input type="radio" name="chk25" value="YES"> YES <input type="radio" name="chk25" value="NO"> NO </div>
							</div>
							<div style="margin-bottom: 50px;">
								<div style="border-top:1px solid #287E7D; border-bottom:1px solid #287E7D; margin-bottom: 50px; padding: 10px;"><p style="font-weight: 200; font-size: 15px; margin: 0px;">
									26. 시스템 보호기법에 대해 공부해보고 싶다</p></div>
								<div style="text-align: center;"><input type="radio" name="chk26" value="YES"> YES <input type="radio" name="chk26" value="NO"> NO </div>
							</div>
							<div style="margin-bottom: 50px;">
								<div style="border-top:1px solid #287E7D; border-bottom:1px solid #287E7D; margin-bottom: 50px; padding: 10px;"><p style="font-weight: 200; font-size: 15px; margin: 0px;">
									27. 취약한 프로그램을 분석해보고 싶다</p></div>
								<div style="text-align: center;"><input type="radio" name="chk27" value="YES"> YES <input type="radio" name="chk27" value="NO"> NO </div>
							</div>


							<div style="margin-bottom: 50px;">
								<div style="border-top:1px solid #287E7D; border-bottom:1px solid #287E7D; margin-bottom: 50px; padding: 10px;"><p style="font-weight: 200; font-size: 15px; margin: 0px;">
									28. 사물끼리 통신하는 방식을 알고 싶다</p></div>
								<div style="text-align: center;"><input type="radio" name="chk28" value="YES"> YES <input type="radio" name="chk28" value="NO"> NO </div>
							</div>
							<div style="margin-bottom: 50px;">
								<div style="border-top:1px solid #287E7D; border-bottom:1px solid #287E7D; margin-bottom: 50px; padding: 10px;"><p style="font-weight: 200; font-size: 15px; margin: 0px;">
									29. 인터넷이 들어간 사물이 어떤 일을 할 수 있는지 알아보고 싶다</p></div>
								<div style="text-align: center;"><input type="radio" name="chk29" value="YES"> YES <input type="radio" name="chk29" value="NO"> NO </div>
							</div>
							<div style="margin-bottom: 50px;">
								<div style="border-top:1px solid #287E7D; border-bottom:1px solid #287E7D; margin-bottom: 50px; padding: 10px;"><p style="font-weight: 200; font-size: 15px; margin: 0px;">
									30. 어떤 사물에 인터넷이 적용될 수 있을지 알아보고 싶다</p></div>
								<div style="text-align: center;"><input type="radio" name="chk30" value="YES"> YES <input type="radio" name="chk30" value="NO"> NO </div>
							</div>

							<div style="margin-top: 40px;">
								<div class="col-md-12  text-center" style="padding-bottom: 50px;">
									<p><a class="btn btn-primary" id="personalResult6">확인</a></p>
								</div>
							</div>



						</div>


					</section>
					<section id="track-info" class="track-info-box" style="display:none">
						<div class="container" style="margin-top: 5%; margin-bottom: 7%;">
								<header>
									<h2><strong>나의 트랙 관리</strong></h2>
								</header>
						</div>

						<div class="track-list" id="track-list" style="width:1080px; margin-left:auto; margin-right:auto; height:auto">
							<ul class="actions">
								<li><a id="get_track" stunum="<?php echo $stunum ?>" class="get_track" style="cursor:pointer; background-color:#52C0FF; padding:10px; padding-left:30px; padding-right:30px; border-radius: 0.35em; color:#fff;" >확인</a></li>
							</ul>
						</div>



					</section>

					<section id="assi-list" class="assi-list-box" style="display:none;" >
						<div class="container" style="margin-top: 5%; margin-bottom: 7%;">
								<header>
									<h2><strong>강의목록</strong></h2>
								</header>
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
					<section id="stuinfo" class="stuinfo-box" style="display:none;" >
					<div class="container" style="margin-top: 5%; margin-bottom: 7%;">

							<header>
								<h2><strong>학생관리</strong></h2>
							</header>
						</div>
						<div>

							<div class="content" style="padding-bottom: : 100px;">
							<table class="ex1">
							<p class="ex1">학생목록</p>
							<thead>
							<tr>
								<th scope="col">Number</th>
								<th scope="col">StudentNumber</th>
								<th scope="col">Class</th>

							</tr>
							</thead>
							<tbody>


								<tr>
									<td class='date2'>1</td>
									<td class='date1'>15011098</td>
									<td class='date1'>asdfasdf</td></tr>";
								}

							</tbody>
							</table>
							</div>
						</div>


					</section>

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
					$(".assi-list-box").hide();

				});
				$("#track-intro").on("click", function(){
					$(".container-box").hide();
					$(".track-intro-box").fadeIn(1000);
					$(".track-reco-box").hide();
					$(".track-info-box").hide();
					$(".stuinfo-box").hide();
					$(".class-box").hide();
					$(".assi-tweet-box").hide();
					$(".assi-list-box").hide();

				});
				$("#track-reco").on("click", function(){
					$(".container-box").hide();
					$(".track-intro-box").hide();
					$(".track-reco-box").fadeIn(1000);
					$(".track-info-box").hide();
					$(".stuinfo-box").hide();
					$(".class-box").hide();
					$(".assi-tweet-box").hide();
					$(".assi-list-box").hide();

				});
				$("#track-info").on("click", function(){
					$(".container-box").hide();
					$(".track-intro-box").hide();
					$(".track-reco-box").hide();
					$(".track-info-box").fadeIn(1000);
					$(".assi-tweet-box").hide();
					$(".assi-list-box").hide();
					$(".stuinfo-box").hide();
					$(".class-box").hide();

				});
				$("#assi-list").on("click", function(){
					$(".container-box").hide();
					$(".track-intro-box").hide();
					$(".track-reco-box").hide();
					$(".track-info-box").hide();
					$(".assi-list-box").fadeIn(1000);
					$(".assi-tweet-box").hide();
					$(".stuinfo-box").hide();
					$(".class-box").hide();

				});
				$("#assi-tweet").on("click", function(){
					$(".container-box").hide();
					$(".track-intro-box").hide();
					$(".track-reco-box").hide();
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

				function get_track(){
					var stunum = $(".get_track").attr("stunum");

					var data = new FormData();
					data.append("stunum", stunum);
					$.ajax({
						type: "POST",
						url: "../track_check/check.php",
						data: data,
						dataType: "json",
						processData: false,
						contentType: false,
						success: function(data){

							$("#track-list").html("");

							var v1_result = parseInt(Number(data['v1'])/6*100);
							var v2_result = parseInt(Number(data['v2'])/6*100);
							var v3_result = parseInt(Number(data['v3'])/6*100);
							var v4_result = parseInt(Number(data['v4'])/6*100);
							var v5_result = parseInt(Number(data['v5'])/6*100);
							var v6_result = parseInt(Number(data['v6'])/6*100);
							var v7_result = parseInt(Number(data['v7'])/6*100);
							var v8_result = parseInt(Number(data['v8'])/6*100);
							var v9_result = parseInt(Number(data['v9'])/6*100);
							var v10_result = parseInt(Number(data['v10'])/6*100);


							$("#track-list").append("<div style='width:480px; height:480px; float:left;'><h1 style='font-size:108px; font-weight:999;'>"+v1_result+"%</h1><p style='font-size:32px; font-weight:400; padding-bottom:5px; margin-bottom:10px;'>"+data['v1']+"과목 완료</p>"+data['v1_done']+"</div>");
							$("#track-list").append("<div style='width:120px; height:480px; float:left;'></div><div style='width:480px; height:480px; float:left;'><h1 style='font-size:48px; font-weight:500; padding-top:42px;'>가상현실트랙</h1><p style='font-size:32px; font-weight:400; padding-bottom:5px; margin-top:45px; margin-bottom:10px;'>남은이수과목</p>"+(6-Number(data['v1']))+"과목</div>");

							$("#track-list").append("<div style='width:480px; height:480px; float:left;'><h1 style='font-size:108px; font-weight:999;'>"+v2_result+"%</h1><p style='font-size:32px; font-weight:400; padding-bottom:5px; margin-bottom:10px;'>"+data['v2']+"과목 완료</p>"+data['v2_done']+"</div>");
							$("#track-list").append("<div style='width:120px; height:480px; float:left;'></div><div style='width:480px; height:480px; float:left;'><h1 style='font-size:48px; font-weight:500; padding-top:42px;'>인공지능트랙</h1><p style='font-size:32px; font-weight:400; padding-bottom:5px; margin-top:45px; margin-bottom:10px;'>남은이수과목</p>"+(6-Number(data['v2']))+"과목</div>");

							$("#track-list").append("<div style='width:480px; height:480px; float:left;'><h1 style='font-size:108px; font-weight:999;'>"+v3_result+"%</h1><p style='font-size:32px; font-weight:400; padding-bottom:5px; margin-bottom:10px;'>"+data['v3']+"과목 완료</p>"+data['v3_done']+"</div>");
							$("#track-list").append("<div style='width:120px; height:480px; float:left;'></div><div style='width:480px; height:480px; float:left;'><h1 style='font-size:48px; font-weight:500; padding-top:42px;'>응용sw트랙</h1><p style='font-size:32px; font-weight:400; padding-bottom:5px; margin-top:45px; margin-bottom:10px;'>남은이수과목</p>"+(6-Number(data['v3']))+"과목</div>");

							$("#track-list").append("<div style='width:480px; height:480px; float:left;'><h1 style='font-size:108px; font-weight:999;'>"+v4_result+"%</h1><p style='font-size:32px; font-weight:400; padding-bottom:5px; margin-bottom:10px;'>"+data['v4']+"과목 완료</p>"+data['v4_done']+"</div>");
							$("#track-list").append("<div style='width:120px; height:480px; float:left;'></div><div style='width:480px; height:480px; float:left;'><h1 style='font-size:48px; font-weight:500; padding-top:42px;'>HCI&VC</h1><p style='font-size:32px; font-weight:400; padding-bottom:5px; margin-top:45px; margin-bottom:10px;'>남은이수과목</p>"+(6-Number(data['v4']))+"과목</div>");

							$("#track-list").append("<div style='width:480px; height:480px; float:left;'><h1 style='font-size:108px; font-weight:999;'>"+v5_result+"%</h1><p style='font-size:32px; font-weight:400; padding-bottom:5px; margin-bottom:10px;'>"+data['v5']+"과목 완료</p>"+data['v5_done']+"</div>");
							$("#track-list").append("<div style='width:120px; height:480px; float:left;'></div><div style='width:480px; height:480px; float:left;'><h1 style='font-size:48px; font-weight:500; padding-top:42px;'>멀티미디어트랙</h1><p style='font-size:32px; font-weight:400; padding-bottom:5px; margin-top:45px; margin-bottom:10px;'>남은이수과목</p>"+(6-Number(data['v5']))+"과목</div>");

							$("#track-list").append("<div style='width:480px; height:480px; float:left;'><h1 style='font-size:108px; font-weight:999;'>"+v10_result+"%</h1><p style='font-size:32px; font-weight:400; padding-bottom:5px; margin-bottom:10px;'>"+data['v10']+"과목 완료</p>"+data['v10_done']+"</div>");
							$("#track-list").append("<div style='width:120px; height:480px; float:left;'></div><div style='width:480px; height:480px; float:left;'><h1 style='font-size:48px; font-weight:500; padding-top:42px;'>사물인터넷</h1><p style='font-size:32px; font-weight:400; padding-bottom:5px; margin-top:45px; margin-bottom:10px;'>남은이수과목</p>"+(6-Number(data['v10']))+"과목</div>");

							$("#track-list").append("<div style='width:480px; height:480px; float:left;'><h1 style='font-size:108px; font-weight:999;'>"+v6_result+"%</h1><p style='font-size:32px; font-weight:400; padding-bottom:5px; margin-bottom:10px;'>"+data['v6']+"과목 완료</p>"+data['v6_done']+"</div>");
							$("#track-list").append("<div style='width:120px; height:480px; float:left;'></div><div style='width:480px; height:480px; float:left;'><h1 style='font-size:48px; font-weight:500; padding-top:42px;'>시스템응용트랙</h1><p style='font-size:32px; font-weight:400; padding-bottom:5px; margin-top:45px; margin-bottom:10px;'>남은이수과목</p>"+(6-Number(data['v6']))+"과목</div>");

							$("#track-list").append("<div style='width:480px; height:480px; float:left;'><h1 style='font-size:108px; font-weight:999;'>"+v7_result+"%</h1><p style='font-size:32px; font-weight:400; padding-bottom:5px; margin-bottom:10px;'>"+data['v7']+"과목 완료</p>"+data['v7_done']+"</div>");
							$("#track-list").append("<div style='width:120px; height:480px; float:left;'></div><div style='width:480px; height:480px; float:left;'><h1 style='font-size:48px; font-weight:500; padding-top:42px;'>지능형인지트랙</h1><p style='font-size:32px; font-weight:400; padding-bottom:5px; margin-top:45px; margin-bottom:10px;'>남은이수과목</p>"+(6-Number(data['v7']))+"과목</div>");

							$("#track-list").append("<div style='width:480px; height:480px; float:left;'><h1 style='font-size:108px; font-weight:999;'>"+v8_result+"%</h1><p style='font-size:32px; font-weight:400; padding-bottom:5px; margin-bottom:10px;'>"+data['v8']+"과목 완료</p>"+data['v8_done']+"</div>");
							$("#track-list").append("<div style='width:120px; height:480px; float:left;'></div><div style='width:480px; height:480px; float:left;'><h1 style='font-size:48px; font-weight:500; padding-top:42px;'>데이터사이언스트랙</h1><p style='font-size:32px; font-weight:400; padding-bottom:5px; margin-top:45px; margin-bottom:10px;'>남은이수과목</p>"+(6-Number(data['v8']))+"과목</div>");

							$("#track-list").append("<div style='width:480px; height:480px; float:left;'><h1 style='font-size:108px; font-weight:999;'>"+v9_result+"%</h1><p style='font-size:32px; font-weight:400; padding-bottom:5px; margin-bottom:10px;'>"+data['v9']+"과목 완료</p>"+data['v9_done']+"</div>");
							$("#track-list").append("<div style='width:120px; height:480px; float:left;'></div><div style='width:480px; height:480px; float:left;'><h1 style='font-size:48px; font-weight:500; padding-top:42px;'>정보보호트랙</h1><p style='font-size:32px; font-weight:400; padding-bottom:5px; margin-top:45px; margin-bottom:10px;'>남은이수과목</p>"+(6-Number(data['v9']))+"과목</div>");





						}
					});

				}



				function createClass(){
					var ClassName = $("#createClassName").val();
					var ClassTag = $("#createClassTag").val();

					var ClassTextarea = $("#createTextarea").val();
					var data = new FormData();
					data.append("classtag", ClassTag);
					data.append("filename", ClassTextarea);

					data.append("classname", ClassName);
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



				$("#personalResult6").on("click", function(){
					var blank = 0;


					for (var i=1; i<31; i++){
						var chk = $("input[name=chk"+i+"]:checked").val();

						if (chk == null){
							blank++;
						}
					}
					if (blank != 0){

						alert("빈 항목을 체크해주세요");
					} else {
						var v1 = 0;
						var v2 = 0;
						var v3 = 0;
						var v4 = 0;
						var v5 = 0;
						var v6 = 0;
						var v7 = 0;
						var v8 = 0;
						var v9 = 0;
						var v10 = 0;

						for (var i=1; i<4; i++){
							var chk = $("input[name=chk"+i+"]:checked").val();

							if (chk == "YES"){
								v1++;
							}
						}
						for (var i=4; i<7; i++){
							var chk = $("input[name=chk"+i+"]:checked").val();

							if (chk == "YES"){
								v2++;
							}
						}
						for (var i=7; i<10; i++){
							var chk = $("input[name=chk"+i+"]:checked").val();

							if (chk == "YES"){
								v3++;
							}
						}
						for (var i=10; i<13; i++){
							var chk = $("input[name=chk"+i+"]:checked").val();

							if (chk == "YES"){
								v4++;
							}
						}
						for (var i=13; i<16; i++){
							var chk = $("input[name=chk"+i+"]:checked").val();

							if (chk == "YES"){
								v5++;
							}
						}
						for (var i=16; i<19; i++){
							var chk = $("input[name=chk"+i+"]:checked").val();

							if (chk == "YES"){
								v6++;
							}
						}
						for (var i=19; i<22; i++){
							var chk = $("input[name=chk"+i+"]:checked").val();

							if (chk == "YES"){
								v7++;
							}
						}
						for (var i=22; i<25; i++){
							var chk = $("input[name=chk"+i+"]:checked").val();

							if (chk == "YES"){
								v8++;
							}
						}
						for (var i=25; i<28; i++){
							var chk = $("input[name=chk"+i+"]:checked").val();

							if (chk == "YES"){
								v9++;
							}
						}
						for (var i=28; i<31; i++){
							var chk = $("input[name=chk"+i+"]:checked").val();

							if (chk == "YES"){
								v10++;
							}
						}


						var v1_done ="";
						var v2_done ="";
						var v3_done ="";
						var v4_done ="";
						var v5_done ="";
						var v6_done ="";
						var v7_done ="";
						var v8_done ="";
						var v9_done ="";
						var v10_done ="";
						if (v1 == 0){
							v1_done = "낮음";
						} else if (v1 == 1){
							v1_done = "낮음";
						} else if (v1 == 2){
							v1_done = "보통";
						} else {
							v1_done = "높음";
						}

						if (v2 == 0){
							v2_done = "낮음";
						} else if (v2 == 1){
							v2_done = "낮음";
						} else if (v2 == 2){
							v2_done = "보통";
						} else {
							v2_done = "높음";
						}

						if (v3 == 0){
							v3_done = "낮음";
						} else if (v3 == 1){
							v3_done = "낮음";
						} else if (v3 == 2){
							v3_done = "보통";
						} else {
							v3_done = "높음";
						}

						if (v4 == 0){
							v4_done = "낮음";
						} else if (v4 == 1){
							v4_done = "낮음";
						} else if (v4 == 2){
							v4_done = "보통";
						} else {
							v4_done = "높음";
						}

						if (v5 == 0){
							v5_done = "낮음";
						} else if (v5 == 1){
							v5_done = "낮음";
						} else if (v5 == 2){
							v5_done = "보통";
						} else {
							v5_done = "높음";
						}

						if (v6 == 0){
							v6_done = "낮음";
						} else if (v6 == 1){
							v6_done = "낮음";
						} else if (v6 == 2){
							v6_done = "보통";
						} else {
							v6_done = "높음";
						}

						if (v7 == 0){
							v7_done = "낮음";
						} else if (v7 == 1){
							v7_done = "낮음";
						} else if (v7 == 2){
							v7_done = "보통";
						} else {
							v7_done = "높음";
						}

						if (v8 == 0){
							v8_done = "낮음";
						} else if (v8 == 1){
							v8_done = "낮음";
						} else if (v8 == 2){
							v8_done = "보통";
						} else {
							v8_done = "높음";
						}

						if (v9 == 0){
							v9_done = "낮음";
						} else if (v9 == 1){
							v9_done = "낮음";
						} else if (v9 == 2){
							v9_done = "보통";
						} else {
							v9_done = "높음";
						}

						if (v10 == 0){
							v10_done = "낮음";
						} else if (v10 == 1){
							v10_done = "낮음";
						} else if (v10 == 2){
							v10_done = "보통";
						} else {
							v10_done = "높음";
						}


						alert("가상현실트랙 : "+v1_done+"\n인공지능트랙 : "+v2_done+"\n응용sw트랙 : "+v3_done+"\nHCI&VC트랙 : "+v4_done+"\n멀티미디어트랙 : "+v5_done+"\n사물인터넷트랙 : "+v10_done+"\n시스템응용트랙 : "+v6_done+"\n지능형인지트랙 : "
						+v7_done+"\n데이터사이언스트랙 : "+v8_done+"\n정보보호트랙 : "+v9_done);


					}
				});




			</script>











	</body>
</html>
