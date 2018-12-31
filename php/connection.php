<?php

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "comercializadora_ceylan";

  //Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $acentos = $conn->query("SET NAMES 'utf8'");

function getBrands($conn, $idCat) {
  //GET ALL PRODUCTS FROM THE CATEGORY
  $sql = "SELECT DISTINCT * FROM productos WHERE Categoria_idCategoria='".$idCat."' AND Marca_idMarca IS NOT NULL";
  $result = $conn->query($sql);
  $brands_BD = [];

  if ($result->num_rows != 0) {
      while($row = $result->fetch_assoc()) {
          array_push($brands_BD,$row['Marca_idMarca']);
      }
  }

  //DELETE REPEATED VALUES
  $brand_unique = array_unique($brands_BD);
  $aux_array = array();

  //DELETING EMPTY POSITIONS FROM DE ARRAY AND MOVING TO AN AUX
  for($c=0; $c<=count($brand_unique); $c++) {
    if(isset($brand_unique[$c])) {
      array_push($aux_array,$brand_unique[$c]);
    }
  }

  $sql_aux = "";    

  //CREATE THE AUXILIAR QUERY
  for($c=0; $c<count($aux_array); $c++) {      
    if($c == count($aux_array)- 1) {
      $sql_aux.="idMarca =".$aux_array[$c]."";    
      break;
    }

    $sql_aux.="idMarca =".$aux_array[$c]." OR ";    
  }

  //EXECUTE THE FINAL QUERY FOR GETTING THE BRANDS THAN BELONGS TO THIS CATEGORY
  $sql = "SELECT * FROM marca WHERE ";
  $sql.=$sql_aux;

  $result = $conn->query($sql);
  if ($result->num_rows != 0) {
    while($row = $result->fetch_assoc()) {
      echo"<p>";
        echo"<input type='checkbox' class='filled-in' id='".$row['Nombre']."' name='".$row['idMarca']."' onchange='filterBrand(this)' />";
        echo"<label for='".$row['Nombre']."'>".$row['Nombre']."</label>";
      echo"</p>";
    }
  }
}

function getBrandsForDisplay($conn) {
  $sql = "SELECT * FROM marca ORDER BY Nombre ASC";
  $result = $conn->query($sql);

  if ($result->num_rows != 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo"<div class='col s12 m6 l3 product-list'>";
        echo "<a href='products/viewBrand.php?brand=".$row['idMarca']."' class='waves-effect waves-light btn-large btn-brand cyan darken-3'>".$row['Nombre']."</a>";
      echo "</div>";
    }
  }
}

function getBrandRef($idBrand, $conn)
{
  $sql = "SELECT * FROM marca WHERE idMarca= '" .$idBrand."'";
  $result = $conn->query($sql);
  
  if ($result->num_rows != 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo"<a class='breadcrumb' id='brandName' href='viewBrand.php?brand=".$idBrand."'>".$row['Nombre']."</a>";
      echo "<script>document.title = '".$row['Nombre']."';</script>";
    }
  }
}

function getTotalProductsByBrand($idBrand, $conn) {
  $sql = "SELECT COUNT(*) as total FROM productos WHERE Marca_idMarca= '" .$idBrand."'";
  $result = $conn->query($sql);

  if ($result->num_rows != 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo"<div class='col s12 m6 l8' id='products-count'>";
        echo "<span class='products-results'>" .$row["total"]. " productos</span>";
      echo"</div>";
    }
  } else {
    echo "0 results";
  }
}

