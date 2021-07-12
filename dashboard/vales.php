
<?php
session_start();

if($_SESSION["s_usuario"] === null){
    header("Location: ../index.php");
}

?>
<?php
include_once 'bd/conexionvales.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consulta = "SELECT * FROM valex";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$valex=$resultado->fetchAll(PDO::FETCH_ASSOC);
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
    <div id="contenido">
    <body>

    <br>
  <div align="center"><h1>VALES DE RESGUARDO</h1></div>
  <br>
       <!-- ### INICIO CONTENIDO ### -->

    <div class="container mt-4 shadow-lg p-3 mb-5 bg-body rounded">

   

<div class="container" align= "left">
    <div class="row">
        <div class="col-lg-12">            
        <button id="btnNuevo" type="button" class="btn btn-warning" data-toggle="modal"><i class="material-icons">library_add</i><strong>AÑADIR VALE </strong></button>                
        <button id="btnImprimir" class='btn btn-warning '><i class='material-icons'>print</i><a href="index1.php"><strong> IMPRIMIR VALE</strong></a></button>
        </div>   
    </div>    
</div>    
<br> 
<!-- tablaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa -->
    <div class="container caja">
        <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">        
                        <table id="examplevales" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0%" width="100%">  <!-- table table-striped -->
                        <thead>
                      <tr class="text-center">
                    <th> ID </th>
                    <th> FECHA </th>
                    <th> PERSONAL </th>
                    <th> CURP </th>
                    <th> DEPARTAMENTO </th>
                    <th> PUESTO </th>
                    <th> DESCRIPCION </th>
                    <th> NO. SERIE </th>
                    <th> NO. INVENTARIO</th>
                    <th> ACCIONES</th>
                    </thead>
        
                    <tbody>
                    <?php
                        foreach($valex as $valesp){
                    ?>
                    <tr class="text-center">
    <td> <?php echo $valesp['id'] ?> </td>
    <td> <?php echo $valesp['fecha'] ?> </td>
    <td> <?php echo $valesp['personal'] ?> </td>
    <td> <?php echo $valesp['curp'] ?> </td>
    <td> <?php echo $valesp['departamento'] ?> </td>
    <td> <?php echo $valesp['puesto'] ?> </td>
    <td> <?php echo $valesp['descripcion'] ?> </td>
    <td> <?php echo $valesp['serie'] ?> </td>
    <td> <?php echo $valesp['inventario'] ?> </td>
   <!--  <td> 

   <button id="btnEditar" class='btn btn-primary btn-sm btnEditar' ><i class='material-icons'>edit</i></button>
   <button id="btnBorrar" class='btn btn-danger btn-sm btnBorrar'><i class='material-icons'>delete</i></button>
   <button id="btnImprimir" class='btn btn-success btn-sm btnImprimir'><i class='material-icons'>print</i></button>
   </td> -->
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
        <form id="formVales">    
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">Fecha</label>
                    <input type="date" class="form-control" id="fecha">
                    </div>
                    </div>
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">Personal</label>
                    <input type="text" class="form-control" id="personal">
                    </div> 
                    </div>    
                </div>
                <div class="row"> 
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">CURP</label>
                    <input type="text" class="form-control" id="curp">
                    </div>               
                    </div>
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">Departamento</label>
                    <input type="text" class="form-control" id="departamento">
                    </div>
                    </div>  
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                        <label for="" class="col-form-label">Puesto</label>
                        <input type="text" class="form-control" id="puesto">
                        </div>
                    </div>    
                    <div class="col-lg-6">    
                        <div class="form-group">
                        <label for="" class="col-form-label">Descripción</label>
                        <input type="text" class="form-control" id="descripcion">
                        </div>            
                    </div>    
                </div>      

                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                        <label for="" class="col-form-label">No. Serie</label>
                        <input type="text" class="form-control" id="serie">
                        </div>
                    </div>    
                    <div class="col-lg-6">    
                        <div class="form-group">
                        <label for="" class="col-form-label">No. Inventario</label>
                        <input type="text" class="form-control" id="inventario">
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
     
    <!-- código JS propio-->    
    <script type="text/javascript" src="main5.js"></script>  
    
    
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
