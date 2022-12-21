<?php
//include("clases/Conexion.php");
$db = new Conexion();

$nombre_sesion = "inventario";
$regreso = "login.html";

if(isset($_COOKIE["cDash"])){

    $hashUser = $_COOKIE["cDash"];

    $sql = $db->prepare("SELECT * 
                        FROM dash_usuarios 
                        WHERE hashUser = :hashUser LIMIT 1");

    $sql->bindParam(':hashUser', $hashUser, PDO::PARAM_STR);

    $sql->execute();

    if(!$sql){
        setcookie("err", "1", time() + (60),"/");
        session_destroy();
        Header ("Location: ".$regreso);
        exit;
    }
    else{
        if ($sql->rowCount() > 0){
            
            $usuario_datos = $sql->fetch();
            unset($sql);

            if($hashUser != $usuario_datos["hashUser"]){
                setcookie("err", "2", time() + (60),"/");
                Header ("Location: ".$regreso);
                exit;
            }

            unset($hashUser);
            if(isset($_COOKIE["cDashExpiration"])){
                $expirationTime = $_COOKIE["cDashExpiration"];
            }
            else{
                $expirationTime = 0;
            }
            setcookie("cDash", $usuario_datos['hashUser'], $expirationTime,"/");
            
            $_SESSION['usuario_id'] = $usuario_datos['id'];
            $_SESSION['usuario_login'] = $usuario_datos['email'];
            $_SESSION['usuario_password'] = $usuario_datos['password'];
            $_SESSION['checar'] = "bienvenido...";
            $_SESSION['expire'] = time()+(7200);
        }
        else{
            setcookie("err", "3", time() + (60),"/");
            session_destroy();
            setcookie("cDash", "system", time()-100,"/");
            Header ("Location: ".$regreso);
            exit;
        }
    }
}
// else if (isset($_POST['email']) && isset($_POST['password'])){

//     if($_POST['email'] == '' || $_POST['password'] == ''){
//         setcookie("err", "4", time() + (60),"/");
//         Header ("Location: ".$regreso);
//         exit;
//     }
    
//     $usuario = $_POST['email'];
//     $password = hash("sha256", $_POST["password"]);
//     $recordarme = $_POST['recordarme'];

//     $sql = $db->prepare("SELECT * 
//                         FROM dash_usuarios 
//                         WHERE email = :user
//                         AND password = :password LIMIT 1");

//     $sql->bindParam(':email', $usuario, PDO::PARAM_STR);
//     $sql->bindParam(':password', $password, PDO::PARAM_STR);

//     $sql->execute();

//     if(!$sql){
//         setcookie("err", "5", time() + (60),"/");
//         Header ("Location: ".$regreso);
//         exit;
//     }
//     else{
//         if ($sql->rowCount() > 0){

//             $usuario_datos = $sql->fetch();
//             unset($sql);

//             if($usuario != $usuario_datos["email"]){
//                 setcookie("err", "6", time() + (60),"/");
//                 Header ("Location: ".$regreso);
//                 exit;
//             }
//             if($password != $usuario_datos["password"]){
//                 setcookie("err", "7", time() + (60),"/");
//                 Header ("Location: ".$regreso);
//                 exit;
//             } 

//             if($recordarme == 1){
//                 setcookie("cDash", $usuario_datos['hashUser'], time() + (86400 * 365),"/");
//             }

//             unset($usuario);
//             unset ($password);
//             unset ($recordarme);

//             session_name($nombre_sesion);
//             session_cache_limiter('private_no_expire');
//             session_start();
            
//             $_SESSION['usuario_id'] = $usuario_datos['id'];
//             $_SESSION['usuario_login'] = $usuario_datos['email'];
//             $_SESSION['usuario_password'] = $usuario_datos['password'];
//             $_SESSION['checar'] = "bienvenido...";
//             $_SESSION['expire'] = time()+(7200);

//             $pag = $_SERVER['PHP_SELF'];
//             Header ("Location: $pag?");
//             exit;
//         }
//         else{
//             setcookie("err", "8", time() + (60),"/");
//             Header ("Location: ".$regreso);
//             exit;
//         }
//     }

    
// }
else{
    session_name($nombre_sesion);
    session_start();
    if (!isset($_SESSION['usuario_login']) && !isset($_SESSION['usuario_password'])){
        setcookie("err", "9", time() + (60),"/");
        session_destroy();
        Header ("Location: ".$regreso);
        exit();
    }
}
?>