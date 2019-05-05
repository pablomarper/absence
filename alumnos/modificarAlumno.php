<?php
require('../lib/conexion.php');
require('../clases/alumno.php');

    $dni = $_POST['user'];
    $nom = $_POST['nom'];
    $apellido1 = $_POST['apellido1'];
    $apellido2 = $_POST['apellido2'];
    $correo = $_POST['correo'];
    $password = $_POST['password'];

    $datos = array('dni'=> $dni, 'nombre' => $nom, 'apellido1' => $apellido1, 'apellido2' => $apellido2, 'correo' => $correo, 'passw' => $password);

    $alu = new Alumno();
    $alu->edit($datos);
?>