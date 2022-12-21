<?php
$idUsuario = $_POST["idUsuario"];

include("../clases/Usuario.php");

$usuario = new Usuario($idUsuario);
?>

<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
        <img class="img-profile rounded-circle"
			src="images/OIP.jpg"  
			width="200" height="200" href="menu.php">
            <div class="col-lg-7">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Editando Usuario</h1>
                    </div>
                    <form class="user" name="registroUsuario">
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" class="form-control form-control-user" id="nombre" name="nombre" placeholder="Nombre" value="<?php echo $usuario->nombre; ?>">
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control form-control-user" id="apellidos" name="apellidos" placeholder="Apellidos" value="<?php echo $usuario->apellidos; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control form-control-user" id="email" name="email" placeholder="Correo electrónico" value="<?php echo $usuario->email; ?>">
                        </div>
                        <!-- <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="password" class="form-control form-control-user" id="password1" id="password1" placeholder="Contraseña">
                            </div>
                            <div class="col-sm-6">
                                <input type="password" class="form-control form-control-user" id="password2" id="password2" placeholder="Repetir contraseña">
                            </div>
                        </div> -->
                        <input type="button" value="Actualizar Información" onclick="guardarEdicionUsuario(<?php echo $idUsuario; ?>)" class="btn btn-primary btn-user btn-block">
                        <hr>
                    </form>
                    <div id="registrando"></div>
                    <hr>
                    <!-- <div class="text-center">
                        <a class="small" href="forgot-password.html">¿Olvidaste tu contraseña?</a>
                    </div> -->
                    <!-- <div class="text-center">
                        <a class="small" href="login.html">¿Ya tienes una cuenta? Inicia sesión!</a>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</div>