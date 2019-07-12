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

 			$sentencia = "SELECT * From ALBUMES a where a.IdAlbum = ".$_GET['id']." and a.Usuario=".$_SESSION['IdUsu'];
  			$resp = $mysqli->query($sentencia);

  			if(!$resp || $mysqli->errno)
  				die("Error: no se realizó la consulta: " .$mysqli->error);

 				if(mysqli_num_rows($resp)>0){

 				while($row = $resp->fetch_assoc()){
 				
				 
					echo "<p>Su album<b> {$row['Titulo']} </b>se ha creado correctamente</p>";
					echo "<p>Descripcion:<b> {$row['Descripcion']}</b></p>";
					
					echo "<a href='anadirFotoAlbum.php?id={$_GET['id']}'><button>Añadir foto en el album</button></a>";
 				}
 				}else{
 					echo "<p id='alerta'>¡Ese album no es tuyo o no ha sido creado!<p>";
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