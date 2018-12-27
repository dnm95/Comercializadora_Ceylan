<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Ver Producto</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="../css/styles.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  
  <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>

</head>
<body>
  
  <?php include ('../php/navbar.php'); ?>
  <?php
      require '../php/connection.php';
  ?>

  <!-- BREADCRUMB MENU -->
  <nav class="breadcrumb-menu blue-grey lighten-1">
        <div class="nav-wrapper">
            <div class="col s12">
                <a href="../index.php" class="breadcrumb">Inicio</a>
                <?php
                  $idProduct = intval($_GET['id']);
                  getCategoryByProduct($idProduct, $conn)
                ?>
            </div>
        </div>
  </nav>

  <div class="container">
   
    <?php
      getProductInfo($idProduct, $conn);
    ?>

    <div class="clearfix"></div>

    <div class="blank-space-50"></div>

    <h5>Productos Relacionados</h5>
    <hr>
    <div class="row">
      <?php
        getRandomProducts($idProduct,$conn);
      ?>
    </div>


  </div>

  <div class="blank-space"></div>

  <?php $conn->close(); ?>

  <?php include ('../php/footer.php'); ?>

  </body>
</html>
