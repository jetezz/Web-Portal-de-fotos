<?php
	session_start();

if(!isset($_SESSION["logged"])) header('Location: index.php');
	
include 'head.php';






	?>

<title>MisDatos</title>
</head>
<body>
		<?php
include 'header.php';

	?>
	<h2>MisDatos</h2>

<section class="login">

	<article>
		<form action="comCambioDatos.php " method="POST" enctype="multipart/form-data">

		<?php
		include 'connect.php';

 			$sentencia = "SELECT * From USUARIOS where IdUsuario = ".$_SESSION['IdUsu'];
  			$paises = $mysqli->query($sentencia);

  			if(!$paises || $mysqli->errno)
  				die("Error: no se realizó la consulta: " .$mysqli->error);

 				 

 				while($row = $paises->fetch_assoc()){
 					echo <<< hereDOC
 					
		<label for="nombre">Nombre de usuario: </label><input autofocus id="nombre" value="{$row['NomUsuario']}" type="text" name="nombre" required placeholder="Usuario"><br><br>
		<label for="pass"> Contraseña: </label><input required id="pass" type="password" name="contrasena" placeholder="Contraseña"><br><br>
		<label for="email">Correo electrónico: </label><input id="email"  value="{$row['Email']}"  type="email" name="correo" placeholder="email"><br><br>
		<label for="chico">Chico</label>
        <input type="radio" name="genero" id="chico" value="1" checked>
        <label for="chica">Chica</label>
        <input type="radio" name="genero" id="chica" value="2"><br><br>
		<label for="naci">Fecha de nacimiento: </label><input id="naci"  value="{$row['FNacimiento']}"  type="date" name="fecha"><br><br>
		<label for="city">Ciudad: </label><input id="city" type="text" name="ciudad"  value="{$row['Ciudad']}"  placeholder="ciudad"><br><br>
		<label for="pais">País: </label>


hereDOC;
 
 				}
 		?>
	
	
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
		<label for="borrarfoto">Borrar foto </label><input id="borrarfoto" value="true" type="checkbox" name="borrarfoto" placeholder="Borrar Foto"><br><br>
		
		<?php

				if(isset($_GET['err'])){
					$valor = $_GET['err'];
					 
					
					if ($valor==1) {
						echo "<p id='alerta'>Debes poner tu contraseña actual para actualizar tus datos<p>";
		
					}
					if ($valor==2){
						echo "<p id='alerta'>La contraseña tiene que tener almenos una mayuscula, una minuscula y un número y debe ser entre 6-15 caracteres<p>";
					}
					if ($valor==3){
						echo "<p id='alerta'>Completa todos los campos <p>";
					}
					if ($valor==4){
						echo "<p id='alerta'>Valores no validos  <p>";
					}
					if ($valor==5){
						echo "<p id='alerta'>El formato de Email es: Tunombre@ejemplo.xxx  <p>";
					}
					if ($valor==6){
						echo "<p id='alerta'>La fecha no es valida hp <p>";
					}
					if ($valor==7){
						echo "<p id='alerta'>La imagen no es correcta <p>";
					}



					
				}


		?>
		
		<input type="submit" value="Entrar">
		<input type="reset" value="Limpiar">
	
	</form>


	</article>


</section>


<footer>&copy; Copyright 2018 Emilio José Pérez Mariscal, Jesus Cuadra Tellez</footer>


	
</body>
</html>