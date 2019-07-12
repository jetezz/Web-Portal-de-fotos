	<?php
	
	session_start();

if(!isset($_SESSION["logged"])) header('Location: index.php');
	
include 'head.php';

	?>

<title>Ver Album</title>
</head>
<body>
		<?php
include 'header.php';

	?>
	<h2>Ver Album</h2>

	<section class="login">

	<article>

	

		
		 <?php

		 	if(isset($_GET['nombre'])){
  			include 'connect.php';

 			$sentencia = "SELECT * From ALBUMES where IdAlbum=".$_GET['nombre'];
  			$resp = $mysqli->query($sentencia);

  			if(!$resp || $mysqli->errno)
  				die("Error: no se realizó la consulta: " .$mysqli->error);
	  			if(mysqli_num_rows($resp)>0){	
	 				while($row = $resp->fetch_assoc()){
	 					echo <<< hereDOC
	 					 <p>Titulo: {$row['Titulo']}</p>

						 <p>Descripción del álbum: {$row['Descripcion']}</p>

hereDOC;
	 				}
	 				echo "<a href='anadirFotoAlbum.php?id={$_GET['nombre']}'><button>Añadir foto en el album</button></a>";
	 			}else{
					echo "<p id='alerta'>¡Este album no existe!<p>";
	 			}
 			}
 		?>

</article>



	<article>

	

		
		 <?php

		 	if(isset($_GET['nombre'])){
  			include 'connect.php';

 			$sentencia = "SELECT * From FOTOS f, PAISES p where Album=".$_GET['nombre']." and p.IdPais = f.Pais";
  			$resp = $mysqli->query($sentencia);

  			if(!$resp || $mysqli->errno)
  				die("Error: no se realizó la consulta: " .$mysqli->error);
	  			if(mysqli_num_rows($resp)>0){	
	 				while($row = $resp->fetch_assoc()){
	 					echo <<< hereDOC
	 					 <a href="foto.php?nombre={$row['IdFoto']}"><img src="fotos/{$row['Fichero']}"  height="200px" width="200"alt="{$row['Alternativo']}">	</a>
						 <p>Pais: {$row['NomPais']}</p>

hereDOC;
	 				}
	 			}else{
	 				echo "<p id='alerta'>¡No se ha encontrado ninguna foto!<p>";
	 			}
 			}
 		?>

</article>


	<article>

	

		
		 <?php

		 	if(isset($_GET['nombre'])){
  			include 'connect.php';

 			$sentencia = "SELECT *, MAX(Fecha) 'max', MIN(Fecha) 'min'  From FOTOS f where Album=".$_GET['nombre'];
  			$resp = $mysqli->query($sentencia);


  			if(!$resp || $mysqli->errno)
  				die("Error: no se realizó la consulta: " .$mysqli->error);
	  		
	  			
	 				while($row = $resp->fetch_assoc()){
	 					echo $row['max'];
	 					echo <<< hereDOC
						
						 <p>Intervalo de tiempo: {$row['min']} - {$row['max']}</p>
						 

hereDOC;
	 				}
	 		
 			}
 		?>

</article>


</section>

<footer>&copy; Copyright 2018 Emilio José Pérez Mariscal, Jesus Cuadra Tellez</footer>


	
</body>
</html>