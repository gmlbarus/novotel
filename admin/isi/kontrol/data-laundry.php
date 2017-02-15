<?php
 
$server = "localhost" ;
$username = "root" ;
$password = "" ;
$database = "db_limas"; 


echo '<h3>Data User</h3>
<table>
<tr>
<th>name</th>
<th>Room</th>
<th>Phone</th>
<th>Pilihan</th>
</tr>
<tr>';


$i=0; //inisialisasi untuk penomoran data
//perintah untuk menampilkan data, id_brg terbesar ke kecil
$tampil = "SELECT * FROM user ORDER BY id_user DESC";
//perintah menampilkan data dikerjakan
$sql = mysql_query($tampil);
 
//tampilkan seluruh data yang ada pada tabel user
while($data = mysql_fetch_array($sql))
 {
 
 $i++;
 
 echo "
 <td>".$i."</td>
 <td>".$data[name]."</td>
 <td>".$data[room]."</td>
 <td>".$data[phone]."</td>
 <td>".$data[pilih]."</td>
 </tr>";
 }
echo '</table>';
 
?>