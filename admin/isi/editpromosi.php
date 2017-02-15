<div class='judul'>Promosi</div>
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
		$query=mysql_query('select * from promosi where id_promosi='.$ms);
		$data=mysql_fetch_row($query);
		if($ms!=$data[0]){
			echo "<script>alert('Data tidak ada!');
			document.location='?page=promosi';
			</script>";
		}
	}

?>
<form name="inputberita" method="post" action="isi/kontrol/simpan_promosi.php">
	<table cellspacing="3" cellpadding="0">
		<tr>
			<td class='subjudul'>Promosi</td>
		</tr>
		<tr>
			<td><textarea name="promosi"  cols="35" rows="2" type="text" id="promosi">
					<?php echo $data[1];?>
				</textarea></td>
		</tr>
		<tr>
			<td class='subjudul'>Keterangan</td>
		</tr>
		<tr>
			<td><textarea name="ket"  cols="35" rows="4" type="text" id="ket">
					<?php echo $data[2];?>
				</textarea></td>
		</tr>
		<tr>
			<td width=="92" colspan="2" scope="col" rowspan="2" scope="row" align="right">
				<input type='hidden' name='ms' value='<?php echo $ms;?>' />
				<input type='hidden' name='sub' value='edit' />
				<input type="submit" name="Submit" value="Simpan" />
			</td>
		</tr>
		
	</table>
</form>


