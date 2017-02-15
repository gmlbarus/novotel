<script type="text/javascript" src="asset/js/zebra_datepicker.js"></script>
<link rel="stylesheet" href="asset/css/default.css" type="text/css">
<script type="text/javascript">
var dis=0;
function cekun(){
	var un=document.getElementById('un').value;	if(un.length > 2){
			$("#cekun").html('<font color="red"> Memeriksa. . .</font>');jQuery.ajax({ type: "POST", cache: false, url: "isi/member/cekun.php", data: "un="+ un,	success: function(msg){  
				if(msg == 'oke'){ $("#cekun").html('<font color="blue"> Username bisa digunakan!</font>');dis=1;}else { $("#cekun").html('<font color="orange"> Maaf, username telah digunakan!</font>');dis=0;}}});}
			else{$("#cekun").html('<font color="red">Minimal 3 karakter!</font>');}return false;
}
function cekpas(){
		var p1=document.getElementById('pswd1').value;var p2=document.getElementById('pswd2').value;if(p1.length>6){$("#cekpas1").html('<font color="blue"> Kereen!</font>');}if(p1==p2){
			dis=1;$("#cekpas2").html('<font color="blue"> Oke! </font>');	}else{dis=0;$("#cekpas2").html('<font color="orange"> Password BEDA </font>');$('pswd2').focus();}
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
					<li><a href="?page=faq"><font color="#FFFFFF">FAQ</a></li>
					<li><a href="?page=guestbook"><font color="#FFFFFF">Guestbook</a></li>
				</ul>
			</div>
			<div id="rightContent">
				<h3><font color="#222">Sign Up</h3>
				<p class="teks gestteks"><font color="#222">ISI SEMUA DATA</p>				
				<div class="clear" ></div>
				<form method="post" name="signup" id="signup" action="isi/member/simpan_member.php" onsubmit="if(dis=!1){return false;}">
				<table width="95%">
					<tr>
						<td width="125px"><b>Nama	</b></td>
						<td>: <input type="text" name='nama' id='nama' class="sedang" maxlength='30' autofocus required placeholder='Nama...'/></td>
					</tr>
					<tr>
						<td width="125px"><b>Username	</b></td>
						<td>: <input type="text" name='un' id='un' class="sedang" maxlength='15' pattern=".{3,}" required placeholder='Username...' onkeydown="cekun();"/>
							<b id="cekun">  Tanpa Spasi dan simbol</b>
						</td>
					</tr>
					<tr>
						<td width="125px"><b>Password	</b></td>
						<td>: <input type="password" name='pswd1' id='pswd1' class="sedang" maxlength='20' pattern=".{6,}" required placeholder='Password...' onchange="cekpas()"/>
							<b id="cekpas1"> Minimal 6 karakter</b>
						</td>
					</tr>
					<tr>
						<td width="125px"><b>Ulangi Password	</b></td>
						<td>: <input type="password" name='pswd2' id='pswd2' class="sedang" maxlength='20' pattern=".{6,}" required placeholder='Password...' onchange="cekpas()"/>
							<b id="cekpas2"> Ulangi Password</b>
						</td>
					</tr>
					<tr>
						<td width="125px"><b>Jenis Kelamin</b></td>
						<td>:
							<select name="jk" id="jk">
							<option name='jk' id='jk' required/>laki-laki</option>
							<option name='jk' id='jk' required/>perempuan</option>
							</select>
						</td>
					</tr>
					<tr>
						<td width="125px"><b>Alamat</b></td>
						<td>: <textarea type="text" name='alamat' id='alamat' width="400" maxlength='100' required placeholder='alamat...'></textarea></td>
					</tr>
					<tr>
						<td width="125px"><b>Tanggal Lahir</b></td>
						<td>: <input type="text" id="tgl" name="tgl" required/>
						</td>
					</tr>
					<tr>
						<td width="125px"><b>Email	</b></td>
						<td>: <input type="email" name='email'  class="sedang"  id='email' maxlength='20' required placeholder='email...'/></td>
					</tr>
					<tr>
						<td width="125px"><b>No. Telepon</b></td>
						<td>:<input type="number" name='phone'  class="sedang"  id='phone' pattern=".{8,20}" required placeholder='phone...' min="0"/></td>
					</tr>
					<tr>
						<td colspan="2">
							<input type="hidden" name="pesan" id="pesan" class="button" value="<?php echo @$_GET['pesan'];?>">
							<input type="submit" class="button" name='submit' id='submit' value='submit'/>
							<input type="reset" class="button" name='reset' id='reset' value='reset'/>
						</td>
					</tr>
				</table>
				</form>
				
			</div>
