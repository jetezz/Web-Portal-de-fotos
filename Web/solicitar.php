	<?php

	session_start();

if(!isset($_SESSION["logged"])) header('Location: index.php');
	
include 'head.php';

	?>

<title>Solicitar album</title>
</head>
<body>
		<?php
include 'header.php';

	?>
	<h2>Solicitud</h2>

<section class="solicitud">
	
	<article>
		<p>Está a punto de solicitar un nuevo álbum, introduzca los parametros correspondientes e iniciará el trámite de impresión del mismo </p>
	</article>

	<article>
	<ol>
		<li>Precio numero de paginas:</li>
		<ul>
			<li> &#60 5 pagina 10cts/u</li>
			<li>entre 5 y 10 paginas 8cts/u</li>
			<li>&#62; 11 pagina 7cts/u</li>
			
		</ul>

		<li>Precio Resolucion paginas:</li>
		<ul>
			<li>&#62; a 300 DPI precio de pagina 2cts/u</li>
			
		</ul>
		<li> Blcanco y negro o color:</li>
		<ul>
			<li>Blanco y negro precio de pagina 0€</li>
			<li>Color precio de pagina 5 cts/u</li>
		</ul>
	</ol>
	</article>


	<article>

	<form action="insertarSolicitud.php " method="POST">
		<label for="nombre">Nombre y apellidos: </label><input type="text" id="nombre" name="nombre" placeholder="nombre" required maxlength="200"><br><br>

		<label for="titulo">Título del álbum: </label><input type="text" id="titulo" name="titulo" placeholder="título" required maxlength="200"><br><br>

		<label for="texto">Descripcion:  </label><input type="text" id="texto" name="Descripcion" placeholder="descripción" maxlength="4000"> <br><br>

		<label for="email">Corréo electronico: </label><input type="email" id="email" name="email" placeholder="email" required maxlength="200"><br><br>
		<p> <label for="direccion">Dirección: </label>
			<ul>
				<li><label for="calle">Calle: </label><input id="calle" type="text" name="calle" id="direccion" placeholder="calle"></li>
				<li><label for="numero">Numero: </label><input id="numero" type="number" name="numero" placeholder="numero" min="1"></li>
				<li><label for="piso">Piso: </label> <input id="piso" type="number" name="piso" placeholder="piso" ></li>
				<li><label for="puerta">Puerta: </label><input id="puerta" type="text" name="puerta" placeholder="puerta"></li>
				<li><label for="postal"> Codigo postal: </label><input pattern="[0-9]{5}" id="postal" type="text" name="codpos" placeholder="codigo postal"></li>
				<li><label for="local">Localidad: </label><input id="local" type="text" name="localidad" placeholder="localidad"></li>
				<li><label for="prov">Provincia: </label><input id="prov" type="text" name="provincia" placeholder="provincia"></li>
				<li><label for="pais">Pais: </label><input id="pais" type="text" name="pais" placeholder="pais"></li>
			</ul>
		</p>



		<label for="color">Color portada: </label><input name="color" id="color" type="color" value="#fff">
		<label for="copias">Número de copias: </label><input id="copias" type="number" value="1"  required name="cantidad" min="1" >

		<label for="resolucion">Resolución: </label><input id="resolucion" type="number" value="150"  required name="resolucion" min="150" max="900" step="150">

		<p>Album de fotos del portal: 
			<ul>
				<label for="albumes">albumes: </label>
		<select name="albumes">

		
		 <?php

  			include 'connect.php';

 			$sentencia = "SELECT * From ALBUMES";
  			$paises = $mysqli->query($sentencia);

  			if(!$paises || $mysqli->errno)
  				die("Error: no se realizó la consulta: " .$mysqli->error);


 				while($row = $paises->fetch_assoc()){
 					echo <<< hereDOC
 					<option value="{$row['IdAlbum']}">{$row['Titulo']}</option>


hereDOC;
 
 				}
 		?>
 	</select><br>

    		</ul>
		
		</p>


		
		<label for="fecha">Fecha de entrega: </label><input name="fecha" id="fecha" type="date">
		
		<p>Álbum a color:
		<label for="Si">Si</label>
        <input type="radio" name="color2" id="si" value="1" checked>
        <label for="no">no</label>
        <input type="radio" name="color2" id="no" value="0">
		</p>

		<input type="submit" value="Solicitar">


		
	
	</form>
	<?php

				if(isset($_GET['err'])){
					$valor = $_GET['err'];
					 
					
					if ($valor==1) {
						echo "<p id='alerta'>Faltan campos por rellenar<p>";
		
					}
					


					
				}

		?>

	</article>
</section>


<footer>&copy; Copyright 2018 Emilio José Pérez Mariscal, Jesus Cuadra Tellez</footer>


	
</body>
</html>