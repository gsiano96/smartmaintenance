-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Creato il: Mag 30, 2020 alle 13:54
-- Versione del server: 8.0.19
-- Versione PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT = @@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS = @@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION = @@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smartmaintenance`
--
CREATE DATABASE IF NOT EXISTS `smartmaintenance` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `smartmaintenance`;

-- --------------------------------------------------------

--
-- Struttura della tabella `entities_class_properties`
--

DROP TABLE IF EXISTS `entities_class_properties`;
CREATE TABLE IF NOT EXISTS `entities_class_properties`
(
    `id_entity_class` int NOT NULL,
    `id_property`     int NOT NULL,
    PRIMARY KEY (`id_entity_class`, `id_property`),
    KEY `fk_property_has_entity_class_entity_class1_idx` (`id_entity_class`),
    KEY `fk_property_has_entity_class_property1_idx` (`id_property`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

--
-- Dump dei dati per la tabella `entities_class_properties`
--

INSERT INTO `entities_class_properties` (`id_entity_class`, `id_property`)
VALUES (1, 1),
       (2, 1),
       (2, 2),
       (3, 1),
       (4, 1),
       (5, 1),
       (6, 11),
       (7, 11);

-- --------------------------------------------------------

--
-- Struttura della tabella `entities_properties`
--

DROP TABLE IF EXISTS `entities_properties`;
CREATE TABLE IF NOT EXISTS `entities_properties`
(
    `id_entity`   int NOT NULL,
    `id_property` int NOT NULL,
    `value`       varchar(450) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
    PRIMARY KEY (`id_entity`, `id_property`),
    KEY `fk_property_has_entity_entity1_idx` (`id_entity`),
    KEY `fk_property_has_entity_property1_idx` (`id_property`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

--
-- Dump dei dati per la tabella `entities_properties`
--

INSERT INTO `entities_properties` (`id_entity`, `id_property`, `value`)
VALUES (1, 2, 'Salerno'),
       (1, 3, 'Private'),
       (1, 4, 'Secondary'),
       (1, 5, '50'),
       (1, 6, '+39 3455993292'),
       (2, 7, 'Via Giovanni Amendola 68'),
       (5, 8, '100-10,000 units annually'),
       (6, 9, 'Preventive - TBM'),
       (15, 10, '7'),
       (17, 10, '3'),
       (18, 10, '5'),
       (18, 24,
        'Plant stopped from 12:23 p.m. pending intervention. Smoke from the XX4 compressor as a result of loud noise'),
       (21, 24,
        'The plant is closed from 00/00/20 to 00/00/20; On the remaining days, it\'s possible to intervene only after 15:00');

-- --------------------------------------------------------

--
-- Struttura della tabella `entity`
--

DROP TABLE IF EXISTS `entity`;
CREATE TABLE IF NOT EXISTS `entity`
(
    `id_entity`       int NOT NULL AUTO_INCREMENT,
    `name`            varchar(45) DEFAULT NULL,
    `id_entity_class` int NOT NULL,
    PRIMARY KEY (`id_entity`),
    KEY `fk_entity_entity_class1_idx` (`id_entity_class`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 24
  DEFAULT CHARSET = utf8;

--
-- Dump dei dati per la tabella `entity`
--

INSERT INTO `entity` (`id_entity`, `name`, `id_entity_class`)
VALUES (1, 'SMART INDUSTRY 4.0', 1),
       (2, 'Site1-Fisciano', 2),
       (3, 'Site2-Avellino', 2),
       (4, 'Site3-Napoli', 2),
       (5, 'Production', 3),
       (6, 'Maintenance', 3),
       (7, 'Logistics', 3),
       (8, 'Informative systems', 3),
       (9, 'Commercial', 3),
       (10, 'Shopping', 3),
       (11, 'Production line', 4),
       (12, 'Process cell', 4),
       (13, 'Maintenance', 4),
       (14, 'Storage', 4),
       (15, 'Milling', 5),
       (16, 'Cutting', 5),
       (17, 'Pressing', 5),
       (18, 'Molding', 5),
       (19, 'Storage', 5),
       (20, 'Nusco', 2),
       (21, 'Carpentry', 5),
       (22, 'Morra', 2),
       (23, 'Painting', 5);

-- --------------------------------------------------------

--
-- Struttura della tabella `entity_class`
--

DROP TABLE IF EXISTS `entity_class`;
CREATE TABLE IF NOT EXISTS `entity_class`
(
    `id_entity_class` int NOT NULL AUTO_INCREMENT,
    `name`            varchar(45) DEFAULT NULL,
    PRIMARY KEY (`id_entity_class`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 8
  DEFAULT CHARSET = utf8;

--
-- Dump dei dati per la tabella `entity_class`
--

INSERT INTO `entity_class` (`id_entity_class`, `name`)
VALUES (1, 'ENTERPRISE'),
       (2, 'SITE'),
       (3, 'ORGANIZATIONAL UNIT'),
       (4, 'WORK CENTER'),
       (5, 'WORK UNIT'),
       (6, 'MACHINE'),
       (7, 'SENSOR');

-- --------------------------------------------------------

--
-- Struttura della tabella `hierarchy`
--

DROP TABLE IF EXISTS `hierarchy`;
CREATE TABLE IF NOT EXISTS `hierarchy`
(
    `id_entity` int NOT NULL,
    `id_parent` int NOT NULL,
    PRIMARY KEY (`id_entity`, `id_parent`),
    KEY `fk_pippo_entity2_idx` (`id_parent`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

--
-- Dump dei dati per la tabella `hierarchy`
--

INSERT INTO `hierarchy` (`id_entity`, `id_parent`)
VALUES (2, 1),
       (3, 1),
       (4, 1),
       (20, 1),
       (22, 1),
       (5, 2),
       (6, 2),
       (7, 2),
       (8, 3),
       (9, 4),
       (10, 4),
       (11, 5),
       (12, 5),
       (13, 6),
       (14, 7),
       (15, 11),
       (16, 11),
       (17, 12),
       (18, 12),
       (21, 12),
       (23, 13),
       (5, 20);

-- --------------------------------------------------------

--
-- Struttura della tabella `maintenance_procedure`
--

DROP TABLE IF EXISTS `maintenance_procedure`;
CREATE TABLE IF NOT EXISTS `maintenance_procedure`
(
    `id_activity`                int                                                                                                 NOT NULL,
    `estimated_intervetion_time` int                                                                                                 NOT NULL,
    `activity_description`       varchar(2048)                                                                             DEFAULT NULL,
    `interruptible`              tinyint(1)                                                                                          NOT NULL,
    `week`                       int                                                                                                 NOT NULL,
    `smp_file`                   blob,
    `tipology`                   enum ('Mechanical','Electric','Hydraulic','Electronics') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
    `machine`                    varchar(128)                                                                                        NOT NULL,
    `procedure_class`            enum ('extra','planned procedure','unplanned procedure (ewo)','')                                   NOT NULL,
    `area`                       int                                                                                                 NOT NULL,
    `general_state`              enum ('Closed','In progress','Not started','') CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
    `cause`                      enum ('CR1','CR2','CR3','CR4','CR5','CR6') CHARACTER SET utf8 COLLATE utf8_general_ci     DEFAULT NULL,
    `planner`                    varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci                                              NOT NULL,
    `state_area`                 enum ('Received','Sent','Not Sent','')                                                              NOT NULL,
    PRIMARY KEY (`id_activity`),
    KEY `fk_maintenance_procedure_user` (`planner`),
    KEY `fk_maintenance_procedure_entity` (`area`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

--
-- Dump dei dati per la tabella `maintenance_procedure`
--

INSERT INTO `maintenance_procedure` (`id_activity`, `estimated_intervetion_time`, `activity_description`,
                                     `interruptible`, `week`, `smp_file`, `tipology`, `machine`, `procedure_class`,
                                     `area`, `general_state`, `cause`, `planner`, `state_area`)
VALUES (1, 120, NULL, 0, 23, NULL, 'Mechanical', '', 'planned procedure', 18, NULL, NULL, 'planner', 'Received'),
       (2, 30, 'Replacement of welding cables', 0, 23, NULL, 'Electric', 'robot 23', 'planned procedure', 21, NULL,
        NULL, 'planner', 'Received'),
       (3, 250, NULL, 0, 23, NULL, 'Hydraulic', '', 'planned procedure', 23, NULL, NULL, 'planner', 'Received'),
       (4, 90, NULL, 0, 23, NULL, 'Electronics', '', 'planned procedure', 18, NULL, NULL, 'planner', 'Received'),
       (17, 100, NULL, 0, 23, NULL, 'Mechanical', '', 'unplanned procedure (ewo)', 18, 'Closed', NULL, 'planner',
        'Received'),
       (18, 50, NULL, 0, 23, NULL, 'Electric', '', 'unplanned procedure (ewo)', 17, 'In progress', NULL, 'planner',
        'Sent'),
       (19, 70, 'Compressor replacement', 0, 23, NULL, 'Mechanical', '', 'unplanned procedure (ewo)', 18, 'Not started',
        NULL, 'planner', 'Not Sent');

--
-- Trigger `maintenance_procedure`
--
DROP TRIGGER IF EXISTS `ins_check`;
DELIMITER $$
CREATE TRIGGER `ins_check`
    BEFORE INSERT
    ON `maintenance_procedure`
    FOR EACH ROW
BEGIN
    IF NEW.procedure_class = 'extra' OR NEW.procedure_class = 'planned procedure' THEN
        SET NEW.general_state = NULL;
        SET NEW.cause = NULL;
    END IF;
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `upd_check`;
DELIMITER $$
CREATE TRIGGER `upd_check`
    BEFORE UPDATE
    ON `maintenance_procedure`
    FOR EACH ROW
BEGIN
    IF NEW.procedure_class = 'extra' OR NEW.procedure_class = 'planned procedure' THEN
        SET NEW.general_state = NULL;
        SET NEW.cause = NULL;
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struttura della tabella `material`
--

DROP TABLE IF EXISTS `material`;
CREATE TABLE IF NOT EXISTS `material`
(
    `id_material` int          NOT NULL,
    `name`        varchar(100) NOT NULL,
    PRIMARY KEY (`id_material`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

--
-- Dump dei dati per la tabella `material`
--

INSERT INTO `material` (`id_material`, `name`)
VALUES (1, 'Copper'),
       (2, 'Cables'),
       (3, 'Spout pliers');

-- --------------------------------------------------------

--
-- Struttura della tabella `material_maintenace_procedure`
--

DROP TABLE IF EXISTS `material_maintenace_procedure`;
CREATE TABLE IF NOT EXISTS `material_maintenace_procedure`
(
    `id_material`              int NOT NULL,
    `id_maintenance_procedure` int NOT NULL,
    PRIMARY KEY (`id_material`, `id_maintenance_procedure`),
    KEY `fk_mp_material` (`id_maintenance_procedure`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

--
-- Dump dei dati per la tabella `material_maintenace_procedure`
--

INSERT INTO `material_maintenace_procedure` (`id_material`, `id_maintenance_procedure`)
VALUES (1, 2),
       (2, 2),
       (3, 2);

-- --------------------------------------------------------

--
-- Struttura della tabella `property`
--

DROP TABLE IF EXISTS `property`;
CREATE TABLE IF NOT EXISTS `property`
(
    `id_property` int NOT NULL AUTO_INCREMENT,
    `name`        varchar(45) DEFAULT NULL,
    PRIMARY KEY (`id_property`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 25
  DEFAULT CHARSET = utf8;

--
-- Dump dei dati per la tabella `property`
--

INSERT INTO `property` (`id_property`, `name`)
VALUES (1, 'ISA level'),
       (2, 'Location'),
       (3, 'Company type'),
       (4, 'Number of employees'),
       (5, 'Industry classification '),
       (6, 'Phone '),
       (7, 'Address'),
       (8, 'Production quantity'),
       (9, 'Autonomous Maintenance (AM) approach'),
       (10, 'Number of machines'),
       (11, 'Type'),
       (12, 'Internal ID'),
       (13, 'IP'),
       (14, 'Maker'),
       (15, 'Model'),
       (16, 'Fabrication year'),
       (17, 'Brand'),
       (18, 'Processing name'),
       (19, 'Price'),
       (20, 'Time-based Maintenance (TBM) approach'),
       (21, 'Condition-based Maintenance (CBM) approach'),
       (22, 'Corrective Maintenance (CM) approach '),
       (23, 'Breakdown Maintenance (BDM) approach '),
       (24, 'Note');

-- --------------------------------------------------------

--
-- Struttura della tabella `skill`
--

DROP TABLE IF EXISTS `skill`;
CREATE TABLE IF NOT EXISTS `skill`
(
    `id`   int         NOT NULL AUTO_INCREMENT,
    `name` varchar(50) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 9
  DEFAULT CHARSET = utf8;

--
-- Dump dei dati per la tabella `skill`
--

INSERT INTO `skill` (`id`, `name`)
VALUES (1, 'PAV Certification'),
       (2, 'Electric Maintenance'),
       (3, 'Knowledge of cable types'),
       (4, 'xyz-type robot knowledge'),
       (5, 'Mechanical Maintenance'),
       (6, 'Compressor Knowledge'),
       (7, 'Molding plant Knoledge'),
       (8, 'Knoledge of working line P3');

-- --------------------------------------------------------

--
-- Struttura della tabella `skill_maintenance_procedure`
--

DROP TABLE IF EXISTS `skill_maintenance_procedure`;
CREATE TABLE IF NOT EXISTS `skill_maintenance_procedure`
(
    `maintenance_procedure` int NOT NULL,
    `skill`                 int NOT NULL,
    PRIMARY KEY (`maintenance_procedure`, `skill`),
    KEY `fk_skill_mp` (`skill`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

--
-- Dump dei dati per la tabella `skill_maintenance_procedure`
--

INSERT INTO `skill_maintenance_procedure` (`maintenance_procedure`, `skill`)
VALUES (2, 1),
       (19, 1),
       (2, 2),
       (2, 3),
       (2, 4),
       (19, 4),
       (19, 6),
       (19, 7),
       (19, 8);

-- --------------------------------------------------------

--
-- Struttura della tabella `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user`
(
    `username`  varchar(40)                                                                         NOT NULL,
    `email`     varchar(100)                                                                        NOT NULL,
    `password`  varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci                             NOT NULL,
    `full_name` varchar(40)                                                                         NOT NULL,
    `role`      enum ('admin','planner','maintainer','') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
    PRIMARY KEY (`username`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

--
-- Dump dei dati per la tabella `user`
--

INSERT INTO `user` (`username`, `email`, `password`, `full_name`, `role`)
VALUES ('admin', 'admin@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'Admin Admin', 'admin'),
       ('maintainer', 'maintainer@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'Pino Bruno', 'maintainer'),
       ('maintainer_02', 'maintainer@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'Gianfranco Rozzolo',
        'maintainer'),
       ('planner', 'planner@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'Franco Califano', 'planner');

-- --------------------------------------------------------

--
-- Struttura della tabella `user_maintenance_procedure`
--

DROP TABLE IF EXISTS `user_maintenance_procedure`;
CREATE TABLE IF NOT EXISTS `user_maintenance_procedure`
(
    `user`                  varchar(40)                     NOT NULL,
    `maintenance_procedure` int                             NOT NULL,
    `start_datetime`        datetime     DEFAULT NULL,
    `stop_datetime`         datetime     DEFAULT NULL,
    `state_maintener`       enum ('Sent','Received','Read') NOT NULL,
    `note`                  varchar(200) DEFAULT NULL,
    `expected_date`         datetime                        NOT NULL,
    `job`                   datetime                        NOT NULL,
    PRIMARY KEY (`user`, `maintenance_procedure`),
    KEY `fk_mp_user` (`maintenance_procedure`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

--
-- Dump dei dati per la tabella `user_maintenance_procedure`
--

INSERT INTO `user_maintenance_procedure` (`user`, `maintenance_procedure`, `start_datetime`, `stop_datetime`,
                                          `state_maintener`, `note`, `expected_date`, `job`)
VALUES ('maintainer', 2, NULL, NULL, 'Received', NULL, '2020-05-18 08:30:00', '0000-00-00 00:00:00'),
       ('maintainer_02', 17, '2020-05-19 15:41:18', '2020-05-19 16:10:18', 'Sent', NULL, '2020-05-19 15:33:37',
        '0000-00-00 00:00:00'),
       ('maintainer_02', 19, NULL, NULL, 'Sent', NULL, '2020-05-19 15:33:37', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struttura della tabella `user_skill`
--

DROP TABLE IF EXISTS `user_skill`;
CREATE TABLE IF NOT EXISTS `user_skill`
(
    `user`  varchar(40) NOT NULL,
    `skill` int         NOT NULL,
    PRIMARY KEY (`user`, `skill`),
    KEY `fk_skill` (`skill`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

--
-- Dump dei dati per la tabella `user_skill`
--

INSERT INTO `user_skill` (`user`, `skill`)
VALUES ('maintainer', 1),
       ('maintainer_02', 1),
       ('maintainer', 2),
       ('maintainer', 3),
       ('maintainer', 4),
       ('maintainer_02', 5),
       ('maintainer_02', 6),
       ('maintainer_02', 7),
       ('maintainer_02', 8);

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `entities_class_properties`
--
ALTER TABLE `entities_class_properties`
    ADD CONSTRAINT `fk_property_has_entity_class_entity_class1` FOREIGN KEY (`id_entity_class`) REFERENCES `entity_class` (`id_entity_class`),
    ADD CONSTRAINT `fk_property_has_entity_class_property1` FOREIGN KEY (`id_property`) REFERENCES `property` (`id_property`);

--
-- Limiti per la tabella `entities_properties`
--
ALTER TABLE `entities_properties`
    ADD CONSTRAINT `fk_property_has_entity_entity1` FOREIGN KEY (`id_entity`) REFERENCES `entity` (`id_entity`),
    ADD CONSTRAINT `fk_property_has_entity_property1` FOREIGN KEY (`id_property`) REFERENCES `property` (`id_property`);

--
-- Limiti per la tabella `entity`
--
ALTER TABLE `entity`
    ADD CONSTRAINT `fk_entity_entity_class1` FOREIGN KEY (`id_entity_class`) REFERENCES `entity_class` (`id_entity_class`);

--
-- Limiti per la tabella `hierarchy`
--
ALTER TABLE `hierarchy`
    ADD CONSTRAINT `fk_pippo_entity1` FOREIGN KEY (`id_entity`) REFERENCES `entity` (`id_entity`),
    ADD CONSTRAINT `fk_pippo_entity2` FOREIGN KEY (`id_parent`) REFERENCES `entity` (`id_entity`);

--
-- Limiti per la tabella `maintenance_procedure`
--
ALTER TABLE `maintenance_procedure`
    ADD CONSTRAINT `fk_maintenance_procedure_entity` FOREIGN KEY (`area`) REFERENCES `entity` (`id_entity`) ON DELETE CASCADE ON UPDATE CASCADE,
    ADD CONSTRAINT `fk_maintenance_procedure_user` FOREIGN KEY (`planner`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `material_maintenace_procedure`
--
ALTER TABLE `material_maintenace_procedure`
    ADD CONSTRAINT `fk_material_mp` FOREIGN KEY (`id_material`) REFERENCES `material` (`id_material`) ON DELETE CASCADE ON UPDATE CASCADE,
    ADD CONSTRAINT `fk_mp_material` FOREIGN KEY (`id_maintenance_procedure`) REFERENCES `maintenance_procedure` (`id_activity`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `skill_maintenance_procedure`
--
ALTER TABLE `skill_maintenance_procedure`
    ADD CONSTRAINT `fk_mp_skill` FOREIGN KEY (`maintenance_procedure`) REFERENCES `maintenance_procedure` (`id_activity`) ON DELETE CASCADE ON UPDATE CASCADE,
    ADD CONSTRAINT `fk_skill_mp` FOREIGN KEY (`skill`) REFERENCES `skill` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `user_maintenance_procedure`
--
ALTER TABLE `user_maintenance_procedure`
    ADD CONSTRAINT `fk_mp_user` FOREIGN KEY (`maintenance_procedure`) REFERENCES `maintenance_procedure` (`id_activity`) ON DELETE RESTRICT ON UPDATE RESTRICT,
    ADD CONSTRAINT `fk_user_mp` FOREIGN KEY (`user`) REFERENCES `user` (`username`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Limiti per la tabella `user_skill`
--
ALTER TABLE `user_skill`
    ADD CONSTRAINT `fk_skill` FOREIGN KEY (`skill`) REFERENCES `skill` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    ADD CONSTRAINT `fk_user` FOREIGN KEY (`user`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT = @OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
