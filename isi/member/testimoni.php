<?php
error_reporting (0);
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
	
	$sql = mysql_query("SELECT testimonial.id_testimoni,testimonial.id_rep, testimonial.tanggal, pelanggan.username, 
		testimonial.judul, testimonial.isi, testimonial.id_pelanggan, pelanggan.id_pelanggan
		FROM testimonial, pelanggan where testimonial.id_pelanggan=pelanggan.id_pelanggan 
		and testimonial.id_pelanggan=".$get[0]);
	$count=mysql_num_rows($sql);
?>
			<div id="leftBar" style="background: url(img/bg_kiri.png) repeat-y;">
				<ul>
					<li><a href="?page=profile">Profile</a></li>
					<li><a href="?page=testimonial">Testimoni</a></li>
					<li><a href="?page=transaction">Transaction</a></li>
					<li><a href="?page=service">Service</a></li>
				</ul>
			</div>
			<div id="rightContent">
				<h3>Testimoni</h3>
				<p class="teks gestteks">Tinggalkan pesan/kritik/saran serta pertanyaan Anda. Admin akan segera membalas !</p>				
				<div class="clear" ></div>
				<div id="testimoni">
					<div id="jawab">
						<p class="jawaban">Testimoni</p>
						<p class="waktu"> Oleh Admin pada <?php echo date('d-m-Y');?></p>
						<hr>
							Gunakan fitur ini untuk berkomunikasi dengan Admin. Anda dapat memberikan saran, kritik, maupun pertanyaan melalui fitur ini. 
							Admin akan membalas pesan Anda.
					</div>
					<div class="clear" ></div>
<?php 
	if($count>0){
		while($data=mysql_fetch_array($sql)){
			if($data[1]==0){
				echo '	<div id="tanya">
						<p class="pertanyaan">'.$data[4].'</p>
						<p class="waktu"> Oleh '.$data[3].' pada '.$data[2].'</p>
						<hr>
						'.$data[5].'
					</div>
					<div class="clear" ></div>';
			}
			else{
				echo '	<div id="jawab">
						<p class="jawaban">'.$data[4].'</p>
						<p class="waktu"> Oleh Admin pada '.$data[2].'</p>
						<hr>
						'.$data[5].'
					</div>
					<div class="clear" ></div>';
			}
		}
	}
?>
				</div>			
				<form method="post" name="testimoni" id="signup" action="isi/member/simpan_testimoni.php">
				<table style="padding-left:10px;">
					<tr>
						<td width="80px"><b>Judul	</b></td>
						<td>: <input type="text" name='judul' id='judul' class="sedang" maxlength='30' autofocus required placeholder='Judul...'/></td>
					</tr>
					<tr>
						<td><b>Isi</b></td>
						<td>: <textarea type="text" name='isi' id='isi' width="400" maxlength='100' required placeholder='Tuliskan saran, kritik atau pertanyaan ...'></textarea></td>
					</tr>
					<tr>
						<td colspan="2">
							<input type='hidden' name='dari' value='<?php echo $get[0];?>' />
							<input type='hidden'  name='sub' value='reply' />
							<input type="submit" class="button" name="Submit" value="Simpan" />
							<input type="reset" class="button" name='reset' id='reset' value='reset'/>
						</td>
					</tr>
				</table>
				</form>
			</div>
