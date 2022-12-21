<?php
include("../clases/Conexion.php");

$db = new Conexion();

$nombre = htmlentities($_POST['nombre'],ENT_NOQUOTES,"UTF-8");
$apellidos = htmlentities($_POST['apellidos'],ENT_NOQUOTES,"UTF-8");
$email = $_POST['email'];
$idUsuario = $_POST['idUsuario'];

//indicar que se usaran transacciones
$db->beginTransaction();

//preparar la consulta
$sql = $db->prepare("UPDATE dash_usuarios SET nombre = :nombre, apellidos = :apellidos, email = :email WHERE id = :idUsuario LIMIT 1");
$sql->bindParam(':nombre', $nombre, PDO::PARAM_STR);
$sql->bindParam(':apellidos', $apellidos, PDO::PARAM_STR);
$sql->bindParam(':email', $email, PDO::PARAM_STR);
$sql->bindParam(':idUsuario', $idUsuario, PDO::PARAM_INT);

$sql->execute();
    
if($sql){
    $db->commit();
    $jsondata = array("success" => true, 
                    "mensaje" => "Actualización correcta");
}
else{
    $db->rollBack();
    $jsondata = array("success" => false, 
                    "mensaje" => "Ocurrió un error al intentar guardar los datos");
}

header('Content-type: application/json; charset=utf-8');
echo json_encode($jsondata);
exit();
?>