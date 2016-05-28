<?php
$números = range(1, 4);
shuffle($números);
$val=0;
$pregunta="Pregunta";

echo '<html>
	<head>
		<title>デート</title>
		<meta charset= "UTF-8"/>
		<meta http-equiv= "x-UA-Compatible" content="IE-edge"/>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<link href="Bootstrap\bootstrap-3.3.6-dist\css\bootstrap.min.css" rel="stylesheet"/>
		<script type="text/javascript" src="jQuery-2.2.3.js"></script>
		<script type="text/javascript" src="Preguntas.js"></script>
		<script type="text/javascript" src="Bootstrap\bootstrap-3.3.6-dist\js\bootstrap.min.js"></script>
		<link rel="stylesheet/less" type="text/css" href="Styles.less"/>	
		<script src="less.min.js" type="text/javascript"></script>

		
		</head>
	<body >
		<header>
			<h1 class="text-center">MATERIA</h1>
		</header>
		<div class="container">
			<br/><div class="thumbnail alert alert-info" role="alert"><br/><br/><br/>
				<h2 class="text-center">'.$pregunta.'<h2>
			<br/><br/><br/></div>
		
				<div class="progress">
					<div id="bar" class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: '.$val.'%">
						<span class="sr-only" id="porcent">0%</span>
					</div>
				</div>
						<br/>
						<div class="btn-group-vertical btn-block">';
							foreach ($números as $num) {
								echo'<button type="button" class="btn btn-lg btn-warning" id="btn'.$num.'" onclick="res'.$num.'()">Respuesta '.$num.'</button>';
							}
						echo'</div>
			<br/><br/>
				<!--div class="progress">
					<div id="bar" class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: '.$val.'%">
						<span class="sr-only" id="porcent">0%</span>
					</div>
				</div-->

		</div>
		<!--footer class="container">
				<div class="panel panel-primary">
					<div class="panel-heading">
					</div>
					<div class="panel-body"></div>
				</div>
		</footer-->
		<script>
		function block(val1,val2,val3)
		{
			var x = document.getElementById(val1);
			x.setAttribute("class","btn btn-lg btn-warning disabled");
			var x = document.getElementById(val2);
			x.setAttribute("class","btn btn-lg btn-warning disabled");
			var x = document.getElementById(val3);
			x.setAttribute("class","btn btn-lg btn-warning disabled");
		}
		function redireccionar(){
			window.location="Preguntas.php";
		}		 
		function next (res)
		{
			alert(res+"\n Presione aceptar para la siguiente pregunta");
			setTimeout ("redireccionar()", 1000);
			
		}
		function res1()
		{
			var x = document.getElementById("btn1");
			x.setAttribute("class","btn btn-lg btn-danger");
			block("btn4","btn2","btn3");
			next("ERROR");
		}
		function res2()
		{
			var x = document.getElementById("btn2");
			x.setAttribute("class","btn btn-lg btn-danger");
			block("btn1","btn4","btn3");
			next("ERROR");
		}
		function res3()
		{
			var x = document.getElementById("btn3");
			x.setAttribute("class","btn btn-lg btn-danger");
			block("btn1","btn2","btn4");
			next("ERROR");
		}
		function res4()
		{
			var x = document.getElementById("btn4");
			x.setAttribute("class","btn btn-lg btn-success");
			block("btn1","btn2","btn3");
			next("CORRECTO");
		}
			
		</script>
		
	</body>	
</html>';
?>