function searchBrandProducts($idBrand, $conn) {
  $sql = "SELECT * FROM productos WHERE Marca_idMarca= '" .$idBrand."' ORDER BY Nombre ASC";
  $result = $conn->query($sql);

  if ($result->num_rows != 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo"<div class='col s12 m6 l3 product-list'>";
        echo"<div class='card'>";
          echo"<div class='card-image'>";
            echo"<a href='viewProduct.php?id=" .$row['idProductos']. "'> <img src='".$row['Imagen']."'></a>";
          echo"</div>";
          echo"<div class='card-content center-align'>";
            echo"<span class='card-title activator grey-text text-darken-4 truncate'>" .$row['Nombre']. "</span>";
            echo"<p><a class='waves-effect waves-light btn blue-grey darken-1' href='viewProduct.php?id=" .$row['idProductos']. "'>Ver Producto</a></p>";
          echo"</div>";
        echo"</div>";
      echo"</div>";
    }
  }
}

function getCategories($conn) {
  $sql = "SELECT * FROM categoria ORDER BY Nombre ASC";
  $result = $conn->query($sql);

  if ($result->num_rows != 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo"<div class='col s12 m6 l3 product-list'>";
        echo"<div class='card'>";
          echo"<div class='card-image'>";
            echo"<a href='products/" .$row['URL']."'><img src='".$row['imagen']."'></a>";
          echo"</div>";
          echo"<div class='card-content center-align'>";
            echo"<span class='card-title grey-text text-darken-4 truncate'>" .$row['Nombre']. "</span>";
            echo"<p><a class='waves-effect waves-light btn blue-grey darken-1' href='products/" .$row['URL']."'>Ver Categoría</a></p>";
          echo"</div>";
        echo"</div>";
      echo"</div>";
    }
  }
}

function getTotalCategories($conn) {
  $sql = "SELECT COUNT(*) as total FROM categoria";
  $result = $conn->query($sql);

  if ($result->num_rows != 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo"<div class='col s12 m6'>";
        echo "<span class='products-results'>" .$row["total"]. " categorías</span>";
      echo"</div>";
    }
  } else {
      echo "0 results";
  }
}

function getCategoryByProduct($idProduct, $conn) {
  $sql = "SELECT * FROM productos WHERE idProductos= '" .$idProduct."'";
  $result = $conn->query($sql);

  if ($result->num_rows != 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $idCat  = $row["Categoria_idCategoria"];
      $nomProduct = $row["Nombre"];
    }
  }

  $sql = "SELECT * FROM categoria WHERE idCategoria= '" .$idCat."'";
  $result = $conn->query($sql);
  if ($result->num_rows != 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo"<a class='breadcrumb' href='".$row['URL']."'>".$row['Nombre']."</a>";
    }
  }

  echo"<a class='breadcrumb' href='viewProduct.php?id=".$idProduct."'>".$nomProduct."</a>";
}

function searchCategoyById($idCategory, $conn) {
  $sql = "SELECT * FROM categoria WHERE idCategoria= '" .$idCategory."' ";
  $result = $conn->query($sql);

  if ($result->num_rows != 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo "<h2>" .$row["Nombre"]. "</h2>";
    }
  } else {
    echo "0 results";
  }
}

function searchCategoryProducts($idCategory, $conn) {
  $sql = "SELECT * FROM productos WHERE Categoria_idCategoria= '" .$idCategory."' ORDER BY Nombre ASC";
  $result = $conn->query($sql);

  if ($result->num_rows != 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo"<div class='col s12 m6 l3 product-list'>";
        echo"<div class='card'>";
          echo"<div class='card-image'>";
            echo"<a href='viewProduct.php?id=" .$row['idProductos']. "'> <img src='".$row['Imagen']."'></a>";
          echo"</div>";
          echo"<div class='card-content center-align'>";
            echo"<span class='card-title activator grey-text text-darken-4 truncate'>" .$row['Nombre']. "</span>";
            echo"<p><a class='waves-effect waves-light btn blue-grey darken-1' href='viewProduct.php?id=" .$row['idProductos']. "'>Ver Producto</a></p>";
          echo"</div>";
        echo"</div>";
      echo"</div>";
    }
  }
}

