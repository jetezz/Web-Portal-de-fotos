	<?php
	session_start();
include 'head.php';

	?>

<title>Busqueda foto</title>
</head>
<body>
		<?php
include 'header.php';

	?>
	<h2>Buscar</h2>
<section class="form">
	<article >

		<form method="get">
		
			
			<label for="titu">Título: </label><input autofocus id="titu" type="text" name="titulo" placeholder="Título"><br><br>
			<label for="fecha">Fecha: </label><input id="fecha" type="date" name="fecha"><br><br>
			<label for="pais">País: </label>
			<select name="pais">
			<option name="pais" selected value="0">Todos</option>
		
		 <?php

  			include 'connect.php';

 			$sentencia = "SELECT * From PAISES";
  			$paises = $mysqli->query($sentencia);

  			if(!$paises || $mysqli->errno)
  				die("Error: no se realizó la consulta: " .$mysqli->error);

 				 $probar=1;

 				while($row = $paises->fetch_assoc()){
 					echo <<< hereDOC
 					<option name="pais" value="$probar">{$row['NomPais']}</option>



hereDOC;
$probar++;
 
 				}
 		?>
  	
  

		</select><br><br>
			
			<input type="submit" value="Buscar">
			<input type="reset" value="Limpiar">
		
		</form >

		<?php


		
		
if(!empty($_GET['titulo'])){
	echo  "<p>Titulo: {$_GET['titulo']}</p>";
}
if(!empty($_GET['fecha'])){
	echo "<p>Fecha: {$_GET['fecha']}</p>";
}
if(!empty($_GET['pais']))
	echo "<p>Pais: {$_GET['pais']}</p>";






	
	
	


		?>
	</article>
</section>
<section>

	 <?php

	 $titu = "";
	 $fech = "";
	 $pai="";
			
		if(!empty($_GET['titulo'])){
			$titu= $_GET['titulo'];
		}
		if(!empty($_GET['fecha'])){
			$fech="and Fecha = '".$_GET['fecha']."'";
		}
		if(!empty($_GET['pais']) and $_GET['pais']!=0){
			$pai="and Pais = '".$_GET['pais']."'";
		}




  			include 'connect.php';

 			$sentencia = "SELECT *  From FOTOS WHERE Titulo like '%$titu%' $pai $fech";
 			
 
 			
  			$fotos = $mysqli->query($sentencia);
  



  			if(!$fotos || $mysqli->errno)
  				die("Error: no se realizó la consulta: " .$mysqli->error);

 				 $probar=0;

 				while($row = $fotos->fetch_assoc()){
 					echo <<< hereDOC
 					<article>
	
	<figure>
		<a href="foto.php?nombre={$row['IdFoto']}"><img src="fotos/{$row['Fichero']}" alt="{$row['Alternativo']}" height="300px" width="300px">	</a>
		<footer>
			
			<p> {$row['Titulo']}</p>
			<p> {$row['Fecha']}</p>
			<p> {$row['Pais']}</p>

		</footer>

		</footer>
		</figure>
	</article>


hereDOC;
 
 				}
 			
 		?>
	<!-- <article>
	
	<figure>
		<a href="foto.php?nombre=0"><img src="fotos/140822 lightpinosB.jpg" alt="imagen 1" height="300px" width="300px">	</a>
		<footer>
			<p> titulo</p>
			<p> fecha</p>
			<p> pais</p>

		</footer>
		</figure>
	</article>


	
	
	<article>
	<figure>
		<a href="foto.php?nombre=1"><img src="fotos/140822 laderasarviseB.jpg" alt="imagen 2" height="300px" width="300px" height="300px"></a>
		<footer>
			<p> titulo</p>
			<p> fecha</p>
			<p> pais</p>

		</footer>		
	</figure>
	</article>
	<article>
	<figure>
		<a href="foto.php"><img src="fotos/140822 ardientefrioB.jpg" alt="imagen 3" height="300px" width="300px"></a>
		<footer>
			<p> titulo</p>
			<p> fecha</p>
			<p> pais</p>

		</footer>	
	</figure>
	</article>
	<article>
	<figure>
		<a href="foto.php"><img src="fotos/unXSaw1.jpg" alt="imagen 4" height="300px" width="300px"></a>
		<footer>
			<p> titulo</p>
			<p> fecha</p>
			<p> pais</p>

		</footer>		
	</figure>
	</article>
	<article>
	<figure>
		<a href="foto.php"><img src="fotos/john-stanmeyer-inmigrantes-africanos-en-djibuti-buscando-una-sec3b1al-para-hablar.jpg" alt="imagen 5" height="300px" width="300px">	</a>
		<footer>
			<p> titulo</p>
			<p> fecha</p>
			<p> pais</p>

		</footer>	
	</figure>
		</article>

 -->
</section>


<footer>&copy; Copyright 2018 Emilio José Pérez Mariscal, Jesus Cuadra Tellez</footer>


	
</body>
</html>