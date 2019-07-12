	<?php
	
	session_start();

if(!isset($_SESSION["logged"])) header('Location: index.php');
	
include 'head.php';

	?>

<title>crear album</title>
</head>
<body>
		<?php
include 'header.php';

	?>
	<h2>Crear album</h2>

<section class="login">

	<article>
		<form method="POST" action="InsertarAlbum.php">
			<label >Titulo del album </label><input id="titulo" autofocus type="text" name="titulo" ><br><br>
			<label ">Descripción </label><textarea name="descripcion"></textarea><br>
			<p><input type="submit" value="Entrar"></p>
		</form>
		
		<?php

			if(isset($_GET['err'])){
				$valor = $_GET['err'];
				 
				
				if ($valor==1) {
					echo "<p id='alerta'>¡Tienes que compleatar ambos campos!<p>";
				}
			}
		?>
	</article>


</section>


<footer>&copy; Copyright 2018 Emilio José Pérez Mariscal, Jesus Cuadra Tellez</footer>


	
</body>
</html>