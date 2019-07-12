	<?php
	session_start();
	//Si hay cookie ya ponemos la ultima visita como el valor de la cookie, sino como primera vez
	


					

include 'head.php';

	?>

<title>Foto</title>
</head>
<body>
		<?php
include 'header.php';

	?>
	<h2>Foto</h2>

<section class="foto">
	
	<figure>
		<?php

		


	
		if(isset($_GET['nombre'])){


	include 'connect.php';

  $sentencia = "SELECT *, f.Titulo 'TitFoto', a.Titulo 'TitAlb' From FOTOS f ,ALBUMES a, USUARIOS u, PAISES p where p.IdPais = f.Pais and f.IdFoto = {$_GET['nombre']} and f.Album = a.IdAlbum and a.Usuario = u.IdUsuario";
  $fotos = $mysqli->query($sentencia);

  if(!$fotos || $mysqli->errno)
  	die("Error: no se realizó la consulta: " .$mysqli->error);

  

  while($row = $fotos->fetch_assoc()){

echo <<< hereDOC
  	 <a href="foto.php?nombre={$row['IdFoto']}"><img src="fotos/{$row['Fichero']}" alt="{$row['Alternativo']}">	</a>
hereDOC;
	

  }


	echo "</figure>";
	
	echo "<div class='detalles'>";

		if(isset($_SESSION["logged"])) {
$fotos = $mysqli->query($sentencia);

  if(!$fotos || $mysqli->errno)
  	die("Error: no se realizó la consulta: " .$mysqli->error);
	if(mysqli_num_rows($fotos)>0){

			while($row = $fotos->fetch_assoc()){
					
					
						echo"<p>Título: ".$row['TitFoto']."</p>";
						echo"<p>Usuario: <a href='usuario.php?".$row['NomUsuario']."'>".$row['NomUsuario']."</a></p>";
						echo"<p>Fecha: ".$row['Fecha']."</p>";
						echo"<p>País: ".$row['NomPais']."</p>";
						echo"<p>Álbum: <a href='album.php'>".$row['TitAlb']."</a></p>";					

			  }


    }else{
			echo "<p id='alerta'>¡Esa imagen no existe!<p>";
    }


  		}else{
				echo "<p id='alerta'>¡Solo puedes ver la información si estás logueado!<p>";
		}


		}else{
		header('Location:index.php');

		}




		
		








  

	
 		
	



		?>
		

	</div>
</section>


<footer>&copy; Copyright 2018 Emilio José Pérez Mariscal, Jesus Cuadra Tellez</footer>


	
</body>
</html>