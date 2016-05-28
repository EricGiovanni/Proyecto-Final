<?php
	session_start();
	if(@!$_POST['user'])
		header("Location:Inicio.php");
	//LOGIN ALUMNO
	if($_POST['Alumno'])
	{
		if($_POST['Enviar']&&$_POST['csrf']==$_SESSION['csrf'])
		{
			$con = mysqli_connect("localhost","root","","Sapiencia");
			if(!$con)
				echo 'No se pudo conectar'.mysqli_connect_error();
			$user=$_POST['user'];
			$pass=$_POST['pass'];
			$consulta="SELECT * FROM Alumno WHERE Num_Cuenta='".mysqli_real_escape_string($con,$user)."'";
			$sql=mysqli_query($con,$consulta);
			if($row=mysqli_fetch_array($sql))
			{
				$dbhash=$row['Password'];
				$hash=crypt($pass,$dbhash);
				if($hash==$dbhash)
				{
					$_SESSION['Usuario']=$row['Num_Cuenta'];
					$usuario=$_SESSION['Usuario'];
					echo '<script>location.href="alumno.php"</script>';
				}
				else
				{
					echo '<script>alert("Contraseña incorrecta")</script>';
					echo '<script>location.href="Inicio.php"</script>';
				}
			}
			else
			{
				echo '<script>alert("Usuario incorrecto")</script>';
				echo '<script>location.href="Inicio.php"</script>';
			}
			mysqli_close($con);
		}
		else
			header("Location:Inicio.php");
	}
	//LOGIN PROFESOR
	elseif($_POST['Profesor'])
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
					$_SESSION['id']=$row['ID'];
					$_SESSION['Usuario']=$row['Usuario'];
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
	//LOGIN COORDINADOR
	elseif($_POST['Coordinador'])
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
					$_SESSION['id']=$row['ID'];
					$_SESSION['Usuario']=$row['Usuario'];
					$usuario=$_SESSION['Usuario'];
					echo '<script>location.href="coordinador.php"</script>';
				}
				else
				{
					echo '<script>alert("Contraseña incorrecta")</script>';
					echo '<script>location.href="Inicio.php"</script>';
				}
			}
			else
			{
				echo '<script>alert("Usuario incorrecto")</script>';
				echo '<script>location.href="Inicio.php"</script>';
			}
			mysqli_close($con);
		}
		else
			header("Location:Inicio.php");
	}
	//LOGIN ADMINISTRADOR
	elseif($_POST['Administrador'])
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
				$hash=crypt($pass,$dbhash);
				if($hash==$dbhash)
				{
					$_SESSION['id']=$row['ID'];
					$_SESSION['Usuario']=$row['Usuario'];
					$usuario=$_SESSION['Usuario'];
					echo '<script>location.href="administrador.php"</script>';
				}
				else
				{
					echo '<script>alert("Contraseña incorrecta")</script>';
					echo '<script>location.href="Inicio.php"</script>';
				}
			}
			else
			{
				echo '<script>alert("Usuario incorrecto")</script>';
				echo '<script>location.href="Inicio.php"</script>';
			}
			mysqli_close($con);
		}
		else
			header("Location:Inicio.php");
	}
?>