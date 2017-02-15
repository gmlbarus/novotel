<?php
session_start();
include '../../login/hub.php';
$nama = mysql_real_escape_string($_POST['nama']);
$un = mysql_real_escape_string($_POST['un']); $un=str_replace(' ','_',$un);
$jk = mysql_real_escape_string($_POST['jk']);
$alamat = mysql_real_escape_string($_POST['alamat']);
$tgl = mysql_real_escape_string($_POST['tgl']);
$email = mysql_real_escape_string($_POST['email']);
$hp= mysql_real_escape_string($_POST['phone']);
$pk = mysql_real_escape_string($_POST['pekerjaan']);
$id = mysql_real_escape_string($_POST['idx']);
	if(!empty($id)){
		if((empty($nama) or empty($alamat)) or (empty($jk) or empty($email))){echo "kosong";}
		elseif(empty($hp)or empty($tgl)){echo "kosong";}
		else{
			$query_simpan=mysql_query("update pelanggan 
				set nama='$nama',
				username='$un',
				tgl_lahir='$tgl',
				pekerjaan='$pk',
				jenis_kelamin='$jk',
				alamat='$alamat',
				no_hp='$hp',
				email='$email'
				where id_pelanggan=".$id);
			if($query_simpan){
				$_SESSION['LimasHotel']=$un;
				
			echo "<script>document.location='../../?page=profile';</script>";}
			else{echo mysql_error()."<script>//document.location='../../?page=edit';</script>";}
			}
	}
	else{	
		echo "<script>alert('Cek id');document.location='../../?page=edit';</script>";
	}	
?>