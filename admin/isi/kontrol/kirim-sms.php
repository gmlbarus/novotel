<?php
var_dump($_POST);
//include '../../../login/hub.php';
$sms = strip_tags($_POST['sms']);
$no = $_POST['no'];
$sub= $_POST['sub'];
	if(empty($sms) or empty($no))
	{
		echo "<script>alert('Data tidak lengkap!');
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

			if($db=mysql_connect("localhost", $pengg, $sand))
			{
				mysql_select_db($basis, $db) or header('location: ../../../login/error.php');
				echo "sukses";
			}
			else
			{echo "gagal";
				header('location: ../../../login/error.php');
			}
			$query = sprintf("insert into outbox(DestinationNumber, TextDecoded,
							CreatorID, Class)
							values('%s','%s','Limas', 0)",
            mysql_real_escape_string($no),
            mysql_real_escape_string($sms));
			$simpan = mysql_query($query);

			// $simpan=mysql_query('insert into outbox(DestinationNumber, TextDecoded,
			// 				CreatorID, Class)
			// 				values("'.$no.'","'.$sms.'","Limas", 0)');
			if($simpan){
				// echo "<script>
				// 		document.location='../../?page=sms';
				// 		</script>";
				echo "<script>alert('SMS berhasil terkirim');
					document.location='../../?page=sms'
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
