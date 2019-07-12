	<?php
	session_start();

	$contrasena=$_POST['contrasena'];
	include 'connect.php';
	$correcto=false;
	$sentencia1 = "SELECT * FROM USUARIOS where IdUsuario=".$_SESSION['IdUsu'];
	$resp = $mysqli->query($sentencia1);
	 if(!$resp || $mysqli->errno)
		 die("Error: no se realizó la consulta: " .$mysqli->error);
		while($row = $resp->fetch_assoc()){
			if($row['Clave']==$contrasena){
				$correcto=true;
			}
			else{
				header('Location: confirmarBorrado.php?err=1');
			}

		}


	
	if($correcto==true){

	include 'connect.php';

	$sentencia1 = "DELETE FROM USUARIOS where IdUsuario=".$_SESSION['IdUsu'];
	$resp = $mysqli->query($sentencia1);
	 if(!$resp || $mysqli->errno)
		 die("Error: no se realizó la consulta: " .$mysqli->error);
	
session_destroy();

setcookie('nombre','',-450000);
setcookie('contrasena','',-450000);
setcookie('ultima_visita','',-450000);

			header('Location: respuestaDarseBaja.php');
		}


	?>