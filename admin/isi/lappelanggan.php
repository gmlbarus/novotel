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
<div class='judul'>Laporan Pelanggan</div>
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
			<th colspan="5" style="text-align:center"><h1>Laporan Pelanggan</h1>
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
		<div id="grafik-total" style="min-width: 310px; height: 400px; margin: 0 auto;"></div>
	</div>
	<div id="grafik-holder">
		<div id="grafik" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
	</div>
	
<?php 
		include '../login/hub.php';
		$querydetail=mysql_query('select * from pelanggan');
		$detail=mysql_num_rows($querydetail);
		if(empty($detail)){
			echo "<teks style='margin:0px auto; text-align:center;font-size:40pt;'>Tidak ada data! </teks>";
		}
		else{$lk=0;$pr=0;
			$clset=mysql_query("SELECT GROUP_CONCAT(  `poin`order by poin desc SEPARATOR  ', ' ) ,
								GROUP_CONCAT(  `nama_cl` order by poin desc SEPARATOR  ', ' ) 
								FROM customer_level");
			$cl=mysql_fetch_row($clset);
			$cek=implode(',', array($cl[0],0));	$poin=explode(",",$cek);
			$nama=explode(",",$cl[1]);
?>
	<table class="detailpemakaian" id="detailpemakaian" cellspacing="0" cellpadding="0" style="margin-top:20px;"   width="1000">
		<thead>
			<th width="50">No</th>
			<th width='350'>
				ID Pelanggan
			</th>
			<th width='350'>
				Poin
			</th>
			<th width='350'>
				Level
			</th>
			<th width='200'>Jenis Kelamin</th>
			<th width='200'>Umur</th>
			<th width='200'>(x)Pesan</th>
			<th width='200'>Tanggal Lahir</th>
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
				<?php echo $detail[9];?>
			</td>
			<td width='350'>
				<?php 
					$j=count($poin)-1;
					for($i=count($poin)-2;$i>=0;$i--)
					{	
						if( $detail[9]>=$poin[$j]+1 and $detail[9]<=$poin[$i]){
							echo $cl=$nama[$j-1];break;
						}									
						else if($detail[9]>=$poin[0]){
							echo $cl=$nama[0];break;
						}$j--;
					}		
				?>
			</td>
			<td width='350'>
				<?php echo $detail[4];
					if($detail[4]=='perempuan'){
						$pr+=1;
					}else if($detail[4]=='laki-laki'){
						$lk+=1;
					}
				?>
			</td>
			<td width='200' style="text-align:right;padding-right:20px;">
				<?php $bday = new DateTime($detail[3]);
				// $today = new DateTime('00:00:00'); - use this for the current date
				$today = new DateTime(date('Y-m-d')); // for testing purposes
				$diff = $today->diff($bday);
				printf('%d Tahun<br>%d Bulan', $diff->y, $diff->m, $diff->d);?>
			</td>
			<td width='350' style="text-align:center;padding-right:20px;">
				<?php $q=mysql_query('SELECT COUNT( id_kamar ) 
							FROM detail_pemesanan, pemesanan
							WHERE detail_pemesanan.id_pemesanan = pemesanan.id_pemesanan
							AND pemesanan.id_pelanggan ='.$detail[0]);
						$psn=mysql_fetch_row($q);
						echo $psn[0];
				?> x Pesan
			</td>
			<td width='400' style="text-align:right;padding-right:20px;">
				<?php echo $detail[3];?>
			</td>
		</tr>
		
		
<?php 
			}
?>		
		
		<tr>
		</tbody>
	</table>
	<table class="pemakaian" cellspacing="5" cellpadding="0" style="margin-top:20px" border='0' width="1000">
		<tbody>
		<tr>
			<th width='200'>
				Total Pelanggan
			</th>
			<th width='200'>
				<?php echo $no-1;?> Orang
			</th>
		</tr>
		<tr>
			<th width='200'>
				Total Pelanggan Laki-laki
			</th>
			<th width='200'>
				<?php echo $lk;?> Orang
			</th>
		</tr>
		<tr>
			<th width='200'>
				Total Pelanggan Perempuan
			</th>
			<th width='200'>
				<?php echo $pr;?> Orang
			</th>
			<tr><th width='200'>
				Perbandingan Pelanggan Berdasarkan jenis kelamin :
			</th>
			<th width='200'>
				<?php echo ceil (($lk)/($no-1)*100);?> % laki-laki
			</th></tr>
			<tr><th width='200'>
				Perbandingan Pelanggan Berdasarkan jenis kelamin :
			</th>
			<th width='200'>
				<?php echo ceil (($pr)/($no-1)*100);?> % perempuan
			</th></tr>
		</tr>
		</tbody>
		</table>
		<table class="pemakaian" cellspacing="3" cellpadding="0" style="margin-top:20px" border='0' width="1000">
		<tbody>
		<tr>
			<th width='350'>
				Total Pemesanan 
			</th>
			<th width='350'>
				<?php $n=mysql_query('SELECT COUNT( id_pemesanan ) 
							FROM pemesanan');
						$n=mysql_fetch_row($n);
						echo $n[0];
				?>
			</th>
			<th width='350'>
				Total Pemesanan Bulan Ini
			</th>
			<th width='350'>
				<?php 
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
					
						$n=mysql_query('SELECT COUNT( id_pemesanan ) 
								FROM pemesanan
								WHERE MONTH( tgl_check_in) = "'.$laporanBulan.'" and Year(tgl_check_in)= "'.$laporanTahun.'"');
						$n=mysql_fetch_row($n);
						echo $n[0];
				?>
			</th>
		</tr>
		<tr>
			<th width='350'>
				Oleh Pelanggan Perempuan
			</th>
			<th width='350'>
				<?php $n=mysql_query('SELECT COUNT( id_pemesanan ) 
							FROM pemesanan, pelanggan where pemesanan.id_pelanggan=
							pelanggan.id_pelanggan and pelanggan.jenis_kelamin="perempuan"
							');
						$tp=mysql_fetch_row($n);
						echo $tp[0];
				?>
			</th>
			<th width='350'>
				Oleh Pelanggan Perempuan Bulan Ini
			</th>
			<th width='350'>
				<?php $n=mysql_query('SELECT COUNT( id_pemesanan ) 
							FROM pemesanan, pelanggan where pemesanan.id_pelanggan=
							pelanggan.id_pelanggan and pelanggan.jenis_kelamin="perempuan"
							and MONTH( tgl_check_in) = "'.$laporanBulan.'" and Year(tgl_check_in)= "'.$laporanTahun.'"');
						$p=mysql_fetch_row($n);
						echo $p[0];
				?>
			</th>
		</tr>
		<tr>
			<th width='550'>
				Oleh Pelanggan Laki-laki
			</th>
			<th width='350'>
				<?php $n=mysql_query('SELECT COUNT( id_pemesanan ) 
							FROM pemesanan, pelanggan where pemesanan.id_pelanggan=
							pelanggan.id_pelanggan and pelanggan.jenis_kelamin="laki-laki"
							');
						$tl=mysql_fetch_row($n);
						echo $tl[0];
				?>
			</th>
			<th width='550'>
				Oleh Pelanggan Laki-laki Bulan Ini
			</th>
			<th width='350'>
				<?php $n=mysql_query('SELECT COUNT( id_pemesanan ) 
							FROM pemesanan, pelanggan where pemesanan.id_pelanggan=
							pelanggan.id_pelanggan and pelanggan.jenis_kelamin="laki-laki"
							and MONTH( tgl_check_in) = "'.$laporanBulan.'" and Year(tgl_check_in)= "'.$laporanTahun.'"');
						$l=mysql_fetch_row($n);
						echo $l[0];
				?>
			</th>
		</tr>
		
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
                text: 'Grafik Pemesanan Oleh Pelanggan'
            },
            subtitle: {
                text: 'Data Pemesanan'
            },
            xAxis: {
                categories: [
						''
                ]
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Pesan'
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
            series: [{
                name: 'Laki-laki',
                data: [<?php 
						echo $l[0];?>]
            },{
                name: 'Perempuan',
                data: [<?php 
						echo $p[0];?>]
            }
			]
    });
});
$(function () {
    $('#grafik-total').highcharts({
       chart: {
                type: 'pie',
				plotBackgroundColor: null,
				plotBorderWidth: null,
				plotShadow: false
            },
            title: {
                text: 'Grafik Total Pelanggan'
            },
            subtitle: {
                text: 'Data Pemesanan Hotel Novotel'
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
				pie: {
					allowPointSelect: true,
					cursor: 'pointer',
					dataLabels: {
						enabled: true,
						format: '<b>{point.name}</b>: {point.percentage:.1f} %',
						style: {
							color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
						}
					}
				}
			},		
			series: [{
				type: 'pie',
				name: 'Total Pelanggan',
				data: [
					[ 'Laki-laki',<?php echo $lk?>],
					{
						name: 'Perempuan',
						y: <?php echo $pr?>,
						sliced: true,
						selected: true
					}
				]
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