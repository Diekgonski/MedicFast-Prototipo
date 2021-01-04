<!-- Sidebar -->
<div class="bg-primary border-right" id="sidebar-wrapper">
    <div class="sidebar-heading bg-primary text-light font-weight-bold">
        <a class="navbar-brand border-bottom" href="Home.php">
            <h4 class="text-light font-weight-bold">
                <img src="../imagenes/MedicFastLogo.png" width="30" height="30" alt="" class="mr-2">MedicFast
            </h4>
        </a>
    </div>
    <div class="list-group list-group-flush">
        <?php
            if($_SESSION['sesionUser'][1] === "1")
            {
                echo '<a href="UsuarioView.php" class="list-group-item list-group-item-action d-block text-light bg-primary"><i class="icon ion-md-person mr-2 "></i> Usuario</a>'; 
            }
        ?>        
        <a href="MedicamentoView.php" class="list-group-item list-group-item-action d-block text-light bg-primary"><i class="icon ion-md-medkit mr-2 "></i> Medicamento</a> 
        <a href="EnvioView.php" class="list-group-item list-group-item-action d-block text-light bg-primary"><i class="icon ion-md-pin mr-2 "></i> Envío</a>
    </div>
</div>
<!-- /#sidebar-wrapper -->