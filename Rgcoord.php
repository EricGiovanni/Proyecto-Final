<?php
	session_start();
	if(@($_POST['enviar'])&&$_POST['csrf']==$_SESSION['csrf'])
	{
		$user=$_POST['Usuario'];
		$nom=$_POST['nombre'];
		if($_POST['Pass1']==$_POST['Pass2'])
			$pass=$_POST['Pass1'];
		else
		{
			echo '<script>alert("Las Contrase&ntilde;as no coinciden")</script>';
			echo '<script>location.href="Registro.php"</script>';
		}
		if(preg_match('/[ A-z]{3,60}/',$nom)&&$nom!='')
		{
			if(preg_match('/[A-z0-9]{5,}/',$user)&&$user!='')
			{
				if(preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,12}$/',$pass)&&$pass!='')
				{
					$con = mysqli_connect("localhost","root","","Sapiencia");
					if(!$con)
						echo 'No se pudo conectar'.mysqli_connect_error();
					$consulta="SELECT * FROM Coordinador WHERE Usuario='".mysqli_real_escape_string($con,$user)."'";
					$res=mysqli_query($con,$consulta);
					$check=mysqli_num_rows($res);
					$sal = substr(base64_encode(openssl_random_pseudo_bytes('30')), 0, 30);
					$sal = strtr($sal, array('+' => '.')); 
					$hash = crypt($pass,$sal);
					if($check>0)
					{
						echo '<script>alert("Ya existe una cuenta con el numero que introduciste");</script>';
						echo '<script>location.href="Crear.php"</script>';
					}
					else
					{
						$insertar="INSERT INTO Coordinador VALUES('".mysqli_real_escape_string($con,$user)."','".mysqli_real_escape_string($con,$nom)."','".mysqli_real_escape_string($con,$hash)."')";
						mysqli_query($con,$insertar);
						echo '<script>alert("Usuario registrado con éxito");</script>';
						echo '<script>location.href="administrador.php"</script>';
					}
					mysqli_close($con);
				}
				else
				{
					echo '<script>alert("Contraseña incorrecta");</script>';
					echo '<script>location.href="Crear.php"</script>';
				}
			}
			else
			{
				echo '<script>alert("Usuario incorrecto");</script>';
				header("location:Crear.php");
			}
		}
	}
	else
	{
		echo '<script>alert("Nombre incorrecto");</script>';
		header("location:Crear.php");
	}
?>