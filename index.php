<?
error_reporting(0);
?>
<!doctype html>
<html>
<head>
<title>Hotel Novotel</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Copyright" content="Limas.com">
<meta name="description" content="Limas">
<meta name="keywords" content="Limas Hotel">
<meta name="author" content="Novita">
<meta name="language" content="Bahasa Indonesia">
<!-- Banner --------------------------------------------------->
	<script type="text/javascript" src="asset/js/jquery-1.9.0.min.js"></script>
    <script type="text/javascript" src="asset/js/jquery.nivo.slider.js"></script>
    <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
    </script>

<!-- Gallery --------------------------------------------------->
<!-- Add mousewheel plugin (this is optional) -->
	<script type="text/javascript" src="asset/fancy/jquery.mousewheel-3.0.6.pack.js"></script>

	<!-- Add fancyBox main JS and CSS files -->
	<script type="text/javascript" src="asset/fancy/source/jquery.fancybox.js?v=2.1.5"></script>
	<link rel="stylesheet" type="text/css" href="asset/fancy/source/jquery.fancybox.css?v=2.1.5" media="screen" />

	<script type="text/javascript">
	$(document).ready(function() {
		$(".fancybox").fancybox();
	});
	</script>
<!-- Gallery --------------------------------------------------->

	<link rel="stylesheet" href="asset/css/nivo-slider.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="asset/css/default/default.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="asset/css/light/light.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="asset/css/dark/dark.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="asset/css/bar/bar.css" type="text/css" media="screen" />

<link rel="shortcut icon" href="stylesheet/img/logo.jpg"> <!--Pemanggilan gambar favicon-->
<link rel="stylesheet" type="text/css" href="mos-css/mos-style.css"> <!--pemanggilan file css-->
</head>

<body>
	<div id="header">
		<div class="inHeader">
			<div class="mosAdmin">
			<?php session_start();
				if(isset($_SESSION['LimasHotel']) or !empty($_SESSION['LimasHotel']))
				{ //$_RESULT=str_replace("submit","perpus",$_SERVER['PHP_SELF']);
					echo "Welcome, ".$_SESSION['LimasHotel']." <br>
						<a href='?page=member'>Member Area</a> | <a href='isi/member/sign.php'>Sign Out</a>";
				}
				else
				{
					echo "Welcome, Guest<br>
					<a href='?page=signin'>Sign In</a> | <a href='?page=signup'>Sign Up</a>";
				}?>
			</div>
			<div class="clear" ></div>
		</div>
	</div>

	<div class="wrapbody">
		<div class="aaa">  
			<div id="wrapper">
				<div id="centerBar"></div>
				<div class="slider-wrapper theme-bar">
					<div id="slider" class="nivoSlider">
						<img src="asset/images/n1.jpg" data-thumb="images/up.jpg" alt="" /></a>
						<img src="asset/images/logo1.gif" data-thumb="asset/images/toystory.jpg" alt="" /></a>
						<img src="asset/images/n2.jpg" data-thumb="images/up.jpg" alt="" /></a>					
						<img src="asset/images/dpn.jpg" data-thumb="asset/images/walle.jpg" alt="" data-transition="slideInLeft" />
						<!--<img src="asset/images/novotel.jpg" data-thumb="asset/images/nemo.jpg" alt="" title="#htmlcaption" />-->
					
				</div>
			</div>
			
			<ul id="mainMenu">
					<li><b><a href='?'>About Novotel</a></li>
					<li><a href='?page=room_n_rate'>Hotel Facilities</a></li>
					<li><a href='?page=promo'>Promotion</a></li>
					<li><a href='?page=customer_servis'>Customer Service</a></li>
					<li><a href='?page=lokasi'>Location</a></li>
					<li><a href='?page=info'>Contact Us</a></li>
				
			</ul>
			
		</div>
			<div class="clear" ></div>
			<div id="content">
				<!-- bagian isi 	-->
				<?php include 'isi/isi.php';?>
					<div class="clear" ></div>
			</div>
			<div class="clear" ></div>
			<div id="foot"><div>
			<div class="footer before"><div>
				<p>Find Rooms & Rate
				<a href='?page=kamar' class='button' id="find" name="find" style="background:black;margin-top:-4px" width="300" value="reserve rooms now">Reserve Room Now</a>
				</p>
				<div class='share'>
					<a href="http://www.facebook.com" target="_blank">Facebook |<a href="http://www.twitter.com" target="_blank"> Twitter |<a href="http://www.path.com" target="_blank"> Path</a>
				</div>
			</div>
			<div class="footer">
				Kelompok CRM | Hotel NOVOTEL </a> 
			</div></div>
	</div>
</body>
</html>