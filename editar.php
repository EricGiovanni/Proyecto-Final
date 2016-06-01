<?php 
	session_start();
	if (!@$_SESSION['Usuario']) 
		header("Location:Inicio.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Editar Perfil</title>
		<meta charset= "UTF-8"/>
		<meta http-equiv= "x-UA-Compatible" content="IE-edge"/>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<link href="Bootstrap\bootstrap-3.3.6-dist\css\bootstrap.min.css" rel="stylesheet"/>
		<script type="text/javascript" src="jQuery-2.2.3.js"></script>
		<script type="text/javascript" src="Bootstrap\bootstrap-3.3.6-dist\js\bootstrap.min.js"></script>
		<link rel="stylesheet/less" type="text/css" href="style-1.less"/>	
		<script src="less.min.js" type="text/javascript"></script>
		</head>
	<body>
		<script>
			function myfunction(){
				var col1 = document.getElementById("color").value;
				less.modifyVars({
					"@col1":col1
				});
				less.refreshStyles();
			}
		</script>
		<br/><div class="container">
				<div id="head" class="row">
					<div class="col-xs-6 col-sm-6  col-md-6 col-lg-6">
						<img src="Imagenes/Pumito.png" class="img-responsive center-block" width="250px" />
					</div>
					<div class="col-xs-6 col-sm-6  col-md-6 col-lg-6">
						<h1 class="text-left">Sapiencia</h1>
					</div>
				</div>
			</div><br/>
			<div id="editar">
					<p><label for="color">Cambiar colores:</label><input type="color" id="color" name="color"/><br/>
					
					<button onclick="myfunction()">Change</button>
			</div><br/><br/><br/><br/><br/>
			<div>
				<a href="alumno.php">Regresar</a>
			</div>
		</div>
		<script>
		</script>
		
	</body>
</html>