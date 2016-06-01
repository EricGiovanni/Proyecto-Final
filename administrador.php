<?php
	session_start();
	if (!@$_SESSION['Usuario']) 
		header("Location:InicioAdmin.php");
	$user=$_SESSION['Nombre'];
	$mipuntaje=80;
	$puntajemax=20;
	$repaso=array('tema1','tema2','tema3');
echo '<html>
	<head>
		<title>Practicas</title>
	<html>
	<head>
		<title>Sapiencia</title>
		<meta charset= "UTF-8"/>
		<meta http-equiv= "x-UA-Compatible" content="IE-edge"/>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<link href="Bootstrap\bootstrap-3.3.6-dist\css\bootstrap.min.css" rel="stylesheet"/>
		<script type="text/javascript" src="jQuery-2.2.3.js"></script>
		<script type="text/javascript" src="Bootstrap\bootstrap-3.3.6-dist\js\bootstrap.min.js"></script>
		<link rel="stylesheet/less" type="text/css" href="Styles.less"/>	
		<script src="less.min.js" type="text/javascript"></script>
		
		</head>
	<body>
		<header id="head" class="row">
			<div class="col-xs-6 col-sm-6  col-md-6 col-lg-6">
				<img src="Imagenes/Pumito.png" class="img-responsive center-block" width="250px" />
			</div>
			<div class="col-xs-6 col-sm-6  col-md-6 col-lg-6">
				<h1 class="text-left">Sapiencia</h1>
			</div>
		</header><br/>
			<h2 class="text-center">Hola '.$user.'</h2>
		<br/><div class="container">
				
				<div class="row">
				
						<div class="col-xs-4 col-sm-4  col-md-4 col-lg-4">
							<form action = "Crear.php" method = "POST">
								<input type = "submit" class="btn btn-default btn-lg btn-block" value = "Crear Cuentas Para Coordinadores" name = "editar"/>
							</form>
							<form action = "Graficas.php" method = "POST">
								<input type = "submit" class="btn btn-default btn-lg btn-block" value = "Graficas" name = "editar"/>
							</form>
							<form action = "informacion.php" method = "POST">
								<input type = "submit" class="btn btn-default btn-lg btn-block" value = "Información de Usuarios" name = "editar"/>
							</form>
							<form action = "cerrar.php">
								<input type = "submit" class="btn btn-default btn-lg btn-block" value = "Cerrar Sesión" name = "close"/>
							</form>
						</div>	
						<div class="col-xs-8 col-sm-8  col-md-8 col-lg-8 thumbnail" >
							<img src="Imagenes/Logo.png" class="img-responsive center-block" width="700px" />
						</div>	
							
				</div>
		</div>
		
	</body>
</html>';
?>