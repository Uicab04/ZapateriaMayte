<?php
include("../clases/Conexion.php");

$db = new Conexion();

$idUsuario = $_POST["idUsuario"];

//indicar que se usaran transacciones
$db->beginTransaction();

$sql = $db->query("DELETE FROM dash_usuarios WHERE id = ".$idUsuario." LIMIT 1");

if($sql){
    $db->commit();
    $jsondata = array("success" => true, 
                        "mensaje" => "Usuario eliminado correctamente");
}
else{
    $db->rollBack();
    $jsondata = array("success" => false, 
                        "mensaje" => "Ocurrió un error al intentar eliminar al usuario");
}

header('Content-type: application/json; charset=utf-8');
echo json_encode($jsondata);
exit();
?>