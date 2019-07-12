	<?php
	session_start();


	$correcto = true;

	if(empty($_POST['nombre']) || empty($_POST['contrasena']) || empty($_POST['contrasena2']) ||empty($_POST['correo'])|| empty($_POST['fecha']) || empty($_POST['ciudad'])){
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
				$correcto = false;
		header('Location: registro.php?err=1');

	}
	
	if(preg_match("/^[a-zA-Z0-9]{3,15}$/", $nombre)==0){
				$correcto = false;
		header('Location: registro.php?err=4');


	}
	if(preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d_]{6,15}$/", $contrasena)==0){
				$correcto = false;
		header('Location: registro.php?err=2');
//(?=\S*[A-Z])(?=\S*[\d])(?=\S*[a-z])

	}
	if(!filter_var($correo, FILTER_VALIDATE_EMAIL)){
				$correcto = false;
		header('Location: registro.php?err=5');
	}

	if($fecha>=date("c",time())){
				$correcto = false;
		header('Location: registro.php?err=6');
	}
	


	$filename=  $_FILES["foto"]["name"];

	if ((($_FILES["foto"]["type"] == "image/jpeg") || ($_FILES["foto"]["type"] == "image/png")  || ($_FILES["foto"]["type"] == "image/pjpeg") || ($_FILES["foto"]["error"]==4)) && ($_FILES["foto"]["size"] < 20000000)){

	}
	else
	{
				$correcto = false;
		header('Location: registro.php?err=7');
	}

	if ($_FILES["foto"]["error"] && $_FILES["foto"]["error"]!=4) {
				$correcto = false;
		header('Location: registro.php?err=7');
	}

		

		$contador = "";
		$fichero = "perfil1.png";

		  if(file_exists("/opt/lampp/htdocs/daw/fotosPerfil/".$_FILES["foto"]["name"]))
		    {
		      $contador = 1;
		      while (file_exists("/opt/lampp/htdocs/daw/fotosPerfil/".$_FILES["foto"]["name"].$contador)) {
		      	echo "/opt/lampp/htdocs/daw/fotosPerfil/".$_FILES["foto"]["name"].$contador;
		      	$contador++;

		      }
		        if($_FILES["foto"]["error"]!=4) $fichero = $contador.$_FILES["foto"]["name"];
		      //move_uploaded_file($_FILES["foto"]["tmp_name"], "/opt/lampp/htdocs/daw/fotos/".$_FILES["foto"]["name"].$contador);
		    }

		    else
		    {
		      if($_FILES["foto"]["error"]!=4) $fichero = $_FILES["foto"]["name"];
		      //move_uploaded_file($_FILES["foto"]["tmp_name"], "/opt/lampp/htdocs/daw/fotos/".$_FILES["foto"]["name"]);
		    }
		  
 				


	/*	$sentencia = "INSERT INTO USUARIOS (IdUsuario,NomUsuario,Clave,Email,Sexo,FNacimiento,Ciudad,Pais,Foto,FRegistro,Estilo) VALUES (".$cont+1.",'".$nombre."','".$contrasena."','".$correo."',".$genero.",'".$fecha."','".$ciudad."','".$pais."','perfil1.png','".date("c",time())."',1)";
*/

	if($correcto){
	include 'connect.php';
		$sentencia = "INSERT INTO USUARIOS (NomUsuario,Clave,Email,Sexo,FNacimiento,Ciudad,Pais,Foto,FRegistro,Estilo) VALUES ('".$nombre."','".$contrasena."','".$correo."',".$genero.",'".$fecha."','".$ciudad."','".$pais."','".$fichero."','".date("c",time())."',1)";

		$paises = $mysqli->query($sentencia);
	
		if(!$paises || $mysqli->errno)
			die("Error: no se realizó la consulta: " .$mysqli->error);

		setcookie('idUsu',$mysqli->insert_id,(time() + 90 * 24 * 60 * 60));
		$_SESSION['IdUsu']=$mysqli->insert_id;
		$_SESSION['logged']=true;
		$_SESSION['nombre']=$_POST['nombre'];

		if($_FILES["foto"]["error"]!=4) move_uploaded_file($_FILES["foto"]["tmp_name"], "/opt/lampp/htdocs/daw/fotosPerfil/".$fichero);


		header('Location: respuestaRegistro.php');

	}
	?>