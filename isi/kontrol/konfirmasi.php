<?php
include '../../login/hub.php';
session_start();
if(empty($_SESSION['LimasHotel']) or !isset($_SESSION['LimasHotel'])){
	echo '<script>document.location="../../"</script>';
}
else{
		$getUn=mysql_query("select id_pelanggan, poin from pelanggan WHERE username='".$_SESSION['LimasHotel']."'");
		$Un=mysql_fetch_row($getUn);
		$data=$_SESSION['pesan'];

		$ms = mysql_real_escape_string($_GET['ms']);
		if(empty($ms)){
			die('<script>document.location="../../?page=kamar"</script>');
		}
		
		$query_simpan=mysql_query("update pemesanan set status_konfirmasi='dikonfirmasi pelanggan', tgl_pembayaran=now() where status_konfirmasi!='batal' and id_pemesanan=".$ms);
		if($query_simpan){
			$poin=$Un[1]+10;
			$tambah_poin=mysql_query('update pelanggan set poin='.$poin.' where id_pelanggan='.$Un[0]);
			//echo mysql_error();
			echo '<script>document.location="../../?page=detail_pemesanan&ms='.$id_pemesanan[0].'"</script>';
		}
		else{echo mysql_error()."<script>//document.location='../../?page=kamar';</script>";}
}
	
?>