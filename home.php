<div id="homePrincipal">

    <div id="formu">

        <?php
        if (!isset($_GET['p']) || $_GET['p'] == 'login') {
            ?>
            <p>Inicio de sesión</p>
            <form action="index.php" method="post">
                <input type="text" name="user" id="user" placeholder="Usuario"><br>

                <input type="password" name="passw" id="passw" placeholder="Contraseña"><br>

                <input type="submit" value="Acceder" name="acceder" id="acceder">
            </form>

            <p id="separar">ó</p>

            <form action="index.php?p=registrar" method="post">
                <input type="submit" value="Registrarse" name="registrar" id="registrar">
            </form>
        <?php
        } else if ($_GET['p'] == 'registrar') { 
            ?>
            <p>Registrarse</p>
            <form action="index.php" method="post">
                <select name="tipo" id="tipo">
                    <option id="nulo" value="" disabled selected>Tipo de Usuario</option>
                    <option value="1">Profesor</option>
                    <option value="2">Alumno</option>
                </select>

                <input type="text" name="user" id="user" placeholder="Usuario"><br>

                <input type="password" name="passw" id="passw" placeholder="Contraseña"><br>

                <input type="password" name="repassw" id="repassw" placeholder="Repetir Contraseña"><br>

                <input type="text" name="nombre" id="nombre" placeholder="Nombre"><br>

                <input type="text" name="ape1" id="ape1" placeholder="1º Apellido"><br>

                <input type="text" name="ape2" id="ape2" placeholder="2º Apellido"><br>

                <input type="email" name="email" id="email" placeholder="Correo Electrónico"><br>

                <input type="checkbox" name="poli" id="poli"><label for="poli">Acepta las condiciones de Politica de Seguridad</label>

                <input type="submit" value="Registrarse" name="regis" id="regis">
            </form>
        <?php
        }
    ?>
    </div>

    <div class="slider">
        <ul>
            <li>
                <img src="img/atentos.jpg" alt="">
            </li>
            <li>
                <img src="img/niñoFeliz.jpg" alt="">
            </li>
            <li>
                <img src="img/niños.jpg" alt="">
            </li>
            <li>
                <img src="img/respeto.jpg" alt="">
            </li>
        </ul>
    </div>
</div>