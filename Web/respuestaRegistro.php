	<?php
	session_start();
include 'head.php';

	?>

<title>Usuario actualizado</title>
</head>
<body>
		<?php
include 'header.php';

	?>
	<h2>Usuario actualizado con exito</h2>

<section class="login">

	<article>
		<?php

	

	


 include 'connect.php';

  $sentencia = "SELECT * From USUARIOS u, SEXO s, PAISES p where u.IdUsuario =".$_SESSION['IdUsu']." and u.Sexo = s.IdSexo and u.Pais= p.IdPais";
  $resp = $mysqli->query($sentencia);

  if(!$resp || $mysqli->errno)
  	die("Error: no se realizó la consulta: " .$mysqli->error);

	while($row = $resp->fetch_assoc()){

	echo "<p>Nombre de usuario: ".$row['NomUsuario']."</p>";	
	echo "<p>Correo electronico: ".$row['Email']."</p>";
	echo "<p>Fecha de nacimiento: ".$row['FNacimiento']."</p>";
	echo "<p>Ciudad: ".$row['Ciudad']."</p>";
	echo "<p>Genero: ".$row['NomSex']."</p>";
	echo "<p>Pais: ".$row['NomPais']."</p>";
 				


 
 	}


	
	
	



	?>
	
	</article>


</section>


<footer>&copy; Copyright 2018 Emilio José Pérez Mariscal, Jesus Cuadra Tellez</footer>


	
</body>
</html>