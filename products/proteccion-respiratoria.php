<!DOCTYPE html>
<html lang="es">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Protección Respiratoria</title>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="../css/styles.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
  
    <?php include ('../php/navbar.php'); ?>

    <!-- BREADCRUMB MENU -->
    <nav class="breadcrumb-menu blue-grey lighten-1">
        <div class="nav-wrapper">
            <div class="col s12">
                <a href="index.php" class="breadcrumb">Inicio</a>
                <a href="proteccion-respiratoria.php" class="breadcrumb">Protección Respiratoria</a>
            </div>
        </div>
    </nav>

    <div class="clearfix"></div>

    <!-- DISPLAY PRODUCTS FOR THE CATEGORY -->
    <div class="row category-detail">
        <!-- FILTER FOR DE PRODUCTS -->
        <div class="col s12 m4 l3">

            <h5 class="bold">Filtrar por</h5>
            <hr>
            
                <ul class="collapsible" data-collapsible="accordion">
                    <li>
                        <div class="collapsible-header active">
                            <i class="material-icons">add</i>
                            Marca
                        </div>
                        <div class="collapsible-body">
                            <form id="checkboxes">
                                <?php
                                require '../php/connection.php';
                                $idCategory = 10;
                                getBrands($conn,$idCategory)
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
                    <h5 class="bold">Protección Respiratoria</h5>
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
                getTotalProductsByCategory($idCategory, $conn)
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
            searchCategoryProducts($idCategory, $conn);
            echo"</div>";
            ?>

        </div>

    </div>

  <?php $conn->close(); ?>

  <script>
    function orderProducts(str) {
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
            xmlhttp.open("GET","../php/orderProducts.php?cat=10&orderFilter="+str,true);
            xmlhttp.send();
        }
    }

  </script>

  <script>
    function filterBrand(str) {
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
        xmlhttp.open("GET","../php/filterProducts.php?cat=10&filters="+selected,true);
        xmlhttp.send();
    }

  </script>

  <?php include ('../php/footer.php'); ?>

  </body>
</html>
