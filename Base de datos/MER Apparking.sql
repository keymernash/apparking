CREATE TABLE Usuario (
  Id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Nombre VARCHAR NULL,
  Apellido VARCHAR NULL,
  Telefono VARCHAR NULL,
  Email VARCHAR NULL,
  Dirrecion VARCHAR NULL,
  Usuario VARCHAR NULL,
  Clave INTEGER UNSIGNED NULL,
  PRIMARY KEY(Id)
);

CREATE TABLE Cliente (
  Cedula VARCHAR NOT NULL,
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
  Id INT UNSIGNED NOT NULL AUTO_INCREMENT,	
  NIT VARCHAR UNIQUE NOT NULL,
  Encargado_Usuario_Id INTEGER UNSIGNED NOT NULL,
  Nombre VARCHAR NULL,
  Direccion VARCHAR NULL,
  Telefono VARCHAR NULL,
  Tarifa FLOAT NULL,
  Capacidad INTEGER UNSIGNED NULL,
  Disponibilidad INTEGER UNSIGNED NULL,
  Latitud VARCHAR NULL,
  Longitud VARCHAR NULL,
  ValetParking BOOLEAN NULL,
  PRIMARY KEY(Id),
  INDEX Parqueadero_FKIndex1(Encargado_Usuario_Id)
);

CREATE TABLE Parqueo (
  Id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Parqueadero_Id VARCHAR NOT NULL,
  Cliente_Cedula VARCHAR NOT NULL,
  ValetParker_Usuario_Id INTEGER UNSIGNED NOT NULL,
  Placa VARCHAR NULL,
  Fecha DATE NULL,
  Hora_entrada TIME NULL,
  Hora_salida TIME NULL,
  estado VARCHAR NULL,
  PRIMARY KEY(Id, Parqueadero_Id),
  INDEX Parqueo_FKIndex1(Parqueadero_Id),
  INDEX Parqueo_FKIndex3(ValetParker_Usuario_Id)
);


