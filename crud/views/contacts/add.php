<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url("assets/css/bootstrap.css"); ?>" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">

    <style>
    body {
        font-family: "Montserrat" !important;
    }
    </style>
    
    <title>Nuevo usuario a crear</title>
  </head>
  <body>

    <div class="container">
        <h1 class="mt-5">Crea tu nuevo usuario</h1>
        <form action="<?= base_url(); ?>new-users/save" class="mt-4" method="post">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nombre completo</label>
                        <input type="text" name="full_name" class="form-control <?= form_error('full_name') ? 'is-invalid':'' ; ?>" placeholder="Nombre completo" value="<?= set_value('full_name'); ?>">
                        <div class="invalid-feedback">
                            <?= form_error('full_name'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="text" name="email" class="form-control <?= form_error('email') ? 'is-invalid':'' ; ?>" aria-describedby="emailHelp" placeholder="Correo eléctronico" value="<?= set_value('email'); ?>">
                        <div class="invalid-feedback">
                            <?= form_error('email'); ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Contraseña</label>
                        <input type="password" name="password" class="form-control <?= form_error('password') ? 'is-invalid':'' ; ?>"placeholder="Contraseña" value="<?= set_value('password'); ?>">
                        <div class="invalid-feedback">
                            <?= form_error('password'); ?>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </form>
    </div>

    <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
  </body>
</html>
