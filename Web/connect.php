  		<?php
	$mysqli = new mysqli("localhost","root","1234","pibd");
  			if($mysqli->connect_errno)
  				die("Error: no se pudo conectar: " .$mysqli->connect_errno);
?>