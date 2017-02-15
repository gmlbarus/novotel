<?php
include '../../../login/hub.php';
$nama = mysql_real_escape_string($_POST['nama']);
$poin = mysql_real_escape_string($_POST['poin']);
$sub= mysql_real_escape_string($_POST['sub']);
	if((empty($nama) or empty($sub)) or (empty($poin)))
	{echo "<script>alert('Data tidak lengkap!');
			document.location='../../?page=input_cl'
			</script>";
	}
	else
	{
		if($sub=='input'){
			$simpan=mysql_query('insert into customer_level values("","'.$nama.'","'.$poin.'")');
			if($simpan){
				echo "<script>
						document.location='../../?page=customer-level';
						</script>";
			}
			else{
				echo "<script>alert('Data tidak berhasil disimpan! ".mysql_error()."');
						document.location='../../?page=input_cl';
						</script>";
			}
		}
		elseif($sub=='edit'){
			$idf=mysql_real_escape_string($_POST['ms']);
			if(empty($idf)){
				echo 	"<script>alert('Data tidak lengkap!');
						document.location='../../?page=edit_cl&ms=".$idf."'
						</script>";
			}
			else{
				$simpan=mysql_query('update customer_level set 
									 nama_cl="'.$nama.'"
									, poin='.$poin.'
									where id_cl='.$idf);
				if($simpan){
					echo "<script>
						document.location='../../?page=customer-level';
						</script>";
				}
				else{
					echo mysql_error();
					echo "<script>alert('Data tidak berhasil disimpan!');
						document.location='../../?page=edit_cl&ms=".$idf."';
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