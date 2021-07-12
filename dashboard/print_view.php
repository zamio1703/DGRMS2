<!DOCTYPE html>
<html>
<head lang="es">
	<meta charset="utf-8" />
	<title>Vale PDF</title>

	<style type="text/css">
		#titulo{
			color: black;
			text-align: center;
		}
		h3{
			color: #013ca6;
			font-size: 30px;
		}
		h2{
			color: #013ca6;
			font-size: 18px;
		}
		h1{
			/*padding: 0px;
			border: 0px;*/
			font-size: 15px;
		}
		span{
			font-size: 15px;
			color: black;
		}
		img{
			width: 200px; height: 100px;
		}
		#imprimir{
			border: 1px solid #b3b3cc;
			background-color: #f0f0f5;
			padding-top: 20px;
			padding-right: 30px;
			padding-bottom: 30px;
			padding-left: 80px;
		}
		#imprime{
			color: red;
			font-size: 18px;
		}
		p{
			font-size: 14px;
			text-align: center;
		}
	</style>
</head>
<body>
	<div id="logo1">
        <img src="img/logoTecNM.png" alt="logo logoTec" />
    </div>
	<h3 id="titulo">VALE BIEN MUEBLE</h3>
	<!-- <?php var_dump($_POST); ?> -->
	<!-- <?php if (isset($_POST['titulo'])): ?> 	
		<h1><?=$_POST['titulo']?></h1>
	<?php endif; ?> -->
	<div id="imprimir">
		<?php if (isset($_POST['titulo'])): ?> 
		<h2 id="Imprime" >ID: <?=$_POST['titulo']?></h2>	
		<!-- <h1 id="Imprime"><?=$_POST['titulo']?></h1> -->
		<h2>Fecha: <span><?=$_POST['fecha']?></span></h2>
		<!-- <h1><?=$_POST['fecha']?></h1> -->
		<h2>Nombre del personal: <span><?=$_POST['nombre']?></span></h2>
		<!-- <h1><?=$_POST['nombre']?></h1> -->
		<h2>CURP: <span><?=$_POST['curp']?></span></h2>
		<!-- <h1><?=$_POST['curp']?></h1> -->
		<h2>Departamento: <span><?=$_POST['departamento']?></span></h2>
		<!-- <h1><?=$_POST['departamento']?></h1> -->
		<h2>Puesto: <span><?=$_POST['puesto']?></span></h2>
		<!-- <h1><?=$_POST['puesto']?></h1> -->
		<h2>Descripcion: <span><?=$_POST['descripcion']?></span></h2>
		<h2>No. Serie: <span><?=$_POST['noserie']?></span></h2>
		<!-- <h1><?=$_POST['noserie']?></h1> -->
		<h2>No. Inventario: <span><?=$_POST['noinventario']?></span></h2>
		<!-- <h1><?=$_POST['noinventario']?></h1> -->

		<p>FIRMA Y SELLO BIEN MUEBLE RECIBIDO:</p>
		<p></p>
		<p>_________________________________</p>
	<?php endif; ?>
	</div>
	
	 
	<!-- <h2>Más Información</h2>
	<table border="1">
		<tr>
			<td>Bienes muebles</td>
			<td>Vales</td>
		</tr>
		<tr>
			<td>Informatico</td>
			<td>No informatico</td>
		</tr>
	</table> -->

</body>
</html>