<?php
		session_start();
		if (!@$_SESSION['Nombre']) 
			header("Location:InicioAdmin.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Uso mensual</title>
		<meta charset= "UTF-8"/>
		<meta http-equiv= "x-UA-Compatible" content="IE-edge"/>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<script type="text/javascript" src="jQuery.js"></script>
		<script type="text/javascript" src="Bootstrap\bootstrap-3.3.6-dist\js\bootstrap.min.js"></script>
		<link href="Bootstrap\bootstrap-3.3.6-dist\css\bootstrap.min.css" rel="stylesheet"/>
		<link rel="stylesheet/less" type="text/css" href="Styles.less"/>	
		<script src="less.min.js" type="text/javascript"></script>
		<script src="Chart.js"></script>
		<script src = "contador.txt"></script>
	</head>
	<body>  	  
		<div id="canvas-holder">
			<canvas id="chart-area4" width="600" height="300"></canvas>
		</div>
		<script>
			var lineChartData = {
				labels : ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"],
				datasets : [
					{
						label: "Primera serie de datos",
						fillColor : "rgba(220,220,220,0.2)",
						strokeColor : "#6b9dfa",
						pointColor : "#1e45d7",
						pointStrokeColor : "#fff",
						pointHighlightFill : "#fff",
						pointHighlightStroke : "rgba(220,220,220,1)",
						data : [30,20,50,80,90,10,50,15,20,12,18,15]
					},
				]
			}
				var ctx4 = document.getElementById("chart-area4").getContext("2d");
				window.myPie = new Chart(ctx4).Line(lineChartData, {responsive:true});
		</script>
		<form action = "Administrador.php">
			<input type = "submit" value = "Regresar" class = "form-control-static"/>
		</form>
	</body>
</html>