<?php
include '../../../login/hub.php';
$pengguna = mysql_real_escape_string($_POST['pengguna']);
$sub= mysql_real_escape_string($_POST['sub']);
$kat = mysql_real_escape_string($_POST['kat']);
	if(empty($pengguna) or empty($kat) or empty($sub))
	{echo "<script>alert('Data tidak lengkap!');
			document.location='../../?page=input_pengguna'
			</script>";
	}
	else
	{
		if($sub=='input'){
			$pass=md5($pengguna);
			$simpan=mysql_query('insert into admin values("","'.$pengguna.'","'.$pass.'","'.$kat.'")');
			if($simpan){
				echo "<script>
						document.location='../../?page=pengguna';
						</script>";
			}
			else{
				echo "<script>alert('Data tidak berhasil disimpan! ".mysql_error()."');
						document.location='../../?page=input_pengguna';
						</script>";
			}
		}
		elseif($sub=='edit'){
			$idf=mysql_real_escape_string($_POST['ms']);
			if(empty($idf)){
				echo 	"<script>alert('Data tidak lengkap!');
						document.location='../../?page=edit_pengguna&ms=".$idf."'
						</script>";
			}
			else{
				$simpan=mysql_query('update admin set kategori="'.$kat.'" where id_admin='.$idf);
				if($simpan){
					echo "<script>
						document.location='../../?page=pengguna';
						</script>";
				}
				else{
					echo "<script>alert('Data tidak berhasil disimpan!');
						document.location='../../?page=edit_pengguna&ms=".$idf."';
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