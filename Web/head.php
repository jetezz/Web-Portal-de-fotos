<?php
if(isset($_COOKIE['nombre']) && isset($_COOKIE['contrasena'])){
		
		$ultima_visita = isset($_COOKIE['ultima_visita']) ? $_COOKIE['ultima_visita'] : " nunca";		
		setcookie('ultima_visita',date("c"),(time() + 90 * 24 * 60 * 60));


		if(!isset($_SESSION['logged'])){
			
			 

  			include 'connect.php';

 			$sentencia = "SELECT * From USUARIOS u, ESTILOS e where u.Estilo=e.IdEstilo";
  			$paises = $mysqli->query($sentencia);

  			if(!$paises || $mysqli->errno)
  				die("Error: no se realizó la consulta: " .$mysqli->error);

 				$entra = false;

 				while($row = $paises->fetch_assoc()){
 					if($row['NomUsuario']==$_COOKIE['nombre']&& $row['Clave']==$_COOKIE['contrasena']){
					
					$_SESSION['logged']=true;
					$_SESSION['nombre']=$row['NomUsuario'];
					$_SESSION['IdUsu']=$row['IdUsuario'];
					$_SESSION['estilo']=$row['Fichero'];
					
					$entra = true;


					}


 
 				}
 				if (!$entra) {
 					header('Location: cerrarSesion.php');
 				}
 		
		}
			
}





setcookie('ultima_visita',date("c"),(time() + 90 * 24 * 60 * 60));
echo <<<hereDOC

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
hereDOC;

	if(isset($_SESSION['estilo'])){//Si el usuario esta logueado

		if($_SESSION['estilo']=='negro.css'){ //si el usuario tiene como estilo negro

			echo '<link rel="stylesheet" type="text/css" href="css/negro.css" media="screen" title="Clasico">';
	
 	 		echo '<link rel="alternate stylesheet" type="text/css" href="css/estilo.css" media="screen" title="Estilo de alto contraste">';
 		}else{								//Si el usuario tiene como estilo el blanco
 			echo '<link rel="stylesheet" type="text/css" href="css/estilo.css" media="screen" title="Clasico">';
	
 	 		echo '<link rel="alternate stylesheet" type="text/css" href="css/negro.css" media="screen" title="Estilo de alto contraste">';
 		}

	}else{

		echo '<link rel="stylesheet" type="text/css" href="css/estilo.css" media="screen" title="Clasico">';
	
 		echo '<link rel="alternate stylesheet" type="text/css" href="css/negro.css" media="screen" title="Estilo de alto contraste">';
 	}
echo <<<hereDOC

  <link rel="stylesheet" type="text/css" href="print.css" media="print" />


hereDOC;
?>