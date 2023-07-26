<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Jane doe">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="página web con PHP y BOOTSTRAP">
    <title>Álvaro mateos | Desarrollo web Backend</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">BELLAGAMES</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"> 
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Catálogo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Sobre nosotros</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <?php
    $rellenar= "Por favor, completa todos los campos para poder registrarte.";
    //declaracion de variables no es recomendable porque si las declaro no tienen valor asignado, lo que significa que siempre pasarán la condicion de '!empty' y se le asignará null
    var_dump($_FILES);
    $imagen_subida = null;
    if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["nombre"]) && !empty($_POST["apellidos"]) && !empty($_POST["email"]) && !empty($_POST["telefono"]) && !empty($_FILES["imagen"]) && $_FILES["imagen"]["error"]===0) {
            
        $imagen_nombre = $_FILES["imagen"]["name"];
        $imagen_tipo = $_FILES["imagen"]["type"];
    
        // Definir los formatos de imagen permitidos
        $formatos_permitidos = array("image/jpeg", "image/png", "image/svg+xml");
    
        if (in_array($imagen_tipo, $formatos_permitidos)) {
            if(!is_dir("uploads")){
                mkdir("uploads", 0777);
            }
            
            $imagen_ruta_a_subir = "uploads/{$imagen_nombre}";
            
            if (move_uploaded_file($_FILES["imagen"]['tmp_name'], $imagen_ruta_a_subir)) {
                $imagen_subida = $imagen_ruta_a_subir;
            } else {
                print_r(error_get_last());
            }
        } else {
            // Si el formato o tamaño no es válido, muestra un mensaje de error
            echo "Error: Solo se permiten imágenes en formato JPG, PNG o SVG.";
        }
        ?>
        
        <div class="container-md mt-5">
            <ul class="list-group">
                <li class="list-group-item">Graciass <?=($_POST["nombre"]&& $_POST["apellidos"])?></p>
                <li class="list-group-item">tu email es <?=($_POST["email"])?></p>
                <li class="list-group-item">Has sido registrado con el número  <?=($_POST["telefono"])?></p>
                <?php if ($imagen_subida): ?> 
                    <li class="list-group-item">has subido la siguiente imagen</p>
                    <img src="<?=$imagen_subida?>" class="card-img-top" style="width: 100%;max-width:400px">
                <?php endif; ?> 

            </ul>
            
            <a type="button" class="btn btn-primary mt-3" href="/login.php">volver</a>
            
        </div>
    <?php
    } else { 
    ?>
        <div class="container mt-5">
            <h1 class="text-center text-primary">BELLAGAMES</h1>
            <p class="text-center text-secondary lead">Descubre el emocionante mundo del cine en nuestra página web. Aquí encontrarás los últimos estrenos y un amplio catálogo de películas para que disfrutes de la mejor experiencia cinematográfica.</p>
        </div>
        <div class="container-md border bg-light mt-5">
            <div class="row mt-5">
                <div class="d-flex flex-column justify-content-center col-12 col-md-5 ps-3">
                    <h3 class="display-7" >Regístrate en la mejor página del mundo sobre cine</h2>
                    <p class="pt-3 ">Descubre un mundo de emociones en el cine mientras la última película estrenada por el físico J. Robert Oppenheimer trabaja con un equipo de científicos durante el Proyecto Manhattan, que condujo al desarrollo de la bomba atómica.</p>
                </div>
                <div class="col-12 col-md-7 ">
                    <form action="" method="POST" class="me-5" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="form-label">Nombre</label>
                            <input type="text" class="form-control fs-5 <?= isset($_POST["nombre"]) && empty($_POST["nombre"]) ? 'is-invalid' : '' ?>" name="nombre" value="<?php echo !empty($_POST["nombre"]) ? $_POST["nombre"] : '' ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Apellidos</label>
                            <input type="text" class="form-control <?=isset($_POST["apellidos"]) && empty($_POST["apellidos"]) ? 'is-invalid' : '' ?>" name="apellidos" value="<?php echo !empty($_POST["apellidos"]) ? $_POST["apellidos"]:''?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control <?=isset($_POST["email"]) && empty($_POST["email"]) ? 'is-invalid' : '' ?>" name="email" value="<?php echo !empty($_POST["email"])? $_POST["email"]:''?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Teléfono</label>
                            <input type="text" class="form-control <?=isset($_POST["telefono"]) && empty($_POST["telefono"]) ? 'is-invalid' : '' ?>" name="telefono" value="<?php echo !empty($_POST["telefono"])? $_POST["telefono"]:''?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Imagen</label>
                            <input type="file" class="form-control <?=isset($_FILES["imagen"]) && empty($_FILES["imagen"]) ? 'is-invalid' : '' ?>" name="imagen" >
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary  me-3 mb-3">Regístrate</button>
                                <br>
                                <?php 
                            if($_SERVER["REQUEST_METHOD"] == "POST"){
                            ?>
                                <p class="text-secondary mt-3 alert alert-danger mb-3"><?= $rellenar ?></p>
                            <?php
                            }
                                ?>

                        </div>
                    </form>
                </div>

            </div>
        </div>
    <?php
    }
    ?>
       
</body>
</html>