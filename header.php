<?php
require('lib/conexion.php');
require('clases/profesor.php');
require('clases/alumno.php');
require('clases/admin.php');
require('clases/asignatura.php');
require('clases/horarioProfe.php');
require('clases/horarioAlumno.php');
require('clases/falta.php');
require('clases/curso.php');

/* INICIO DE SESIÓN */
session_start();

if (isset($_SESSION['login']['id'])) {
    $usuario = $_SESSION['login']['id'];

    if (isset($_SESSION['login']['tutor'])) {
        $pagina = 'profeHome';
    } else {
        $pagina = 'alumnoHom';
    }
} else {
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
            $pagina = 'profeHome';
            if ($profe1->getTutor()) {
                $_SESSION['login'] = array("id" => $usuario, "tutor" => "SI");
            } else {
                $_SESSION['login'] = array("id" => $usuario, "tutor" => "NO");
            }
        } else {
            $alu = new Alumno();
            $alu->login($usuario, $contraseña);

            if ($alu->getNombre() != "") {
                $pagina = 'alumnoHom';

                $_SESSION['login'] = array("id" => $usuario);
            } else {
                $admin = new Admin();
                $admin->login($usuario, $contraseña);

                if ($admin->getNombre()) {
                    $pagina = 'administr';

                    $_SESSION['login'] = array("id" => $usuario, "admin" => "SI");
                }
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

    <!-- Add jQuery library -->
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>

    <!-- fancyBox  archivo CSS -->
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <!-- fancyBox archivo JS -->
    <script src="js/jquery.fancybox.min.js"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

    <!-- Ajax -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <title>AbsenceApp</title>
</head>

<body>
    <div id="page">
        <header class="<?php if (isset($_SESSION['login']['id'])) {
                            echo 'home';
                        } else {
                            echo 'first';
                        } ?>">
            <?php
            if (isset($_SESSION['login']['id'])) { ?>

                <div id="logo">
                    <div id="icono" class="fas fa-marker"></div>
                    <h1>AbsenceApp</h1>
                </div>
                <ul id="menuRes">
                    <li>
                        <i class="fas fa-bars" aria-hidden="true"></i>
                        <ul class="submenu ocultar">
                            <?php
                            if (isset($_SESSION['login']['tutor'])) {
                                ?>
                                <li>
                                    <a href="index.php?p=profeHome">
                                        <table>
                                            <tr>
                                                <td>
                                                    <i class="fa fa-home" aria-hidden="true"></i>
                                                </td>
                                                <td>
                                                    <span class="nomb">Inicio</span>
                                                </td>
                                            </tr>
                                        </table>
                                    </a>
                                </li>
                                <li>
                                    <a href="index.php?p=profeAsig">
                                        <table>
                                            <tr>
                                                <td>
                                                <i class="fas fa-users" aria-hidden="true"></i>
                                                </td>
                                                <td>
                                                    <span class="nomb">Alumnos</span>
                                                </td>
                                            </tr>
                                        </table>
                                    </a>
                                </li>
                                <?php
                                if ($_SESSION['login']['tutor'] == "SI") { ?>
                                    <li>
                                        <a href="index.php?p=profeTuto">
                                            <table>
                                                <tr>
                                                    <td>
                                                        <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                                                    </td>
                                                    <td>
                                                        <span class="nomb">Tutoría</span>
                                                    </td>
                                                </tr>
                                            </table>
                                        </a>
                                    </li>
                                <?php
                            }
                        } else {
                            ?>
                                <li>
                                    <a href="index.php?p=alumnoHom">
                                        <table>
                                            <tr>
                                                <td>
                                                    <i class="fa fa-home" aria-hidden="true"></i>
                                                </td>
                                                <td>
                                                    <span class="nomb">Inicio</span>
                                                </td>
                                            </tr>
                                        </table>
                                    </a>
                                </li>
                            <?php
                        }
                        ?>
                            <li>
                                <a href="index.php?p=perfilUse">
                                    <table>
                                        <tr>
                                            <td>
                                                <i class="fa fa-user" aria-hidden="true"></i>
                                            </td>
                                            <td>
                                                <span class="nomb">Perfil</span>
                                            </td>
                                        </tr>
                                    </table>
                                </a>
                            </li>
                            <li>
                                <a href="index.php?p=login&d=off">
                                    <table>
                                        <tr>
                                            <td>
                                                <i class="fa fa-power-off" aria-hidden="true"></i>
                                            </td>
                                            <td>
                                                <span class="nomb">Salir</span>
                                            </td>
                                        </tr>
                                    </table>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <ul id="user">
                    <li>
                        <i class="fa fa-user-circle" aria-hidden="true"></i>
                        <ul class="menu-user ocultar">
                            <?php
                            if (!isset($_SESSION['login']['admin'])) {
                                if (isset($_SESSION['login']['tutor'])) {
                                    $profe = new Profesor();
                                    $profe->get($_SESSION['login']['id']);
                                    $nombre = $profe->getNombre();
                                    $ape1 = $profe->getApellido1();
                                    $ape2 = $profe->getApellido2();
                                } else {
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

                                if (isset($_GET['mO'])) {
                                    ?>
                                    <li><a href="index.php?p=perfilUse&mO=si"><i class="far fa-user" aria-hidden="true"></i> Perfil</a></li>
                                <?php
                            } else {
                                ?>
                                    <li><a href="index.php?p=perfilUse"><i class="far fa-user" aria-hidden="true"></i> Perfil</a></li>
                                <?php
                            }
                        }
                        ?>

                            <li><a href="index.php?p=login&d=off"><i class="fa fa-power-off" aria-hidden="true"></i> Salir</a></li>
                        </ul>
                    </li>
                </ul>
            <?php
        } else {
            ?>

                <div id="logoHome">
                    <a href="index.php?p=login" id="iconoHome" class="fas fa-marker"></a>
                    <h1><span>Absence</span><span>App</span></h1>
                </div>

            <?php
        }
        ?>
        </header>