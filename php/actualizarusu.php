<?php
include("funciones.php");
session_start();
$mensaje="";
$mensaje2="";
echo "hola";
    $idusuario=$_SESSION['idusuario'];
    $foto=$_SESSION['fotop'];
    $email=$_SESSION['userlogin'];

    $nombusuario = $_SESSION['username'];	
    if(isset($_POST['btnActualiza'])){
        $nombrecompleto=$_POST['nombreusuario'];
		$fechanac=$_POST['fechanac'];
		$sexo=$_POST['sexo'];
		$pais=$_POST['pais'];
		$email=$_POST['email'];
		$password=$_POST['password'];
		$fotoperfil=$_FILES['fotoperfil'];
        $mensaje=actualizarUsu($idusuario,$nombrecompleto,$fechanac,$sexo,$pais,$email,$password,$_FILES['fotoperfil']['name']);
        $mensaje2= subir_Imagen($_FILES['fotoperfil']['name'],$_FILES['fotoperfil']['tmp_name'],$_FILES['fotoperfil']['type'],$_FILES['fotoperfil']['size'],'fotoperfiles');            
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
        <div class='contect'>
          <?php
           formActuUsu($email); 
           echo "<span> $mensaje</span>";	
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