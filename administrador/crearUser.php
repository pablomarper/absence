<div id="crearUser">
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" onSubmit="crearUser(event)">
        <div id="contenido">
            <input type="text" name="usuario" id="usuario" placeholder="DNI"><br>

            <input type="password" name="passw" id="passw" placeholder="Contraseña"><br>

            <input type="password" name="repassw" id="repassw" placeholder="Repetir Contraseña"><br>

            <input type="text" name="nombre" id="nombre" placeholder="Nombre"><br>

            <input type="text" name="ape1" id="ape1" placeholder="1º Apellido"><br>

            <input type="text" name="ape2" id="ape2" placeholder="2º Apellido"><br>

            <input type="email" name="email" id="email" placeholder="Correo Electrónico"><br>
        </div>

        <?php
            if ($_GET['user'] == 'prof') {
                echo "<input type='hidden' name='tipo' id='tipo' value='1'>";
            } else {
                echo "<input type='hidden' name='tipo' id='tipo' value='2'>";
            }
        ?>
        <input type="hidden" name="">

        <input type="submit" value="Crear" name="crear" id="crear">
    </form>
</div>