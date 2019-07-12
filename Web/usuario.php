	<?php
session_start();

	if(!isset($_SESSION["logged"])) header('Location: index.php');
include 'head.php';

	?>

<title>Usuario</title>
</head>
<body>
		<?php
include 'header.php';

	?>
	<h2>Usuario</h2>

<section class="cuenta">
	<article>
	<div class="datos">
		<?php



		 include 'connect.php';
		
		  $sentencia = "SELECT * From USUARIOS u, SEXO s, PAISES p where u.IdUsuario =".$_SESSION['IdUsu']." and u.Sexo = s.IdSexo and u.Pais= p.IdPais";



		  $resp = $mysqli->query($sentencia);

		  if(!$resp || $mysqli->errno)
		  	die("Error: no se realizó la consulta: " .$mysqli->error);

		

		  while($row = $resp->fetch_assoc()){

		  

echo <<< hereDOC
		<div><p>Nombre de usuario:  </p> <p> {$row['NomUsuario']}</p></div>
		<div><p>Correo electrónico: </p><p> {$row['Email']} </p></div>
		<div><p>Sexo: </p><p> {$row['NomSex']}</p></div>
		<div><p>Fecha de nacimiento: </p><p> {$row['FNacimiento']}</p></div>
		<div><p>País: </p><p> {$row['NomPais']} </p></div>
		<a href="misDatos.php"><button>Modificar mis datos</button></a>
		<div><p>Foto: </p></div>


		<figure>
			<img src="fotosPerfil/{$row['Foto']}" height="50px" width="50" alt="{$row['Foto']}">
		</figure> 

hereDOC;


			
		  	}




		
		?>
		
	</div>
	
	<a href="confirmarBorrado.php"><button>Darse de baja</button></a>
	<p>Mis álbunes: </p>
	<ul>
		<?php
		include 'connect.php';
		  $usu = $_SESSION['IdUsu'];
		  $sentencia = "SELECT * From ALBUMES a where ".$usu."=a.Usuario";
	
		  $fotos = $mysqli->query($sentencia);

		  if(!$fotos || $mysqli->errno)
		  	die("Error: no se realizó la consulta: " .$mysqli->error);

		

		  while($row = $fotos->fetch_assoc()){

		  	echo "<a href='verAlbum.php?nombre={$row['IdAlbum']}'><li>{$row['Titulo']}</li></a>";

		  }
		?>
		
		
	</ul>
	<a href="crearAlbum.php"><button>Crear álbum</button></a>
	<a href="misAlbumes.php"><button>Mis álbumes</button></a>
	<a href="configurar.php"><button>Configurar estilo</button></a>
	<a href="solicitar.php"><button>Solicitar álbum</button></a>
	<a href="cerrarSesion.php"><button>Salir</button></a>
	</article>
</section>


<footer>&copy; Copyright 2018 Emilio José Pérez Mariscal, Jesus Cuadra Tellez</footer>


	
</body>
</html>