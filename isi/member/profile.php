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
?>
			<div id="leftBar" style="background: url(img/bg_kiri.png) repeat-y;">
				<ul>
					<li><a href="?page=edit">Edit Profile</a></li>
					<li><a href="?page=photo">Edit Photo</a></li>
					<li><a href="?page=password">Edit Password</a></li>
					<li><a href="?page=testimonial">Testimonial</a></li>
					<li><a href="?page=transaction">Transaction</a></li>
					<li><a href="?page=service">Service</a></li>
				</ul>
			</div>
			<div id="rightContent">
			<h3>Profile</h3>
				<p class="teks gestteks">Your profile :</p>				
				<div class="clear" ></div>
				<table>
					<tr>
						<td rowspan="9"><img src="isi/member/foto/<?php echo $get[0]?>.jpg" width="300" height="300"></td>
						<td width="150">Username</td>
						<td width="250">: <?php echo $get[1]?></td>
					</tr>
					<tr>
						<td width="150">Nama</td>
						<td>: <?php echo $get[2]?></td>
					</tr>
					<tr>
						<td width="150">Jenis Kelamin</td>
						<td>: <?php echo $get[4]?></td>
					</tr>
					<tr>
						<td width="150">Tanggal Lahir</td>
						<td>: <?php echo $get[3]?></td>
					</tr>
					<tr>
						<td width="150">No HP</td>
						<td>: <?php echo $get[6]?></td>
					</tr>
					<tr>
						<td width="150">Email</td>
						<td>: <?php echo $get[7]?></td>
					</tr>
					<tr>
						<td width="150">Alamat</td>
						<td>: <?php echo $get[5]?></td>
					</tr>
					<tr>
						<td width="150">Poin</td>
						<td>: <?php echo $get[9]?></td>
					</tr>
				</table>
			</div>