function getCategoriesForFilter($conn,$idBrand) {
  //GET ALL PRODUCTS FROM THE BRAND
  $sql = "SELECT DISTINCT * FROM productos WHERE Marca_idMarca='".$idBrand."'";
  $result = $conn->query($sql);
  $categories_BD = [];

  if ($result->num_rows != 0) {
      while($row = $result->fetch_assoc()) {
          array_push($categories_BD,$row['Categoria_idCategoria']);
      }
  }

  //DELETE REPEATED VALUES
  $category_unique = array_unique($categories_BD);
  $aux_array = array();

  //DELETING EMPTY POSITIONS FROM DE ARRAY AND MOVING TO AN AUX
  for($c=0; $c<=count($category_unique); $c++) {
    if(isset($category_unique[$c])) {
      array_push($aux_array,$category_unique[$c]);
    }
  }

  $sql_aux = "";    

  //CREATE THE AUXILIAR QUERY
  for($c=0; $c<count($aux_array); $c++) {
    if($c == count($aux_array)- 1) {
      $sql_aux.="idCategoria =".$aux_array[$c]."";    
      break;
    }
    $sql_aux.="idCategoria =".$aux_array[$c]." OR ";    
  }

  //EXECUTE THE FINAL QUERY FOR GETTING THE BRANDS THAN BELONGS TO THIS CATEGORY
  $sql = "SELECT * FROM categoria WHERE ";
  $sql.=$sql_aux;

  $result = $conn->query($sql);
  if ($result->num_rows != 0) {
      while($row = $result->fetch_assoc()) {
          echo"<p>";
              echo"<input type='checkbox' class='filled-in' id='".$row['Nombre']."' name='".$row['idCategoria']."' onchange='filterCategory(this)' />";
              echo"<label for='".$row['Nombre']."'>".$row['Nombre']."</label>";
          echo"</p>";
      }
  }
}

function getNextIdProduct($conn) {
  $sql = "SELECT MAX(idProductos) as id FROM productos";
  $result = $conn->query($sql);
  if ($result->num_rows != 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $newId = $row['id'] + 1;
    }
}

  echo " <script>
    document.getElementById('idProducto').value = '".$newId."'
  </script>";
}

function getProductInfo($idProduct,$conn) {   
  //GET IDCATEGORY, IDBRAND  FROM PRODUCT TABLE
  $sql = "SELECT * FROM productos WHERE idProductos= '" .$idProduct."'";
  $result = $conn->query($sql);
  if ($result->num_rows != 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $idCategory = $row['Categoria_idCategoria'];
      $idMarca = $row['Marca_idMarca'];
    }
  }

  //GET CATEGORY NAME
  $sql = "SELECT * FROM categoria WHERE idCategoria= '" .$idCategory."'";
  $result = $conn->query($sql);
  if ($result->num_rows != 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $categoryName = $row['Nombre'];
    }
  }

  //GET BRAND NAME
  $sql = "SELECT * FROM marca WHERE idMarca= '" .$idMarca."'";
  $result = $conn->query($sql);
  if ($result->num_rows != 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $brandName = $row['Nombre'];
    }
  }

  //FINALLY GET PRODUCT INFO
  $sql = "SELECT * FROM productos WHERE idProductos= '" .$idProduct."'";
  $result = $conn->query($sql);

  if ($result->num_rows != 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo "<script>document.title = '".$row['Nombre']."';</script>";
      echo "<div class='row product-container'>";
        echo "<div class='col s12 m6 l5 center-align'>";
          echo "<img class='materialboxed center-image responsive-img' src='".$row['Imagen']."'>";
          echo "<div class='social facebook'>";
              echo "<a href=''><i class='fab fa-facebook'></i></a>";
          echo "</div>";
          echo "<div class='social twitter'>";
              echo "<a href=''><i class='fab fa-twitter-square'></i></a>";
          echo "</div>";
          echo "<div class='social whatsapp'>";
              echo "<a href=''><i class='fab fa-whatsapp-square'></i></a>";
          echo "</div>";
          echo "<div class='social mail'>";
              echo "<a href=''><i class='fas fa-envelope-square'></i></a>";
          echo "</div>";
        echo "</div>";

        echo "<div class='col s12 m6 l7 product-info'>";
          echo"<h4>".$row['Nombre']."</h4>";
          echo "<div class='available'>";
            echo "<div class='chip green white-text'>Disponible</div>";
              if($row['Tallas']!= NULL && $row['Tallas']!="") {
                echo "<span class='info-text'>Tallas: ".$row['Tallas'].".</span>";
              }
              echo"<p class='info-text'>Marca: ".$brandName."</p>";
            echo "</div>";
            echo "<div class='product-description'>";
              echo "<p class='info-text'>Descripción: ".$row['Descripcion']."</p>";
              if($row['PDF'] != NULL) {
                echo "<div class='pdf-file pdf valign-wrapper'>";
                  echo "<a target='_blank' href='".$row['PDF']."'><i class='fas fa-file-pdf'></i></a>";
                  echo "<span>Ficha Ténica</span>";
                echo "</div>";
              }

              echo "<div class='quotation'>";
                echo "<!-- <a href='quotation.php?p=".$row['Nombre']."' class='waves-effect waves-light btn blue-grey darken-1 right'>Cotizar Producto <i class='material-icons right'>playlist_add_check</i></a> -->";
              echo "</div>";

            echo "</div>";
          echo "</div>";
        echo "</div>";
    }
  }
}

