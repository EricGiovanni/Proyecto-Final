<?php
	session_start();
	//LOGIN ADMINISTRADOR
	if($_POST['Administrador'])
	{
		if($_POST['Enviar']&&$_POST['csrf']==$_SESSION['csrf'])
		{
			$con = mysqli_connect("localhost","root","","Sapiencia");
			if(!$con)
				echo 'No se pudo conectar'.mysqli_connect_error();
			$user=$_POST['user'];
			$pass=$_POST['pass'];
			$consulta="SELECT * FROM Administrador WHERE Usuario='".mysqli_real_escape_string($con,$user)."'";
			$sql=mysqli_query($con,$consulta);
			if($row=mysqli_fetch_array($sql))
			{
				$dbhash=$row['Password'];
				if($pass==$dbhash)
				{
					$_SESSION['Nombre']=$row['Nombre'];
					$_SESSION['Usuario']=$row['Usuario'];
					$usuario=$_SESSION['Usuario'];
					echo '<script>location.href="administrador.php"</script>';
				}
				else
				{
					echo '<script>alert("Contraseña incorrecta")</script>';
					echo '<script>location.href="InicioAdmin.php"</script>';
				}
			}
			else
			{
				echo '<script>alert("Usuario incorrecto")</script>';
				echo '<script>location.href="InicioAdmin.php"</script>';
			}
			mysqli_close($con);
		}
		else
			header("Location:InicioAdmin.php");
	}
	else
		header("Location:InicioAdmin.php");
?>