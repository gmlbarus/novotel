<div class='judul'>Customer Level</div>
<!-- Place this in the body of the page content -->
<?php 
	$ms = mysql_real_escape_string($_GET['ms']);
	if(empty($ms)){
		echo "<script>alert('Data tidak ada!');
			document.location='?page=customer-level';
			</script>";
	}
	else{
		include '../login/hub.php';
		$query=mysql_query('select * from customer_level where id_cl='.$ms);
		$data=mysql_fetch_row($query);
		if($ms!=$data[0]){
			echo "<script>alert('Data tidak ada!');
			document.location='?page=customer-level';
			</script>";
		}
	}

?>
<form name="inputcl" method="post" action="isi/kontrol/simpan_cl.php">
	<table cellspacing="3" cellpadding="0">
		<tr>
			<td class='subjudul'>Customer Level Name</td>
			<td><input autofocus required name="nama" type="text" id="nama" value="<?php echo $data[1];?>"></td>
		</tr>
		<tr>
			<td class='subjudul'>Poin</td>
			<td><input required name="poin" type="number" id="poin" min="10" step="10" value="<?php echo $data[2];?>"></td>
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


