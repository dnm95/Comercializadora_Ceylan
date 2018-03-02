<!DOCTYPE html>
<html lang="es">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Ver Marca</title>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="../css/styles.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
  
  <?php include ('../php/navbar_for_products.php'); ?>
  <?php
      require '../php/connection.php';
  ?>

      <!-- BREADCRUMB MENU -->
    <nav class="breadcrumb-menu blue-grey lighten-1">
            <div class="nav-wrapper">
                <div class="col s12">
                    <a href="../index.php" class="breadcrumb">Inicio</a>
                    <a href="../brands.php" class="breadcrumb">Marcas</a>
                    <?php
                    $idBrand = intval($_GET['brand']);
                    getBrandRef($idBrand, $conn)
                    ?>
                </div>
            </div>
    </nav>

    <div class="clearfix"></div>

    <!-- DISPLAY PRODUCTS FOR THE BRAND -->
    <div class="row category-detail">
        <!-- FILTER FOR DE PRODUCTS -->
        <div class="col s12 m4 l3">

            <h5 class="bold">Filtrar por</h5>
            <hr>
            
                <ul class="collapsible" data-collapsible="accordion">
                    <li>
                        <div class="collapsible-header active">
                            <i class="material-icons">add</i>
                            Categoría
                        </div>
                        <div class="collapsible-body">
                            <form id="checkboxes">
                                <?php
                                getCategoriesForFilter($conn,$idBrand)
                                ?>
                            </form>
                        </div>
                    </li>
                </ul>
        </div>
        <!-- PRODUCTS DESCRIPTION -->
        <div class="col s12 m8 l9">

            <div class="valign-wrapper">
                <div class="col s12 m6 l9">
                    <h5 class="bold" id="brandTitle">Calzado de Seguridad</h5>
                    <script>var text= $( "#brandName").text(); document.getElementById("brandTitle").innerHTML = text; </script>
                </div>

                <div class="col s12 m6 l4 order-filters">
                    <form>
                        <select class="browser-default z-depth-1" name="orderFilter" onchange="orderProducts(this.value)">
                            <option value="" disabled selected>Ordenar</option>
                            <option value="1">Ascendente</option>
                            <option value="2">Descendente</option>
                            <option value="3">Lo más nuevo</option>
                        </select>
                    </form>
                </div>
            </div>

            <?php
                getTotalProductsByBrand($idBrand, $conn)
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

            <?php
            echo"<div id='list-products'>";
            searchBrandProducts($idBrand, $conn);
            echo"</div>";
            ?>

        </div>

    </div>

  <?php $conn->close(); ?>

  <script>
    function orderProducts(str) {
        var idBrand = '<?php echo $idBrand; ?>';
        if (str == "") {
            document.getElementById("list-products").innerHTML = "";
            return;
        } else { 
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
                $('input:checkbox').removeAttr('checked');
                document.getElementById("loader").classList.remove("hide");
                document.getElementById("list-products").innerHTML = "";
                document.getElementById("products-count").classList.remove("hide");
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("loader").classList.add("hide");
                    document.getElementById("list-products").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET","../php/orderBrandProducts.php?brand="+idBrand+"&orderFilter="+str,true);
            xmlhttp.send();
        }
    }

  </script>

    <script>
    function filterCategory(str) {
        var idBrand = '<?php echo $idBrand; ?>';
        //Get all checkbox checked
        var selected = [];
        $('#checkboxes input:checked').each(function() {
            selected.push($(this).attr('name'));
        });

        selected = JSON.stringify(selected);

        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
            document.getElementById("list-products").innerHTML = "";
            document.getElementById("loader").classList.remove("hide");
            document.getElementById("products-count").classList.add("hide");
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("loader").classList.add("hide");
                document.getElementById("list-products").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","../php/filterProductsByCategory.php?brand="+idBrand+"&filters="+selected,true);
        xmlhttp.send();
    }

  </script>


  <?php include ('../php/footer_for_products.php'); ?>

  </body>
</html>
