<?php
echo "<p> Pesanan Anda </p>";
echo "<p> ----------------------------- </p>";
$name = $_POST['name'];
$room = $_POST['room'];
$phone = $_POST['phone'];
$pagi = $_POST['pagi'];
$siang = $_POST['siang'];
$malam = $_POST['malam'];
$dessert = $_POST['dessert'];
$descript = $_POST['descript'];
$selected_pagi = "";
foreach ($pagi as $nilai) 
$selected_pagi = substr($selected_pagi, 0, -2);
				////// fild
		echo "<p>Name				: $name</p>";
		echo "<p>Room Number		: $room </p>";
		echo "<p>Phone Number				: $phone</p>";
		
		///// pagi
		echo "<p> ----------------------------- </p>";
		echo "<p> Sarapan Pagi 				:</p>";
foreach ($pagi as $nilai) {
echo "<p>&clubs; $nilai </p>";}
		
		/// siang
		echo "<p> -------------------------------------- </p>";
		echo "<p>Makan Siang 				:</p>";
foreach ($siang as $nilai) {
echo "<p>&clubs; $nilai </p>";}

		/// malam
		echo "<p> ----------------------------- </p>";
echo "<p>Makan Malam 				:</p>";
foreach ($malam as $nilai) {
echo "<p>&clubs; $nilai </p>";}

		/// dessert
		echo "<p> ----------------------------- </p>";
echo "<p> Dessert 				:</p>";
foreach ($dessert as $nilai) {
echo "<p>&clubs; $nilai </p>";}

////komentar
echo "<p> ----------------------------- </p>";
echo "<p>Komentar Tentang Anda : $descript </p>" ;
echo "<p> Terima Kasih telah Memesan $name !!! :)</p></tr>" ;
echo "<p>&nbsp;</p>";
echo "<p>&nbsp;</p>";
echo "<p>&nbsp;</p>";

?>