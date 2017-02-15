<?php
//include '../../../login/hub.php';
$sms = mysql_real_escape_string(strip_tags($_POST['sms']));
$no = mysql_real_escape_string($_POST['no']);
$sub= mysql_real_escape_string($_POST['sub']);
	if(empty($sms) or empty($no))
	{echo "<script>alert('Data tidak lengkap!');
			document.location='../../?page=sms'
			</script>";
	}
	else
	{	echo 'nak masuk input';
		if($sub=='input'){
			$sand='';
			$pengg='root';
			$basis='sms-limas';
			$lewat=mySQL_escape_string($sand);
			$lewat2=mySQL_escape_string($pengg);
			$lewat3=mySQL_escape_string($basis);
	
			if($db=mysql_connect("localhost", $lewat2, $lewat))
			{
				mysql_select_db($lewat3, $db) or header('location: ../../../login/error.php');
				echo "sukses";
			}
			else
			{echo "gagal";
				header('location: ../../../login/error.php');
			}
			
			$simpan=mysql_query('insert into outbox(DestinationNumber, TextDecoded,
							CreatorID, Class)
							values("'.$no.'","'.$sms.'","Limas", 0)');
			if($simpan){
				echo "<script>
						document.location='../../?page=sms';
						</script>";
			}
			else{
			echo mysql_error();
				echo "<script>alert('Data tidak berhasil disimpan! ".mysql_error()."');
						document.location='../../?page=sms';
						</script>";
			}
		}
		else {
			echo'gagal '.$sub;
		}
	}
?>