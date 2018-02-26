<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Marcas</title>

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
            <a href="brands.php" class="breadcrumb">Marcas</a>
        </div>
    </div>
  </nav>


    <div class="row">
        <div class="row center">
            <h2 class="header col s12 light">Marcas</h2>
        </div>
        <div class="row center about-text">
            <p class="brand-info">Tras más de 20 años en el mercado nos hemos hecho distribuidores de las mejores marcas de equipo de seguridad para el trabajador.</p>
        </div>
        <div id="category-list">
            <?php
            require 'php/connection.php';
            getBrandsForDisplay($conn)
            ?>
        </div>
    </div>

    <div class="blank-space"></div>

    <?php $conn->close(); ?>

  <?php include ('php/footer.php'); ?>

  </body>
</html>