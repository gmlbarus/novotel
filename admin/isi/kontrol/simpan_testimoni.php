<?php
include '../../../login/hub.php';
$nama = mysql_real_escape_string($_POST['nama']);
$idp = mysql_real_escape_string($_POST['dari']);
$isi = mysql_real_escape_string($_POST['isi']);
$sub= mysql_real_escape_string($_POST['sub']);
$idf=mysql_real_escape_string($_POST['ms']);
			if(empty($idf)){
				echo 	"<script>alert('Data tidak lengkap!');
						document.location='../../?page=testimoni'
						</script>";
			}
	if(empty($nama) or empty($sub))
	{echo "<script>alert('Data tidak lengkap!');
			document.location='../../?page=reply_testimoni'
			</script>";
	}
	if(empty($isi) or empty($idp))
	{echo "<script>alert('Data tidak lengkap!');
			document.location='../../?page=reply_testimoni'
			</script>";
	}
	else
	{
		if($sub=='reply'){
			$simpan=mysql_query('insert into testimonial values("",
							"'.$idf.'",now(),"'.$nama.'","'.$isi.'",'.$idp.')');
			if($simpan){
				echo "<script>
						document.location='../../?page=testimoni';
						</script>";
			}
			else{
				echo "<script>alert('Data tidak berhasil disimpan! ".mysql_error()."');
						document.location='../../?page=input_testimonial&ms=".$idf."';
						</script>";
			}
		}
		else {
			echo'gagal '.$sub;
		}
	}
?>