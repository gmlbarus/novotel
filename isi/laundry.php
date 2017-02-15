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
			<img src="asset/images/25.jpg" height="250" width="850">
				 <form method=POST action='input_test.php'>
     <?php
	echo "<p> Name : </p> <input type='text' name='name' size='50'/></font>";
	echo "<p> Room Number : </p> <input type='text' name='room' size='50'/></font>";
	echo "<p> Phone Number : </p> <input type='text' name='phone' size='50'/></font><br/>";
	
     echo "<p> Menu Sarapan Pagi : </p>";
     echo"<input type=checkbox name=pagi[] value='PAKET A (Nasi Goreng Spesial + Susu) Rp 45.000,00 per porsi'>PAKET A (Nasi Goreng Spesial + Susu) Rp 45.000,00 per porsi<br>
       <input type=checkbox name=pagi[] value='PAKET B (Bubur Ayam + Teh Hangat) Rp 25.000,00 per porsi'>PAKET B (Bubur Ayam + Teh Hangat) Rp 25.000,00 per porsi<br>
       <input type=checkbox name=pagi[] value='PAKET C (Nasi Uduk + Kopi Hangat) Rp 25.000,00 per porsi'>PAKET C (Nasi Uduk + Kopi Hangat) Rp 25.000,00 per porsi<br>
	   <input type=checkbox name=pagi[] value='PAKET D (Mie Goreng + Teh Hangat) Rp 30.000,00 per porsi'>PAKET D (Mie Goreng + Teh Hangat) Rp 30.000,00 per porsi<br><br><br>
	   
	   <p> Menu Makan Siang : <br><br>
	   <input type=checkbox name=siang[] value='PAKET A (Nasi + Es Teh + Air Mineral + Ikan Gurame Bakar/Goreng + Sayur Kemangi) Rp 80.000,00 per porsi'>PAKET A (Nasi + Es Teh + Air Mineral + Ikan Gurame Bakar/Goreng + Sayur Kemangi) Rp 80.000,00 per porsi<br>
	   
       <input type=checkbox name=siang[] value='PAKET B (Nasi + Jus Alpukat + Ayam Goreng + Ikan Bandeng + Sayur Lalap + Pindang Tulang) Rp 125.000,00 per porsi'>PAKET B (Nasi + Jus Alpukat + Ayam Goreng + Ikan Bandeng + Sayur Lalap + Pindang Tulang) Rp 125.000,00 per porsi<br>
	   
       <input type=checkbox name=siang[] value='PAKET C (Nasi + Ikan Goreng + Rendang + Pindang Daging + Sayur Asem + Jus Mangga) Rp 150.000,00 per porsi'>PAKET C (Nasi + Ikan Goreng + Rendang + Pindang Daging + Sayur Asem + Jus Mangga) Rp 150.000,00 per porsi<br>
	   
	   <input type=checkbox name=siang[] value='PAKET D (Nasi Goreng + Ayam Bakar + Ikan Tuna Sambal + Gule Kambing + Air Mineral + Jus Jambu) Rp 175.000,00 per porsi'>PAKET D (Nasi Goreng + Ayam Bakar + Ikan Tuna Sambal + Gule Kambing + Air Mineral + Jus Jambu) Rp 175.000,00 per porsi<br><br><br>
	   
	   
	   <p> Menu Makan Malam : <br><br>
	   <input type=checkbox name=malam[] value='PAKET A (Nasi + Sate) Rp 45.000,00 per porsi'>PAKET A (Nasi + Sate) Rp 45.000,00 per porsi<br>
	   
       <input type=checkbox name=malam[] value='PAKET B (Nasi + Pecel Lele) Rp 50.000,00 per porsi'>PAKET B (Nasi + Pecel Lele) Rp 50.000,00 per porsi<br>
	   
       <input type=checkbox name=malam[] value='PAKET C (Nasi + Steak) Rp 45.000,00 per porsi'>PAKET C (Nasi + Steak) Rp 45.000,00 per porsi<br>
	   
	   <input type=checkbox name=malam[] value='PAKET D (Nasi + Mie Tumis) Rp 30.000,00 per porsi'>PAKET D (Nasi + Mie Tumis) Rp 30.000,00 per porsi<br><br><br>
	   
	   <p> Menu Dessert : <br><br>
	   <input type=checkbox name=dessert[] value='Pudding (Rp 25.000,00/porsi)'>Pudding (Rp 25.000,00/porsi)<br>
	   
       <input type=checkbox name=dessert[] value='Yoghurt (Rp 45.000,00/porsi)'>Yoghurt (Rp 45.000,00/porsi)<br>
	   
       <input type=checkbox name=dessert[] value='Chocolate (Rp 50.000,00/porsi)'>Chocolate (Rp 50.000,00/porsi)<br>
	   
	   <input type=checkbox name=dessert[] value='Macarone + Ice Cream (Rp 65.000,00/porsi)'>Macarone + Ice Cream (Rp 65.000,00/porsi)<br><br>
	   
	   
	   <p> Komentar Tentang Anda<br/>
    <textarea name=descript cols=35 rows=10></textarea><br/><br>
	
       <input type=submit value='Submit'> | <input type=button value=Cancel onclick=self.history.back()>";
     
     ?>
     </form>
						</td>
					</tr>
				</form>
			</div>
