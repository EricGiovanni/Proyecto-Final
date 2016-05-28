<?php
	session_start();
	if(@($_POST['enviar'])&&$_POST['csrf']==$_SESSION['csrf'])
	{
		$user=$_POST['Nocta'];
		$nom=$_POST['nombre'];
		$grupo=$_POST['group'];
		if($_POST['Pass1']==$_POST['Pass2'])
			$pass=$_POST['Pass1'];
		/*else
		{
			echo '<script>alert("Las Contrase&ntilde;as no coinciden")</script>';
			echo '<script>location.href="Registro.php"</script>';
		}*/
		if(preg_match('/[ A-z]{5,60}/',$nom)&&$nom!='')
		{
			if(preg_match('/[0-9]{3}/',$grupo)&&$grupo!='')
			{
				if(preg_match('/[0-9]{9}/',$user)&&$user!='')
				{
					if(preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,12}$/',$pass)&&$pass!='')
					{
						$con = mysqli_connect("localhost","root","","Sapiencia");
						if(!$con)
							echo 'No se pudo conectar'.mysqli_connect_error();
						$consulta="SELECT * FROM Alumno WHERE Num_Cuenta='".mysqli_real_escape_string($con,$user)."'";
						$res=mysqli_query($con,$consulta);
						$check=mysqli_num_rows($res);
						$sal = substr(base64_encode(openssl_random_pseudo_bytes('30')), 0, 30);
						$sal = strtr($sal, array('+' => '.')); 
						$hash = crypt($pass,$sal);
						if($check>0)
						{
							echo '<script>alert("Ya existe una cuenta con el numero que introduciste");</script>';
							echo '<script>location.href="Registro.php"</script>';
						}
						else
						{
							$insert = "INSERT INTO Grupo(Grupo) VALUES ('".mysqli_real_escape_string($con,$grupo)."')";
							mysqli_query($con,$insert);
							$insertar="INSERT INTO Alumno VALUES('".mysqli_real_escape_string($con,$user)."','".mysqli_real_escape_string($con,$nom)."','".mysqli_real_escape_string($con,$grupo)."','".mysqli_real_escape_string($con,$hash)."')";
							mysqli_query($con,$insertar);
							echo '<script>alert("Usuario registrado con éxito");</script>';
							echo '<script>location.href="Inicio.php"</script>';
						}
						mysqli_close($con);
					}
					/*else
					{
						echo '<script>alert("Contraseña incorrecta");</script>';
						echo '<script>location.href="Registro.php"</script>';
					}*/
				}
				/*else
				{
					echo '<script>alert("Usuario incorrecto");</script>';
					header("location:Registro.php");
				}*/
			}
			/*else
			{
				echo '<script>alert("Grupo incorrecto");</script>';
				header("location:Registro.php");
			}*/
		}
		/*else
		{
			echo '<script>alert("Nombre incorrecto");</script>';
			header("location:Registro.php");
		}*/
	}
?>