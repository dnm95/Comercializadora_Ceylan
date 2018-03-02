<?php
    require 'connection.php';

    $idBrand = intval($_GET['brand']);
    $json = $_GET['filters'];
    $myDataArray = json_decode($json,true);

    $resultHTML = "";

    //CHECK IF THERE ARE FILTER VALUES
    if(empty($myDataArray))
    {
        searchCategoryProducts($idCategory, $conn);
    }
    else
    {
        $sql = "SELECT * FROM productos WHERE Marca_idMarca=".$idBrand." AND ";
        $sql_aux = "";    

        //CREATE THE AUXILIAR QUERY
        for($c=0; $c<count($myDataArray); $c++){

            if($c == count($myDataArray)-1 )
            {
                $sql_aux.="Categoria_idCategoria =".$myDataArray[$c]."";    
                break;
            }

            $sql_aux.="Categoria_idCategoria =".$myDataArray[$c]." OR ";
        }

        //CONCATENATE QUERYS
        $sql.=$sql_aux;  

        //EXECUTE QUERY
        $result = $conn->query($sql);

        if ($result->num_rows != 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $resultHTML.="<div class='col s12 m6 l3 product-list'>";
                    $resultHTML.="<div class='card'>";
                        $resultHTML.="<div class='card-image'>";
                            $resultHTML.="<a href='viewProduct.php?id=" .$row['idProductos']. "'> <img src='".$row['Imagen']."'></a>";
                        $resultHTML.="</div>";
                        $resultHTML.="<div class='card-content center-align'>";
                            $resultHTML.="<span class='card-title grey-text text-darken-4 truncate'>" .$row['Nombre']. "</span>";
                            $resultHTML.="<p><a class='waves-effect waves-light btn' href='viewProduct.php?id=" .$row['idProductos']. "'>Ver Producto</a></p>";
                        $resultHTML.="</div>";
                    $resultHTML.="</div>";
                $resultHTML.="</div>";
            }
        }
    }
    
    $conn->close();
    echo $resultHTML;
?>