			<div id="leftBar">
				<ul>
					<li><a href="?page=faq"><font color="#FFFFFF">FAQ</a></li></font>
					<li><a href="?page=guestbook"><font color="#FFFFFF">Guestbook</a></li></font>
				</ul>
			</div>
			
			<div id="rightContent">
				<h3>Frequently Asked Question</h3>
				<text class="teks"> Berikut ini merupakan pertanyaan-pertanyaan yang sering ditanyakan.</text>
				<table class="faq" cellspacing="0" cellpadding="0">
<?php include 'login/hub.php';
		$q=mysql_query('select * from faq');
		$no=1;
		while($r=mysql_fetch_array($q)){
			echo '<tr>
					<td width="20">'.$no.'.</td> 
					<td>'.$r[1].'</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>'.$r[2];
			
			echo '</td>
				</tr>';
			$no++;
		}
 ?>
				</table>
			</div>
