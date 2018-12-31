<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Categorías</title>

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
        <a href="categories.php" class="breadcrumb">Categorías</a>
      </div>
    </div>
  </nav>

  <div class="row category-detail">
    <!-- CATEGORIES LIST -->
    <div class="col s12 m8 l12">
      <div class="valign-wrapper">
        <div class="col s12 m6 l9">
          <h3 class="bold">Categorías</h3>
        </div>

        <div class="col s12 m6 l3 order-filters">
          <form>
            <select class="browser-default z-depth-2" name="orderFilter" onchange="orderCategories(this.value)">
              <option value="" disabled selected>Ordenar</option>
              <option value="1">Ascendente</option>
              <option value="2">Descendente</option>
            </select>
          </form>
        </div>
      </div>

      <?php
        require 'php/connection.php';
        getTotalCategories($conn)
      ?>
      <div class="clearfix"></div>
            
      <!--- LOADER FOR AJAX REQUEST -->
      <div class="col s12 center-align loader hide" id="loader">
        <div class="preloader-wrapper big active">
          <div class="spinner-layer spinner-blue-only">
            <div class="circle-clipper left">
              <div class="circle"></div>
            </div>
            <div class="gap-patch">
              <div class="circle"></div>
            </div>
            <div class="circle-clipper right">
              <div class="circle"></div>
            </div>
          </div>
        </div>
      </div>
      <div id="category-list">
        <?php
          getCategories($conn)
        ?>
      </div>
    </div>
  </div>

  <div class="blank-space"></div>

  <?php $conn->close(); ?>

  <script>
    function orderCategories(str) {
      if (str == "") {
        document.getElementById("category-list").innerHTML = "";
        return;
      } else {
        if (window.XMLHttpRequest) {
          // code for IE7+, Firefox, Chrome, Opera, Safari
          xmlhttp = new XMLHttpRequest();
          document.getElementById("category-list").innerHTML = "";
          document.getElementById("loader").classList.remove("hide");
        } else {
          // code for IE6, IE5
          xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
          }
          xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              document.getElementById("loader").classList.add("hide");
              document.getElementById("category-list").innerHTML = this.responseText;
            }
          };
          xmlhttp.open("GET","php/orderCategories.php?orderFilter="+str,true);
          xmlhttp.send();
        }
    }
  </script>

  <?php include ('php/footer.php'); ?>

  </body>
</html>