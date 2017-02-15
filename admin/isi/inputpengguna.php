<div class='judul'>Pengguna</div>
<!-- Place this in the body of the page content -->
<form name="inputberita" method="post" action="isi/kontrol/simpan_pengguna.php">
	<table cellspacing="3" cellpadding="0">
		<tr>
			<td class='subjudul'>Username</td>
			<td><input autofocus required name="pengguna" type="text" id="pengguna"></td>
		</tr>
		<tr>
			<td class='subjudul'>Kategori</td>
			<td><select name="kat"  cols="35" rows="4" type="text" id="kat" required>
					<option name="kat" id="kat" value="">-- Pilih --</option>
					<option name="kat" id="kat" value="admin">Admin</option>
					<option name="kat" id="kat" value="manajer">Manajer</option>
					<option name="kat" id="kat" value="adm">Adm</option>
				</select></td>
		</tr>
		<tr>
			<td width=="92" colspan="2" scope="col" rowspan="2" scope="row" align="right">
				<input type='hidden' name='sub' value='input' />
				<input type="submit" name="Submit" value="Simpan" />
			</td>
		</tr>
		
	</table>
</form>


