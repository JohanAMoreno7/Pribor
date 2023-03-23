
CREATE DATABASE IF NOT EXISTS priborfinal;

USE priborfinal;

CREATE TABLE cliente(
	id INT PRIMARY KEY AUTO_INCREMENT,
	tipoDocumento INT NOT NULL,
	documento int(13) UNIQUE NOT NULL,
	nombre VARCHAR(20) NOT NULL,
	apellido VARCHAR(20) NOT NULL,
	telefono INT(12) NOT NULL,
	estado ENUM('activo','inactivo') NOT NULL DEFAULT 'activo'
);

CREATE TABLE categoria(
	idCategoria int PRIMARY KEY AUTO_INCREMENT,
	nombreCategoria varchar(20) NOT NULL
);

CREATE TABLE especie(
	idespecie int PRIMARY KEY AUTO_INCREMENT,
	nombre varchar(20) NOT NULL
);

CREATE TABLE login(
	id int PRIMARY KEY AUTO_INCREMENT,
	user varchar(50) NOT NULL,
	email VARCHAR(50) NOT NULL,
	pasadmin VARCHAR(50) NOT NULL,
	rol int(3)	
);

CREATE TABLE marca(
	idMarca int PRIMARY KEY AUTO_INCREMENT,
	nombreMarca varchar(20) NOT NULL	
);

CREATE TABLE presentacion(
	idPresentacion int PRIMARY KEY AUTO_INCREMENT,
	nombrePresentacion varchar(20) NOT NULL	
);

CREATE TABLE tarifa(
	idTarifa int PRIMARY KEY AUTO_INCREMENT,
	valor float NOT NULL,
	fecha date	NOT NULL
);

CREATE TABLE tipodocumento(
	id int PRIMARY KEY AUTO_INCREMENT,
	nombre VARCHAR(20) NOT NULL
);

CREATE TABLE unidadmedida(
	idUmedida int PRIMARY KEY AUTO_INCREMENT,
	nombreUmedida VARCHAR(20) NOT NULL
);

CREATE TABLE servicio(
	id int PRIMARY KEY AUTO_INCREMENT,
	descripcion varchar(40) NOT NULL,
	estado ENUM('activo','inactivo') NOT NULL DEFAULT 'activo'
);

CREATE TABLE PRODUCTO(
	id int primary key AUTO_INCREMENT,
	nombre VARCHAR(30) NOT NULL,
	marca int,
	presentacion int,
	categoria int,
	medida int,
	unidadMedida int,
	especie int,
	stock int,
	precio float,
	estado ENUM('activo','inactivo') NOT NULL DEFAULT 'activo',
	CONSTRAINT FK_marca FOREIGN KEY (marca) REFERENCES marca(idMarca),
	CONSTRAINT FK_presentacion FOREIGN KEY(presentacion) REFERENCES presentacion(idPresentacion),
	CONSTRAINT FK_categoria FOREIGN KEY(categoria) REFERENCES categoria(idCategoria),
	CONSTRAINT FK_unidadMedida FOREIGN KEY(unidadMedida) REFERENCES unidadmedida(idUmedida),
	CONSTRAINT FK_especie FOREIGN KEY(especie) REFERENCES especie(idespecie)
);

CREATE TABLE `detallecompra` (
  `iddetalleCompra`  int(11) primary key AUTO_INCREMENT NOT NULL,
  `cantidadlote` int(11) DEFAULT NULL,
  `preciolote` int(11) DEFAULT NULL,
  `idcompra` int(11) NOT NULL,
  `idproducto` int(11) NOT NULL,
      `fechalote` Date() NOT NULL,
    CONSTRAINT FK_idproducto FOREIGN KEY (idproducto) REFERENCES producto(id),
    CONSTRAINT FK_idcompra FOREIGN KEY(idcompra) REFERENCES compra(idPresentacion)

) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE COMPRA (
idcompra int primary key AUTO_INCREMENT , 
fecha date ,
preciocompra int,
idproveedor int,

CONSTRAINT FK_idproveedor FOREIGN KEY (idproveedor) REFERENCES proveedor(idproveedor),

);

CREATE TABLE detalleventa (
  iddetalleCompra  int primary key AUTO_INCREMENT ,
  cantidadlote int ,
  preciolote int ,
  idcompra int ,
  fechalote date,
  idproducto int ,
      
    CONSTRAINT FK_idproducto FOREIGN KEY (idproducto) REFERENCES producto(id),
    CONSTRAINT FK_idcompra FOREIGN KEY(idcompra) REFERENCES compra(idPresentacion)

);

CREATE TABLE venta (
idcompra int primary key AUTO_INCREMENT , 
fecha date ,
preciocompra int,
idproveedor int,

CONSTRAINT FK_idproveedor FOREIGN KEY (idproveedor) REFERENCES proveedor(idproveedor),

);




