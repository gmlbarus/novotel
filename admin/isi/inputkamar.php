<script type="text/javascript" src="../Asset/js/jquery-1.9.0.min.js"></script>
<div class='judul'>Kamar</div>
<!-- Place this in the body of the page content -->
<form name="inputKamar" width="500" style="float:left" method="post"  enctype="multipart/form-data" action="isi/kontrol/simpan_Kamar.php">
	<table cellspacing="3" cellpadding="0">
		<tr>
			<td class='subjudul'>Nama Kamar</td>
			<td><input autofocus required name="nama" type="text" id="nama"></td>
		</tr>
		<tr>
			<td class='subjudul'>Kategori Kamar</td>
			<td><select name="kat" style="width:159px;margin:1px;text-align:center;" cols="35" rows="4" type="text" id="kat" required>
					<option name="kat" id="kat" value="">-- Pilih --</option>
					<option name="kat" id="kat" >Standar</option>
					<option name="kat" id="kat" >Superior</option>
					<option name="kat" id="kat" >Deluxe</option>
					<option name="kat" id="kat" >Junior</option>
				</select></td>
		</tr>
		<tr>
			<td class='subjudul'>Harga Kamar (Rp)</td>
			<td><input required name="harga" type="number" id="harga" min="100000" step="10000"></td>
		</tr>
		<tr>
			<td colspan="2"><textarea name="deskripsi"  cols="35" rows="2" type="text" id="deskripsi"></textarea></td>
		</tr>
		<tr>
			<td class='subjudul'>Foto</td>
			<td><input type='file' accept="audio/*|video/*|image/*|MIME_type" name="gambar" id="imgInp" /><br/>
			</td>
		</tr>
		<tr>
			<td colspan="2" scope="col" rowspan="2" scope="row" align="right">
				<input type='hidden' name='sub' value='input' />
				<input type="submit" name="Submit" value="Simpan" />
			</td>
		</tr>
		
	</table>
</form>
<div id="prev" style="margin:0px auto;display:none;">
	<img id="blah" src="#" alt="your image" width="500" style="margin-top:200px;margin-left:30px;border:3px solid silver;"/>
</div>
<script type="text/javascript">
	var imgprev=document.getElementById('prev');
	
  function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
			imgprev.style.display = 'block';
        }
    }
    
    $("#imgInp").change(function(){
        readURL(this);
    });
</script>