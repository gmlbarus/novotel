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
$cek=mysql_query("SELECT pemakaian_servis.id_pemakaian, pemakaian_servis.id_pelanggan, pemakaian_servis.total_bayar, pemakaian_servis.tgl_bayar, pelanggan.id_pelanggan, pelanggan.username, pelanggan.nama
FROM pemakaian_servis, pelanggan
WHERE pemakaian_servis.id_pelanggan = pelanggan.id_pelanggan
AND pelanggan.username =  '".$_SESSION['LimasHotel']."'
AND id_pemakaian =".$ms);
$data=mysql_fetch_row($cek);
if(count($data[0])==0){
	echo '<script>document.location="?page=service"</script>';
}

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
				<h3>Detail Pemakaian</h3>
				<pre>	Bila anda memiliki pertanyaan? hubungi admin melalui fitur testimonial pada member area.</pre>
				<table class="pemakaian" cellspacing="3" cellpadding="0" style="margin-top:20px" border='0' width="900">
					<tr>
						<td colspan="4">
							<div id="control">
								<a href="javascript:void(0)" class="button button-reserve" onclick="window.print()"><div class="print">Print</div></a>
							</div>
						</td>
					</tr>
					<tr>
						<th width="250">	
							No Pemakaian Servis
						</th>
						<td>	
							: <?php echo $data[0]?>
						</td>
						<th width="150">	
							Tanggal Pembayaran
						</th>
						<td>	
							: <?php echo $data[3]?>
						</td>
					</tr>
					<tr>
						<th width="150">	
							Username
						</th>
						<td>	
							: <?php echo $data[5]?>
						</td>
						<th width='200'>Total Pembayaran</th>
						<td>:
							Rp <?php echo number_format($data[2],0,',','.');?>
						</td>
					</tr>
				</table>
			<?php 
					$querydetail=mysql_query('select 
								* from detail_pemakaian, service where detail_pemakaian.id_servis=service.id_servis and id_pemakaian='.$ms);
					$detail=mysql_num_rows($querydetail);
					if(empty($detail)){
						echo "<teks style='margin:0px auto; text-align:center;font-size:40pt;'>Tidak ada data! </teks>";
					}
					else{
			?>
				<table class="detailpemakaian" cellspacing="0" cellpadding="0" style="margin-top:20px"   width="900">
					<thead>
						<th width="50">No</th>
						<th width='350'>
							Servis
						</th>
						<th width='200'>Total</th>
					</thead>
					<tbody>
			<?php 		$no=1;
						while($detail=mysql_fetch_row($querydetail))
						{
			?>
					<tr>
						<td width="50"><?php echo $no++;?></td>
						<td width='350'>
							<?php echo $detail[5]?>
						</td>
						<td width='200' style="text-align:right;padding-right:20px;">
							Rp <?php echo number_format($detail[3],0,',','.')?>
						</td>
					</tr>
			<?php 
						}
			?>
					</tbody>
				</table>
			<?php 	
					}
			?>
				
				
				<pre>* Sudah termasuk pajak 21 %!</pre>
			</div>
	