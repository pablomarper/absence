        <?php

        require('header.php');

        if (isset($_GET['p'])) {
            $pagina = $_GET['p'];
        }


        if ($pagina == 'login') {
            $p = 'home.php';
        } else if ($pagina == 'registrar') {
            $p = 'home.php';
        } else if ($pagina == 'profeHome') {
            $p = 'profesores/profesorHome.php';
        } else if ($pagina == 'profeAsig') {
            $p = 'profesores/profesorAsignaturas.php';
        } else if ($pagina == 'profeTuto') {
            $p = 'profesores/profesorTutoria.php';
        } else if ($pagina == 'alumnoHom') {
            $p = 'alumnos/alumnoHome.php';
        } else if ($pagina == 'perfilUse') {
            $p = 'perfil.php';
        } else if ($pagina == 'administr') {
            $p = 'administrar.php';
        }

        ?>

        <section>

            <?php
            if (!isset($_SESSION['login']['id'])) {
                include($p);
            } else {
                ?>

            </section>

            <?php
            if (isset($_SESSION['login']['admin'])) { 
            ?>
            
            <main>
            
            <?php
            } else {
                ?>

                <main class="<?php if (isset($_GET['mO'])) {
                                    echo "amplio";
                                } else {
                                    echo "normal";
                                } ?>">
                    <nav class="<?php if (isset($_GET['mO'])) {
                                    echo "menuOculto";
                                } else {
                                    echo "menuNormal";
                                } ?>">
                        <?php
                        if (isset($_GET['mO'])) {

                            if (isset($_GET['p'])) {
                                $pos = strrpos($_SERVER['REQUEST_URI'], '&');
                                $url = substr($_SERVER['REQUEST_URI'], 0, $pos);
                                ?>
                                <table>
                                    <tr>
                                        <td class="arrow">
                                            <a href="<?php echo $url ?>"><i class="fas fa-angle-double-right"></i></a>
                                        </td>
                                    </tr>
                                </table>
                            <?php
                        } else {
                            ?>
                                <table>
                                    <tr>
                                        <td class="arrow">
                                            <a href="<?php echo $_SERVER['PHP_SELF'] ?>"><i class="fas fa-angle-double-right"></i></a>
                                        </td>
                                    </tr>
                                </table>
                            <?php
                        }
                    } else if (isset($_GET['p'])) {
                        $param = strstr($_SERVER['REQUEST_URI'], '?');
                        ?>
                            <table>
                                <tr>
                                    <td class="arrow">
                                        <a href="<?php echo $_SERVER['PHP_SELF'] . $param ?>&mO=si"><i class="fas fa-angle-double-left"></i></a>
                                    </td>
                                </tr>
                            </table>
                        <?php
                    } else {
                        ?>
                            <table>
                                <tr>
                                    <td class="arrow">
                                        <a href="<?php echo $_SERVER['PHP_SELF'] ?>?mO=si"><i class="fas fa-angle-double-left"></i></a>
                                    </td>
                                </tr>
                            </table>
                        <?php
                    }
                    ?>

                        <?php
                        if (isset($_SESSION['login']['tutor'])) {
                            ?>
                            <table <?php if (isset($_GET['mO'])) {
                                        echo "style='display:block; width:80px'";
                                    } ?>>
                                <tr>
                                    <td>
                                        <?php if (isset($_GET['mO'])) {
                                            ?>
                                            <a href="index.php?p=profeHome&mO=si" class="<?php if ($_GET['p'] == 'profeHome' || $_GET['p'] == '') {
                                                                                                echo "activo";
                                                                                            } ?>">
                                            <?php
                                        } else {
                                            ?>
                                                <a href="index.php?p=profeHome" class="<?php if ($_GET['p'] == 'profeHome' || $_GET['p'] == '') {
                                                                                            echo "activo";
                                                                                        } ?>">
                                                <?php
                                            }
                                            ?>
                                                <table <?php if (isset($_GET['mO'])) {
                                                            echo "style='display:block; width:80px'";
                                                        } ?>>
                                                    <tr>
                                                        <td>
                                                            <i class="fa fa-home" aria-hidden="true"></i>
                                                        </td>
                                                        <td <?php if (isset($_GET['mO'])) {
                                                                echo "style='display:none'";
                                                            } ?>>
                                                            <span class="nomb">Inicio</span>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <?php if (isset($_GET['mO'])) {
                                            ?>
                                            <a href="index.php?p=profeAsig&mO=si" class="<?php if ($_GET['p'] == 'profeAsig') {
                                                                                                echo "activo";
                                                                                            } ?>">
                                            <?php
                                        } else {
                                            ?>
                                                <a href="index.php?p=profeAsig" class="<?php if ($_GET['p'] == 'profeAsig') {
                                                                                            echo "activo";
                                                                                        } ?>">
                                                <?php
                                            }
                                            ?>
                                                <table <?php if (isset($_GET['mO'])) {
                                                            echo "style='display:block; width:80px'";
                                                        } ?>>
                                                    <tr>
                                                        <td>
                                                        <i class="fas fa-users" aria-hidden="true"></i>
                                                        </td>
                                                        <td <?php if (isset($_GET['mO'])) {
                                                                echo "style='display:none'";
                                                            } ?>>
                                                            <span class="nomb">Alumnos</span>
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
                                            <?php if (isset($_GET['mO'])) {
                                                ?>
                                                <a href="index.php?p=profeTuto&mO=si" class="<?php if ($_GET['p'] == 'profeTuto') {
                                                                                                    echo "activo";
                                                                                                } ?>">
                                                <?php
                                            } else {
                                                ?>
                                                    <a href="index.php?p=profeTuto" class="<?php if ($_GET['p'] == 'profeTuto') {
                                                                                                echo "activo";
                                                                                            } ?>">
                                                    <?php
                                                }
                                                ?>
                                                    <table <?php if (isset($_GET['mO'])) {
                                                                echo "style='display:block; width:80px'";
                                                            } ?>>
                                                        <tr>
                                                            <td>
                                                                <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                                                            </td>
                                                            <td <?php if (isset($_GET['mO'])) {
                                                                    echo "style='display:none'";
                                                                } ?>>
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
                            <table <?php if (isset($_GET['mO'])) {
                                        echo "style='display:block; width:80px'";
                                    } ?>>
                                <tr>
                                    <td>
                                        <?php if (isset($_GET['mO'])) {
                                            ?>
                                            <a href="index.php?p=alumnoHom&mO=si" class="<?php if ($_GET['p'] == 'alumnoHom' || $_GET['p'] == '') {
                                                                                                echo "activo";
                                                                                            } ?>">
                                            <?php
                                        } else {
                                            ?>
                                                <a href="index.php?p=alumnoHom" class="<?php if ($_GET['p'] == 'alumnoHom' || $_GET['p'] == '') {
                                                                                            echo "activo";
                                                                                        } ?>">
                                                <?php
                                            }
                                            ?>
                                                <table <?php if (isset($_GET['mO'])) {
                                                            echo "style='display:block; width:80px'";
                                                        } ?>>
                                                    <tr>
                                                        <td>
                                                            <i class="fa fa-home" aria-hidden="true"></i>
                                                        </td>
                                                        <td <?php if (isset($_GET['mO'])) {
                                                                echo "style='display:none'";
                                                            } ?>>
                                                            <span class="nomb">Inicio</span>
                                                        </td>
                                                    </tr>
                                                </table>
                                    </td>
                                </tr>
                            </table>
                        <?php
                    }
                    ?>
                    </nav>

                <?php
            }
            ?>


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