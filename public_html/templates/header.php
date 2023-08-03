<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/styles.css">

    <!-- Bootstrap CSS -->

</head>

<body class="bg-secondary">

    <!-- Inicio del menu -->

    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container-fluid">
            <!-- icono o nombre -->

            <a class="navbar-brand" href="#">
                <i class="bi bi-flower1"></i>
                <span class="text-warning">Intelio</span>
            </a>

            <!-- boton del menu -->

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- elementos del menu colapsable -->

            <div class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Precios</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Servicios
                        </a>

                        <ul class="dropdown-menu bg-secondary" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Renta</a></li>
                            <li><a class="dropdown-item" href="#">Equipos</a>
                            <li>
                            <li><a class="dropdown-item" href="#">Networking</a></li>
                        </ul>
                    </li>
                </ul>

                <hr class="d-md-none text-white-50">

                <!-- enlaces redes sociales -->

                <ul class="navbar-nav  flex-row flex-wrap text-light">

                    <li class="nav-item col-6 col-md-auto p-3">
                        <i class="fa-brands fa-twitter"></i>
                        <small class="d-md-none ms-2">Twitter</small>
                    </li>

                    <li class="nav-item col-6 col-md-auto p-3">
                        <i class="fa-brands fa-facebook"></i>
                        <small class="d-md-none ms-2">GitHub</small>
                    </li>

                    <li class="nav-item col-6 col-md-auto p-3">
                        <i class="fa-brands fa-whatsapp"></i>
                        <small class="d-md-none ms-2">WhatsApp</small>
                    </li>

                    <li class="nav-item col-6 col-md-auto p-3">
                        <i class="fa-brands fa-facebook"></i>
                        <small class="d-md-none ms-2">Facebook</small>
                    </li>

                </ul>

                <!--boton Informacion -->

                <?php if ($_SESSION["logedin"] === true): ?>

                    <form class="d-flex">
                        <i class="fa-solid fa-user"></i>
                        <button class="btn btn-outline-warning d-none d-md-inline-block " type="submit">Informacion</button>
                    </form>
                <?php endif; ?>
            </div>

        </div>
    </nav>
