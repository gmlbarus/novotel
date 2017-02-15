<?php
	session_start();
	if(!isset($_SESSION['LimasHotel']) or empty($_SESSION['LimasHotel']))
	{
		echo "<script>document.location='../../';</script>";
	}
	include '../../login/hub.php';
	$query=mysql_query("select id_pelanggan from pelanggan where username='".$_SESSION['LimasHotel']."'");
	if($query)
	{	$get=mysql_fetch_row($query);
		}
	else{ echo'error';
	}
// A list of permitted file extensions
$allowed = array('png', 'jpg', 'gif', 'bmp');

if(isset($_FILES['upl']) && $_FILES['upl']['error'] == 0){

	$extension = pathinfo($_FILES['upl']['name'], PATHINFO_EXTENSION);

	if(!in_array(strtolower($extension), $allowed)){
		echo '{"status":"error"}';
		exit;
	}

	if(move_uploaded_file($_FILES['upl']['tmp_name'], 'foto/'.$get[0].'.jpg')){
		echo '{"status":"success"}';
		exit;
	}
}

echo '{"status":"error"}';
exit;