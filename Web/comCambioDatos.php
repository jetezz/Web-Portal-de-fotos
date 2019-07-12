	<?php
	session_start();

	if(empty($_POST['nombre']) || empty($_POST['contrasena']) ||empty($_POST['correo'])|| empty($_POST['fecha']) || empty($_POST['ciudad'])){
		header('Location: misDatos.php?err=3');
	}
		$nombre=$_POST['nombre'];
		$contrasena=$_POST['contrasena'];
		$correo=$_POST['correo'];
		$genero=$_POST['genero'];
		$fecha=$_POST['fecha'];
		$ciudad=$_POST['ciudad'];
		$pais=$_POST['pais'];
		$nuevoNombre="";
		$fotoinicial="";
		$borrarfoto=false;
		if(empty($_POST['borrarfoto'])){
			$borrarfoto = false;
		}else{
			$borrarfoto = true;
		}


	include 'connect.php';
	$correcto=false;
	$sentencia1 = "SELECT * FROM USUARIOS where IdUsuario=".$_SESSION['IdUsu'];
	$resp = $mysqli->query($sentencia1);
	 if(!$resp || $mysqli->errno)
		 die("Error: no se realizó la consulta: " .$mysqli->error);

	while($row = $resp->fetch_assoc()){

			if($row['Clave']==$contrasena){
				$correcto=true;
				if($row['NomUsuario']!=$nombre) $nuevoNombre="NomUsuario='".$nombre."',";
			}
			$fotoinicial = $row['Foto'];

		}
		if(!$correcto) header('Location: misDatos.php?err=1');


	if(preg_match("/^[a-zA-Z0-9]{3,15}$/", $nombre)==0){
		$correcto = false;
		header('Location: misDatos.php?err=4');


	}
	if(preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d_]{6,15}$/", $contrasena)==0){
		$correcto = false;
		header('Location: misDatos.php?err=2');
//(?=\S*[A-Z])(?=\S*[\d])(?=\S*[a-z])

	}
	if(!filter_var($correo, FILTER_VALIDATE_EMAIL)){
		$correcto = false;
		header('Location: misDatos.php?err=5');
	}

	if($fecha>=date("c",time())){
		$correcto = false;
		header('Location: misDatos.php?err=6');
	}
	


	if ((($_FILES["foto"]["type"] == "image/jpeg") || ($_FILES["foto"]["type"] == "image/png")  || ($_FILES["foto"]["type"] == "image/pjpeg") || ($_FILES["foto"]["error"]==4) ) && ($_FILES["foto"]["size"] < 20000000)){

	}
	else
	{	
		$correcto = false;
		header('Location: misDatos.php?err=7');
	}
	
	$fichero = "perfil1.png";
;
	if ($_FILES["foto"]["error"]) {
		if($_FILES["foto"]["error"]!=4){
		$correcto = false;
		header('Location: misDatos.php?err=7');

		}
	}

		if($fotoinicial!="perfil1.png") unlink("/opt/lampp/htdocs/daw/fotosPerfil/".$fotoinicial);

		$contador = "";
		

		  if(file_exists("/opt/lampp/htdocs/daw/fotosPerfil/".$_FILES["foto"]["name"]))
		    {
		      $contador = 1;
		      while (file_exists("/opt/lampp/htdocs/daw/fotosPerfil/".$_FILES["foto"]["name"].$contador)) {
		     
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
	
 					  
 			if($borrarfoto)	$fichero = "perfil1.png";


	/*	$sentencia = "INSERT INTO USUARIOS (IdUsuario,NomUsuario,Clave,Email,Sexo,FNacimiento,Ciudad,Pais,Foto,FRegistro,Estilo) VALUES (".$cont+1.",'".$nombre."','".$contrasena."','".$correo."',".$genero.",'".$fecha."','".$ciudad."','".$pais."','perfil1.png','".date("c",time())."',1)";
*/

		$sentencia = "UPDATE USUARIOS SET ".$nuevoNombre." Email='".$correo."',Sexo='".$genero."',FNacimiento='".$fecha."',Ciudad='".$ciudad."',Pais='".$pais."',Foto='".$fichero."' where IdUsuario=".$_SESSION['IdUsu'];
		
		$paises = $mysqli->query($sentencia);
	
		if(!$paises || $mysqli->errno)
			die("Error: no se realizó la consulta: " .$mysqli->error);

		if($_FILES["foto"]["error"]!=4 && !$borrarfoto) move_uploaded_file($_FILES["foto"]["tmp_name"], "/opt/lampp/htdocs/daw/fotosPerfil/".$fichero);


			if($correcto) header('Location: respuestaRegistro.php');


	?>