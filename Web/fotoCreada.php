	<?php
session_start();

if(!isset($_SESSION["logged"])) header('Location: index.php');
	
include 'head.php';

	?>

<title>Creacion album</title>
</head>
<body>
		<?php
include 'header.php';

	?>
	<h2>Crear album</h2>

<section class="login">

	<article>
		<?php
		if (isset($_GET['id'])) {
			# code...
		


  			include 'connect.php';

 			$sentencia = "SELECT *, f.Titulo'TitFoto', a.Titulo'TitAlb', f.Descripcion'desc' From FOTOS f, ALBUMES a where f.IdFoto = ".$_GET['id']." and f.Album = a.IdAlbum and a.Usuario=".$_SESSION['IdUsu'];
 		
  			$resp = $mysqli->query($sentencia);

  			if(!$resp || $mysqli->errno)
  				die("Error: no se realizó la consulta: " .$mysqli->error);

 				if(mysqli_num_rows($resp)>0){

 				while($row = $resp->fetch_assoc()){
 				
				 
					echo "<p>Su foto<b> {$row['TitFoto']} </b>se ha creado correctamente</p>";
					echo "<p>Descripcion: <b> {$row['desc']}</b></p>";
					echo "<p>Fecha: <b> {$row['Fecha']}</b></p>";
					echo "<p>Fichero: <b> {$row['Fichero']}</b></p>";
					echo "<p>Album: <b> {$row['TitAlb']}</b></p>";
					
					echo "<a href='index.php'><button>Volver</button></a>";
 				}
 				}else{
 					echo "<p id='alerta'>¡Esta imagen no es tuya o no ha sido creada!<p>";
 				}

		}else{
			header('Location: index.php');
		}

		?>


	</article>


</section>


<footer>&copy; Copyright 2018 Emilio José Pérez Mariscal, Jesus Cuadra Tellez</footer>


	
</body>
</html>