<?php

function IniciarSesion($email,$password){
	include('basedatos.php');
	//Conectarse a la base de datos
	$cn = conectar();
	$sql = "select * from usuario where (email='$email') and (password='$password');";
	if ($cn){
		//Ejecutar la consulta
		$dato= consulta($cn,$sql);
		if ($dato==-1){
			return "Error en la consulta";
		}
		else{
			if($dato==0){
				return "Usuario y/o contraseña no validos";
			}
			else{
				//Incia la Sesion
				session_start();
				//Generar las variables de sesion
				$_SESSION['userlogin']=$dato['email'];
				$_SESSION['username']=$dato['nombusuario'];
				$_SESSION['fotop']=$dato['fotoperfil'];
				$_SESSION['idusuario']=$dato['idusuario'];
				cerrar($cn);
				header('Location:indexsistema.php');
			}
		}
	}
	else{
		return "Error al conectarse a la BD";
	}
}

?>