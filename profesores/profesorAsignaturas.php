<div id="alumnosP">
    <h3>
        <i class="fas fa-circle"></i>
        <?php
            if (isset($_GET['curs'])) {
                echo "<span>Alumnos</span>";
            } else if (isset($_GET['asign'])) {
                echo "<span>Cursos</span>";
            } else {
                echo "<span>Asignaturas</span>";
            }
        ?>
    </h3>
<?php
if (isset($_POST['keepIncidencias'])) {
    $contador = $_POST["contador"];
    $asignat = $_POST['asignaSelec'];

    for ($i = 1; $i < $contador; $i++) {
        $incidencia = $_POST['incidencias'.$i];

        if ($incidencia != 0) {
            $alu = $_POST['alumno'.$i];

            $hoyDia = date('d/m/Y');
            $hoyHora = date('G:i');

            $newFalta = new Falta();
            $newFalta->set($alu, $asignat, $incidencia, $hoyDia, $hoyHora);

        }
    }
}else if (isset($_GET['curs'])) {
?>
    
    <div id="alumnos">

        <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
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

            $alumnosSeleccionados = $_GET['curs'];
            $asignaSeleccionada = $_GET['asign'];
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
                        <select name="incidencias<?php echo $cont?>" id="incidencias">
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
                        <input type="submit" value="Guardar" name="keepIncidencias">
                    </td>
                </tr>
            </table>
            <input type="hidden" name="contador" value="<?php echo $cont?>">
            <input type="hidden" name="asignaSelec" value="<?php echo $asignaSeleccionada?>">
        </form>
    </div>

<?php
}else if (isset($_GET['asign'])) {
?>
        <div id="cursos">
        
            <div id="cur">
            <?php
        
                $asignSeleccionada = $_GET['asign'];
                $profe = new Profesor();
                
                $profe->cursos($_SESSION['login']['id'], $asignSeleccionada);
                $cursos = $profe->getCursos();
        
                foreach ($cursos as $valor) { ?>
                    <a href="index.php?p=profeAsign&asign=<?php echo $asignSeleccionada ."&curs=". $valor['id_curso']?>"><?php echo $valor['nombre']?></a>
            <?php
                }
            ?>
            </div>
        </div>

<?php
} else {
?>
    <div id="asignaturas">

        <div id="asig">
        <?php

            $profe = new Profesor();

            $profe->asignaturas($_SESSION['login']['id']);

            $asignaturas = $profe->getAsignaturas();

            foreach ($asignaturas as $valor) { ?>
                <a href="index.php?p=profeAsign&asign=<?php echo $valor['id_asigna']?>"><?php echo $valor['nombre']?></a>
        <?php
            }
        ?>
        </div>
    </div>
<?php
}
?>
</div>