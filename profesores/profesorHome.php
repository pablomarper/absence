<div id="homeP">
    <h3>
        <i class="fas fa-circle"></i>
        <span>Horario</span>
    </h3>

    <table id="horarioProfe">
        <tr class="horarioDias">
            <td></td>
            <td>Lunes</td>
            <td>Martes</td>
            <td>Miércoles</td>
            <td>Jueves</td>
            <td>Viernes</td>
        </tr>
    
    <?php

        $horarioProfe1 = new HorarioProfe();
        $horarioProfe1->primera($_SESSION['login']['id']);

        $horarioProfe2 = new HorarioProfe();
        $horarioProfe2->segunda($_SESSION['login']['id']);

        $horarioProfe3 = new HorarioProfe();
        $horarioProfe3->tercera($_SESSION['login']['id']);

        $horarioProfe4 = new HorarioProfe();
        $horarioProfe4->cuarta($_SESSION['login']['id']);

        $horarioProfe5 = new HorarioProfe();
        $horarioProfe5->quinta($_SESSION['login']['id']);

        $horarioProfe6 = new HorarioProfe();
        $horarioProfe6->sexta($_SESSION['login']['id']);

        $horarioProfe7 = new HorarioProfe();
        $horarioProfe7->septima($_SESSION['login']['id']);

        $horario = array("08:00", "08:55", "09:50", "10:45", "11:10", "12:05", "13:00", "13:15", "14:10");
        $dias = array("L", "M", "X", "J", "V");
        $filas = array($horarioProfe1->getPrimera(), $horarioProfe2->getSegunda(), $horarioProfe3->getTercera(), $horarioProfe4->getCuarta(), $horarioProfe5->getQuinta(), $horarioProfe6->getSexta(), $horarioProfe7->getSeptima());

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
                                echo "<td class='claseAsig'><ul><li>" . $filas[$dia][$count]['id_asigna'] . "</li><li>(" . $filas[$dia][$count]['id_curso'] . ")</li></ul></td>";
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