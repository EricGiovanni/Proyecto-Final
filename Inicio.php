<!DOCTYPE html>
<html>
	<head>
		<title>Practicas</title>
	<html>
		<head>
			<title>Sapiencia</title>
			<meta charset= "UTF-8"/>
			<meta http-equiv= "x-UA-Compatible" content="IE-edge"/>
			<meta name="viewport" content="width=device-width, initial-scale=1"/>
			<link href="Bootstrap\bootstrap-3.3.6-dist\css\bootstrap.min.css" rel="stylesheet"/>
			<script type="text/javascript" src="jQuery.js"></script>
			<script type="text/javascript" src="Bootstrap\bootstrap-3.3.6-dist\js\bootstrap.min.js"></script>
			<link rel="stylesheet/less" type="text/css" href="Styles.less"/>	
			<script src="less.min.js" type="text/javascript"></script>
			<?php
				session_start();
				if (@$_SESSION['Usuario']) 
					header("Location:alumno.php");
				//Código aleatorio para evitar CSRF
				$_SESSION['csrf'] = md5(uniqid(mt_rand(),true));
			?>
		</head>
	<body>
		
		<br/><div class="container">
				<header>
					<!-- --------------------------------- HEADER ------------------------------------ -->
					<div id="head" class="row">
						<div class="col-xs-6 col-sm-6  col-md-6 col-lg-6">
							<img src="Imagenes/Pumito.png" class="img-responsive center-block" width="250px" />
						</div>
						<div class="col-xs-6 col-sm-6  col-md-6 col-lg-6">
							<h1>Sapiencia</h1>
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
										<li class = "active"><a href="Inicio.php">Alumno</a></li><br/>
										<li><a href="InicioProf.php">Profesor</a></li><br/>
										<li><a href="InicioCoord.php">Coordinador</a></li><br/>
										<li><a href="InicioAdmin.php">Administrador</a></li><br/>
									</ul>
								</div>
							</div>
						</nav>
					</div>
					<div class="col-xs-pull-4 col-xs-8 thumbnail" >
						<!-- --------------------------- Login ------------------------------ -->
						<form action = "Proceso.php" method = "POST" id = "Botones">
							<h2 class="text-center">Bienvenidos</h2> 
							<div class="form-group">
								<label for="user">Número de Cuenta:</label>
								<input type = "text" id="user" name = "user" class = "form-control-static" placeholder = "Usuario"/><br/><br/>
							</div>
							<div class="form-group">
								<label for="pwd">Contraseña: </label>
								<input type = "password" id ="pwd" name = "pass" class = "form-control-static" placeholder = "Contraseña"/><br/><br/>
							</div>
							<div class = "form-group">
								<input type = "submit" id = "sbt" name = "Enviar" value = "Iniciar Sesión" class="btn btn-primary btn-lg"/>
							</div>
							<input type = "hidden" name = "csrf" value = "<?php echo $_SESSION['csrf']; ?>">
							<input type = "hidden" name = "Alumno" value = "alumno"/>
						</form><br/>
						<!-- --------------------------- REGISTRO ------------------------------ -->
						<form action = "Registro.php" method = "POST">
							<div class="form-group">
								<label for = "reg">¿No estás registrado?</label>
								<input type = "submit" class="btn btn-primary btn-lg" id="reg" value = "Registrarse" name = "registrarse"/>
							</div>
						</form>
					</div>
				</div>
		</div>	
	</body>
</html>
<?php
 function contador()
    {
        $archivo = "contador.txt"; //el archivo que contiene en numero
        $f = fopen($archivo, "r"); //abrimos el archivo en modo de lectura
        if($f)
        {
            $contador = fread($f, filesize($archivo)); //leemos el archivo
            $contador = $contador + 1; //sumamos +1 al contador
            fclose($f);
        }
        $f = fopen($archivo, "w+");
        if($f)
        {
            fwrite($f,$contador);
            fclose($f);
        }
        return $contador;
    }
	echo '<nav class="navbar navbar-inverse" role="navigation">
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<ul class="nav navbar-nav">
					<li class="active"><a href="#"><h4 style = "color:white;">'.contador().'</h4></a></li>
				</ul>
			</div>
		  </nav>';
?>