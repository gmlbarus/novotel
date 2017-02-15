<?php
include '../../login/hub.php';
session_start();
if(empty($_SESSION['LimasHotel']) or !isset($_SESSION['LimasHotel'])){
	echo '<script>document.location="../../"</script>';
}
if(empty($_SESSION['pesan']) or !isset($_SESSION['pesan'])){
	echo "kosong".$_SESSION['pesan'];
}
else{
		$getUn=mysql_query("select id_pelanggan, poin from pelanggan WHERE username='".$_SESSION['LimasHotel']."'");
		$Un=mysql_fetch_row($getUn);
		$data=$_SESSION['pesan'];
		$q=count($data);
		
		$tgl1 = mysql_real_escape_string($_POST['tgl1']);
		$tgl2 = mysql_real_escape_string($_POST['tgl2']);
		$total = mysql_real_escape_string(str_replace('.','',$_POST['total']));
		$totalkamar = mysql_real_escape_string($_POST['totalkamar']);
		$lama = mysql_real_escape_string($_POST['lama']);
		if(empty($tgl1) or empty($tgl1) or empty($total) or empty($totalkamar) or empty($lama)){
			die('<script>document.location="?page=kamar"</script>');
		}
		
		$query_simpan=mysql_query("insert into pemesanan 
			values('','$Un[0]','$tgl1','$tgl2','belum lunas','belum dikonfirmasi','$total','')");
		if($query_simpan){
		$query_lihat=mysql_query("select * from pemesanan where
			id_pelanggan='".$Un[0]."' and tgl_check_in='".$tgl1."' and tgl_check_out='".$tgl2."' and status_pembayaran='belum lunas' and total_bayar='".$total."' order by id_pemesanan desc");

			$id_pemesanan=mysql_fetch_row($query_lihat);
			for($no=2;$no<$q;$no++){
				$querydetail=mysql_query('insert into detail_pemesanan values("",'.$id_pemesanan[0].','.$data[$no].')');
				if(!$querydetail){
					$hapusdetail=mysql_query("delete from detail_pemesanan where
					id_pemesanan=".$id_pemesanan[0]);
					$hapus=mysql_query("delete from pemesanan where
					id_pemesanan=".$id_pemesanan[0]);
					echo '<script>alert("Gagal menyimpan data!");document.location="../../?page=kamar"</script>';
					break;
				}
				else{
					echo '<script>document.location="../../?page=detail_pemesanan&ms='.$id_pemesanan[0].'"</script>';
				}
			}
			unset($_SESSION['pesan']);
		}
		else{echo mysql_error()."<script>//document.location='../../?page=kamar';</script>";}
	}
?>