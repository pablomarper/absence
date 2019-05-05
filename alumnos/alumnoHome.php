<div id="aluHome">
    <h3 class="titulos">
        <i class="fas fa-circle"></i>
        <span>Horario</span>
    </h3>

    <table id="horarioAlum">
        <tr class="horarioDias">
            <td></td>
            <td>Lunes</td>
            <td>Martes</td>
            <td>Miercoles</td>
            <td>Jueves</td>
            <td>Viernes</td>
        </tr>

        <tr class="horarioDiasRespon">
            <td></td>
            <td>L</td>
            <td>M</td>
            <td>M</td>
            <td>J</td>
            <td>V</td>
        </tr>

    <?php
    
        $horarioAlu1 = new HorarioAlumno();
        $horarioAlu1->primera($_SESSION['login']['id']);

        $horarioAlu2 = new HorarioAlumno();
        $horarioAlu2->segunda($_SESSION['login']['id']);

        $horarioAlu3 = new HorarioAlumno();
        $horarioAlu3->tercera($_SESSION['login']['id']);

        $horarioAlu4 = new HorarioAlumno();
        $horarioAlu4->cuarta($_SESSION['login']['id']);

        $horarioAlu5 = new HorarioAlumno();
        $horarioAlu5->quinta($_SESSION['login']['id']);

        $horarioAlu6 = new HorarioAlumno();
        $horarioAlu6->sexta($_SESSION['login']['id']);
        
        $horarioAlu7 = new HorarioAlumno();
        $horarioAlu7->septima($_SESSION['login']['id']);

        $horario = array("08:00", "08:55", "09:50", "10:45", "11:10", "12:05", "13:00", "13:15", "14:10");
        $dias = array("L", "M", "X", "J", "V");
        $filas = array($horarioAlu1->getPrimera(), $horarioAlu2->getSegunda(), $horarioAlu3->getTercera(), $horarioAlu4->getCuarta(), $horarioAlu5->getQuinta(), $horarioAlu6->getSexta(), $horarioAlu7->getSeptima());

        for ($i = 0, $dia = 0; $i < 9; $i++) {

            $numero = count($filas[$dia]);

            if ($i != 3 && $i != 6) {
                echo "<tr><td>" . $horario[$i] . "</td>";

                for ($j = 0; $j < 5; $j++) {

                    if ($numero > 0){

                        $count = 0;
                        $si = false;

                        while($count < $numero) {
                            if ($filas[$dia][$count]['dia'] === $dias[$j]) {
                                echo "<td class='claseAsig'>" . $filas[$dia][$count]['id_asigna'] . "</td>";
                                $si = true;
                            }
                            $count++;
                        }
    
                        if (!$si) {
                            echo "<td class='clase'> </td>";
                        }
                    }else{
                        echo "<td class='clase'> </td>";
                    }
                }
                $dia++;
            }else{
                echo "<tr><td class='recreoH'>" . $horario[$i] . "</td>";
                echo "<td class='recreo'>R</td><td class='recreo'>E</td><td class='recreo'><span>C</span><span>R</span></td><td class='recreo'>E</td><td class='recreo'>O</td>";
            }
            echo "</tr>";
        }
    ?>
    </table>
</div>