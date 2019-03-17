<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Contacto</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="css/styles.css"/>
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-136393239-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-136393239-1');
  </script>
</head>
<body>
  
  <?php include ('php/navbar.php'); ?>

  <!-- BREADCRUMB MENU -->
  <nav class="breadcrumb-menu blue-grey lighten-1">
    <div class="nav-wrapper">
      <div class="col s12">
        <a href="index.php" class="breadcrumb">Inicio</a>
        <a href="contacto.php" class="breadcrumb">Contacto</a>
      </div>
    </div>
  </nav>

  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <div class="row center">
        <h3 class="header col s12 light">Contactános</h3>
      </div>

      <div class="row">
        <div class="col s6">
          <div class="row">
            <p class="address">Comercializadora Ceylán</p>
            <p>Calle Chetumal 1-A, col. Valle Ceylán, Tlalnepantla de Baz, Edo. de México, México.</p>
            <a href="https://goo.gl/maps/F4xYtNYmpsC2" target="_blank" class="waves-effect waves-light btn light-blue darken-2 left">Ver dirección <i class="material-icons right">place</i></a>
            <div class="clearfix"></div>
            <p class="phone-numbers">Teléfonos de Contacto</p>
            <p><a href="tel:+525510837782">(55) 1083-7782</a></p>
            <p><a href="tel:+525510837783">(55) 1083-7783</a></p>
          </div>
        </div>
        <div class="col s6">
          <form class="">
            <div class="row">
              <div class="input-field col s12">
                <input id="name" type="text" class="validate" autocomplete='off' required>
                <label for="name">Nombre</label>
              </div>
              <div class="clearfix"></div>
              <div class="blank-space-30"></div>
              <div class="input-field col s12">
                <input id="email" type="email" class="validate" autocomplete='off' required>
                <label for="email">Email</label>
              </div>
              <div class="clearfix"></div>
              <div class="blank-space-30"></div>
              <div class="input-field col s12">
                <textarea id="message" class="materialize-textarea" required></textarea>
                <label for="message">Mensaje</label>
              </div>
              <button type="submit" disabled name="action" class="waves-effect waves-light btn light-blue darken-2 right">Enviar <i class="material-icons right">send</i></button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <?php include ('php/brandCarousel.php'); ?>
  <?php include ('php/footer.php'); ?>

  </body>
</html>
