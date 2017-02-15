<?php 
error_reporting(0);
session_start();
	if(!isset($_SESSION['LimasHotel']) or empty($_SESSION['LimasHotel']))
	{
		echo "<script>document.location='?';</script>";
	}
	include 'login/hub.php';
			mysql_query("SET group_concat_max_len = 2048");
			$poin=mysql_query("select poin from pelanggan where username='".$_SESSION['LimasHotel']."'");
			$data=mysql_fetch_row($poin);
			$pesan=mysql_query("select * from pemesanan, pelanggan where pemesanan.id_pelanggan=pelanggan.id_pelanggan and username='".$_SESSION['LimasHotel']."'");
			$pesan=mysql_fetch_row($pesan);
			$clset=mysql_query("SELECT GROUP_CONCAT(  `poin`order by poin desc SEPARATOR  ', ' ) ,
								GROUP_CONCAT(  `nama_cl` order by poin desc SEPARATOR  ', ' ) 
								FROM customer_level");
			$cl=mysql_fetch_row($clset);
			$cek=implode(',', array($cl[0],0));	$poin=explode(",",$cek);
			$nama=explode(",",$cl[1]);
			
			$j=count($poin)-1;
			for($i=count($poin)-2;$i>=0;$i--)
			{	
				if( $data[0]>=$poin[$j]+1 and $data[0]<=$poin[$i]){
					$cl=$nama[$j-1];break;
				}									
				else if($data[0]>=$poin[0]){
					echo $cl=$nama[0];break;
				}$j--;
			}		
		?>


			<div id="leftBar" style="background: url(img/bg_kiri.png) repeat-y;">
				<ul>
					<li><a href="?page=profile"><font color="White">Profile</a></li></font>
					<li><a href="?page=testimonial"><font color="White">Testimonial</a></li></font>
					<li><a href="?page=transaction"><font color="White">Transaction</a></li></font>
					<li><a href="?page=service"><font color="White">Service</a></li></font>
				</ul>
			</div>
			<div id="rightContent">
			<h3>Member Area</h3>
				<p class="teks gestteks">See your order history, confirm your order, and configure anything like password or your profile.</p>				
				<div class="clear" ></div>
		
		<div id="smallRight"><h3>Informasi tentang anda</h3>
		<table style="border: none;font-size: 12px;color: #5b5b5b;width: 100%;margin: 10px 0 10px 0;">
			<tr><td style="border: none;padding: 4px;">POIN</td><td style="border: none;padding: 4px;"><b><?php echo $data[0];?></b></td></tr>
			<tr><td style="border: none;padding: 4px;">Customer Level</td><td style="border: none;padding: 4px;"><b><?php echo $cl ?></b></td></tr>
			<tr><td style="border: none;padding: 4px;">Tanggal Pembayaran Terakhir</td><td style="border: none;padding: 4px;"><b><?php echo $pesan[7]?></b></td></tr>
			<tr><td style="border: none;padding: 4px;">Tanggal Check In Terakhir</td><td style="border: none;padding: 4px;"><b><?php echo $pesan[2]?></b></td></tr>
		</table>
		</div>
		<div id="smallRight"><h3>Informasi tentang anda</h3>
		
		<table style="border: none;font-size: 12px;color: #5b5b5b;width: 100%;margin: 10px 0 10px 0;">
			<tr><td style="border: none;padding: 4px;">Total Bayar Pesan Terakhir</td><td style="border: none;padding: 4px;"><b>Rp <?php echo number_format($pesan[6],0,',','.')?></b></td></tr>
			<tr><td style="border: none;padding: 4px;">Status Konfirmasi Terakhir</td><td style="border: none;padding: 4px;"><b><?php echo $pesan[5]?></b></td></tr>
			<tr><td style="border: none;padding: 4px;">Status Pembayaran Terakhir</td><td style="border: none;padding: 4px;"><b><?php echo $pesan[4]?></b></td></tr>
			<tr><td style="border: none;padding: 4px;">Tanggal Check Out Terakhir</td><td style="border: none;padding: 4px;"><b><?php echo $pesan[3]?></b></td></tr>
		</table>
		</div>
		
		

</div>
