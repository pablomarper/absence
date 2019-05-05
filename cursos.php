<?php
require("clases/profesor.php");

if (isset($_GET['asig'])) {
    $idUser = $_GET['id'];

    if (isset($_GET['param'])) {
    ?>
<form action="index.php?p=profeAsig&mO=si" method="post">
    <?php
    }else {
    ?>
<form action="index.php?p=profeAsig" method="post">
    <?php
    }
?>
    <select name="cursoSelec" id="cursoSelec">
        <option value="" disabled selected>Cursos</option>

        <?php
        $asignSeleccionada = $_GET['asig'];

        $profe = new Profesor();

        $profe->cursos($idUser, $asignSeleccionada);

        $cursos = $profe->getCursos();

        foreach ($cursos as $valor) { 
            $nombre = $valor['nombre'];
            $id = $valor['id_curso'];

            echo "<option value='$id'>$nombre</option>";
        }
        ?>
        
    </select>

    <input type="hidden" id="asigna" name="asigna" value="<?php echo $asignSeleccionada ?>">
    <input type="submit" value="Buscar" id="buscar" name="buscar" style="display:none">
</form>
    
<script>
    
    /* Aparecer botón de busqueda */

    $('#cursoSelec').change(function() {
        $('#buscar').css("display", "initial");
    });
</script>
<?php

}

?>