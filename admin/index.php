<?php
	session_start();
	if(!isset($_SESSION['admin-limas']) or empty($_SESSION['admin-limas']))
	{
		echo'	<script language=javascript>
					document.location.href="../login";
				</script>
			';
	}

?>

<!doctype html>
<html>
<head>
<title>Admin Novotel</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Copyright" content="Limas">
<meta name="description" content="Limas Hotel">
<meta name="keywords" content="Novita">
<meta name="author" content="Novita">
<meta name="language" content="Bahasa Indonesia">

<!-- tiny mce --------------------------------------->
<!-- Place inside the <head> of your HTML -->
<script type="text/javascript" src="../asset/tinymce/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
    selector: "textarea"
 });
</script>

<!-- tiny mce --------------------------------------->
<link rel="shortcut icon" href="stylesheet/img/devil-icon.png"> <!--Pemanggilan gambar favicon-->
<link rel="stylesheet" type="text/css" href="../mos-css/mosadmin-style.css"> <!--pemanggilan file css-->
<link rel="stylesheet" type="text/css" href="../asset/css/admin.css"> <!--pemanggilan file css-->
<!--script type="text/javascript" language="javascript" src="../asset/js/jquery-1.9.0.min.js"></script-->
<script type="text/javascript" language="javascript" src="../asset/js/jquery.js"></script>
<script type="text/javascript">
<!--//---------------------------------+
//  Developed by Roshan Bhattarai
//  Visit http://roshanbh.com.np for this script and more.
//  This notice MUST stay intact for legal use
// --------------------------------->
$(document).ready(function()
{
	//slides the element with class "menu_body" when paragraph with class "menu_head" is clicked
	$("#firstpane p.menu_head").click(function()
    {
		$(this).css({backgroundImage:"url(../asset/images/down2.png)"}).next("div.menu_body").slideToggle(100).siblings("div.menu_body").slideUp("slow");
       	$(this).siblings().css({backgroundImage:"url(../asset/images/left.png)"});
	});
});
</script>
</head>

<body>
	<div id="header">
		<div class="inHeaderLogin">
			<div class="mosAdmin">
			<?php
				echo "Welcome back, ".$_SESSION['admin-limas']." <br>
					<a href='../' target='blank'>Halaman Depan</a> | <a href='../login/logout.php'>Sign Out</a>";
			?>
			</div>
			<div class="clear" ></div>
		</div>
	</div>
	<div id="wrapbody">
		<div id="content">
			<div id="leftBar">
				 <div id="firstpane" class="menu_list"> <!--Code for menu starts here-->
					<p class="menu_head"><?php echo $_SESSION['admin-limas'];?></p>
						<div class="menu_body">
						<a href="?page=username">Ganti username</a>
						<a href="?page=password">Ganti password</a>
						</div>
					<p class="menu_head">Master</p>
						<div class="menu_body">
							<a href="?page=pelanggan">Pelanggan</a>
							<a href="?page=kamar">Kamar</a>
							<a href="?page=servis">Servis</a>
							<a href="?page=promosi">Promosi</a>
							<a href="?page=award">Laundry</a>
							<a href="?page=menumakanan">Menu Makanan</a>
							<a href="?page=guestbook">Guestbook</a>
							<a href="?page=testimoni">Testimoni</a>
							<a href="?page=faq">Faq</a>
							<a href="?page=customer-level">Customer Level</a>
							<!--<a href="?page=pengguna">pengguna</a>-->
							<a href="?page=sms">Sms</a>
						</div>
					<p class="menu_head">Servis</p>
						<div class="menu_body">
						<a href="?page=pembayaran-servis">Pembayaran Servis</a>
						</div>
					<p class="menu_head">Pemesanan</p>
						<div class="menu_body">
						<a href="?page=pemesanan">Pemesanan</a>
						</div>
					<p class="menu_head">Laporan</p>
						<div class="menu_body">
						<a href="?page=laporan-kamar">Laporan Kamar</a>
						<a href="?page=laporan-pemesanan">Laporan Pemesanan</a>
						<a href="?page=laporan-pelanggan">Laporan Pelanggan</a>
						<a href="?page=laporan-sms">Laporan SMS</a>
						</div>
				</div>  <!--Code for menu ends here -->
			</div>
			<div id="rightContent">
				<?php include 'isi/isi.php';?>
				<div class="clear" ></div>
			</div>
			<div class="clear" ></div>
		</div>
		<div class="clear" ></div>
		<div id="footer" class="before">
				<a href="#">Kelompok CRM | Hotel Novotel</a><br>
		</div>

	</div>
</body>
</html>
