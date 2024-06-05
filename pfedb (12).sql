-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 03 juin 2024 à 08:29
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `pfedb`
--

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `sender_name` varchar(255) NOT NULL,
  `sender_email` varchar(255) NOT NULL,
  `time_added` timestamp NOT NULL DEFAULT current_timestamp(),
  `message_sent` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `sender_name`, `sender_email`, `time_added`, `message_sent`) VALUES
(20, 'Benkhaled Nour', 'nourbenkhaled@gmail.com', '2024-06-02 14:35:40', 'saad');

-- --------------------------------------------------------

--
-- Structure de la table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `has_td` tinyint(1) DEFAULT 0,
  `has_tp` tinyint(1) DEFAULT 0,
  `field_name` varchar(255) DEFAULT NULL,
  `semester` varchar(50) DEFAULT NULL,
  `coef` int(11) DEFAULT NULL,
  `credit` int(11) DEFAULT NULL,
  `has_course` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `courses`
--

INSERT INTO `courses` (`id`, `course_name`, `description`, `has_td`, `has_tp`, `field_name`, `semester`, `coef`, `credit`, `has_course`) VALUES
(25, 'ARCHI', 'Architecture des ordinateur', 1, 1, 'L2-SC', 'S1', 3, 6, 1),
(26, 'MN', 'Methode Nemurique   ', 0, 1, 'L2-SC', 'S1', 2, 4, 1),
(27, 'LM', 'Logique Matemathique', 1, 0, 'L2-SC', 'S1', 2, 30, 1),
(28, 'THG', 'Theorie des graphes', 1, 0, 'L2-SC', 'S1', 2, 30, 1),
(29, 'Anglais', 'Langue Anglais', 0, 0, 'L2-SC', 'S1', 1, 30, 1),
(32, 'Resaux ', 'Reseaux ', 1, 1, 'L2-SC', 'S2', 3, 30, 1),
(33, 'SE', 'Systeme de exploitation', 1, 1, 'L2-SC', 'S2', 3, 30, 1),
(34, 'BDD', 'Base de donnees ', 1, 1, 'L2-SC', 'S2', 2, 30, 1),
(35, 'POO', 'oriented objetct programming', 0, 1, 'L2-SC', 'S2', 2, 30, 1),
(37, 'PAW', 'Programmation Avancée pour le web', 0, 1, 'l3-ISIL', 'S1', 2, 20, 1),
(38, 'GL', 'Genie Logiciele', 1, 1, 'l3-ISIL', 'S1', 3, 5, 1),
(39, 'IHM', 'Iterface homme machine', 1, 1, 'l3-ISIL', 'S1', 2, 5, 1),
(40, 'SID', 'Système information distribuer', 1, 1, 'l3-ISIL', 'S1', 3, 5, 1),
(41, 'SE2', 'Systèmes d exploitation 2 ', 1, 1, 'L3-ISIL', 'S2', 3, 6, 1),
(42, 'RI', 'Recherche information', 1, 0, 'L3-ISIL', 'S2', 3, 6, 1),
(43, 'SI', 'Sécurité informatique', 1, 0, 'L3-ISIL', 'S2', 3, 6, 1),
(44, 'DSS', 'Données semi-structurées', 0, 1, 'L3-ISIL', 'S2', 3, 6, 1),
(45, 'RE', 'Rédaction scientifique', 1, 0, 'L3-ISIL', 'S2', 1, 3, 0),
(46, 'BI', 'Business indiligence', 1, 0, 'L3-ISIL', 'S2', 1, 3, 0),
(47, 'THL', 'Théorie des langages', 1, 1, 'L2-SC', 'S2', 2, 3, 1),
(49, 'DAW', 'Développement des app web', 0, 1, 'L2-SC', 'S2', 2, 3, 1),
(50, 'SW', 'Rédaction Scientifique', 0, 0, 'L3-ISIL', 'S2', 1, 3, 1),
(51, 'Applications Mobiles', 'Applications Mobiles', 0, 1, 'L3-SI', 'S2', 3, 9, 1),
(52, 'SI', 'Sécurité Informatique', 1, 0, 'L3-SI', 'S2', 3, 6, 1),
(53, 'IA', 'Intelligence Artificielle', 0, 1, 'L3-SI', 'S2', 3, 6, 1),
(54, 'DSS', 'Données semi structurées', 0, 1, 'L3-SI', 'S2', 3, 6, 1),
(55, 'SW', 'Rédaction Scientifique', 0, 0, 'L3-SI', 'S2', 1, 3, 1),
(56, 'Créer et développer une startup', 'Créer et développer une\r\nstartup', 0, 0, 'L3-SI', 'S2', 1, 3, 1),
(57, 'ASD2', 'Algorithm', 1, 1, 'ING1', 'S2', 3, 6, 1),
(58, 'SE2', 'Systeme exploitation', 1, 1, 'ING1', 'S2', 3, 6, 1),
(59, 'AM', 'Analyse mathematique', 1, 0, 'ING1', 'S2', 3, 6, 1),
(60, 'LM', 'Logique matematique', 1, 0, 'ING1', 'S2', 2, 3, 1),
(61, 'Algebre', 'Algebre', 1, 0, 'L3-SI', 'S2', 2, 6, 1),
(62, 'Proba-Stat', 'Probabilite et satistique', 1, 0, 'ING1', 'S2', 3, 6, 1);

