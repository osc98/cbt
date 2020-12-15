<?php
include('basedatos.php');

function menu(){
	
	echo"<ul>";
	echo"<li class='lista'><a href='indexsistema.php'>Inicio</a></li>";
		
		echo"<li class='lista'><a>Mis Albumes</a>
				<ul>
					<li><a href='agregaralbum.php'>Crear Album</a></li>
					<li><a href='veralbum.php'>Mis Albumes</a></li>
					</ul>
			 </li>";
	
		echo "<li class='lista'><a href='agregarfoto.php'>Agregar Foto</a> </li>";

		echo "<li class='lista'><a href='actualizarusu.php'>Actualizar mis Datos</a> </li>";
				
		echo "<li class='lista'><a href='eliminarusu.php'>Eliminar Cuenta</a> </li>";
		
		echo "<li class='lista'><a href='consultarfoto.php'>Buscar Fotos</a> </li>";
		
		echo "<li class='lista'><a href='cerrarsesion.php'>Cerrar Sesion</a> </li>";
		
	echo "</ul>";
}


function NuevoUsu($nombusuario,$fechanac,$sexo,$pais,$email,$password,$fotoperfil){
	$cone=conectar();
	
	if ($cone){
		$sql="select * from usuario where (email='$email')";
		$dato=consulta($cone,$sql);
		if ($dato==-1){
			cerrar($cone);
			return "Error al ejecutar consulta...";
			
		}else{
			if($dato==0){
				$sql="insert into usuario values(null,'$nombusuario','$fechanac','$sexo','$pais','$email','$password','$fotoperfil')";
				if (operacion($cone,$sql)){
					$sql ="select * from usuario where(email='$email')";
					$dato=consulta($cone,$sql);
					$idusuario=$dato['idusuario'];
					operacion($cone,$sql);
					cerrar($cone);
					return "Se ha registrado los datos...";
				}else{
					cerrar($cone);
					return "Error al registrar los datos...";
				}
				
			}else{
				cerrar($cone);
				return "Usuario existente...";
			}
		}
		
	}else{
		return "Error al establecer conexion con la BD...";
	}
}
	function subir_Imagen($foto_Perfil, $ruta,$ext,$tam){
			//$nombArch=$_FILES['ArchImg']['name'];
			//Checar que el tamaño de la imagen sea menor a 1MB
			if($tam<10000000000000000){
				//Arreglo de extensiones permitidas
				$extper=array(0=>'image/jpg',1=>'image/png',2=>'image/jpeg',3=>'image/gif');
				if (in_array($ext,$extper)){
					//Subir imagen al sitio web.
					$rutadestino='../fotoperfiles/'.$foto_Perfil;
					if (move_uploaded_file($ruta,$rutadestino))
						return '';
					else
					return 'Error al cargar imagen';
				}
				else
				return 'Error solo permite archivos:.png,.jpg,.jpge y .gif';
			}
			else
			return 'Error: solo acepta archivos menores a 1MB';
	}
	function mostrar_fotoPerfil($email){
		$sql="select fotopefil from usuario where (email='$email')";
		$dato=consulta($cone,$sql);
		return var_dump($dato);
	}
	function crear_Album($idusuario,$titAlbum, $descripcion){
		$cone=conectar();
	
	if ($cone){
		$sql="select * from album where (titalbum='$titAlbum')";
		$dato=consulta($cone,$sql);
		if ($dato==-1){
			cerrar($cone);
			return "Error al ejecutar consulta...";
			
		}else{
			if($dato==0){
				$sql="INSERT INTO album VALUES ('','$idusuario','$titAlbum',CURRENT_DATE(),'$descripcion' )";
				if (operacion($cone,$sql)){
					$sql ="select * from album where(titalbum='$titAlbum')";
					$dato=consulta($cone,$sql);
					$idalbum=$dato['idalbum'];
					operacion($cone,$sql);
					cerrar($cone);
					return "Se ha registrado los datos...";
				}else{
					cerrar($cone);
					return "Error al registrar los datos...";
				}
				
			}else{
				cerrar($cone);
				return "Album existente...";
			}
		}
		
	}else{
		return "Error al establecer conexion con la BD...";
	}
		/////////////////
		
	}

	function ver_Album($idusuario){
		$cone=conectar();
	
	if ($cone){
		$sql ="select * from album where (idusuario='$idusuario')";
		$datos=buscar($cone,$sql);
		//var_dump( $datos);
		while ($valores =mysqli_fetch_array($datos)) {
			echo '<option value="'.$valores['idalbum'].'">'.$valores['titalbum'].'</option>';
		}
		cerrar($cone);
	}	
	}

	function detalles_Album($titAlbum){
		$cone=conectar();
		if ($cone) {
			$sql="select * from album where (titalbum='$titAlbum')";
			$datos=buscar($cone,$sql);
			while($valores=mysqli_fetch_array($datos)){
			echo " <h2>Descripcion: " .$valores['descripcion']. "</h2><br>";
			echo "<h2>Fecha: " .$valores['fechacreado']. "</h2><br>";	
		}
		}
		cerrar($cone);
	}

	function crear_Foto($idusuario,$titAlbum, $descripcion){
		$cone=conectar();
	
	if ($cone){
		$sql="select * from album where (titalbum='$titAlbum')";
		$dato=consulta($cone,$sql);
		if ($dato==-1){
			cerrar($cone);
			return "Error al ejecutar consulta...";
			
		}else{
			if($dato==0){
				$sql="INSERT INTO album VALUES ('','$idusuario','$titAlbum',CURRENT_DATE(),'$descripcion' )";
				if (operacion($cone,$sql)){
					$sql ="select * from album where(titalbum='$titAlbum')";
					$dato=consulta($cone,$sql);
					$idalbum=$dato['idalbum'];
					operacion($cone,$sql);
					cerrar($cone);
					return "Se ha registrado los datos...";
				}else{
					cerrar($cone);
					return "Error al registrar los datos...";
				}
				
			}else{
				cerrar($cone);
				return "Album existente...";
			}
		}
		
	}else{
		return "Error al establecer conexion con la BD...";
	}
		/////////////////
		
	}

?>