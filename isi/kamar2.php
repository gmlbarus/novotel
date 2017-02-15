<script type="text/javascript" src="asset/js/zebra_datepicker.js"></script>
<link rel="stylesheet" href="asset/css/default.css" type="text/css">
<script type="text/javascript">
$(document).ready(function() {
	$('#tgl').Zebra_DatePicker({ show_week_number: 'Wk',
	direction: [1, false],pair: $('#tgl2')});

	$('#tgl2').Zebra_DatePicker({ show_week_number: 'Wk',
    direction: 1	});
	
	function onSubmit() 
	{ 
		var k='kamar_';var terisi='tidak';
		var p=document.getElementById('pemesanan');
		var tgl1=document.getElementById('tgl').value;
		var tgl2=document.getElementById('tgl2').value;
		document.getElementById('tanggal1').value=tgl1;
				document.getElementById('tanggal2').value=tgl2;
		for(var i=0;i<p.length;i++){
			var x=document.getElementById(k+i);
			if(x.value=='' || x.value=='null' || x.value=='0'){
				//alert('kosong');
			}
			else{
				terisi='ya';
			}
		}
				if(terisi=='ya')
		{
			
			if(tgl1=='' || tgl2==''){
				alert('Please insert date!'); 
				return false;
			}
			else{
				document.getElementById('tanggal1').value=tgl1;
				document.getElementById('tanggal2').value=tgl2;
				alert(banyak + " items selected, "+tgl1+" - "+tgl2); 
			}
			document.getElementById('tanggal1').value=tgl1;
				document.getElementById('tanggal2').value=tgl2;
		}
		else{
			alert('Anda belum memilih kamar yang akan anda pesan!');
			//return false;
		}
		
	}
	// register event on form, not submit button
	$('#pemesanan').submit(onSubmit);
}); 
</script>
<?php include 'login/hub.php';error_reporting(0);
?>
			<div id="leftBar">
				<ul>
					<li><a href="?"><font color="#FFFFFF">Hotel Novotel</a></li></font>
					<li><a href="?page=galeri"><font color="#FFFFFF">Gallery</a></li></font>
					<li><a href="?page=award"><font color="#FFFFFF">Menu Makanan</a></li></font>
					<li><a href="?page=karir"><font color="#FFFFFF">Laundry</a></li></font>
					<li><a href="?page=kalender"><font color="#FFFFFF">Calender</a></li></font>
				</ul>
			</div>
			
			<div id="rightContent">
				<h3>Kamar</h3>
				<text class="teks">Temukan ruangan yang pas dengan anda!</text>
				<table width="95%">
					<tr>
						<td><form id="cari" name="cari" method="get" action="">
							<fieldset style="height:70px;">
							<legend>Cari berdasarkan</legend>
							<input type="hidden" name="page" value="kamar">
							Kelas :
							<select type="text" style='width:120px;' name='kelas' id='kelas' class="pendek">
								<?php if(!empty($_GET['kelas'])){echo '<option id="kelas" selected>'.$_GET['kelas'].'</option>';}?>
								<option id="kelas">  </option>
								<option id="kelas"> Standar </option>
								<option id="kelas"> Superior </option>
								<option id="kelas"> Deluxe </option>
								<option id="kelas"> Junior </option>
							</select>
							Tanggal :
							<input type="text" id="tgl" name="tgl" value="<?php echo $_GET['tgl']?>" placeholder="Tanggal" onchange='alert()'/>
							Sampai :
							<input type="text" id="tgl2" name="tgl2" value="<?php echo $_GET['tgl2']?>" placeholder="Tanggal"/>
							Tampilkan :
							<select type="text" name='perhalaman' id='perhalaman' class="pendek">
								<option id="perhalaman"> 10 </option>
								<option id="perhalaman"> 30 </option>
								<option id="perhalaman"> 50 </option>
								<?php if(!empty($_GET['kelas'])){echo '<option id="perhalaman" selected>'.$_GET['perhalaman'].'</option>';}?>
							</select> Data
							<input type="submit" class="button" name='search' id='search' value='Search'/>
							<input type="reset" class="button" name='rst' id='rst' value='Reset'/>
							</fieldset>
							</select>
							
							</form>
						</td>
					</tr>
				</table>
				
				<div id="Gallery">	
				<form id="pemesanan" name="pemesanan" method="post" action="?page=preview_pemesanan">
<?php include 'isi/kontrol/data-kamar2.php';
	echo '<div class="clear"></div>';

?>
					<input type="hidden" name="tanggal1" id="tanggal1">
					<input type="hidden" name="tanggal2" id="tanggal2">
				</form>
			</div>
		</div>