<?php session_start();
	if(isset($_SESSION['admin-limas']) && !empty($_SESSION['admin-limas']))
	{
		echo 	"<script type='text/javascript'>
					document.location='../admin';
				</script>";
	}
?>

<!doctype html>
<html>
<head>
<title>Admin Hotel Novotel</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Copyright" content="Limas">
<meta name="description" content="Limas Hotel">
<meta name="keywords" content="Novita">
<meta name="author" content="Novita">
<meta name="language" content="Bahasa Indonesia">

<link rel="shortcut icon" href="stylesheet/img/devil-icon.png"> <!--Pemanggilan gambar favicon-->
<link rel="stylesheet" type="text/css" href="../mos-css/mos-style.css"> <!--pemanggilan file css-->
</head>

<body>
<div id="header">
	<div class="inHeaderLogin"></div>
</div>

<div id="loginForm">
	<div class="headLoginForm">
	Login Administrator
	</div>
	<div class="fieldLogin">
	<form method="POST" action="login.php">
	<label>Username</label><br>
	<input type="text" class="login" name='username' id='username' required maxlength='10'><br>
	<label>Password</label><br>
	<input type="password" class="login" name='password' id='password' required maxlength='20'><br>
	<input type="submit" class="button" value="Login">
	</form>
	</div>
</div>
</body>
</html>