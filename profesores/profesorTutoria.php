<div id="tuto">
    <h3>
        <i class="fas fa-circle"></i>
        <span>Tutoría</span>
    </h3>

    <?php
        if (isset($_POST['justificar'])) {

           $faltasJusti = $_POST['justi'];

            foreach ($faltasJusti as $valor) {
                $falta = new Falta();
                $falta->get($valor);

                $datosFalta = array("id_falta" => $falta->getId_falta(), "id_tipo" => $falta->getId_tipo(), "id_alu" => $falta->getId_alu(), "id_asigna" => $falta->getId_asigna(), "dia" => $falta->getDia(), "hora" => $falta->getHora());

                $falta->justificar($datosFalta);
            }
        }
    ?>

    <form action="<?php $_SERVER['PHP_SELF']?>" method="post">

        <table id = "aluSelec">
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

            $profe = new Profesor();
            $profe->tutoria($_SESSION['login']['id']);

            $alumnos = $profe->getTutoria();
            $cont = 1;

            foreach ($alumnos as $valor) { ?>
                <tr>
                    <td>
                        <?php echo $cont?>
                    </td>
                    <td>
                        <?php echo $valor['apellido1'] . " " . $valor['apellido2'] . ", " . $valor['nombre']?>
                        <input type="hidden" name="alumno<?php echo $cont?>" value="<?php echo $valor['dni']?>">
                    </td>
                    <td>
                        <?php if($valor['repetidor'] == 0) echo "no"; else echo "si"?>
                    </td>
                    <td>
                        <a href="index.php?p=profeTuto&a=<?php echo $valor['dni']?>"><i class="fas fa-eye"></i></a>
                    </td>
                </tr>
            <?php
                $cont++;
            }
            ?>
        </table>
    </form>

    <?php
    if (isset($_GET['a'])) {

        $idAlu = $_GET['a'];
        
        $alumno = new Alumno();
        $alumno->faltas($idAlu);

        $incidencias = $alumno->getIncidencias();

        if (sizeof($incidencias) != 0) {
            ?>
            <form action="index.php?p=profeTuto" method="post">
                <table id="incidenciasTuto">
                    <tr>
                        <td>
                            Tipo de incidencia
                        </td>
                        <td>
                            Asignatura
                        </td>
                        <td>
                            Dia
                        </td>
                        <td>
                            Hora
                        </td>
                        <td>
                            Justificada
                        </td>
                        <td>
                            Editar
                        </td>
                    </tr>
            <?php

            foreach ($incidencias as $valor) {
                echo "
                <tr>
                    <td>" . $valor['descripcion'] . "</td>
                    <td>" . $valor['nombre'] . "</td>
                    <td>" . $valor['dia'] . "</td>
                    <td>" . $valor['hora'] . "</td>
                    <td>" . $valor['justificada'] . "</td>";
                    if ($valor['justificada'] == 'SI') {
                        echo "<td><input type='checkbox' value=" . $valor['id_falta'] . " name='justi[]' id='justi' disabled></td>";
                    }else{
                        echo "<td><input type='checkbox' value=" . $valor['id_falta'] . " name='justi[]' id='justi'></td>";
                    }
                    
                echo "</tr>";
            }
        ?>
                <tr>
                    <td colspan="6">
                        <input type="submit" value="Justificar" name="justificar" id="justificar">
                    </td>
                </tr>
            </table>

        </form>
        
        <?php

        }else{
            echo "Alumno sin incidencias";
        }
    }
    ?>
            
</div>

