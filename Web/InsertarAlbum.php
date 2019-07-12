	<?php
	session_start();
	$correcto=true;

	if(empty($_POST['titulo']) || empty($_POST['descripcion'])){
		header('Location: crearAlbum.php?err=1');
		$correcto=false;
	}
	

	$titulo=$_POST['titulo'];
	$desc=$_POST['descripcion'];
		include 'connect.php';
		$sentencia = "INSERT INTO ALBUMES (Titulo,Descripcion,Usuario) VALUES ('".$titulo."','".$desc."',{$_SESSION['IdUsu']})";
		echo $sentencia;
		$resp = $mysqli->query($sentencia);
	
		if(!$resp || $mysqli->errno)
			die("Error: no se realizó la consulta: " .$mysqli->error);

	


			if($correcto)header("Location: AlbumCreado.php?id=".$mysqli->insert_id);
			


	?>