<?php

include_once './model/conexion.php';


class Cita
{

  var $id;
  var $nombre;
  var $tema;
  var $fecha;

  function __construct()
  {
    $this->id = '';
    $this->nombre = '';
    $this->tema = '';
    $this->fecha = '';
  }


  //Create -----------------------------------------------

  public function create()
  {

    $db = new Database();

    $correcto = false;

    $sql = 'INSERT INTO citas(nombre, tema, fecha) VALUES(:nombre,:tema,:fecha)';
    $respuesta = $db->mysql->prepare($sql);

    $respuesta->execute([
      ':nombre' => $this->nombre,
      ':tema' => $this->tema,
      ':fecha' => $this->fecha,
    ]);

    if ($respuesta) {
      $correcto = true;
    }

    if ($correcto === TRUE) {
      header('Location: ./index.php?mensaje=registrado');
    } else {
      header('Location: ./index.php?mensaje=error');
      exit();
    }
  }

  //Read --------------------------------------------------
  public static function all()
  {

    $db = new Database();

    $sentencia = $db->mysql->query("select * FROM citas ORDER BY citas.fecha ASC");
    $sentencia->execute();
    $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);

    return $resultado;
  }

  //Update -----------------------------------------------
  public static function update()
  {

    if (!isset($_GET['id'])) {
      header('Location: index.php?mensaje=error');
      exit();
    }

    $db = new Database();

    $id = $_GET['id'];

    $sentencia = $db->mysql->prepare("select * FROM citas where id = ?;");
    $sentencia->execute([$id]);
    $cita = $sentencia->fetch(PDO::FETCH_OBJ);
    //print_r($citas);
    return $cita;
  }

  public function saveUpdate()
  {
    $db = new Database();

    $sentencia = $db->mysql->prepare("UPDATE citas SET nombre = ?, tema = ?, fecha = ? where id = ?;");
    $resultado = $sentencia->execute([$this->nombre, $this->tema, $this->fecha, $this->id]);

    if ($resultado === TRUE) {
      header('Location: ./index.php?mensaje=editado');
    } else {
      header('Location: ./index.php?mensaje=error');
      exit();
    }
  }

  //Delete -----------------------------------------------
  public static function delete()
  {

    $db = new Database();

    $id = $_GET['id'];

    $sentencia = $db->mysql->prepare("DELETE FROM citas where id = ?;");
    $cita = $sentencia->execute([$id]);

    if ($cita === TRUE) {
      header('Location: ./index.php?mensaje=eliminado');
    } else {
      header('Location: ./index.php?mensaje=error');
    }
  }
}
