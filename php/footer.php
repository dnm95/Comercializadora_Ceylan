<?php
    echo"
        <footer class='page-footer light-blue darken-4'>
        <div class='container'>
        <div class='row'>
            <div class='col l6 s12'>
            <h5 class='white-text'>Comercializadora Ceylán</h5>
            <p class='grey-text text-lighten-4 footer-desc'>Somos una empresa que nació en el año de 1995, con el fin de brindar seguridad industrial a todo tipo de empresas y usuarios, tomando muy en cuenta que nuestros productos no solo sean seguros, sino que brinden comodidad, ya que sabemos que una seguridad cómoda siempre es mejor utilizada.</p>


            </div>
            <div class='col l3 s12'>
            <h5 class='white-text'>Enlaces</h5>
            <ul>
                <li><a class='white-text' href='#!'>Nosotros</a></li>
                <li><a class='white-text' href='#!'>Productos</a></li>
                <li><a class='white-text' href='#!'>Contacto</a></li>
            </ul>
            </div>
            <div class='col l3 s12'>
            <h5 class='white-text'>Connect</h5>
            <ul>
                <li><a class='white-text' href='#!'>Link 1</a></li>
                <li><a class='white-text' href='#!'>Link 2</a></li>
                <li><a class='white-text' href='#!'>Link 3</a></li>
                <li><a class='white-text' href='#!'>Link 4</a></li>
            </ul>
            </div>
        </div>
        </div>
        <div class='footer-copyright'>
        <div class='container'>
        Desarrollado por: <a target='_blank' class='orange-text text-lighten-3' href='https://www.visualcv.com/daniel-nava-martinez/pdf'>Daniel Nava Martínez</a>
        </div>
        </div>
    </footer>

    <!--  Scripts-->
    <script src='https://code.jquery.com/jquery-2.1.1.min.js'></script>
    <script src='js/materialize.js'></script>
    <script src='js/init.js'></script>
    <script>$('.dropdown-button').dropdown();</script>
    <script>
        $(document).ready(function(){
            $('.modal').modal();
            $('.collapsible').collapsible();
            $('.carousel').carousel({dist:0,
                shift:0,
                padding:20,});
            $('.slider').slider({indicators:false, height: 540});
            $('.materialboxed').materialbox();
            $('select').material_select();
                   
        });
        autoplay()   
        function autoplay() {
            $('.carousel').carousel('next');
            setTimeout(autoplay, 1600);
        }
    </script>

    ";
?>