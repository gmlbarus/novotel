<div class='judul'>Detail Pelanggan</div>
<!-- Place this in the body of the page content -->
<?php 
	$ms = mysql_real_escape_string($_GET['ms']);
	if(empty($ms)){
		echo "<script>alert('Data tidak ada!');
			document.location='?page=pelanggan';
			</script>";
	}
	else{
		include '../login/hub.php';
		$query=mysql_query('select *
					from pelanggan where id_pelanggan='.$ms);
		$data=mysql_fetch_row($query);
		if($ms!=$data[0]){
			echo "<script>alert('Data tidak ada!');
			document.location='?page=pelanggan';
			</script>";
		}
	}

?>	

	<br>
		<a href="" class="print" onclick="window.print()">Print</a>
	<br>
	<table class="pemakaian" cellspacing="3" cellpadding="0" style="margin-top:20px" border='0' width="1000">
		<tr>
		</tr>
		<tr>
		<td rowspan="10"><img src="../isi/member/foto/<?php echo $data[0]?>.jpg" width="300" height="300"></td>
			<th width='200'>ID Pelanggan</th>
			<td>:
				<?php echo $data[0];?>
			</td>
		</tr>
		<tr>
			<th width='200'>Nama</th>
			<td>:
				<?php echo ($data[1]);?>
			</td>
		</tr>
		<tr>
			<th >Username</th>
			<td>:
				<?php echo $data[2];?>
			</td>
			</tr>
			<tr>
			<th width='200'>Tanggal Lahir</th>
			<td>:
				<?php echo($data[3]);?>
			</td>
		</tr>
		
		<tr>
			<th>Jenis Kelamin</th>
			<td width='350'>:
				<?php echo $data[4];?>
			</td>
			</tr>
			<tr>
			<th width='200'>Alamat</th>
			<td>:
				<?php echo $data[5];?>
			</td>
		</tr>
			<tr>
			<th width='200'>Nomor Hp</th>
			<td>:
				<?php echo $data[6];?>
			</td>
		</tr>
		<tr>
			<th width='200'>Email</th>
			<td>:
				<?php echo $data[7];?>
			</td>
		</tr>
		<tr>
			<th width='200'>Poin</th>
			<td>:
				<?php echo $data[9];?>
			</td>
		</tr>
		<tr>
			<th width='200'>Pekerjaan</th>
			<td>:
				<?php echo $data[10];?>
			</td>
		</tr>
	</table>


