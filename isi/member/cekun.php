<?php
include '../../login/hub.php';
if(isset($_POST['un']))
{
	$un = mysql_real_escape_string($_POST['un']);
	$sql = mysql_query("select * from pelanggan where username='$un'");
	if(mysql_num_rows($sql))
	{
		echo $un;
	}
	else
	{
		echo 'oke';
	}
}

?>