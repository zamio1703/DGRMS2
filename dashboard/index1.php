<?php
require __DIR__.'/vendor/autoload.php';
// Indicamos la clase pdf
use Spipu\Html2Pdf\Html2Pdf;

if(isset($_POST['crear'])){
	// Capturar lo que va a devulver el siguiente include
	ob_start();
	//Recoger contenido de fichero
	require_once 'print_view.php';
	$html = ob_get_clean();
	// Generamos PDF, entre comillas pasar parametros (tipo de papel, tamaño, idioma, codificacion)
	$html2Pdf = new Html2Pdf('P', 'A4','es', 'true','UTF-8');
	//Pintamos lo que queremos que se impriman
	// $html2Pdf->writeHtml('<h1>Hola mundo desde HTML</h1>
	// 	<h2>Más Información</h2>');

	$html2Pdf->writeHtml($html);
	//Nombre del pdf
	$html2Pdf->output('NombrePdf.pdf');
	
}
?>


<?php
session_start();

if($_SESSION["s_usuario"] === null){
    header("Location: ../index.php");
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="#" />  
    <!-- <meta name="viewport" content="width=device-width, user-sacalable=no" /> -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Vales </title>
    <link rel="stylesheet" type="text/css" href="css/bienMueble.css" />
    <!-- Insetar un icono -->
    <link rel="icon" type="image/x-icon" href="img/logoTec.png">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../estilos.css">
        <link rel="stylesheet" href="../plugins/sweetalert2/sweetalert2.min.css"> 
    <!-- Fuente ROBOTO bajada de google font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <!-- Fuente MULISH google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
      <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
 
      
    <!--datables CSS básico-->
    <link rel="stylesheet" type="text/css" href="datatables/datatables.min.css"/>
    <!--datables estilo bootstrap 4 CSS-->  
    <link rel="stylesheet"  type="text/css" href="datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
           
    <!--font awesome con CDN-->  
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">  
      
  </head>

  <body> 
     <!-- ### INCIO CABECERA #### -->
    <header id="header">
        <div id="logo1">
            <img src="img/logoTec.png" alt="logo logoTec" />
            <h1>Administración de Recursos Materiales y Servicios</h1>
        </div>

        <div id="logo2">
            <img src="img/logoTecNM.png" alt="logo logoTecNM" />
        </div>
        <div class="clearfix"></div>
    </header>
    <!-- ### FIN CABECERA ### -->

     <!-- ### INICIO MENU ### -->
     <nav id="nav">
        <div class="topnav" id="myTopnav">
        <a href="index.php" >
                USUARIO:  <?php echo $_SESSION["s_usuario"];?></span>
                <img class="img-profile rounded-circle" src="img/user.png"> 
              </a>
              <a href="bienes.php">BIENES MUEBLES</a>
            <a href="vales.php">VALES DE RESGUARDO</a>
            <a href="cabm.php">CAMB</a>
            <a href="bajas.php">BAJAS</a>
            <a href="../bd/logout.php">CERRAR SESIÓN</a>
            
            <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
          </div>

          <div class="clearfix"></div>
    </nav>
    <!-- ### FIN MENU ### -->
    <br>
    <div id="contenido">
        <h1>IMPRIMIR VALE DE RESGUARDO</h1>
    </div>

    <div class="container">
            <div class="row" align= "center">
                <div class="col-lg-12">
                    <div class="jumbotron">


	<form action="" method="POST">
		<p>ID:
		<input type="text" placeholder="Ejem: 01..." name="titulo" /></p>
		<!-- <input type="submit" value="Enviar datos" name="crear" /> -->
		<div id="linea"></div>
		<P>Fecha: <input type="date" name="fecha" /></P>
		<P>Nombre de personal: <input type="text" placeholder="Ejem: Luis..." name="nombre" /></P>
		
		<P>CURP: <input type="text" placeholder="Ejem: DSDFGDGR469..." name="curp" /></P>
		
		<P>Departamento: <input type="text" placeholder="Ejem: Sistemas..." name="departamento" /></P>
		
		<P>Puesto: <input type="text" placeholder="Ejem: Encargado de..." name="puesto" /></P>
		
		<P>Descripcion: <input type="text" placeholder="Ejem: Solicita un..." name="descripcion" /></P>
		
		<P>Numero de serie: <input type="text" placeholder="Ejem: 12345..." name="noserie" /></P>
		
		<P>Numero de inventario: <input type="text" placeholder="Ejem: 17..." name="noinventario" /></P>
		
		<p></p>
		<input type="submit" class="btn btn-danger" value="GENERAR PDF" name="crear" target="_blank"/>
	</form>

  </div>
                </div>
            </div>
        </div>



	<footer id="footer">
      <p>&copy; Tecnologico Nacional de Mexico Campus Pachuca</p>
    </footer>
    <!-- ### FIN FOOTER ### -->