<?php
include '../../../login/hub.php';
$idp = mysql_real_escape_string($_POST['idp']);
$total = mysql_real_escape_string($_POST['total']);
$sub= mysql_real_escape_string($_POST['sub']);
	if((empty($idp) or empty($sub)) or empty($total))
	{echo "<script>alert('Data tidak lengkap!');
			document.location='../../?page=input_pemakaian'
			</script>";
	}
	else
	{	$i=0;
		foreach($_POST['servis'] as $servis[]){
			echo $servis[$i].' -- ';$i++;
		}$i=0;echo' <br>';
		foreach($_POST['harga'] as $harga[]){
			echo $harga[$i].' -- ';$i++;
		}echo' <br>';
		if($sub=='input'){
			$simpan=mysql_query('insert into pemakaian_servis values("","'.$idp.'","'.$total.'",now())');
			if($simpan){
				$id_pakai=mysql_query('SELECT * FROM pemakaian_servis WHERE id_pelanggan = "'.$idp.'"
								AND  `total_bayar` ="'.$total.'" ORDER BY `id_pemakaian`');
				$id_pemakaian=mysql_fetch_row($id_pakai);
				$j=0;
				foreach($servis as $dataservis[]){
					$simpandetail=mysql_query('insert into detail_pemakaian values("",'.$id_pemakaian[0].','.$dataservis[$j].','.$harga[$j].')');
					if($simpandetail){
						$j++;
					}
					else{
						break;
						die( 	"<script>alert('Gagal menyimpan data!');
								document.location='../../?page=input_pemakaian'
								</script>");
					}
				}
				
				echo "<script>
					document.location='../../?page=pembayaran-servis';
						</script>";
			}
			else{
				echo "<script>alert('Data tidak berhasil disimpan! ".mysql_error()."');
					//	document.location='../../?page=input_pemakaian';
						</script>";
			}
		}
		elseif($sub=='edit'){
			$idf=mysql_real_escape_string($_POST['ms']);
			if(empty($idf)){
				echo 	"<script>alert('Data tidak lengkap!');
						document.location='../../?page=edit_pemakaian&ms=".$idf."'
						</script>";
			}
			else{
				echo $idf;
				$simpan=mysql_query('update pemakaian_servis set total_bayar="'.$total.'" where id_pemakaian='.$idf);
				if($simpan){
					$detail=mysql_query('delete from detail_pemakaian where id_pemakaian='.$idf);
					if($detail){
						$j=0;
						foreach($servis as $dataservis[]){
							$simpandetail=mysql_query('insert into detail_pemakaian values("",'.$idf.','.$dataservis[$j].','.$harga[$j].')');
							if($simpandetail){
								$j++;
							}
							else{
								break;
								die( 	"<script>alert('Gagal menyimpan data!');
										document.location='../../?page=edit_pemakaian&ms=".$idf."'
										</script>");
							}
							
						}
				
						echo "<script>
							document.location='../../?page=pembayaran-servis';
								</script>";
					}
				}
				else{
					echo "<script>alert('Data tidak berhasil disimpan!');
						document.location='../../?page=edit_pemakaian&ms=".$idf."';
						</script>";
				}
			}
		}
		else {
			echo'gagal '.$sub;
		}
	}
?>