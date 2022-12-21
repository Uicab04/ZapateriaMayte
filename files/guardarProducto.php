<?php
include("../clases/conexion.php");

$nombreProducto = $_POST["nombreProducto"];
$precioProducto = $_POST["precio"];
$imagenProducto = '';
$descripcion = '';


$db = new Conexion();

$db->beginTransaction();

$sql = $db->prepare("INSERT INTO productos (nombre_producto, precio, imagen, descripcion)
	VALUES (:nombreProducto, :precioProducto, :imagenProducto, :descripcion)");

$sql->bindParam(':nombreProducto', $nombreProducto, PDO::PARAM_STR);
$sql->bindParam(':precioProducto', $precioProducto, PDO::PARAM_INT);
$sql->bindParam(':imagenProducto', $imagenProducto, PDO::PARAM_STR);
$sql->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);



$sql->execute();

if($sql){
    echo "Los datos se guardaron correctamente";
    $db->commit();
}
else{
    echo "Ocurrio un error";
    $db->rollbak();
}
?>
