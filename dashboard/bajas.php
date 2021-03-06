
<?php
session_start();

if($_SESSION["s_usuario"] === null){
    header("Location: ../index.php");
}

?>
<?php
include_once 'bd/conexionbajas.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consulta = "SELECT * FROM bajax";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$info=$resultado->fetchAll(PDO::FETCH_ASSOC);
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
    <title>Bajas de bienes</title>
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
 
      
    <!--datables CSS b??sico-->
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
            <h1>Administraci??n de Recursos Materiales y Servicios</h1>
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
            <a href="../bd/logout.php">CERRAR SESI??N</a>
              
            <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
          </div>

          <div class="clearfix"></div>
    </nav>
    <!-- ### FIN MENU ### -->
    <!-- ### INICIO CONTENIDO ### -->
    <div id="contenido">
    <body>

    <br>
  <div align="center"><h1>BAJAS DE BIENES MUEBLES</h1></div>
  <br>
       <!-- ### INICIO CONTENIDO ### -->

    <div class="container mt-4 shadow-lg p-3 mb-5 bg-body rounded">

   

<div class="container" align= "left">
    <div class="row">
        <div class="col-lg-12">            
        <button id="btnNuevo" type="button" class="btn btn-warning" data-toggle="modal"><i class="material-icons">library_add</i><strong> A??ADIR BAJA</strong></button>                
        </div>   
    </div>    
</div>    
<br> 
<!-- tablaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa -->
    <div class="container">
        <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">        
                        <table id="examplebja" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                      <tr class="text-center">
                    <th> ID </th>
                    <th> NO. INVENTARIO</th>
                    <th> DESCRIPCI??N</th>
                    <th> CAUSA </th>
                    <th> JUSTIFICACI??N </th>
                    <th> ACCIONES</th>
                    </thead>
        
                    <tbody>
                    <?php
                        foreach($info as $infor){  /* foreach($info as $infor){ */
                    ?>
                    <tr class="text-center">
    <td> <?php echo $infor['id'] ?> </td>
    <td> <?php echo $infor['inventario'] ?> </td>
    <td> <?php echo $infor['descrip'] ?> </td>
    <td> <?php echo $infor['causa'] ?> </td>
    <td> <?php echo $infor['justificacion'] ?> </td>
   <td> 

   <button id="btnEditar" class='btn btn-primary btn-sm btnEditar' ><i class='material-icons'>edit</i></button>
   <button id="btnBorrar" class='btn btn-danger btn-sm btnBorrar'><i class='material-icons'>delete</i></button>
   </td>
   </tr>
                    <?php
                        }
                    ?>
                </tbody>                 
                </table>
            </div>
        </div>
    </div>
  </div>
</div>
    <!-- fin tablaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa -->

    <!--Modal para CRUD-->
<div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
        <form id="formBajas">    
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">INVENTARIO</label>
                    <input type="text" class="form-control" id="inventario">
                    </div>
                    </div>
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">DESCRIPCI??N</label>
                    <input type="text" class="form-control" id="descrip">
                    </div> 
                    </div>    
                </div>
                <div class="row"> 
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">CAUSA</label>
                    <input type="text" class="form-control" id="causa">
                    </div>               
                    </div>
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">JUSTIFICACI??N</label>
                    <input type="text" class="form-control" id="justificacion">
                    </div>
                    </div>  
                </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>
            </div>
        </form>    
        </div>
    </div>
</div>  
</div> 


     
    <!-- jQuery, Popper.js, Bootstrap JS -->
    <script src="jquery/jquery-3.3.1.min.js"></script>
    <script src="popper/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
      
    <!-- datatables JS -->
    <script type="text/javascript" src="datatables/datatables.min.js"></script>    
     
    <!-- para usar botones en datatables JS -->  
    <script src="datatables/Buttons-1.5.6/js/dataTables.buttons.min.js"></script>  
    <script src="datatables/JSZip-2.5.0/jszip.min.js"></script>    
    <script src="datatables/pdfmake-0.1.36/pdfmake.min.js"></script>    
    <script src="datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
    <script src="datatables/Buttons-1.5.6/js/buttons.html5.min.js"></script>
     
    <!-- c??digo JS propio-->     
    <script type="text/javascript" src="main6.js"></script>
    
        <!-- ### INICIO FOOTER ### -->
        <footer id="footer">
      <p>&copy; Tecn??logico Nacional de M??xico Campus Pachuca </p>
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
