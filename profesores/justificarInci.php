<?php
require('../lib/conexion.php');
require('../clases/falta.php');

$valor = $_POST['id'];

$falta = new Falta();
$falta->get($valor);

$datosFalta = array("id_falta" => $falta->getId_falta(), "id_tipo" => $falta->getId_tipo(), "id_alu" => $falta->getId_alu(), "id_asigna" => $falta->getId_asigna(), "dia" => $falta->getDia(), "hora" => $falta->getHora());

$falta->justificar($datosFalta);
        
?>