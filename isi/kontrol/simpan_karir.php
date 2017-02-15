<?php
include '../../login/hub.php';
session_start();
// if(empty($_SESSION['LimasHotel']) or !isset($_SESSION['LimasHotel'])){
	// echo '<script>document.location="../../"</script>';
// }
// if(empty($_SESSION['pesan']) or !isset($_SESSION['pesan'])){
	// echo "kosong".$_SESSION['pesan'];
// }
// else
{
		//$getUn=mysql_query("select id_pelanggan, poin from pelanggan WHERE username='".$_SESSION['LimasHotel']."'");
		// $Un=mysql_fetch_row($getUn);
		// $data=$_POST['id_kamar'];
		
		// $q=count($data);
		$name = mysql_real_escape_string($_POST['name']);
		$room = mysql_real_escape_string($_POST['room']);
		$phone = mysql_real_escape_string($_POST['phone']);
		$pilih = mysql_real_escape_string( implode(",",$_POST['pilih']) );
		if(empty($name) or empty($room) or empty($phone) ){
			die('<script>document.location="../../?page=karir"</script>');
		}
		
		$query_simpan=mysql_query("insert into laundry
			values('$name',$room,$phone,'$pilih')");
		if($query_simpan){
			$_SESSION['result'] = $_POST;
			header("Location: ../input_laundry.php");
		// $query_lihat=mysql_query("select * from pemesanan where
			// id_pelanggan='".$Un[0]."' and tgl_check_in='".$tgl1."' and tgl_check_out='".$tgl2."' and status_pembayaran='belum lunas' and total_bayar='".$total."' order by id_pemesanan desc");
			// $id_pemesanan=mysql_fetch_row($query_lihat);
			// for($no=0;$no<$q;$no++){
				// $querydetail=mysql_query('insert into detail_pemesanan values("",'.$id_pemesanan[0].','.$data[$no].')');
				// if(!$querydetail){
					// $hapusdetail=mysql_query("delete from detail_pemesanan where
					// id_pemesanan=".$id_pemesanan[0]);
					// $hapus=mysql_query("delete from pemesanan where
					// id_pemesanan=".$id_pemesanan[0]);
					// echo '<script>alert("Gagal menyimpan data! '.mysql_error().'");//document.location="../../?page=kamar"</script>';
					// break;
				// }
				// else{
					// echo '<script>document.location="../../?page=detail_pemesanan&ms='.$id_pemesanan[0].'"</script>';
				// }
			// }
			// unset($_SESSION['pesan']);
			// unset($_SESSION['kelas']);
			// unset($_SESSION['tanggal']);
		}
		else{echo mysql_error();}
	}
?>