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
	function subir_Imagen($foto_Perfil, $ruta,$ext,$tam,$directorio){
			//$nombArch=$_FILES['ArchImg']['name'];
			//Checar que el tamaño de la imagen sea menor a 1MB
			if($tam<10000000000000000){
				//Arreglo de extensiones permitidas
				$extper=array(0=>'image/jpg',1=>'image/png',2=>'image/jpeg',3=>'image/gif');
				if (in_array($ext,$extper)){
					//Subir imagen al sitio web.
					$rutadestino='../'.$directorio.'/'.$foto_Perfil;
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
			$sql="select * from album where (idalbum='$titAlbum')";
			$datos=buscar($cone,$sql);
			while($valores=mysqli_fetch_array($datos)){
			echo " <h2>Descripcion: " .$valores['descripcion']. "</h2><br>";
			echo "<h2>Fecha: " .$valores['fechacreado']. "</h2><br>";
			mostrar_Fotos($valores['idalbum']);	
		}
		}
		cerrar($cone);
	}

	function crear_Foto($titulo,$tipo,$fecha,$pais,$foto,$idalbum){
		$cone=conectar();
	
	if ($cone){
		$sql="select * from foto where (titfoto='$titulo')";
		$dato=consulta($cone,$sql);
		if ($dato==-1){
			cerrar($cone);
			return "Error al ejecutar consulta...";
			
		}else{
			if($dato==0){
				$sql="INSERT INTO foto VALUES ('','$idalbum','$titulo','$tipo','$fecha','$pais','$foto' )";
				if (operacion($cone,$sql)){
					$sql="select * from foto where (titfoto='$titulo')";
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
				return "Foto existente...";
			}
		}
		
	}else{
		return "Error al establecer conexion con la BD...";
	}
		/////////////////
		
	}
	function actualizarUsu($idusuario,$nombusuario,$fechanac,$sexo,$pais,$email,$password,$fotoperfil){
		$cone=conectar();
	
	if ($cone){
		$sql="select * from usuario where (email='$email')";
		$dato=consulta($cone,$sql);
		if ($dato==-1){
			cerrar($cone);
			return "Error al ejecutar consulta...";
			
		}else{
			if($dato==0){
				$sql="UPDATE   usuario SET `nombusuario`='$nombusuario',`fechanac`='$fechanac',
				`sexo`='$sexo',`país`='$pais',`email`='$email',`password`='$password',`fotoperfil`='$fotoperfil'
				WHERE idusuario=$idusuario";
				//(null,'$nombusuario','$fechanac','$sexo','$pais','$email','$password','$fotoperfil')";
				if (operacion($cone,$sql)){
					operacion($cone,$sql);
					cerrar($cone);
					return "Se ha actualizado los datos...";
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


	function mostrar_Fotos($idalbum){
		$cone=conectar();
		
		if ($cone) {
			$sql="SELECT f.archivofoto FROM `foto` f inner join album a on a.idalbum=f.idalbum 
			where a.idalbum='$idalbum'";
			$datos=buscar($cone,$sql);
			while($valores=mysqli_fetch_array($datos)){
			echo " <img src='../fotos/" .$valores['archivofoto']. "'></img><br>";
		}
		}
		cerrar($cone);
	}
	function borrarUser($idusuario){
		echo $idusuario;
		$cone=conectar();
		
		if ($cone) {
			$sql="DELETE FROM foto  WHERE idalbum in (select idalbum from album  where idusuario='$idusuario')";
			if($datos=operacion($cone,$sql)){
				echo 'borrado';
			}
			$sql="DELETE FROM `album` WHERE idusuario='$idusuario'";
			$datos=operacion($cone,$sql);
			$sql="DELETE FROM `usuario` WHERE idusuario='$idusuario'";
			$datos=operacion($cone,$sql);
		}
		cerrar($cone);
	}

	function formActuUsu($email){
		$cone=conectar();
		$mensaje="";
		if ($cone){
			$sql = "select * from usuario where email='$email'";
			$dato = consulta($cone,$sql);
			if ($dato){
				$id=$dato['idusuario'];
			 echo "
						  <div class='formulario'>
						   <h1 class='titform'>Modificar Usuario</h1>
						   <form method='post' action='actualizarusu.php' enctype='multipart/form-data'>
							<div class='row'>
								<div class='col-25'>
								  <label>Nombre Completo</label>
								</div>
								<div class='col-75'>
								 <input type='text' name='nombusuario' value='".$dato['nombusuario']."'
										autocomplete='off' required>
								</div>
							  </div>
							
							 <div class='row'>
								<div class='col-25'>
								  <label>Fecha de Nacimiento</label>
								</div>
								<div class='col-75'>
								 <input type='date' name='fechanac' value='".$dato['fechanac']."'
										autocomplete='off' required>
								</div>
							  </div>
							  
							  <div class='row'>
							 <div class='col-25'>
							   <label>sexo</label>
							 </div>
							 <div class='col-75'>
								<input name='sexo' value='".$dato['sexo']."'>
									
								</select>
							</div>
						   </div> 
						   
							<div class='row'>
								  <div class='col-25'>
									<label> País</label>
											
								</div>
								<div class='col-75'>
								  <input type='text' name='pais' value='".$dato['país']."'
										autocomplete='off' required>
								</div>
							  </div>
							  
							  <div class='row'>
								<div class='col-25'>
								  <label>Correo Electronico</label>
								</div>
								<div class='col-75'>
								 <input type='email' name='email' value='".$dato['email']."'
										autocomplete='off' required>
								</div>
							  </div>
							  
							  <div class='row'>
								<div class='col-25'>
								  <label>Contraseña</label>
								</div>
								<div class='col-75'>
								 <input type='password' name='password' value='".$dato['password']."'
										autocomplete='off' required>
								</div>
							  </div>
	
							  <div class='row'>
						    <div class='col-25'>
							  <label>Foto de Perfil</label>
							</div>
							<div class='col-75'>
							 <input type='file' name='fotoperfil' accept='image/*'
								    autocomplete='off' >
							</div>
						  </div>
							  
							   <div class='row'>
							   <input type='submit' name='btnActualizar' value='Actualizar'>
							   
							  </div>
							  
							</form>
							
						  </div>
						   
						";
						cerrar($cone);
			}else{
				echo "No hay usuario con ese CORREO...";
				
			}
		}else{
			echo "Error de conexion a la BD...";
		}
	}


?>