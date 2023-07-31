<?php
include("./bd.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <header></header>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-4">
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="card-header">
                        </div>
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="mb-3">
                                    <label for="usuario" class="form-label">Usuario</label>
                                    <input type="text" class="form-control" name="usuario" id="usuario" aria-describedby="">
                                    <small class="form-text text-muted">Help text</small>
                                </div>
                                <div class="mb-3">
                                    <label for="contrasenia" class="form-label">Contraseña</label>
                                    <input type="password" class="form-control" name="contrasenia" id="contrasenia" aria-describedby="">
                                 </div>
                                 <a name="" id="" class="btn btn-primary" href="index.php" role="">Entrar</a>
                            </form>
                        </div>
                        <div class="card-footer text-muted">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>