	<?php
	
	session_start();

if(!isset($_SESSION["logged"])) header('Location: index.php');
	
include 'head.php';

	?>

<title>Configurar</title>
</head>
<body>
		<?php
include 'header.php';

	?>
	<h2>Configurar</h2>

	<section class="login">

	<article>
	
	<form method="POST" action="congResp.php">
	<label for="estilo">Estilo: </label>
		<select name="estilo">

		
		 <?php

  			include 'connect.php';

 			$sentencia = "SELECT * From ESTILOS";
  			$paises = $mysqli->query($sentencia);

  			if(!$paises || $mysqli->errno)
  				die("Error: no se realizó la consulta: " .$mysqli->error);

 				

 				while($row = $paises->fetch_assoc()){
 					echo <<< hereDOC
 					<option value="{$row['IdEstilo']}">{$row['Nombre']}</option>


hereDOC;
 
 				}
 		?>
 </select>
 		<p><input type="submit" value="Cambiar"></p>
 	</form>
</article>
</section>

<footer>&copy; Copyright 2018 Emilio José Pérez Mariscal, Jesus Cuadra Tellez</footer>


	
</body>
</html>