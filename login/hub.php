<?php

	$sand='root';
	$pengg='root';
	$db='limas_db';
	$lewat=mySQL_escape_string($sand);
	$lewat2=mySQL_escape_string($pengg);
	$lewat3=mySQL_escape_string($db);

	if(@$db=mysql_connect("localhost", $lewat2, $lewat))
	{
		mysql_select_db($lewat3, $db) or header('location: error.php');
	}
	else
	{
		@session_start();
		session_destroy();
		header('location: error.php');
	}

?>
