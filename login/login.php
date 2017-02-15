<?php

session_start();
require_once 'hub.php';

$Nama=mySQL_escape_string($_POST['username']);
$Sndi=mySQL_escape_string($_POST['password']);
$Sandi=md5($Sndi);
$login='select * from admin where username="'.$Nama.'"';

$cek=mysql_query($login);
$hasil=mysql_fetch_row($cek);


if($Nama==$hasil['1'] && $Sandi==$hasil['2'])
{	
	$_SESSION['admin-limas']=$Nama;
	?>
		<script language=javascript>
		document.location.href="../admin";</script> 
	<?php 
} 
else
{
	echo ' <script>alert("Login gagal! ");document.location.href="../login"</script>';
}

?>