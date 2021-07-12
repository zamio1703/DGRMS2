<!doctype html>
<html>
    <head>
        <link rel="shortcut icon" href="#" />
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Login DGRMYS</title>

        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="estilos.css">
        <link rel="stylesheet" type="text/css" href="css/bienMueble.css" />
        <link rel="stylesheet" href="plugins/sweetalert2/sweetalert2.min.css">        
        
        <link rel="stylesheet" type="text/css" href="fuentes/iconic/css/material-design-iconic-font.min.css">
        
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
      <div class="container-login">
        <div class="wrap-login">
            <form class="login-form validate-form" id="formLogin" action="" method="post">
                <span class="login-form-title">INICIAR SESIÓN</span>
                
                <div class="wrap-input100" data-validate = "Usuario incorrecto">
                    <input class="input100" type="text" id="usuario" name="usuario" placeholder="Usuario">
                    <span class="focus-efecto"></span>
                </div>
                
                <div class="wrap-input100" data-validate="Password incorrecto">
                    <input class="input100" type="password" id="password" name="password" placeholder="Contraseña">
                    <span class="focus-efecto"></span>
                </div>
                
                <div class="container-login-form-btn">
                    <div class="wrap-login-form-btn">
                        <div class="login-form-bgbtn"></div>
                        <button type="submit" name="submit" class="login-form-btn">ENTRAR</button>
                    </div>
                </div>
            </form>
        </div>
    </div>     
         <!-- ### INICIO FOOTER ### -->
         <footer id="footer">
      <p>&copy; Tecnólogico Nacional de México Campus Pachuca </p>
    </footer>
    <!-- ### FIN FOOTER ### -->       
        
     <script src="jquery/jquery-3.3.1.min.js"></script>    
     <script src="bootstrap/js/bootstrap.min.js"></script>    
     <script src="popper/popper.min.js"></script>    
        
     <script src="plugins/sweetalert2/sweetalert2.all.min.js"></script>    
     <script src="codigo.js"></script>    
    </body>
</html>