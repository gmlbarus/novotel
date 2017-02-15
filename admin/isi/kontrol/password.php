<?php
require '../../../login/hub.php';
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
			$pw=md5($pw1);
			$pass1 = mysql_real_escape_string($_POST['pass']);
			$pass = md5($pass1);
			$cari1=mysql_query("select password from admin WHERE username='".$_SESSION['admin-limas']."'");
			$cari=mysql_fetch_row($cari1);
		
		if($pass==$cari[0]){
			$update=mysql_query("update admin set password='$pw' WHERE username='".$_SESSION['admin-limas']."'");
			if($update){
				echo 'oke';
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


//echo 'oke';
?>
