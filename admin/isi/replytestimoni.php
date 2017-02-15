<div class='judul'>Reply Testimonial</div>
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
		$query=mysql_query('SELECT testimonial.id_testimoni, testimonial.tanggal, pelanggan.username, 
							testimonial.judul, testimonial.isi, testimonial.id_pelanggan, pelanggan.id_pelanggan
							FROM testimonial, pelanggan
							where testimonial.id_pelanggan=pelanggan.id_pelanggan and
							id_testimoni='.$ms);
		$data=mysql_fetch_row($query);
		if($ms!=$data[0]){
			echo "<script>alert('Data tidak ada!');
			document.location='?page=testimoni';
			</script>";
		}
	}

?>
<form name="inputtestimoni" method="post" action="isi/kontrol/simpan_testimoni.php">
	<table cellspacing="3" cellpadding="0">
		<tr>
			<td class='subjudul'>Dari</td>
			<td><input autofocus required name="dar" type="text" id="dar" value="<?php echo $data[2];?>" readonly></td>
		</tr>
		<tr>
			<td class='subjudul'>Isi</td>
			<td> <?php echo $data[4];?></td>
		</tr>
		<tr>
			<td class='subjudul'>Judul</td>
			<td><input autofocus required name="nama" type="text" id="nama" value="Admin Re: <?php echo $data[3];?>"></td>
		</tr>
		<tr>
			<td colspan="2"><textarea name="isi"  cols="35" rows="2" type="text" id="isi" placeholder="Tulis jawaban disini!" maxlength="300">
			</textarea></td>
		</tr>
		<tr>
			<td width=="92" colspan="2" scope="col" rowspan="2" scope="row" align="right">
				<input type='hidden' name='ms' value='<?php echo $ms;?>' />
				<input type='hidden' name='dari' value='<?php echo $data[5];?>' />
				<input type='hidden' name='sub' value='reply' />
				<input type="submit" name="Submit" value="Simpan" />
			</td>
		</tr>
		
	</table>
</form>


