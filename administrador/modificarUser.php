<div id="editarUser">

    <div id="contenido">
        <?php
        if ($user == 'prof') {
            $admin = new Admin;
            $admin->profes();

            $profesores = $admin->getProfesores();
            ?>
            <select name="" id="" size="<?php echo (count($profesores) + 1) ?>">
                <?php

                foreach ($profesores as $valor) {
                    echo "<option value='" . $valor['dni'] . "'>" . $valor['apellido1'] . " " . $valor['apellido2']  . ", " . $valor['nombre'] . "</option>";
                }

                ?>
            </select>
        <?php
    } else {
        $admin = new Admin;
        $admin->alumnos();

        $alum = $admin->getAlumnos();
        ?>
            <select name="" id="" size="<?php echo (count($alum) + 1) ?>">
                <?php

                foreach ($alum as $valor) {
                    echo "<option value='" . $valor['dni'] . "'>" . $valor['apellido1'] . " " . $valor['apellido2']  . ", " . $valor['nombre'] . "</option>";
                }

                ?>
            </select>
        <?php
    }
    ?>
    </div>

    <div id="formulario" style="display:none">
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" onSubmit="editarUser(event)">
            <table>
                <tr>
                    <td>
                        DNI/Usuario:
                    </td>
                    <td>
                        <input type="text" id="dni" name="dni" value="" readonly>
                    </td>
                </tr>
                <tr>
                    <td>
                        Contraseña:
                    </td>
                    <td>
                        <input type="password" id="password" name="password" autofocus>
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
            <?php
            if ($_GET['user'] == 'prof') {
                echo "<input type='hidden' name='tipo' id='tipo' value='1'>";
            } else {
                echo "<input type='hidden' name='tipo' id='tipo' value='2'>";
            }
            ?>
        </form>
    </div>
</div>