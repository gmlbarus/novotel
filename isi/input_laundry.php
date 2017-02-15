<?php
session_start();
echo "<p> Pemesanan Laundry </p>";
$name = $_SESSION['result']['name'];
$room = $_SESSION['result']['room'];
$phone = $_SESSION['result']['phone'];
$pilih = $_SESSION['result']['pilih'];
$selected_pilih = "";
$selected_pilih = substr($selected_pilih, 0, -2);
				////// fild
		echo "<p> DATA ANDA SUDAH MASUK KEDATABASE KAMI </p>";		
		echo "<p>Name				: $name</p>";
		echo "<p>Room Number		: $room </p>";
		echo "<p>Phone Number		: $phone</p>";
		echo "<p> Pilih Pakaian 	: $pilih</p>";
echo "<p> Terima Kasih telah Memesan $name !!! :)</p>" ;
echo "<p>&nbsp;</p>";
echo "<p>&nbsp;</p>";
echo "<p>&nbsp;</p>";

?>


</td>
					</tr>
				</form>
			</div>