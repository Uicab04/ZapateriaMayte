<?php
include("../clases/Conexion.php");

$db = new Conexion();

$usuario = $_POST["email"];
$password = $_POST["password"];
$password = hash("sha256", $password);
$recordarme = $_POST["recordarme"];

// $jsondata = array();

$db->beginTransaction();

$sql = $db->prepare("SELECT hashUser 
                        FROM dash_usuarios 
                        WHERE email = :email AND password = :password LIMIT 1");

$sql->bindParam(':email', $usuario, PDO::PARAM_STR);
$sql->bindParam(':password', $password, PDO::PARAM_STR);

$sql->execute();

if($sql){
    if ($sql->rowCount() > 0){
        $usuario_datos = $sql->fetch();

        if($recordarme == 1){
            setcookie("cDash", $usuario_datos['hashUser'], time() + (86400 * 365),"/");
            setcookie("cDashExpiration", time() + (86400 * 365), time() + (86400 * 365),"/");

        }
        else{
            setcookie("cDash", $usuario_datos['hashUser'], 0,"/");
            setcookie("cDashExpiration", 0, 0,"/");
        }
        $jsondata['success'] = true;
    }
    else{
        $db->rollBack();
        $jsondata = array("success" => false, 
                            "mensaje" => "El correo electrónico o contraseña son incorrectos");
    }
}
else{
    $db->rollBack();
    $jsondata['success'] = false;
}

header('Content-type: application/json; charset=utf-8');
echo json_encode($jsondata);
exit();
?>