<?php
include("funciones.php");
session_start();
if (isset($_SESSION['userlogin'])){
	$email=$_SESSION['userlogin'];
	$nombusuario = $_SESSION['username'];
	$foto=$_SESSION['fotop'];
}
//$a=mostrar_fotoPerfil($email);

?>


<!DOCTYPE html>
<html lang='es'>
	<head>
	   <meta charset='utf-8'>
	    <title>FotoWeb</title>
		 <link rel='stylesheet' href='../css/miestilo.css'>
	</head>
	
  <body>
    <header id='main-header'>
	
		<div id='header-left'>
			<?php 
			if ($foto!='null') {
				echo "<img class='perfil' src='../fotoperfiles/$foto'>";
			}else {
				echo "<img class='perfil' src='../fotoperfiles/sinfoto.jpg'>";
			}
				
			?>
			<br>
		</div>
		
		<div id='header-right'>

			<?php echo "<font size='4%'>".$nombusuario."<br>".$email."</font>";?>
		</div>
		
	</header>
	
	<section id='main-contentuno'>
				<nav>
				<?php menu();?>
			</nav>
		</div>
		
		<article>
			<header> 
				<h1 class='titulo'>Gestor de Fotos e Imagenes</h1>
			</header>
			
			<div class='content'>
			  
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
	