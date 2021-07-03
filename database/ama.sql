-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2019 at 06:06 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ama`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `password`) VALUES
(12, 'sakib', 'sakib.01', '$2y$10$MGM5NTdmNTQwNDkwMjA1MueAUReI/KkKqvc4Rm/DikM6EXew4zxvO'),
(14, 'sanoth', 'sanoth.01', '$2y$10$NjgzZGY2NGQ0ZTI0OTIzYOJoBd37N759J0kixADOe5wY30r4n0Vw6');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `student_roll` int(11) NOT NULL,
  `course_code` varchar(30) NOT NULL,
  `course_id` int(11) NOT NULL,
  `attendance_value` varchar(12) NOT NULL,
  `date` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `student_id`, `student_roll`, `course_code`, `course_id`, `attendance_value`, `date`) VALUES
(1, 1, 1601001, 'SSA-111', 1, 'Present', '16-01-19'),
(2, 2, 1601002, 'SSA-111', 1, 'Present', '16-01-19'),
(38, 321, 1602001, 'CCE-313', 5, 'Present', '27-01-19'),
(39, 322, 1602002, 'CCE-313', 5, 'Absent', '27-01-19'),
(40, 323, 1602003, 'CCE-313', 5, 'Present', '27-01-19'),
(41, 324, 1602004, 'CCE-313', 5, 'Present', '27-01-19'),
(42, 325, 1602005, 'CCE-313', 5, 'Present', '27-01-19'),
(43, 326, 1602006, 'CCE-313', 5, 'Absent', '27-01-19'),
(44, 327, 1602008, 'CCE-313', 5, 'Present', '27-01-19'),
(45, 328, 1602010, 'CCE-313', 5, 'Present', '27-01-19'),
(46, 329, 1602011, 'CCE-313', 5, 'Present', '27-01-19'),
(47, 330, 1602013, 'CCE-313', 5, 'Absent', '27-01-19'),
(48, 331, 1602016, 'CCE-313', 5, 'Present', '27-01-19'),
(49, 332, 1602017, 'CCE-313', 5, 'Absent', '27-01-19'),
(50, 31, 1602001, 'CCE-311', 4, 'Present', '30-01-19'),
(51, 32, 1602002, 'CCE-311', 4, 'Absent', '30-01-19'),
(52, 33, 1602003, 'CCE-311', 4, 'Present', '30-01-19'),
(53, 34, 1602004, 'CCE-311', 4, 'Absent', '30-01-19'),
(54, 35, 1602005, 'CCE-311', 4, 'Present', '30-01-19'),
(55, 36, 1602006, 'CCE-311', 4, 'Absent', '30-01-19'),
(56, 37, 1602008, 'CCE-311', 4, 'Present', '30-01-19'),
(57, 38, 1602010, 'CCE-311', 4, 'Absent', '30-01-19'),
(58, 39, 1602011, 'CCE-311', 4, 'Present', '30-01-19'),
(59, 40, 1602013, 'CCE-311', 4, 'Absent', '30-01-19'),
(60, 41, 1602016, 'CCE-311', 4, 'Absent', '30-01-19'),
(61, 42, 1602017, 'CCE-311', 4, 'Absent', '30-01-19'),
(62, 43, 1602019, 'CCE-311', 4, 'Present', '30-01-19'),
(63, 44, 1602020, 'CCE-311', 4, 'Absent', '30-01-19'),
(64, 45, 1602021, 'CCE-311', 4, 'Present', '30-01-19'),
(65, 46, 1602022, 'CCE-311', 4, 'Absent', '30-01-19'),
(66, 47, 1602023, 'CCE-311', 4, 'Present', '30-01-19'),
(67, 48, 1602024, 'CCE-311', 4, 'Absent', '30-01-19'),
(68, 836, 1502005, 'CCE-313', 8, 'Present', '30-01-19'),
(69, 837, 1502009, 'CCE-313', 8, 'Present', '30-01-19'),
(70, 838, 1502015, 'CCE-313', 8, 'Present', '30-01-19'),
(71, 839, 1502018, 'CCE-313', 8, 'Present', '30-01-19'),
(72, 840, 1502069, 'CCE-313', 8, 'Present', '30-01-19'),
(73, 782, 1602001, 'CCE-313', 8, 'Present', '30-01-19'),
(74, 783, 1602002, 'CCE-313', 8, 'Absent', '30-01-19'),
(75, 784, 1602003, 'CCE-313', 8, 'Present', '30-01-19'),
(76, 785, 1602004, 'CCE-313', 8, 'Present', '30-01-19'),
(77, 786, 1602005, 'CCE-313', 8, 'Present', '30-01-19'),
(78, 787, 1602006, 'CCE-313', 8, 'Present', '30-01-19'),
(79, 788, 1602008, 'CCE-313', 8, 'Present', '30-01-19'),
(80, 789, 1602010, 'CCE-313', 8, 'Present', '30-01-19'),
(81, 790, 1602011, 'CCE-313', 8, 'Present', '30-01-19'),
(82, 791, 1602013, 'CCE-313', 8, 'Absent', '30-01-19'),
(83, 792, 1602016, 'CCE-313', 8, 'Absent', '30-01-19'),
(84, 793, 1602017, 'CCE-313', 8, 'Absent', '30-01-19'),
(85, 794, 1602019, 'CCE-313', 8, 'Absent', '30-01-19'),
(86, 795, 1602020, 'CCE-313', 8, 'Absent', '30-01-19'),
(87, 796, 1602021, 'CCE-313', 8, 'Present', '30-01-19'),
(88, 797, 1602022, 'CCE-313', 8, 'Present', '30-01-19'),
(89, 798, 1602023, 'CCE-313', 8, 'Absent', '30-01-19'),
(90, 799, 1602024, 'CCE-313', 8, 'Absent', '30-01-19'),
(91, 800, 1602027, 'CCE-313', 8, 'Absent', '30-01-19'),
(92, 801, 1602028, 'CCE-313', 8, 'Absent', '30-01-19'),
(93, 802, 1602030, 'CCE-313', 8, 'Absent', '30-01-19'),
(94, 803, 1602032, 'CCE-313', 8, 'Present', '30-01-19'),
(95, 804, 1602036, 'CCE-313', 8, 'Present', '30-01-19'),
(96, 805, 1602037, 'CCE-313', 8, 'Present', '30-01-19'),
(97, 806, 1602038, 'CCE-313', 8, 'Absent', '30-01-19'),
(98, 807, 1602040, 'CCE-313', 8, 'Absent', '30-01-19'),
(99, 808, 1602041, 'CCE-313', 8, 'Present', '30-01-19'),
(100, 809, 1602042, 'CCE-313', 8, 'Absent', '30-01-19'),
(101, 810, 1602043, 'CCE-313', 8, 'Absent', '30-01-19'),
(102, 811, 1602045, 'CCE-313', 8, 'Absent', '30-01-19'),
(103, 812, 1602046, 'CCE-313', 8, 'Present', '30-01-19'),
(104, 813, 1602047, 'CCE-313', 8, 'Absent', '30-01-19'),
(105, 814, 1602048, 'CCE-313', 8, 'Absent', '30-01-19'),
(106, 815, 1602049, 'CCE-313', 8, 'Absent', '30-01-19'),
(107, 816, 1602050, 'CCE-313', 8, 'Absent', '30-01-19'),
(108, 817, 1602051, 'CCE-313', 8, 'Absent', '30-01-19'),
(109, 818, 1602053, 'CCE-313', 8, 'Absent', '30-01-19'),
(110, 819, 1602055, 'CCE-313', 8, 'Absent', '30-01-19'),
(111, 820, 1602057, 'CCE-313', 8, 'Absent', '30-01-19'),
(112, 821, 1602058, 'CCE-313', 8, 'Absent', '30-01-19'),
(113, 822, 1602060, 'CCE-313', 8, 'Absent', '30-01-19'),
(114, 823, 1602061, 'CCE-313', 8, 'Absent', '30-01-19'),
(115, 824, 1602062, 'CCE-313', 8, 'Absent', '30-01-19'),
(116, 825, 1602063, 'CCE-313', 8, 'Absent', '30-01-19'),
(117, 826, 1602064, 'CCE-313', 8, 'Present', '30-01-19'),
(118, 827, 1602065, 'CCE-313', 8, 'Present', '30-01-19'),
(119, 828, 1602066, 'CCE-313', 8, 'Absent', '30-01-19'),
(120, 829, 1602067, 'CCE-313', 8, 'Present', '30-01-19'),
(121, 830, 1602069, 'CCE-313', 8, 'Present', '30-01-19'),
(122, 831, 1602070, 'CCE-313', 8, 'Present', '30-01-19'),
(123, 832, 1602073, 'CCE-313', 8, 'Present', '30-01-19'),
(124, 833, 1602074, 'CCE-313', 8, 'Present', '30-01-19'),
(125, 834, 1602075, 'CCE-313', 8, 'Absent', '30-01-19'),
(126, 835, 1602076, 'CCE-313', 8, 'Absent', '30-01-19'),
(127, 836, 1502005, 'CCE-313', 8, 'Present', '02-02-19'),
(128, 837, 1502009, 'CCE-313', 8, 'Present', '02-02-19'),
(129, 838, 1502015, 'CCE-313', 8, 'Present', '02-02-19'),
(130, 839, 1502018, 'CCE-313', 8, 'Present', '02-02-19'),
(131, 840, 1502069, 'CCE-313', 8, 'Absent', '02-02-19'),
(132, 782, 1602001, 'CCE-313', 8, 'Present', '02-02-19'),
(133, 783, 1602002, 'CCE-313', 8, 'Present', '02-02-19'),
(134, 784, 1602003, 'CCE-313', 8, 'Present', '02-02-19'),
(135, 785, 1602004, 'CCE-313', 8, 'Present', '02-02-19'),
(136, 786, 1602005, 'CCE-313', 8, 'Present', '02-02-19'),
(137, 787, 1602006, 'CCE-313', 8, 'Absent', '02-02-19'),
(138, 788, 1602008, 'CCE-313', 8, 'Present', '02-02-19'),
(139, 789, 1602010, 'CCE-313', 8, 'Absent', '02-02-19'),
(140, 790, 1602011, 'CCE-313', 8, 'Present', '02-02-19'),
(141, 791, 1602013, 'CCE-313', 8, 'Present', '02-02-19'),
(142, 792, 1602016, 'CCE-313', 8, 'Present', '02-02-19'),
(143, 793, 1602017, 'CCE-313', 8, 'Present', '02-02-19'),
(144, 794, 1602019, 'CCE-313', 8, 'Present', '02-02-19'),
(145, 795, 1602020, 'CCE-313', 8, 'Present', '02-02-19'),
(146, 796, 1602021, 'CCE-313', 8, 'Absent', '02-02-19'),
(147, 797, 1602022, 'CCE-313', 8, 'Present', '02-02-19'),
(148, 798, 1602023, 'CCE-313', 8, 'Absent', '02-02-19'),
(149, 799, 1602024, 'CCE-313', 8, 'Present', '02-02-19'),
(150, 800, 1602027, 'CCE-313', 8, 'Present', '02-02-19'),
(151, 801, 1602028, 'CCE-313', 8, 'Present', '02-02-19'),
(152, 802, 1602030, 'CCE-313', 8, 'Present', '02-02-19'),
(153, 803, 1602032, 'CCE-313', 8, 'Absent', '02-02-19'),
(154, 804, 1602036, 'CCE-313', 8, 'Absent', '02-02-19'),
(155, 805, 1602037, 'CCE-313', 8, 'Absent', '02-02-19'),
(156, 806, 1602038, 'CCE-313', 8, 'Absent', '02-02-19'),
(157, 807, 1602040, 'CCE-313', 8, 'Absent', '02-02-19'),
(158, 808, 1602041, 'CCE-313', 8, 'Present', '02-02-19'),
(159, 809, 1602042, 'CCE-313', 8, 'Present', '02-02-19'),
(160, 810, 1602043, 'CCE-313', 8, 'Absent', '02-02-19'),
(161, 811, 1602045, 'CCE-313', 8, 'Present', '02-02-19'),
(162, 812, 1602046, 'CCE-313', 8, 'Present', '02-02-19'),
(163, 813, 1602047, 'CCE-313', 8, 'Absent', '02-02-19'),
(164, 814, 1602048, 'CCE-313', 8, 'Present', '02-02-19'),
(165, 815, 1602049, 'CCE-313', 8, 'Present', '02-02-19'),
(166, 816, 1602050, 'CCE-313', 8, 'Present', '02-02-19'),
(167, 817, 1602051, 'CCE-313', 8, 'Present', '02-02-19'),
(168, 818, 1602053, 'CCE-313', 8, 'Present', '02-02-19'),
(169, 819, 1602055, 'CCE-313', 8, 'Present', '02-02-19'),
(170, 820, 1602057, 'CCE-313', 8, 'Present', '02-02-19'),
(171, 821, 1602058, 'CCE-313', 8, 'Present', '02-02-19'),
(172, 822, 1602060, 'CCE-313', 8, 'Present', '02-02-19'),
(173, 823, 1602061, 'CCE-313', 8, 'Absent', '02-02-19'),
(174, 824, 1602062, 'CCE-313', 8, 'Present', '02-02-19'),
(175, 825, 1602063, 'CCE-313', 8, 'Present', '02-02-19'),
(176, 826, 1602064, 'CCE-313', 8, 'Absent', '02-02-19'),
(177, 827, 1602065, 'CCE-313', 8, 'Present', '02-02-19'),
(178, 828, 1602066, 'CCE-313', 8, 'Present', '02-02-19'),
(179, 829, 1602067, 'CCE-313', 8, 'Present', '02-02-19'),
(180, 830, 1602069, 'CCE-313', 8, 'Present', '02-02-19'),
(181, 831, 1602070, 'CCE-313', 8, 'Present', '02-02-19'),
(182, 832, 1602073, 'CCE-313', 8, 'Absent', '02-02-19'),
(183, 833, 1602074, 'CCE-313', 8, 'Present', '02-02-19'),
(184, 834, 1602075, 'CCE-313', 8, 'Present', '02-02-19'),
(185, 835, 1602076, 'CCE-313', 8, 'Present', '02-02-19'),
(186, 31, 1602001, 'CCE-311', 4, 'Absent', '02-02-19'),
(187, 32, 1602002, 'CCE-311', 4, 'Present', '02-02-19'),
(188, 33, 1602003, 'CCE-311', 4, 'Absent', '02-02-19'),
(189, 34, 1602004, 'CCE-311', 4, 'Present', '02-02-19'),
(190, 35, 1602005, 'CCE-311', 4, 'Present', '02-02-19'),
(191, 36, 1602006, 'CCE-311', 4, 'Present', '02-02-19'),
(192, 37, 1602008, 'CCE-311', 4, 'Present', '02-02-19'),
(193, 38, 1602010, 'CCE-311', 4, 'Present', '02-02-19'),
(194, 39, 1602011, 'CCE-311', 4, 'Absent', '02-02-19'),
(195, 40, 1602013, 'CCE-311', 4, 'Present', '02-02-19'),
(196, 41, 1602016, 'CCE-311', 4, 'Present', '02-02-19'),
(197, 42, 1602017, 'CCE-311', 4, 'Present', '02-02-19'),
(198, 43, 1602019, 'CCE-311', 4, 'Present', '02-02-19'),
(199, 44, 1602020, 'CCE-311', 4, 'Absent', '02-02-19'),
(200, 45, 1602021, 'CCE-311', 4, 'Present', '02-02-19'),
(201, 46, 1602022, 'CCE-311', 4, 'Absent', '02-02-19'),
(202, 47, 1602023, 'CCE-311', 4, 'Present', '02-02-19'),
(203, 48, 1602024, 'CCE-311', 4, 'Present', '02-02-19'),
(204, 895, 1502005, 'CIT-311', 9, 'Absent', '03-02-19'),
(205, 896, 1502009, 'CIT-311', 9, 'Absent', '03-02-19'),
(206, 897, 1502015, 'CIT-311', 9, 'Absent', '03-02-19'),
(207, 898, 1502018, 'CIT-311', 9, 'Absent', '03-02-19'),
(208, 899, 1502069, 'CIT-311', 9, 'Absent', '03-02-19'),
(209, 841, 1602001, 'CIT-311', 9, 'Absent', '03-02-19'),
(210, 842, 1602002, 'CIT-311', 9, 'Absent', '03-02-19'),
(211, 843, 1602003, 'CIT-311', 9, 'Absent', '03-02-19'),
(212, 844, 1602004, 'CIT-311', 9, 'Absent', '03-02-19'),
(213, 845, 1602005, 'CIT-311', 9, 'Absent', '03-02-19'),
(214, 846, 1602006, 'CIT-311', 9, 'Absent', '03-02-19'),
(215, 847, 1602008, 'CIT-311', 9, 'Absent', '03-02-19'),
(216, 848, 1602010, 'CIT-311', 9, 'Absent', '03-02-19'),
(217, 849, 1602011, 'CIT-311', 9, 'Absent', '03-02-19'),
(218, 850, 1602013, 'CIT-311', 9, 'Absent', '03-02-19'),
(219, 851, 1602016, 'CIT-311', 9, 'Absent', '03-02-19'),
(220, 852, 1602017, 'CIT-311', 9, 'Absent', '03-02-19'),
(221, 853, 1602019, 'CIT-311', 9, 'Absent', '03-02-19'),
(222, 854, 1602020, 'CIT-311', 9, 'Absent', '03-02-19'),
(223, 855, 1602021, 'CIT-311', 9, 'Absent', '03-02-19'),
(224, 856, 1602022, 'CIT-311', 9, 'Absent', '03-02-19'),
(225, 857, 1602023, 'CIT-311', 9, 'Absent', '03-02-19'),
(226, 858, 1602024, 'CIT-311', 9, 'Absent', '03-02-19'),
(227, 859, 1602027, 'CIT-311', 9, 'Absent', '03-02-19'),
(228, 860, 1602028, 'CIT-311', 9, 'Absent', '03-02-19'),
(229, 861, 1602030, 'CIT-311', 9, 'Absent', '03-02-19'),
(230, 862, 1602032, 'CIT-311', 9, 'Absent', '03-02-19'),
(231, 863, 1602036, 'CIT-311', 9, 'Absent', '03-02-19'),
(232, 864, 1602037, 'CIT-311', 9, 'Absent', '03-02-19'),
(233, 865, 1602038, 'CIT-311', 9, 'Absent', '03-02-19'),
(234, 866, 1602040, 'CIT-311', 9, 'Absent', '03-02-19'),
(235, 867, 1602041, 'CIT-311', 9, 'Absent', '03-02-19'),
(236, 868, 1602042, 'CIT-311', 9, 'Absent', '03-02-19'),
(237, 869, 1602043, 'CIT-311', 9, 'Absent', '03-02-19'),
(238, 870, 1602045, 'CIT-311', 9, 'Absent', '03-02-19'),
(239, 871, 1602046, 'CIT-311', 9, 'Absent', '03-02-19'),
(240, 872, 1602047, 'CIT-311', 9, 'Absent', '03-02-19'),
(241, 873, 1602048, 'CIT-311', 9, 'Absent', '03-02-19'),
(242, 874, 1602049, 'CIT-311', 9, 'Absent', '03-02-19'),
(243, 875, 1602050, 'CIT-311', 9, 'Absent', '03-02-19'),
(244, 876, 1602051, 'CIT-311', 9, 'Absent', '03-02-19'),
(245, 877, 1602053, 'CIT-311', 9, 'Absent', '03-02-19'),
(246, 878, 1602055, 'CIT-311', 9, 'Absent', '03-02-19'),
(247, 879, 1602057, 'CIT-311', 9, 'Absent', '03-02-19'),
(248, 880, 1602058, 'CIT-311', 9, 'Absent', '03-02-19'),
(249, 881, 1602060, 'CIT-311', 9, 'Absent', '03-02-19'),
(250, 882, 1602061, 'CIT-311', 9, 'Absent', '03-02-19'),
(251, 883, 1602062, 'CIT-311', 9, 'Absent', '03-02-19'),
(252, 884, 1602063, 'CIT-311', 9, 'Absent', '03-02-19'),
(253, 885, 1602064, 'CIT-311', 9, 'Absent', '03-02-19'),
(254, 886, 1602065, 'CIT-311', 9, 'Absent', '03-02-19'),
(255, 887, 1602066, 'CIT-311', 9, 'Absent', '03-02-19'),
(256, 888, 1602067, 'CIT-311', 9, 'Absent', '03-02-19'),
(257, 889, 1602069, 'CIT-311', 9, 'Absent', '03-02-19'),
(258, 890, 1602070, 'CIT-311', 9, 'Absent', '03-02-19'),
(259, 891, 1602073, 'CIT-311', 9, 'Absent', '03-02-19'),
(260, 892, 1602074, 'CIT-311', 9, 'Absent', '03-02-19'),
(261, 893, 1602075, 'CIT-311', 9, 'Absent', '03-02-19'),
(262, 894, 1602076, 'CIT-311', 9, 'Absent', '03-02-19');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `designation` varchar(20) DEFAULT NULL,
  `message` text NOT NULL,
  `sending_date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `phone`, `designation`, `message`, `sending_date`) VALUES
