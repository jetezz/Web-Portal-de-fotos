	<?php
	session_start();
		
		$existe=false;
		

	


	if(isset($_POST['recordar'])){
		$check=true;
	}else{
		$check=false;
	}




 include 'connect.php';

  $sentencia = "SELECT * From USUARIOS u, ESTILOS e where u.Estilo = e.IdEstilo";
  $fotos = $mysqli->query($sentencia);

  if(!$fotos || $mysqli->errno)
  	die("Error: no se realizó la consulta: " .$mysqli->error);





if(isset($_POST['nombre']) && isset($_POST['contrasena'])){

		$nombre=$_POST['nombre'];
		$pass=$_POST['contrasena'];

		  while($row = $fotos->fetch_assoc()){
			if($row['NomUsuario']==$nombre && $row['Clave']==$pass){
				
				$existe=true;
				$_SESSION['estilo']=$row['Fichero'];
				setcookie('estilo',$_SESSION['estilo'],(time() + 90 * 24 * 60 * 60));
				setcookie('idUsu',$row['IdUsuario'],(time() + 90 * 24 * 60 * 60));
				$_SESSION['IdUsu']=$row['IdUsuario'];

			}
			
			
				
			}
			if ($existe==true){

				if($check){//Si queremos recordar la cuenta recordaremos el nombre y el usuario

					setcookie('nombre',$_POST['nombre'],(time() + 90 * 24 * 60 * 60));
					setcookie('contrasena',$_POST['contrasena'],(time() + 90 * 24 * 60 * 60));


				}
					

				$_SESSION['logged']=true;
				$_SESSION['nombre']=$_POST['nombre'];

					


			
				
				header('Location: usuario.php');
			}else{

				//-en caso de que no este en la base de datos
				
				header('Location: entrar.php?err=1');
			}

		}else{
			//en caso de que accedan por url sin datos
			header('Location: entrar.php?err=1');
		}

  


		


		
		
		?>