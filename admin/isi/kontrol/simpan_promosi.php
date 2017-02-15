<?php
include '../../../login/hub.php';
$promosi = mysql_real_escape_string($_POST['promosi']);
$sub= mysql_real_escape_string($_POST['sub']);
$ket = mysql_real_escape_string($_POST['ket']);
	if(empty($promosi) or empty($ket) or empty($sub))
	{echo "<script>alert('Data tidak lengkap!');
			document.location='../../?page=input_promosi'
			</script>";
	}
	else
	{
		if($sub=='input'){
			$simpan=mysql_query('insert into promosi values("","'.$promosi.'","'.$ket.'")');
			if($simpan){
				echo "<script>
						document.location='../../?page=promosi';
						</script>";
			}
			else{
				echo "<script>alert('Data tidak berhasil disimpan! ".mysql_error()."');
						document.location='../../?page=input_promosi';
						</script>";
			}
		}
		elseif($sub=='edit'){
			$idf=mysql_real_escape_string($_POST['ms']);
			if(empty($idf)){
				echo 	"<script>alert('Data tidak lengkap!');
						document.location='../../?page=input_promosi'
						</script>";
			}
			else{
				$simpan=mysql_query('update promosi set isi_promosi="'.$promosi.'", keterangan="'.$ket.'" where id_promosi='.$idf);
				if($simpan){
					echo "<script>
						document.location='../../?page=promosi';
						</script>";
				}
				else{
					echo "<script>alert('Data tidak berhasil disimpan!');
						document.location='../../?page=input_promosi';
						</script>";
					//echo $promosi.'a +++ '.$ket. ' +++ '.$sub.mysql_error();
				}
			}
		}
		else {
			echo'gagal '.$sub;
		}
	}
?>