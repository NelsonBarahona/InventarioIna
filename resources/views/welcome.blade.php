<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Dosis:400,500|Poppins:400,700&display=swap" rel="stylesheet">
    <link href="css/Estilos.css" rel="stylesheet" />
    <link href="css/DiseñoWeb.css" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap JavaScript (y Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
</head>
<style>
        

        

        .navbar {
            display: flex;
            align-items: center;
            width: 100%;
            justify-content: space-between;
        }

        .navbar img {
            max-width: 100px; /* Ajusta el tamaño máximo del logo */
            height: auto; /* Mantiene la proporción del logo */
        }
        body {
    background: url('images/hero1.jpg') no-repeat center center fixed;
    background-size: cover;
    height: 100vh;
    margin: 0;
    display: flex;
    justify-content: center;
    align-items: center;
}
.slider_img-box {
    width: 100%;
    max-width: 400px;  /* Tamaño máximo */
    text-align: center;  /* Centra la imagen */
}

.slider_img-box img {
    width: 100%;
    height: auto;
    object-fit: contain;
}


    </style>
<body>
<section class="slider_section position-relative">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="slider_detail-box">
                                <h1 class="text-warning fw-bold">Instituto Nacional Agrario</h1>
                                <h2 style="color: #A2D9CE;" class="fs-4">Departamento de Informática</h2>

                                <p>
                                    <font color="white">
                                        Inventario de equipos de computo contabilizados en la Institucion.
                                    </font>
                                </p>
                                    <div class="btn-box">
                                        <a href="/login" class="btn btn-primary">
                                            Ir al Login 
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 offset-md-1">
    <div class="slider_img-box">
        <img src="images/logo.png" alt="Logo">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<!-- Bootstrap JavaScript Libraries -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>

<script>
    document.getElementById("openModalLink").addEventListener("click", function(event) {
        event.preventDefault(); // Evita que el enlace redireccione a otra página
        $('#registerModal').modal('show'); // Abre el modal con el id 'registerModal'
    });
</script>


    </html>
