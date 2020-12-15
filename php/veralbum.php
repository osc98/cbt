<?php
include("funciones.php");
session_start();
$mensaje="";		
    $idusuario=$_SESSION['idusuario'];
    $foto=$_SESSION['fotop'];
    $email=$_SESSION['userlogin'];
	$nombusuario = $_SESSION['username'];	
?>


<!DOCTYPE html>
<html lang='es'>
	<head>
	   <meta charset='utf-8'>
	    <title>VerAlbum</title>
		 <link rel='stylesheet' href='../css/miestilo.css'>
		 <link rel='stylesheet' href='../css/miestilodos.css'>
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
				<h1 class='titulo'>menu album</h1>
			</header>
			
			<div class='content'>
            <form method="post" action="veralbum.php">
            <select name='albumcmb'>
            <option value="0">Seleccionar Album</option>
            <?php 
            ver_Album($idusuario);
            ?>
            </select>
            <input type='submit' name='btnAlbum' value='Detalles'/></div>
        <?php
            $option = isset($_POST['albumcmb']) ? $_POST['albumcmb'] : false;
            if ($option) {
                detalles_Album($option);
            }
       ?>


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