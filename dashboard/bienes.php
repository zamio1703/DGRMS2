
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">


  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!--datables CSS básico-->
    <link rel="stylesheet" type="text/css" href="vendor/datatables/datatables.min.css"/>
    <!--datables estilo bootstrap 4 CSS-->  
    <link rel="stylesheet"  type="text/css" href="vendor/datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">  
    <!-- <meta name="viewport" content="width=device-width, user-sacalable=no" /> -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Bienes muebles</title>

    <link rel="stylesheet" type="text/css" href="css/bienMueble.css" />
    <!-- Insetar un icono -->
    <link rel="icon" type="image/x-icon" href="img/logoTec.png">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../estilos.css">
        <link rel="stylesheet" href="../plugins/sweetalert2/sweetalert2.min.css"> 
    
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Fuente ROBOTO bajada de google font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <!-- Fuente MULISH google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
  </head>


  </head>
<body>
    <!-- ### INCIO CABECERA #### -->
    <header id="header">
        <div id="logo1">
            <img src="img/logoTec.png" alt="logo logoTec" />
            <h1>Administración de Recursos Materiales y Servicios</h1>
        </div>
        <!-- <div id="titulo">
            <h1>Servicios de bienes muebles</h1>
        </div> -->
        <div id="logo2">
            <img src="img/logoTecNM.png" alt="logo logoTecNM" />
        </div>
        <div class="clearfix"></div>
    </header>
    <!-- ### FIN CABECERA ### -->
    
    <!-- ### INICIO MENU ### -->
    <nav id="nav">
      <div class="topnav" id="myTopnav">
<!-- <a href="index.php" class="active">HOME</a> -->
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
    <!-- ### INICIO CONTENIDO ### -->
    <body>

    <div id="contenido">
      <br>
    <div><h1>RESGUARDO BIEN MUEBLE</h1></div>
    <br>
    
    <h3>Seleccione una opción para agregar:</h3>
          <br />
          <br />
          <br />
          
            <button class="button1"> 
              <a href="info.php"> BIEN INFORMÁTICO  </a> 
            </button>
            <button class="button1"> 
              <a href="noinfo.php"> BIEN NO INFORMÁTICO  </a>
            </button>
  
            </div>


</tbody>

</table>

  </body>
  </div>
    <!-- ### FIN CONTENIDO ### -->
    <!-- ### INICIO FOOTER ### -->
    <footer id="footer">
      <p>&copy; Tecnólogico Nacional de México Campus Pachuca </p>
    </footer>
    <!-- ### FIN FOOTER ### -->
    
    <script>
        function myFunction() {
          var x = document.getElementById("myTopnav");
          if (x.className === "topnav") {
            x.className += " responsive";
          } else {
            x.className = "topnav";
          }
        }
        </script>
</body>
</html>