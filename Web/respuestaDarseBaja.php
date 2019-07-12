	<?php
	
session_start();

if(!isset($_SESSION["logged"])) header('Location: index.php');
	
include 'head.php';

	?>

<title>Dado de baja</title>
</head>
<body>
		<?php
include 'header.php';

	?>
	<h2>Te has dado de baja</h2>

<section>
	

		<a href="index.php"><button>Volver</button></a>

	
</section>


<footer>&copy; Copyright 2018 Emilio José Pérez Mariscal, Jesus Cuadra Tellez</footer>


	
</body>
</html>