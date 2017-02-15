<?php
include '../../login/hub.php';
$nama = mysql_real_escape_string($_POST['nama']);
$alamat = mysql_real_escape_string($_POST['alamat']);
$pekerjaan = mysql_real_escape_string($_POST['pekerjaan']);
$email = mysql_real_escape_string($_POST['email']);
$hp= mysql_real_escape_string($_POST['phone']);
$komen= mysql_real_escape_string($_POST['komentar']);
	if((empty($nama) or empty($alamat)) or (empty($pekerjaan) or empty($email)))
	{echo "<script>alert('Data tidak lengkap!');
			document.location='../../?page=guestbook'
			</script>";
	}
	if(empty($hp)or empty($komen))
	{echo "<script>alert('Data tidak lengkap!');
			document.location='../../?page=guestbook'
			</script>";
	}
	else
	{
			$simpan=mysql_query('insert into guestbook values("",
							"'.$nama.'"
							,"'.$alamat.'"
							,"'.$pekerjaan.'"
							,"'.$email.'"
							,"'.$hp.'"
							,"'.$komen.'"
							,"hide")');
			if($simpan){
				echo "<script>
						document.location='../../?page=guestbook';
						</script>";
			}
			else{
				echo "<script>alert('Data tidak berhasil disimpan! ".mysql_error()."');
					//	document.location='../../?page=input_kamar';
						</script>";
			}
	}
?>