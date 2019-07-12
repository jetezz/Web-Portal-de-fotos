	<?php
	
session_start();

if(!isset($_SESSION["logged"])) header('Location: index.php');
	
include 'head.php';

	?>

<title>Respuesta album</title>
</head>
<body>
		<?php
include 'header.php';

	?>
	<h2>Confirmación</h2>

<section>
	
	<article>
	<?php

	$cantidad=$_GET['cantidad'];
	$resolucion=$_GET['resolucion'];
	$album=$_GET['albumes'];
	$color=$_GET['color'];
	$precio=$_GET['precio'];

	



  			include 'connect.php';

 			$sentencia = "SELECT * From ALBUMES a where a.IdAlbum=".$album;
  			$paises = $mysqli->query($sentencia);

  			if(!$paises || $mysqli->errno)
  				die("Error: no se realizó la consulta: " .$mysqli->error);


 				while($row = $paises->fetch_assoc()){

 					$titulo = $row['Titulo'];


 
 				}
 		


	echo "<p>Ha selecionado el album: $titulo <br/> Color: $color <br/>Resolucion: $resolucion </br>  Numero de copias: $cantidad</p>";
	
	echo "<p>El precio total del producto es $precio €  </p>";



	?>
	</article>
	
</section>


<footer>&copy; Copyright 2018 Emilio José Pérez Mariscal, Jesus Cuadra Tellez</footer>


	
</body>
</html>