<div class='judul'>Pemakaian Servis</div>
<!-- Place this in the body of the page content -->
<?php 
	$ms = mysql_real_escape_string($_GET['ms']);
	if(empty($ms)){
		echo "<script>alert('Data tidak ada!');
			document.location='?page=pembayaran-servis';
			</script>";
	}
	else{
		include '../login/hub.php';
		$query=mysql_query('select 
					pemakaian_servis.id_pemakaian, pemakaian_servis.id_pelanggan, pemakaian_servis.total_bayar, pemakaian_servis.tgl_bayar,
					pelanggan.id_pelanggan, pelanggan.username, pelanggan.nama
					from pemakaian_servis, pelanggan where pemakaian_servis.id_pelanggan=pelanggan.id_pelanggan and id_pemakaian='.$ms);
		$data=mysql_fetch_row($query);
		if($ms!=$data[0]){
			echo "<script>alert('Data tidak ada!');
			document.location='?page=pemakaian_servis';
			</script>";
		}
	}

?>	<br>
		<a href="" class="print" onclick="window.print()">Print</a>
	<br>
	<table class="pemakaian" cellspacing="3" cellpadding="0" style="margin-top:20px" border='0' width="1000">
		<tr>
			<th>No Pemakaian Servis</th>
			<td width='350'>:
				<?php echo $data[0];?>
			</td>
			<th width='200'>Tanggal Pembayaran</th>
			<td>:
				<?php echo $data[3];?>
			</td>
		</tr>
		<tr>
			<th >Username</th>
			<td>:
				<?php echo $data[5];?>
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
	<table class="detailpemakaian" cellspacing="0" cellpadding="0" style="margin-top:20px"   width="1000">
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

