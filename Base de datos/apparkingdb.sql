/*
SQLyog Ultimate v9.63 
MySQL - 5.5.5-10.1.13-MariaDB : Database - apparkingdb
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`apparkingdb` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci */;

USE `apparkingdb`;

/*Table structure for table `cliente` */

DROP TABLE IF EXISTS `cliente`;

CREATE TABLE `cliente` (
  `Cedula` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `Nombre` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `Celular` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`Cedula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

/*Data for the table `cliente` */

insert  into `cliente`(`Cedula`,`Nombre`,`Celular`) values ('111','uno','11111'),('22222','señor dos','22222'),('33333','señor tres','33333333');

/*Table structure for table `encargado` */

DROP TABLE IF EXISTS `encargado`;

CREATE TABLE `encargado` (
  `Usuario_Id` int(100) NOT NULL,
  KEY `Usuario_Id` (`Usuario_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

/*Data for the table `encargado` */

insert  into `encargado`(`Usuario_Id`) values (67),(69),(77),(78),(86),(88),(89);

/*Table structure for table `parqueadero` */

DROP TABLE IF EXISTS `parqueadero`;

CREATE TABLE `parqueadero` (
  `NIT` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `Encargado_Usuario_Id` int(100) NOT NULL,
  `Nombre` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `Direccion` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `Telefono` int(200) NOT NULL,
  `Tarifa` int(200) NOT NULL,
  `Capacidad` int(200) NOT NULL,
  `Disponibilidad` int(200) NOT NULL,
  `Latitud` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `Longitud` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `ValetParking` varchar(2) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`NIT`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

/*Data for the table `parqueadero` */

insert  into `parqueadero`(`NIT`,`Encargado_Usuario_Id`,`Nombre`,`Direccion`,`Telefono`,`Tarifa`,`Capacidad`,`Disponibilidad`,`Latitud`,`Longitud`,`ValetParking`) values ('11111',77,'PARQUEADERO DE PELLO','fsdlfnsdk',34253,6456465,53,0,'54242','42452','si'),('123456',88,'Los Numeros','monteria',123456,3000,15,7,'8.753811985472778','-75.88345040055543','no'),('252525',67,'Parking JP','11111111',111111,11111111,11,10,'8.755360145812315','-75.88156212540895','no'),('453543',77,'parqueadero 27 con 2','cra 27 #2-24',4422312,2500,30,30,'8,53353434532','-7,565465465465','si'),('5000',77,'parqueadero la 29 ','cra 29 #4-16',7745841,24425,10,15,'8.751712415269125','-75.87855805131227','no');

/*Table structure for table `parqueo` */

DROP TABLE IF EXISTS `parqueo`;

CREATE TABLE `parqueo` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Parqueadero_NIT` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `Cliente_Cedula` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `Placa` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `Fecha_entrada` date NOT NULL,
  `Hora_entrada` time NOT NULL,
  `Fecha_salida` date DEFAULT NULL,
  `Hora_salida` time NOT NULL,
  `Estado` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `ValetParking` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `Parqueadero_NIT` (`Parqueadero_NIT`),
  KEY `Cliente_Cedula` (`Cliente_Cedula`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

/*Data for the table `parqueo` */

insert  into `parqueo`(`Id`,`Parqueadero_NIT`,`Cliente_Cedula`,`Placa`,`Fecha_entrada`,`Hora_entrada`,`Fecha_salida`,`Hora_salida`,`Estado`,`ValetParking`) values (1,'5000','111','111-111','2016-06-19','01:34:19','0000-00-00','00:00:00','salido','no'),(2,'5000','111','111-111','2016-06-19','01:35:12','0000-00-00','00:00:00','parqueado','no'),(3,'5000','111','111-111','2016-06-19','01:42:48','0000-00-00','00:00:00','parqueado','no'),(4,'5000','111','111-111','2016-06-19','01:43:21','0000-00-00','00:00:00','parqueado','no'),(5,'5000','111','111-111','2016-06-19','01:43:32','0000-00-00','00:00:00','parqueado','no'),(8,'252525','456456','SDF-234','2016-06-19','02:38:42','0000-00-00','00:00:00','parqueado','no'),(9,'11111','7777','777-777','2016-06-19','13:11:00','0000-00-00','00:00:00','salido','no'),(10,'11111','7777','777-777','2016-06-19','13:11:20','0000-00-00','00:00:00','parqueado','no'),(11,'11111','7777','777-777','2016-06-19','13:11:53','0000-00-00','00:00:00','parqueado','no'),(12,'11111','7777','777-777','2016-06-19','13:12:48','0000-00-00','00:00:00','parqueado','no'),(13,'11111','7777','777-777','2016-06-19','13:13:06','0000-00-00','00:00:00','salido','no'),(14,'11111','7777','777-777','2016-06-19','13:13:21','0000-00-00','00:00:00','parqueado','no'),(15,'11111','7777','777-777','2016-06-19','13:14:42','0000-00-00','00:00:00','salido','no'),(16,'11111','7777','777-777','2016-06-19','13:14:44','0000-00-00','00:00:00','parqueado','no'),(17,'11111','7777','777-777','2016-06-19','13:14:47','0000-00-00','00:00:00','parqueado','no'),(18,'11111','7777','777-777','2016-06-19','13:14:49','0000-00-00','00:00:00','parqueado','no'),(19,'11111','7777','777-777','2016-06-19','13:14:51','0000-00-00','00:00:00','parqueado','no'),(20,'11111','7777','777-777','2016-06-19','13:14:54','0000-00-00','00:00:00','parqueado','no'),(21,'11111','55555','GFD-534','2016-06-19','13:32:23','0000-00-00','00:00:00','parqueado','no'),(22,'11111','55555','GFD-534','2016-06-19','13:33:06','0000-00-00','00:00:00','parqueado','no'),(23,'11111','55555','GFD-534','2016-06-19','13:34:23','0000-00-00','00:00:00','parqueado','no'),(24,'11111','50846321','JUG-543','2016-06-19','13:47:13','0000-00-00','00:00:00','parqueado','no'),(25,'11111','99999','NNN-999','2016-06-19','13:48:28','0000-00-00','00:00:00','parqueado','no'),(26,'123456','1065030455','HQY-22B','2016-06-19','16:03:15','0000-00-00','00:00:00','salido','no'),(27,'123456','3333','333-333','2016-06-19','16:08:14','0000-00-00','00:00:00','salido','no'),(28,'123456','3333','333-333','2016-06-19','16:09:47','0000-00-00','00:00:00','salido','no'),(29,'123456','3333','333-333','2016-06-19','16:12:33','0000-00-00','00:00:00','salido','no'),(30,'123456','666666','66666','2016-06-19','16:24:12','0000-00-00','00:00:00','salido','no'),(31,'123456','522542','jk5h','2016-06-19','16:28:18','2016-06-19','16:57:06','salido','no'),(32,'11111','22222','DOS-222','2016-06-19','23:24:21','0000-00-00','00:00:00','pendiente','si'),(33,'11111','99999','NVE-999','2016-06-19','23:25:50','0000-00-00','00:00:00','parqueado','no'),(34,'11111','22222','TQH-423','2016-06-19','23:35:24','2016-06-20','00:30:26','salido','si'),(35,'123456','33333','TRS-333','2016-06-19','23:37:22','0000-00-00','00:00:00','pendiente','si'),(36,'123456','33333','TRS-333','2016-06-19','23:46:30','0000-00-00','00:00:00','pendiente','si'),(37,'123456','33333','TRS-333','2016-06-20','00:09:10','0000-00-00','00:00:00','pendiente','si'),(40,'11111','sdfds','XXX-666','2016-06-20','00:35:10','0000-00-00','00:00:00','parqueado','no');

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `Id` int(100) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `Apellido` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `Telefono` bigint(100) NOT NULL,
  `Email` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `Direccion` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `Usuario` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `Clave` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Email` (`Email`),
  UNIQUE KEY `Usuario` (`Usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

/*Data for the table `usuario` */

insert  into `usuario`(`Id`,`Nombre`,`Apellido`,`Telefono`,`Email`,`Direccion`,`Usuario`,`Clave`) values (2,'Carlos','Salcedo',3136195645,'Cereté Sta Clara','ikarloxi@gmail.com','ikarloxi','carlos123456'),(34,'Angelica','Angulo',3216868433,'aangulo0327@gmail.com','Chiquí','angelik','angelik26'),(37,'Angelica MAria','Angulo hdz',3216868433,'aangulo@gmail.com','Chiquí','angelik2313','angie'),(43,'Angelica MAria','Angulo hdz',3216868433,'aangulos@gmail.com','Chiquí','angelik2313eq','asdad'),(47,'Angelica MAria','Angulo hdz',3216868433,'aangulosrtyry@gmail.com','Chiquí','angelik2313eqrty','gfhfhfgh'),(48,'jose','perez',34234234,'jose@gmail.com','jajajaj','jose32','jasdad'),(50,'joseqwe','perezqwewq',32222,'jose33333@gmail.com','jajajaj234324','jose32weada','dasdasdwqd'),(51,'joseqwe','perezqwewq',32222,'jose33333iu@gmail.com','jajajaj234324','jose3uku2weada','iukukuik'),(52,'joseqwe','perezqwewq',32222,'3242dasd@gmail.com','644<fsdvsdf','gdsvw','sdf34fsf'),(53,'maruana','lopez',433453,'maras@gmail.com','lolasad','ma324','hfhtr'),(54,'dfgdfg','lopez',433453,'dfgdfg@gmail.com','lolasad','htrdgd','tdfgerg'),(55,'jjjjjj','jjjjjj',54645,'hhhhhh@gmail.com','lolajhhgjjhgsad','4fdsfs','hfhfhgfh'),(56,'carlos','salcedo',13123,'jasda@gmasa.cm','sdasdpo','carlitos','jajnasdap'),(57,'carlos','salcedo',44444,'4435@gdfsmasa.cm','trfsadf','carlitos123','213123'),(67,'juan pablo','salcedo bello',234242,'juanpablo@gmail.com','sta calra','juanpi','juanpi'),(69,'asdasd','fgfdgg',34234123,'234dasd@gmail.com','fwefwef','hhhhh','hyhfgh'),(71,'mariana','jose',0,'marian213a@hotmail.com','casa','mariana2131','erwrw'),(75,'mariana','jose',4343,'marian666@hotmail.com','casa','mariana666','asdasd'),(76,'pedro','perez',7745214,'pp31@hotmail.com','casita','pp3251','hola'),(77,'pedro','perez',7745214,'casita','pp31qwew@hotmail.com','pello','pello'),(78,'Jesus','Valderrama',3124578422,'por alla lejos','javafut@hotmail.com','javafut','jajajajaja'),(80,'francisco','perez',845654,'pacho@gmail.com','casita','pacho21','sdfsdfsf'),(81,'Angy','Angulo hdz',4474112,'angy31@gmail.com','Chiquí','angy33','jajajaja'),(82,'Anyi Paola','Angulo Hernandez',312541257,'angyjajaja@gmail.com','Chiquí','anyiPao','anyiPao'),(83,'Carlos','Salcedo',3136195645,'karlox-94@hotmail.com','Cereté Sta Clara','karlox94','casalcedo94'),(84,'jinx','maria',432324,'jinx@lol.com','nexo','jinx','lol'),(85,'aaaaaa','aaaaaaaaaaa',333333,'aasd@sadas.com','aaaaaaaa','aaa','aaa'),(86,'jorge','mario',3452312,'jmario@gmail.com','casa','jmario','jmario'),(87,'gggg','gggggg',555555,'ggg@gma.com','fgggg','ggg','ggg'),(88,'ooooo','oooooo',88888888,'oo@gmail.com','oooo','oooo','oooo'),(89,'ttttt','tttttt',66666666666,'ttt@tt.ttt','ttttttttt','ttt','ttt');

/*Table structure for table `valetparker` */

DROP TABLE IF EXISTS `valetparker`;

CREATE TABLE `valetparker` (
  `Usuario_Id` int(11) NOT NULL,
  `Parqueadero_NIT` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  KEY `Usuario_Id` (`Usuario_Id`),
  KEY `Parqueadero_NIT` (`Parqueadero_NIT`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

/*Data for the table `valetparker` */

insert  into `valetparker`(`Usuario_Id`,`Parqueadero_NIT`) values (82,'5000'),(83,'453543'),(84,'11111'),(85,'453543'),(87,'11111');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
