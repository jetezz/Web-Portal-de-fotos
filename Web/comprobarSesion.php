<?php
	

	if(isset($_COOKIE['nombre']) && isset($_COOKIE['contrasena'])){
		
		$ultima_visita = isset($_COOKIE['ultima_visita']) ? $_COOKIE['ultima_visita'] : " nunca";		
		setcookie('ultima_visita',date("c"),(time() + 90 * 24 * 60 * 60));


		if(!isset($_SESSION['logged'])){
			
			$usuario=['usu1','usu2','usu3','usu4'];
			$contrasena=['usu1','usu2','usu3','usu4'];

			for($i=0;$i<count($usuario);$i++){
				if($usuario[$i]==$_COOKIE['nombre']&& $contrasena[$i]==$_COOKIE['contrasena']){
					
					$_SESSION['logged']=true;
					$_SESSION['nombre']=$_COOKIE['nombre'];
					$_SESSION['estilo']=$_COOKIE['estilo'];
					header('Location:index.php');




				}

		}
		}
	}




	
	elseif(!isset($_SESSION['logged'])){
		echo '<a href="entrar.php"><button>iniciar sesion</button></a>';
		echo '<a href="registro.php"><button>incribirse</button></a>';
	}
		


	

	?>