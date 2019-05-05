<?php
require('../lib/conexion.php');
require('../clases/profesor.php');

    $dni = $_POST['user'];
    $nom = $_POST['nom'];
    $apellido1 = $_POST['apellido1'];
    $apellido2 = $_POST['apellido2'];
    $correo = $_POST['correo'];
    $password = $_POST['password'];

    $datos = array('dni'=> $dni, 'nombre' => $nom, 'apellido1' => $apellido1, 'apellido2' => $apellido2, 'correo' => $correo, 'passw' => $password);

    $profesor = new Profesor();
    $profesor->edit($datos);
?>