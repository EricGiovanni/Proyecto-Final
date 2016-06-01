<?php
	session_start();
	//LOGIN COORDINADOR
	if($_POST['Coordinador'])
	{
		if($_POST['Enviar']&&$_POST['csrf']==$_SESSION['csrf'])
		{
			$con = mysqli_connect("localhost","root","","Sapiencia");
			if(!$con)
				echo 'No se pudo conectar'.mysqli_connect_error();
			$user=$_POST['user'];
			$pass=$_POST['pass'];
			$consulta="SELECT * FROM Coordinador WHERE Usuario='".mysqli_real_escape_string($con,$user)."'";
			$sql=mysqli_query($con,$consulta);
			if($row=mysqli_fetch_array($sql))
			{
				$dbhash=$row['Password'];
				$hash=crypt($pass,$dbhash);
				if($hash==$dbhash)
				{
					$_SESSION['Usuario']=$row['Usuario'];
					$_SESSION['Nombre']=$row['Nombre'];
					$usuario=$_SESSION['Usuario'];
					echo '<script>location.href="coordinador.php"</script>';
				}
				else
				{
					echo '<script>alert("Contraseña incorrecta")</script>';
					echo '<script>location.href="Iniciocoord.php"</script>';
				}
			}
			else
			{
				echo '<script>alert("Usuario incorrecto")</script>';
				echo '<script>location.href="Iniciocoord.php"</script>';
			}
			mysqli_close($con);
		}
		else
			header("Location:Iniciocoord.php");
	}
	else
		header("Location:Iniciocoord.php")
?>