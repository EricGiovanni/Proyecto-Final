<!DOCTYPE html>
<html>
	<head>
		<title>Sapiencia</title>
		<meta charset= "UTF-8"/>
		<meta http-equiv= "x-UA-Compatible" content="IE-edge"/>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<link href="Bootstrap\bootstrap-3.3.6-dist\css\bootstrap.min.css" rel="stylesheet"/>
		<script type="text/javascript" src="jQuery.js"></script>
		<script type="text/javascript" src="Bootstrap\bootstrap-3.3.6-dist\js\bootstrap.min.js"></script>
		<link rel="stylesheet/less" type="text/css" href="stylej.less"/>	
		<script src="less.min.js" type="text/javascript"></script>

		</head>
	<body>
		<div class="container">
			<!--button id="boton" >GIRAR</button-->
			<canvas id="myCanvas" width="400" height="350" class="center-block">

			</canvas>
			<button class="btn btn-default btn-lg btn-block "id="boton1" onclick="stopinter" >DETENER</button><br/>
			<button class="btn center-block"id="boton2" onclick="reload()" >Volver a girar</button><br/>
			<script>
				function imagen(num){
					ctx.drawImage(img[num],0,30,400,300);
					ctx.drawImage(flecha,175,5,50,50);
				};
				
				function stopinter() {
					clearInterval(inter);
				};
				
				function reload()
				{
					setTimeout (function(){
						window.location="Juego.php";
					}, 50);
				}
				
				var img=new Array();
				var c=document.getElementById("myCanvas");
				var ctx = c.getContext("2d");
				for(var i=0; i<10;i++)
				{
					var num=i+1;
					img.push( new Image());
					img[i].src="Imagenes/imagen"+num+".jpg";
				}
				var flecha=new Image();
					flecha.src="Imagenes/flecha.png";
				var num=0;
				var inter;
				imagen(num);
				//document.getElementById("boton").addEventListener("click",function()
				//{
					var inter = setInterval(function ()
					{
						ctx.clearRect(0,0,500,500)
						imagen(num);
						num++;
							
						if(num>=10)
						{
							num=0;
						}
					},200);
				//});
				document.getElementById("boton1").addEventListener("click",function()
				{
						clearInterval(inter);
						imagen(num);
				});
				
			</script>
			<form action = "Juegopreg.php">	
				<input type = "submit" class = "btn center-block" id="boton2" value = "Ir a pregunta"/>
			</form>
			<form action = "alumno.php">	
				<input type = "submit" class = "btn center-block" id="boton2" value = "Volver al inicio"/>
			</form>
		</div>
	</body>	
</html>