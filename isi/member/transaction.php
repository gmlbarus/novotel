<?php error_reporting(0);
session_start();
	if(!isset($_SESSION['LimasHotel']) or empty($_SESSION['LimasHotel']))
	{
		echo "<script>document.location='?';</script>";
	}
	include 'login/hub.php';
	$query=mysql_query("select * from pelanggan where username='".$_SESSION['LimasHotel']."'");
	if($query)
	{	$get=mysql_fetch_row($query);
		}
	else{ echo'error';
	}
	
	$sql = mysql_query("SELECT * FROM pemesanan join pelanggan where pemesanan.id_pelanggan=pelanggan.id_pelanggan 
		and pemesanan.id_pelanggan=".$get[0]);
	$count=mysql_num_rows($sql);
?>
			<div id="leftBar" style="background: url(img/bg_kiri.png) repeat-y;">
				<ul>
					<li><a href="?page=profile">Profile</a></li>
					<li><a href="?page=testimonial">Testimonial</a></li>
					<li><a href="?page=transaction">Transaction</a></li>
					<li><a href="?page=service">Service</a></li>
				</ul>
			</div>
			<div id="rightContent">
				<h3>Transaction</h3>
				<p class="teks gestteks">Lihat daftar transaksi pemesanan anda.</p>				
				<div class="clear" ></div>
<?php 
	if($count>0){
?>	
				<table class="data">
				<tr class="data">
					<th class="data" width="30px">No</th>
					<th class="data">ID Pemesanan</th>
					<th class="data">Tgl Check In</th>
					<th class="data">Tgl Check Out</th>
					<th class="data">Jumlah Kamar</th>
					<th class="data">Total Bayar</th>
					<th class="data">Status Pembayaran</th>
					<th class="data">Status Konfirmasi</th>
					<th class="data" width="75px">Pilihan</th>
				</tr>
<?php	$no=1;
	while($data=mysql_fetch_array($sql)){
		$kamar=mysql_query("select count(*) from detail_pemesanan where id_pemesanan=".$data[0]);
									$kamar=mysql_fetch_row($kamar);
		echo 	'<tr class="data">
					<td class="data" width="30px">'.$no++.'</td>
					<td class="data" width="85px">'.$data[0].'</td>
					<td class="data" width="100px">'.$data[2].'</td>
					<td class="data" width=100px">'.$data[3].'</td>
					<td class="data" width="100px">'.$kamar[0].'</td>
					<td class="data" width="100px" style="text-align:right">Rp '.number_format($data[6],0,',','.').'</td>
					<td class="data">'.$data[4].'</td>
					<td class="data">'.$data[5].'</td>
					<td class="data" style="text-align:left" width="95px">
					<center>';
		if($data[5]=='belum dikonfirmasi'){
		echo	'
					<a href="isi/kontrol/konfirmasi.php?ms='.$data[0].'"><img src="mos-css/img/oke.png"> Konfirmasi</a>&nbsp;&nbsp;&nbsp;';
		
		}
		echo '
					<a href="?page=detail_pemesanan&ms='.$data[0].'"><img src="mos-css/img/detail.png"> Detail</a>
				
					</center>
					</td>
						
					</div>
					';
		}
	}
?>			</table>
			<pre>* Jika pemesanan anda dibatalkan oleh admin dan anda telah membayar uang. Segera hubungi admin via testimonial.</pre>
			<pre>** Anda sudah harus melunasi tagihan anda sehari sebelum tanggal check in yang anda ajukan.</pre>
			<div class="clear" ></div>
			</div>
