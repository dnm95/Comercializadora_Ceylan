<?php
  require 'connection.php';

  $idProduct = intval($_POST['idProducto']);
  $idCategoria = intval($_POST['categories']);
  $nombre = $_POST['nombre'];
  $descripcion = $_POST['descripcion'];
  $tallas = $_POST['tallas'];
  $imagen = $_POST['imagen'];
  $idMarca = intval($_POST['brands']);
  $pdf = $_POST['pdf'];
  $media = $_POST['media'];

  $sql = "INSERT INTO productos (idProductos, Categoria_idCategoria, Nombre, Descripcion, Tallas, Imagen, Marca_idMarca, PDF, Media) VALUES ('".$idProduct."', '".$idCategoria."', '".$nombre."', '".$descripcion."', '".$tallas."', '".$imagen."', '".$idMarca."', '".$pdf."', '".$media."')";

  if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Producto Agregado');
      window.location.href='../categories.php';</script>";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
?>