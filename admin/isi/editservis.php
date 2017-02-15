<div class='judul'>Servis</div>
<!-- Place this in the body of the page content -->
<?php 
	$ms = mysql_real_escape_string($_GET['ms']);
	if(empty($ms)){
		echo "<script>alert('Data tidak ada!');
			document.location='?page=servis';
			</script>";
	}
	else{
		include '../login/hub.php';
		$query=mysql_query('select * from service where id_servis='.$ms);
		$data=mysql_fetch_row($query);
		if($ms!=$data[0]){
			echo "<script>alert('Data tidak ada!');
			document.location='?page=servis';
			</script>";
		}
	}

?>
<form name="inputservis" method="post" action="isi/kontrol/simpan_servis.php">
	<table cellspacing="3" cellpadding="0">
		<tr>
			<td class='subjudul'>Servis</td>
		</tr>
		<tr>
			<td><textarea name="servis"  cols="35" rows="2" type="text" id="servis">
					<?php echo $data[1];?>
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


