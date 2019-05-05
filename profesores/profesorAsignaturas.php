<div id="alumnosP">
    <h3 class="titulos">
        <i class="fas fa-circle"></i>
        <span>Alumnos</span>
    </h3>

    <input type="hidden" id="idUsuario" value="<?php echo $_SESSION['login']['id'] ?>">
    
    <div id="alumn">
    <?php

    if (isset($_POST['buscar'])) {
    ?>
        <div id="alumnos">

            <form action="<?php $_SERVER['PHP_SELF']?>" method="post" id="formuInci">
                <table id="aluSelec">
                    <tr>
                        <td>
                            Nº
                        </td>
                        <td>
                            Nombre
                        </td>
                        <td>
                            Repetidor
                        </td>
                        <td>
                            Incidencia
                        </td>
                    </tr>
                    <?php

                    $alumnosSeleccionados = $_POST['cursoSelec'];
                    $asignaSeleccionada = $_POST['asigna'];

                    $profe = new Profesor();

                    $profe->alumnos($_SESSION['login']['id'], $alumnosSeleccionados, $asignaSeleccionada);
                    $alumnos = $profe->getAlumnos();
                    $cont = 1;

                    $falta = new Falta();
                    $falta->tiposDeFalta();

                    $tiposFalta = $falta->getTiposFalta();

                    foreach ($alumnos as $valor) { ?>
                        <tr>
                            <td>
                                <?php echo $cont ?>
                            </td>
                            <td>
                                <?php echo $valor['apellido1'] . " " . $valor['apellido2'] . ", " . $valor['nombre'] ?>
                                <input type="hidden" name="alumno<?php echo $cont ?>" id="alumno<?php echo $cont ?>" value="<?php echo $valor['dni'] ?>">
                            </td>
                            <td>
                                <?php if ($valor['repetidor'] == 0) echo "no";
                                else echo "si" ?>
                            </td>
                            <td>
                                <select name="incidencias<?php echo $cont ?>" id="incidencias<?php echo $cont ?>">
                                    <option value="0" selected>Sin incidencias</option>
                                    <?php
                                    foreach ($tiposFalta as $valor2) {
                                        echo "<option value='" . $valor2['id_tipo'] . "'>" . $valor2['descripcion'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <?php
                        $cont++;
                    }
                    ?>
                    <tr>
                        <td colspan="4">
                            <input type="submit" value="Guardar" name="keepIncidencias" id="keepIncidencias">
                        </td>
                    </tr>
                </table>
                <input type="hidden" name="contador" id="contador" value="<?php echo $cont ?>">
                <input type="hidden" name="asignaSelec" id="asignaSelec" value="<?php echo $asignaSeleccionada ?>">
            </form>
        </div>
    <?php
    } else {
    ?>
    </div>

    <div id="formulario">
        <select name="asignaturas" id="asignaturas">
            <option value="" disabled selected>Asignaturas</option>
            <?php

            $profe = new Profesor();

            $profe->asignaturas($_SESSION['login']['id']);

            $asignaturas = $profe->getAsignaturas();

            foreach ($asignaturas as $valor) {
                $nombre = $valor['nombre'];
                $id = $valor['id_asigna'];

                echo "<option value='$id'>$nombre</option>";
            }

            $param = strstr($_SERVER['REQUEST_URI'], '&');
            ?>
        </select>

        <input type="hidden" name="parametro" id="parametro" value="<?php echo $param?>">
        
        <div id="cursos"></div>
    </div>

<?php
    }
?>

</div>