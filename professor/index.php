<!DOCTYPE html>

<?php
session_start();

if ($_SESSION['proid'] != null){
	echo "<script>location.href='./promain.php';</script>";
    exit();
}

?>
<html>
<head>
	<title>Reo</title>
	<meta name="title" content="WITHCON 2016 SSG MINICTF" />
	<meta name="author" content="@onetwo" />
	<meta charset="utf-8"/>
	<script src="../static/js/jquery.min.js"></script>
	<script src="../static/js/semantic.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../static/css/semantic.min.css">

	<style type="text/css">

		html,body {
			width: 100%;
			height: 100%;
			margin: 0;
			padding: 0;

		}
		header {
			position: fixed;
			z-index: 1001;
			width: 100%;
			height: 50px;
			line-height: 50px;
		}
	</style>
</head>
<body>
	<header style="width:100%; height:70px; /*background:rgba(0,181,173,0.8);*/ background:rgba(81,98,111,1); ">
		<img src="../static/img/ssglogo1.png" width="80" height="60" style="margin-top: 5px; float:right; margin-right:50px;">
		<p style="font-size:20px; font-weight:600; margin:0 0 0 100px; float:left; color:#fff; line-height:70px;""/><span style="color:#A31432; color:#fff; font-size:30px">Reo_</span><span style="color:#A31432; color:#fff; font-size:20px">PROFESSOR</span>

	</header>

<!-- login box -->

<article  class="login-box" style="width:750px; height:400px;margin:-175px 0 0 -375px;  position:absolute; left:50%; top:50%; ">
	<article style="float:left; width:100%;">
		<div id="login_div" class="ui middle aligned center aligned grid">
			<div class="column">
				<h2 class="ui teal header">
					<div class="content" style="color:rgba(81,98,111,1);">
						Login
					</div>
				</h2>
				<form id="login_form" class="ui large form">
					<div class="ui stacked segment">
						<div class="field">
							<div class="ui left icon input">
								<i class="user icon"></i>
								<input style="color:rgba(81,98,111,1);" type="username" name="username" id="proid" placeholder="아이디">
							</div>
							<div class="ui left icon input">
								<i class="lock icon"></i>
								<input style="color:rgba(81,98,111,1);" type="password" name="password" id="propw" placeholder="비밀번호">
							</div>
						</div>
						<div id="login_btn" class="ui fluid large teal submit button" style="background:rgba(81,98,111,1);">Login</div>
						<div style="margin:10px 0 10px 0; width:262px; font-size:11px; color:#00B5AD;  text-align:center;" id="login-result"></div>
					</div>
				</form>

			</div>
		</div>
	</article>
</article>

<!-- join box -->



<article  class="footer-box" style="width:750px; margin:-175px 0 0 -375px; height:70px; bottom:0; margin:-175px 0 0 -375px;  position:absolute; left:50%;">
	<article style=" width:100%; padding-bottom: 50px;">
		<div id="footer-wrapper" style="background-color:rgb(255, 255, 255); background-image: none;">
			<ul class="menu" style="text-align: center;" >
				<li><img src="../static/img/support1.png"  /></li>
				</br>
				</br>
				<p>Copyright &copy; 2017 레오와 별이 (SSG). All rights reserved.</p>
			</ul>


		</div>
	</article>
</article>
<!-- <div id="footer" style="position: absolute; bottom: 0; width: 100%; height:50px; ">

</div> -->
</body>


<!-- Script -->



	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>
	<script>




	$("#login_btn").on("click", function(){
		login();
	});



	function login(){
		var proid = $("#proid").val();
		var propw = $("#propw").val();
		var data = new FormData();
		data.append("proid", proid);
		data.append("propw", propw);
		$.ajax({
			type: "POST",
			url: "../db/prologin.php",
			data: data,
			dataType: "json",
			processData: false,
			contentType: false,
			success: function(data) {
				if (data.status === "success") {
					location.href = "./promain.php";
				} else {
					$("#login-result").html(data['reason']);
				}
			}
		});
	}




	</script>


</html>
