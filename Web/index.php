<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Albunes de fotos</title>
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
<?php
	 if(isset($_SESSION['estilo'])){//Si el usuario esta logueado

			if($_SESSION['estilo']=='negro.css'){ //si el usuario tiene como estilo negro

				echo '<link rel="stylesheet" type="text/css" href="css/negro.css" media="screen" title="Clasico">';
		
	 	 		echo '<link rel="alternate stylesheet" type="text/css" href="css/estilo.css" media="screen" title="Estilo de alto contraste">';

	 		}else{								//Si el usuario tiene como estilo el blanco
	 			echo '<link rel="stylesheet" type="text/css" href="css/estilo.css" media="screen" title="Clasico">';
		
	 	 		echo '<link rel="alternate stylesheet" type="text/css" href="css/negro.css" media="screen" title="Estilo de alto contraste">';
	 		}

		}else{

			echo '<link rel="stylesheet" type="text/css" href="css/estilo.css" media="screen" title="Clasico">';
		
	 		echo '<link rel="alternate stylesheet" type="text/css" href="css/negro.css" media="screen" title="Estilo de alto contraste">';
	 	}
?>

  <link rel="stylesheet" type="text/css" href="print.css" media="print" />
 
	

</head>
<body>
		<?php
include 'header.php';

	?>
	</header>
<h2>Inicio</h2>
<section class="inicio">
	<section>
	<?php
	

	if(isset($_COOKIE['nombre']) && isset($_COOKIE['contrasena'])){
		
		$ultima_visita = isset($_COOKIE['ultima_visita']) ? $_COOKIE['ultima_visita'] : " nunca";
		echo '<p>Hola,'.$_COOKIE['nombre'].' la ultima vez que te vimos fue '.$ultima_visita.' </p>';
		setcookie('ultima_visita',date("c"),(time() + 90 * 24 * 60 * 60));


		if(!isset($_SESSION['logged'])){
			
			 

  			include 'connect.php';

 			$sentencia = "SELECT * From USUARIOS u, ESTILOS e where u.Estilo=e.IdEstilo";
  			$paises = $mysqli->query($sentencia);

  			if(!$paises || $mysqli->errno)
  				die("Error: no se realizó la consulta: " .$mysqli->error);

 				$entra = false;

 				while($row = $paises->fetch_assoc()){
 					if($row['NomUsuario']==$_COOKIE['nombre']&& $row['Clave']==$_COOKIE['contrasena']){
					
					$_SESSION['logged']=true;
					$_SESSION['nombre']=$row['NomUsuario'];
					$_SESSION['IdUsu']=$row['IdUsuario'];
					$_SESSION['estilo']=$row['Fichero'];
					
					$entra = true;


					}


 
 				}
 				if (!$entra) {
 					header('Location: cerrarSesion.php');
 				}
 		
		}
	}




	
	elseif(!isset($_SESSION['logged'])){
		echo '<a href="entrar.php"><button>iniciar sesion</button></a>';
		echo '<a href="registro.php"><button>incribirse</button></a>';
	}
		


	

	?>

	</section>
	
		<div class="container">
  
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
  <?php

  $mysqli = new mysqli("localhost","root","1234","pibd");
  if($mysqli->connect_errno)
  	die("Error: no se pudo conectar: " .$mysqli->connect_errno);

  $sentencia = "SELECT * From FOTOS F, PAISES P where F.Pais = P.IdPais Order by (FRegistro) DESC LIMIT 5";
  $fotos = $mysqli->query($sentencia);

  if(!$fotos || $mysqli->errno)
  	die("Error: no se realizó la consulta: " .$mysqli->error);

  $probar=0;

  while($row = $fotos->fetch_assoc()){

  	if($probar==0){

echo <<< hereDOC
  		<div class="item active">
        <a href="foto.php?nombre={$row['IdFoto']}"><img src="fotos/{$row['Fichero']}" alt="{$row['Alternativo']}">	</a>
		<footer>
			<p> {$row['Titulo']}</p>
			<p> {$row['Fecha']}</p>
			<p> {$row['NomPais']}</p>

		</footer>
	</div>
hereDOC;


	$probar=1;
  	}
  	else{
echo <<< heredoc
  		 <div class="item">
              <a href="foto.php?nombre={$row['IdFoto']}"><img src="fotos/{$row['Fichero']}" alt="{$row['Alternativo']}">	</a>
		<footer>
			<p> {$row['Titulo']}</p>
			<p> {$row['Fecha']}</p>
			<p> {$row['NomPais']}</p>

		</footer>
      </div>
heredoc;
  	}



  }

  ?>

    <!-- Wrapper for slides -->
 <!--
    <div class="carousel-inner">
      <div class="item active">
        <a href="foto.php?nombre=0"><img src="fotos/foto1.jpg" alt="imagen 1">	</a>
		<footer>
			<p> titulo</p>
			<p> fecha</p>
			<p> pais</p>

		</footer>
	</div>

      <div class="item">
        <a href="foto.php?nombre=1"><img src="fotos/140822 laderasarviseB.jpg" alt="imagen 2"></a>
		<footer>
			<p> titulo</p>
			<p> fecha</p>
			<p> pais</p>

		</footer>	
      </div>
    
      <div class="item">
        <a href="foto.php?nombre=2"><img src="fotos/140822 ardientefrioB.jpg" alt="imagen 3"></a>
		<footer>
			<p> titulo</p>
			<p> fecha</p>
			<p> pais</p>

		</footer>	
      </div>
       <div class="item">
       <a href="foto.php?nombre=3"><img src="fotos/unXSaw1.jpg" alt="imagen 4"></a>
		<footer>
			<p> titulo</p>
			<p> fecha</p>
			<p> pais</p>

		</footer>	
      </div>
       <div class="item">
        <a href="foto.php?nombre=4"><img src="fotos/john-stanmeyer-inmigrantes-africanos-en-djibuti-buscando-una-sec3b1al-para-hablar.jpg" alt="imagen 5">	</a>
		<footer>
			<p> titulo</p>
			<p> fecha</p>
			<p> pais</p>

		</footer>	
      </div>

    
-->
</div>
    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>


</section>
<br>
<h2>Foto seleccionada</h2>
<br>
<section class="foto">
	
	<figure>
	<?php
		$datos = file('fotos_seleccionadas.txt');
		list($fotoid,$critico,$comentario)=explode("|", $datos[rand(0,count($datos)-1)]);
	


include 'connect.php';

 			$sentencia = "SELECT * From FOTOS WHERE Idfoto=".$fotoid;
  			$paises = $mysqli->query($sentencia);

  			if(!$paises || $mysqli->errno)
  				die("Error: no se realizó la consulta: " .$mysqli->error);

 				

 				while($row = $paises->fetch_assoc()){
 					echo <<< hereDOC
 						
  			<a href="foto.php?nombre={$row['IdFoto']}"><img src="fotos/{$row['Fichero']}" alt="{$row['Alternativo']}">	</a>


hereDOC;
				}
			echo <<< hereDOC
	</figure>
	<div class="detalles">
		<p>Critico: {$critico}</p>
		<p>Descripción: {$comentario}</p>

	</div>
hereDOC;
	?>
</section>


<footer>&copy; Copyright 2018 Emilio José Pérez Mariscal, Jesus Cuadra Tellez
<a href="accesibilidad.php">Accesibilidad<a/></footer>


	
</body>
</html>