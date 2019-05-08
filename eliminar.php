<?php
require('lib/conexion.php');
require('clases/alumno.php');
require('clases/profesor.php');

    $tipo = $_POST['tipo'];
    $dni = $_POST['user'];

    if ($tipo == 1) {
        $profe = new Profesor();

        $profe->delete($dni);
    } else {
        $alu = new Alumno();

        $alu->delete($dni);
    }
    
?>