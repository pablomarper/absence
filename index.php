        <?php

            require('header.php');

            if (isset($_GET['p'])){
                $pagina = $_GET['p'];
            }


            if ($pagina == 'login'){
                $p = 'home.php';
            } else if ($pagina == 'registrar') {
                $p = 'registrar.php';
            } else if ($pagina == 'profe') {
                $p = 'profesores/profesorHome.php';
            } else if ($pagina == 'profeAsign') {
                $p = 'profesores/profesorAsignaturas.php';
            } else if ($pagina == 'profeTuto') {
                $p = 'profesores/profesorTutoria.php';
            } else if ($pagina == 'alumno') {
                $p = 'alumnos/alumnoHome.php';
            } else if ($pagina == 'perfil') {
                $p = 'perfil.php';
            }

        ?>

        <section>
        
        <?php
            if (!isset($_SESSION['login']['id'])) {
                include($p);
            } else {
        ?>
        
        </section>

        <main>           
            <nav>
                <?php
                if (isset($_SESSION['login']['tutor'])) {
                ?>
                <table>
                    <tr>
                        <td>
                            <a href="index.php?p=profe" class="<?php if ($_GET['p'] == 'profe' || $_GET['p'] == '') { echo "activo";} ?>">
                                <table>
                                    <tr>
                                        <td>
                                            <i class="fa fa-home" aria-hidden="true"></i>
                                        </td>
                                        <td>
                                            <span class="nomb">Inicio</span>    
                                        </td>
                                    </tr>
                                </table>                              
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="index.php?p=profeAsign" class="<?php if ($_GET['p'] == 'profeAsign') { echo "activo";} ?>">
                                <table>
                                    <tr>
                                        <td>
                                            <i class="fa fa-book" aria-hidden="true"></i>
                                        </td>
                                        <td>
                                            <span class="nomb">Asignaturas</span>  
                                        </td>
                                    </tr>
                                </table>   
                            </a>
                        </td>
                    </tr>
                    <?php
                        if ($_SESSION['login']['tutor'] == "SI") { ?>
                    <tr>
                        <td>
                            <a href="index.php?p=profeTuto" class="<?php if ($_GET['p'] == 'profeTuto') { echo "activo";} ?>">
                                <table>
                                    <tr>
                                        <td>
                                            <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                                        </td>
                                        <td>
                                            <span class="nomb">Tutoría</span>
                                        </td>
                                    </tr>
                                </table>  
                            </a>
                        </td>
                    </tr>
                        <?php
                        }
                    ?>
                </table>
                <?php
                } else {
                    ?>
                    <table>
                        <tr>
                            <td>
                                <a href="index.php?p=alumno" class="<?php if ($_GET['p'] == 'alumno' || $_GET['p'] == '') { echo "activo";} ?>">
                                    <i class="fa fa-home" aria-hidden="true"></i>
                                    <span class="nomb">Inicio</span>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="#" class="<?php if ($_GET['p'] == 'asd') { echo "activo";} ?>">
                                    <i class="fa fa-book" aria-hidden="true"></i>
                                    <span class="nomb">Asignaturas</span>
                                </a>
                            </td>
                        </tr>
                    </table>
                    <?php
                }
                ?>
            </nav>
            <div id="contenido">
            <?php
            
                include($p);
            }                   
            ?>
            </div>
        </main>

        <?php
        require('footer.php');
        ?>