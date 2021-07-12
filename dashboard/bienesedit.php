
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
      <a href="index.php" class="active">HOME</a>
      <a class="nav-link dropdown-toggle" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
       aria-expanded="false"> USUARIO:  <?php echo $_SESSION["s_usuario"];?></span>
                <img class="img-profile rounded-circle" src="img/user.png"> 
              </a>
            <a href="bienes.php">BIENES MUEBLES</a>
            <a href="vales.php">VALES DE RESGUARDO</a>
            <a href="cabm.php">CAMB</a>

          <a href="../bd/logout.php">CERRAR SESIÓN</a>

            <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
          </div>

          <div class="clearfix"></div>
    </nav>

    <body>


</tbody>

</table>

  </body>
  </div>
    
  
</body>
</html>