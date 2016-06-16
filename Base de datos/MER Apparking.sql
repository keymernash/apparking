CREATE TABLE Usuario (
  Id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Nombre VARCHAR NULL,
  Apellido VARCHAR NULL,
  Telefono BIGINT NULL,
  Email VARCHAR NULL,
  Dirrecion VARCHAR NULL,
  Usuario VARCHAR NULL,
  Clave INTEGER UNSIGNED NULL,
  PRIMARY KEY(Id)
);

CREATE TABLE Cliente (
  Cedula VARCHAR NOT NULL AUTO_INCREMENT,
  Nombre VARCHAR BINARY NULL,
  Celular VARCHAR NULL,
  PRIMARY KEY(Cedula)
);

CREATE TABLE ValetParker (
  Usuario_Id INTEGER UNSIGNED NOT NULL,
  PRIMARY KEY(Usuario_Id),
  INDEX BaletParker_FKIndex1(Usuario_Id)
);

CREATE TABLE Encargado (
  Usuario_Id INTEGER UNSIGNED NOT NULL,
  PRIMARY KEY(Usuario_Id),
  INDEX Administrador_FKIndex1(Usuario_Id)
);

CREATE TABLE Parqueadero (
  NIT VARCHAR NOT NULL AUTO_INCREMENT,
  Encargado_Usuario_Id INTEGER UNSIGNED NOT NULL,
  Nombre VARCHAR NULL,
  Direccion VARCHAR NULL,
  Telefono BIGINT NULL,
  Tarifa BIGINT NULL,
  Capacidad INTEGER UNSIGNED NULL,
  Disponibilidad INTEGER UNSIGNED NULL,
  Latitud VARCHAR NULL,
  Longitud VARCHAR NULL,
  ValetParking BOOL NULL,
  PRIMARY KEY(NIT),
  INDEX Parqueadero_FKIndex1(Encargado_Usuario_Id)
);

CREATE TABLE Parqueo (
  Idparqueo INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Parqueadero_NIT VARCHAR NOT NULL,
  Cliente_Cedula VARCHAR NOT NULL,
  ValetParker_Usuario_Id INTEGER UNSIGNED NOT NULL,
  placa VARCHAR NULL,
  fecha DATE NULL,
  hora_entrada TIME NULL,
  hora_salida TIME NULL,
  estado VARCHAR NULL,
  PRIMARY KEY(Idparqueo, Parqueadero_NIT),
  INDEX Parqueo_FKIndex1(Parqueadero_NIT),
  INDEX Parqueo_FKIndex3(ValetParker_Usuario_Id)
);