function getTotalProductsByCategory($idCategory, $conn) {
  $sql = "SELECT COUNT(*) as total FROM productos WHERE Categoria_idCategoria= '" .$idCategory."'";
  $result = $conn->query($sql);

  if ($result->num_rows != 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo"<div class='col s12 m6 l8' id='products-count'>";
        echo "<span class='products-results'>" .$row["total"]. " productos</span>";
      echo"</div>";
    }
  } else {
    echo "0 results";
  }
}

function getRandomProducts($idProduct, $conn) {
  $sql = "SELECT * FROM productos WHERE idProductos= '" .$idProduct."'";
  $result = $conn->query($sql);

  if ($result->num_rows != 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $idCat  = $row["Categoria_idCategoria"];
    }
  }

  $sql = "SELECT * FROM productos WHERE Categoria_idCategoria= '" .$idCat."' AND idProductos != '".$idProduct."' ORDER BY RAND() LIMIT 3";
  $result = $conn->query($sql);
  if ($result->num_rows != 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo"<div class='col s12 m6 l4 product-list'>";
        echo"<div class='card'>";
          echo"<div class='card-image'>";
            echo"<a href='viewProduct.php?id=" .$row['idProductos']. "'> <img src='".$row['Imagen']."'></a>";
          echo"</div>";
          echo"<div class='card-content center-align'>";
            echo"<span class='card-title activator grey-text text-darken-4 truncate'>" .$row['Nombre']. "</span>";
            echo"<p><a class='waves-effect waves-light btn blue-grey darken-1' href='viewProduct.php?id=" .$row['idProductos']. "'>Ver Producto</a></p>";
          echo"</div>";
        echo"</div>";
      echo"</div>";            
    }
  }
}

function validateProduct($productName,$conn) {
  $sql = "SELECT * FROM productos WHERE Nombre= '" .$productName."'";
  $result = $conn->query($sql);

  if ($result->num_rows != 0) {
    return true;
  }
  else{
    return false;
  }
}

function generateCategoriesOptions($conn) {
  $sql = "SELECT * FROM categoria ORDER BY Nombre ASC";
  $result = $conn->query($sql);

  if ($result->num_rows != 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo"<option value='".$row['idCategoria']."'>".$row['Nombre']."</option>";
    }
  }
}

function generateBrandsOptions($conn) {
  $sql = "SELECT * FROM marca ORDER BY Nombre ASC";
  $result = $conn->query($sql);

  if ($result->num_rows != 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo"<option value='".$row['idMarca']."'>".$row['Nombre']."</option>";
    }
  }
}

?>