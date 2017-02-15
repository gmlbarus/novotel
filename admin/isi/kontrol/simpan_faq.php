<?php
include '../../../login/hub.php';
$tanya = mysql_real_escape_string($_POST['tanya']);
$sub= mysql_real_escape_string($_POST['sub']);
$isi = mysql_real_escape_string($_POST['isi']);
	if(empty($tanya) or empty($isi) or empty($sub))
	{echo "<script>alert('Data tidak lengkap!');
			document.location='../../?page=input_faq'
			</script>";
	}
	else
	{
		if($sub=='input'){
			$simpan=mysql_query('insert into faq values("","'.$tanya.'","'.$isi.'")');
			if($simpan){
				echo "<script>
						document.location='../../?page=faq';
						</script>";
			}
			else{
				echo "<script>alert('Data tidak berhasil disimpan! ".mysql_error()."');
						document.location='../../?page=input_faq';
						</script>";
			}
		}
		elseif($sub=='edit'){
			$idf=mysql_real_escape_string($_POST['ms']);
			if(empty($idf)){
				echo 	"<script>alert('Data tidak lengkap!');
						document.location='../../?page=input_faq'
						</script>";
			}
			else{
				$simpan=mysql_query('update faq set isi_faq="'.$tanya.'", solusi="'.$isi.'" where id_faq='.$idf);
				if($simpan){
					echo "<script>
						document.location='../../?page=faq';
						</script>";
				}
				else{
					echo "<script>alert('Data tidak berhasil disimpan!');
						document.location='../../?page=input_faq';
						</script>";
					//echo $tanya.'a +++ '.$isi. ' +++ '.$sub.mysql_error();
				}
			}
		}
		else {
			echo'gagal '.$sub;
		}
	}
?>