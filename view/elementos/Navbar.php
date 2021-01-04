<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
    <a class="mr-2" id="menu-toggle"><i class="icon ion-md-menu"></i></a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <!--Inicio Buscador del dashboard-->
    <form class="form-inline position-relative my-2 d-inline-block">
        <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Buscar">
        <button class="btn btn-search position-absolute" type="submit"><i class="icon ion-md-search"></i></button>
    </form>
    <!--Fin Buscador del dashboard-->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../imagenes/usuario.jpg" class="img-fluid rounded-circle mr-2 avatar">
                    Bienvenido <?php echo $_SESSION['sesionUser'][2];?>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Perfil</a>
                    <a class="dropdown-item" href="#">Configuración</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Cerrar Sesión</a>
                </div>
            </li>
        </ul>
    </div>
</nav>