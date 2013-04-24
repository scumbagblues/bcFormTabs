/*
SQLyog Enterprise - MySQL GUI v8.13 
MySQL - 5.5.29-0ubuntu0.12.04.2 : Database - bluecare_chetumal
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`bluecare_chetumal` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `bluecare_chetumal`;

/*Table structure for table `agenda` */

DROP TABLE IF EXISTS `agenda`;

CREATE TABLE `agenda` (
  `age_id` int(11) NOT NULL AUTO_INCREMENT,
  `age_asunto` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `age_persona` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `age_nexpediente` varchar(15) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `age_fecha` date NOT NULL,
  `age_horainicio` time NOT NULL,
  `age_notas` longblob,
  `age_iduser` int(11) NOT NULL,
  `age_cm` varchar(1) DEFAULT NULL,
  `age_horafin` time DEFAULT NULL,
  `age_usuarioagenda` int(11) DEFAULT NULL,
  `age_coordinacion` int(11) DEFAULT NULL,
  PRIMARY KEY (`age_id`)
) ENGINE=MyISAM AUTO_INCREMENT=124 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

/*Data for the table `agenda` */

insert  into `agenda`(`age_id`,`age_asunto`,`age_persona`,`age_nexpediente`,`age_fecha`,`age_horainicio`,`age_notas`,`age_iduser`,`age_cm`,`age_horafin`,`age_usuarioagenda`,`age_coordinacion`) values (83,'Seguimiento consulta','DAVID RODRíGUEZ ARIAS','0001','2012-10-09','13:00:00',NULL,601,NULL,'13:30:00',601,1),(84,'consulta de seguimiento','SILVIA MIRIAM ROCHA ANGELES','0113','2012-10-12','19:00:00',NULL,605,NULL,'19:30:00',601,1),(86,'CONSULTA','ROBERTO PEREZ','','2012-10-18','09:00:00',NULL,601,NULL,'10:30:00',601,1),(87,'CONSULTA','Alfredo Perez Robles','','2012-10-18','18:00:00',NULL,602,NULL,'20:00:00',601,1),(88,'CONSULTA','ANA MONTES ROBLES','','2012-10-18','14:00:00',NULL,603,NULL,'15:00:00',602,1),(89,'CONSULTA','DAVID RODRíGUEZ ARIAS','0001','2012-10-18','10:00:00',NULL,605,NULL,'11:30:00',601,1),(90,'x','f','','2012-11-05','09:00:00',NULL,608,NULL,'09:30:00',608,2),(91,'medico','persona','','2012-11-16','11:00:00',NULL,602,NULL,'12:00:00',616,1),(96,'Consulta MÃ©dica','MAURICIO RODRIGEZ MONTIEL','83','2012-11-16','13:00:00',NULL,607,NULL,'14:00:00',607,1),(97,'Consulta de seguimiento','MARIBEL GONZALEZ RAMIREZ','76','2012-11-07','10:00:00',NULL,601,NULL,'11:00:00',601,1),(98,'consulta','ROBERTO PEREZ ROBLES','119','2012-12-04','12:00:00',NULL,615,NULL,'13:00:00',615,1),(99,'xxxx','MAURICIO RODRIGEZ MONTIEL','83','2012-12-04','12:00:00',NULL,601,NULL,'13:00:00',601,1),(100,'dadnsjnsd','ROMEO SANTOS S','82','2012-12-04','13:00:00',NULL,609,NULL,'14:00:00',609,1),(101,'consulta','MARIBEL GONZALEZ RAMIREZ','76','2012-12-04','08:00:00',NULL,601,NULL,'09:00:00',601,1),(102,'daddsd','ROBERTO PEREZ ROBLES','','2012-12-11','10:00:00',NULL,608,NULL,'11:00:00',608,1),(103,'fdgdsfd','MAURICIO RODRIGEZ MONTIEL','83','2012-12-05','09:00:00',NULL,616,NULL,'10:00:00',616,1),(104,'fdgdsfd','MAURICIO RODRIGEZ MONTIEL','83','2012-12-05','09:00:00',NULL,616,NULL,'10:00:00',616,1),(105,'dsdda','RAUL PEREZ ROBLES','80','2012-12-06','09:00:00',NULL,606,NULL,'10:00:00',606,1),(106,'dasdsad','DAVID RODRÃ­GUEZ ARIAS','1','2012-12-07','11:00:00',NULL,616,NULL,'12:00:00',616,1),(107,'asdadasd','CLARA PEREZ TORRES','88','2012-12-08','21:00:00',NULL,608,NULL,'22:00:00',608,1),(108,'dsdadads','MARÃ­A LUISA GUITIÃ©RREZ  MENDOZA','129','2012-12-08','18:00:00',NULL,601,NULL,'19:00:00',601,1),(109,'dolor','monica gil','','2012-12-12','17:00:00',NULL,616,NULL,'18:00:00',616,1),(110,'AtenciÃ³n Medica','ROBERTO PEREZ ROBLES','119','2012-12-28','08:00:00',NULL,606,NULL,'09:00:00',606,1),(111,'AtenciÃ³n Medica','ROBERTO PEREZ ROBLES','119','2012-12-28','08:00:00',NULL,606,NULL,'09:00:00',606,1),(112,'seguimiengo','contador','','2013-01-01','10:00:00',NULL,601,NULL,'11:00:00',601,1),(113,'asunto','Feliepe Renteria','','2013-03-12','12:00:00',NULL,601,NULL,'13:30:00',601,1),(114,'MHJMVH','DAVID RODRÃ­GUEZ ARIAS','1','2013-03-15','11:00:00',NULL,601,NULL,'12:00:00',601,1),(116,'COSULTA MEDICA','ALEXANDRA PINKNEY RIVAS','','2013-04-25','09:00:00',NULL,601,NULL,'10:00:00',601,1),(117,'d','SILVIA MIRIAM ROCHA ANGELES','75','2013-04-12','08:00:00',NULL,609,NULL,'09:00:00',609,1),(119,'test','SILVIA MIRIAM ROCHA ANGELES','75','2013-04-14','09:00:00',NULL,606,NULL,'12:00:00',606,1),(120,'test','DAVID RODRíGUEZ ARIAS','','2013-04-12','10:00:00',NULL,616,NULL,'11:00:00',616,1),(121,'test','DAVID RODRíGUEZ ARIAS','','2013-04-12','08:00:00',NULL,601,NULL,'09:00:00',601,1),(122,'test','DAVID RODRíGUEZ ARIAS','','2013-04-12','08:00:00',NULL,609,NULL,'09:00:00',609,1),(123,'test','Ricardo Cortes Romo','','2013-04-15','08:00:00',NULL,601,NULL,'09:00:00',601,1);

/*Table structure for table `antecedentes_heredofam` */

DROP TABLE IF EXISTS `antecedentes_heredofam`;

