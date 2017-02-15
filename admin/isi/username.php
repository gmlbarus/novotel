<div class='judul'>Pengguna</div>
<!-- Place this in the body of the page content -->
<?php 
	$ms = mysql_real_escape_string($_SESSION['admin-limas']);
	if(empty($ms)){
		echo "<script>alert('Data tidak ada!');
			document.location='?';
			</script>";
	}
?>
<form name="inputberita" id='form' method="post" onsubmit="subt();">
	<table cellspacing="3" cellpadding="0">
		<tr>
			<td class='subjudul'>Username sekarang</td>
				<td><input autofocus name="pengguna1" type="text" id="pengguna1" value="<?php echo $ms?>" readonly required>
				</td>
		</tr>
		<tr>
			<td class='subjudul'>Username baru</td>
				<td><input required name="pengguna2" type="text" id="pengguna2" pattern=".{3,}">
				<div id="status"></div>
				</td>
		</tr>
		<tr>
			<td width=="92" colspan="2" scope="col" rowspan="2" scope="row" align="right">
				<input type='hidden' name='sub' value='user' />
				<input type="submit" name="Submit" id='simpan' value="Simpan" />
			</td>
		</tr>
		
	</table>
</form>

<script type="text/javascript">
var submit=0;
$(document).ready(function(){
	$("#pengguna2").keyup(function(event){ 	
		var checksp = document.getElementById('pengguna2').value;
		if(checksp.length > 2)
		{
			$("#status").html('<div class="informasi"></div>&nbsp; Checking...');
			$.ajax({  
			type: "POST",  
			cache: false,
			url: "isi/kontrol/username.php",  
			data: "unb="+ checksp,  
			success: function(msg){  
				//alert(msg);
				$("#status").ajaxComplete(function(event, request){ 
					if(msg == 'OK')
					{ 
						$("#status").html('<div class="sukses">Oke!</div>');
						submit = 1;
					}  
					else  
					{  
						$("#status").html('<div class="gagal">Username telah digunakan!</div>');
						document.forms['form'].elements['pengguna2'].focus();
						submit = 0;
					}  
					});
				} 
			}); 
		}
		else
		{
			$("#status").html('<div class="gagal">Too Short!</div>');
			document.getElementById("pengguna2").focus();
			submit = 0;
		}
		return;
	});
});
function subt(){
			var url = "isi/kontrol/username.php";
			var baru = $('#pengguna2').val();
			if(submit==1){
			$.post(url, {UN: baru}, function(msg) {
					if(msg == 'oke')
					{ 
						alert('Success! Data has been saved');
					}  
					else  
					{  
						alert('Failed! '+msg);
					}
				})
			}
			else{
				alert('Failed!');
				$("#pengguna2").focus();
				return false;
			}
			document.location='?page=username';
		}
</script>


