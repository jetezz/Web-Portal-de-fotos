<?php
	session_start();
	$correcto=true;
	if(empty($_POST['nombre']) || empty($_POST['titulo']) || empty($_POST['Descripcion']) || empty($_POST['email'])
|| empty($_POST['fecha'])){
		header('Location: solicitar.php?err=1');
		$correcto=false;
	}
	

	$nombre=$_POST['nombre'];
	$titulo=$_POST['titulo'];
	$Descripcion=$_POST['Descripcion'];
	$email=$_POST['email'];
	$fecha=$_POST['fecha'];
	$idAlbumes= $_POST['albumes'];


	$calle= $_POST['calle'];
	$numero= $_POST['numero'];
	$piso= $_POST['piso'];
	$puerta= $_POST['puerta'];
	$codpos= $_POST['codpos'];
	$localidad= $_POST['localidad'];
	$provincia= $_POST['provincia'];
	$pais= $_POST['pais'];

	$color=$_POST['color'];
	$cantidad=$_POST['cantidad'];
	$resolucion=$_POST['resolucion'];
	$color2=$_POST['color2'];
	$fregistro=date("c",time());



	$colorprecio=1;
	$paginasprecio=10;
	$resolucionprecio=1;

	if($color2=="1"){
		$colorprecio=5;
	}
	if($cantidad>5&& $cantidad<=10){
		$paginasprecio=8;
	}
	if($cantidad>11){
		$paginasprecio=7;
	}

	if($resolucion>300){
		$resolucionprecio=2;
	}

	$precio=$cantidad*$paginasprecio*$resolucionprecio*$colorprecio*0.01;

	$direccion=$calle." Nº".$numero." Piso".$piso." Puerta".$puerta." ".$codpos." ".$localidad." ".$provincia." ".$pais;


		include 'connect.php';
		$sentencia = "INSERT INTO SOLICITUDES (Album,Nombre,Titulo,Descripcion,Email,Direccion,Color,Copias,Resolucion,Fecha,IColor,FRegistro,Coste)
		 VALUES
		  (".$idAlbumes.",'".$nombre."','".$titulo."','".$Descripcion."','".$email."','".$direccion."','".$color."',".$cantidad.",".$resolucion.",'".$fecha."',".$color2.",'".$fregistro."',".$precio.")";
		  echo $sentencia;
		$resp = $mysqli->query($sentencia);
	
		if(!$resp || $mysqli->errno)
			die("Error: no se realizó la consulta: " .$mysqli->error);

			$encolor="Blanco y negro";
			if(!$color2)$encolor="En color";

			if($correcto)header("Location: respuesta.php?cantidad=".$cantidad."&resolucion=".$resolucion."&albumes=".$idAlbumes."&precio=".$precio."&color=".$encolor);
			


	?>