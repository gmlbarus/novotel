<script type="text/javascript" src="../asset/js/jquery-1.9.0.min.js"></script>
<script type="text/javascript" src="../asset/js/zebra_datepicker.js"></script>
<link rel="stylesheet" href="../asset/css/default.css" type="text/css">
<script type="text/javascript" src="../asset/js/highchart/highcharts.js"></script>
<script type="text/javascript" src="../asset/js/highchart/modules/data.js"></script>
<script type="text/javascript" src="../asset/js/highchart/modules/exporting.js"></script>

<script>
function laporan(){
		var Tahun =$("#Tahun").val();
		var Bulan =$("#Bulan").val();
		document.forms.form.submit();
		return false;
	}
</script>
<div class='judul'>Laporan Pemesanan</div>
<!-- Place this in the body of the page content -->
	<br>
		<a href="" class="print" onclick="window.print()">Print</a>
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
	<br>
	<table class="pemakaian" cellspacing="3" cellpadding="0" style="margin-top:20px" border='0' width="1000">
		<tr>
			<th colspan="4" style="text-align:center"><h1>Laporan Pemesanan</h1>
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
		$querydetail=mysql_query('select * from pemesanan where MONTH( tgl_check_in) = "'.$laporanBulan.'" and YEAR(tgl_check_in)="'.$laporanTahun.'"
						OR MONTH( tgl_check_out) = "'.$laporanBulan.'" and YEAR( tgl_check_out) = "'.$laporanTahun.'"
						');
		$detail=mysql_num_rows($querydetail);
		
		if(empty($detail)){
			echo "<teks style='margin:0px auto; text-align:center;font-size:40pt;'>Tidak ada data! </teks>";
		}
		else{
?>
	<table class="detailpemakaian" id="detailpemakaian" cellspacing="0" cellpadding="0" style="margin-top:20px;"   width="1000">
		<thead>
			<th width="50">No</th>
			<th width='350'>
				ID Pemesanan
			</th>
			<th width='350'>
				Banyak Kamar
			</th>
			<th width='350'>
				Lama Menginap
			</th>
			<th width='200'>Status Pembayaran</th>
		</thead>
		<tbody>
<?php 		$no=1;$total=0;$kmr=array();$nmkmr=array();
			$lunas=0;$blmlunas=0;$batal=0;
			while($detail=mysql_fetch_row($querydetail))
			{
?>
		<tr>
			<td width="50"><?php echo $no++;?></td>
			<td width='350'>
				<?php echo $detail[0];?>
			</td>
			<td width='350'>
				<?php 
				$kamar=mysql_query('SELECT COUNT( id_kamar ) 
						FROM detail_pemesanan, pemesanan
						WHERE detail_pemesanan.id_pemesanan = pemesanan.id_pemesanan
						AND pemesanan.id_pemesanan ='.$detail[0]);
						$kamar=mysql_fetch_row($kamar); 
						$total+=$kamar[0];
						echo $kmr[$no-2]=$kamar[0];?> Kamar
			</td>
			<td width='200' style="text-align:right;padding-right:20px;">
				<?php $date1=date_create($detail[2]);$date2=date_create($detail[3]);
									$diff=date_diff($date1,$date2);
									$hr=$diff->format("%d");
									$lama=(string)$hr;
									echo '<br>'.$lama.' Hari';
									echo '<br>'.$detail[2].' : '.$detail[3].'<br/>';?>
			</td>
			<td width='350' style="text-align:center;padding-right:20px;">
				<?php echo $detail[4];
						if($detail[4]=='lunas'){$lunas+=1;
						}
						elseif($detail[4]=='belum lunas'){$blmlunas+=1;
						}
						elseif($detail[4]=='batal'){$batal+=1;
						}
				
				?>
			</td>
		</tr>
<?php 
			}
?>		
		<tr>
			<td width='350' colspan="4" style="text-align:right;padding-right:20px;">
				<b>Total
			</td>
			<td width='200' style="text-align:center;padding-right:20px;">
				<b><?php echo $no-1;?> Pemesanan
			</td>
		</tr>
		<tr>
			<th width='350' colspan="4" style="text-align:right;padding-right:20px;">
				Total Pemesanan Lunas
			</th>
			<th width='200' style="text-align:center;padding-right:20px;">
				<?php echo $lunas;?> Pemesanan
			</th>
		</tr>
		<tr>
			<th width='350' colspan="4" style="text-align:right;padding-right:20px;">
				Total Pemesanan Belum Lunas
			</th>
			<th width='200' style="text-align:center;padding-right:20px;">
				<?php echo $blmlunas;?> Pemesanan
			</th>
		</tr>
		<tr>
			<th width='350' colspan="4" style="text-align:right;padding-right:20px;">
				Total Pemesanan Batal
			</th>
			<th width='200' style="text-align:center;padding-right:20px;">
				<?php echo $batal;?> Pemesanan
			</th>
		</tr>
		<tr>
			<th width='350' colspan="4" style="text-align:right;padding-right:20px;">
				Persentase Rata-rata banyak kamar yang dipesan
			</th>
			<th width='200' style="text-align:center;padding-right:20px;">
				<?php 	$total_kamar=mysql_query('SELECT COUNT( id_kamar ) from kamar');
						$total_kamar=mysql_fetch_row($total_kamar);
						echo (($no-1)/$total_kamar[0]*100);?> %
			</th>
		</tr>
		</tr>
			<th width='350' colspan="4" style="text-align:right;padding-right:20px;">
				Rata-rata Banyaknya Pemesanan Perhari
			</th>
			<th width='200' style="text-align:center;padding-right:20px;">
				<?php echo ceil(($no-1)/30);?> Pemesanan
			</th>
		</tr>
		</tbody>
	</table>
<?php 	
		}		
?>

<script type="text/javascript">
$(function () {
    $('#grafik').highcharts({
       chart: {
                type: 'column'
            },
            title: {
                text: 'Grafik Pemesanan Kamar'
            },
            subtitle: {
                text: 'Data Pemesanan Hotel Limas'
            },
            xAxis: {
                categories: [
						'Lunas','Belum Lunas','Batal'
                ]
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Unit'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f} Pemesanan</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0,
					dataLabels: {
                            enabled: true,
                            format: '{point.y:.1f}'
                        }
                }
            },
			legend: {
                enabled: false
            },
            series: [{
                name: 'Pemesanan',
				colorByPoint: true,
                data: [<?php 
						echo $lunas.", ".$blmlunas.", ".$batal;?>						]
    
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