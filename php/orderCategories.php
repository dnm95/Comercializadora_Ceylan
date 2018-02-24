<?php
    require 'connection.php';

    $selectOption = intval($_GET['orderFilter']);

    if($selectOption == 1)
    {
        $sql = "SELECT * FROM categoria ORDER BY Nombre ASC";    
    }

    if($selectOption == 2)
    {
        $sql = "SELECT * FROM categoria ORDER BY Nombre DESC";    
    }

    $result = $conn->query($sql);

    $resultHTML = "";

    if ($result->num_rows != 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $resultHTML.="<div class='col s12 m6 l3 product-list'>";
                $resultHTML.="<div class='card'>";
                    $resultHTML.="<div class='card-image'>";
                        $resultHTML.="<a href='" .$row['URL']."'><img src='".$row['imagen']."'></a>";
                    $resultHTML.="</div>";
                    $resultHTML.="<div class='card-content center-align'>";
                        $resultHTML.="<span class='card-title grey-text text-darken-4 truncate'>" .$row['Nombre']. "</span>";
                        $resultHTML.="<p><a class='waves-effect waves-light btn' href='" .$row['URL']."'>Ver Productos</a></p>";
                    $resultHTML.="</div>";
                $resultHTML.="</div>";
            $resultHTML.="</div>";
        }
    }

    $conn->close();
    echo $resultHTML;
?>