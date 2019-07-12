	<?php
session_start();

	if(!isset($_SESSION["logged"])) header('Location: index.php');
include 'head.php';

	?>

<title>Usuario</title>
</head>
<body>
		<?php
include 'header.php';

	?>
	<h2>Usuario</h2>

<section class="cuenta">
	<article>
	<div class="datos">

	<p>¿Estas seguro de que quieres borrar tu cuenta? Los siguientes álbumes se perderán: </p>
	<ul>
		<?php
		include 'connect.php';
		  $usu = $_SESSION['IdUsu'];
		  $sentencia = "SELECT * FROM ALBUMES a WHERE a.Usuario=".$usu;
	
		  $resp = $mysqli->query($sentencia);

		  if(!$resp || $mysqli->errno)
		  	die("Error: no se realizó la consulta: " .$mysqli->error);

		

		  while($row = $resp->fetch_assoc()){

		  	echo "<a href='verAlbum.php?nombre={$row['IdAlbum']}'><li>{$row['Titulo']}</li></a>";
		  		$sentenciaNum = "SELECT count(*)'Num' FROM FOTOS f where f.Album={$row['IdAlbum']}";
		  		
		  		$respNum = $mysqli->query($sentenciaNum);
		  		 if(!$respNum || $mysqli->errno)
		 		 	die("Error: no se realizó la consulta: " .$mysqli->error);

		 		 while($fila = $respNum->fetch_assoc()){
		 		 	echo "<p>Con {$fila['Num']} fotos";
		 		 }

		  }

	
		?>
		
		
	</ul>
<?php

	include 'connect.php';

	$usu = $_SESSION['IdUsu'];
 	$sentenciatotal= "SELECT *, count(*)'NumFotos' FROM FOTOS f,  ALBUMES a WHERE f.Album=a.IdAlbum and a.Usuario=".$usu;

 	$resp = $mysqli->query($sentenciatotal);
 	  if(!$resp || $mysqli->errno)
		  	die("Error: no se realizó la consulta: " .$mysqli->error);


		  while($row = $resp->fetch_assoc()){

		  	echo "<p>¡Se perderán un total de {$row['NumFotos']} fotos! ¿Estas seguro de que quieres continuar?</p>";
		  }


 	?>
 	<form action="borrandoUsuario.php " method="POST" enctype="multipart/form-data">
 	<label for="pass"> Contraseña: </label><input required id="pass" type="password" name="contrasena" placeholder="Contraseña"><br><br>
 	<input type="submit" name="" value="confirmar">
 	<a href="index.php"><button>Cancelar</button></a>
 	</form>
	
	

	<?php

				if(isset($_GET['err'])){
					$valor = $_GET['err'];
					 
					
					if ($valor==1) {
						echo "<p id='alerta'>Debes poner tu contraseña actual para actualizar tus datos<p>";
		
					}
					if ($valor==2){
						echo "<p id='alerta'>La contraseña tiene que tener almenos una mayuscula, una minuscula y un número y debe ser entre 6-15 caracteres<p>";
					}
					



					
				}


		?>
	</article>
</section>


<footer>&copy; Copyright 2018 Emilio José Pérez Mariscal, Jesus Cuadra Tellez</footer>


	
</body>
</html>