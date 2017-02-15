<?php
include '../../login/hub.php';
session_start();


if((isset($_POST['ps1']) && !empty($_POST['ps1'])) && (isset($_POST['ps2']) && !empty($_POST['ps2']))) 
	{	
		
		if(!isset($_POST['pass']) || empty($_POST['pass'])){
			echo 'check your password!';
		}
		if($_POST['ps1']!=$_POST['ps2']){
			echo 'check your new password!';
		}
			$pw1 = mysql_real_escape_string($_POST['ps1']);
			$pw=md5(md5($pw1));
			$pass1 = mysql_real_escape_string($_POST['pass']);
			$pass = md5(md5($pass1));
			$cari1=mysql_query("select password from pelanggan WHERE username='".$_SESSION['LimasHotel']."'");
			$cari=mysql_fetch_row($cari1);
		
		if($pass==$cari[0]){
			$update=mysql_query("update pelanggan set password='$pw' WHERE username='".$_SESSION['LimasHotel']."'");
			if($update){
				echo '<script>alert("oke");</script>';
				session_destroy();
			}
			else{
				echo '<script>alert("'.mysql_error().'");</script>';
			}
		}
		else{
			echo 'passwordnya salah';
		}
}
else{echo 'gilo '.mysql_error();
}

//echo 'oke';
?>
