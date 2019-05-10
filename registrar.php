<?php
require('lib/conexion.php');
require('clases/alumno.php');
require('clases/profesor.php');

    $tipo = $_POST['tipo'];
    $dni = $_POST['user'];
    $nom = $_POST['nom'];
    $apellido1 = $_POST['apellido1'];
    $apellido2 = $_POST['apellido2'];
    $correo = $_POST['correo'];
    $password = $_POST['password'];

    $datos = array('dni'=> $dni, 'nombre' => $nom, 'apellido1' => $apellido1, 'apellido2' => $apellido2, 'correo' => $correo, 'passw' => $password);

    if ($tipo == 1) {
        $profe = new Profesor();

        if (!$profe->buscar($dni)) {

            $profe->set($datos);
        } else {
            header('HTTP/1.1 500 Internal Server');
            header('Content-Type: application/json; charset=UTF-8');
            die(json_encode(array('message' => 'ERROR')));
        }
    } else {

        $alu = new Alumno();

        if (!$alu->buscar($dni)) {

            $alu->set($datos);
        } else {
            header('HTTP/1.1 500 Internal Server');
            header('Content-Type: application/json; charset=UTF-8');
            die(json_encode(array('message' => 'ERROR')));
        }
    }
    
?>