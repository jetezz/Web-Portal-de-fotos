	<?php
	
session_start();

if(!isset($_SESSION["logged"])) header('Location: index.php');
	


		
		if (isset($_POST['estilo'])) {
					include 'connect.php';

 			$sentencia = "UPDATE USUARIOS SET estilo=".$_POST['estilo']." where IdUsuario=".$_SESSION['IdUsu'];
  			$paises = $mysqli->query($sentencia);

  			if(!$paises || $mysqli->errno)
  				die("Error: no se realizó la consulta: " .$mysqli->error);


 			$sentencia2 = "SELECT * from ESTILOS where IdEstilo = ".$_POST['estilo'];
  			$paises2 = $mysqli->query($sentencia2);

  			if(!$paises2 || $mysqli->errno)
  				die("Error: no se realizó la consulta: " .$mysqli->error);

  			while($row = $paises2->fetch_assoc()){

 					$_SESSION['estilo'] = $row['Fichero'];

 				}

		}


		
		


		

include 'head.php';

	?>

<title>Respuesta album</title>
</head>
<body>
		<?php
include 'header.php';

	?>
	<h2>Respuesta confirmacion</h2>

<section>
	
	<article>
		<?php
		$titulo;
		if (isset($_POST['estilo'])) {
					include 'connect.php';

 			$sentencia = "SELECT * From ESTILOS a where a.IdEstilo=".$_POST['estilo'];
  			$paises = $mysqli->query($sentencia);

  			if(!$paises || $mysqli->errno)
  				die("Error: no se realizó la consulta: " .$mysqli->error);


 				while($row = $paises->fetch_assoc()){

 					$titulo = $row['Nombre'];

 				}


		
			echo "<p> Has seleccionado el estilo <b>".$titulo."</b> </p>";
		}


		
		


		?>
	
	</article>
	
</section>


<footer>&copy; Copyright 2018 Emilio José Pérez Mariscal, Jesus Cuadra Tellez</footer>


	
</body>
</html>