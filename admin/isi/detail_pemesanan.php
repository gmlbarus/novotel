<div class='judul'>Detail Pemesanan</div>
<!-- Place this in the body of the page content -->
<?php 
	$ms = mysql_real_escape_string($_GET['ms']);
	if(empty($ms)){
		echo "<script>alert('Data tidak ada!');
			document.location='?page=pemesanan';
			</script>";
	}
	else{
		include '../login/hub.php';
		$query=mysql_query('select *
					from pemesanan where id_pemesanan='.$ms);
		$data=mysql_fetch_row($query);
		if($ms!=$data[0]){
			echo "<script>alert('Data tidak ada!');
			document.location='?page=pemesanan';
			</script>";
		}
	}

?>	
	<table class="pemakaian" cellspacing="3" cellpadding="0" style="margin-top:20px" border='0' width="1000">
		<tr>
		</tr>
		<tr>	<tr>
			<div id="rightContent">
				<h3>Detail Pemesanan</h3>
				<div id="informasi">Pembayaran pemesanan kamar oleh pelanggan sudah dikirimkan ke : 
					<ul>
					<li>Bank BNI</li>
					<li>Atas nama Hotel Limas Palembang</li>
					<li>021 318 3210</li>
				</ul>
				<pre>	Cek status konfirmasi kembali. Pemesanan harus diganti CANCEL apabila lewat dari 24 jam setelah pemesanan</pre>
				</div>
					<a href="javascript:void(0)" onclick="window.print()"><div class="print">Print</div></a>
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
							ID Pelanggan
						</td>
						<td>	
							: <?php echo $data[1]?>
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
							Tanggal check out
						</td>
						<td>	
							: <?php echo $data[3]?>
						</td>
					</tr>
					<tr>
						<td>	
							Status Pembayaran
						</td>
						<td>	
							: <?php echo $data[4];?>
						</td>
						
						<td width="150">	
							Status Konfirmasi
						</td>
						<td>	
							: <?php echo $data[5]?>
						</td>
					</tr>
					<tr>
						<td>	
							Total Bayar
						</td>
						<td>	
							: <?php echo $data[6]?>
						</td>
						
						<td width="150">	
							Tanggal Pembayaran
						</td>
						<td>	
							: <?php echo $data[7]?>
						</td>
						<tr><td>	
							Lama
						</td>
						<td>	
							: <?php $date1=date_create($data[2]);$date2=date_create($data[3]);
									$diff=date_diff($date1,$date2);
									$hr=$diff->format("%d");
									$lama=(string)$hr;
									echo $lama.' Hari';?>
						</td>
						</tr>
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
		</tbody>
	</table>
				
				
				<pre>* Sudah termasuk PAJAK 21 %!</pre>
				<pre>** Pembayaran terhitung 24 jam setelah pemesanan!</pre>
				<pre>*** Pelanggan akan dinyatakan lunas apabila admin telah mengecek pembayaran pelanggan!</pre>
				
			</div>
	