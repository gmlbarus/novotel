<script type="text/javascript" src="../asset/js/jquery-1.9.0.min.js"></script>
<script type="text/javascript" src="../asset/js/zebra_datepicker.js"></script>
<link rel="stylesheet" href="../asset/css/default.css" type="text/css">
<script type="text/javascript" src="../asset/js/highchart/highcharts.js"></script>
<script type="text/javascript" src="../asset/js/highchart/modules/data.js"></script>
<script type="text/javascript" src="../asset/js/highchart/modules/exporting.js"></script>
<!-- copy yang bagian ini nop -->
<script>
function laporan(){
		var Tahun =$("#Tahun").val();
		var Bulan =$("#Bulan").val();
		document.forms.form.submit();
		return false;
	}
</script>
<!-- copy sampe sini nop -->

<div class='judul'>Laporan kamar</div>
<!-- Place this in the body of the page content -->
	<br>
		<a href="" class="print" onclick="window.print()">Print</a>
		<!-- copy yang bagian ini nop -->
			<form id="form" name="form" method="post" action="">
			<select type='text' class='span1' style='margin-left:10px;' id="Bulan" name="Bulan" placeholder="Bulan..." onchange="laporan()">
						<option id='Bulan' value=''>Bulan</option>
						<?php
							for($aksc=1;$aksc<=12;$aksc++)
							{ echo "<option id='Bulan' value='".$aksc."'";
								if(@$_POST['Bulan']==$aksc){
									echo 'selected';
								}
								echo ">".$aksc."</option>"; 
							}
						?>
					</select>
					
					<select type='text' class='span1' style='margin-left:10px;' id="Tahun" name="Tahun" placeholder="Kategori Suku Cadang..." onchange="laporan()">
						<option id='Tahun' value=''>Tahun</option>
						<?php
							$ambilt=mysql_query('select distinct(Year(Tgl_pembayaran)) as Tahun from pemesanan order by Tahun desc');
							while($at = mysql_fetch_array($ambilt))
							{ echo "<option id='Tahun' value='".$at['0']."'";
								if(@$_POST['Tahun']==$at[0]){
									echo 'selected';
								}
							echo ">".$at['0']."</option>"; }
						?>
					</select>
			</form>
	<!-- copy sampe sini nop -->
	
	<br>
	<table class="pemakaian" cellspacing="3" cellpadding="0" style="margin-top:20px" border='0' width="1000">
		<tr>
			<th colspan="4" style="text-align:center"><h1>Laporan Kamar</h1>
			<input type="hidden" name="bln" id="bln"/></th>
		</tr>
		<tr>
			<th width='350'>
				Dicetak pada tanggal <?php echo date('d M Y');?>
			</th>
		</tr>
		<tr>
			<th >Oleh <?php echo $_SESSION['admin-limas'];?></th>
		</tr>
	</table>
	<div id="grafik-holder">
		<div id="grafik" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
	</div>
	
	
