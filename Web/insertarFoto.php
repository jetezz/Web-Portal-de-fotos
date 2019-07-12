	<?php
	session_start();
	$correcto=true;
	if(empty($_POST['titulo']) || empty($_POST['descripcion']) || empty($_POST['textoAlternativo'])){
		header('Location: anadirFotoAlbum.php?err=1');
		$correcto=false;
	}
	

	$titulo=$_POST['titulo'];
	$desc=$_POST['descripcion'];
	$fecha=$_POST['fecha'];
	$pais=$_POST['pais'];
	$alt=$_POST['textoAlternativo'];
	$id= $_POST['id'];


	if ((($_FILES["foto"]["type"] == "image/jpeg") || ($_FILES["foto"]["type"] == "image/png")  || ($_FILES["foto"]["type"] == "image/pjpeg")) && ($_FILES["foto"]["size"] < 20000000)){

	}
	else
	{
				$correcto = false;
		header("Location: anadirFotoAlbum.php?err=7&id=".$id);
	}

	if ($_FILES["foto"]["error"]) {
				$correcto = false;
		header("Location: anadirFotoAlbum.php?err=7&id=".$id);
	}

		

		$contador = "";
		$fichero = "";

		  if(file_exists("/opt/lampp/htdocs/daw/fotos/".$_FILES["foto"]["name"]))
		    {
		      $contador = 1;
		      while (file_exists("/opt/lampp/htdocs/daw/fotos/".$_FILES["foto"]["name"].$contador)) {
		      	echo "/opt/lampp/htdocs/daw/fotos/".$_FILES["foto"]["name"].$contador;
		      	$contador++;

		      }
		        $fichero = $contador.$_FILES["foto"]["name"];
		      //move_uploaded_file($_FILES["foto"]["tmp_name"], "/opt/lampp/htdocs/daw/fotos/".$_FILES["foto"]["name"].$contador);
		    }

		    else
		    {
		      $fichero = $_FILES["foto"]["name"];
		      //move_uploaded_file($_FILES["foto"]["tmp_name"], "/opt/lampp/htdocs/daw/fotos/".$_FILES["foto"]["name"]);
		    }








		include 'connect.php';
		$sentencia = "INSERT INTO FOTOS (Titulo,Descripcion,Fecha,Pais,Album,Fichero,Alternativo,FRegistro) VALUES ('".$titulo."','".$desc."','".$fecha."',".$pais.",".$id.",'".$fichero."','".$alt."','".date("c",time())."')";

		$resp = $mysqli->query($sentencia);
	
		if(!$resp || $mysqli->errno)
			die("Error: no se realizó la consulta: " .$mysqli->error);

	

		move_uploaded_file($_FILES["foto"]["tmp_name"], "/opt/lampp/htdocs/daw/fotos/".$fichero);

			if($correcto)header("Location: fotoCreada.php?id=".$mysqli->insert_id);
			


	?>