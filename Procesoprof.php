<?php
	session_start();
	//LOGIN PROFESOR
	if($_POST['Profesor'])
	{
		if($_POST['Enviar']&&$_POST['csrf']==$_SESSION['csrf'])
		{
			$con = mysqli_connect("localhost","root","","Sapiencia");
			if(!$con)
				echo 'No se pudo conectar'.mysqli_connect_error();
			$user=$_POST['user'];
			$pass=$_POST['pass'];
			$consulta="SELECT * FROM Profesor WHERE Cedula='".mysqli_real_escape_string($con,$user)."'";
			$sql=mysqli_query($con,$consulta);
			if($row=mysqli_fetch_array($sql))
			{
				$dbhash=$row['Password'];
				$hash=crypt($pass,$dbhash);
				if($hash==$dbhash)
				{
					$_SESSION['Usuario']=$row['Cedula'];
					$_SESSION['Nombre']=$row['Nombre'];
					$usuario=$_SESSION['Usuario'];
					echo '<script>location.href="profesor.php"</script>';
				}
				else
				{
					echo '<script>alert("Contraseña incorrecta")</script>';
					echo '<script>location.href="InicioProf.php"</script>';
				}
			}
			else
			{
				echo '<script>alert("Usuario incorrecto")</script>';
				echo '<script>location.href="InicioProf.php"</script>';
			}
			mysqli_close($con);
		}
		else
			header("Location:InicioProf.php");
	}
	else
		header("Location:InicioProf.php");
?>