<?php 
		include '../login/hub.php';
		// copy yg ini jugo. dari sini 
		if(isset($_POST['Tahun']) and !empty($_POST['Tahun'])){
			$laporanTahun=mysql_real_escape_string($_POST['Tahun']);
		}
		else{
			$laporanTahun=date('Y');
		}
		if(isset($_POST['Bulan']) and !empty($_POST['Bulan'])){
			$laporanBulan=mysql_real_escape_string($_POST['Bulan']);
		}
		else{
			$laporanBulan=date('m');
		}
		// sampe sini... bagian kuerinyo sesuaike yeh.. takutnyo gek yg kau la ado yg kau ubah.
		// month tu bearti ngeliat bulan yg samo yg ck diinput, ck itu jg yg year.
		
		$querydetail=mysql_query('SELECT * FROM  `kamar` WHERE  `id_kamar` IN (
					SELECT id_kamar FROM detail_pemesanan, pemesanan
						WHERE detail_pemesanan.id_pemesanan = pemesanan.id_pemesanan
						AND MONTH( tgl_check_in) = "'.$laporanBulan.'" and YEAR(tgl_check_in)="'.$laporanTahun.'"
						)');
		$querygrafik=mysql_query('
							SELECT kelas_kamar, COUNT( kelas_kamar ) 
							FROM  `kamar` 
							WHERE  `id_kamar` 
							IN (
								SELECT id_kamar
								FROM detail_pemesanan, pemesanan
								WHERE detail_pemesanan.id_pemesanan = pemesanan.id_pemesanan
								AND MONTH( tgl_check_in) = "'.$laporanBulan.'" and YEAR(tgl_check_in)="'.$laporanTahun.'"
							)
							GROUP BY  `kelas_kamar` 
						');
		$querygg=mysql_query('
							SELECT kelas_kamar, COUNT( kelas_kamar ) 
							FROM  `kamar` 
							GROUP BY  `kelas_kamar` 
						');
		$querypersen=mysql_query('
							SELECT kelas_kamar, COUNT( kelas_kamar ) 
							FROM  `kamar` 
							GROUP BY  `kelas_kamar` 
						');
		$t=0;
		while($tk_kamar=mysql_fetch_array($querypersen)){
			$jk_kmr[$t]=$tk_kamar[0];
			$tk_kmr[$t]=$tk_kamar[1];
			$t++;
		}
		$detail=mysql_num_rows($querydetail);
		if(empty($detail)){
			echo "<teks style='margin:0px auto; text-align:center;font-size:40pt;'>Tidak ada data! </teks>";
		}
		else{
?>
	<table class="detailpemakaian" id="detailpemakaian" cellspacing="0" cellpadding="0" style="margin-top:20px"   width="1000">
		<thead>
			<th width="50">No</th>
			<th width='350'>
				Kamar
			</th>
			<th width='350'>
				Kelas
			</th>
			<th width='350'>
				Harga
			</th>
			<th width='200'>Total</th>
		</thead>
		<tbody>
<?php 		$no=1;$total=0;$kmr=array();$nmkmr=array();
			while($detail=mysql_fetch_row($querydetail))
			{
?>
		<tr>
			<td width="50"><?php echo $no++;?></td>
			<td width='350'>
				<?php echo $nmkmr[$no-2]=$detail[1];?>
			</td>
			<td width='350'>
				<?php echo $detail[2]?>
			</td>
			<td width='200' style="text-align:right;padding-right:20px;">
				Rp <?php echo number_format($detail[3],0,',','.')?>
			</td>
			<td width='350' style="text-align:center;padding-right:20px;">
				<?php $bln=' AND month( tgl_pembayaran ) = "'.$laporanBulan.'"
							and Year(tgl_pembayaran)="'.$laporanTahun.'"';
					$kamar=mysql_query('SELECT COUNT( id_kamar ) 
						FROM detail_pemesanan, pemesanan
						WHERE detail_pemesanan.id_pemesanan = pemesanan.id_pemesanan
						AND id_kamar ='.$detail[0].$bln);
						$kamar=mysql_fetch_row($kamar); 
						$total+=$kamar[0];
						echo $kmr[$no-2]=$kamar[0];?> Kamar
			</td>
		</tr>
<?php 
			}
?>		
		<tr>
			<td width='350' colspan="4" style="text-align:right;padding-right:20px;">
				Total
			</td>
			<td width='200' style="text-align:center;padding-right:20px;">
				<?php echo $total;?> Kamar
			</td>
		</tr>
		<tr>
			<td width='350' colspan="4" style="text-align:right;padding-right:20px;">
				% Pemakaian Kamar
			</td>
			<td width='200' style="text-align:center;padding-right:20px;">
				<?php 	$total_kamar=mysql_query('SELECT COUNT( id_kamar ) from kamar');
						$total_kamar=mysql_fetch_row($total_kamar);
						echo number_format(($total*100/$total_kamar[0]),1,".","");?> %
			</td>
		</tr>
		</tbody>
	</table>
	<table class="pemakaian" cellspacing="3" cellpadding="0" style="margin-top:20px" border='0' width="1000">
		<tbody>
		<tr>
			<th width='200'>
				Total Kamar Terpakai berdasarkan kelas :
			</th>
			<th width='200'>
				<?php echo $total;
					echo " dari ".$total_kamar[0].' kamar yang tersedia. ( '.number_format(((($total)*100)/$total_kamar[0]), 1, ".", "").' % )'?> 
			</th>
		</tr>
		<?php
		$x=0;
		while($kelask=mysql_fetch_row($querygg))
			{
			$n_data=mysql_query('SELECT kelas_kamar, COUNT( kelas_kamar ) 
						FROM  `kamar` 
						WHERE  `id_kamar` 
						IN (
							SELECT id_kamar
							FROM detail_pemesanan, pemesanan
							WHERE detail_pemesanan.id_pemesanan = pemesanan.id_pemesanan
							AND MONTH( tgl_check_in) = "'.$laporanBulan.'" and YEAR(tgl_check_in)="'.$laporanTahun.'"
						)
						AND  `kelas_kamar` =  "'.$kelask[0].'"
						');
			$n_data=mysql_fetch_row($n_data);
			echo "
		<tr>
			<th width='200'>
				".$kelask[0]."
			</th>
			<th width='200'>
				 ".$n_data[1]." dari ".$kelask[1]." kamar yang tersedia.  ( ".number_format((($n_data[1]*100/$kelask[1])), 1, '.', '')." % )
			</th>
		</tr>";
		}
		
?>
		</tbody>
	</table>
<?php 	
		}		
?>

<script type="text/javascript">
$(function () {
	var percentage=10;
    $('#grafik').highcharts({
       chart: {
                type: 'column'
            },
            title: {
                text: 'Grafik Pemesanan'
            },
            subtitle: {
                text: 'Data Pemesanan Bulan <?php echo $laporanBulan.' - '.$laporanTahun?> '
            },
            xAxis: {
                categories: [
						<?php 
						$kat=0;
						while($kategori=mysql_fetch_array($querygrafik)){
							echo "'".$kategori[0]."'";
							//if($kategori[0]!=$jk_kmr[$kat])
							//{
								$data_kat[$kat]=($kategori[1]*100/$tk_kmr[$kat]);
							//}
							$kat++;
							if(next($kategori)!=null){
								echo ',';
								}
							else{
								
								}
							
						}?>
                ]
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Unit'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{series.name}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f} Pemesanan</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
			legend: {
                enabled: false
            },
			 tooltip: {
                pointFormat: '<span style="color:{series.color}">{point.key}</span>: <b>{point.y}%<br/>',
            },
            plotOptions: {
                column: {
					 allowPointSelect:false,
                    cursor: 'pointer',
                    pointPadding: 0.2,
                    borderWidth: 0,
					dataLabels: {
                            enabled: true,
                            format: '{point.y:.1f}%'
                        }
                }
            },
            series: [{
                name: 'Kamar',
				 colorByPoint: true,
                data: [<?php 
						for($kat=0;$kat<count($data_kat);$kat++){
							echo $data_kat[$kat].",";
							if(end($data_kat)){
								//echo ",";
								}
						}?>					]
    
            }]
    });
	
});
$(document).ready(function() {
	$('#bln').Zebra_DatePicker({
		view: 'years',
		 format: 'Y-m'
	});
}); 
</script>