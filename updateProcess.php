<?php

include_once './controler/cita.php';

$db = new Database();

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$tema = $_POST['tema'];
$fecha = $_POST['fecha'];

$Cita = new Cita();
$Cita->id = $id;
$Cita->nombre = $nombre;
$Cita->tema = $tema;
$Cita->fecha = $fecha;
$Cita->saveUpdate();