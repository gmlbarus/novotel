<div class='judul'>Detail Testimoni</div>
<!-- Place this in the body of the page content -->
<?php 
	$ms = mysql_real_escape_string($_GET['ms']);
	if(empty($ms)){
		echo "<script>alert('Data tidak ada!');
			document.location='?page=testimoni';
			</script>";
	}
	else{
		include '../login/hub.php';
		$query=mysql_query('select *
					from testimonial where id_testimoni='.$ms);
		$data=mysql_fetch_row($query);
		if($ms!=$data[0]){
			echo "<script>alert('Data tidak ada!');
			document.location='?page=testimoni';
			</script>";
		}
	}

?>	<br>
		<a href="" class="print" onclick="window.print()">Print</a>
	<br>
	<table class="pemakaian" cellspacing="3" cellpadding="0" style="margin-top:20px" border='0' width="1000">
		<tr>
			<th width='200'>ID Testimoni</th>
			<td>:</td>
			<td>
				<?php echo $data[0];?>
			</td>
		</tr>
		<tr>
			<th width='200'>ID REP</th>
			<td>:</td>
			<td>
				<?php echo ($data[1]);?>
			</td>
		</tr>
		<tr>
			<th width='200'>Tanggal</th>
			<td>:</td>
			<td>
				<?php echo ($data[2]);?>
			</td>
		</tr>
		<tr>
			<th width='200'>Judul</th>
			<td>:</td>
			<td>
				<?php echo ($data[3]);?>
			</td>
		</tr>
		<tr>
			<th width='200'>Isi</th>
			<td>:</td>
			<td>
				<?php echo ($data[4]);?>
			</td>
		</tr>
		<tr>
			<th width='200'>ID Pelanggan</th>
			<td>:</td>
			<td>
				<?php echo ($data[5]);?>
			</td>
		</tr>
		
	</table>


