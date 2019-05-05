<div id="homePrincipal">
    <?php
        if (!isset($_GET['p']) || $_GET['p'] == 'login') {
    ?>
    <div id="formu">
        
        <p>Inicio de sesión</p>
        
        <?php
        if (isset($_POST['acceder'])) {
            echo "<p class='mensaje'>Usuario ó contraseña erroneos</p>";
        }
        ?>

        <form action="index.php" method="post">
            <input type="text" name="user" id="user" placeholder="Usuario"><br>

            <input type="password" name="passw" id="passw" placeholder="Contraseña"><br>

            <input type="submit" value="Acceder" name="acceder" id="acceder">
        </form>

        <p id="separar">ó</p>

        <form action="index.php?p=registrar" method="post">
            <input type="submit" value="Registrarse" name="registrar" id="registrar">
        </form>
        
    </div>

    <?php
        } else if ($_GET['p'] == 'registrar') { 
    ?>

    <div id="formuRegis">
        <p id="titulo">Registrarse</p>

        <form action="index.php?p=registrar" method="post" onSubmit="validarRegis(event)">
            <div id="contenido">
                <div id="user">
                    <select name="tipo" id="tipo">
                        <option id="nulo" value="" disabled selected>Tipo de Usuario</option>
                        <option value="1">Profesor</option>
                        <option value="2">Alumno</option>
                    </select>

                    <input type="text" name="usuario" id="usuario" placeholder="DNI"><br>

                    <input type="password" name="passw" id="passw" placeholder="Contraseña"><br>

                    <input type="password" name="repassw" id="repassw" placeholder="Repetir Contraseña"><br>

                    <p class="condi"><input type="checkbox" name="poli" id="poli"><label for="poli">Acepta las condiciones de Politica de Seguridad</label></p>
                </div>

                <div id="datos">
                    <input type="text" name="nombre" id="nombre" placeholder="Nombre"><br>

                    <input type="text" name="ape1" id="ape1" placeholder="1º Apellido"><br>

                    <input type="text" name="ape2" id="ape2" placeholder="2º Apellido"><br>

                    <input type="email" name="email" id="email" placeholder="Correo Electrónico"><br>
                </div>
            </div>

            <input type="submit" value="Registrarse" name="regis" id="regis">
        </form>
    </div>

    <?php
        }
    ?>

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

    
    <div id="galeria">
        <p>
            Ayudamos en todos los niveles educativos
        </p>
        <div>
            <a href="img/infantil.jpg" data-fancybox="galeria1" data-fancybox  data-caption="Educación Infantil"><img src="img/infantil.jpg" alt=""></a>
            <a href="img/primaria.jpg" data-fancybox="galeria1" data-fancybox  data-caption="Educación Primaria"><img src="img/primaria.jpg" alt=""></a>
            <a href="img/secun.jpg" data-fancybox="galeria1" data-fancybox  data-caption="Educación Secundaria"><img src="img/secun.jpg" alt=""></a>
            <a href="img/bachiller.jpg" data-fancybox="galeria1" data-fancybox  data-caption="Bachillerato"><img src="img/bachiller.jpg" alt=""></a>
        </div>
    </div>
    

    
</div>