<?php
include_once '../bd/conexionnoinfo.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$cabm = (isset($_POST['cabm'])) ? $_POST['cabm'] : '';
$color = (isset($_POST['color'])) ? $_POST['color'] : '';
$material = (isset($_POST['material'])) ? $_POST['material'] : '';
$medidas = (isset($_POST['medidas'])) ? $_POST['medidas'] : '';
$modelo = (isset($_POST['modelo'])) ? $_POST['modelo'] : '';
$serie = (isset($_POST['serie'])) ? $_POST['serie'] : '';
$inventario = (isset($_POST['inventario'])) ? $_POST['inventario'] : '';
$obs = (isset($_POST['obs'])) ? $_POST['obs'] : '';


$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$id = (isset($_POST['id'])) ? $_POST['id'] : '';


switch($opcion){
    case 1:
        $consulta = "INSERT INTO noinfo (cabm, color, material, medidas, modelo, serie, inventario, obs) VALUES('$cabm', '$color', '$material', '$medidas', '$modelo', '$serie', '$inventario', '$obs') ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 
        
        $consulta = "SELECT * FROM noinfo ORDER BY id DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);       
        break;    
    case 2:        
        $consulta = "UPDATE noinfo SET cabm='$cabm', color='$color', material='$material', medidas='$medidas', modelo='$modelo', serie='$serie', inventario='$inventario', obs='$obs' WHERE id='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT * FROM noinfo WHERE id='$id' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 3:        
        $consulta = "DELETE FROM noinfo WHERE id='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                           
        break;
    case 4:    
        $consulta = "SELECT * FROM noinfo";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
}

print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
$conexion=null;