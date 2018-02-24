<!DOCTYPE html>
<html lang="es">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Comercializadora Ceylan</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/styles.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
  
  <?php include 'navbar.php'; ?>

    <div class="row">
        <div class="col s12">
            <?php
            require 'php/connection.php';

            $idCategory = intval($_GET['cat']);
            
            //Get Category Name
            searchCategoyById($idCategory, $conn);

            echo "<hr>";
            
            
            ?>
        </div>
    </div>

    <div class="row">
        <?php
        //Get Category Products
        searchCategoryProducts($idCategory, $conn);
        ?>
    </div>

  <?php $conn->close(); ?>
  <?php include 'footer.php'; ?>

  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
  <script>$(".dropdown-button").dropdown();</script>

  </body>
</html>
