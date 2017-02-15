<script type="text/javascript" src="asset/js/zebra_datepicker.js"></script>
<link rel="stylesheet" href="asset/css/default.css" type="text/css">
<script type="text/javascript">
$(document).ready(function() {
	document.getElementById('tgl2').value=document.getElementById('tgl').value;
	$('#tgl').Zebra_DatePicker({ show_week_number: 'Wk',
	direction: ['<?php echo date("Y-m-d");?>', false],pair: $('#tgl2')});

	$('#tgl2').Zebra_DatePicker({
    direction: 1	});
	
}); 
</script>
<?php include 'login/hub.php';
if(!isset($_SESSION['LimasHotel']) or empty($_SESSION['LimasHotel'])){
	echo '<script>document.location="?page=signin"</script>';
}
if(!isset($_GET['ms']) or empty($_GET['ms'])){
	echo '<script>document.location="?page=kamar"</script>';
}

$ms=mysql_real_escape_string($_GET['ms']);
$cek=mysql_query("SELECT * FROM pemesanan JOIN pelanggan ON pemesanan.id_pelanggan = pelanggan.id_pelanggan
					AND username='".$_SESSION['LimasHotel']."' AND id_pemesanan =".$ms);
$data=mysql_fetch_row($cek);
if(count($data[0])==0){
	echo '<script>document.location="?page=kamar"</script>';
}

?>
			<div id="leftBar">
				<ul>
					<li><a href="?">Hotel LIMAS</a></li>
					<li><a href="?page=galeri">Gallery</a></li>
					<li><a href="?page=award">Achievments</a></li>
					<li><a href="?page=karir">Career</a></li>
					<li><a href="?page=kalender">Calender</a></li>
				</ul>
			</div>

			<div id="rightContent">
				<h3>Detail Pemesanan</h3>
				<div id="informasi">Segera lakukan pembayaran ke: 
					<ul>
					<li>Bank BNI</li>
					<li>Atas nama Hotel Limas Palembang</li>
					<li>021 318 3210</li>
				</ul>
				<pre>	Bila anda memiliki pertanyaan? hubungi admin melalui fitur testimonial pada member area.</pre>
				</div>
				<table class="pemakaian" cellspacing="3" cellpadding="0" style="margin-top:20px" border='0' width="900">
					<tr>
						<td colspan="4">
							<div id="control">
								<?php if($data[5]=='belum dikonfirmasi'){
									echo '<a href="isi/kontrol/konfirmasi.php?ms='.$data[0].'" class="button button-reserve" style="height:24px">Konfirmasi</a>';}?>
								<a href="javascript:void(0)" class="button button-reserve" onclick="window.print()"><div class="print">Print</div></a>
							</div>
						</td>
					</tr>
					<tr>
						<td width="150">	
							ID Pemesanan
						</td>
						<td>	
							: <?php echo $data[0]?>
						</td>
						<td width="150">	
							Nama Pelanggan
						</td>
						<td>	
							: <?php echo $data[9]?>
						</td>
					</tr>
					<tr>
						<td width="150">	
							Tanggal check in
						</td>
						<td>	
							: <?php echo $data[2]?>
						</td>
						
						<td width="150">	
							Username
						</td>
						<td>	
							: <?php echo $data[10]?>
						</td>
					</tr>
					<tr>
						<td>	
							Tanggal check out
						</td>
						<td>	
							: <?php echo $data[3];?>
						</td>
						
						<td width="150">	
							No Hp
						</td>
						<td>	
							: <?php echo $data[14]?>
						</td>
					</tr>
					<tr>
						<td>	
							Lama
						</td>
						<td>	
							: <?php $date1=date_create($data[2]);$date2=date_create($data[3]);
									$diff=date_diff($date1,$date2);
									$hr=$diff->format("%d");
									$lama=(string)$hr;
									echo $lama.' Hari';?>
						</td>
						
						<td width="150">	
							Poin
						</td>
						<td>	
							: <?php echo $data[17]?>
						</td>
					</tr>
					<tr>
						<td width="150">	
							Total Kamar
						</td>
						<td>	
							: <?php $kamar=mysql_query("select count(*) from detail_pemesanan where id_pemesanan=".$data[0]);
									$kamar=mysql_fetch_row($kamar); echo $kamar[0];?> Kamar
						</td>
						
						<td width="150">	
							Tanggal Pembayaran
						</td>
						<td>	
							: <?php if($data[7]=='0000-00-00'){echo "Belum dibayar";}
							else{echo $data[7];}?>
						</td>
					</tr>
					<tr>
						<td width="150">	
							Status Pembayaran
						</td>
						<td>	
							: <?php echo $data[4]?>
						</td>
						
						<td>
							Status Konfirmasi
						</td>
						<td>
							: <?php echo $data[5]?>
						</td>
					</tr>
				</table>
				<table class="detailpemakaian" cellspacing="0" cellpadding="0" style="margin-top:20px"   width="900">
					<thead>
						<th width="250">Room</th>
						<th width='350'>
							Price/room
						</th>
						<th width='200'>Subtotal</th>
					</thead>
					<tbody>
<?php 		$no=1;$total=0;
			$kamar=mysql_query("select * from detail_pemesanan where id_pemesanan=".$data[0]);
			while($no=mysql_fetch_array($kamar)){
				$querydetail=mysql_query('select * from kamar where id_kamar='.$no[2]);
				$detail=mysql_fetch_row($querydetail);
				$subtotal=$lama*$detail[3];
				$total=$total+$subtotal;
?>
					<tr>
						<td width="250"><?php echo $detail[1]?></td>
						<td width='350'>
							<?php echo $detail[3]?>
						</td>
						<td width='200' style="text-align:right;padding-right:20px;">
							Rp <?php echo number_format($subtotal,0,',','.')?>
						</td>
					</tr>
<?php 
			}
?>					<tr>
						<td colspan="2">
							<b style="float:right;margin-right:10px;">Total</b>
						</td>
						<td width='200' style="text-align:right;padding-right:20px;color:grey;font-weight:bold">
							Rp <?php echo number_format($data[6],0,',','.')?>
						</td>
					</tr>
		</body>
	</table>
				
				
				<pre>* Sudah termasuk PAJAK 21%!</pre>
				<pre>** Lakukan pembayaran dan konfirmasi segera dalam waktu 24 jam, bila lewat, pemesanan dianggap batal!</pre>
				<pre>*** Anda akan dinyatakan lunas apabila admin telah mengecek pembayaran anda!</pre>
				
			</div>
	