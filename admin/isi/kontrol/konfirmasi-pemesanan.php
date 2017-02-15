<?php
error_reporting(0);
function runSQL($rsql) {
	$hostname = "localhost";
	$username = "root";
	$password = "";
	$dbname   = "limas_db";
	$connect = mysql_connect($hostname,$username,$password) or die ("Error: could not connect to database");
	$db = mysql_select_db($dbname);
	$result = mysql_query($rsql) or die ('Gagal!'); 
	return $result;
	mysql_close($connect);
}
if($_POST['items']){
	$items = rtrim($_POST['items'],",");
	$detail1= "DELETE FROM detail_pemesanan WHERE `id_pemesanan` IN ($items)";
	$resultdtl = runSQL($detail1);
	$detail = "DELETE FROM pemesanan WHERE `id_pemesanan` IN ($items)";
}
else if($_POST['confirm']){
	$items = rtrim($_POST['confirm'],",");
	$detail = "update pemesanan set status_pembayaran='lunas', status_konfirmasi='dikonfirmasi admin' WHERE status_konfirmasi='dikonfirmasi pelanggan' and `id_pemesanan` IN ($items)";
}
else if($_POST['cancel']){
	$items = rtrim($_POST['cancel'],",");
	$detail = "update pemesanan set status_pembayaran='batal', status_konfirmasi='batal' WHERE `id_pemesanan` IN ($items)";
}


$total = count(explode(",",$items)); 
$resultdetail = runSQL($detail);
$total = mysql_affected_rows($resultdetail);
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT" );
header("Last-Modified: " . gmdate( "D, d M Y H:i:s" ) . "GMT" );
header("Cache-Control: no-cache, must-revalidate" );
header("Pragma: no-cache" );
header("Content-type: text/x-json");
$json = "";
$json .= "{\n";
$json .= "query: '".$detail." - ".$pemakaian."',\n";
$json .= "total: $total,\n";
$json .= "}\n";
echo $json;
 ?>
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 <!---
 
 
 SELECT * FROM `kamar` WHERE id_kamar not IN (
					SELECT id_kamar	FROM pemesanan, detail_pemesanan
					WHERE pemesanan.id_pemesanan = detail_pemesanan.id_pemesanan and now() between tgl_check_in and tgl_check_out) or id_kamar in  (SELECT id_kamar	FROM pemesanan, detail_pemesanan 	WHERE status_konfirmasi='batal' and pemesanan.id_pemesanan = detail_pemesanan.id_pemesanan and now() between tgl_check_in and tgl_check_out)
					
					
					
					-->