(1, 'rahim', 'rahim@gmail.com', '01521410716', '', 'There\'s a mistake in my attendance percentage', '14-02-19');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `course_code` varchar(20) NOT NULL,
  `course_title` varchar(40) NOT NULL,
  `semester` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `teacher_id`, `course_code`, `course_title`, `semester`) VALUES
(1, 5, 'SSA-111', 'Soil Science', '1'),
(4, 7, 'CCE-311', 'Numerical Methods', '5'),
(5, 6, 'CCE-313', 'Computer Networks', '5'),
(7, 6, 'CIT-213', 'Software Engineering', '3'),
(8, 7, 'CCE-313', 'Computer Networks', '5'),
(9, 7, 'CIT-311', 'Microprocessor', '5');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `roll` int(11) NOT NULL,
  `course_code` varchar(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `session` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `roll`, `course_code`, `course_id`, `session`) VALUES
(1, 'Abir hasan', 1601001, 'SSA-111', 1, '2016-17'),
(2, 'Foysal Wahid', 1601002, 'SSA-111', 1, '2016-17'),
(31, 'Surajit Biswas', 1602001, 'CCE-311', 4, '2016-17'),
(32, 'Shagota Mondal Divya', 1602002, 'CCE-311', 4, '2016-17'),
(33, 'Md. Jaki AL Amin', 1602003, 'CCE-311', 4, '2016-17'),
(34, 'Subir Mukherjee', 1602004, 'CCE-311', 4, '2016-17'),
(35, 'Monir Hossain Noyon', 1602005, 'CCE-311', 4, '2016-17'),
(36, 'Abdullah Md. Nayem', 1602006, 'CCE-311', 4, '2016-17'),
(37, 'Md. Azharul Islam', 1602008, 'CCE-311', 4, '2016-17'),
(38, 'Md. Rasel Hossain', 1602010, 'CCE-311', 4, '2016-17'),
(39, 'Md. Muksit  Ul Islam', 1602011, 'CCE-311', 4, '2016-17'),
(40, 'Ejaj Hossain Khan', 1602013, 'CCE-311', 4, '2016-17'),
(41, 'Md Nurul Kabir Akash', 1602016, 'CCE-311', 4, '2016-17'),
(42, 'Fardin Islam', 1602017, 'CCE-311', 4, '2016-17'),
(43, 'Julshan Alam Ratu', 1602019, 'CCE-311', 4, '2016-17'),
(44, 'Mohammad Rezaul Karim', 1602020, 'CCE-311', 4, '2016-17'),
(45, 'Md. Imran Khan', 1602021, 'CCE-311', 4, '2016-17'),
(46, 'Syed Nazmus  Sakib', 1602022, 'CCE-311', 4, '2016-17'),
(47, 'Sherajul Islam', 1602023, 'CCE-311', 4, '2016-17'),
(48, 'Tanbeer Ahammad', 1602024, 'CCE-311', 4, '2016-17'),
(321, 'Surajit Biswas', 1602001, 'CCE-313', 5, '2016-17'),
(322, 'Shagota Mondal Divya', 1602002, 'CCE-313', 5, '2016-17'),
(323, 'Md. Jaki AL Amin', 1602003, 'CCE-313', 5, '2016-17'),
(324, 'Subir Mukherjee', 1602004, 'CCE-313', 5, '2016-17'),
(325, 'Monir Hossain Noyon', 1602005, 'CCE-313', 5, '2016-17'),
(326, 'Abdullah Md. Nayem', 1602006, 'CCE-313', 5, '2016-17'),
(327, 'Md. Azharul Islam', 1602008, 'CCE-313', 5, '2016-17'),
(328, 'Md. Rasel Hossain', 1602010, 'CCE-313', 5, '2016-17'),
(329, 'Md. Muksit  Ul Islam', 1602011, 'CCE-313', 5, '2016-17'),
(330, 'Ejaj Hossain Khan', 1602013, 'CCE-313', 5, '2016-17'),
(331, 'Md Nurul Kabir Akash', 1602016, 'CCE-313', 5, '2016-17'),
(332, 'Fardin Islam', 1602017, 'CCE-313', 5, '2016-17'),
(782, 'Surajit Biswas', 1602001, 'CCE-313', 8, '2016-17'),
(783, 'Shagota Mondal Divya', 1602002, 'CCE-313', 8, '2016-17'),
(784, 'Md. Jaki AL Amin', 1602003, 'CCE-313', 8, '2016-17'),
(785, 'Subir Mukherjee', 1602004, 'CCE-313', 8, '2016-17'),
(786, 'Monir Hossain Noyon', 1602005, 'CCE-313', 8, '2016-17'),
(787, 'Abdullah Md. Nayem', 1602006, 'CCE-313', 8, '2016-17'),
(788, 'Md. Azharul Islam', 1602008, 'CCE-313', 8, '2016-17'),
(789, 'Md. Rasel Hossain', 1602010, 'CCE-313', 8, '2016-17'),
(790, 'Md. Muksit  Ul Islam', 1602011, 'CCE-313', 8, '2016-17'),
(791, 'Ejaj Hossain Khan', 1602013, 'CCE-313', 8, '2016-17'),
(792, 'Md Nurul Kabir Akash', 1602016, 'CCE-313', 8, '2016-17'),
(793, 'Fardin Islam', 1602017, 'CCE-313', 8, '2016-17'),
(794, 'Julshan Alam Ratu', 1602019, 'CCE-313', 8, '2016-17'),
(795, 'Mohammad Rezaul Karim', 1602020, 'CCE-313', 8, '2016-17'),
(796, 'Md. Imran Khan', 1602021, 'CCE-313', 8, '2016-17'),
(797, 'Syed Nazmus  Sakib', 1602022, 'CCE-313', 8, '2016-17'),
(798, 'Sherajul Islam', 1602023, 'CCE-313', 8, '2016-17'),
(799, 'Tanbeer Ahammad', 1602024, 'CCE-313', 8, '2016-17'),
(800, 'Md. Munim Hossain', 1602027, 'CCE-313', 8, '2016-17'),
(801, 'Ishrak Juhayer Bishal', 1602028, 'CCE-313', 8, '2016-17'),
(802, 'Farzin Anan Mukit', 1602030, 'CCE-313', 8, '2016-17'),
(803, 'Md. Sadekur Rahman', 1602032, 'CCE-313', 8, '2016-17'),
(804, 'Jahidul Islam', 1602036, 'CCE-313', 8, '2016-17'),
(805, 'Farhana Yeasmin Eva', 1602037, 'CCE-313', 8, '2016-17'),
(806, 'Md. Mahmudul Hasan Faisal', 1602038, 'CCE-313', 8, '2016-17'),
(807, 'Delwar Hosen', 1602040, 'CCE-313', 8, '2016-17'),
(808, 'Rifat Rahman', 1602041, 'CCE-313', 8, '2016-17'),
(809, 'Md. Maruf Hossain', 1602042, 'CCE-313', 8, '2016-17'),
(810, 'Jannatul Ferdaush', 1602043, 'CCE-313', 8, '2016-17'),
(811, 'Morium Sultana', 1602045, 'CCE-313', 8, '2016-17'),
(812, 'Mahadi Hasan Tusher', 1602046, 'CCE-313', 8, '2016-17'),
(813, 'Tamim Ibne Shahidullah', 1602047, 'CCE-313', 8, '2016-17'),
(814, 'Md Rubel Hossen', 1602048, 'CCE-313', 8, '2016-17'),
(815, 'Md. Naymur Rashid', 1602049, 'CCE-313', 8, '2016-17'),
(816, 'Setu Rani Mondal', 1602050, 'CCE-313', 8, '2016-17'),
(817, 'Mizanur Rahaman', 1602051, 'CCE-313', 8, '2016-17'),
(818, 'Raonak Jahan Mimi', 1602053, 'CCE-313', 8, '2016-17'),
(819, 'Marium Alom Mim', 1602055, 'CCE-313', 8, '2016-17'),
(820, 'Sanoth Debnath', 1602057, 'CCE-313', 8, '2016-17'),
(821, 'Shadik Faysal', 1602058, 'CCE-313', 8, '2016-17'),
(822, 'Md. Rifat Mahmud', 1602060, 'CCE-313', 8, '2016-17'),
(823, 'Hasibul Hasan', 1602061, 'CCE-313', 8, '2016-17'),
(824, 'Mst. Nusrat Sultana Dina', 1602062, 'CCE-313', 8, '2016-17'),
(825, 'Md. Shohanur Rahman', 1602063, 'CCE-313', 8, '2016-17'),
(826, 'Md. Tanjil Ahmed', 1602064, 'CCE-313', 8, '2016-17'),
(827, 'Jannatul Ferdousi', 1602065, 'CCE-313', 8, '2016-17'),
(828, 'Md. Rakibul Islam', 1602066, 'CCE-313', 8, '2016-17'),
(829, 'Md. Forhad Hossain', 1602067, 'CCE-313', 8, '2016-17'),
(830, 'Bhugol Bijoy Chakma', 1602069, 'CCE-313', 8, '2016-17'),
(831, 'Tafsir Ahamed', 1602070, 'CCE-313', 8, '2016-17'),
(832, 'HafiJa Aktar', 1602073, 'CCE-313', 8, '2016-17'),
(833, 'Nusrat Jahan Aunto', 1602074, 'CCE-313', 8, '2016-17'),
(834, 'Abdulla All Kawsar', 1602075, 'CCE-313', 8, '2016-17'),
(835, 'Tarun Chandra Das', 1602076, 'CCE-313', 8, '2016-17'),
(836, 'Md. Mahedi Hasan', 1502005, 'CCE-313', 8, '2016-17'),
(837, 'Mahmudul Hasan Sumon', 1502009, 'CCE-313', 8, '2016-17'),
(838, 'Pranesh Chakma', 1502015, 'CCE-313', 8, '2016-17'),
(839, 'Fahmida Rahman Liza', 1502018, 'CCE-313', 8, '2016-17'),
(840, 'Md. Siam Talukder', 1502069, 'CCE-313', 8, '2016-17'),
(841, 'Surajit Biswas', 1602001, 'CIT-311', 9, '2016-17'),
(842, 'Shagota Mondal Divya', 1602002, 'CIT-311', 9, '2016-17'),
(843, 'Md. Jaki AL Amin', 1602003, 'CIT-311', 9, '2016-17'),
(844, 'Subir Mukherjee', 1602004, 'CIT-311', 9, '2016-17'),
(845, 'Monir Hossain Noyon', 1602005, 'CIT-311', 9, '2016-17'),
(846, 'Abdullah Md. Nayem', 1602006, 'CIT-311', 9, '2016-17'),
(847, 'Md. Azharul Islam', 1602008, 'CIT-311', 9, '2016-17'),
(848, 'Md. Rasel Hossain', 1602010, 'CIT-311', 9, '2016-17'),
(849, 'Md. Muksit  Ul Islam', 1602011, 'CIT-311', 9, '2016-17'),
(850, 'Ejaj Hossain Khan', 1602013, 'CIT-311', 9, '2016-17'),
(851, 'Md Nurul Kabir Akash', 1602016, 'CIT-311', 9, '2016-17'),
(852, 'Fardin Islam', 1602017, 'CIT-311', 9, '2016-17'),
(853, 'Julshan Alam Ratu', 1602019, 'CIT-311', 9, '2016-17'),
(854, 'Mohammad Rezaul Karim', 1602020, 'CIT-311', 9, '2016-17'),
(855, 'Md. Imran Khan', 1602021, 'CIT-311', 9, '2016-17'),
(856, 'Syed Nazmus  Sakib', 1602022, 'CIT-311', 9, '2016-17'),
(857, 'Sherajul Islam', 1602023, 'CIT-311', 9, '2016-17'),
(858, 'Tanbeer Ahammad', 1602024, 'CIT-311', 9, '2016-17'),
(859, 'Md. Munim Hossain', 1602027, 'CIT-311', 9, '2016-17'),
(860, 'Ishrak Juhayer Bishal', 1602028, 'CIT-311', 9, '2016-17'),
(861, 'Farzin Anan Mukit', 1602030, 'CIT-311', 9, '2016-17'),
(862, 'Md. Sadekur Rahman', 1602032, 'CIT-311', 9, '2016-17'),
(863, 'Jahidul Islam', 1602036, 'CIT-311', 9, '2016-17'),
(864, 'Farhana Yeasmin Eva', 1602037, 'CIT-311', 9, '2016-17'),
(865, 'Md. Mahmudul Hasan Faisal', 1602038, 'CIT-311', 9, '2016-17'),
(866, 'Delwar Hosen', 1602040, 'CIT-311', 9, '2016-17'),
(867, 'Rifat Rahman', 1602041, 'CIT-311', 9, '2016-17'),
(868, 'Md. Maruf Hossain', 1602042, 'CIT-311', 9, '2016-17'),
(869, 'Jannatul Ferdaush', 1602043, 'CIT-311', 9, '2016-17'),
(870, 'Morium Sultana', 1602045, 'CIT-311', 9, '2016-17'),
(871, 'Mahadi Hasan Tusher', 1602046, 'CIT-311', 9, '2016-17'),
(872, 'Tamim Ibne Shahidullah', 1602047, 'CIT-311', 9, '2016-17'),
(873, 'Md Rubel Hossen', 1602048, 'CIT-311', 9, '2016-17'),
(874, 'Md. Naymur Rashid', 1602049, 'CIT-311', 9, '2016-17'),
(875, 'Setu Rani Mondal', 1602050, 'CIT-311', 9, '2016-17'),
(876, 'Mizanur Rahaman', 1602051, 'CIT-311', 9, '2016-17'),
(877, 'Raonak Jahan Mimi', 1602053, 'CIT-311', 9, '2016-17'),
(878, 'Marium Alom Mim', 1602055, 'CIT-311', 9, '2016-17'),
(879, 'Sanoth Debnath', 1602057, 'CIT-311', 9, '2016-17'),
(880, 'Shadik Faysal', 1602058, 'CIT-311', 9, '2016-17'),
(881, 'Md. Rifat Mahmud', 1602060, 'CIT-311', 9, '2016-17'),
(882, 'Hasibul Hasan', 1602061, 'CIT-311', 9, '2016-17'),
(883, 'Mst. Nusrat Sultana Dina', 1602062, 'CIT-311', 9, '2016-17'),
(884, 'Md. Shohanur Rahman', 1602063, 'CIT-311', 9, '2016-17'),
(885, 'Md. Tanjil Ahmed', 1602064, 'CIT-311', 9, '2016-17'),
(886, 'Jannatul Ferdousi', 1602065, 'CIT-311', 9, '2016-17'),
(887, 'Md. Rakibul Islam', 1602066, 'CIT-311', 9, '2016-17'),
(888, 'Md. Forhad Hossain', 1602067, 'CIT-311', 9, '2016-17'),
(889, 'Bhugol Bijoy Chakma', 1602069, 'CIT-311', 9, '2016-17'),
(890, 'Tafsir Ahamed', 1602070, 'CIT-311', 9, '2016-17'),
(891, 'HafiJa Aktar', 1602073, 'CIT-311', 9, '2016-17'),
(892, 'Nusrat Jahan Aunto', 1602074, 'CIT-311', 9, '2016-17'),
(893, 'Abdulla All Kawsar', 1602075, 'CIT-311', 9, '2016-17'),
(894, 'Tarun Chandra Das', 1602076, 'CIT-311', 9, '2016-17'),
(895, 'Md. Mahedi Hasan', 1502005, 'CIT-311', 9, '2016-17'),
(896, 'Mahmudul Hasan Sumon', 1502009, 'CIT-311', 9, '2016-17'),
(897, 'Pranesh Chakma', 1502015, 'CIT-311', 9, '2016-17'),
(898, 'Fahmida Rahman Liza', 1502018, 'CIT-311', 9, '2016-17'),
(899, 'Md. Siam Talukder', 1502069, 'CIT-311', 9, '2016-17');

