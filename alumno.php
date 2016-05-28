<?php
	session_start();
	if (!@$_SESSION['Usuario']) 
		header("Location:Inicio.php");
	$user="Usuario-ejemplo";
	$mipuntaje=0;
	$puntajemax=0;
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
				<img src="Pumito.png" class="img-responsive center-block" width="250px" />
			</div>
			<div class="col-xs-6 col-sm-6  col-md-6 col-lg-6">
				<h1 class="text-left">Sapiencia</h1>
			</div>
		</header><br/>
			<h2 class="text-center">Hola '.$user.'</h2>
		<br/><div class="container">
				
				<div class="row">
				
						<div class="col-xs-4 col-sm-4  col-md-4 col-lg-4">
							<form action = "editar.php" method = "POST">
								<input type = "submit" class="btn btn-default btn-lg btn-block" value = "Editar perfil" name = "editar"/>
							</form>
							<div class="thumbnail datos">
								<h3 class="text-center">Puntuacion</h3>
								Mejor Puntuacion: <br/>
								<div class="progress">
									<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:'.$mipuntaje.'%"> </div>
								</div>
								Mi Puntuacion:
								<div class="progress">
									<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:'.$puntajemax.'%"> </div>
								</div>
							</div>
							<div class="thumbnail datos">
								<h3 class="text-center">Temas que debes repasar</h3>
								<ul class="list-unstyled">';
									foreach ($repaso as $elem)
									{
										echo '<li>'.$elem.'</li>';
									}
								echo '</ul>
							</div>
							<form action = "cerrar.php">
								<input type = "submit" class="btn btn-default btn-lg btn-block" value = "Cerrar Sesión" name = "close"/>
							</form>
						</div>	
						<div class="col-xs-8 col-sm-8  col-md-8 col-lg-8 thumbnail" >
							<form action = "inicio.php" method = "POST">
								<input type = "submit" class="btn btn-warning btn-lg btn-block" value = "Iniciar juego" name = "begin"/>
							</form>
							<img src="Pumito.png" class="img-responsive center-block" width="300px" />
						</div>	
							
				</div>
		</div>
		
	</body>
</html>';
?>