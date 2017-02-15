<div class='judul'>Sms</div>
<!-- Place this in the body of the page content -->
<form name="inputservis" method="post" action="isi/kontrol/kirim-sms.php">
	<table cellspacing="3" cellpadding="0">
		<tr>
			<td class='subjudul'>SMS</td>
		</tr>
		<tr>
			<td width="150">Number</td>
			<td><input style="width:600px;" type="number" name="no" id="no" placeholder="Type number here." maxlength="13" pattern="{10,13}" required autofocus title="masukkan nomor telepon, biasanya memiliki panjang minimal 9 hingga 13"></td>
		</tr>
		<tr>
			<td>Message</td>
			<td><textarea id="sms" name="sms" cols="35" rows="2" type="text" placeholder="Type your message here." maxlength="160" required> Maximum 160 characters. </textarea>
			</td>
		</tr>
		<tr>
			<td width=="92" colspan="2" scope="col" rowspan="2" scope="row" align="right">
				<input type='hidden' name='sub' value='input' />
				<input type="submit" name="Submit" value="kirim sms" />
			</td>
		</tr>
		
	</table>
</form>


