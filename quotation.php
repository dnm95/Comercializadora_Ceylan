<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Cotización</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="css/styles.css"/>
</head>
<body>
  
  <?php include ('php/navbar.php'); ?>
  <?php
      require 'php/connection.php';
  ?>

  <!-- BREADCRUMB MENU -->
  <nav class="breadcrumb-menu blue-grey lighten-1">
        <div class="nav-wrapper">
            <div class="col s12">
                <a href="index.php" class="breadcrumb">Inicio</a>
                <a href="cotizacion.php" class="breadcrumb">Cotización</a>
            </div>
        </div>
  </nav>

  <?php
    if(isset($_GET['p']) && $_GET['p'] != ""){
        $producto = $_GET['p'];
        $flag = validateProduct($producto,$conn);

        if(!$flag){
            echo "<script>alert('El producto a cotizar no está disponible :(');
              window.location.href='categories.php';</script>";
        }
    }
    else{
        echo "<script>alert('Debes seleccionar un producto previamente para realizar una cotización');
              window.location.href='categories.php';</script>";
    }
   ?>

  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
        <div class="row center">
            <h2 class="header col s12 light">Cotización</h2>
        </div>

      <div class="row">
        <div class="clearfix"></div>
        <div class="blank-space-10"></div>
        <form class="col s12">
            <div class="row">
                <div class="input-field col s12">
                    <input id="name" name="nombre" type="text" class="validate" autocomplete='off' required>
                    <label for="name">Nombre</label>
                </div>
                <div class="clearfix"></div>
                <div class="blank-space-30"></div>

                <div class="input-field col s12">
                    <input id="email" name="correo" type="email" class="validate" autocomplete='off' required>
                    <label for="email">Email</label>
                </div>
                <div class="clearfix"></div>
                <div class="blank-space-30"></div>

                <div class="input-field col s12">
                    <input disabled id="product" name="nombre_producto" type="text" class="validate" autocomplete='off' required>
                    <label for="product">Producto</label>
                </div>
                <div class="clearfix"></div>
                <div class="blank-space-30"></div>

                <div class="input-field col s12">
                    <input id="quantity" name="cantidad" type="number" class="validate" autocomplete='off' required>
                    <label for="quantity">Cantidad</label>
                </div>
                <div class="clearfix"></div>
                <div class="blank-space-30"></div>

                <div class="input-field col s12">
                    <input id="sizes" name="tallas" type="text" class="validate" autocomplete='off'>
                    <label for="sizes">Talla(s)</label>
                </div>
                <div class="clearfix"></div>
                <div class="blank-space-30"></div>

                <div class="input-field col s12">
                    <textarea id="note" name="nota" class="materialize-textarea"></textarea>
                    <label for="note">Información Adicional</label>
                </div>
                <div class="clearfix"></div>
                <div class="blank-space-30"></div>

                <button type="submit" name="action" class="waves-effect waves-light btn light-blue darken-2 right">Enviar <i class="material-icons right">send</i></button>
            </div>
        </form>
      </div>

    </div>

  </div>

  <?php $conn->close(); ?>

  <?php include ('php/footer.php'); ?>

  <script>
      document.getElementById("product").value = "<?php echo $producto; ?>"
  </script>
  </body>
</html>
