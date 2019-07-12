	<?php
	
	session_start();

if(!isset($_SESSION["logged"])) header('Location: index.php');
	
include 'head.php';

	?>

<title>misAlbumes</title>
</head>
<body>
		<?php
include 'header.php';

	?>
	<h2>Mis albumes</h2>

	<section class="login">

	<article>


		
		 <?php

  			include 'connect.php';

 			$sentencia = "SELECT * From ALBUMES a where a.Usuario = ".$_COOKIE['idUsu'];
  			$paises = $mysqli->query($sentencia);

  			if(!$paises || $mysqli->errno)
  				die("Error: no se realizó la consulta: " .$mysqli->error);

 				 $probar=0;

 				while($row = $paises->fetch_assoc()){
 					echo <<< hereDOC
 					<div>
 					<p>Album: <a href="verAlbum.php?nombre={$row['IdAlbum']}">{$row['Titulo']}</a></p>
 					<p>Descripción: {$row['Descripcion']}</p>
 					</div><br>


hereDOC;
 
 				}
 		?>
 </select>
</article>
</section>

<footer>&copy; Copyright 2018 Emilio José Pérez Mariscal, Jesus Cuadra Tellez</footer>


	
</body>
</html>