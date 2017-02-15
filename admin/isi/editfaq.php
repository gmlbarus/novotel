<div class='judul'>frequently ask question</div>
<!-- Place this in the body of the page content -->
<?php 
	$ms = mysql_real_escape_string($_GET['ms']);
	if(empty($ms)){
		echo "<script>alert('Data tidak ada!');
			document.location='?page=faq';
			</script>";
	}
	else{
		include '../login/hub.php';
		$query=mysql_query('select * from faq where id_faq='.$ms);
		$data=mysql_fetch_row($query);
		if($ms!=$data[0]){
			echo "<script>alert('Data tidak ada!');
			document.location='?page=faq';
			</script>";
		}
	}

?>
<form name="inputberita" method="post" action="isi/kontrol/simpan_faq.php">
	<table cellspacing="3" cellpadding="0">
		<tr>
			<td class='subjudul'>Pertanyaan</td>
		</tr>
		<tr>
			<td><textarea name="tanya"  cols="35" rows="2" type="text" id="tanya">
					<?php echo $data[1];?>
				</textarea></td>
		</tr>
		<tr>
			<td class='subjudul'>Solusi</td>
		</tr>
		<tr>
			<td><textarea name="isi"  cols="35" rows="4" type="text" id="isi">
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


