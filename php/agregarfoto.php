<?php
include("funciones.php");
session_start();
$mensaje="";		
    $idusuario=$_SESSION['idusuario'];
    $foto=$_SESSION['fotop'];
    $email=$_SESSION['userlogin'];
	$nombusuario = $_SESSION['username'];	
	
if(isset($_POST['btnFoto'])){
		$titulo=$_POST['titAlbum'];
		$tipo=$_POST['tipocmb'];
		$fecha=$_POST['fechatomada'];
		$pais=$_POST['pais'];
		$fotoperfil=$_FILES['fotosubir'];
		$idalbum=$_FILES['albumcmb'];
        $mensaje= crear_Foto($titulo,$titulo,$descripcion)	;
	}
?>


<!DOCTYPE html>
<html lang='es'>
	<head>
	   <meta charset='utf-8'>
	    <title>AgregarAlbum</title>
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
				<h1 class='titulo'>Gestor de Fotos e Imagenes</h1>
			</header>
			
			<div class='content'>
			 <?php 
					echo"
					  <div class='formulario'>
					   <h1 class='titform'>Subir Foto</h1>
					   <hr>
					    <form method='post' action='agregarfoto.php' enctype='multipart/form-data'>
						
						<div class='row'>
						    <div class='col-25'>
							  <label>Titulo de la foto</label>
							</div>
							<div class='col-75'>
							 <input type='text' name='titAlbum'
								    autocomplete='off' required>
							</div>
						  </div>
						  
						  <div class='row'>
						  <div class='col-25'>
							<label>Tipo</label>
						  </div>
						  <div class='col-75'>
						  <select name='tipocmb'>
						  <option value='0'>Seleccionar Tipo</option>
						  <option value='PUBLICO'>PUBLICO</option>
						  <option value='COMPARTIDO'>COMPARTIDO</option>
						  <option value='PRIVADO'>PRIVADO</option>
						  </div>
						</div>
						  
						  <div class='row'>
						    <div class='col-25'>
							  <label>Fecha tomada</label>
							</div>
							<div class='col-75'>
							 <input type='date' name='fechatomada'
								    autocomplete='off' required>
							</div>
						  </div>

                          <div class='row'>
						    <div class='col-25'>
							  <label>Pais</label>
							</div>
							<div class='col-75'>
							 <input type='text' name='pais'
								    autocomplete='off' maxlength='5' required>
							</div>
						  </div>

						  <div class='row'>
						    <div class='col-25'>
							  <label>Foto a subir</label>
							</div>
							<div class='col-75'>
							 <input type='file' name='fotosubir' accept='image/*'
								    autocomplete='off' >
							</div>
						  </div>

						  <select name='albumcmb'>
						  <option value='0'>Seleccionar Album</option>";
						  ver_Album($idusuario);
						  echo " </select>
						   <div class='row'>
						   <input type='submit' name='btnFoto' value='Registrar'>
						  </div>
						  
						</form>
					  </div>
					   <span>".$mensaje."</span>
					";
			 ?>
            </select>
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