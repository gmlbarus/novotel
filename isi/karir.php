<div id="leftBar">
				<ul>
					<li><a href="?"><font color="#FFFFFF">Hotel Novotel</a></li></font>
					<li><a href="?page=galeri"><font color="#FFFFFF">Galery</a></li></font>
					<li><a href="?page=award"><font color="#FFFFFF">Menu Makanan</a></li></font>
					<li><a href="?page=karir"><font color="#FFFFFF">Laundry</a></li></font>
					<li><a href="?page=kalender"><font color="#FFFFFF">Calender</a></li></font>
				</ul>
			</div>
		<div id="RightContent">
		<form method=POST action='isi/kontrol/simpan_karir.php'>
		<div align="center">
		<img src="asset/images/baju.jpg" width="150" height="150" title="Pakaian Biasa" /><img src="asset/images/cuci.png" width="150" height="150" title="Jas" /></div>
		<tr>
		    
<?php
	echo "<p>Daftar Harga Paket Laundry</p>";
	echo "<p>Harga dan Paket dapat berubah sewaktu-waktu</p>";
	echo "<p>Jas : Rp 35.000 /pcs || Jeans : Rp 15.000/pcs || Selimut : Rp 10.000/pcs || Boneka : Rp 8.000/pcs || Pakaian Biasa : Rp 6.000/pcs </p>";
	echo "<p> Name : </p> <input type='text' name='name' size='50'/></font>";
	echo "<p> Room Number : </p> <input type='text' name='room' size='50'/></font>";
	echo "<p> Phone Number : </p> <input type='text' name='phone' size='50'/></font><br/>";
	 echo "<p> Pilih Pakaian : </p>";
     echo "<select name='pilih'>
               <option>Jas</option>
               <option>Jeans</option>
               <option>Selimut</option>
               <option>Boneka</option>
               <option>Pakaian Biasa</option></select><br><br><br>
			   <input type=submit value='Submit'> | <input type=button value=Cancel onclick=self.history.back()>";
                   
   ?>
     </form>
						</td>
					</tr>
				</form>
			</div>
			<br>