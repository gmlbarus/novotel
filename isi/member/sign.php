<?php
error_reporting(0);
session_start();

$aksi = mysql_real_escape_string($_POST['aksi']);
if($aksi=='signin'){
	$un = mysql_real_escape_string($_POST['un']); $un=str_replace(' ','_',$un);
	$p = mysql_real_escape_string($_POST['pass']);
	if(empty($un) or empty($p)){
		die("Data kosong");
	}
	include '../../login/hub.php';
	$query_cek_un=mysql_query("select * from pelanggan where username='$un'");
	$hasil_cek=mysql_fetch_row($query_cek_un);
	$p=md5(md5($p));
	if($un==$hasil_cek[2] and $p==$hasil_cek[8])
	{
		$_SESSION['LimasHotel']=$un;
		if(isset($_POST['pesan']) && $_POST['pesan']==1){
			echo "<script>document.location='../../?page=preview_pemesanan';</script>";
		}else{
			echo "<script>document.location='../../?page=member';</script>";
		}
	}
	else{
		//echo $p.' = '.$hasil_cek[8];
		echo "<script>alert('gagal'".mysql_error().");document.location='../../?page=signin';</script>";
	}
}	
else{
	session_destroy();
	echo "<script>document.location='../../?page=signin';</script>";
}
?>