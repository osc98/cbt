<?php
/*-----Funcion de conexion a la Base de datos-----*/
function conectar(){
	$servidor='localhost'; // http://127.0.0.1
	$usuario='root';
	$password='';
	$bd='gestorfotos';
	
	$con =@mysqli_connect($servidor,$usuario,$password,$bd);
	
	if($con)
		return $con;
	else
		return false;
}

/*-----Funcion para consultar la BD-----*/
function consulta($con,$sql){
	if($resul=mysqli_query($con,$sql)){
		//Checar el numero de registro obtendio
		//de la consulta.
		if (mysqli_num_rows($resul)){
			return mysqli_fetch_array($resul);
		}
		else{
			return 0;
		}
	}
	else{
		return -1;
	}
}
/*-----Funcion para ejecutar Insert,update y Delete-----*/
function operacion($con,$sql){
	if (mysqli_query($con,$sql)){
		return true;
	}
	else{
		return false;
	}
}

/*-----Funcion que cierra la conexion a la BD-----*/
function cerrar($con){
	mysqli_close($con);
}

function buscar($con,$sql){
	if($resul=mysqli_query($con,$sql)){
	
		return $resul;}
		else{
			
			return false;
		}
			
}

?>