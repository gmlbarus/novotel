<?php error_reporting(0);
 session_start();
	if(!isset($_SESSION['LimasHotel']) or empty($_SESSION['LimasHotel']))
	{
		echo "<script>document.location='?';</script>";
	}
	include 'login/hub.php';
	$query=mysql_query("select * from pelanggan where username='".$_SESSION['LimasHotel']."'");
	if($query)
	{	$get=mysql_fetch_row($query);
		}
	else{ echo'error';
	}
?>
		<script src="asset/photo/js/jquery.knob.js"></script>
		<link href="asset/photo/css/style.css" rel="stylesheet" />
		<!-- jQuery File Upload Dependencies -->
		<script src="asset/photo/js/jquery.ui.widget.js"></script>
		<script src="asset/photo/js/jquery.iframe-transport.js"></script>
		<script src="asset/photo/js/jquery.fileupload.js"></script>
		
		<!-- Our main JS file -->
		<script src="asset/photo/js/script.js"></script>
			<div id="leftBar" style="background: url(img/bg_kiri.png) repeat-y;">
				<ul>
					<li><a href="?page=profile">Profile</a></li>
					<li><a href="?page=edit">Edit Profile</a></li>
					<li><a href="?page=password">Edit Password</a></li>
					<li><a href="?page=testimonial">Testimonial</a></li>
					<li><a href="?page=transaction">Transaction</a></li>
					<li><a href="?page=service">Service</a></li>
				</ul>
			</div>
			<div id="rightContent">
				<h3>Edit photo</h3>
				<p class="teks gestteks">Change your photo.</p>				
				<div class="clear" ></div>
				<form id="upload" method="post" action="isi/member/simpan_foto.php" enctype="multipart/form-data">
					<div id="drop">
						Masukan Foto Anda
						<a>Browse</a>
						<input type="file" name="upl" multiple />
					</div>
					<ul>
					<!-- The file uploads will be shown here -->
					</ul>
				</form>
			</div>
