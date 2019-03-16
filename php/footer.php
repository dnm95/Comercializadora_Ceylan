<?php
  echo"
    <footer class='page-footer blue-grey darken-1'>
      <div class='footer-copyright'>
        <div class='container center-align'>
          <a href='index.php'>© 2018 Comercializadora Ceylán </a>•
          <a href='privacy.php'>Política de Privacidad </a>•
          <a href='cookies.php'>Política de Cookies</a>
        </div>
      </div>
  </footer>

  <!--  Scripts-->
  <script src='https://code.jquery.com/jquery-2.1.1.min.js'></script>
  <script src='/js/materialize.js'></script>
  <script src='/js/init.js'></script>
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