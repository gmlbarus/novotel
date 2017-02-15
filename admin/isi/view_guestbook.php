<div class='judul'>Detail Guestbook</div>
<!-- Place this in the body of the page content -->
<?php 
	$ms = mysql_real_escape_string($_GET['ms']);
	if(empty($ms)){
		echo "<script>alert('Data tidak ada!');
			document.location='?page=guestbook';
			</script>";
	}
	else{
		include '../login/hub.php';
		$query=mysql_query('select *
					from guestbook where id_guestbook='.$ms);
		$data=mysql_fetch_row($query);
		if($ms!=$data[0]){
			echo "<script>alert('Data tidak ada!');
			document.location='?page=guestbook';
			</script>";
		}
	}

?>	<br>
		<a href="" class="print" onclick="window.print()">Print</a>
	<br>
	<table class="pemakaian" cellspacing="3" cellpadding="0" style="margin-top:20px" border='0' width="1000">
		<tr>
			<th width='200'>Nama</th>
			<td>:
				<?php echo $data[1];?>
			</td>
		</tr>
		<tr>
			<th width='200'>Alamat</th>
			<td>:
				<?php echo ($data[2]);?>
			</td>
		</tr>
		<tr>
			<th >Pekerjaan</th>
			<td>:
				<?php echo $data[3];?>
			</td>
			</tr>
			<tr>
			<th width='200'>Email</th>
			<td>:
				<?php echo($data[4]);?>
			</td>
		</tr>
		
		<tr>
			<th>no_telp</th>
			<td width='350'>:
				<?php echo $data[5];?>
			</td>
			</tr>
			<tr>
			<th width='200'>Komentar</th>
			<td>:
				<?php echo $data[6];?>
			</td>
		</tr>
	</table>


