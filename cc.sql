CREATE TABLE Categoria (
  idCategoria INTEGER   NOT NULL ,
  Nombre VARCHAR(45)   NOT NULL   ,
PRIMARY KEY(idCategoria));


CREATE TABLE Productos (
  idProductos INTEGER   NOT NULL ,
  Categoria_idCategoria INTEGER   NOT NULL ,
  Nombre VARCHAR(100)    ,
  Descripcion VARCHAR(500)    ,
  Tallas VARCHAR(50)      ,
  Imagen VARCHAR(200) ,
PRIMARY KEY(idProductos)  ,
  FOREIGN KEY(Categoria_idCategoria)
    REFERENCES Categoria(idCategoria));


CREATE INDEX Productos_FKIndex1 ON Productos (Categoria_idCategoria);


CREATE INDEX IFK_Rel_01 ON Productos (Categoria_idCategoria);



