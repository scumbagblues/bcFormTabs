/*
SQLyog Enterprise - MySQL GUI v8.13 
MySQL - 5.5.31-0ubuntu0.12.04.1 : Database - bluecare_chetumal
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `antecedentes_heredofam` */

insert  into `antecedentes_heredofam`(`ahf_id`,`ahf_materno`,`ahf_paterno`,`ahf_pacid`) values (3,'no tiene','no tiene',27),(4,'no tiene','no tiene',27),(5,'no tiene','no tiene',27);

/*Table structure for table `antecedentes_nopatologicos` */

DROP TABLE IF EXISTS `antecedentes_nopatologicos`;

CREATE TABLE `antecedentes_nopatologicos` (
  `anp_id` int(11) NOT NULL AUTO_INCREMENT,
  `anp_menarca` varchar(5) DEFAULT NULL,
  `anp_ritmo` varchar(5) DEFAULT NULL,
  `anp_edadiniciosexual` datetime DEFAULT NULL,
  `anp_fechaultimamest` datetime DEFAULT NULL,
  `anp_fechaultimopapanico` datetime DEFAULT NULL,
  `anp_examenmamas` varchar(5) DEFAULT NULL,
  `anp_multiplepareja` enum('Si','No') DEFAULT NULL,
  `anp_fechausoanticon` datetime DEFAULT NULL,
  `anp_toxemia` varchar(35) DEFAULT NULL,
  `anp_legradouterino` varchar(30) DEFAULT NULL,
  `anp_dieta` enum('Buena','Regular','Mala') DEFAULT NULL,
  `anp_tabaco` enum('Buena','Regular','Mala') DEFAULT NULL,
  `anp_alcohol` enum('Buena','Regular','Mala') DEFAULT NULL,
  `anp_vivienda` enum('Buena','Regular','Mala') DEFAULT NULL,
  `anp_servicio` enum('Buena','Regular','Mala') DEFAULT NULL,
  `anp_fauna` enum('Buena','Regular','Mala') DEFAULT NULL,
  `anp_promiscuidad` enum('Si','No') DEFAULT NULL,
  `anp_hacinamiento` enum('Si','No') DEFAULT NULL,
  `anp_biologico` varchar(45) DEFAULT NULL,
  `anp_sabin` varchar(3) DEFAULT NULL,
  `anp_dpt` varchar(3) DEFAULT NULL,
  `anp_bcg` varchar(3) DEFAULT NULL,
  `anp_dobleviral` varchar(3) DEFAULT NULL,
  `anp_tviral` varchar(3) DEFAULT NULL,
  `anp_antihepatitisb` varchar(3) DEFAULT NULL,
  `anp_pentavalente` varchar(3) DEFAULT NULL,
  `anp_influenza` varchar(3) DEFAULT NULL,
  `anp_antineumocos` varchar(3) DEFAULT NULL,
  `anp_antirabicah` varchar(3) DEFAULT NULL,
  `anp_pacid` int(11) NOT NULL,
  PRIMARY KEY (`anp_id`),
  KEY `fk_antecedentes_patologicos_paciente1_idx` (`anp_pacid`),
  CONSTRAINT `fk_antecedentes_patologicos_paciente1` FOREIGN KEY (`anp_pacid`) REFERENCES `paciente` (`pac_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `antecedentes_nopatologicos` */

insert  into `antecedentes_nopatologicos`(`anp_id`,`anp_menarca`,`anp_ritmo`,`anp_edadiniciosexual`,`anp_fechaultimamest`,`anp_fechaultimopapanico`,`anp_examenmamas`,`anp_multiplepareja`,`anp_fechausoanticon`,`anp_toxemia`,`anp_legradouterino`,`anp_dieta`,`anp_tabaco`,`anp_alcohol`,`anp_vivienda`,`anp_servicio`,`anp_fauna`,`anp_promiscuidad`,`anp_hacinamiento`,`anp_biologico`,`anp_sabin`,`anp_dpt`,`anp_bcg`,`anp_dobleviral`,`anp_tviral`,`anp_antihepatitisb`,`anp_pentavalente`,`anp_influenza`,`anp_antineumocos`,`anp_antirabicah`,`anp_pacid`) values (3,'si','si','2012-12-12 00:00:00',NULL,'2012-12-12 00:00:00','si','Si','2012-12-12 00:00:00','si','si','Buena','Buena','Buena','Buena','Buena','Buena','Si','Si',NULL,'no','no','no','no','no',NULL,'no','no','no','no',27),(4,'si','si','2012-12-12 00:00:00',NULL,'2012-12-12 00:00:00','si','Si','2012-12-12 00:00:00','si','si','Buena','Buena','Buena','Buena','Buena','Buena','Si','Si',NULL,'no','no','no','no','no',NULL,'no','no','no','no',27),(5,'si','si','2012-12-12 00:00:00',NULL,'2012-12-12 00:00:00','si','Si','2012-12-12 00:00:00','si','si','Buena','Buena','Buena','Buena','Buena','Buena','Si','Si',NULL,'no','no','no','no','no',NULL,'no','no','no','no',27);

/*Table structure for table `antecedentes_patologicos` */

DROP TABLE IF EXISTS `antecedentes_patologicos`;

CREATE TABLE `antecedentes_patologicos` (
  `apa_id` int(11) NOT NULL AUTO_INCREMENT,
  `apa_pacid` int(11) NOT NULL,
  `apa_sarampion` enum('Si','No') DEFAULT NULL,
  `apa_rubeola` enum('Si','No') DEFAULT NULL,
  `apa_tosferina` enum('Si','No') DEFAULT NULL,
  `apa_varicela` enum('Si','No') DEFAULT NULL,
  `apa_escarlatina` enum('Si','No') DEFAULT NULL,
  `apa_amigdalitis` enum('Si','No') DEFAULT NULL,
  `apa_hepatitis` enum('Si','No') DEFAULT NULL,
  `apa_convulsiones` enum('Si','No') DEFAULT NULL,
  `apa_urosepsis` enum('Si','No') DEFAULT NULL,
  `apa_traumatismo` enum('Si','No') DEFAULT NULL,
  `apa_cirugia` enum('Si','No') DEFAULT NULL,
  `apa_ingresohospital` enum('Si','No') DEFAULT NULL,
  `apa_otros` enum('Si','No') DEFAULT NULL,
  `apa_sonrio` varchar(5) DEFAULT NULL,
  `apa_sostuvocabeza` varchar(5) DEFAULT NULL,
  `apa_sento` varchar(5) DEFAULT NULL,
  `apa_gateo` varchar(5) DEFAULT NULL,
  `apa_camino` varchar(5) DEFAULT NULL,
  `apa_hablo` varchar(5) DEFAULT NULL,
  `apa_controlesfinteres` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`apa_id`),
  KEY `fk_antecedentes_nopatologicos_paciente1_idx` (`apa_pacid`),
  CONSTRAINT `fk_antecedentes_nopatologicos_paciente1` FOREIGN KEY (`apa_pacid`) REFERENCES `paciente` (`pac_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `antecedentes_patologicos` */

insert  into `antecedentes_patologicos`(`apa_id`,`apa_pacid`,`apa_sarampion`,`apa_rubeola`,`apa_tosferina`,`apa_varicela`,`apa_escarlatina`,`apa_amigdalitis`,`apa_hepatitis`,`apa_convulsiones`,`apa_urosepsis`,`apa_traumatismo`,`apa_cirugia`,`apa_ingresohospital`,`apa_otros`,`apa_sonrio`,`apa_sostuvocabeza`,`apa_sento`,`apa_gateo`,`apa_camino`,`apa_hablo`,`apa_controlesfinteres`) values (3,27,'Si','Si','Si','Si',NULL,'Si','Si','Si','Si','Si','Si','Si',NULL,'s','s','s','s','s','s','s'),(4,27,'Si','Si','Si','Si',NULL,'Si','Si','Si','Si','Si','Si','Si',NULL,'s','s','s','s','s','s','s'),(5,27,'Si','Si','Si','Si',NULL,'Si','Si','Si','Si','Si','Si','Si',NULL,'s','s','s','s','s','s','s');

/*Table structure for table `enfermedades_cie10` */

DROP TABLE IF EXISTS `enfermedades_cie10`;

CREATE TABLE `enfermedades_cie10` (
  `enf_id` int(11) NOT NULL AUTO_INCREMENT,
  `enf_codigo` varchar(5) DEFAULT NULL,
  `enf_nombre` varchar(45) DEFAULT NULL,
  `enf_descripcion` varchar(145) DEFAULT NULL,
  PRIMARY KEY (`enf_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

/*Data for the table `enfermedades_cie10` */

insert  into `enfermedades_cie10`(`enf_id`,`enf_codigo`,`enf_nombre`,`enf_descripcion`) values (1,'A300','LEPRA','Lepra indeterminada'),(2,'A33X','TETANOS NEONATAL','Tétanos neonatal'),(3,'A360','DIFTERIA','Difteria faríngea'),(4,'A370','TOSFERINA','Tos ferina debida a Bordetella pertussis'),(5,'A040','INF.INSTESTINALES X OTROS ORG.','Infección debida a Escherichia coli enteropatógena'),(6,'T600','INTOXICACION POR PLAGUICIDAS','Insecticidas organofosforados y carbamatos'),(7,'A171','INFECCIONES NOCOSOMIALES','Tuberculoma meníngeo'),(8,'J100','INFLUENZA','Influenza con neumonía, debida a virus de la influenza identificado\"'),(9,'F115','ADICCIONES','Trastornos mentales y del comportamiento debidos al uso de opiáceos, trastorno psicótico'),(10,'U98X','PARALISIS FLACIDA AGUDA','Parálisis Flacida Aguda'),(11,'A150','TUBERCULOSIS RESPIRATORIA','Tuberculosis del pulmón, confirmada por hallazgo microscópico del bacilo tuberculoso en esputo, con o sin cultivo\"'),(12,'A820','LEPTOSPIROSIS','Rabia selvática'),(13,'Y58','Efectos adversos temporalmente asociados a va','Efectos adversos de vacunas bacterianas'),(14,'B200','SIDA','Enfermedad por VIH, resultante en infección por micobacterias\"'),(15,'P350','RUBEOLA CONGENITA','Síndrome de rubéola congénita'),(16,'A34X','TETANOS','Tétanos obstétrico'),(17,'U97X','ENF.FEBRIL EXANTEMATICA','Enfermeded febril exantemática'),(18,'A91X','FIEBRE HEMORRAGICA POR DENGUE','Fiebre del dengue hemorrágico'),(19,'G000','MENINGITIS','Meningitis por hemófilos');

/*Table structure for table `evolucion_medica` */

DROP TABLE IF EXISTS `evolucion_medica`;

CREATE TABLE `evolucion_medica` (
  `evo_id` int(11) NOT NULL AUTO_INCREMENT,
  `evo_pacid` int(11) NOT NULL,
  `evo_fecha` datetime DEFAULT NULL,
  `evo_datos` varchar(100) DEFAULT NULL,
  `evo_tratamiento` varchar(45) DEFAULT NULL,
  `evo_uid` int(11) DEFAULT NULL,
  `evo_udt` datetime DEFAULT NULL,
  PRIMARY KEY (`evo_id`),
  KEY `fk_evolucion_medica_paciente1` (`evo_pacid`),
  CONSTRAINT `fk_evolucion_medica_paciente1` FOREIGN KEY (`evo_pacid`) REFERENCES `paciente` (`pac_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `evolucion_medica` */

insert  into `evolucion_medica`(`evo_id`,`evo_pacid`,`evo_fecha`,`evo_datos`,`evo_tratamiento`,`evo_uid`,`evo_udt`) values (1,25,'2013-04-23 00:00:00','todo bien','solo vs VIH',1,'2013-04-30 17:49:04'),(2,25,'2013-04-02 00:00:00','todo bien','solo vs Gripa',1,'2013-04-30 17:52:07'),(3,25,'2013-04-30 00:00:00','todo bien','solo vs Tos',1,'2013-04-30 18:21:50'),(5,27,'2013-05-08 00:00:00','todo bien','solo vs Gripa',1,'2013-05-07 18:00:10');

/*Table structure for table `exploracion_fisica` */

DROP TABLE IF EXISTS `exploracion_fisica`;

CREATE TABLE `exploracion_fisica` (
  `exp_id` int(11) NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `exploracion_fisica` */

insert  into `exploracion_fisica`(`exp_id`,`exp_peso`,`exp_talla`,`exp_pulso`,`exp_resp`,`exp_craneo`,`exp_cara`,`exp_ojos`,`exp_nariz`,`exp_bocafaringe`,`exp_cuello`,`exp_torax`,`exp_apresp`,`exp_apdig`,`exp_apcardio`,`exp_abdomen`,`exp_genitouri`,`exp_extremidades`,`exp_apmusc`,`exp_snc`,`exp_otros`,`exp_descripciones`,`exp_pacid`) values (1,'23','12','12','si','Normal','Normal','Normal','Normal','Normal','Normal','Normal','Normal','Normal','Normal','Normal','Normal','Normal',NULL,'Normal','Normal',NULL,27),(2,'23','12','12','si','Normal','Normal','Normal','Normal','Normal','Normal','Normal','Normal','Normal','Normal','Normal','Normal','Normal',NULL,'Normal','Normal',NULL,27),(3,'23','12','12','si','Normal','Normal','Normal','Normal','Normal','Normal','Normal','Normal','Normal','Normal','Normal','Normal','Normal',NULL,'Normal','Normal',NULL,27);

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `paciente_extras` */

insert  into `paciente_extras`(`pex_id`,`pex_impresion`,`pex_exsolicitados`,`pex_terapeutica`,`pex_referido`,`pex_urgencia`,`pex_pacid`) values (1,'si','si','si','Consulta externa','Si',27),(2,'si','si','si','Consulta externa','Si',27),(3,'si','si','si','Consulta externa','Si',27);

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
  `pid_estadocivil` enum('Casado/Casada','Soltero/Soltera','Madre/Padre soltero','Viudo/Viuda','Divoricado/Divorciada','Unión libre','Separado') DEFAULT NULL,
  `pid_perfil` text,
  `pid_pacid` int(11) NOT NULL,
  PRIMARY KEY (`pid_id`),
  KEY `fk_paciente_identificacion_paciente1` (`pid_pacid`),
  CONSTRAINT `fk_paciente_identificacion_paciente1` FOREIGN KEY (`pid_pacid`) REFERENCES `paciente` (`pac_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `paciente_identificacion` */

insert  into `paciente_identificacion`(`pid_id`,`pid_interrogatorio`,`pid_ministerio`,`pid_fechanac`,`pid_ocupacion`,`pid_residencia`,`pid_sexo`,`pid_estadocivil`,`pid_perfil`,`pid_pacid`) values (6,'Si','Si','28/05/1987','Estudia','Guadalajara','H','Casado/Casada','Test Paciente existente',27),(7,'Si','Si','28/05/1987','Estudia','Guadalajara','H','Casado/Casada','Test Paciente existente',27),(8,'Si','Si','28/05/1987','Estudia','Guadalajara','H','Casado/Casada','Test Paciente existente',27);

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `paciente_padecimiento` */

insert  into `paciente_padecimiento`(`pad_id`,`pad_evolucion`,`pad_pacid`,`pad_signos`,`pad_sintomas`) values (3,'24 a 72 hrs',27,'buenos','buenos'),(4,'24 a 72 hrs',27,'buenos','buenos'),(5,'24 a 72 hrs',27,'buenos','buenos');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
