<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Agregar Producto</title>

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
                <a href="addProduct.php" class="breadcrumb">Agregar Producto</a>
            </div>
        </div>
  </nav>

  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
        <div class="row center">
            <h3 class="header col s12 light">Agregar Productos</h3>
        </div>

      <div class="row">

        <div class="clearfix"></div>
        <div class="blank-space-10"></div>
        
        <form class="col s12" method="POST" action="php/insertProduct.php">
            <div class="row">

                <div class="input-field col s12">
                    <input id="idProducto" name="idProducto" type="number" class="validate" autocomplete='off' required>
                    <label for="idProducto">idProducto</label>
                </div>
                <div class="clearfix"></div>
                <div class="blank-space-30"></div>
                
                <div class="input-field col s12">
                    <select name="categories">
                        <option value="" disabled selected>Seleccionar Categoría</option>
                        <?php require 'php/connection.php'; generateCategoriesOptions($conn) ?>
                    </select>
                </div>
                <div class="clearfix"></div>
                <div class="blank-space-30"></div>

                <div class="input-field col s12">
                    <input id="nombre" name="nombre" type="text" class="validate" autocomplete='off' required>
                    <label for="nombre">Nombre</label>
                </div>
                <div class="clearfix"></div>
                <div class="blank-space-30"></div>

                <div class="input-field col s12">
                    <textarea id="descripcion" name="descripcion" class="materialize-textarea" required></textarea>
                    <label for="descripcion">Descripción</label>
                </div>
                <div class="clearfix"></div>
                <div class="blank-space-30"></div>

                <div class="input-field col s12">
                    <input id="tallas" name="tallas" type="text" class="validate" autocomplete='off'>
                    <label for="tallas">Tallas</label>
                </div>
                <div class="clearfix"></div>
                <div class="blank-space-30"></div>

                <div class="input-field col s12">
                    <input id="imagen" value="images/category/" name="imagen" type="text" class="validate" autocomplete='off' required>
                    <label for="imagen">URL Imagen</label>
                </div>
                <div class="clearfix"></div>
                <div class="blank-space-30"></div>

                <div class="input-field col s12">
                    <select name="brands">
                        <option value="" disabled selected>Seleccionar Marca</option>
                        <?php generateBrandsOptions($conn) ?>
                    </select>
                </div>
                <div class="clearfix"></div>
                <div class="blank-space-30"></div>

                <div class="input-field col s12">
                    <input id="pdf" name="pdf" type="text" class="validate" autocomplete='off'>
                    <label for="pdf">URL PDF</label>
                </div>
                <div class="clearfix"></div>
                <div class="blank-space-30"></div>

                <div class="input-field col s12">
                    <input id="media" name="media" type="text" class="validate" autocomplete='off'>
                    <label for="media">Media</label>
                </div>
                <div class="clearfix"></div>
                <div class="blank-space-30"></div>

                <button type="submit" name="action" class="waves-effect waves-light btn light-blue darken-2 right">Agregar</button>
            </div>
        </form>
      </div>

    </div>
  </div>

  <?php $conn->close(); ?>

  <?php include ('php/footer.php'); ?>

  </body>
</html>
