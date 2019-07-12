
<?php
echo <<<hereDOC

<header>


		<figure>
			<a href="index.php"><img src="fotos/coconut-400x400.png" height="100px" width="100px" alt="logotipo"> </a>
		</figure>


		
		<div>
		<form action="buscar.php" method="get">
			<input type="search" name="titulo" placeholder="buscar imagen">
		
			<input type="submit" value="Buscar">
		</div>

		</form>
		<nav>
hereDOC;
		if(isset($_SESSION['logged'])){
			echo '<a href="usuario.php"><button>Cuenta</button></a>';
		}

echo <<<hereDOC
		
		</nav>
		
	</header>


hereDOC;

?>