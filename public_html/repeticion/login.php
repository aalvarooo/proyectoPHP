<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">

</head>
<body>
    <div class="container-fluid mt-3">
        <ul class="nav justify-content-center">
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#">Disabled</a>
            </li>
        </ul>
    </div>
    <div>
    <div class="container">
        <h2 class="text-center text-primary"> Bienvenido</h2>
        <p class="text-secondary"> Este es el mejor portal del mundo te lo aseguro</p>
        </div>
    </div>
    <?php
  
  if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["nombre"]) && !empty($_POST["apellidos"]) && !empty($_POST["telefono"]) && !empty($_POST["email"]) && !empty($_FILES["imagen"]) ) {

        echo "llego hasta quí";
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
                                <input type="text" class="form-control fs-5" name="nombre" value="">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Apellidos</label>
                                <input type="text" class="form-control" name="apellidos" value="">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" value="">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Teléfono</label>
                                <input type="text" class="form-control" name="telefono" value="">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Imagen</label>
                                <input type="file" class="form-control" name="imagen" >
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