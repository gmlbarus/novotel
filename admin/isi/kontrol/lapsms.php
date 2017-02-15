<?php  
error_reporting(0);
function runSQL($rsql) {
	$hostname = "localhost";
	$username = "root";
	$password = "";
	$dbname   = "sms-limas";
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

if (!$sortname) $sortname = 'id';
if (!$sortorder) $sortorder = 'desc';
		if($_POST['query']!=''){
			$where = "WHERE `".$_POST['qtype']."` LIKE '%".$_POST['query']."%' ";
		} else {
			$where ='';
		}
		if($_POST['letter_pressed']!=''){
			$where = "WHERE `".$_POST['qtype']."` LIKE '".$_POST['letter_pressed']."%' ";	
		}
		if($_POST['letter_pressed']=='#'){
			$where = "WHERE `".$_POST['qtype']."` REGEXP '[[:digit:]]' ";
		}
$sort = "ORDER BY $sortname $sortorder";

if (!$page) $page = 1;
if (!$rp) $rp = 10;

$start = (($page-1) * $rp);

$limit = "LIMIT $start, $rp";

$sql = "SELECT * FROM sentitems $where $sort $limit";
$result = runSQL($sql);

$total = countRec('id','sentitems',$where);

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
	if ($rc) $json .= ",";
		$json .= "\n{";
		$json .= "id:'".$row[11]."',";
		$json .= "cell:['".$row[11]."','".$row[5]."'";
		$json .= ",'".$row[14]."','".$row['SendingDateTime']."','".$row[3]."','".$row[6]."','".$row[7]."','".$row[9]."'";
		$json .= ",'".addslashes($row[5])."']";
		$json .= "}";
	$rc = true;
}
$json .= "]\n";
$json .= "}";
echo $json;
?>