
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
			var url = "password.php";
			var msg;
			pw3 = document.getElementById('pass').value;
			if(submit==1){alert('nagntuk');alert('post! '+pw3);
				return true;
			}
			else{
				alert('Failed! Data tidak lengkap! ');
				return false;
				$("#stts").html('<div class="gagal"> Gagal! :( </div>');
				$("#pass2").focus();
				
			}
			//alert('post! '+submit+' nnn '+msg);
			//
		}
</script>

			<div id="leftBar" style="background: url(img/bg_kiri.png) repeat-y;">
				<ul>
					<li><a href="?page=profile">Profile</a></li>
					<li><a href="?page=photo">Edit Photo</a></li>
					<li><a href="?page=password">Edit Password</a></li>
					<li><a href="?page=testimonial">Testimonial</a></li>
					<li><a href="?page=transaction">Transaction</a></li>
					<li><a href="?page=service">Service</a></li>
				</ul>
			</div>
			<div id="rightContent">
				<!-- Place this in the body of the page content -->
<?php 
	$ms = mysql_real_escape_string($_SESSION['LimasHotel']);
	if(empty($ms)){
		echo "<script>alert('Data tidak ada!');
			document.location='?';
			</script>";
	}
?>					
				<h3>Password</h3>
				<p class="teks gestteks">Change your password.</p>				
				<div class="clear" ></div>
					<form name="password" id='form' action="isi/member/password.php" method="post" onsubmit="subt();">
						<div class="stts"></div>
						<table cellspacing="3" cellpadding="0">
							<tr>
								<td class='subjudul'>Password Lama</td>
								<td><input autofocus name="pass" type="password" id="pass" required>
								</td>
							</tr>
							<tr>
								<td class='subjudul'>Password baru</td>
								<td><input required name="ps1" type="password" id="pass1" pattern=".{5,}">
								<div id="status1"></div>
								</td>
							</tr>
							<tr>
								<td class='subjudul'>Password baru ulangi</td>
								<td><input required name="ps2" type="password" id="pass2" pattern=".{5,}">
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
			</div>

