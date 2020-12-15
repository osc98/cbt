<?php
session_start();
include('funciones.php');
$mensaje="";
$opc=0;
if(isset($_SESSION['userlogin'])){
	$nomb=$_SESSION['username'];
	$tip=$_SESSION['usertype'];
	
	if(isset($_POST['btnBuscar'])){
		$curp=$_POST['curp'];
		$opc=1;
	}
	if(isset($_POST['btnActualiza'])){
		$curp=$_POST['curp'];
		$pass=$_POST['pass'];
		$nombre=$_POST['nombre'];
		$paterno=$_POST['paterno'];
		$materno=$_POST['materno'];
		$tipo=$_POST['tipo'];
		if ($tipo=='PERSONAL'){
			$puesto=$_POST['puesto'];
			$depto=$_POST['depto'];
			$mensaje=actualizaPer($curp,$pass,$nombre,$paterno,$materno,$tipo,$puesto,$depto);
		}
		$opc=1;

}
}
?>
<!DOCTYPE HTML>
<html lang='es'>
<head>
    <meta charset='utf-8'>
    <title>Biblioteca Virtual</title>
    <link rel='stylesheet' href='../css/basico.css'>
	<link rel='stylesheet' href='../css/formulario.css'>
</head>
<body>
    <header id='main-header'>
         <div id='header-left'>
             <img class='logo' src='../imagen/coyotes.png'>
             <br>
             Biblioteca CBTis198
         </div>
         <div id='header-center'>
             <nav>
			 <?php
			 
			  menu($tip);
			 ?>
             </nav>
</div>
<div id='header-right'>
<a class='boton_sesion' href='logout.php'>
Cerrar sesion
</a>
<br></br>
<div style='float-right'>
    <?php echo $nomb."<br>".$tip; ?>
</div>
</div>
</header>
<section id='main-content'>
<article>
<header>
     <h1 class='titulo'>Biblioteca Coyote Virtual</h1>
</header>
     <div class='contect'>
          <?php
		       if ($opc==0)
			   buscarUsu("Actualizar");
			       if ($opc==1){
					   formActuUsu($curp);
					   echo "<span>$mensaje</span>";
				   }
		   ?>

</div>
</article>
</section>
<footer id='main-footer'>
<p>
Centro de Bachillerato Tecnologico Industrial Y de servicios no.198
<br>
Seizo Furuya s/n Cd. Industria. Celaya, Guanajuato
<br>
Siguenos por:<br>
<a href=''><img src='../imagen/facebook.png'></a>
<a href=''><img src='../imagen/twitter.png'></a>
</p>
</footer>
</body>
</html>