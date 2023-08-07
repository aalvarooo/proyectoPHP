<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/styles2.css">

    <!-- Bootstrap CSS -->

</head>

<body class="">

    <!-- Inicio del menu -->
    <!-- 
    1. Al hacer Click al botón hay que hacer una petición para recibir con PHP para el cierre de sesion
    -->

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><i class="fa-brands fa-suse"></i></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="datos-personales.php">Datos personales</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="listado-top10.php">Más premiados</a>
                    </li>
                    <?php
                    if ($_SESSION["logedin"] === true) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/index.php?logout=true" tabindex="-1" aria-disabled="true">cerrar sesión</a>
                        </li>
                    <?php } ?>
                </ul>
                <form class="d-flex">
                    <?php

                    if ($_SESSION["logedin"] === true) :
                        $userData = $_SESSION["user_data"];
                    ?>


                        <div class=" pt-3 flex-column  text-center me-3">
                            <a href="../datos-personales.php">
                                <svg class="mb-2 me-4 fs-3" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                    <path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z" />
                                </svg>
                            </a>
                            <p class="text-info text-uppercase text-center me-4 fs-5"><?= $userData["nombre"] ?></p>
                        </div>

                    <?php endif; ?>
                </form>
            </div>
        </div>
    </nav>