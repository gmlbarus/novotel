<?php 
	
	echo "<center>";
	for($i=0;$i<=360;){
		echo '
			<p STYLE="font-size:30pt;
			-webkit-transform: rotate('.$i.'deg);
			-moz-transform: rotate('.$i.'deg);
			-o-transform: rotate('.$i.'deg);
			-ms-transform: rotate('.$i.'deg);
			transform: rotate('.$i.'deg);
			margin:110px auto;text-align:justify;
			position:absolute;">AKSES DIREKTORI TIDAK DIPERBOLEHKAN!</p>
		';
		$i=$i+40;
	}
	echo "</center>";
?>