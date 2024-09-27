<?php
include_once './controler/cita.php';
$cita = Cita::update();
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="shortcut icon" href="./img/php.jpg" type="image/ico" />
  <title>Editar Cita</title>
</head>

<body class="py-3 bg-dark d-flex justify-content-center align-items-center" style="min-height: 100vh;">
  <main class="container bg-light rounded-3 my-3">
    <div class="row">
      <div class="col">
        <h1>Edición de Cita</h1>
      </div>
    </div>
    <div class="row py-3">
      <div class="col">
        <form class="row g-3" action="./updateProcess.php" method="POST" autocomplete="off">
          <div class="colmd-4">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" required autofocus value="<?php echo $cita->nombre; ?>">
          </div>
          <div class="colmd-4">
            <label for="tema" class="form-label">Tema</label>
            <input type="text" name="tema" id="tema" class="form-control" required autofocus value="<?php echo $cita->tema; ?>">
          </div>

          <div class="colmd-4">
            <label for="fecha" class="form-label">Fecha Actual</label>
            <p>
              <?php echo $cita->fecha; ?>
            </p>
          </div>

          <div class="colmd-4">
            <label for="fecha" class="form-label">Nueva Fecha</label>
            <input type="datetime-local" name="fecha" id="fecha" class="form-control" required autofocus value="<?php echo $cita->tema; ?>">
          </div>

          <input type="hidden" name="id" id="id" value="<?php echo $cita->id; ?>">

          <div class="col-md-12">
            <a class="btn btn-secondary" href="index.php">Atrás</a>
            <button class="btn btn-primary" type="submit">Guardar</button>
          </div>
        </form>

      </div>
    </div>
  </main>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>