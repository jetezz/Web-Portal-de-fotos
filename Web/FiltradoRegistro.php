<?php

	

	
	
	echo $_POST['ciudad'];
	if(empty($_POST['nombre']) || empty($_POST['contrasena']) || empty($_POST['contrasena2']) ||empty($_POST['correo']) || empty($_POST['genero']) || empty($_POST['fecha']) || empty($_POST['ciudad']) || empty($_POST['pais'])){
		header('Location: registro.php?err=3');
	}
		$nombre=$_POST['nombre'];
		$contrasena=$_POST['contrasena'];
		$contrasena2=$_POST['contrasena2'];
		$correo=$_POST['correo'];
		$genero=$_POST['genero'];
		$fecha=$_POST['fecha'];
		$ciudad=$_POST['ciudad'];
		$pais=$_POST['pais'];

	if($contrasena!=$contrasena2 ){
		header('Location: registro.php?err=1');
	}
	
	if(preg_match("/^[a-zA-Z0-9]{3,15}$/", $nombre)==0){
		header('Location: registro.php?err=4');


	}
	if(preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d_]{6,15}$/", $contrasena)==0){
		header('Location: registro.php?err=2');
//(?=\S*[A-Z])(?=\S*[\d])(?=\S*[a-z])

	}
	if(!filter_var($correo, FILTER_VALIDATE_EMAIL)){
		header('Location: registro.php?err=5');
	}

	if($fecha>=date("c",time())){
		header('Location: registro.php?err=6');
	}
	




	echo "<p>Nombre de usuario: $nombre</p>";	
	echo "<p>Correo electronico: $correo</p>";
	echo "<p>Fecha de nacimiento: $fecha</p>";
	echo "<p>Ciudad: $ciudad</p>";
	echo "<p>Genero: $genero</p>";
	echo "<p>Pais: $pais</p>";

	
	
	



	?>