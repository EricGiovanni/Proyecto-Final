<!DOCTYPE html>
<html>
	<head>
		<title>Registro</title>
		<meta charset= "UTF-8"/>
		<meta http-equiv= "x-UA-Compatible" content="IE-edge"/>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<script type="text/javascript" src="jQuery.js"></script>
		<script type="text/javascript" src="Bootstrap\bootstrap-3.3.6-dist\js\bootstrap.min.js"></script>
		<link href="Bootstrap\bootstrap-3.3.6-dist\css\bootstrap.min.css" rel="stylesheet"/>
		<link rel="stylesheet/less" type="text/css" href="Styles.less"/>	
		<script src="less.min.js" type="text/javascript"></script>
		<?php
			session_start();
			if (!@$_SESSION['Nombre']) 
				header("Location:InicioAdmin.php");
			//Código aleatorio para evitar CSRF
			$_SESSION['csrf'] = md5(uniqid(mt_rand(),true));
		?>
	</head>
	<body>
		<br/><div class = "container">
				<header>
					<!-- --------------------------------- HEADER ------------------------------------ -->
					<div id="head" class="row">
						<div class="col-xs-6 col-sm-6  col-md-6 col-lg-6">
							<img src="Imagenes/Pumito.png" class="img-responsive center-block" width="250px" />
						</div>
						<div class="col-xs-6 col-sm-6  col-md-6 col-lg-6">
							<h1>Registro</h1>
						</div>
					</div><br/>
				</header>
				<div class="row">
					<form action = "Rgprof.php" method = "POST">
						<p><label style = "color:White;" for="user">Cedula:</label><br/><input type = "text" id="user" name = "Usuario" placeholder = "Cedula" pattern = "[0-9]{5,}" class = "form-control-static" required></p><br/>
						<p><label style = "color:White;" for="nombre">Nombre: </label><br/><input type = "text" id="nombre" name = "nombre" placeholder = "nombre" maxlength = "60" pattern = "[ A-z]{3,60}" class = "form-control-static" required/></p><br/>
						<p><label style = "color:White;" for="Telefono">Telefono: </label><br/><input type = "text" id="Telefono" name = "Telefono" placeholder = "5555555555" maxlength = "60" pattern = "[0-9]{8,10}" class = "form-control-static" required/></p><br/>
						<p><label style = "color:White;" for="Pass1">Contraseña: </label><br/><input type = "password" id="pwd" name = "Pass1" placeholder = "Contraseña" maxlength = "30" pattern = "^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$" class = "form-control-static" required/></p><label style = "color:white;">Debe contener al menos 6 caracteres, números, letras mayúsculas y minúsculas</label><br/>
						<p><label style = "color:White;" for="Pass2">Confirmar contraseña: </label><br/><input type = "password" id="Pass2" name = "Pass2" placeholder = "Contraseña" maxlength = "15"class = "form-control-static" required/><br/>
						<input type = "hidden" name = "csrf" value = "<?php echo $_SESSION['csrf']; ?>"><br/>
						<input type = "submit" value = "Registrarse" name = "enviar" class = "form-control-static"/>
					</form>
					<br/>
				<form action = "coordinador.php">
					<input type = "submit" value = "Regresar" class = "form-control-static"/>
				</form>
			</div>
		</div>
	</body>
</html>