<!doctype html public "-//W3C//DTD HTML 4.0 //EN">
<html>
<head>
       <title> Pesanan Laundry </title>
</head>
<body>
<strong>Data Pesanan Laundry anda </strong><br>
------------------------------------<br>
<?php
$name=$_POST['name'];
$room=$_POST['room'];
$phone=$_POST['phone'];
$pilihan=$_POST['pilihan'];

echo"<pre>";
echo "<table border='2'>";
echo "<tr>";
echo "<td>";
echo"Name         	    : $name <br></td></tr>";
echo "<tr>";
echo "<td>";
echo"Room Number        : $room <br></td>";
echo "<tr>";
echo "<td>";
echo"Phone Number       : $phone <br></td>";
echo "<tr>";
echo "<td>";
echo"Pilihan Anda       : $pilihan <br></td>";
echo"</tr>";
echo"<td align='center'><a href='index.php'>Kembali ke awal</td>";
echo"</pre>";
echo "</table>";
?>
</body>
</html>