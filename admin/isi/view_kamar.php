<div class='judul'>Detail Kamar</div>
<!-- Place this in the body of the page content -->
<?php 
	$ms = mysql_real_escape_string($_GET['ms']);
	if(empty($ms)){
		echo "<script>alert('Data tidak ada!');
			document.location='?page=kamar';
			</script>";
	}
	else{
		include '../login/hub.php';
		$query=mysql_query('select *
					from kamar where id_kamar='.$ms);
		$data=mysql_fetch_row($query);
		if($ms!=$data[0]){
			echo "<script>alert('Data tidak ada!');
			document.location='?page=kamar';
			</script>";
		}
	}

?>	<br>
		<a href="" class="print" onclick="window.print()">Print</a>
	<br>
	<table class="pemakaian" cellspacing="3" cellpadding="0" style="margin-top:20px" border='0' width="1000">
		<tr>
		<td rowspan="10"><img src="../asset/images/kamar/<?php echo $data[0]?>.jpg" width="300" height="300"></td>
			<th width='200'>ID kamar</th>
			<td>:</td>
			<td>
				<?php echo $data[0];?>
			</td>
		</tr>
		<tr>
			<th width='200'>Nama Kamar</th>
			<td>:</td>
			<td>
				<?php echo ($data[1]);?>
			</td>
		</tr>
		<tr>
			<th width='200'>Kelas Kamar</th>
			<td>:</td>
			<td>
				<?php echo ($data[2]);?>
			</td>
		</tr>
		<tr>
			<th width='200'>Harga Kamar</th>
			<td>:</td>
			<td>
				<?php echo ($data[3]);?>
			</td>
		</tr>
		<tr>
			<th width='200'>Deskripsi</th>
			<td>:</td>
			<td>
				<?php echo ($data[4]);?>
			</td>
		</tr>
	</table>


