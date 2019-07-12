
	<?php
	session_start();

if(!isset($_SESSION["logged"])) header('Location: index.php');
	
include 'head.php';






	?>

<title>AnadirFotoAlbum</title>
</head>
<body>
		<?php
include 'header.php';

	?>
	<h2>Añadir foto en album</h2>

<section class="login">

	<article>


	<form action="insertarFoto.php " method="POST" enctype="multipart/form-data">
	
		<label for="titulo">Titulo: </label><input autofocus id="titulo" type="text" name="titulo" required placeholder="Titulo"><br><br>
		<label ">Descripción </label><textarea required name="descripcion"></textarea><br>
		<label for="fecha">Fecha: </label><input required id="fecha" type="date" name="fecha"><br><br>
		<br>
		<?php
		$id = $_GET['id'];
		echo "<input type='hidden' name='id' value=".$id.">";
		?>
		<label for="pais">País: </label>
		<select name="pais">

		
		 <?php

  			include 'connect.php';

 			$sentencia = "SELECT * From PAISES";
  			$paises = $mysqli->query($sentencia);

  			if(!$paises || $mysqli->errno)
  				die("Error: no se realizó la consulta: " .$mysqli->error);

 			

 				while($row = $paises->fetch_assoc()){
 					echo <<< hereDOC
 					<option value="{$row['IdPais']}">{$row['NomPais']}</option>


hereDOC;
 
 				}
 		?>


  	
  

		</select><br><br>
		<label for="foto">Foto: </label><input id="foto" type="file" name="foto" placeholder="Foto"><br><br>
		<label ">Texto Alternativo </label><textarea required name="textoAlternativo"></textarea><br>
	<br><br>
		
		<input type="submit" value="Entrar">
		<input type="reset" value="Limpiar">
	
	</form>

	<?php

			if(isset($_GET['err'])){
				$valor = $_GET['err'];
				 
				
				if ($valor==1) {
					echo "<p id='alerta'>¡Tienes que compleatar ambos campos!<p>";
				}
				if ($valor==7){
						echo "<p id='alerta'>La imagen no es correcta <p>";
				}

			}
		?>
	</article>


</section>


<footer>&copy; Copyright 2018 Emilio José Pérez Mariscal, Jesus Cuadra Tellez</footer>


	
</body>
</html>