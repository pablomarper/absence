        <footer id="pie">
        <?php
            if (!isset($_POST['acceder']) && (!isset($_GET['p']) || $_GET['p'] == 'login' || $_GET['p'] == 'registrar') && !isset($_GET['mO'])) {
        ?>
        
                <p>Siguenos en redes sociales</p>
                <ul>
                    <li>
                        <a href="https://es-es.facebook.com" target="_blank">
                            <i class="fab fa-facebook"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/?hl=es" target="_blank">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://twitter.com/?lang=es" target="_blank">
                            <i class="fab fa-twitter-square"></i>
                        </a>
                    </li>
                </ul>
        
        <?php
            }
        ?>
        </footer>
    </div>
    <!-- Bootstrap -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- JavaScript -->
    <script src="js/app.js"></script>
</body>
</html>