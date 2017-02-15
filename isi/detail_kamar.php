<script type="text/javascript" src="asset/js/zebra_datepicker.js"></script>
<link rel="stylesheet" href="asset/css/default.css" type="text/css">
<script type="text/javascript">
$(document).ready(function() {
	document.getElementById('tgl2').value=document.getElementById('tgl').value;
	$('#tgl').Zebra_DatePicker({ show_week_number: 'Wk',
	direction: ['<?php echo date("Y-m-d");?>', false],pair: $('#tgl2')});

	$('#tgl2').Zebra_DatePicker({
    direction: 1	});
	
}); 
</script>
<?php include 'login/hub.php';
if(!isset($_GET['ms']) or empty($_GET['ms'])){
	echo '<script>document.location="?page=kamar"</script>';
}
$ms=$_GET['ms'];
$query = mysql_query("SELECT * FROM `kamar` where id_kamar=".$ms);
$n = mysql_num_rows($query);
$data = mysql_fetch_row($query);
if($n=0){
	echo '<script>alert("Data tidak ada!");document.location="?page=kamar"</script>';
}
?>
			<div id="leftBar">
				<ul>
					<li><a href="?"><font color="#FFFFFF">Hotel Novotel</a></li></font>
					<li><a href="?page=galeri"><font color="#FFFFFF">Galery</a></li></font>
					<li><a href="?page=award"><font color="#FFFFFF">Menu Makanan</a></li></font>
					<li><a href="?page=karir"><font color="#FFFFFF">Laundry</a></li></font>
					<li><a href="?page=kalender"><font color="#FFFFFF">Calender</a></li></font>
				</ul>
			</div>
			
			<div id="rightContent">
				<h3><?php echo $data[1]?></h3>
				
				<table width="95%">
					<tr>
						<td rowspan="5">	
							<a href="asset/images/kamar/<?php echo $data[0].'.jpg'?>" class="fancybox" title="<?php echo $data[1].' '.$data[4]?>">
							<img src="asset/images/kamar/<?php echo $data[0].'.jpg'?>" width="500"/></a>
						</td>
						<td colspan="2">	
							<text class="teks" style="margin-left:60px;padding:40px;"><?php echo $data[4]?></text>
						</td>
					</tr>
					<tr>
						<td>	
							<text class="teks">Kelas :</text>
						</td>
						<td>	
							<text class="teks"><?php echo $data[2]?></text>
						</td>
					</tr>
					<tr>
						<td>	
							<text class="teks">Harga :</text>
						</td>
						<td>	
							<text class="teks">Rp <?php echo number_format($data[3],0,',','.');?></text>
						</td>
					</tr>
				</table>	
			</div>
	