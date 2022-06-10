# AlgoritmoWeb


#Base de datos MYSQL
------------------------------------------------------------
```
CREATE DATABASE IF NOT EXISTS timbox /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci */;
USE timbox;

-- Volcando estructura para tabla timbox.usuarios
CREATE TABLE  usuarios (
  id int(11) NOT NULL AUTO_INCREMENT,
  nombre varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  correo varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  rfc varchar(13) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  password varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  idUsuario int(11) DEFAULT NULL,
  telefono varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  website varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  direccion varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  KEY id (id),
  KEY usuarios_rfc_IDX (rfc) USING BTREE,
  KEY usuarios_correo_IDX (correo) USING BTREE
) 
```
