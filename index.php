<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Comercializadora Ceylan</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="css/styles.css"/>
</head>
<body>
  
  <?php include ('php/navbar.php'); ?>

  <div class="slider">
    <ul class="slides">
      <li>
        <img src="images/slider/people-3047306_1920.jpg"> <!-- random image -->
        <div class="caption center-align">
          <h2>Comercializadora Ceylán</h2>
          <h4 class="light grey-text text-lighten-3">Expertos en equipo de seguridad.</h4>
          <div class="row">
            <a href="categories.php" class="btn-large waves-effect waves-light blue-grey darken-1">Ver Productos</a>
          </div>
        </div>
      </li>
    </ul>
  </div>

  <div class="container">
    <div class="section">
      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center light-blue-text"><i class="material-icons yellow-text">grade</i></h2>
            <h5 class="center">Más de 20 años de experiencia</h5>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center light-blue-text"><i class="material-icons green-text">check</i></h2>
            <h5 class="center">Comercializamos las mejores marcas</h5>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center light-blue-text"><i class="material-icons grey-text">accessibility</i></h2>
            <h5 class="center">La mejor atención al cliente</h5>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php include ('php/brandCarousel.php'); ?>
  <?php include ('php/footer.php'); ?>

  </body>
</html>
