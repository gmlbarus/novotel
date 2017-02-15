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
<form name="password" id='form' method="post" onsubmit="subt();">
<div class="stts"></div>
	<table cellspacing="3" cellpadding="0">
		<tr>
			<td class='subjudul'>Password Lama</td>
				<td><input autofocus name="pass" type="password" id="pass" required>
				</td>
		</tr>
		<tr>
			<td class='subjudul'>Password baru</td>
				<td><input required name="pass1" type="password" id="pass1" pattern=".{5,}">
				<div id="status1"></div>
				</td>
		</tr>
		<tr>
			<td class='subjudul'>Password baru ulangi</td>
				<td><input required name="pass2" type="password" id="pass2" pattern=".{5,}">
				<div id="status2"></div>
				</td>
		</tr>
		<tr>
			<td width=="92" colspan="2" scope="col" rowspan="2" scope="row" align="right">
				<input type='hidden' name='sub' value='pass' />
				<input type="submit" name="Submit" id='simpan' value="Simpan" />
			</td>
		</tr>
		
	</table>
</form>

<script type="text/javascript">
var submit=0;
var pw1;
var pw2;
var pw3;
$(document).ready(function(){
	$("#pass1").keyup(function(event){ 	
		pw1 = document.getElementById('pass1').value;
		if(pw1.length > 4) 
		{
			$("#status1").html('<div class="sukses">&nbsp; Oke</div>');
			submit = 1;
		}
		else
		{
			$("#status1").html('<div class="gagal">Too Short!</div>');
			document.getElementById("pass1").focus();
			submit = 0;
		}
		return;
	});
	
		$("#pass2").keyup(function(event){ 	
		pw2 = document.getElementById('pass2').value;
		if(pw2==pw1)
		{
			$("#status2").html('<div class="sukses">&nbsp; Oke</div>');
			submit = 1;
		}
		else
		{
			$("#status2").html('<div class="gagal">Not Match!</div>');
			document.getElementById("pass2").focus();
			submit = 0;
		}
		return;
	});

});
function subt(){
			var url = "isi/kontrol/password.php";
			var msg;
			pw3 = document.getElementById('pass').value;
			if(submit==1){
			$.post(url, {pass: pw3, ps1: pw1, ps2:pw2}, function(msg) {
					alert('post! '+submit);
					if(msg == 'oke')
					{ 
						$("#stts").html('<div class="sukses"> Berhasil!:) </div>');
						alert('Success! Data has been saved');
						document.location='?';
					}  
					else  
					{  
						alert('Failed! ');
						$("#stts").html('<div class="gagal"> Gagal! :( </div>');
					}
				});
			}
			else{
				alert('Failed! Data tidak lengkap! ');
				$("#stts").html('<div class="gagal"> Gagal! :( </div>');
				$("#pass2").focus();
			}
			//alert('post! '+submit+' nnn '+msg);
			return false;
			//
		}
</script>


