<?php
include 'login/hub.php';include '../../login/hub.php';
		$i = 1;		
		$where=''; $where2=''; $where3='';
		if(isset($_GET['perhalaman']) && !empty($_GET['perhalaman'])){
			$jml_per_halaman=mysql_real_escape_string($_GET['perhalaman']);
		}else{	$jml_per_halaman=10;	}
		if(isset($_GET['kelas']) && !empty($_GET['kelas'])){
			if($_GET['kelas']!='ALL'){
			$kls=$_GET['kelas'];
			$where .= ' where kelas_kamar="'.mysql_real_escape_string($_GET['kelas']).'"';}
		}
		if(isset($_GET['tgl']) && !empty($_GET['tgl']))
		{
			$where3 .= ' AND "'.mysql_real_escape_string($_GET['tgl']).'" BETWEEN  `tgl_check_in` AND  `tgl_check_out` ';
		}else{ $where3 .= ' AND "'.date('Y-m-d').'" BETWEEN  `tgl_check_in` AND  `tgl_check_out` ';
		}
		if(isset($_GET['tgl2']) && !empty($_GET['tgl2']))
		{
			$where3 .= ' AND "'.mysql_real_escape_string($_GET['tgl2']).'" BETWEEN  `tgl_check_in` AND  `tgl_check_out` ';
		}	
		else{
			$datetime = new DateTime('tomorrow');
			$where3 .= ' AND "'.$datetime->format('Y-m-d').'" BETWEEN  `tgl_check_in` AND  `tgl_check_out` ';
		}	
		if(empty($where)){ $where2 .=' where ';}
		else{$where2.=' And ';}
		
		$where2 .= " id_kamar NOT IN (
					SELECT id_kamar	FROM pemesanan, detail_pemesanan
					WHERE pemesanan.id_pemesanan = detail_pemesanan.id_pemesanan
						".$where3.") OR id_kamar IN (
					SELECT id_kamar FROM pemesanan, detail_pemesanan
						WHERE status_konfirmasi =  'batal'
						AND pemesanan.id_pemesanan = detail_pemesanan.id_pemesanan
						".$where3.")";
//----------------------------------------------------------------------------------

		$jml_data = mysql_num_rows(mysql_query("
		SELECT kelas_kamar, COUNT( kelas_kamar ) 
FROM  `kamar` ".$where.$where2." group by kelas_kamar"));
		$jml_halaman = ceil($jml_data / $jml_per_halaman);
		
		if(isset($_GET['halaman'])) {
			$halaman = mysql_real_escape_string($_GET['halaman']);
			$i = ($halaman - 1) * $jml_per_halaman  + 1;
			$limit=" LIMIT ".(($halaman - 1) * $jml_per_halaman).", $jml_per_halaman";
		}else {
			$halaman=1;
			$limit=" LIMIT 0, $jml_per_halaman";
		}
		$sql="SELECT kelas_kamar, COUNT( kelas_kamar ) , harga_kamar
FROM  `kamar` 
 ".$where.$where2." group by kelas_kamar".$limit;
		$query = mysql_query($sql);
		
		$n_data = mysql_num_rows($query);
		if($n_data!=0){
			echo '<table border=1>';
			$xi=0;
			while($data = mysql_fetch_array($query)) 
			{
				echo '
				<tr id="kamar-holder">
				<td>
					<div id="">
						<a href="asset/images/kamar/'.$data[0].'.jpg" class="fancybox" title="Lorem ipsum dolor sit amet">
							<img src="asset/images/kamar/'.$data[0].'.jpg" width="175"/></a>
				</td>
				<td>
					<p class="judul">'.$data[0].' </p>
				</td>
				<td>
						<div class="harga"> Harga permalam Rp '.number_format($data[2],0,',','.').' </div>
				</td>
				<td>
						<div class="kamar-holder action">
							<div style="float:left">							
							
							<input type="number" style="width:150px;" name="kamar[]" id="kamar_'.$xi++.'" class="pendek" max="'.$data[1].'"
								min="0" placeholder="Tersedia '.$data[1].' kamar" Title="Tersedia '.$data[1].' kamar">
							<input type="hidden" id="kelas" name="kelas[]" value="'.$data[0].'">
						</div>	</div>
				</td>
				</tr>
					</div>';
			}
			echo '</table>';
			$hal.='kelas='.$_GET['kelas'];
			$hal.='&tgl='.@$_GET['tgl'];
			$hal.='&tgl2='.@$_GET['tgl2'];
			$hal.='&perhalaman='.$_GET['perhalaman'];
			echo '<div class="clear"></div>';
			echo '<div class="pagination">';
			echo 'Menampilkan '.$n_data.' data pada halaman '.$halaman.' dari .'.$jml_halaman.' halaman dan '.$jml_data.' data.<br>';
			echo '<ul>';
			if($jml_halaman>1){
				for($i = 1; $i <= $jml_halaman; $i++) { 
					if($_GET['halaman']==$i){
						echo '<li class="halaman active" id="'.$i.'"><a href="?page=kamar&'.$hal.'&halaman='.$i.'">'.$i.'</a></li>';
					}
					else{ echo '<li class="halaman" id="'.$i.'"><a href="?page=kamar&'.$hal.'&halaman='.$i.'">'.$i.'</a></li>';
					}
					
				}
			}  
			echo '</ul>
						<input type="submit" class="button button-reserve" name="submit" id="submit" value="Reserve"/>
						<input type="reset" class="button button-reserve" name="reset" id="reset" value="Reset"/>
			</div>';
		}		
		else{
			echo 'Data tidak ada.';
		}
		?>