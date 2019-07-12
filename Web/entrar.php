	<?php

session_start();

if(isset($_SESSION["logged"])) header('Location: index.php');
	
include 'head.php';

	?>

<title>Entrar</title>
</head>
<body>
		<?php
include 'header.php';

	?>

	<h2>Login</h2>

<section class="login">

	<article>
		<form method="POST" action="cominicio.php">
			<label for="nombre">Nombre de usuario: </label><input id="nombre" autofocus type="text" name="nombre" placeholder="Usuario"><br><br>
			<label for="pass">Contraseña: </label><input id="pass" type="password" name="contrasena" placeholder="Contraseña"><br>
			<input id="recordar" type="checkbox" name="recordar"><label for="recordar">recordar cuenta</label>
			<p><input type="submit" value="Entrar"></p>
			
		</form>
		
		<?php

			if(!empty($_GET['err'])){
				

				echo "<p id='alerta'>Vaya, ese usuario no está en la base de datos.<p>";
	
		}

		?>

	</article>


</section>


<footer>&copy; Copyright 2018 Emilio José Pérez Mariscal, Jesus Cuadra Tellez</footer>


	
</body>
</html>