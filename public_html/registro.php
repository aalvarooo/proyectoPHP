   <?php include "modelo/registro.php"?>
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
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control <?=isset($_POST["email"]) && empty($_POST["email"]) ? 'is-invalid' : '' ?>" name="email" value="<?php echo !empty($_POST["email"])? $_POST["email"]:''?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Teléfono</label>
                        <input type="text" class="form-control <?=isset($_POST["telefono"]) && empty($_POST["telefono"]) ? 'is-invalid' : '' ?>" name="telefono" value="<?php echo !empty($_POST["telefono"])? $_POST["telefono"]:''?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Contraseña</label>
                        <input type="text" class="form-control <?=isset($_POST["contrasena"]) && empty($_POST["contrasena"]) ? 'is-invalid' : '' ?>" name="contrasena" value="<?php echo !empty($_POST["contrasena"]) ? $_POST["contrasena"]:''?>">
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary  me-3 mb-3">Regístrate</button>
                            <br>
                            

                    </div>
                </form>
            </div>

        </div>
    </div>

       
</body>
</html>