-- --------------------------------------------------------

--
-- Table structure for table `student2`
--

CREATE TABLE `student2` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `roll` int(20) NOT NULL,
  `course_id` int(20) NOT NULL,
  `course_code` varchar(20) NOT NULL,
  `session` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student2`
--

INSERT INTO `student2` (`id`, `name`, `roll`, `course_id`, `course_code`, `session`) VALUES
(178, 'Julshan Alam Ratu', 1602019, 8, 'CCE-313', '2016-17'),
(179, 'Mohammad Rezaul Karim', 1602020, 8, 'CCE-313', '2016-17'),
(180, 'Md. Imran Khan', 1602021, 8, 'CCE-313', '2016-17'),
(181, 'Syed Nazmus  Sakib', 1602022, 8, 'CCE-313', '2016-17'),
(182, 'Sherajul Islam', 1602023, 8, 'CCE-313', '2016-17'),
(183, 'Tanbeer Ahammad', 1602024, 8, 'CCE-313', '2016-17'),
(184, 'Md. Munim Hossain', 1602027, 8, 'CCE-313', '2016-17'),
(185, 'Ishrak Juhayer Bishal', 1602028, 8, 'CCE-313', '2016-17'),
(186, 'Farzin Anan Mukit', 1602030, 8, 'CCE-313', '2016-17'),
(187, 'Md. Sadekur Rahman', 1602032, 8, 'CCE-313', '2016-17'),
(188, 'Jahidul Islam', 1602036, 8, 'CCE-313', '2016-17'),
(189, 'Farhana Yeasmin Eva', 1602037, 8, 'CCE-313', '2016-17'),
(190, 'Md. Mahmudul Hasan Faisal', 1602038, 8, 'CCE-313', '2016-17'),
(191, 'Delwar Hosen', 1602040, 8, 'CCE-313', '2016-17'),
(192, 'Rifat Rahman', 1602041, 8, 'CCE-313', '2016-17'),
(193, 'Md. Maruf Hossain', 1602042, 8, 'CCE-313', '2016-17'),
(194, 'Jannatul Ferdaush', 1602043, 8, 'CCE-313', '2016-17'),
(195, 'Morium Sultana', 1602045, 8, 'CCE-313', '2016-17'),
(196, 'Mahadi Hasan Tusher', 1602046, 8, 'CCE-313', '2016-17'),
(197, 'Tamim Ibne Shahidullah', 1602047, 8, 'CCE-313', '2016-17'),
(198, 'Md Rubel Hossen', 1602048, 8, 'CCE-313', '2016-17'),
(199, 'Md. Naymur Rashid', 1602049, 8, 'CCE-313', '2016-17'),
(200, 'Setu Rani Mondal', 1602050, 8, 'CCE-313', '2016-17'),
(201, 'Mizanur Rahaman', 1602051, 8, 'CCE-313', '2016-17'),
(202, 'Raonak Jahan Mimi', 1602053, 8, 'CCE-313', '2016-17'),
(203, 'Marium Alom Mim', 1602055, 8, 'CCE-313', '2016-17'),
(204, 'Sanoth Debnath', 1602057, 8, 'CCE-313', '2016-17'),
(205, 'Shadik Faysal', 1602058, 8, 'CCE-313', '2016-17'),
(206, 'Md. Rifat Mahmud', 1602060, 8, 'CCE-313', '2016-17'),
(207, 'Hasibul Hasan', 1602061, 8, 'CCE-313', '2016-17'),
(208, 'Mst. Nusrat Sultana Dina', 1602062, 8, 'CCE-313', '2016-17'),
(209, 'Md. Shohanur Rahman', 1602063, 8, 'CCE-313', '2016-17'),
(210, 'Md. Tanjil Ahmed', 1602064, 8, 'CCE-313', '2016-17'),
(211, 'Jannatul Ferdousi', 1602065, 8, 'CCE-313', '2016-17'),
(212, 'Md. Rakibul Islam', 1602066, 8, 'CCE-313', '2016-17'),
(213, 'Md. Forhad Hossain', 1602067, 8, 'CCE-313', '2016-17'),
(214, 'Bhugol Bijoy Chakma', 1602069, 8, 'CCE-313', '2016-17'),
(215, 'Tafsir Ahamed', 1602070, 8, 'CCE-313', '2016-17'),
(216, 'HafiJa Aktar', 1602073, 8, 'CCE-313', '2016-17'),
(217, 'Nusrat Jahan Aunto', 1602074, 8, 'CCE-313', '2016-17'),
(218, 'Abdulla All Kawsar', 1602075, 8, 'CCE-313', '2016-17'),
(219, 'Tarun Chandra Das', 1602076, 8, 'CCE-313', '2016-17'),
(220, 'Md. Mahedi Hasan', 1502005, 8, 'CCE-313', '2016-17'),
(221, 'Mahmudul Hasan Sumon', 1502009, 8, 'CCE-313', '2016-17'),
(222, 'Pranesh Chakma', 1502015, 8, 'CCE-313', '2016-17'),
(223, 'Fahmida Rahman Liza', 1502018, 8, 'CCE-313', '2016-17'),
(224, 'Md. Siam Talukder', 1502069, 8, 'CCE-313', '2016-17');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `rank` varchar(30) NOT NULL,
  `faculty` varchar(50) NOT NULL,
  `department` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `name`, `rank`, `faculty`, `department`, `email`, `username`, `password`) VALUES
(5, 'Atik Hasan', 'Professor', 'Agriculture', 'Soil Science', 'atik@gmail.com', 'atik.01', '$2y$10$MjdjMmQyZTMzYmRmYjlkYus6bSDET1iwqW6xiDuQRV4Tc8BqiEEvm'),
(6, 'Moinul Islam Sayed ', 'Lecturer', 'Computer Science and Engineering', 'Computer Science and Informati', 'smoinul@pstu.ac.bd', 'smoinul', '$2y$10$Y2E3MDA4MjI0M2ZlNGQxMeNDgRy8qn6KF3h6tx8G8UGAOemlcvY.K'),
(7, 'Golam Md. Muradul Bashir', 'Associate Professor', 'Computer Science and Engineering', 'Computer and Communication Eng', 'murad98csekuet@yahoo.com', 'murad98', '$2y$10$OWFkMTA2ZTU1ZGZlNGQzMu6eZFEbRL/Uagrb3HoZ0EYKrfjAc5Uvy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student2`
--
ALTER TABLE `student2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=263;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=900;

--
-- AUTO_INCREMENT for table `student2`
--
ALTER TABLE `student2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=225;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