CREATE TABLE `antecedentes_heredofam` (
  `ahf_id` int(11) NOT NULL AUTO_INCREMENT,
  `ahf_materno` varchar(145) DEFAULT NULL,
  `ahf_paterno` varchar(145) DEFAULT NULL,
  `ahf_pacid` int(11) NOT NULL,
  PRIMARY KEY (`ahf_id`),
  KEY `fk_antecedentes_heredofam_paciente1` (`ahf_pacid`),
  CONSTRAINT `fk_antecedentes_heredofam_paciente1` FOREIGN KEY (`ahf_pacid`) REFERENCES `paciente` (`pac_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `antecedentes_heredofam` */

/*Table structure for table `antecedentes_nopatologicos` */

DROP TABLE IF EXISTS `antecedentes_nopatologicos`;

CREATE TABLE `antecedentes_nopatologicos` (
  `anp_id` int(11) NOT NULL AUTO_INCREMENT,
  `anp_pacid` int(11) NOT NULL,
  `anp_sarampion` enum('Si','No') DEFAULT NULL,
  `anp_rubeola` enum('Si','No') DEFAULT NULL,
  `anp_tosferina` enum('Si','No') DEFAULT NULL,
  `anp_varicela` enum('Si','No') DEFAULT NULL,
  `anp_escarlatina` enum('Si','No') DEFAULT NULL,
  `anp_amigdalitis` enum('Si','No') DEFAULT NULL,
  `anp_hepatitis` enum('Si','No') DEFAULT NULL,
  `anp_convulsiones` enum('Si','No') DEFAULT NULL,
  `anp_urosepsis` enum('Si','No') DEFAULT NULL,
  `anp_traumatismo` enum('Si','No') DEFAULT NULL,
  `anp_cirugia` enum('Si','No') DEFAULT NULL,
  `anp_ingresohospital` enum('Si','No') DEFAULT NULL,
  `anp_otros` enum('Si','No') DEFAULT NULL,
  `anp_sonrio` varchar(5) DEFAULT NULL,
  `anp_sostuvocabeza` varchar(5) DEFAULT NULL,
  `anp_sento` varchar(5) DEFAULT NULL,
  `anp_gateo` varchar(5) DEFAULT NULL,
  `anp_camino` varchar(5) DEFAULT NULL,
  `anp_hablo` varchar(5) DEFAULT NULL,
  `anp_controlesfinteres` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`anp_id`),
  KEY `fk_antecedentes_nopatologicos_paciente1` (`anp_pacid`),
  CONSTRAINT `fk_antecedentes_nopatologicos_paciente1` FOREIGN KEY (`anp_pacid`) REFERENCES `paciente` (`pac_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `antecedentes_nopatologicos` */

/*Table structure for table `antecedentes_patologicos` */

DROP TABLE IF EXISTS `antecedentes_patologicos`;

CREATE TABLE `antecedentes_patologicos` (
  `apa_id` int(11) NOT NULL AUTO_INCREMENT,
  `apa_menarca` varchar(5) DEFAULT NULL,
  `apa_ritmo` varchar(5) DEFAULT NULL,
  `apa_edadiniciosexual` varchar(3) DEFAULT NULL,
  `apa_fechaultimamest` datetime DEFAULT NULL,
  `apa_fechaultimopapanico` datetime DEFAULT NULL,
  `apa_examenmamas` varchar(5) DEFAULT NULL,
  `apa_multiplepareja` enum('Si','No') DEFAULT NULL,
  `apa_fechausoanticon` datetime DEFAULT NULL,
  `apa_toxemia` varchar(35) DEFAULT NULL,
  `apa_legradouterino` varchar(30) DEFAULT NULL,
  `apa_dieta` enum('Buena','Regular','Mala') DEFAULT NULL,
  `apa_tabaco` enum('Buena','Regular','Mala') DEFAULT NULL,
  `apa_alcohol` enum('Buena','Regular','Mala') DEFAULT NULL,
  `apa_vivienda` enum('Buena','Regular','Mala') DEFAULT NULL,
  `apa_servicio` enum('Buena','Regular','Mala') DEFAULT NULL,
  `apa_fauna` enum('Buena','Regular','Mala') DEFAULT NULL,
  `apa_promiscuidad` enum('Si','No') DEFAULT NULL,
  `apa_hacinamiento` enum('Si','No') DEFAULT NULL,
  `apa_biologico` varchar(45) DEFAULT NULL,
  `apa_sabin` varchar(3) DEFAULT NULL,
  `apa_dpt` varchar(3) DEFAULT NULL,
  `apa_bcg` varchar(3) DEFAULT NULL,
  `apa_dobleviral` varchar(3) DEFAULT NULL,
  `apa_tviral` varchar(3) DEFAULT NULL,
  `apa_antihepatitisb` varchar(3) DEFAULT NULL,
  `apa_pentavalente` varchar(3) DEFAULT NULL,
  `apa_influenza` varchar(3) DEFAULT NULL,
  `apa_antineumocos` varchar(3) DEFAULT NULL,
  `apa_antirabicah` varchar(3) DEFAULT NULL,
  `apa_pacid` int(11) NOT NULL,
  PRIMARY KEY (`apa_id`),
  KEY `fk_antecedentes_patologicos_paciente1` (`apa_pacid`),
  CONSTRAINT `fk_antecedentes_patologicos_paciente1` FOREIGN KEY (`apa_pacid`) REFERENCES `paciente` (`pac_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `antecedentes_patologicos` */

/*Table structure for table `ciudades` */

DROP TABLE IF EXISTS `ciudades`;

CREATE TABLE `ciudades` (
  `ciu_id` int(11) NOT NULL AUTO_INCREMENT,
  `ciu_nombre` varchar(55) DEFAULT NULL,
  `ciu_idestado` int(11) NOT NULL,
  `ciu_activo` enum('1','0') DEFAULT NULL,
  PRIMARY KEY (`ciu_id`),
  KEY `fk_ciudades_estados1` (`ciu_idestado`),
  CONSTRAINT `fk_ciudades_estados1` FOREIGN KEY (`ciu_idestado`) REFERENCES `estados` (`est_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `ciudades` */

insert  into `ciudades`(`ciu_id`,`ciu_nombre`,`ciu_idestado`,`ciu_activo`) values (1,'Guadalajara',1,'1'),(2,'Zapopan',1,'1'),(3,'Querétaro',4,'1'),(4,'Pinal de amoles',4,'1'),(5,'Coyoacán',5,'1'),(6,'Benito Juárez',5,'1');

/*Table structure for table `coordinacion` */

DROP TABLE IF EXISTS `coordinacion`;

CREATE TABLE `coordinacion` (
  `cor_id` int(11) NOT NULL AUTO_INCREMENT,
  `cor_descripcion` varchar(100) DEFAULT NULL,
  `cor_area` varchar(100) DEFAULT NULL,
  `cor_abreviatura` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`cor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `coordinacion` */

insert  into `coordinacion`(`cor_id`,`cor_descripcion`,`cor_area`,`cor_abreviatura`) values (1,'Gestión Social y Asistencia Médica',NULL,NULL),(2,'Centro Especializado de Atención a la Mujer',NULL,'CEM');

/*Table structure for table `estados` */

DROP TABLE IF EXISTS `estados`;

CREATE TABLE `estados` (
  `est_id` int(11) NOT NULL AUTO_INCREMENT,
  `est_nombre` varchar(45) DEFAULT NULL,
  `est_activo` enum('1','0') DEFAULT '1',
  PRIMARY KEY (`est_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `estados` */

insert  into `estados`(`est_id`,`est_nombre`,`est_activo`) values (1,'Jalisco','1'),(2,'Yucatan','1'),(3,'Estado de Mexico','1'),(4,'Queretaro','1'),(5,'Distrito Federal','1');

/*Table structure for table `evolucion_medica` */

DROP TABLE IF EXISTS `evolucion_medica`;

CREATE TABLE `evolucion_medica` (
  `evo_id` int(11) NOT NULL,
  `evo_pacid` int(11) NOT NULL,
  `evo_fecha` datetime DEFAULT NULL,
  `evolucion_medicacol` varchar(45) DEFAULT NULL,
  `evo_datos` varchar(100) DEFAULT NULL,
  `evo_tratamiento` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`evo_id`),
  KEY `fk_evolucion_medica_paciente1` (`evo_pacid`),
  CONSTRAINT `fk_evolucion_medica_paciente1` FOREIGN KEY (`evo_pacid`) REFERENCES `paciente` (`pac_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `evolucion_medica` */

/*Table structure for table `exploracion_fisica` */

DROP TABLE IF EXISTS `exploracion_fisica`;

CREATE TABLE `exploracion_fisica` (
  `exp_id` int(11) NOT NULL,
  `exp_peso` varchar(3) DEFAULT NULL,
  `exp_talla` varchar(3) DEFAULT NULL,
  `exp_pulso` varchar(3) DEFAULT NULL,
  `exp_resp` varchar(3) DEFAULT NULL,
  `exp_craneo` enum('Normal','Anormal') DEFAULT NULL,
  `exp_cara` enum('Normal','Anormal') DEFAULT NULL,
  `exp_ojos` enum('Normal','Anormal') DEFAULT NULL,
  `exp_nariz` enum('Normal','Anormal') DEFAULT NULL,
  `exp_bocafaringe` enum('Normal','Anormal') DEFAULT NULL,
  `exp_cuello` enum('Normal','Anormal') DEFAULT NULL,
  `exp_torax` enum('Normal','Anormal') DEFAULT NULL,
  `exp_apresp` enum('Normal','Anormal') DEFAULT NULL,
  `exp_apdig` enum('Normal','Anormal') DEFAULT NULL,
  `exp_apcardio` enum('Normal','Anormal') DEFAULT NULL,
  `exp_abdomen` enum('Normal','Anormal') DEFAULT NULL,
  `exp_genitouri` enum('Normal','Anormal') DEFAULT NULL,
  `exp_extremidades` enum('Normal','Anormal') DEFAULT NULL,
  `exp_apmusc` enum('Normal','Anormal') DEFAULT NULL,
  `exp_snc` enum('Normal','Anormal') DEFAULT NULL,
  `exp_otros` enum('Normal','Anormal') DEFAULT NULL,
  `exp_descripciones` varchar(200) DEFAULT NULL,
  `exp_pacid` int(11) NOT NULL,
  PRIMARY KEY (`exp_id`),
  KEY `fk_exploracion_fisica_paciente1` (`exp_pacid`),
  CONSTRAINT `fk_exploracion_fisica_paciente1` FOREIGN KEY (`exp_pacid`) REFERENCES `paciente` (`pac_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `exploracion_fisica` */

/*Table structure for table `paciente` */

DROP TABLE IF EXISTS `paciente`;

CREATE TABLE `paciente` (
  `pac_id` int(11) NOT NULL AUTO_INCREMENT,
  `pac_nombre` varchar(25) NOT NULL,
  `pac_apellidoP` varchar(35) DEFAULT NULL,
  `pac_apellidoM` varchar(35) DEFAULT NULL,
  `pac_domicilio` varchar(45) DEFAULT NULL,
  `pac_edad` varchar(3) DEFAULT NULL,
  `pac_idestado` int(11) DEFAULT NULL,
  `pac_idciudad` int(11) DEFAULT NULL,
  `pac_contacto` varchar(45) DEFAULT NULL,
  `pac_parentesco` varchar(45) DEFAULT NULL,
  `pac_casomedico` enum('Si','No') DEFAULT NULL,
  `pac_activo` enum('1','0') DEFAULT '1',
  `pac_uid` int(11) DEFAULT NULL,
  `pac_udt` datetime DEFAULT NULL,
  PRIMARY KEY (`pac_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `paciente` */

insert  into `paciente`(`pac_id`,`pac_nombre`,`pac_apellidoP`,`pac_apellidoM`,`pac_domicilio`,`pac_edad`,`pac_idestado`,`pac_idciudad`,`pac_contacto`,`pac_parentesco`,`pac_casomedico`,`pac_activo`,`pac_uid`,`pac_udt`) values (1,'Ricardo','Cortes','Romo','Montes urales 1232','28',5,6,'Ricardo Cortes','Padre','No','1',1,'2013-04-22 11:23:30'),(2,'Jose','Cortes','Romo','Montes urales 1232','27',1,1,'Ricardo Cortes','Padre','Si','0',1,'2013-04-22 12:14:53'),(3,'John','Lennon','Winston','Abbey road','40',5,6,'Ricardo Cortes','Padre','No','1',1,'2013-04-22 17:08:51'),(4,'ringo','starkey','perez','Montes urales 1232','40',5,6,'Ricardo Cortes','Padre','Si','1',1,'2013-04-23 17:54:04'),(5,'Jose','starkey','Romo','Montes urales 1232','40',1,1,'Ricardo Cortes','Padre','No','1',1,'2013-04-23 18:01:59'),(6,'George','Harrison','Lopez','Abbey road','40',4,4,'Ricardo Cortes','Padre','No','1',1,'2013-04-23 18:02:27');

/*Table structure for table `paciente_extras` */

DROP TABLE IF EXISTS `paciente_extras`;

CREATE TABLE `paciente_extras` (
  `pex_id` int(11) NOT NULL AUTO_INCREMENT,
  `pex_impresion` varchar(200) DEFAULT NULL,
  `pex_exsolicitados` varchar(200) DEFAULT NULL,
  `pex_terapeutica` varchar(200) DEFAULT NULL,
  `pex_referido` enum('A su domicilio','Consulta externa','Hospitalización','Otro hospital') DEFAULT NULL,
  `pex_urgencia` enum('Si','No') DEFAULT NULL,
  `pex_pacid` int(11) NOT NULL,
  PRIMARY KEY (`pex_id`),
  KEY `fk_paciente_extras_paciente1` (`pex_pacid`),
  CONSTRAINT `fk_paciente_extras_paciente1` FOREIGN KEY (`pex_pacid`) REFERENCES `paciente` (`pac_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `paciente_extras` */

/*Table structure for table `paciente_identificacion` */

DROP TABLE IF EXISTS `paciente_identificacion`;

CREATE TABLE `paciente_identificacion` (
  `pid_id` int(11) NOT NULL AUTO_INCREMENT,
  `pid_interrogatorio` enum('Si','No') DEFAULT NULL,
  `pid_ministerio` enum('Si','No') DEFAULT NULL,
  `pid_fechanac` varchar(45) DEFAULT NULL,
  `pid_ocupacion` enum('Sin ocupación','Estudia','Trabaja','Labores de hogar','Desempleado','Jubilado') DEFAULT NULL,
  `pid_residencia` varchar(40) DEFAULT NULL,
  `pid_sexo` enum('H','M') DEFAULT NULL,
  `pid_estadocivil` enum('Casado(a)','Soltero(a)','Madre/Padre soltero','Viudo(a)','Divoricado(a)','Unión libre','Separado') DEFAULT NULL,
  `pid_perfil` text,
  `pid_pacid` int(11) NOT NULL,
  PRIMARY KEY (`pid_id`),
  KEY `fk_paciente_identificacion_paciente1` (`pid_pacid`),
  CONSTRAINT `fk_paciente_identificacion_paciente1` FOREIGN KEY (`pid_pacid`) REFERENCES `paciente` (`pac_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `paciente_identificacion` */

/*Table structure for table `paciente_padecimiento` */

DROP TABLE IF EXISTS `paciente_padecimiento`;

CREATE TABLE `paciente_padecimiento` (
  `pad_id` int(11) NOT NULL AUTO_INCREMENT,
  `pad_evolucion` enum('24 a 72 hrs','3 a 7 días','1 a 4 semanas','Más de un mes') DEFAULT NULL,
  `pad_pacid` int(11) NOT NULL,
  `pad_signos` varchar(145) DEFAULT NULL,
  `pad_sintomas` varchar(145) DEFAULT NULL,
  PRIMARY KEY (`pad_id`),
  KEY `fk_paciente_padecimiento_paciente1` (`pad_pacid`),
  CONSTRAINT `fk_paciente_padecimiento_paciente1` FOREIGN KEY (`pad_pacid`) REFERENCES `paciente` (`pac_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `paciente_padecimiento` */

/*Table structure for table `pacientes` */

DROP TABLE IF EXISTS `pacientes`;

CREATE TABLE `pacientes` (
  `pac_id` int(10) NOT NULL AUTO_INCREMENT,
  `pac_nexpediente` varchar(15) NOT NULL,
  `pac_expfisc` varchar(15) DEFAULT NULL,
  `pac_pediatra` int(2) DEFAULT '0',
  `pac_idusuario` int(5) DEFAULT NULL,
  `pac_idtrato` int(11) DEFAULT NULL,
  `pac_idreligion` int(11) DEFAULT NULL,
  `pac_idescolar` int(11) DEFAULT NULL,
  `pac_idecivil` int(11) DEFAULT NULL,
  `pac_idgruposan` int(11) DEFAULT NULL,
  `pac_nombre` varchar(50) NOT NULL,
  `pac_apellidoP` varchar(50) NOT NULL,
  `pac_apellidoM` varchar(50) NOT NULL,
  `pac_apellidoC` varchar(50) DEFAULT NULL,
  `pac_fndia` varchar(5) DEFAULT NULL,
  `pac_fnmes` varchar(5) DEFAULT NULL,
  `pac_fnano` varchar(10) DEFAULT NULL,
  `pac_sexo` varchar(10) DEFAULT NULL,
  `pac_ocupacion` varchar(100) DEFAULT NULL,
  `pac_conyuge` varchar(150) DEFAULT NULL,
  `pac_tutor` varchar(150) DEFAULT NULL,
  `pac_lugarNacimiento` varchar(5) DEFAULT NULL,
  `pac_fechaNacimiento` date DEFAULT NULL,
  `pac_edadPriVisita` varchar(30) DEFAULT NULL,
  `pac_edadActual` varchar(30) DEFAULT NULL,
  `pac_calleNumero` varchar(100) DEFAULT NULL,
  `pac_colonia` varchar(100) DEFAULT NULL,
  `pac_delegacion` varchar(5) DEFAULT NULL,
  `pac_ciudad` varchar(5) DEFAULT NULL,
  `pac_estado` varchar(5) DEFAULT NULL,
  `pac_pais` varchar(100) DEFAULT NULL,
  `pac_telCasa` varchar(40) DEFAULT NULL,
  `pac_telOficina` varchar(40) DEFAULT NULL,
  `pac_celular` varchar(40) DEFAULT NULL,
  `pac_radio` varchar(40) DEFAULT NULL,
  `pac_email` varchar(100) DEFAULT NULL,
  `pac_referido` varchar(150) DEFAULT NULL,
  `pac_aseguradora` varchar(150) DEFAULT NULL,
  `pac_nota` blob,
  `pac_emergenciaNom` varchar(150) DEFAULT NULL,
  `pac_telemergencia` varchar(40) DEFAULT NULL,
  `pac_codpostal` varchar(10) DEFAULT NULL,
  `pac_alergias` longblob,
  `pac_activo` enum('1','0') DEFAULT NULL,
  `pac_antecedentes` longblob,
  `pac_situacion` varchar(15) DEFAULT NULL,
  `pac_escuela` varchar(150) DEFAULT NULL,
  `pac_grado` varchar(3) DEFAULT NULL,
  `pac_grupo` varchar(3) DEFAULT NULL,
  `pac_controlnp` varchar(25) DEFAULT NULL,
  `pac_iduser` int(11) DEFAULT NULL,
  `pac_casa` varchar(3) DEFAULT NULL,
  `pac_comunidad` varchar(50) DEFAULT NULL,
  `pac_tinterrogatorio` int(2) DEFAULT NULL,
  `pac_ntutor` longtext,
  `pac_actividadresponsable` longtext,
  `pac_parentesco` longtext,
  `pac_mingreso` longtext,
  `pac_referidox` varchar(50) DEFAULT NULL,
  `pac_fonrecados` varchar(20) DEFAULT NULL,
  `pac_fontrabajo` varchar(20) DEFAULT NULL,
  `pac_nmadre` varchar(50) DEFAULT NULL,
  `pac_npadre` varchar(50) DEFAULT NULL,
  `pac_nconyuge` varchar(50) DEFAULT NULL,
  `pac_socioeco` varchar(50) DEFAULT NULL,
  `pac_ptratante` varchar(50) DEFAULT NULL,
  `pac_pcanalizacion` varchar(50) DEFAULT NULL,
  `pac_mconsulta` longtext,
  PRIMARY KEY (`pac_id`,`pac_nexpediente`)
) ENGINE=InnoDB AUTO_INCREMENT=135 DEFAULT CHARSET=latin1;

/*Data for the table `pacientes` */

insert  into `pacientes`(`pac_id`,`pac_nexpediente`,`pac_expfisc`,`pac_pediatra`,`pac_idusuario`,`pac_idtrato`,`pac_idreligion`,`pac_idescolar`,`pac_idecivil`,`pac_idgruposan`,`pac_nombre`,`pac_apellidoP`,`pac_apellidoM`,`pac_apellidoC`,`pac_fndia`,`pac_fnmes`,`pac_fnano`,`pac_sexo`,`pac_ocupacion`,`pac_conyuge`,`pac_tutor`,`pac_lugarNacimiento`,`pac_fechaNacimiento`,`pac_edadPriVisita`,`pac_edadActual`,`pac_calleNumero`,`pac_colonia`,`pac_delegacion`,`pac_ciudad`,`pac_estado`,`pac_pais`,`pac_telCasa`,`pac_telOficina`,`pac_celular`,`pac_radio`,`pac_email`,`pac_referido`,`pac_aseguradora`,`pac_nota`,`pac_emergenciaNom`,`pac_telemergencia`,`pac_codpostal`,`pac_alergias`,`pac_activo`,`pac_antecedentes`,`pac_situacion`,`pac_escuela`,`pac_grado`,`pac_grupo`,`pac_controlnp`,`pac_iduser`,`pac_casa`,`pac_comunidad`,`pac_tinterrogatorio`,`pac_ntutor`,`pac_actividadresponsable`,`pac_parentesco`,`pac_mingreso`,`pac_referidox`,`pac_fonrecados`,`pac_fontrabajo`,`pac_nmadre`,`pac_npadre`,`pac_nconyuge`,`pac_socioeco`,`pac_ptratante`,`pac_pcanalizacion`,`pac_mconsulta`) values (112,'0001','',0,NULL,1,10,3,1,9,'DAVID','RODR&iacute;GUEZ','ARIAS',NULL,'17','08','1977','1','Empleado Federal',NULL,NULL,'9','1977-08-17',NULL,'35','foresta nh','47','54',NULL,'15','M&eacute;xico','722457215',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'14752',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'nombre','actividad','parentezco',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(113,'0113','',0,NULL,2,10,3,2,9,'SILVIA MIRIAM','ROCHA','ANGELES',NULL,'24','12','1979','2','Programadora',NULL,NULL,'15','1979-12-24',NULL,'32','privada framoyanes','47','  54',NULL,'15','  México','0722-1545624',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'04502',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'nombre','actividad',' parentezco',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(114,'0114','',0,NULL,3,3,9,6,1,'MARIBEL','GONZALEZ','RAMIREZ',NULL,'01','05','1985','2','Ama de Casa',NULL,NULL,'27','1985-05-01',NULL,'27 anos','','1','25',NULL,'15',' ','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(115,'0115','',0,NULL,1,2,6,1,3,'ROBERTO ','PEREZ','FLORES',NULL,'21','04','1976','1','EMPLEADO',NULL,NULL,'9','1976-04-21',NULL,'36','CALLE 6 NO 20 COL. FEDERAL','1','15',NULL,'9','MEXICO','55203925',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'08990',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'ROBERTO PEREZ','EMPLEADO','PADRE',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(116,'0116','',0,NULL,1,10,3,1,9,'JUAN','MONTES','ROBLES',NULL,'22','04','1977','1','',NULL,NULL,'0','1977-04-22',NULL,'','CALLE 20 NO. 290','','5',NULL,'','MEXICO','55467890',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'07890',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'DIRECTO','DIRECTO','DIRECTOR',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(117,'0117','',0,NULL,1,2,1,1,1,'CARLOS','PEREZ','FLORES',NULL,'13','08','1976','1','EMPLEADO',NULL,NULL,'9','1976-08-13',NULL,'36','CALLE 30 NO. 43 COL. BELLAVISTA','21','9',NULL,'15','MEXICO','017723456789',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'07856',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(118,'0118','',0,NULL,2,2,7,2,4,'JULIETA','PEREZ','REYES',NULL,'23','03','1978','2','HOGAR',NULL,NULL,'9','1978-03-23',NULL,'34 anos','CALLE 20 COL. PROGRESO','64','4',NULL,'9','MEXICO','55346789',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'07896',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(119,'0119','',0,NULL,4,2,3,3,3,'ROBERTO','PEREZ','ROBLES',NULL,'15','07','1971','1','PROFESIONISTA',NULL,NULL,'MEXIC','1971-07-15',NULL,'41 anos','CALLE 4 NO 28 COL. INDUSTRIAL','LOS GIRASOLES ','G.A. ',NULL,'MEXIC','MEXICO','5534875498',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'07895',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(120,'0120','',0,NULL,10,3,7,5,2,'RAUL','PEREZ','ROBLES',NULL,'14','02','1993','1','ESTUDIANTE',NULL,NULL,'MEXIC','1993-02-14',NULL,'19 anos','CALLE 4 NO. 25','COL ALGARIN','G.A M',NULL,'DF','MEXICO','55643876',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'07853',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(121,'0121','',0,NULL,2,2,1,2,2,'ROBERTA','PEREZ','FLORES',NULL,'14','05','1978','2','HOGAR',NULL,NULL,'13','1978-05-14',NULL,'34','CALLE 20 NO 17 COL. ALGARIN','1','5',NULL,'9','MEXICO','234567889',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'08976',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(122,'0122','',0,NULL,1,10,1,3,9,'ROMEO','SANTOS','S',NULL,'01','01','1961','1','Jubilado',NULL,NULL,'9','1961-01-01',NULL,'51','calle LL #38 Int. 41 Col. APR FOVISSSTE','','3',NULL,'','México','1234567',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'04800',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(123,'0123','',0,NULL,0,10,3,1,9,'MAURICIO','RODRIGEZ','MONTIEL',NULL,'02','08','1976','1','ventas',NULL,NULL,'9','1976-08-02',NULL,'36 anos','coyoacan ','1','3',NULL,'9','México','25600366',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'04800',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(124,'0124','',0,NULL,0,0,0,0,0,'MA','J','J',NULL,'01','01','2001','1','',NULL,NULL,'0','2001-01-01',NULL,'11 anos','','','',NULL,'0','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(125,'0125','',0,NULL,0,10,1,4,9,'CELIA','ANGELES','PAVON',NULL,'22','08','1960','2','Secretaria',NULL,NULL,'9','1960-08-22',NULL,'52','Plaza Inn','','14',NULL,'','México','12345',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'41250',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(126,'0126','',0,NULL,0,0,0,0,0,'NOMBRE','APELLIDO','MATERNO',NULL,'08','11','1979','1','',NULL,NULL,'0','1979-11-08',NULL,'32','','','',NULL,'','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(127,'0127','',0,NULL,0,0,0,0,9,'ROGELIO','HURTADO','R',NULL,'12','08','1982','1','SISTEMAS',NULL,NULL,'0','1982-08-12',NULL,'30','','','',NULL,'','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(128,'0128','',0,NULL,0,0,0,0,0,'JUAN','GOMEZ','MENDOZA',NULL,'01','02','1978','1','',NULL,NULL,'0','1978-02-01',NULL,'34','','','',NULL,'','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(129,'0129','',0,NULL,2,2,8,2,7,'MARíA LUISA','GUITIéRREZ ','MENDOZA',NULL,'05','07','1930','2','ama de casa',NULL,NULL,'9','1930-07-05',NULL,'82','conocido','47','54',NULL,'15','México','72296325',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'08500',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(130,'0130','',0,NULL,2,2,3,2,5,'CLARA','PEREZ','TORRES',NULL,'17','06','1978','2','HOGAR',NULL,NULL,'8','1978-06-17',NULL,'34 anos','CALLE 20 COL. SAN ÁNGEL','1','3',NULL,'9','MEXICO DF','33456438',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'07989',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(131,'0131','',0,NULL,3,2,0,6,4,'ANA','LOPEZ','PEREZ',NULL,'23','04','1985','2','ESTUDIANTE',NULL,NULL,'24','1985-04-23',NULL,'27','CALLE 20 NO 40','1','15',NULL,'9','MEXICO DF','36457384',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'04567',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(132,'0132','',0,NULL,11,2,5,9,2,'LUISA','PEREZ','FLORES ',NULL,'14','04','2009','2','Ninguna',NULL,NULL,'6','2009-04-14',NULL,'3','CALLE 20 NO 48 COL ALGARIN','40','7',NULL,'22','MEXICO','273786485',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'07896',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'LUISA FLORES','ESTUDIANTE','MADRE',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(133,'133','',0,NULL,2,1,1,2,9,'MARIBEL','ZARAGOZA','PEREZ',NULL,NULL,NULL,NULL,'2','AMA DE CASA',NULL,NULL,'9','1977-11-07',NULL,'35 aÃ±os','CONOCIDO ZARAGOZA','CHALCO','25',NULL,'15','M&Eacute;XICO','04598321677',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'04500',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'NOMBRE DEL PADRE','ACTIVIDAD','PARENTEZCO',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(134,'134','',0,NULL,2,10,3,2,9,'LEIBY','URIETA','HERNANDEZ',NULL,NULL,NULL,NULL,'2','SISTEMAS',NULL,NULL,'12','1976-06-09',NULL,'36 aÃ±os','DOMICILIO','COLONIA','2',NULL,'9','M&Eacute;XICO','55544962502',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'08500',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `registros` */

DROP TABLE IF EXISTS `registros`;

CREATE TABLE `registros` (
  `reg_id` int(11) NOT NULL AUTO_INCREMENT,
  `reg_idusuario` varchar(25) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `reg_nombre` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `reg_apellidoP` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `reg_apellidoM` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `reg_nexpediente` varchar(15) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `reg_idmedico` int(11) DEFAULT NULL,
  `reg_hentrada` time DEFAULT NULL,
  `reg_hconsulta` time DEFAULT NULL,
  `reg_hsalida` time DEFAULT NULL,
  `reg_fecha` date DEFAULT NULL,
  `reg_estatus` int(5) DEFAULT NULL,
  `reg_hcita` datetime DEFAULT NULL,
  `reg_idcompromiso` int(11) DEFAULT NULL,
  `reg_coordinacion` int(11) DEFAULT NULL,
  `reg_uid` int(11) DEFAULT NULL,
  `reg_udt` datetime DEFAULT NULL,
  PRIMARY KEY (`reg_id`)
) ENGINE=InnoDB AUTO_INCREMENT=138 DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `registros` */

insert  into `registros`(`reg_id`,`reg_idusuario`,`reg_nombre`,`reg_apellidoP`,`reg_apellidoM`,`reg_nexpediente`,`reg_idmedico`,`reg_hentrada`,`reg_hconsulta`,`reg_hsalida`,`reg_fecha`,`reg_estatus`,`reg_hcita`,`reg_idcompromiso`,`reg_coordinacion`,`reg_uid`,`reg_udt`) values (56,'605','david','rodriguez','arias','0001',601,'14:03:28','14:03:32','14:04:14','2012-10-12',3,NULL,NULL,1,NULL,NULL),(57,'605','silvia_miriam','rocha','angeles','0113',601,'14:05:52','14:06:00','14:06:13','2012-10-12',3,NULL,NULL,1,NULL,NULL),(58,'605','maribel','gonzalez','ramirez','0114',601,'14:06:44','14:35:00','15:03:10','2012-10-12',3,NULL,NULL,1,NULL,NULL),(59,'611','david','rodriguez','arias','0001',606,'18:06:31','18:06:32','18:25:10','2012-10-12',2,NULL,NULL,2,NULL,NULL),(60,'602','david','rodriguez','arias','0001',601,'12:48:43','12:48:56',NULL,'2012-10-15',1,NULL,NULL,1,NULL,NULL),(61,'602','david','rodriguez','arias','0001',601,'16:53:42','16:53:46','16:53:49','2012-10-17',3,NULL,NULL,1,NULL,NULL),(73,'','SILVIA MIRIAM','ROCHA','ANGELES','0113',601,'18:16:02',NULL,NULL,'2012-12-11',2,NULL,NULL,1,NULL,NULL),(74,'','JUAN','MONTES','ROBLES','0116',606,'18:16:33',NULL,NULL,'2012-12-11',2,NULL,NULL,2,NULL,NULL),(75,'','SILVIA MIRIAM','ROCHA','ANGELES','0113',601,'18:17:53',NULL,NULL,'2012-12-11',2,NULL,NULL,1,NULL,NULL),(76,'','ROBERTO','PEREZ','ROBLES','0119',601,'18:23:22',NULL,NULL,'2012-12-11',2,NULL,NULL,1,NULL,NULL),(77,'','maribel','z','z','Por asignar',606,'18:30:54',NULL,NULL,'2012-12-11',2,NULL,NULL,2,NULL,NULL),(78,'','SILVIA MIRIAM','ROCHA','ANGELES','0113',607,'19:31:09',NULL,NULL,'2012-12-11',2,NULL,NULL,2,NULL,NULL),(79,'','CARLOS','PEREZ','FLORES','0117',608,'19:27:27',NULL,NULL,'2012-12-11',2,NULL,NULL,2,NULL,NULL),(80,'','CELIA','ANGELES','PAVON','0125',607,'19:28:08',NULL,NULL,'2012-12-11',2,NULL,NULL,2,NULL,NULL),(81,'601','ROBERTO ','PEREZ','FLORES','0115',607,'19:33:23',NULL,NULL,'2012-12-11',2,NULL,NULL,2,NULL,NULL),(82,'601','JUAN','GOMEZ','MENDOZA','0128',607,'09:29:17','09:29:23',NULL,'2012-12-12',1,NULL,NULL,2,NULL,NULL),(83,'1','ROBERTO ','PEREZ','FLORES','0115',608,'09:46:18',NULL,NULL,'2012-12-12',2,NULL,NULL,2,NULL,NULL),(84,'601','JUAN','MONTES','ROBLES','0116',606,'09:52:44',NULL,NULL,'2012-12-12',2,NULL,NULL,2,NULL,NULL),(85,'601','Roberto','Jaramillo','RamÃ­rez','Por asignar',609,'09:53:10','13:43:42','13:46:16','2012-12-12',3,NULL,NULL,2,NULL,NULL),(87,'601','MAURICIO','RODRIGEZ','MONTIEL','0123',616,'12:02:10','12:02:25','12:49:04','2012-12-12',3,NULL,NULL,9,NULL,NULL),(89,'601','MARIBEL','ZARAGOZA','PEREZ','133',607,'12:49:55','13:55:58','13:56:02','2012-12-12',3,NULL,NULL,2,NULL,NULL),(90,'601','ROBERTO','PEREZ','ROBLES','0119',616,'13:43:36','13:55:52','13:56:05','2012-12-12',3,NULL,NULL,9,NULL,NULL),(91,'1','ROBERTA','PEREZ','FLORES','0121',608,'11:00:40',NULL,NULL,'2012-12-13',2,NULL,NULL,2,NULL,NULL),(92,'601','CELIA','ANGELES','PAVON','0125',608,'11:01:49',NULL,NULL,'2012-12-13',2,NULL,NULL,2,NULL,NULL),(93,'602','Carlos','Castillo','Reyes','Por asignar',601,'11:13:58',NULL,NULL,'2012-12-21',2,NULL,NULL,1,NULL,NULL),(94,'602','ROBERTO ','PEREZ','FLORES','0115',607,'11:26:01','11:26:21','11:26:24','2012-12-21',3,NULL,NULL,2,NULL,NULL),(103,'1','DAVID','RODRÃ­GUEZ','ARIAS','0001',601,'18:59:57',NULL,NULL,'2013-04-02',2,NULL,NULL,1,NULL,NULL),(104,'1','RAUL','PEREZ','ROBLES','0120',606,'12:48:13',NULL,NULL,'2013-04-03',2,NULL,NULL,2,NULL,NULL),(105,'1','ROBERTO','PEREZ','ROBLES','0119',616,'12:48:45',NULL,NULL,'2013-04-03',2,NULL,NULL,9,NULL,NULL),(106,'1','ROBERTO ','PEREZ','FLORES','0115',601,'11:42:31',NULL,NULL,'2013-04-05',2,NULL,NULL,1,NULL,NULL),(107,'1','vkjjkl','kjkl','j','Por asignar',601,'11:42:44',NULL,NULL,'2013-04-05',2,NULL,NULL,1,NULL,NULL),(108,'1','hola','hola','hola','Por asignar',601,'11:43:29',NULL,NULL,'2013-04-05',2,NULL,NULL,1,NULL,NULL),(109,'1','Ricardo','Cortes','Romo','Por asignar',601,'18:56:55',NULL,NULL,'2013-04-11',2,NULL,NULL,1,1,'2013-04-11 18:56:55'),(110,'1','ROBERTO ','PEREZ','FLORES','115',609,'18:58:59',NULL,NULL,'2013-04-11',2,NULL,NULL,2,1,'2013-04-11 18:58:59'),(111,'1','MA','J','J','124',606,'18:59:08',NULL,NULL,'2013-04-11',2,NULL,NULL,2,1,'2013-04-11 18:59:08'),(112,'1','MA','J','J','124',606,'19:05:10',NULL,NULL,'2013-04-11',2,NULL,NULL,2,1,'2013-04-11 19:05:10'),(113,'1',NULL,NULL,NULL,'112',606,'19:05:18',NULL,NULL,'2013-04-11',2,NULL,NULL,2,1,'2013-04-11 19:05:18'),(114,'1','John','Lennon','Perez','Por asignar',605,'19:14:54',NULL,NULL,'2013-04-11',2,NULL,NULL,1,1,'2013-04-11 19:14:54'),(115,'1','Juan','Perez','Lopez','Por asignar',605,'19:16:13',NULL,NULL,'2013-04-12',2,NULL,NULL,1,1,'2013-04-11 19:16:13'),(116,'1','Paul','Mccarntey','Lopez','Por asignar',605,'19:25:51',NULL,NULL,'2013-04-12',2,NULL,NULL,1,1,'2013-04-11 19:25:51'),(117,'1','CARLOS','PEREZ','FLORES','0117',601,'19:27:15',NULL,NULL,'2013-04-12',2,NULL,NULL,1,1,'2013-04-11 19:27:15'),(118,'1','MARIBEL','GONZALEZ','RAMIREZ','0114',611,'19:27:55',NULL,NULL,'2013-04-11',2,NULL,NULL,2,1,'2013-04-11 19:27:55'),(119,'1','ROMEO','SANTOS','S','0122',615,'13:04:48',NULL,NULL,'2013-04-12',2,NULL,NULL,9,1,'2013-04-12 13:04:48'),(120,NULL,'MARIBEL','GONZALEZ','RAMIREZ','0114',1,'13:09:36',NULL,NULL,'2013-04-12',2,NULL,NULL,NULL,1,'2013-04-12 13:09:36'),(121,NULL,'MARIBEL','GONZALEZ','RAMIREZ','0114',1,'13:10:21',NULL,NULL,'2013-04-12',2,NULL,NULL,NULL,1,'2013-04-12 13:10:21'),(122,NULL,'MARIBEL','GONZALEZ','RAMIREZ','0114',1,'13:12:53',NULL,NULL,'2013-04-12',2,NULL,NULL,NULL,1,'2013-04-12 13:12:54'),(123,NULL,'MARIBEL','GONZALEZ','RAMIREZ','0114',1,'13:12:58',NULL,NULL,'2013-04-12',2,NULL,NULL,NULL,1,'2013-04-12 13:12:58'),(124,NULL,'MARIBEL','GONZALEZ','RAMIREZ','0114',1,'13:14:12',NULL,NULL,'2013-04-12',2,NULL,NULL,NULL,1,'2013-04-12 13:14:12'),(125,NULL,'CARLOS','PEREZ','FLORES','0117',610,'13:52:59',NULL,NULL,'2013-04-12',2,NULL,NULL,2,1,'2013-04-12 13:52:59'),(126,NULL,'ROBERTO ','PEREZ','FLORES','0115',615,'17:51:47',NULL,NULL,'2013-04-12',2,NULL,NULL,9,1,'2013-04-12 17:51:47'),(127,NULL,'ROBERTO ','PEREZ','FLORES','0115',1,'17:52:05',NULL,NULL,'2013-04-12',2,NULL,NULL,NULL,1,'2013-04-12 17:52:05'),(128,NULL,'','','','Por asignar',1,'17:52:12',NULL,NULL,'2013-04-12',2,NULL,NULL,NULL,1,'2013-04-12 17:52:12'),(129,NULL,'John','Lennon','Test','Por asignar',1,'17:52:44',NULL,NULL,'2013-04-12',2,NULL,NULL,NULL,1,'2013-04-12 17:52:44'),(130,NULL,'DAVID','RODR&iacute;GUEZ','ARIAS','0001',611,'17:55:19',NULL,NULL,'2013-04-12',2,NULL,NULL,2,1,'2013-04-12 17:55:19'),(131,NULL,'ROBERTO ','PEREZ','FLORES','0115',611,'17:55:25',NULL,NULL,'2013-04-12',2,NULL,NULL,2,1,'2013-04-12 17:55:25'),(132,NULL,'','','','Por asignar',611,'17:55:45',NULL,NULL,'2013-04-12',2,NULL,NULL,2,1,'2013-04-12 17:55:45'),(133,NULL,'John','Lennon','Test','Por asignar',1,'18:04:14',NULL,NULL,'2013-04-12',2,NULL,NULL,NULL,1,'2013-04-12 18:04:14'),(134,NULL,'John','Lennon','Test8','Por asignar',1,'18:04:33',NULL,NULL,'2013-04-12',2,NULL,NULL,NULL,1,'2013-04-12 18:04:33'),(135,NULL,'LEIBY','URIETA','HERNANDEZ','134',616,'10:00:19',NULL,NULL,'2013-04-15',2,NULL,NULL,9,1,'2013-04-15 10:00:19'),(136,NULL,'Ricardo','Cortes','Romo','Por asignar',611,'10:00:37',NULL,NULL,'2013-04-15',2,NULL,NULL,2,1,'2013-04-15 10:00:37'),(137,NULL,'Ricardo','Lennon','Romo','Por asignar',605,'13:17:10',NULL,NULL,'2013-04-16',2,NULL,NULL,1,1,'2013-04-16 13:17:10');

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `usu_id` int(11) NOT NULL AUTO_INCREMENT,
  `usu_usuario` varchar(25) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `usu_password` varchar(25) COLLATE latin1_general_ci DEFAULT NULL,
  `usu_nombre` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `usu_nivel` varchar(2) COLLATE latin1_general_ci DEFAULT NULL,
  `usu_especialidad` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `usu_zona` int(3) DEFAULT '1',
  `usu_cedula` varchar(30) COLLATE latin1_general_ci DEFAULT NULL,
  `usu_direccion` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `usu_telefono` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `usu_celular` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `usu_coordinacion` int(1) DEFAULT NULL,
  `usu_conectado` int(1) DEFAULT NULL,
  `usu_turno` int(1) DEFAULT NULL,
  `usu_language` varchar(50) COLLATE latin1_general_ci DEFAULT 'Spanish',
  `usu_clinica` int(5) DEFAULT NULL,
  `usu_activo` enum('1','0') COLLATE latin1_general_ci DEFAULT '1',
  `usu_fecha_alta` date DEFAULT NULL,
  `usu_fecha_baja` date DEFAULT NULL,
  `usu_uid` int(11) DEFAULT NULL,
  `usu_udt` datetime DEFAULT NULL,
  PRIMARY KEY (`usu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=618 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Data for the table `usuarios` */

insert  into `usuarios`(`usu_id`,`usu_usuario`,`usu_password`,`usu_nombre`,`usu_nivel`,`usu_especialidad`,`usu_zona`,`usu_cedula`,`usu_direccion`,`usu_telefono`,`usu_celular`,`usu_coordinacion`,`usu_conectado`,`usu_turno`,`usu_language`,`usu_clinica`,`usu_activo`,`usu_fecha_alta`,`usu_fecha_baja`,`usu_uid`,`usu_udt`) values (1,'rcortes','rcortes','Ricardo Cortes','2','Sistemas',1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Spanish',NULL,'1',NULL,NULL,NULL,NULL),(601,'ramireze','03fuentes13','Erick Javier Ramírez Fuentes','3','Medicina General',1,'5743849',NULL,NULL,NULL,1,NULL,NULL,'Spanish',0,'1','2012-10-16',NULL,NULL,NULL),(602,'leya','03pantoja13','Alma Delia Ley Pantoja','4','Trabajo Social',1,'',NULL,NULL,NULL,1,NULL,NULL,'Spanish',0,'1','2012-10-16',NULL,NULL,NULL),(603,'hernandezd','03velazquez13','David Hernández Velázquez','4','Trabajo Social',1,'',NULL,NULL,NULL,1,NULL,NULL,'Spanish',0,'1','2012-10-16',NULL,NULL,NULL),(604,'rivasg','03gonzalez13','Guillermina Rivas González','4','Trabajo Social',1,'',NULL,NULL,NULL,1,NULL,NULL,'Spanish',0,'1','2012-10-16',NULL,NULL,NULL),(605,'mendozam','03may13','María Virginia Mendoza May','2','Recepción',1,'',NULL,NULL,NULL,1,NULL,NULL,'Spanish',0,'1','2012-10-16',NULL,NULL,NULL),(606,'gomezsa','03sanchez13','Eyvin Areli Gómez Sánchez','1','Psicología',1,'4914713',NULL,NULL,NULL,2,NULL,NULL,'Spanish',0,'1','2012-10-16',NULL,NULL,NULL),(607,'wongj','03huicochea13','Julieta Helena Wong Huicochea','1','Psicología',1,'5059946',NULL,NULL,NULL,2,NULL,NULL,'Spanish',0,'1','2012-10-16',NULL,NULL,NULL),(608,'salazaram','m1r93ls','Arely Mariel Salazar Góngora','1','Psicología',1,'7509637',NULL,NULL,NULL,2,NULL,NULL,'Spanish',0,'1','2012-10-16',NULL,NULL,NULL),(609,'carrillol','03estrella13','Luisa Alejandrina Carrillo Estrella','1','Psicología',1,'',NULL,NULL,NULL,2,NULL,NULL,'Spanish',0,'1','2012-10-16',NULL,NULL,NULL),(610,'cahuml','03chan13','Leidy del Rosario Cahum Chan','1','Psicología',1,'5809805',NULL,NULL,NULL,2,NULL,NULL,'Spanish',0,'1','2012-10-16',NULL,NULL,NULL),(611,'dianask','03diamay13','Keila Dianas May','2','Recepción',1,'',NULL,NULL,NULL,2,NULL,NULL,'Spanish',0,'1','2012-10-16',NULL,NULL,NULL),(612,'reynaga','03reygonza13','Anahí Reyna González','4','Trabajo Social',1,'',NULL,NULL,NULL,2,NULL,NULL,'Spanish',0,'1','2012-10-16',NULL,NULL,NULL),(613,'velazquezs','03sauri13','Lidia Velázquez Sauri','4','Trabajo Social',1,'',NULL,NULL,NULL,1,NULL,NULL,'Spanish',0,'1','2012-10-16',NULL,NULL,NULL),(614,'castillas','03santana13','Alberto Vidal Castilla Santana','4','Trabajo Social',1,'',NULL,NULL,NULL,1,NULL,NULL,'Spanish',0,'1','2012-10-16',NULL,NULL,NULL),(615,'villanuevan','03perez13','Nury Villanueva Pérez','9','Coordinadora Administrativa de DIF',1,'','','','',9,0,0,'Spanish',0,'1','2012-10-16',NULL,NULL,NULL),(616,'matosa','03arguelles13','Addiel Matos Arguelles','9','Coordinadora de Planeación de DIF',1,'','','','',9,0,0,'Spanish',0,'1','2012-10-16',NULL,NULL,NULL),(617,'nabmorales','03cobos13','Nabilé E. Morales Cobos              ','4','Trabajo Social',1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Spanish',NULL,'1',NULL,NULL,NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;