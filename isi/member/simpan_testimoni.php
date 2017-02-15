<?php
include '../../login/hub.php';
$nama = mysql_real_escape_string($_POST['judul']);
$idp = mysql_real_escape_string($_POST['dari']);
$isi = mysql_real_escape_string($_POST['isi']);
$sub= mysql_real_escape_string($_POST['sub']);
	if(empty($nama) or empty($sub))
	{echo "<script>alert('Data tidak lengkap!');
			document.location='../../?page=testimonial'
			</script>";
	}
	if(empty($isi) or empty($idp))
	{echo "<script>alert('Data tidak lengkap!');
			document.location='../../?page=testimonial'
			</script>";
	}
	else
	{
		if($sub=='reply'){
			$simpan=mysql_query('insert into testimonial values("",
							0,now(),"'.$nama.'","'.$isi.'",'.$idp.')');
			if($simpan){
				echo "<script>
						document.location='../../?page=testimonial';
						</script>";
			}
			else{
				echo "<script>alert('Data tidak berhasil disimpan! ".mysql_error()."');
						document.location='../../?page=testimonial';
						</script>";
			}
		}
		else {
			echo'gagal '.$sub;
		}
	}
?>