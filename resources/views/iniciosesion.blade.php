<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
.custom-popup {
    position: fixed;
    top: 20px; /* Ajusta el desplazamiento desde la parte superior según sea necesario */
    right: 20px; /* Ajusta el desplazamiento desde la derecha según sea necesario */
    transform: none; /* Elimina la transformación de centrado */
    background-color: #d4edda; /* Fondo verde claro */
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
    padding: 20px;
    border-radius: 10px;
    z-index: 9999;
}

.custom-popup-content {
    text-align: center;
}

.custom-popup-icon {
    color: #28a745; /* Color verde */
    font-size: 48px;
}

.custom-popup-message {
    margin-top: 10px;
    color: #1e7e34; /* Color verde más oscuro */
}
</style>
</head>
<body>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                <div class="container py-5 h-100">
      <div class="row d-flex align-items-center justify-content-center h-100">
        <div class="col-md-4 col-lg-3 col-xl-3">
          <img src="images/logo.png"
            class="img-fluid" alt="ajph" width="400" height="400">
        </div>
      <h1 class="lines-affect"><b> <CENTER> Instituto Nacional Agrario </CENTER></b> </h1>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}" id="frmlogin">
                            @csrf
                            <!-- Mostrar errores de validación -->
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <!-- Entrada de usuario -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="NOM_USUARIO"><b>Usuario</b></label>
                                <input id="NOM_USUARIO" type="text" class="form-control" name="NOM_USUARIO" value="{{ old('NOM_USUARIO') }}" required oninput="validateInput(this)" placeholder="Ingresar Usuario" onpaste="return borrarPegado(event)"maxlength="15" minlength="4"/>
                            </div>

                            <!-- Entrada de contraseña -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="CONTRASENA"><b>Contraseña</b></label>
                                <div class="input-group">
                                    <input id="CONTRASENA" type="password" class="form-control" name="CONTRASENA" required placeholder="Ingresar Contraseña" maxlength="12" minlength="8" oninput="removeSpaces(this)" onpaste="return borrarPegado(event)"/>
                                    <div class="input-group-append">
                                        <button type="button" id="togglePassword" class="btn btn-outline-secondary">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </div>
                                <!-- Mensaje de ayuda para la contraseña -->
                                <div id="passwordHelpBlock" class="form-text">Tu contraseña debe tener entre 8 y 20 caracteres, contener letras y números, y no debe contener espacios, caracteres especiales ni emoji.</div>
                            </div>

                            <!-- Botones de inicio de sesión y recuperación de contraseña -->
                            <div class="d-flex justify-content-around align-items-center mb-4">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">INICIAR SESION</button>
                                    <a href="" class="btn btn-link">¿Olvidaste tu contraseña?</a>
                                    <br>
                                     <br>
                                    <center><a button type="submit" class="btn btn-warning" href="{{url('/')}}">Ir al Home</a></center>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts al final del cuerpo -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill@8.2.0/dist/polyfill.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Script para el botón de alternar contraseña -->
    <script>
        $(document).ready(function () {
            $('#togglePassword').click(function () {
                var passwordInput = $('#CONTRASENA');
                var icon = $(this).find('i');

                if (passwordInput.attr('type') === 'password') {
                    passwordInput.attr('type', 'text');
                    icon.removeClass('fa-eye');
                    icon.addClass('fa-eye-slash');
                    $(this).removeClass('btn-outline-secondary'); // Quita la clase de borde para cambiar el color del botón
                    $(this).addClass('btn-primary'); // Agrega la clase de color primario de Bootstrap al botón
                } else {
                    passwordInput.attr('type', 'password');
                    icon.removeClass('fa-eye-slash');
                    icon.addClass('fa-eye');
                    $(this).removeClass('btn-primary'); // Quita la clase de color primario del botón
                    $(this).addClass('btn-outline-secondary'); // Agrega la clase de borde al botón
                }
            });
        });
    </script>

<script>
    $(document).ready(function () {
        var successMessage = "{{ session('success') }}";

        if (successMessage) {
            Swal.fire({
                position: 'center', // Cambiado a la esquina superior derecha
                icon: 'success',
                title: successMessage,
                showConfirmButton: false,
                timer: 2000 // 3 segundos
            });
        }
    });
</script>
<script>
function validateInput(input) {
    // Convertir a mayúsculas
    input.value = input.value.toUpperCase();

    // Eliminar caracteres que no sean letras o espacios
    input.value = input.value.replace(/[^A-Z\s]/g, '');
    // Eliminar espacios duplicados
    input.value = input.value.replace(/\s{2,}/g, ' ');
    // Reducir letras repetidas a un máximo de 3
    input.value = input.value.replace(/([A-Z])\1{3,}/g, '$1$1');
    }
</script>

@if(session('verificado'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Cuenta verificada',
            text: 'Se verificó su cuenta. Por favor, vuelva a iniciar sesión.',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK'
        }).then((result) => {
            if (result.isConfirmed) {
                // Redirigir a la página de inicio de sesión
                window.location.href = "{{ route('login') }}";
            }
        });
    </script>
@endif

<script>
    // Obtener el elemento de entrada
    var input = document.getElementById('NOM_USUARIO');

    // Agregar un listener para el evento de entrada
    input.addEventListener('input', function() {
        // Obtener el valor actual del campo de texto
        var value = this.value;

        value = value.replace(/\s/g, '');

        // Convertir todo el texto a mayúsculas
        value = value.toUpperCase();

        // Eliminar números y caracteres especiales utilizando una expresión regular
        value = value.replace(/[^A-Z]/g, '');

        // Actualizar el valor del campo de texto con el texto modificado
        this.value = value;
    });
</script>

<script>
    function removeSpaces(input) {
        // Obtener el valor actual del campo de contraseña
        var password = input.value;

        // Eliminar cualquier espacio en blanco utilizando una expresión regular
        password = password.replace(/\s/g, '');

        // Actualizar el valor del campo de contraseña con el texto modificado
        input.value = password;
    }
</script>
<script>
    //para que no pueda copiar ni pegar
    function borrarPegado(event) {
      event.preventDefault();
      document.execCommand("insertText", false, "");
    }
  </script>

</body>
</html>

