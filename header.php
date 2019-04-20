<?php
require('lib/conexion.php');
require('clases/profesor.php');
require('clases/alumno.php');
require('clases/asignatura.php');
require('clases/horarioProfe.php');
require('clases/horarioAlumno.php');
require('clases/falta.php');
require('clases/curso.php');

/* INICIO DE SESIÓN */
session_start();

if (isset($_SESSION['login']['id'])) {
    $pagina = 'profe';
    $usuario = $_SESSION['login']['id'];
}else {
    $pagina = 'login';
}

/* CERRAR SESIÓN */
if (isset($_GET['d'])) {
    $pagina = 'login';
    session_unset();
    session_destroy();
    unset($usuario);
}

if (isset($_POST['acceder'])) {

    $usuario = $_POST['user'];
    $contraseña = $_POST['passw'];

    if (!empty($usuario) || !empty($contraseña)) {
        $profe = new Profesor();
        $profe->login($usuario, $contraseña);

        $profe1 = new Profesor();
        $profe1->esTutor($usuario);

        if ($profe->getNombre() != "") {
            $pagina = 'profe';
            if ($profe1->getTutor()) {
                $_SESSION['login'] = array("id" => $usuario, "tutor" => "SI");
            }else{
                $_SESSION['login'] = array("id" => $usuario, "tutor" => "NO");
            }
        } else {
            $alu = new Alumno();
            $alu->login($usuario, $contraseña);

            if ($alu->getNombre() != "") {
                $pagina = 'alumno';

                $_SESSION['login'] = array("id" => $usuario);
                
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- JQuery -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js" type="text/javascript"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <title>AbsenceApp</title>
</head>
<body>
    <div id="page">
        <header class="<?php if (isset($_SESSION['login']['id'])){ echo 'home';} else { echo 'first';}?>">
            <?php
            if (isset($_SESSION['login']['id'])) { ?>

                <div id="logo">
                    <div id="icono" class="fas fa-marker"></div>
                    <h1>AbsenceApp</h1>
                </div>
                <ul id="user">
                    <li>
                        <i class="fa fa-user-circle" aria-hidden="true"></i>
                        <ul class="menu-user ocultar">
                            <?php
                                if (isset($_SESSION['login']['tutor'])) {
                                    $profe = new Profesor();
                                    $profe->get($_SESSION['login']['id']);
                                    $nombre = $profe->getNombre();
                                    $ape1 = $profe->getApellido1();
                                    $ape2 = $profe->getApellido2();
                                }else{
                                    $alum = new Alumno();
                                    $alum->get($_SESSION['login']['id']);
                                    $nombre = $alum->getNombre();
                                    $ape1 = $alum->getApellido1();
                                    $ape2 = $alum->getApellido2();
                                }

                                echo "
                                <li class='nom'>
                                    <span>$nombre $ape1 $ape2</span>
                                </li>
                                ";
                            ?>
                            <li><a href="index.php?p=perfil" ><i class="far fa-user" aria-hidden="true"></i> Perfil</a></li>
                            <li><a href="index.php?p=login&d=off"><i class="fa fa-power-off" aria-hidden="true"></i> Salir</a></li>
                        </ul>
                    </li>
                </ul>
                <!--<a href="index.php?p=login&d=off" class="apagar"><i class="fa fa-power-off" aria-hidden="true"></i> Salir</a>-->
            <?php
            } else {
            ?>

            <div id="logoHome">
                <div id="iconoHome" class="fas fa-marker"></div>
                <h1><span>Absence</span><span>App</span></h1>
            </div>

            <?php
            }
            ?>  
        </header>
