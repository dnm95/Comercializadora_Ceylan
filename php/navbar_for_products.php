<?php
    echo"
        <!-- Dropdown Productos -->
        <ul id='dropdownProducts' class='dropdown-content'>
            <li><a href='calzado-de-seguridad.php'>Calzado</a></li>
            <li><a href='cascos-de-seguridad.php'>Cascos</a></li>
            <li><a href='equipo-de-vialidad.php'>Equipo de Vialidad</a></li>
            <li><a href='guantes.php'>Guantes</a></li>
            <li><a href='proteccion-auditiva.php'>P. Auditiva</a></li>
            <li><a href='proteccion-contra-caidas.php'>P. Contra Caídas</a></li>
            <li><a href='proteccion-corporal.php'>P. Corporal</a></li>
            <li><a href='proteccion-lumbar.php'>P. Lumbar</a></li>
            <li><a href='proteccion-ocular.php'>P. Ocular</a></li>
            <li><a href='proteccion-respiratoria.php'>P. Respiratoria</a></li>
            <li class='divider'></li>
            <li><a href='../categories.php'>Mostrar Todo</a></li>
        </ul>
    
        <!-- NAVBAR-->
        <nav class='blue-grey darken-1' role='navigation'>
        <div class='nav-wrapper'>
            <a id='logo-container' href='../index.php' class='brand-logo brand-stylish logo'>
                Comercializadora Ceylán
            </a>
            <ul class='right hide-on-med-and-down menu-items'>
            <li><a href='../about.php'>¿Quiénes Somos?</a></li>
            <li><a class='dropdown-button' href='#!' data-activates='dropdownProducts'>Productos<i class='material-icons right'>arrow_drop_down</i></a></li>
            <li><a href='../brands.php'>Marcas</a></li>
            <li><a href='../contact.php'>Contacto</a></li>
            </ul>
    
            <ul id='nav-mobile' class='side-nav'>
            <li><a href='../about.php'>¿Quiénes Somos?</a></li>
            <li><a href='../categories.php'>Productos</a></li>
            <li><a href='../brands.php'>Marcas</a></li>
            <li><a href='../contact.php'>Contacto</a></li>
            </ul>
            <a href='#' data-activates='nav-mobile' class='button-collapse'><i class='material-icons'>menu</i></a>
        </div>
        </nav>
        <!-- END NAVBAR -->
    ";
?>