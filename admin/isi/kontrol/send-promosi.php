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
function runSMS($rsql) {
	$hostname = "localhost";
	$username = "root";
	$password = "";
	$dbname   = "sms-limas";
	$connect = mysql_connect($hostname,$username,$password) or die ("Error: could not connect to database");
	$db = mysql_select_db($dbname);
	$result = mysql_query($rsql) or die ('Gagal!'); 
	return $result;
	mysql_close($connect);
}
$items = rtrim($_POST['items'],",");
if(!empty($_POST['id_faq'])){
	$id=mysql_real_escape_string($_POST['id_faq']);
	$sql="select isi_promosi from promosi where id_promosi=".$id;
	$data=runSQL($sql);
	$data=mysql_fetch_row($data);
}
else{
	echo $pesan='Gagal! Data promo tidak ada!';
}
if($_POST['items']){
	$items = explode(',',$_POST['items']);
	foreach($items as $i=> $nope[]){
		if(!empty($nope[$i]))
		{
			$sql="insert into outbox(DestinationNumber, TextDecoded, CreatorID, Class) values
					('$nope[$i]','".strip_tags($data[0])."','Gammu', 0)";
			$sms=runSMS($sql);
			if(!$sms){
				$gagal+=1;
				$code[$gagal]=mysql_error();
			}
		}
		$i++;
	}
}
if($_POST['itemguest']){
	$items = explode(',',$_POST['itemguest']);
	foreach($items as $i=> $nope[]){
		if(!empty($nope[$i]))
		{
			$sql="insert into outbox(DestinationNumber, TextDecoded, CreatorID, Class) values
					('$nope[$i]','$data[0]','Gammu', 0)";
			$sms=runSMS($sql);
			if(!$sms){
				$gagal+=1;
				$code[$gagal]=mysql_error();
			}
		}
		$i++;
	}
}
else if($_POST['send']){
	echo $data[0];
	$SQL="select no_hp from pelanggan";
	$nope=runSQL($SQL);
	while($no_hape=mysql_fetch_array($nope)){
		if(!empty($no_hape[0]))
		{
			echo $no_hape[0].'<br>';
			$sql="insert into outbox(DestinationNumber, TextDecoded, CreatorID, Class) values
					('$no_hape[0]','$data[0]','Gammu', 0)";
			$sms=runSMS($sql);
			if($sms){
				$sukses+=1;}
			else{
				$gagal+=1;
				$code[$gagal]=mysql_error();
			}
		}
	}
}
else if($_POST['sendguest']){
	echo $data[0];
	$SQL="select no_telp from guestbook";
	$nope=runSQL($SQL);
	while($no_hape=mysql_fetch_array($nope)){
		if(!empty($no_hape[0]))
		{
			echo $no_hape[0].'<br>';
			$sql="insert into outbox(DestinationNumber, TextDecoded, CreatorID, Class) values
					('$no_hape[0]','$data[0]','Gammu', 0)";
			$sms=runSMS($sql);
			if($sms){
				$sukses+=1;}
			else{
				$gagal+=1;
				$code[$gagal]=mysql_error();
			}
		}
	}
}
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT" );
header("Last-Modified: " . gmdate( "D, d M Y H:i:s" ) . "GMT" );
header("Cache-Control: no-cache, must-revalidate" );
header("Pragma: no-cache" );
header("Content-type: text/x-json");
$json = "";
$json .= "{\n";
$json .= "sukses: ".$sukses.",\n";
$json .= "gagal: ".$gagal.",\n";
$json .= "total: ' $total',\n";
$json .= "}\n";
echo $json;
 ?>