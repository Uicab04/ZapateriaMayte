const validarRegistroUsuario = () => {
    let nombre = document.getElementById('nombre').value;
    let apellidos = document.getElementById('apellidos').value;
    let email = document.getElementById('email').value;
    let password1 = document.getElementById('password1').value;
    let password2 = document.getElementById('password2').value;

    if (nombre.length == 0) {
        alertify.error('Escriba el nombre del usuario');
        return false;
    }
    if (apellidos.length == 0) {
        alertify.error('Escriba los apellidos del usuario');
        return false;
    }
    if (email.length == 0) {
        alertify.error("Escriba el email del usuario");
        return false;
    }
    if (!validarEmail(email)) {
        alertify.error("Escriba un correo electronico válido");
        return false;
    }

    if (password1.length == 0) {
        alertify.error("Escriba la contraseña del usuario");
        return false;
    }
    if (password2.length == 0) {
        alertify.error("Repita la contraseña del usuario");
        return false;
    }

    if (password1 != password2) {
        alertify.error("Las contraseñas no coinciden");
        return false;
    }

    let send = {
        nombre,
        apellidos,
        email,
        password1
    }
    let url = "files/registroUsuario.php";
    let mensaje = "Los datos se guardaron correctamente";
    let ejecutar = "verInicio()";

    ajaxPostControl(url, "registrando", send, mensaje, ejecutar);
}

const verInicio = () => {
    location.href = 'login.html';
}

function verIndex() {
    location.href = 'index.php';
}

const iniciarSesion = () => {
    let email = document.getElementById('email').value;
    let password = document.getElementById('password').value;
    let recordarme = 0;

    if (email.length == 0) {
        alertify.error("Escriba el email");
        return false;
    }
    if (password.length == 0) {
        alertify.error("Escriba la contraseña");
        return false;
    }
    if (document.getElementById('recordarmeCheck').checked == true) {
        recordarme = 1;
    }

    let send = {
        email,
        password,
        recordarme
    }
    let url = "files/validarInicio.php";
    let mensaje = "";
    let ejecutar = "verIndex()";

    console.table(send);

    ajaxPostControl(url, "iniciando", send, mensaje, ejecutar);
}

//const validarEmail = email

const validarEmail = valor => {
    if (/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(valor)) {
        return true;
    } else {
        return false;
    }
}

const editarUsuario = (idUsuario) => {

    let url = "files/editarUsuario.php";
    let send = {
        idUsuario
    }
    let mensaje = '';
    let ejecutar = '';

    ajaxPostControl(url, "informacion", send, mensaje, ejecutar);
}

const guardarEdicionUsuario = (idUsuario) => {
    let nombre = document.getElementById('nombre').value;
    let apellidos = document.getElementById('apellidos').value;
    let email = document.getElementById('email').value;

    if (nombre.length == 0) {
        alertify.error('Escriba el nombre del usuario');
        return false;
    }
    if (apellidos.length == 0) {
        alertify.error('Escriba los apellidos del usuario');
        return false;
    }
    if (email.length == 0) {
        alertify.error("Escriba el email del usuario");
        return false;
    }
    if (!validarEmail(email)) {
        alertify.error("Escriba un correo electronico válido");
        return false;
    }

    let url = "files/actualizandoUsuario.php";
    let send = {
        nombre,
        apellidos,
        email,
        idUsuario
    }
    let mensaje = '';
    let ejecutar = '';

    ajaxPostControl(url, "registrando", send, mensaje, ejecutar);
}

const verUsuario = () => {
    let url = "files/verUsuarios.php";
    let send = {

    }
    let mensaje = '';
    let ejecutar = '';

    ajaxPostControl(url, "informacion", send, mensaje, ejecutar);
}

const eliminandoUsuario = idUsuario => {

    alertify.confirm("¿Está seguro de eliminar el usuario?", function(e) {
        if (e) {
            let url = "files/eliminandoUsuario.php";
            let send = {
                idUsuario
            }
            let mensaje = '';
            let ejecutar = 'verUsuarios()';

            ajaxPostControl(url, "informacion", send, mensaje, ejecutar);
        }
    });

}

function validarFormularioProducto() {

    //1
    let nombreProducto = document.getElementById("nombreProducto").value;
   
    //nombre producto es del campo a ver
    if (nombreProducto.length == 0) {
        alert("escriba el nombre del producto");
        return false;
    } 
    //2
    let precio = document.getElementById("precio").value;
    //nombre producto es del campo a ver
    if (precio.length == 0) {
        alert("escriba el precio del producto");
        return false;
    }

     //3
     let descripcion_producto = document.getElementById("descripcion_producto").value;
     //nombre producto es del campo a ver
     if (descripcion_producto.length == 0) {
         alert("escriba descripcion del producto");
         return false;
     }

  //metodo ajax
  let url = "files/guardarProducto.php";
  let mensaje = "";
  let send = {
      nombreProducto,
      precio,
      
  }
  ajaxPostControl(url, "registrado", send, mensaje);
  
}

//valida a informacion 