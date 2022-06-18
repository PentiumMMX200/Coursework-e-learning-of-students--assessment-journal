CREATE DATABASE  IF NOT EXISTS `journal`
USE `journal`;


DROP TABLE IF EXISTS `auditorium`;
CREATE TABLE `auditorium` (
  `A_auditorium_id` int NOT NULL,
  `A_Building` varchar(1) NOT NULL,
  PRIMARY KEY (`A_auditorium_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups` (
  `G_id` int NOT NULL,
  `G_course` varchar(1) NOT NULL,
  `G_group` varchar(6) NOT NULL,
  `G_profession` varchar(45) NOT NULL,
  `G_num_of_studs` varchar(2) NOT NULL,
  `G_teacher` int NOT NULL,
  PRIMARY KEY (`G_id`),
  KEY `groups_idx` (`G_group`),
  KEY `teachlead_idx` (`G_teacher`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


DROP TABLE IF EXISTS `login`;
CREATE TABLE `login` (
  `idlog` int NOT NULL AUTO_INCREMENT,
  `login` varchar(20) NOT NULL,
  `passwd` varchar(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `idprepoda` int DEFAULT NULL,
  PRIMARY KEY (`idlog`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


DROP TABLE IF EXISTS `marks`;
CREATE TABLE `marks` (
  `M_id` int NOT NULL AUTO_INCREMENT,
  `S_id` int NOT NULL,
  `M_study_subs` varchar(45) NOT NULL,
  `M_Attendance` varchar(2) DEFAULT NULL,
  `M_Mark` int DEFAULT NULL,
  `M_Date` date NOT NULL,
  `G_group` varchar(6) NOT NULL,
  PRIMARY KEY (`M_id`),
  KEY `Student` (`S_id`),
  KEY `Subs` (`M_study_subs`),
  KEY `group` (`G_group`),
  CONSTRAINT `student` FOREIGN KEY (`S_id`) REFERENCES `students` (`S_id`),
  CONSTRAINT `Subs` FOREIGN KEY (`M_study_subs`) REFERENCES `study subjects` (`Ss_Subject_name`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


DROP TABLE IF EXISTS `students`;
CREATE TABLE `students` (
  `S_id` int NOT NULL AUTO_INCREMENT,
  `S_Surname` varchar(15) NOT NULL,
  `S_Firstname` varchar(15) NOT NULL,
  `S_Patronymic` varchar(15) NOT NULL,
  `S_group` varchar(6) NOT NULL,
  PRIMARY KEY (`S_id`),
  KEY `groups` (`S_group`),
  CONSTRAINT `groups` FOREIGN KEY (`S_group`) REFERENCES `groups` (`G_group`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

DROP TABLE IF EXISTS `study subjects`;
CREATE TABLE `study subjects` (
  `Ss_id` int NOT NULL,
  `Ss_Subject_name` varchar(45) DEFAULT NULL,
  `Ss_Teacher` int NOT NULL,
  `Ss_group` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`Ss_id`),
  KEY `subjects` (`Ss_Subject_name`),
  KEY `subteachers_idx` (`Ss_Teacher`),
  CONSTRAINT `subteachers` FOREIGN KEY (`Ss_Teacher`) REFERENCES `teachers` (`Tc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


DROP TABLE IF EXISTS `teachers`;
CREATE TABLE `teachers` (
  `Tc_id` int NOT NULL,
  `Tc_Surname` varchar(45) NOT NULL,
  `Tc_Firstname` varchar(45) NOT NULL,
  `Tc_Patronymic` varchar(45) NOT NULL,
  PRIMARY KEY (`Tc_id`),
  KEY `id` (`Tc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


DROP TABLE IF EXISTS `time`;
CREATE TABLE `time` (
  `T_number_id` int NOT NULL,
  `T_start` varchar(10) NOT NULL,
  `T_end` varchar(10) NOT NULL,
  PRIMARY KEY (`T_number_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


DROP TABLE IF EXISTS `weekday`;
CREATE TABLE `weekday` (
  `W_id` int NOT NULL,
  `W_name_week_day` varchar(10) NOT NULL,
  PRIMARY KEY (`W_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
