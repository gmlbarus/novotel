<!Doctype html>
<!--script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script!-->
<script src="../asset/js/jquery-1.9.0.min.js"></script>
<script>
	var select='<select id="servis[]" name="servis[]" style="width:500px" required><option id="servis[]" name="servis[]" value="">-- Pilih --</option>';
	var select2='';var select3= '</select>';
</script>
<?php				include '../login/hub.php';
					$servis=mysql_query('select * from service');
							while($get=mysql_fetch_array($servis)){
									echo '<script>select2=select2+ "'. "<option id='servis[]' name='servis[]' value='$get[0]'>$get[1]</option>".'";</script>';
								}
						;
?>
<script>
var serv=select+select2+select3;
var txt1='<tr id="detailpakai"><td width="50"><button type="button" onclick="afterText()">Tambah + </button><button type="button" onclick="deleteRow(this)">&nbsp; Hapus - </button></td><td width="350">';                   // Create element with HTML
var txt3='</td><td width="200" style="text-align:right;padding-right:20px;">Rp <input onchange="sum()" type="number" id="harga" name="harga[]" min="100" step="100" value="0" placeholder="Harga" onkeyup="sum()" style="text-align: right;" required></td></tr>';
function afterText()
{		
	$("tr#detailpakai:last").after(txt1+serv+txt3);          // Insert new elements after detailpakai
	sum();
}
function deleteRow(r)
{
	var i = r.parentNode.parentNode.rowIndex;
	if($("tr#detailpakai").length >1)
	{
		document.getElementById("detailpemakaian").deleteRow(i);
		sum();
	}
	else{
		alert('Data tidak boleh kosong sama sekali!');
	}
}
function sum(){
		var tot=0;
		var count = $("input#harga");
		var i;
		for(i=0; i<count.length; i++){
			tot = tot + parseInt(count[i].value);
		}
		//alert('tot');
		document.getElementById('total').value=tot;
 
}
$(document).ready(function()
{
	$('tabel#detailpemesanan').load($("tr#detailpakai").before(txt1+serv+txt3),     // Insert new elements for on load
		document.getElementById("detailpemakaian").deleteRow(2));	
	$('pemakaian').submit(function(){alert('wooi');
	});
});

</script>

<div class='judul'>Pemakaian Servis</div>
<!-- Place this in the body of the page content -->
	<br>
		<a href="" class="print" onclick="window.print()">Print</a>
	<br>
	<form id="pemakaian" onsubmit="cek();" method="post" action="isi/kontrol/simpan_pemakaian.php">
		<table class="pemakaian" cellspacing="3" cellpadding="0" style="margin-top:20px" border='0' width="1000">
			<tr>
				<th>No Pemakaian Servis</th>
				<td width='350'>:	</td>
				<th width='200'>Tanggal Pembayaran</th>
				<td>:
					<?php echo date('Y-m-d');?>
				</td>
			</tr>
			<tr>
				<th >ID Pelanggan</th>
				<td>: 
					<input type="number" id="idp" name="idp" autofocus required/>
				</td>
				<th width='200'>Total Pembayaran</th>
				<td>: Rp <input style="text-align: right;" name="total" id="total" type="number" value="0" readonly></input>
				</td>
			</tr>
		</table>
		<table id="detailpemakaian" class="detailpemakaian" cellspacing="0" cellpadding="0" style="margin-top:20px"   width="1000">
			<thead>
				<th width="150">Aksi</th>
				<th width='350'>Servis</th>
				<th width='200'>Total</th>
			</thead>
			<tbody id="detailpakai">
			<tr id="detailpakai">
				<td width="50"><input type="number" id="no[]" value="1" readonly>
					<button type="button" value="Add" onclick="afterText()">Tambah + </button>
					<button type="button" value="Delete" onclick="deleteRow(this)">Hapus -</button>
				</td>
				<td width='350'>
					
				</td>
				<td width='200' style="text-align:right;padding-right:20px;">
					Rp <input type="number" name="harga[]"  id="harga" min="0" step="100" placeholder="Harga" style="text-align: right;" required/>
				</td>
			</tr>
			<td colspan="3" scope="col" rowspan="3" scope="row" align="right">
				<input type='hidden' name='sub' value='input' />
				<input type="submit" name="Submit" value="Simpan" style="margin:6px;margin-right:22px;"/>
				
			</td>
			</tbody>
		</table>
	</form>