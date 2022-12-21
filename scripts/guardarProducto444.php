<php?
$nombrrProducto = $_POST["nombreProducto"]
$precioProduco = $_POST["precioProducto"]
$descripcionProducto =_POST["descripcionProducto"]

$db = new  Conexion();

$db->beginTransaction();

$sql = $db->query("INSER INTO control_exbimbo (nombre pruducto, imagen, precio,descripcion)
VALUES (:nombrrProducto, :imagenProducto, :precioProduco)")";

$sql->binParam(':nombreProducto', $nombreProducto, PDO::PARAM_STR);
$sql->binParam(':precioProducto', $precioProducto, PDO::PARAM_INT);
$sql->binParam(':descripcionProducto', $descripcionProducto, PDO::PARAM_STR);
$sql->binParam(':imagenProducto', $imagenProducto, PDO::PARAM_STR);

$sql->execute();

if($sql){
    echo "Los datos se guardaron correctamente";
    $db->comit();
}
else{
    echo "Ocurrio un error"
    $db->rolbak();
}

?>