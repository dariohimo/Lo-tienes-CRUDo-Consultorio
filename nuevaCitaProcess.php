<?php

include_once './controler/cita.php';

$nombre = $_POST['nombre'];
$tema = $_POST['tema'];
$fecha = $_POST['fecha'];

$Cita = new Cita();
$Cita->nombre = $nombre;
$Cita->tema = $tema;
$Cita->fecha = $fecha;
$Cita->create();

?>

