<div id="adminis">
    <h2 class="titulos">
        <i class="fas fa-circle"></i>
        <a href="index.php?p=administr">
            <span>Modo Administrador</span>
        </a>
    </h2>
    
    <?php
    if (isset($_GET['user'])) {

        $user = $_GET['user'];
        $admin = $_GET['admin'];

        if ($admin == 'crear') {
            include('administrador/crearUser.php');
        } else if ($admin == 'editar'){
            include('administrador/modificarUser.php');
        } else {
            include('administrador/eliminarUser.php');
        }

    } else {

        if (isset($_GET['admin'])) {
            $parAdmin = $_GET['admin'];
        ?>
        
        <div id="menuAdmin2">
            <ul>
                <li>
                    <a href="index.php?p=administr&admin=<?php echo $parAdmin?>&user=prof">
                        <i class="fas fa-user-tie"></i>
                    </a>
                </li>
                <li>
                    <a href="index.php?p=administr&admin=<?php echo $parAdmin?>&user=al">
                        <i class="fas fa-user-graduate"></i>
                    </a>
                </li>
            </ul>
        </div>
        <?php
        } else {
        ?>
        
        <div id="menuAdmin1">
            <ul>
                <li>
                    <a href="index.php?p=administr&admin=crear">
                        <i class="fas fa-user-plus"></i>
                    </a>
                </li>
                <li>
                    <a href="index.php?p=administr&admin=editar">
                        <i class="fas fa-user-edit"></i>
                    </a>
                </li>
                <li>
                    <a href="index.php?p=administr&admin=eliminar">
                        <i class="fas fa-user-minus"></i>
                    </a>
                </li>
            </ul>
        </div>
        <?php
        }

    }
    ?>
    

    <div id="usuarios" style="display:none">
        <div id="profes">
            <?php

            $admin = new Admin;

            $admin->profes();

            $profesores = $admin->getProfesores();
            ?>
            <select name="" id="" size="<?php echo count($profesores) ?>">
                <?php

                foreach ($profesores as $valor) {
                    echo "<option value=''>" . $valor['apellido1'] . " " . $valor['apellido2']  . ", " . $valor['nombre'] . "</option>";
                }

                ?>
            </select>
        </div>

        <div id="alumnos">
            <?php

            $admin = new Admin;

            $admin->alumnos();

            $alum = $admin->getAlumnos();
            ?>
            <select name="" id="" size="<?php echo count($alum) ?>">
                <?php

                foreach ($alum as $valor) {
                    echo "<option value=''>" . $valor['apellido1'] . " " . $valor['apellido2']  . ", " . $valor['nombre'] . "</option>";
                }

                ?>
            </select>
        </div>
    </div>
</div>