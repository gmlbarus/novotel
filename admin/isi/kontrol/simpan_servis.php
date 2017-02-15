<?php
include '../../../login/hub.php';
$servis = mysql_real_escape_string($_POST['servis']);
$sub= mysql_real_escape_string($_POST['sub']);
	if(empty($servis) or empty($sub))
	{echo "<script>alert('Data tidak lengkap!');
			document.location='../../?page=input_servis'
			</script>";
	}
	else
	{
		if($sub=='input'){
			$simpan=mysql_query('insert into service values("","'.$servis.'")');
			if($simpan){
				echo "<script>
						document.location='../../?page=servis';
						</script>";
			}
			else{
				echo "<script>alert('Data tidak berhasil disimpan! ".mysql_error()."');
						document.location='../../?page=input_servis';
						</script>";
			}
		}
		elseif($sub=='edit'){
			$idf=mysql_real_escape_string($_POST['ms']);
			if(empty($idf)){
				echo 	"<script>alert('Data tidak lengkap!');
						document.location='../../?page=edit_servis&ms=".$idf."'
						</script>";
			}
			else{
				$simpan=mysql_query('update service set deskripsi="'.$servis.'" where id_servis='.$idf);
				if($simpan){
					echo "<script>
						document.location='../../?page=servis';
						</script>";
				}
				else{
					echo "<script>alert('Data tidak berhasil disimpan!');
						document.location='../../?page=edit_servis&ms=".$idf."';
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