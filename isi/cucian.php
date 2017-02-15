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
		 <form method=POST action='input_laundry.php'>
		<div align="center">
    <h3>Berikut Daftar Harga Laundry</h3></div></div>
    <br />
    &ensp;
    <div style="font:16px/18px Arial;" >
      <em>Daftar Paket dan Harga ini merupakan ketentuan dari Pemilik dan tidak dapat diganggu gugat</em>
      <p><em>Harga dan Paket dapat berubah sewaktu-waktu</p></em>
    </div>
<img src="asset/images/baju.jpg" width="150" height="150" title="Pakaian Biasa" /><img src="asset/images/cuci.png" width="150" height="150" title="Jas" /></div>
	<tr>
		
    <tr>
      <td> Jas : Rp 35.000 /pcs || </td>
      <td> Jeans : Rp 15.000/pcs ||</td>
      <td> Selimut : Rp 10.000/pcs ||</td>
      <td> Boneka : Rp 8.000/pcs ||</td>
      <td> Pakaian Biasa : Rp 6.000/pcs </td> 
    </tr></div>
<?php
	echo "<p> Name : </p> <input type='text' name='name' size='50'/></font>";
	echo "<p> Room Number : </p> <input type='text' name='room' size='50'/></font>";
	echo "<p> Phone Number : </p> <input type='text' name='phone' size='50'/></font><br/>";
	 echo "<p> Pilih Pakaian : </p>";
     echo "<select name='pilih'>
               <option>Jas</option>
               <option>Jeans</option>
               <option>Selimut</option>
               <option>Boneka</option>
               <option>Pakaian Biasa</option></select><br>
			   <input type=submit value='Submit'> | <input type=button value=Cancel onclick=self.history.back()>";
    

   


               
   ?>
     </form>
						</td>
					</tr>
				</form>
			</div>

	
			