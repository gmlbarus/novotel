<?php
session_start();
echo "<p> Pesanan Anda </p>";
$name = $_SESSION['result']['name'];
$room = $_SESSION['result']['room'];
$phone = $_SESSION['result']['phone'];
$pagi = $_SESSION['result']['pagi'];
$siang = $_SESSION['result']['siang'];
$malam = $_SESSION['result']['malam'];
$dessert = $_SESSION['result']['dessert'];
$descript = $_SESSION['result']['descript'];
$selected_pagi = "";
foreach ($pagi as $nilai) 
$selected_pagi = substr($selected_pagi, 0, -2);
				////// fild
		echo "<p>Name				: $name</p>";
		echo "<p>Room Number		: $room </p>";
		echo "<p>Phone Number				: $phone</p>";
		///// pagi
		echo "<p> Sarapan Pagi 				:</p>";
foreach ($pagi as $nilai) {
echo "<p>&clubs; $nilai </p>";}
		
		/// siang
		echo "<p>Makan Siang 				:</p>";
foreach ($siang as $nilai) {
echo "<p>&clubs; $nilai </p>";}

		/// malam
echo "<p>Makan Malam 				:</p>";
foreach ($malam as $nilai) {
echo "<p>&clubs; $nilai </p>";}

		/// dessert
echo "<p> Dessert 				:</p>";
foreach ($dessert as $nilai) {
echo "<p>&clubs; $nilai </p>";}

////komentar
echo "<p>Komentar Tentang Anda : $descript </p>" ;
echo "<p> Terima Kasih telah Memesan $name !!! :)</p>" ;
echo "<p>&nbsp;</p>";
echo "<p>&nbsp;</p>";
echo "<p>&nbsp;</p>";

?>


</td>
					</tr>
				</form>
			</div>
