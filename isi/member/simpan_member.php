<?php
include '../../login/hub.php';
$nama = mysql_real_escape_string($_POST['nama']);
$un = mysql_real_escape_string($_POST['un']); $un=str_replace(' ','_',$un);
$p1 = mysql_real_escape_string($_POST['pswd1']);
$p2 = mysql_real_escape_string($_POST['pswd2']);
$jk = mysql_real_escape_string($_POST['jk']);
$alamat = mysql_real_escape_string($_POST['alamat']);
$tgl = mysql_real_escape_string($_POST['tgl']);
$email = mysql_real_escape_string($_POST['email']);
$hp= mysql_real_escape_string($_POST['phone']);
$pesan= mysql_real_escape_string($_POST['pesan']);
	if((empty($nama) or empty($alamat)) or (empty($jk) or empty($email))){echo "kosong";}
	elseif((empty($hp)or empty($tgl))or(empty($p1)or empty($p2))){echo "kosong";}
	else{
		$query_cek_un=mysql_query("select * from pelanggan where username='$un'");$hasil_cek=mysql_num_rows($query_cek_un);
		if($hasil_cek==1){die("data sudah ada");}
		if($p1!=$p2){die("password '$p1' password beda '$p2'");}$pass=md5(md5($p1));
		$query_simpan=mysql_query("insert into pelanggan values('','$nama','$un','$tgl','$jk','$alamat','$hp','$email','$pass',50)");
		if($query_simpan){$_SESSION['LimasHotel']=$un;
			if($pesan==1){
				echo "<script>document.location='../../?page=preview_pemesanan';</script>";
			}
			else{
				echo "<script>alert('sukses! silahkan login!');document.location='../../?page=signin';</script>";}
			}
		else{echo mysql_error()."<script>//document.location='../../?page=signup';</script>";}

	}


	
	
?>
