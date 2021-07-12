
<?php
include_once '../bd/conexionbajas.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$inventario = (isset($_POST['inventario'])) ? $_POST['inventario'] : '';
$descrip = (isset($_POST['descrip'])) ? $_POST['descrip'] : '';
$causa = (isset($_POST['causa'])) ? $_POST['causa'] : '';
$justificacion = (isset($_POST['justificacion'])) ? $_POST['justificacion'] : '';


$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$id = (isset($_POST['id'])) ? $_POST['id'] : '';


switch($opcion){
    case 1:
        $consulta = "INSERT INTO bajax (inventario, descrip, causa, justificacion) VALUES('$inventario', '$descrip', '$causa', '$justificacion') ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 
        
        $consulta = "SELECT * FROM bajax ORDER BY id DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);       
        break;    
    case 2:        
        $consulta = "UPDATE bajax SET inventario='$inventario', descrip='$descrip', causa='$causa', justificacion='$justificacion' WHERE id='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT * FROM bajax WHERE id='$id' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 3:        
        $consulta = "DELETE FROM bajax WHERE id='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                           
        break;
    case 4:    
        $consulta = "SELECT * FROM bajax";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
}

print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
$conexion=null;