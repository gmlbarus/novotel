<div class='judul'>Detail Promosi</div>
<!-- Place this in the body of the page content -->
<?php 
	$ms = mysql_real_escape_string($_GET['ms']);
	if(empty($ms)){
		echo "<script>alert('Data tidak ada!');
			document.location='?page=promosi';
			</script>";
	}
	else{
		include '../login/hub.php';
		$query=mysql_query('select *
					from promosi where id_promosi='.$ms);
		$data=mysql_fetch_row($query);
		if($ms!=$data[0]){
			echo "<script>alert('Data tidak ada!');
			document.location='?page=promosi';
			</script>";
		}
	}

?>	<br>
		<a href="" class="print" onclick="window.print()">Print</a>
	<br>
	<table class="pemakaian" cellspacing="3" cellpadding="0" style="margin-top:20px" border='0' width="1000">
		<tr>
			<th width='200'>Isi</th>
			<td>:</td>
			<td>
				<?php echo $data[1];?>
			</td>
		</tr>
		<tr>
			<th width='200'>Keterangan</th>
			<td>:</td>
			<td>
				<?php echo ($data[2]);?>
			</td>
		</tr>
		
	</table>


