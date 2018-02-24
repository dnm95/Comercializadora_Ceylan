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
        <p class="contact-message center">Puedes enviarnos un mensaje, duda, comentario o sugerencia a tráves del siguiente formulario:</p>
        <div class="clearfix"></div>
        <div class="blank-space-10"></div>
        <form class="col s12">
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">account_circle</i>
                    <input id="name" type="text" class="validate" autocomplete='off' required>
                    <label for="name">Nombre</label>
                </div>
                <div class="clearfix"></div>
                <div class="blank-space-30"></div>
                <div class="input-field col s12">
                    <i class="material-icons prefix">email</i>
                    <input id="email" type="email" class="validate" autocomplete='off' required>
                    <label for="email">Email</label>
                </div>
                <div class="clearfix"></div>
                <div class="blank-space-30"></div>
                <div class="input-field col s12">
                    <i class="material-icons prefix">message</i>
                    <textarea id="message" class="materialize-textarea" required></textarea>
                    <label for="message">Mensaje</label>
                </div>
                <button type="submit" name="action" class="waves-effect waves-light btn light-blue darken-2 right">Enviar <i class="material-icons right">send</i></button>
            </div>
        </form>
      </div>

      <div class="row">
        <div class="row center">
            <h3 class="header col s12 light">Teléfonos</h3>
        </div>
        <div class="row center">
            <p class="atention">Horario de atención teléfonica de 9:00am a 18:30pm.</p>
            <div class="center-align">
                <i class="small material-icons icon-green">local_phone</i>
                <span class="phone-number">(55) 1083-7782</span>
            </div>
            <div class="center-align">
                <i class="small material-icons icon-green">local_phone</i>
                <span class="phone-number">(55) 1083-7783</span>
            </div>
            <div class="clearfix"></div>
            <div class="blank-space-20"></div>
            <div class="center-align">
                <a href="tel:+5510837782" class="waves-effect waves-light btn green darken-2">Llámanos <i class="material-icons left">phone</i></a>
            </div>
        </div>
      </div>

      <div class="clearfix"></div>
      <div class="blank-space-50"></div>

      <div class="row">
        <div class="row center">
            <h3 class="header col s12 light">Ubicación</h3>
        </div>
        <div class="row center">
            <p class="atention">Horario de atención en sucursal de 9:00am a 18:00pm. Dirección: calle Chetumal 1-A, col. Valle Ceylán, Tlalnepantla de Baz, Edo. de México, México, C.P. 54150. </p>
        </div>
        <div class="row google-maps">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d940.0242676801788!2d-99.17582557083651!3d19.537445663064933!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d1f7ee2794a2ef%3A0xba4589e665396c65!2sCalle+Chetumal+1%2C+Hab+Valle+Ceylan%2C+54150+Tlalnepantla%2C+M%C3%A9x.!5e0!3m2!1ses-419!2smx!4v1519254516114" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
        <div class="row center">
        <a href="https://goo.gl/maps/3cLvx24Enu22" target="_blank" class="waves-effect waves-light btn red lighten-1">Visítanos<i class="material-icons left">location_on</i></a>
        </div>
      </div>

    </div>
  </div>

  <div class="carousel">
    <a class="carousel-item" href="#one!"><img src="images/brands/JYRSA.png"></a>
    <a class="carousel-item" href="#two!"><img src="images/brands/UVEX.jpg"></a>
    <a class="carousel-item" href="#three!"><img src="images/brands/Ansell-logo.jpg"></a>
    <a class="carousel-item" href="#four!"><img src="images/brands/MOLDEX.png"></a>
    <a class="carousel-item" href="#five!"><img src="images/brands/bylack.jpg"></a>
    <a class="carousel-item" href="#six!"><img src="images/brands/berrendo.jpg"></a>
    <a class="carousel-item" href="#seven!"><img src="images/brands/msa.jpg"></a>
    <a class="carousel-item" href="#eight!"><img src="images/brands/dupont.png"></a>
    <a class="carousel-item" href="#eight!"><img src="images/brands/riverline.jpg"></a>
  </div>

  <?php include ('php/footer.php'); ?>

  </body>
</html>
