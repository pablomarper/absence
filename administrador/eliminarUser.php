<div id="deleteUser">

    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" onSubmit="deleteUser(event)">
        <div id="contenido">
            <table>
                <tr>
                    <td>Nombre Completo</td>
                    <td></td>
                </tr>
            <?php
            if ($user == 'prof') {
                $admin = new Admin;
                $admin->profes();
    
                $profesores = $admin->getProfesores();
                $cont = 0;
    
                foreach ($profesores as $valor) {
                    echo "
                    <tr>
                        <td>" . $valor['apellido1'] . " " . $valor['apellido2']  . ", " . $valor['nombre'] . "</td>
                        <td><input type='checkbox' value=" . $valor['dni'] . " name='delete[]' id='delete". $cont ."'></td>
                    </tr>
                    ";
                    $cont++;
                }
            } else {
                $admin = new Admin;
                $admin->alumnos();
    
                $alum = $admin->getAlumnos();
                $cont = 0;
    
                foreach ($alum as $valor) {
                    echo "
                    <tr>
                        <td>" . $valor['apellido1'] . " " . $valor['apellido2']  . ", " . $valor['nombre'] . "</td>
                        <td><input type='checkbox' value=" . $valor['dni'] . " name='delete[]' id='delete". $cont ."'></td>
                    </tr>
                    ";
                    $cont++;
                }
            }
            ?>
            </table>
        </div>

        <?php
        echo "<input type='hidden' name='contador' id='contador' value='" . $cont . "'>";

        if ($_GET['user'] == 'prof') {
            echo "<input type='hidden' name='tipo' id='tipo' value='1'>";
        } else {
            echo "<input type='hidden' name='tipo' id='tipo' value='2'>";
        }
        ?>

        <input type="submit" value="Eliminar" name="delete" id="delete">
    </form>
</div>