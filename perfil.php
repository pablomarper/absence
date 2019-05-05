<div id="perfil">
    <h3 class="titulos">
        <i class="fas fa-circle"></i>
        <span>Perfil</span>
    </h3>

    <?php
    if (isset($_SESSION['login']['tutor'])) {
        $profe = new Profesor();
        $profe->get($_SESSION['login']['id']);

        $dni = $profe->getDni();
        $nombre = $profe->getNombre();
        $ape1 = $profe->getApellido1();
        $ape2 = $profe->getApellido2();
        $email = $profe->getCorreo();
    } else {
        $alumno = new Alumno();
        $alumno->get($_SESSION['login']['id']);

        $dni = $alumno->getDni();
        $nombre = $alumno->getNombre();
        $ape1 = $alumno->getApellido1();
        $ape2 = $alumno->getApellido2();
        $email = $alumno->getCorreo();
    }
    ?>

    <div id="datos">
        <div id="imagen">
            <img src="img/users.jpg" alt="Usuario" id="imagen">
            <?php 
            if (!isset($_GET['edit'])) {
                if (isset($_GET['mO'])) {
            ?>
                    <a href="index.php?p=perfilUse&mO=si&edit=si"><i class="fas fa-user-edit"></i> Editar</a>
            <?php
                } else { 
            ?>
                    <a href="index.php?p=perfilUse&edit=si"><i class="fas fa-user-edit"></i> Editar</a>
            <?php
                }
            }
            ?>
        </div>

        <?php
            if (isset($_GET['edit'])) {
                if (isset($_SESSION['login']['tutor'])) {
        ?>
                    <form action="index.php" method="post" onSubmit="validarModifyProfe(event)">
        <?php
                } else {
        ?>
                    <form action="index.php" method="post" onSubmit="validarModifyAlumno(event)">
        <?php
                }
        ?>
            <table>
                <tr>
                    <td>
                        DNI/Usuario:
                    </td>
                    <td>
                        <?php echo $dni?>
                        <input type="hidden" id="dni" name="dni" value="<?php echo $dni?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        Contraseña:
                    </td>
                    <td>
                        <input type="password" id="password" name="password">
                    </td>
                </tr>
                <tr>
                    <td>
                        Repetir contraseña:
                    </td>
                    <td>
                        <input type="password" id="password2" name="password2">
                    </td>
                </tr>
                <tr>
                    <td>
                        Nombre:
                    </td>
                    <td>
                        <input type="text" id="nom" name="nom">
                    </td>
                </tr>
                <tr>
                    <td>
                        1º Apellido:
                    </td>
                    <td>
                        <input type="text" id="apellido1" name="apellido1">
                    </td>
                </tr>
                <tr>
                    <td>
                        2º Apellido:
                    </td>
                    <td>
                        <input type="text" id="apellido2" name="apellido2">
                    </td>
                </tr>
                <tr>
                    <td>
                        Correo Electrónico:
                    </td>
                    <td>
                        <input type="email" id="correo" name="correo">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" value="Modificar" name="modify" id="modify">
                    </td>
                </tr>
            </table>
        </form>
        
        <?php
            } else {
        ?>
        
        <table>
            <tr>
                <td>
                    DNI/Usuario:
                </td>
                <td>
                    <?php echo $dni?>
                </td>
            </tr>
            <tr>
                <td>
                    Nombre:
                </td>
                <td>
                    <?php echo $nombre?>
                </td>
            </tr>
            <tr>
                <td>
                    1º Apellido:
                </td>
                <td>
                    <?php echo $ape1?>
                </td>
            </tr>
            <tr>
                <td>
                    2º Apellido:
                </td>
                <td>
                    <?php echo $ape2?>
                </td>
            </tr>
            <tr>
                <td>
                    Correo Electrónico:
                </td>
                <td>
                    <?php echo $email?>
                </td>
            </tr>
        </table>

        <?php
            }
        ?>
    </div>
</div>