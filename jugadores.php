<head>
		<title>Jugadores</title>
		<meta charset= "UTF-8"/>
		<meta http-equiv= "x-UA-Compatible" content="IE-edge"/>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<link href="Bootstrap\bootstrap-3.3.6-dist\css\bootstrap.min.css" rel="stylesheet"/>
		<script type="text/javascript" src="jQuery-2.2.3.js"></script>
		<script type="text/javascript" src="Bootstrap\bootstrap-3.3.6-dist\js\bootstrap.min.js"></script>
		<link rel="stylesheet/less" type="text/css" href="Styles.less"/>	
		<script src="less.min.js" type="text/javascript"></script>
		<?php 
			session_start();
			if (!@$_SESSION['Usuario']) 
				header("Location:Inicio.php");
		?>
		</head>
	<body>
		
		<br/><div class="container">
				<div id="head" class="row">
					<div class="col-xs-6 col-sm-6  col-md-6 col-lg-6">
						<img src="Imagenes/Pumito.png" class="img-responsive center-block" width="250px" />
					</div>
					<div class="col-xs-6 col-sm-6  col-md-6 col-lg-6">
						<h1 class="text-left">Sapiencia</h1>
					</div>
				</div><br/>
				
				<div class="row">
					<form action = "Juego.php" method = "POST">
						<div class="col-xs-3 col-xs-offset-1 xs-offset-3 col-sm-3  col-md-3 col-lg-3 thumbnail jugadores" >
							<input type = "submit" class="btn btn-lg btn-block" value = "UNJUGADOR" name = "jugadores"/>
							<img src="Imagenes/Pumito.png" class="img-responsive center-block" width="270px" />
						</div>	
						<div class="col-xs-3 col-xs-offset-1 col-sm-3  col-md-3 col-lg-3 thumbnail jugadores">	
							<input type = "submit" class="btn btn-lg btn-block" value = "ALEATORIO" name = "jugadores"/>
							<img src="Imagenes/Pumito.png" class="img-responsive center-block" width="130px" />
							<img src="Imagenes/Pumito.png" class="img-responsive center-block" width="130px" />
						</div>	
						<div class="col-xs-3 col-xs-offset-1 col-sm-3  col-md-3 col-lg-3 thumbnail jugadores">	
							<input type = "submit" class="btn btn-lg btn-block" value = "DOS JUGADORES" name = "jugadores"/>
							<img src="Imagenes/Pumito2.png" class="img-responsive center-block" width="270px" />
						</div>	
					</form>
					<form action = "alumno.php">
						<input type = "submit" value = "Volver al inicio" class = "form-control-static"/>
					</form>					
				</div>
						
				</div>
		</div>
		<script>
		</script>
		
	</body>
</html>