-- --------------------------------------------------------

--
-- Structure de la table `exams`
--

CREATE TABLE `exams` (
  `id` int(11) NOT NULL,
  `ExamDate` date NOT NULL,
  `Module` varchar(100) NOT NULL,
  `Rooms` varchar(100) DEFAULT NULL,
  `Field` varchar(100) NOT NULL,
  `Semester` varchar(20) NOT NULL,
  `EndTime` time NOT NULL,
  `StartTime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `exams`
--

INSERT INTO `exams` (`id`, `ExamDate`, `Module`, `Rooms`, `Field`, `Semester`, `EndTime`, `StartTime`) VALUES
(21, '2024-05-14', 'SE2', 'C6,AN1,AN2,AN3,C1', 'L3-ISIL', 'S2', '15:30:00', '14:00:00'),
(23, '2024-05-15', 'RI', 'C6,AN1,AN2,AN3,C1', 'L3-ISIL', 'S2', '15:30:00', '14:00:00'),
(24, '2024-05-16', 'SI', 'C6,AN1,AN2,AN3,C1', 'L3-ISIL', 'S2', '15:30:00', '14:00:00'),
(25, '2024-05-21', 'DSS', 'C6,AN1,AN2,AN3,C1', 'L3-ISIL', 'S2', '15:30:00', '14:00:00'),
(28, '2024-05-22', 'SW', 'C6,AN1,AN2,AN3,C1', 'L3-ISIL', 'S2', '15:30:00', '14:00:00'),
(29, '2024-05-14', 'SE', 'AN1,AN2,AN3,Salle02,Salle03,salle04,salle05,salle06,salle07,salle08', 'L2-SC', 'S2', '12:00:00', '10:30:00'),
(30, '2024-05-15', 'Resaux ', 'AN1,AN2,AN3,Salle02,Salle03,salle04,salle05,salle06,salle07,salle08', 'L2-SC', 'S2', '12:00:00', '10:30:00'),
(31, '2024-05-16', 'POO', 'AN1,AN2,AN3,Salle02,Salle03,salle04,salle05,salle06,salle07,salle08', 'L2-SC', 'S2', '12:00:00', '10:30:00'),
(32, '2024-05-20', 'BDD', 'AN1,AN2,AN3,Salle02,Salle03,salle04,salle05,salle06,salle07,salle08', 'L2-SC', 'S2', '12:00:00', '10:30:00'),
(33, '2024-05-21', 'DAW', 'AN1,AN2,AN3,Salle02,Salle03,salle04,salle05,salle06,salle07,salle08', 'L2-SC', 'S2', '12:00:00', '10:30:00'),
(34, '2024-05-22', 'THL', 'AN1,AN2,AN3,Salle02,Salle03,salle04,salle05,salle06,salle07,salle08', 'L2-SC', 'S2', '12:00:00', '10:30:00'),
(35, '2024-05-14', 'Applications Mobiles', 'AN1,AN2', 'L3-SI', 'S2', '15:30:00', '14:00:00'),
(36, '2024-05-15', 'SI', 'AN1,AN2', 'L3-SI', 'S2', '15:30:00', '14:00:00'),
(37, '2024-05-16', 'IA', 'AN1,AN2', 'L3-SI', 'S2', '15:30:00', '14:00:00'),
(38, '2024-05-20', 'DSS', 'AN1,AN2', 'L3-SI', 'S2', '15:30:00', '14:00:00'),
(39, '2024-05-21', 'SW', 'AN1,AN2', 'L3-SI', 'S2', '15:30:00', '14:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `fields`
--

CREATE TABLE `fields` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `fields`
--

INSERT INTO `fields` (`id`, `name`, `description`) VALUES
(9, 'TC', ' Tronc Commun '),
(10, 'ISIL', '3ème année ISIL'),
(11, 'SI', '3ème année SI'),
(12, 'RSSI', 'MASTER RSSI'),
(13, 'WIC', 'MASTER WIC'),
(14, 'ISI', '  MASTER ISI \r\n'),
(16, 'AI', 'Ingenieur Inteligence artificiel'),
(17, 'RS', 'Ingenieur Reseaux et securite');

-- --------------------------------------------------------

--
-- Structure de la table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `field` varchar(255) DEFAULT NULL,
  `section` varchar(255) DEFAULT NULL,
  `student_number` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `groups`
--

INSERT INTO `groups` (`id`, `name`, `field`, `section`, `student_number`) VALUES
(49, 'G6', 'L2-SC ', NULL, '20'),
(52, 'G1', 'ING1', NULL, '20'),
(53, 'G2', 'ING1', NULL, '20'),
(54, 'G3', 'ING1', NULL, '20'),
(55, 'G4', 'ING2', NULL, '20'),
(56, 'G1', 'ING2', NULL, '20'),
(57, 'G2', 'ING2', NULL, '20'),
(58, 'G3', 'ING2', NULL, '20'),
(60, 'G1', 'L3-ISIL ', NULL, '20'),
(61, 'G2', 'L3-ISIL  ', NULL, '20'),
(62, 'G3', 'L3-ISIL   ', NULL, '20'),
(63, 'G4', 'L3-ISIL    ', NULL, '20'),
(64, 'G1', 'L3-SI ', NULL, '20'),
(65, 'G2', 'L3-SI  ', NULL, '20'),
(68, 'G1', 'M1-ISI ', NULL, '20'),
(69, 'G2', 'M1-ISI  ', NULL, '20'),
(70, 'G3', 'M1-ISI   ', NULL, '20'),
(71, 'G4', 'M1-ISI    ', NULL, '20'),
(72, 'G1', 'M1-WIC ', NULL, '20'),
(73, 'G2', 'M1-WIC  ', NULL, '20'),
(74, 'G3', 'M1-WIC   ', NULL, '20'),
(75, 'G4', 'M1-WIC    ', NULL, '20'),
(76, 'G1', 'M1-RSSI ', NULL, '20'),
(78, 'G3', 'M1-RSSI   ', NULL, '20'),
(79, 'G4', 'M1-RSSI    ', NULL, '20'),
(80, 'G1', 'M2-ISI ', NULL, '20'),
(81, 'G2', 'M2-ISI  ', NULL, '20'),
(82, 'G3', 'M2-ISI   ', NULL, '20'),
(83, 'G4', 'M2-ISI    ', NULL, '20'),
(84, 'G2', 'M1-RSSI ', NULL, '20'),
(85, 'G2', 'M2-WIC ', NULL, '20'),
(86, 'G1', 'M2-WIC  ', NULL, '20'),
(87, 'G3', 'M2-WIC   ', NULL, '20'),
(88, 'G4', 'M2-WIC    ', NULL, '20'),
(89, 'G1', 'M2-RSSI ', NULL, '20'),
(90, 'G2', 'M2-RSSI  ', NULL, '20'),
(91, 'G3', 'M2-RSSI   ', NULL, '20'),
(92, 'G4', 'M2-RSSI    ', NULL, '20'),
(95, 'G1', 'L2-SC ', NULL, '25'),
(96, 'G2', 'L2-SC  ', NULL, '30'),
(97, 'G3', 'L2-SC   ', NULL, '30'),
(98, 'G4', 'L2-SC    ', NULL, '19'),
(99, 'G5', 'L2-SC ', NULL, '31'),
(100, 'G7', 'L2-SC  ', NULL, '28'),
(102, 'G8', 'L2-SC ', NULL, '25'),
(103, 'G4', 'ING1 ', NULL, '20'),
(104, 'G5', 'ING1  ', NULL, '20');

-- --------------------------------------------------------

--
-- Structure de la table `levels`
--

CREATE TABLE `levels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `field` varchar(255) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `levels`
--

INSERT INTO `levels` (`id`, `name`, `field`, `description`) VALUES
(2, 'L2-SC', 'TC', '   Socle commun 2ème année'),
(3, 'ING1', 'TC', '  Socle commun 1er année ingenieur '),
(4, 'L3-ISIL', 'ISIL', '3ème année licence ISIL'),
(5, 'L3-SI', 'SI', '3ème année licence SI'),
(6, 'ING2', 'TC', ' Socle commun 2eme année ingenieur '),
(7, 'M1-ISI', 'ISI', 'Master ISI'),
(8, 'M1-WIC', 'WIC', 'Master WIC'),
(9, 'M1-RSSI', 'RSSI', 'Master RSSI'),
(10, 'M2-ISI', 'ISI', 'Master 2 ISI'),
(12, 'M2-RSSI', 'RSSI', 'Master 2 RSSI'),
(13, 'M2-WIC', 'WIC', 'Master 2 WIC');

-- --------------------------------------------------------

--
-- Structure de la table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `room_name` varchar(255) DEFAULT NULL,
  `room_type` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `rooms`
--

INSERT INTO `rooms` (`id`, `room_name`, `room_type`) VALUES
(24, 'C2', 'TD'),
(25, 'C4', 'TD'),
(26, 'C5', 'TD'),
(27, 'C6', 'TD'),
(29, 'B2', 'TD'),
(30, 'B3', 'TD'),
(31, 'TP1', 'TP'),
(32, 'TP2', 'TP'),
(33, 'TP3', 'TP'),
(34, 'TP4', 'TP'),
(35, 'TP5', 'TP'),
(36, 'TP6', 'TP'),
(37, 'TP7', 'TP'),
(38, 'TP8', 'TP'),
(39, 'UNIX', 'TP'),
(40, 'AN1', 'Amphi'),
(41, 'AN2', 'Amphi'),
(42, 'AN3', 'Amphi'),
(43, 'A1', 'TD'),
(44, 'A2', 'TD'),
(45, 'A3', 'TD'),
(46, 'A4', 'TD'),
(47, 'A5', 'TD'),
(48, 'A6', 'TD'),
(49, 'Salle01', 'TD'),
(50, 'Salle02', 'TD'),
(51, 'Salle03', 'TD'),
(52, 'salle04', 'TD'),
(53, 'salle05', 'TD'),
(54, 'salle06', 'TD'),
(55, 'salle07', 'TD'),
(56, 'salle08', 'TD'),
(57, 'C1', 'TD'),
(58, 'C3', 'TD'),
(59, 'B1', 'TD');

-- --------------------------------------------------------

--
-- Structure de la table `timetable`
--

CREATE TABLE `timetable` (
  `id` int(11) NOT NULL,
  `time` varchar(20) NOT NULL,
  `day` varchar(20) NOT NULL,
  `lesson` varchar(100) DEFAULT NULL,
  `group_name` varchar(100) DEFAULT NULL,
  `teacher_name` varchar(100) DEFAULT NULL,
  `field` varchar(100) DEFAULT NULL,
  `semester` varchar(10) DEFAULT NULL,
  `room` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `timetable`
--

INSERT INTO `timetable` (`id`, `time`, `day`, `lesson`, `group_name`, `teacher_name`, `field`, `semester`, `room`) VALUES
(53, '10:00-11:30', 'Sunday', 'TD-RI', 'G2', 'Benkhaled', 'L3-ISIL', 'S2', 'C2'),
(54, '10:00-11:30', 'Sunday', 'TD-BI', 'G3', 'Haddad', 'L3-ISIL', 'S2', 'C3'),
(55, '14:00-15:30', 'Sunday', 'TD-RI', 'G3', 'Benkhaled', 'L3-ISIL', 'S2', 'C1'),
(56, '14:00-15:30', 'Sunday', 'TP-SE2', 'G4', 'Boukhalfa', 'L3-ISIL', 'S2', 'TP5'),
(57, '15:30-17:00', 'Sunday', 'TD-SE2', 'G4', 'Boukhalfa', 'L3-ISIL', 'S2', 'C6'),
(59, '10:00-11:30', 'Monday', 'TP-DSS', 'G1', 'Cherifi', 'L3-ISIL', 'S2', 'TP7'),
(60, '10:00-11:30', 'Monday', 'TD-RI', 'G4', 'Benkhaled', 'L3-ISIL', 'S2', 'C1'),
(63, '8:30-10:00', 'Sunday', 'Cours-RI', '', 'Benkhaled', 'L3-ISIL', 'S2', 'AN2'),
(64, '8:30-10:00', 'Monday', 'Cours-DSS', '', 'Cherifi', 'L3-ISIL', 'S2', 'AN1'),
(65, '11:30-13:00', 'Monday', 'TD-RI', 'G1', 'Benkhaled', 'L3-ISIL', 'S2', 'C1'),
(66, '11:30-13:00', 'Monday', 'TD-SI', 'G3', 'Saidi', 'L3-ISIL', 'S2', 'C6'),
(67, '11:30-13:00', 'Monday', 'TP-DSS', 'G4', 'Cherifi', 'L3-ISIL', 'S2', 'TP7'),
(68, '10:00-11:30', 'Monday', 'TD-SI', 'G2', 'Saidi', 'L3-ISIL', 'S2', 'C6'),
(69, '14:00-15:30', 'Monday', 'Cours-SI', '', 'Saidi', 'L3-ISIL', 'S2', 'AN2'),
(70, '8:30-10:00', 'Tuesday', 'Cours-SE2', '', 'Mebarki', 'L3-ISIL', 'S2', 'AN1'),
(71, '8:30-10:00', 'Sunday', 'Cours-Resaux ', '', 'Gourari', 'L2-SC', 'S2', 'AN1'),
(72, '8:30-10:00', 'Monday', 'Cours-BDD', '', 'Benkhaled', 'L2-SC', 'S2', 'AN3'),
(74, '10:00-11:30', 'Monday', 'TD-Resaux ', 'G3', 'Boukhalfa', 'L2-SC', 'S2', 'salle06'),
(75, '10:00-11:30', 'Sunday', 'TP-THL', 'G5', 'Sahli', 'L2-SC', 'S2', 'TP4'),
(76, '14:00-15:30', 'Thursday', 'TP-BDD', 'G4', 'Benkhaled', 'L2-SC', 'S2', 'TP4'),
(77, '14:00-15:30', 'Thursday', 'TP-POO', 'G3', 'Saidi', 'L2-SC', 'S2', 'TP7'),
(78, '8:30-10:00', 'Sunday', 'Cours-SI', '', 'Saidi', 'L3-SI', 'S2', 'AN3'),
(79, '8:30-10:00', 'Tuesday', 'Cours-Applications Mobiles', '', 'Benkhaled', 'L3-SI', 'S2', 'AN2'),
(80, '10:00-11:30', 'Wednesday', 'TP-IA', 'G2', 'Haddad', 'L3-SI', 'S2', 'TP5'),
(81, '14:00-15:30', 'Tuesday', 'Cours-DSS', '', 'Saidi', 'L3-SI', 'S2', 'AN2'),
(82, '14:00-15:30', 'Sunday', 'Cours-ASD2', '', 'Belkacem', 'ING1', 'S2', 'AN1'),
(83, '8:30-10:00', 'Sunday', 'TD-AM', 'G3', 'Belkacem', 'ING1', 'S2', 'salle06'),
(84, '14:00-15:30', 'Wednesday', 'Cours-Proba-Stat', '', 'Haddad', 'ING1', 'S2', 'AN3');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(191) NOT NULL,
  `lname` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `role_as` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=Student,1=Admin,2=Teacher',
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `birth_date` date DEFAULT NULL,
  `groupe` varchar(50) DEFAULT NULL,
  `section` varchar(50) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `mobile_number` varchar(20) DEFAULT NULL,
  `field` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `password`, `role_as`, `status`, `created_at`, `birth_date`, `groupe`, `section`, `address`, `gender`, `mobile_number`, `field`) VALUES
(4, 'kaddouri', 'saad', 'saadadmin@gmail.com', '123', 1, 0, '2024-03-23 22:25:51', '2003-08-09', '', '', 'Sidi bel abbes', 'Male', '0697619982', ''),
(9, 'Bouazza', 'Mustapha', 'mustapah@gmail.com', '123', 1, 0, '2024-03-29 23:13:08', '2003-05-06', '', '', 'Sidi bel abbes', 'Male', '0652158222', ''),
(15, 'Hamza', 'KADDOURI', 'hamza@gmail.com', '123', 0, 0, '2024-05-20 13:14:52', '2000-04-03', 'G3', '', 'Sidi bel abbes', ' Male', '0697619982', 'L2-SC'),
(16, 'Saad', 'KADDOURI', 'kaddouris735@gmail.com', '123', 0, 0, '2024-05-26 16:25:14', '2003-09-26', 'G2', '', 'Sidi bel abbes', 'Male', '0697619982', 'L3-ISIL'),
(17, 'Ziani', 'Hassan', 'hassanziani@gmail.com', '123', 0, 0, '2024-05-30 07:15:00', '2002-01-15', 'G1', '', 'Algiers', 'Male', '0654321987', 'L2-SC'),
(18, 'Bouda', 'Amine', 'aminebouda@gmail.com', '123', 0, 0, '2024-05-30 07:20:00', '2001-07-22', 'G2', '', 'Oran', 'Male', '0654342678', 'L2-SC'),
(19, 'Cherif', 'Riad', 'riadcherif@gmail.com', '123', 0, 0, '2024-05-30 07:25:00', '2000-05-10', 'G3', '', 'Sidi Bel Abbes', 'Male', '0654781234', 'ING1'),
(20, 'Mokhtar', 'Nadia', 'nadiamokhtar@gmail.com', '123', 0, 0, '2024-05-30 07:30:00', '2001-03-19', 'G4', '', 'Tlemcen', 'Female', '0654321456', 'ING1'),
(21, 'Benali', 'Sara', 'sarabenali@gmail.com', '123', 0, 0, '2024-05-30 07:35:00', '2000-12-25', 'G1', '', 'Algiers', 'Female', '0654321965', 'L3-ISIL'),
(22, 'Kaci', 'Yacine', 'yacinekaci@gmail.com', '123', 0, 0, '2024-05-30 07:40:00', '2001-08-30', 'G2', '', 'Oran', 'Male', '0654319876', 'L3-ISIL'),
(23, 'Amrani', 'Hiba', 'hibaamrani@gmail.com', '123', 0, 0, '2024-05-30 07:45:00', '2000-10-13', 'G2', '', 'Sidi Bel Abbes', 'Female', '0654789123', 'L3-SI'),
(24, 'Sadi', 'Khaled', 'khaledsadi@gmail.com', '123', 0, 0, '2024-05-30 07:50:00', '2001-11-15', 'G2', '', 'Tlemcen', 'Male', '0654321754', 'L3-SI'),
(25, 'Haddad', 'Imene', 'imenehaddad@gmail.com', '123', 0, 0, '2024-05-30 07:55:00', '2000-04-07', 'G1', '', 'Algiers', 'Female', '0654312654', 'ING2'),
(26, 'Nadir', 'Rania', 'ranianadir@gmail.com', '123', 0, 0, '2024-05-30 08:00:00', '2001-06-27', 'G2', '', 'Oran', 'Female', '0654321789', 'ING2'),
(27, 'Benaissa', 'Amina', 'aminabenaissa@gmail.com', '123', 0, 0, '2024-05-30 08:05:00', '2000-02-16', 'G3', '', 'Sidi Bel Abbes', 'Female', '0654312987', 'M1-ISI'),
(28, 'Saadi', 'Ibrahim', 'ibrahimsaadi@gmail.com', '123', 0, 0, '2024-05-30 08:10:00', '2001-09-10', 'G4', '', 'Tlemcen', 'Male', '0654321698', 'M1-ISI'),
(29, 'Zerouali', 'Mehdi', 'mehdizerouali@gmail.com', '123', 0, 0, '2024-05-30 08:15:00', '2000-03-12', 'G1', '', 'Algiers', 'Male', '0654321475', 'M1-WIC'),
(30, 'Rahmani', 'Lina', 'linarahmani@gmail.com', '123', 0, 0, '2024-05-30 08:20:00', '2001-04-22', 'G2', '', 'Oran', 'Female', '0654321587', 'M1-WIC'),
(31, 'Boubekeur', 'Nour', 'nourboubekeur@gmail.com', '123', 0, 0, '2024-05-30 08:25:00', '2000-01-17', 'G3', '', 'Sidi Bel Abbes', 'Female', '0654321697', 'M1-RSSI'),
(32, 'Hamdi', 'Yousef', 'yousefhamdi@gmail.com', '123', 0, 0, '2024-05-30 08:30:00', '2001-05-25', 'G4', '', 'Tlemcen', 'Male', '0654321876', 'M1-RSSI'),
(33, 'Belkacem', 'Salma', 'salmabelkacem@gmail.com', '123', 0, 0, '2024-05-30 08:35:00', '2000-06-14', 'G1', '', 'Algiers', 'Female', '0654321432', 'M2-ISI'),
(34, 'Hadji', 'Ali', 'alihadj@gmail.com', '123', 0, 0, '2024-05-30 08:40:00', '2001-02-05', 'G2', '', 'Oran', 'Male', '0654321984', 'M2-ISI'),
(35, 'Farid', 'Omar', 'omarfarid@gmail.com', '123', 0, 0, '2024-05-30 08:45:00', '2000-08-23', 'G3', '', 'Sidi Bel Abbes', 'Male', '0654321945', 'M2-WIC'),
(36, 'Boukhalfa', 'Yasmine', 'yasmineboukhalfa@gmail.com', '123', 0, 0, '2024-05-30 08:50:00', '2001-09-19', 'G4', '', 'Tlemcen', 'Female', '0654321546', 'M2-WIC'),
(37, 'Djellal', 'Rachid', 'rachiddjellal@gmail.com', '123', 0, 0, '2024-05-30 08:55:00', '2000-11-03', 'G1', '', 'Algiers', 'Male', '0654321458', 'M2-RSSI'),
(38, 'Fekir', 'Zoulikha', 'zoulikhafekir@gmail.com', '123', 0, 0, '2024-05-30 09:00:00', '2001-07-01', 'G2', '', 'Oran', 'Female', '0654321569', 'M2-RSSI'),
(39, 'Benkhaled', 'Nour', 'nourbenkhaled@gmail.com', '123', 2, 0, '2024-05-30 09:05:00', '1980-01-15', '', '', 'Algiers', 'Female', '0654321991', ''),
(40, 'Meftahi', 'Kamel', 'kamelmeftahi@gmail.com', '123', 2, 0, '2024-05-30 09:10:00', '1975-03-22', '', '', 'Oran', 'Male', '0654321882', ''),
(41, 'Sahli', 'Meriem', 'meriemsahli@gmail.com', '123', 2, 0, '2024-05-30 09:15:00', '1983-04-10', '', '', 'Tlemcen', 'Female', '0654321773', ''),
(42, 'Haddad', 'Omar', 'omarhaddad@gmail.com', '123', 2, 0, '2024-05-30 09:20:00', '1978-07-05', '', '', 'Sidi Bel Abbes', 'Male', '0654321664', ''),
(43, 'Zerrouki', 'Karima', 'karimazerrouki@gmail.com', '123', 2, 0, '2024-05-30 09:25:00', '1985-02-14', '', '', 'Algiers', 'Female', '0654321555', ''),
(44, 'Rahmani', 'Younes', 'younesrahmani@gmail.com', '123', 2, 0, '2024-05-30 09:30:00', '1979-05-30', '', '', 'Oran', 'Male', '0654321446', ''),
(45, 'Belkacem', 'Hafida', 'hafidabelkacem@gmail.com', '123', 2, 0, '2024-05-30 09:35:00', '1982-03-25', '', '', 'Tlemcen', 'Female', '0654321337', ''),
(46, 'Boukhalfa', 'Nadir', 'nadirboukhalfa@gmail.com', '123', 2, 0, '2024-05-30 09:40:00', '1977-08-19', '', '', 'Sidi Bel Abbes', 'Male', '0654321228', ''),
(47, 'Amrani', 'Rachida', 'rachidaamrani@gmail.com', '123', 2, 0, '2024-05-30 09:45:00', '1981-06-11', '', '', 'Algiers', 'Female', '0654321119', ''),
(48, 'Saidi', 'Yacine', 'yacinesaidi@gmail.com', '123', 2, 0, '2024-05-30 09:50:00', '1976-09-08', '', '', 'Oran', 'Male', '0654321000', ''),
(49, 'Cherifi', 'Amina', 'aminacherifi@gmail.com', '123', 2, 0, '2024-05-30 09:55:00', '1984-11-27', '', '', 'Tlemcen', 'Female', '0654319991', ''),
(50, 'Benali', 'Farid', 'faridbenali@gmail.com', '123', 2, 0, '2024-05-30 10:00:00', '1974-01-22', '', '', 'Sidi Bel Abbes', 'Male', '0654319882', ''),
(51, 'Gourari', 'Imane', 'imanegourari@gmail.com', '123', 2, 0, '2024-05-30 10:05:00', '1983-12-15', '', '', 'Algiers', 'Female', '0654319773', ''),
(52, 'Hamidi', 'Mohamed', 'mohamedhamidi@gmail.com', '123', 2, 0, '2024-05-30 10:10:00', '1980-04-20', '', '', 'Oran', 'Male', '0654319664', ''),
(53, 'Mebarki', 'Leila', 'leilamebarki@gmail.com', '123', 2, 0, '2024-05-30 10:15:00', '1986-07-17', '', '', 'Tlemcen', 'Female', '0654319555', ''),
(54, 'Saad', 'Khaled', 'khaledsaad@gmail.com', '123', 2, 0, '2024-05-30 10:20:00', '1978-11-29', '', '', 'Sidi Bel Abbes', 'Male', '0654319446', ''),
(55, 'Bensaid', 'Nadia', 'nadiabensaid@gmail.com', '123', 2, 0, '2024-05-30 10:25:00', '1982-06-03', '', '', 'Algiers', 'Female', '0654319337', ''),
(56, 'Rahim', 'Ahmed', 'ahmedrahim@gmail.com', '123', 2, 0, '2024-05-30 10:30:00', '1975-08-10', '', '', 'Oran', 'Male', '0654319228', ''),
(57, 'Boukari', 'Fatima', 'fatimaboukari@gmail.com', '123', 2, 0, '2024-05-30 10:35:00', '1984-09-18', '', '', 'Tlemcen', 'Female', '0654319119', ''),
(58, 'Djellal', 'Hicham', 'hichamdjellal@gmail.com', '123', 2, 0, '2024-05-30 10:40:00', '1979-02-05', '', '', 'Sidi Bel Abbes', 'Male', '0654319000', '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `fields`
--
ALTER TABLE `fields`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `timetable`
--
ALTER TABLE `timetable`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT pour la table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT pour la table `fields`
--
ALTER TABLE `fields`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT pour la table `levels`
--
ALTER TABLE `levels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT pour la table `timetable`
--
ALTER TABLE `timetable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
