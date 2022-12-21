<?php
include("../clases/Funciones.php");


$funciones = new Funciones();

$usuarios = $funciones->obtenerUsuariosNormales();
$numUsuarios = $usuarios->rowCount();
?>
<div class="row">
    <?php foreach($usuarios as $usu): ?>
    <div class="card shadow mb-4 mx-2">
        
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <img class="img-profile rounded-circle"
			src="images/OIP.jpg"  
			width="50" height="50" href="menu.php">
            <h6 class="m-0 font-weight-bold text-primary"><?php echo $usu["nombre"]." ".$usu["apellidos"]; ?></h6>
            <div class="dropdown-item">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                    <div class="dropdown-header">Opci;</div>
                    <a class="dropdown-item" href="javascript:eliminandoUsuario(<?php echo $usu["id"]; ?>)">Eliminar Usuario</a>
                </div>
            </div>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            Fecha de registro: <?php echo $usu["fechaRegistro"];?>
        </div>
    </div>
    <?php endforeach; ?>
</div>