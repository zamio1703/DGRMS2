
<?php
include_once '../bd/conexionvales.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$fecha = (isset($_POST['fecha'])) ? $_POST['fecha'] : '';
$personal = (isset($_POST['personal'])) ? $_POST['personal'] : '';
$curp = (isset($_POST['curp'])) ? $_POST['curp'] : '';
$departamento = (isset($_POST['departamento'])) ? $_POST['departamento'] : '';
$puesto = (isset($_POST['puesto'])) ? $_POST['puesto'] : '';
$descripcion = (isset($_POST['descripcion'])) ? $_POST['descripcion'] : '';
$serie = (isset($_POST['serie'])) ? $_POST['serie'] : '';
$inventario = (isset($_POST['inventario'])) ? $_POST['inventario'] : '';


$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$id = (isset($_POST['id'])) ? $_POST['id'] : '';


switch($opcion){
    case 1:
        $consulta = "INSERT INTO valex (fecha, personal, curp, departamento, puesto, descripcion, serie, inventario) VALUES('$fecha', '$personal', '$curp', '$departamento', '$puesto', '$descripcion', '$serie', '$inventario') ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 
        
        $consulta = "SELECT * FROM valex ORDER BY id DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);       
        break;    
    case 2:        
        $consulta = "UPDATE valex SET fecha='$fecha', personal='$personal', curp='$curp', departamento='$departamento', puesto='$puesto', descripcion='$descripcion', serie='$serie', inventario='$inventario' WHERE id='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT * FROM valex WHERE id='$id' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 3:        
        $consulta = "DELETE FROM valex WHERE id='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                           
        break;
    case 4:    
        $consulta = "SELECT * FROM valex";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
}

print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
$conexion=null;