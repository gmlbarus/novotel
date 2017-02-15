<div class='judul'>Customer Level</div>
<!-- Place this in the body of the page content -->
<form name="inputcl" method="post" action="isi/kontrol/simpan_cl.php">
	<table cellspacing="3" cellpadding="0">
		<tr>
			<td class='subjudul'>Customer Level Name</td>
			<td><input autofocus required name="nama" type="text" id="nama"></td>
		</tr>
		<tr>
			<td class='subjudul'>POIN</td>
			<td><input required name="poin" type="number" id="poin" min="10" step="10"></td>
		</tr>
		<tr>
			<td width=="92" colspan="2" scope="col" rowspan="2" scope="row" align="right">
				<input type='hidden' name='sub' value='input' />
				<input type="submit" name="Submit" value="Simpan" />
			</td>
		</tr>
		
	</table>
</form>


