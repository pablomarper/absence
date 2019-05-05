<?php
require('../lib/conexion.php');
require('../clases/falta.php');

    $alu = $_POST['alu'];
    $asignatura = $_POST['asignatura'];
    $incidencia = $_POST['incidencia'];
    $hoyHora = $_POST['ahoraH'];
    $hoyDia = $_POST['ahoraD'];

    $newFalta = new Falta();
    $newFalta->set($alu, $asignatura, $incidencia, $hoyDia, $hoyHora);
        
?>