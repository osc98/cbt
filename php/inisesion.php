<?php
$mensaje="";
include('sesiones.php');
if(isset($_POST['btnEnvia'])){
	$email=$_POST['email'];
	$password=$_POST['password'];
	$mensaje=IniciarSesion($email,$password);
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
	
		
	
	<section id='main-contentdos'>
	
	<div >
			<nav>
				<ul>
					<li class='lista'>
					 <a href='../index.html'>Inicio</a>
					</li>
					
					<li style='float:right;'>
					 <a href='crearUsuario.php'>¡Registrate con nosotros!</a>
					</li>
					
					<li style='float:right;'>
					 <a href='consultarfoto.php'>¿Buscas una imagen?</a>
					</li>
				</ul>
			</nav>
		</div>
	
	
		<article>
		
			<header> 
				<h1 class='titulodos'>¡Hola, Bienvenido!</h1>
				
			</header>
			
			<div class='content'>
			  <div class='formulario'>
			    <h1 class='titform'>Iniciar Sesion</h1>
				<hr>
				
				<form method='post' action='#'>
					<div class='row'>
						<input type='email' name='email' placeholder='INGRESA CORREO ELECTRONICO'
						autocomplete='off' required>
					</div>
					
					<div class='row'>
						<input type='password' name='password' placeholder='INGRESA CONTRASEÑA' 
						minlength='8' maxlength='16' required>
					</div>
					
					<div class='row'>
						<input type='submit' name='btnEnvia'
						value='Enviar'>
					</div>
				</form>
			  </div>
			   <br>
			   <span><?php echo $mensaje; ?></span>
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




	