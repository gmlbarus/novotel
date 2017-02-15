<?php
error_reporting(0);
function runSQL($rsql) {
	$hostname = "localhost";
	$username = "root";
	$password = "";
	$dbname   = "limas_db";
	$connect = mysql_connect($hostname,$username,$password) or die ("Error: could not connect to database");
	$db = mysql_select_db($dbname);
	$result = mysql_query($rsql) or die ('Gagal!'.mysql_error()); 
	return $result;
	mysql_close($connect);
}

function countRec($fname,$tname,$where) {
$sql = "SELECT count($fname) FROM $tname $where";
$result = runSQL($sql);
while ($row = mysql_fetch_array($result)) {
return $row[0];
}
}
$page = $_POST['page'];
$rp = $_POST['rp'];
$sortname = $_POST['sortname'];
$sortorder = $_POST['sortorder'];
$where = ' where pemesanan.id_pelanggan = pelanggan.id_pelanggan ';
if (!$sortname) $sortname = 'id_pemesanan';
if (!$sortorder) $sortorder = 'desc';
		if($_POST['query']!=''){
			$where .= "and `".$_POST['qtype']."` LIKE '%".$_POST['query']."%' ";
		} else {
			$where .='';
		}
		if($_POST['letter_pressed']!=''){
			$where .= " and`".$_POST['qtype']."` LIKE '".$_POST['letter_pressed']."%' ";	
		}
		if($_POST['letter_pressed']=='#'){
			$where .= "`and ".$_POST['qtype']."` REGEXP '[[:digit:]]' ";
		}
$sort = "ORDER BY $sortname $sortorder";

if (!$page) $page = 1;
if (!$rp) $rp = 10;

$start = (($page-1) * $rp);

$limit = "LIMIT $start, $rp";

$sql = "SELECT * FROM pemesanan, pelanggan $where $sort $limit";
$result = runSQL($sql);

$total = countRec('id_pemesanan','pemesanan, pelanggan',$where);

header("Expires: Mon, 26 Jul 1997 05:00:00 GMT" );
header("Last-Modified: " . gmdate( "D, d M Y H:i:s" ) . "GMT" );
header("Cache-Control: no-cache, must-revalidate" );
header("Pragma: no-cache" );
header("Content-type: text/x-json");
$json = "";
$json .= "{\n";
$json .= "page: $page,\n";
$json .= "total: $total,\n";
$json .= "rows: [";
$rc = false;
while ($row = mysql_fetch_array($result)) {
	$kamar=mysql_query("select count(*) from detail_pemesanan where id_pemesanan=".$row[0]);
	$kamar=mysql_fetch_row($kamar);;
	if ($rc) $json .= ",";
		$json .= "\n{";
		$json .= "id:'".$row[0]."',";
		$json .= "cell:['".$row[0]."', '".$row[8]."','".$row[5]."'";
		$json .= ",'".$row[4]."','".$row[9]."','".$row[10]."','".$kamar[0]."',' Rp ".number_format($row[6],0,',','.')."','".$row[7]."','".$row[2]."'";
		$json .= ",'".addslashes($row[3])."', '".$row[14]."']";
		$json .= "}";
	$rc = true;
}
$json .= "]\n";
$json .= "}";
echo $json;
?>