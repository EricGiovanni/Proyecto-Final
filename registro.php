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
			if (@$_SESSION['Usuario']) 
				header("Location:Tareas.php");
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
							<img src="Pumito.png" class="img-responsive center-block" width="250px" />
						</div>
						<div class="col-xs-6 col-sm-6  col-md-6 col-lg-6">
							<h1>Registro</h1>
						</div>
					</div><br/>
				</header>
				<div class="row">
					<div class="col-xs-push-8 col-xs-4">
						<nav>
							<!-- ------------------------- NAVBAR ------------------------------- -->
							<div class="navbar navbar-default" role="navigation">
								<div class="navbar-header color">
									<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav" aria-expanded="false">
										<span class="sr-only">Navigation</span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>
								</div>
								<div class="navbar-collapse collapse sidebar-navbar-collapse color" id = "nav">
									<ul class="nav nav-stacked nav-pills"><br/>
										<li><a href="Inicio.php">Alumno</a></li><br/>
										<li><a href="InicioProf.php">Profesor</a></li><br/>
										<li><a href="InicioCoord.php">Coordinador</a></li><br/>
										<li><a href="InicioAdmin.php">Administrador</a></li><br/>
									</ul>
								</div>
							</div>
						</nav>
					</div>
					<div class = "col-xs-pull-4 col-xs-8">
					<form action = "Registrarse.php" method = "POST">
						<p><label style = "color:White;" for="nocta">Numero de cuenta:</label><br/><input type = "text" id="nocta" name = "Nocta" placeholder = "Numero de Cuenta" maxlength = "9" pattern = "[0-9]{9}" class = "form-control-static" required></p><br/>
						<p><label style = "color:White;" for="group">Grupo:</label><br/><input type = "text" id="group" name = "group" placeholder = "Grupo" maxlength = "3" pattern = "[0-9]{3}" class = "form-control-static" required/></p><br/>
						<p><label style = "color:White;" for="nombre">Nombre completo</label><br/><input type = "text" id="nombre" name = "nombre" placeholder = "nombre" maxlength = "60" pattern = "[ A-z]{5,60}" class = "form-control-static" required/></p><br/>
						<p><label style = "color:White;" for="Pass1">Contraseña:</label><br/><input type = "password" id="pwd" name = "Pass1" placeholder = "Contraseña" maxlength = "30" pattern = "^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$" class = "form-control-static" required/></p><label>Debe contener al menos 6 caracteres, números, letras mayúsculas y minúsculas</label><br/>
						<p><label style = "color:White;" for="Pass2">Confirmar contraseña:</label><br/><input type = "password" id="Pass2" name = "Pass2" placeholder = "Contraseña" maxlength = "15"class = "form-control-static" required/><br/>
						<input type = "hidden" name = "csrf" value = "<?php echo $_SESSION['csrf']; ?>"><br/>
						<input type = "submit" value = "Registrarse" name = "enviar" class = "form-control-static"/>
					</form>
				</div>
		</div>
	</body>
</html>