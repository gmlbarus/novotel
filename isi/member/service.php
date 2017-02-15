<?php 
error_reporting (0);
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
	
	$sql = mysql_query("SELECT * FROM pemakaian_servis join pelanggan where pemakaian_servis.id_pelanggan=pelanggan.id_pelanggan 
		and pemakaian_servis.id_pelanggan=".$get[0]);
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
				<h3>Service</h3>
				<p class="teks gestteks">Lihat daftar transaksi servis yang Anda gunakan.</p>				
				<div class="clear" ></div>
<?php 
	if($count>0){
?>	
				<table class="data">
				<tr class="data">
					<th class="data" width="30px">No</th>
					<th class="data">ID Servis</th>
					<th class="data">Tanggal Pembayaran</th>
					<th class="data">Total Bayar</th>
					<th class="data" width="75px">Pilihan</th>
				</tr>
<?php	$no=1;
	while($data=mysql_fetch_array($sql)){
		$kamar=mysql_query("select count(*) from detail_pemesanan where id_pemesanan=".$data[0]);
									$kamar=mysql_fetch_row($kamar);
		echo 	'<tr class="data">
					<td class="data" width="30px">'.$no++.'</td>
					<td class="data" width=100px">'.$data[0].'</td>
					<td class="data" width=100px">'.$data[3].'</td>
					<td class="data" width="100px" style="text-align:right">Rp '.number_format($data[2],0,',','.').'</td>
					<td class="data" style="text-align:left" width="95px">
					<center>
					<a href="?page=detail_pemakaian&ms='.$data[0].'"><img src="mos-css/img/detail.png"> Detail</a>
				
					</center>
					</td>
						
					</div>
					';
		}
	}
?>			</table>
			<pre>* Ini merupakan salinan catatan pemakaian transaksi servis anda.</pre>
			<div class="clear" ></div>
			</div>
