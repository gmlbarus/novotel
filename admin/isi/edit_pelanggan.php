<div class='judul'>Edit Pelanggan</div>
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
		$query=mysql_query('select * from pelanggan where id_pelanggan='.$ms);
		$data=mysql_fetch_row($query);
		if($ms!=$data[0]){
			echo "<script>alert('Data tidak ada!');
			document.location='?page=pelanggan';
			</script>";
		}
	}

?>
<form name="inputberita" method="post" action="isi/kontrol/simpan_pengguna.php">
	<table cellspacing="3" cellpadding="0">
		<tr>
			<td class='subjudul'>Username</td>
				<td><input autofocus readonly name="pengguna" type="text" id="pengguna" value="<?php echo $data[1];?>">
				</td>
		</tr>
		<tr>
			<td class='subjudul'>Kategori</td>
			<td><select name="kat"  cols="35" rows="4" type="text" id="kat" required>
					<option name="kat" id="kat" value="<?php echo $data[3];?>"><?php echo $data[3];?></option>
					<option name="kat" id="kat" value="admin">Admin</option>
					<option name="kat" id="kat" value="manajer">Manajer</option>
					<option name="kat" id="kat" value="adm">Adm</option>
				</select></td>
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


