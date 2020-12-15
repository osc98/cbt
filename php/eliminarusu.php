<?php
include("funciones.php");
session_start();
$mensaje="";		
    $idusuario=$_SESSION['idusuario'];
    $foto=$_SESSION['fotop'];
    $email=$_SESSION['userlogin'];
    $nombusuario = $_SESSION['username'];	
    if(isset($_POST['btnSI'])){
        borrarUser($idusuario);
        header('Location:../index.html?m=1');
    }
    if (isset($_POST['btnNO'])) {
        header('Location:indexsistema.php?m=1');
    }
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
				<h1 class='titulo'>¿Estas seguro ?</h1>
			
			
			<div class='content'>
            <form method="post" action="eliminarusu.php">
            <input type='submit' name='btnNO' value='NO '/>
            <input type='submit' name='btnSI' value='SI'/></div>
            </header>
    </form>
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