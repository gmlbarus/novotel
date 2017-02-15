<?php
require '../../../login/hub.php';
session_start();
if(isset($_POST['unb']) && !empty($_POST['unb']))
{
	$sp = mysql_real_escape_string($_POST['unb']);
	$sql = mysql_query("select * from admin where username='$sp'");
	if(mysql_num_rows($sql))
	{
		echo '<STRONG>'.$sp.'</STRONG> is already in use.';
	}
	else
	{
		echo 'OK';
	}
}
elseif(isset($_POST['UN']) && !empty($_POST['UN'])) {
	
	$un = mysql_real_escape_string($_POST['UN']);
	$update=mysql_query("update admin set username='$un' WHERE username='".$_SESSION['admin-limas']."'");
	if($update){
		$_SESSION['admin-limas']=$un;
		echo 'oke';
	}
	else{
		echo '<script>alert("'.mysql_error().'");</script>';
	}
}
?>
