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
		?>
	</head>
	<body>
		<br/>
		<div class = "container">
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
				<?php
					$con = mysqli_connect("localhost","root","","Sapiencia");
					if(!$con)
						echo "Ha ocurrido un error al conectar con la base de datos";
					$consul = "SELECT * FROM alumno";
					$result = mysqli_query($con,$consul);
					echo '<table class = "table table-condensed">';
					echo '<tr class = "info"><td>Numero de Cuenta</td><td>Nombre</td></tr>';
					while($row = mysqli_fetch_array($result))
					{
						echo '<tr class = "info"><td>'.$row[0].'</td><td>'.$row[1].'</td></tr>';
					}
					echo '</table>';
					echo '<br/>';
					$consul = "SELECT * FROM profesor";
					$result = mysqli_query($con,$consul);
					echo '<table class = "table table-condensed">';
					echo '<tr class = "info"><td>Cedula</td><td>Nombre</td><td>Telefono</td></tr>';
					while($row = mysqli_fetch_array($result))
					{
						echo '<tr class = "info"><td>'.$row[0].'</td><td>'.$row[1].'</td><td>'.$row[2].'</td></tr>';
					}
					echo '</table>';
					echo '<br/>';
					$consul = "SELECT * FROM coordinador";
					$result = mysqli_query($con,$consul);
					echo '<table class = "table table-condensed">';
					echo '<tr class = "info"><td>Usuario</td><td>Nombre</td></tr>';
					while($row = mysqli_fetch_array($result))
					{
						echo '<tr class = "info"><td>'.$row[0].'</td><td>'.$row[1].'</td></tr>';
					}
					echo '</table>';
					$close = mysqli_close($con);
				?>
				<br/>
				<form action = "Administrador.php">
					<input type = "submit" value = "Regresar" class = "form-control-static"/>
				</form>
			</div>
		</div>
	</body>
</html>