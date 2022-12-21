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
    // email
    if (email.length == 0) {
        alertify.error("Escriba el email del usuario");
        return false;
    }

    let validacionEmail = validarEmail(email);

    if(validacionEmail == false){
        alertify.error("Formato incorrecto");
        return false;
      
    }
    alert("Mensaje de prueba");

    // if (password1.length == 0) {
    //     alertify.error("Escriba la contraseña del usuario");
    //     return false;
    // }
    // if (password2.length == 0) {
    //     alertify.error("Repita la contraseña del usuario");
    //     return false;
    // }

    // if (password1 != password2) {
    //     alertify.error("Las contraseñas no coinciden");
    //     return false;
    // }

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
// email
const validarEmail = valor => {
    if (/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(valor)) {
        return true;
    } else {
        return false;
    }
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