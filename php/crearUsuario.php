<?php
include("funciones.php");
session_start();

$mensaje="";
$mensaje2="";
		
if (isset($_SESSION['userlogin'])){
	$email =$_SESSION['userlogin'];
	$nombusuario = $_SESSION['username'];	
}
if(isset($_POST['btnUsuario'])){
		$nombusuario=$_POST['nombusuario'];
		$fechanac=$_POST['fechanac'];
		$sexo=$_POST['sexo'];
		$pais=$_POST['pais'];
		$email=$_POST['email'];
		$password=$_POST['password'];
		$password2=$_POST['password2'];
		if ($password==$password2) {
		$fotoperfil=$_FILES['fotoperfil'];
		if (!empty($fotoperfil)) {
			
			$mensaje=NuevoUsu($nombusuario,$fechanac,$sexo,$pais,$email,$password,$_FILES['fotoperfil']['name']);
			$mensaje2= subir_Imagen($_FILES['fotoperfil']['name'],$_FILES['fotoperfil']['tmp_name'],$_FILES['fotoperfil']['type'],$_FILES['fotoperfil']['size'],'fotoperfiles');
		}
		else {
			$mensaje=NuevoUsu($nombusuario,$fechanac,$sexo,$pais,$email,$password,'sinfoto.jpg');
		}
	}else {
		$mensaje="Error no coiciden las contraseñas";
	}
		
		
		
	}
?>



<!DOCTYPE html>
<html lang='es'>
	<head>
	   <meta charset='utf-8'>
	    <title>FotoWeb</title>
		 <link rel='stylesheet' href='../css/miestilo.css'>
		 <link rel='stylesheet' href='../css/miestilodos.css'>
	</head>
	
  <body>
	
	<section id='main-contentuno'>
	
	<nav id='menu'>
				<ul>
					<li class='lista'>
					 <a href='../index.html'>Inicio</a>
					</li>
					
					<li style='float:left;'>
					 <a href='inisesion.php'> Iniciar Sesion</a>
					</li>
					
					<li style='float:right;'>
					 <a href='consultarfoto.php'>¿Buscas una imagen?</a>
					</li>
				</ul>
			</nav>
	
		<article>
			<header> 
				<h1 class='titulo'>Gestor de Fotos e Imagenes</h1>
			</header>
			
			<div class='content'>
			 <?php 
					echo"
					  <div class='formulario'>
					   <h1 class='titform'>Crear Usuario</h1>
					   <hr>
					    <form method='post' action='crearUsuario.php' enctype='multipart/form-data'>
						
						<div class='row'>
						    <div class='col-25'>
							  <label>Nombre Completo</label>
							</div>
							<div class='col-75'>
							 <input type='text' name='nombusuario'
								    autocomplete='off' required>
							</div>
						  </div>
						
						 <div class='row'>
						    <div class='col-25'>
							  <label>Fecha de Nacimiento</label>
							</div>
							<div class='col-75'>
							 <input type='date' name='fechanac'
								    autocomplete='off' required>
							</div>
						  </div>
						  
						  <div class='row'>
						 <div class='col-25'>
						   <label>sexo</label>
						 </div>
						 <div class='col-75'>
							<select name='sexo'>
								<option value='M'>Masculino</option>
								<option value='F'>Femenino</option>
							</select>
						</div>
					   </div> 
					   
					    <div class='row'>
						      <div class='col-25'>
							    <label> País</label>
										
							</div>
							<div class='col-75'>
							  <input type='text' name='pais'
									autocomplete='off' required>
							</div>
						  </div>
						  
						  <div class='row'>
						    <div class='col-25'>
							  <label>Correo Electronico</label>
							</div>
							<div class='col-75'>
							 <input type='email' name='email'
								    autocomplete='off' required>
							</div>
						  </div>
						  
						  <div class='row'>
						    <div class='col-25'>
							  <label>Contraseña</label>
							</div>
							<div class='col-75'>
							 <input type='password' name='password'
								    autocomplete='off' required>
							</div>
						  </div>

						  <div class='row'>
						  <div class='col-25'>
							<label>Confirma Contraseña</label>
						  </div>
						  <div class='col-75'>
						   <input type='password' name='password2'
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
						   <input type='submit' name='btnUsuario' value='Registrar'>
						  </div>
						  
						</form>
					  </div>
					   <span>".$mensaje."</span>
					   <span>".$mensaje2."</span>
					";
			 ?>
			</div>
		</article>
	</section>

<footer id='main-footer'>
		<p class='titpie'>
		&copy;Derechos Reservados a Miguel Magueyal Jr 
		<br> 
		
		The company of the new century.
		<br>
		¡Descarga la App!
		
		<br>
			<a href='https://play.google.com/store?hl=es_419&gl=US' target="_blanck"><img class='imglogo' src='../imgweb/icono2.jpg'></a> 
		</p>
	</footer>
  </body>
</html>