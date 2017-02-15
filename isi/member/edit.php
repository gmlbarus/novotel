<?php error_reporting(0);
session_start();
	if(!isset($_SESSION['LimasHotel']) or empty($_SESSION['LimasHotel']))
	{
		echo "<script>document.location='?';</script>";
	}
	include 'login/hub.php';
	$query=mysql_query("select * from pelanggan where username='".$_SESSION['LimasHotel']."'");
	if($query)
	{	$get=mysql_fetch_row($query);
		}
	else{ echo'error';
	}
?>
<script type="text/javascript" src="asset/js/zebra_datepicker.js"></script>
<link rel="stylesheet" href="asset/css/default.css" type="text/css">
<script type="text/javascript">
var dis=0;
function cekun(){
	var un=document.getElementById('un').value;	if(un.length > 2){
			$("#cekun").html('<font color="orange"> Memeriksa. . .</font>');jQuery.ajax({ type: "POST", cache: false, url: "isi/member/cekun.php", data: "un="+ un,	success: function(msg){  
				if(msg == 'oke'){ $("#cekun").html('<font color="blue"> Username bisa digunakan! :D</font>');dis=1;}else { $("#cekun").html('<font color="orange"> Maaf, username telah digunakan! :(</font>');dis=0;}}});}
			else{$("#cekun").html('<font color="orange">Minimal 3 karakter! :(</font>');}return false;
}
function cekpas(){
		var p1=document.getElementById('pswd1').value;var p2=document.getElementById('pswd2').value;if(p1.length>6){$("#cekpas1").html('<font color="blue"> Kereen! :D </font>');}if(p1==p2){
			dis=1;$("#cekpas2").html('<font color="blue"> Oke! :) </font>');	}else{dis=0;$("#cekpas2").html('<font color="orange"> Kok passwordnya beda? :( </font>');$('pswd2').focus();}
	}
function ceksub(){
	var tgl=document.getElementById('tgl').value;
	alert(tgl);
	if(tgl==''){
		dis=0;
	}
	if(dis==!1){return false;}
}
$(document).ready(function() {
	$('#tgl').Zebra_DatePicker({view: 'years', direction:false});
}); 
</script>
			<div id="leftBar" style="background: url(img/bg_kiri.png) repeat-y;">
				<ul>
					<li><a href="?page=profile">Profile</a></li>
					<li><a href="?page=photo">Edit Photo</a></li>
					<li><a href="?page=password">Edit Password</a></li>
					<li><a href="?page=testimonial">Testimonial</a></li>
					<li><a href="?page=transaction">Transaction</a></li>
				</ul>
			</div>
			<div id="rightContent">
				<h3>Edit Profile</h3>
				<form method="post" name="edit" id="edit" action="isi/member/simpan_profil.php" onsubmit="if(dis=!1){return false;}">
				<table width="95%">
					<tr>
						<td width="125px"><b>Name	</b></td>
						<td>: <input type="text" name='nama' id='nama' class="sedang" maxlength='30' autofocus required placeholder='Nama...' value="<?php echo $get[1]?>"/></td>
					</tr>
					<tr>
						<td width="125px"><b>Username	</b></td>
						<td>: <input type="text" name='un' id='un' class="sedang" maxlength='15' pattern=".{3,}" required placeholder='Username...' value="<?php echo $get[2]?>" onkeydown="cekun();"/>
							<b id="cekun">  Tanpa Spasi dan simbol.</b>
						</td>
					</tr>
					<tr>
						<td width="125px"><b>Pekerjaan	</b></td>
						<td>:
							<select name="pekerjaan" id="pekerjaan">
								<option  id='pekerjaan' required/><?php echo $get[10]?></option>
								<option  id='pekerjaan' required/>Pelajar</option>
								<option  id='pekerjaan' required/>Swasta</option>
								<option  id='pekerjaan' required/>PNS</option>
								<option  id='pekerjaan' required/>Tidak Bekerja</option>
							</select>
						</td>
						</td>
					</tr>
					<tr>
						<td width="125px"><b>Jenis Kelamin	</b></td>
						<td>:
							<select name="jk" id="jk">
							<option name='jk' id='jk' required/><?php echo $get[4]?></option>
							<option name='jk' id='jk' required/>laki-laki</option>
							<option name='jk' id='jk' required/>perempuan</option>
							</select>
						</td>
					</tr>
					<tr>
						<td width="125px"><b>Address	</b></td>
						<td>: <textarea type="text" name='alamat' id='alamat' width="400" maxlength='300' required placeholder='alamat...'>
								<?php echo $get[5]?>
								</textarea></td>
					</tr>
					<tr>
						<td width="125px"><b>Tanggal Lahir</b></td>
						<td>: <input type="text" id="tgl" name="tgl" value="<?php echo $get[3]?>" required/>
						</td>
					</tr>
					<tr>
						<td width="125px"><b>Email	</b></td>
						<td>: <input type="email" name='email'  class="sedang"  id='email' maxlength='20' value="<?php echo $get[7]?>" required placeholder='email...'/></td>
					</tr>
					<tr>
						<td width="125px"><b>Phone	</b></td>
						<td>:<input type="number" name='phone'  class="sedang"  id='phone' pattern=".{8,20}" value="<?php echo $get[6]?>" required placeholder='phone...' min="0"/></td>
					</tr>
					<tr>
						<td colspan="2">
							<input type="hidden" id="idx" name="idx" value="<?php echo $get[0]?>"/>
							<input type="submit" class="button" name='submit' id='submit' value='submit'/>
							<input type="reset" class="button" name='reset' id='reset' value='reset'/>
						</td>
					</tr>
				</table>
				</form>
				
			</div>
