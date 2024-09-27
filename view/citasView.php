<?php
include_once './controler/cita.php';
$resultado = Cita::all();
//var_dump ($resultado);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap CSS v5.0.2 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- cdn icnonos-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <link rel="shortcut icon" href="./img/php.jpg" type="image/ico" />
  <title>Citas</title>
</head>

<body class="py-3 bg-dark d-flex justify-content-center align-items-center" style="min-height: 100vh;">

  <main class="container bg-light rounded-3 my-3">

    <div class="row">
      <div class="col">
        <h1 class="my-3">Calendario de citas CTO</h1>
        <div class="d-flex flex-row">

          <a href="nuevaCita.php" class="btn btn-primary float-rigth fs-3"> Nueva Cita</a>

          <!-------------- inicio alerta ------------------->
          <div class="m-0 mx-2">
            <?php
            if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta') {
            ?>
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> Rellena todos los campos.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            <?php
            }
            ?>


            <?php
            if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado') {
            ?>
              <div class="alert alert-success alert-dismissible fade show m-0" role="alert">
                <strong>Registrado!</strong> Se agrego la cita.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            <?php
            }
            ?>



            <?php
            if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'error') {
            ?>
              <div class="alert alert-danger alert-dismissible fade show m-0" role="alert">
                <strong>Error!</strong> Vuelve a intentar.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            <?php
            }
            ?>



            <?php
            if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado') {
            ?>
              <div class="alert alert-success alert-dismissible fade show m-0" role="alert">
                <strong>Editado!</strong> La cita fue actualizada.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            <?php
            }
            ?>


            <?php
            if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado') {
            ?>
              <div class="alert alert-warning alert-dismissible fade show m-0" role="alert">
                <strong>Eliminado!</strong> La cita fue borrada.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            <?php
            }
            ?>
          </div>

          <!------------------- fin alerta ------------------>

        </div>

      </div>
    </div>
    <div class="row py-3">
      <div class="col">
        <table class="table table-dark table-hover m-0">
          <thead>
            <tr>
              <!--<th class="text-center">ID</th>-->
              <th class="text-center">Fecha</th>
              <th class="text-center">Nombre</th>
              <th class="text-center">Tema</th>
              <th class="text-center">Opciones</th>

            </tr>
          </thead>
          <tbody>
            <?php foreach ($resultado as $fila) { ?>
              <tr>
                <!------<td class="text-center"><?php echo $fila['id'] ?></td> ------>
                <td class="text-center"><?php echo $fila['fecha'] ?></td>
                <td class="text-center"><?php echo $fila['nombre'] ?></td>
                <td class="text-center"><?php echo $fila['tema'] ?></td>
                <td>
                  <div class="d-flex justify-content-around align-items-center">
                    <a href="./editar.php?id=<?php echo $fila['id'] ?>" class="text-success"><i class="bi bi-pencil-square"></i></a> <a href="./eliminarCitaProcess.php?id=<?php echo $fila['id'] ?>" class="text-danger" onclick="return confirm('Estas seguro de eliminar?');"><i class="bi bi-trash"></i></a>
                  </div>
                </td>

              </tr>
            <?php  } ?>
          </tbody>
        </table>
      </div>
    </div>

  </main>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>