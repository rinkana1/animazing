-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 04, 2025 at 10:01 PM
-- Server version: 5.7.24
-- PHP Version: 8.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `animazing`
--

-- --------------------------------------------------------

--
-- Table structure for table `map`
--

CREATE TABLE `map` (
  `id` int(11) NOT NULL,
  `content_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` int(2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `map`
--

INSERT INTO `map` (`id`, `content_id`, `user_id`, `rating`, `created_at`) VALUES
(6, 7, 11, 9, '2025-04-30 18:01:51'),
(7, 19, 11, 8, '2025-04-30 18:01:51'),
(8, 31, 11, 7, '2025-04-30 18:01:51'),
(9, 48, 11, 10, '2025-04-30 18:01:51'),
(10, 2, 11, 8, '2025-04-30 18:01:51'),
(11, 11, 12, 7, '2025-04-30 18:01:51'),
(12, 25, 12, 9, '2025-04-30 18:01:51'),
(13, 39, 12, 7, '2025-04-30 18:01:51'),
(14, 50, 12, 9, '2025-04-30 18:01:51'),
(15, 18, 12, 6, '2025-04-30 18:01:51'),
(16, 5, 13, 9, '2025-04-30 18:01:51'),
(17, 22, 13, 8, '2025-04-30 18:01:51'),
(18, 34, 13, 9, '2025-04-30 18:01:51'),
(19, 45, 13, 6, '2025-04-30 18:01:51'),
(20, 9, 13, 9, '2025-04-30 18:01:51'),
(21, 16, 14, 8, '2025-04-30 18:01:51'),
(22, 29, 14, 8, '2025-04-30 18:01:51'),
(23, 41, 14, 7, '2025-04-30 18:01:51'),
(24, 4, 14, 9, '2025-04-30 18:01:51'),
(25, 21, 14, 7, '2025-04-30 18:01:51'),
(26, 13, 15, 8, '2025-04-30 18:01:51'),
(27, 27, 15, 8, '2025-04-30 18:01:51'),
(28, 38, 15, 9, '2025-04-30 18:01:51'),
(29, 47, 15, 7, '2025-04-30 18:01:51'),
(30, 6, 15, 8, '2025-04-30 18:01:51'),
(31, 20, 16, 7, '2025-04-30 18:01:51'),
(32, 33, 16, 9, '2025-04-30 18:01:51'),
(33, 49, 16, 7, '2025-04-30 18:01:51'),
(34, 10, 16, 10, '2025-04-30 18:01:51'),
(35, 23, 16, 6, '2025-04-30 18:01:51'),
(36, 8, 17, 9, '2025-04-30 18:01:51'),
(37, 24, 17, 7, '2025-04-30 18:01:51'),
(38, 37, 17, 9, '2025-04-30 18:01:51'),
(39, 44, 17, 6, '2025-04-30 18:01:51'),
(40, 17, 17, 9, '2025-04-30 18:01:51'),
(41, 14, 18, 8, '2025-04-30 18:01:51'),
(42, 30, 18, 9, '2025-04-30 18:01:51'),
(43, 40, 18, 8, '2025-04-30 18:01:51'),
(44, 3, 18, 9, '2025-04-30 18:01:51'),
(45, 26, 18, 7, '2025-04-30 18:01:51'),
(46, 12, 19, 8, '2025-04-30 18:01:51'),
(47, 32, 19, 7, '2025-04-30 18:01:51'),
(48, 46, 19, 9, '2025-04-30 18:01:51'),
(49, 5, 19, 6, '2025-04-30 18:01:51'),
(50, 29, 19, 8, '2025-04-30 18:01:51'),
(51, 1, 20, 7, '2025-04-30 18:01:51'),
(52, 2, 20, 9, '2025-04-30 18:01:51'),
(53, 3, 20, 8, '2025-04-30 18:01:51'),
(54, 4, 20, 9, '2025-04-30 18:01:51'),
(55, 5, 20, 7, '2025-04-30 18:01:51'),
(61, 11, 11, 7, '2025-04-30 18:01:51'),
(62, 12, 11, 8, '2025-04-30 18:01:51'),
(63, 13, 11, 10, '2025-04-30 18:01:51'),
(64, 14, 11, 7, '2025-04-30 18:01:51'),
(65, 15, 11, 8, '2025-04-30 18:01:51'),
(66, 16, 12, 7, '2025-04-30 18:01:51'),
(67, 17, 12, 9, '2025-04-30 18:01:51'),
(69, 19, 12, 7, '2025-04-30 18:01:51'),
(70, 20, 12, 8, '2025-04-30 18:01:51'),
(71, 21, 13, 8, '2025-04-30 18:01:51'),
(73, 23, 13, 9, '2025-04-30 18:01:51'),
(74, 24, 13, 7, '2025-04-30 18:01:51'),
(75, 25, 13, 9, '2025-04-30 18:01:51'),
(76, 26, 14, 7, '2025-04-30 18:01:51'),
(77, 27, 14, 8, '2025-04-30 18:01:51'),
(78, 28, 14, 9, '2025-04-30 18:01:51'),
(80, 30, 14, 9, '2025-04-30 18:01:51'),
(81, 31, 15, 8, '2025-04-30 18:01:51'),
(82, 32, 15, 8, '2025-04-30 18:01:51'),
(83, 33, 15, 9, '2025-04-30 18:01:51'),
(84, 34, 15, 7, '2025-04-30 18:01:51'),
(85, 35, 15, 9, '2025-04-30 18:01:51'),
(86, 36, 16, 7, '2025-04-30 18:01:51'),
(87, 37, 16, 9, '2025-04-30 18:01:51'),
(88, 38, 16, 9, '2025-04-30 18:01:51'),
(89, 39, 16, 6, '2025-04-30 18:01:51'),
(90, 40, 16, 8, '2025-04-30 18:01:51'),
(91, 41, 17, 8, '2025-04-30 18:01:51'),
(92, 42, 17, 8, '2025-04-30 18:01:51'),
(93, 43, 17, 9, '2025-04-30 18:01:51'),
(95, 45, 17, 8, '2025-04-30 18:01:51'),
(96, 46, 18, 7, '2025-04-30 18:01:51'),
(97, 47, 18, 9, '2025-04-30 18:01:51'),
(98, 48, 18, 10, '2025-04-30 18:01:51'),
(99, 49, 18, 6, '2025-04-30 18:01:51'),
(100, 50, 18, 9, '2025-04-30 18:01:51'),
(101, 1, 19, 8, '2025-04-30 18:01:51'),
(102, 2, 19, 9, '2025-04-30 18:01:51'),
(103, 3, 19, 9, '2025-04-30 18:01:51'),
(104, 4, 19, 6, '2025-04-30 18:01:51'),
(106, 6, 20, 8, '2025-04-30 18:01:51'),
(107, 7, 20, 8, '2025-04-30 18:01:51'),
(108, 8, 20, 10, '2025-04-30 18:01:51'),
(109, 9, 20, 7, '2025-04-30 18:01:51'),
(110, 10, 20, 8, '2025-04-30 18:01:51'),
(112, 16, 11, 5, '2025-04-30 18:01:51'),
(113, 15, 12, 2, '2025-04-30 18:01:51'),
(114, 40, 13, 6, '2025-04-30 18:01:51'),
(115, 10, 14, 5, '2025-04-30 18:01:51'),
(116, 23, 15, 2, '2025-04-30 18:01:51'),
(117, 1, 16, 8, '2025-04-30 18:01:51'),
(118, 5, 17, 10, '2025-04-30 18:01:51'),
(119, 28, 18, 9, '2025-04-30 18:01:51'),
(120, 33, 19, 7, '2025-04-30 18:01:51'),
(121, 21, 20, 1, '2025-04-30 18:01:51'),
(124, 36, 12, 3, '2025-04-30 18:01:51'),
(125, 43, 13, 7, '2025-04-30 18:01:51'),
(126, 48, 14, 7, '2025-04-30 18:01:51'),
(127, 17, 15, 8, '2025-04-30 18:01:51'),
(128, 35, 16, 3, '2025-04-30 18:01:51'),
(129, 14, 17, 6, '2025-04-30 18:01:51'),
(130, 37, 18, 2, '2025-04-30 18:01:51'),
(131, 24, 19, 9, '2025-04-30 18:01:51'),
(132, 12, 20, 5, '2025-04-30 18:01:51'),
(135, 28, 12, 4, '2025-04-30 18:01:51'),
(136, 49, 13, 9, '2025-04-30 18:01:51'),
(138, 4, 15, 6, '2025-04-30 18:01:51'),
(140, 15, 17, 8, '2025-04-30 18:01:51'),
(141, 39, 18, 7, '2025-04-30 18:01:51'),
(142, 13, 19, 2, '2025-04-30 18:01:51'),
(143, 29, 20, 7, '2025-04-30 18:01:51'),
(597, 5, 11, 9, '2025-05-04 06:38:42'),
(600, 13, 12, 4, '2025-05-04 06:38:42'),
(601, 2, 12, 2, '2025-05-04 06:38:42'),
(604, 8, 13, 4, '2025-05-04 06:38:42'),
(605, 17, 13, 6, '2025-05-04 06:38:42'),
(606, 39, 14, 3, '2025-05-04 06:38:42'),
(610, 40, 15, 5, '2025-05-04 06:38:42'),
(611, 50, 15, 6, '2025-05-04 06:38:42'),
(612, 44, 16, 6, '2025-05-04 06:38:42'),
(614, 26, 16, 2, '2025-05-04 06:38:42'),
(615, 6, 17, 3, '2025-05-04 06:38:42'),
(616, 36, 17, 9, '2025-05-04 06:38:42'),
(617, 16, 17, 9, '2025-05-04 06:38:42'),
(618, 36, 18, 8, '2025-05-04 06:38:42'),
(619, 35, 18, 2, '2025-05-04 06:38:42'),
(621, 11, 19, 9, '2025-05-04 06:38:42'),
(622, 36, 19, 10, '2025-05-04 06:38:42'),
(624, 48, 20, 6, '2025-05-04 06:38:42'),
(626, 36, 20, 5, '2025-05-04 06:38:42'),
(628, 24, 11, 7, '2025-05-04 06:38:42'),
(629, 47, 12, 7, '2025-05-04 06:38:42'),
(630, 30, 13, 9, '2025-05-04 06:38:42'),
(631, 42, 14, 5, '2025-05-04 06:38:42'),
(632, 25, 15, 3, '2025-05-04 06:38:42'),
(633, 42, 16, 4, '2025-05-04 06:38:42'),
(635, 45, 18, 5, '2025-05-04 06:38:42'),
(636, 23, 19, 10, '2025-05-04 06:38:42'),
(637, 22, 20, 4, '2025-05-04 06:38:42'),
(639, 25, 11, 4, '2025-05-04 06:38:42'),
(640, 12, 12, 2, '2025-05-04 06:38:42'),
(641, 4, 13, 9, '2025-05-04 06:38:42'),
(642, 5, 14, 9, '2025-05-04 06:38:42'),
(643, 8, 15, 2, '2025-05-04 06:38:42'),
(644, 3, 16, 9, '2025-05-04 06:38:42'),
(645, 21, 17, 4, '2025-05-04 06:38:42'),
(647, 27, 19, 2, '2025-05-04 06:38:42'),
(648, 40, 20, 7, '2025-05-04 06:38:42'),
(651, 21, 12, 9, '2025-05-04 06:38:42'),
(652, 19, 13, 2, '2025-05-04 06:38:42'),
(653, 24, 14, 10, '2025-05-04 06:38:42'),
(654, 26, 15, 7, '2025-05-04 06:38:42'),
(655, 32, 16, 3, '2025-05-04 06:38:42'),
(656, 19, 17, 2, '2025-05-04 06:38:42'),
(657, 10, 18, 8, '2025-05-04 06:38:42'),
(658, 20, 19, 6, '2025-05-04 06:38:42'),
(659, 33, 20, 6, '2025-05-04 06:38:42'),
(661, 17, 11, 3, '2025-05-04 06:38:42'),
(662, 6, 12, 9, '2025-05-04 06:38:42'),
(663, 3, 13, 7, '2025-05-04 06:38:42'),
(664, 50, 14, 1, '2025-05-04 06:38:42'),
(666, 45, 16, 2, '2025-05-04 06:38:42'),
(668, 9, 18, 7, '2025-05-04 06:38:42'),
(669, 49, 19, 8, '2025-05-04 06:38:42'),
(670, 43, 20, 1, '2025-05-04 06:38:42'),
(672, 39, 11, 8, '2025-05-04 06:38:42'),
(673, 37, 12, 3, '2025-05-04 06:38:42'),
(674, 41, 13, 5, '2025-05-04 06:38:42'),
(675, 47, 14, 3, '2025-05-04 06:38:42'),
(676, 18, 15, 2, '2025-05-04 06:38:42'),
(677, 22, 16, 9, '2025-05-04 06:38:42'),
(678, 50, 17, 4, '2025-05-04 06:38:42'),
(679, 43, 18, 2, '2025-05-04 06:38:42'),
(680, 8, 19, 4, '2025-05-04 06:38:42'),
(683, 1, 11, 4, '2025-05-04 06:38:42'),
(715, 65, 22, 9, '2025-05-04 18:58:55'),
(717, 26, 22, 10, '2025-05-04 18:59:02'),
(718, 31, 22, NULL, '2025-05-04 18:59:18'),
(719, 35, 22, NULL, '2025-05-04 18:59:22'),
(721, 1, 22, 8, '2025-05-04 19:01:19'),
(722, 1, 23, 9, '2025-05-04 19:24:40'),
(723, 4, 23, 10, '2025-05-04 19:24:47'),
(724, 10, 23, NULL, '2025-05-04 19:24:50'),
(725, 35, 23, NULL, '2025-05-04 19:24:56'),
(726, 17, 10, 10, '2025-05-04 21:53:45'),
(727, 61, 10, 9, '2025-05-04 21:53:46'),
(728, 47, 10, NULL, '2025-05-04 21:53:47'),
(729, 72, 10, NULL, '2025-05-04 21:53:47'),
(730, 15, 10, 4, '2025-05-04 21:53:47'),
(731, 70, 10, NULL, '2025-05-04 21:53:48'),
(732, 4, 10, NULL, '2025-05-04 21:53:52');

-- --------------------------------------------------------

--
-- Table structure for table `maze`
--

CREATE TABLE `maze` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `type` tinyint(1) NOT NULL,
  `subtype` int(11) DEFAULT NULL,
  `avg_rating` decimal(2,1) NOT NULL DEFAULT '5.0',
  `release_date` date DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `num_of_episodes` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `maze`
--

INSERT INTO `maze` (`id`, `name`, `type`, `subtype`, `avg_rating`, `release_date`, `description`, `created_at`, `num_of_episodes`) VALUES
(1, 'Attack on Titan', 1, 1, '7.3', '2013-04-07', 'In a world where humanity is threatened by giant humanoids called Titans...', '2025-05-04 19:25:41', 96),
(2, 'One Piece', 1, 1, '7.0', '1999-10-20', 'The adventures of Monkey D. Luffy and his pirate crew...', '2025-05-04 13:24:50', 12),
(3, 'Naruto', 1, 1, '8.4', '2002-10-03', 'The story of a young ninja, Naruto Uzumaki...', '2025-05-04 16:54:53', 28),
(4, 'Death Note', 1, 1, '8.2', '2006-10-03', 'A high school student discovers a supernatural notebook...', '2025-05-04 19:26:01', 94),
(5, 'Fullmetal Alchemist: Brotherhood', 1, 1, '8.3', '2009-04-05', 'Two brothers search for the legendary Philosopher\'s Stone...', '2025-05-04 07:40:38', 17),
(6, 'Demon Slayer: Kimetsu no Yaiba', 1, 1, '7.0', '2019-04-06', 'A young boy seeks to avenge his family and cure his sister...', '2025-05-04 07:51:23', 57),
(7, 'Jujutsu Kaisen', 1, 1, '8.5', '2020-10-03', 'A high school student becomes the host of a powerful Curse...', '2025-05-04 13:24:50', 46),
(8, 'Spy x Family', 1, 1, '5.8', '2022-04-09', 'A spy, an assassin, and a telepath form an unlikely family...', '2025-05-04 21:52:32', 47),
(9, 'My Hero Academia', 1, 1, '7.7', '2016-04-03', 'In a world where superpowers are common, a boy dreams of becoming a hero...', '2025-05-04 16:54:55', 87),
(10, 'Hunter x Hunter', 1, 1, '7.8', '2011-10-02', 'A young boy named Gon Freecss strives to become a legendary hunter...', '2025-05-04 21:52:35', 15),
(11, 'Weathering with You', 1, 2, '7.7', '2019-07-19', 'A high school boy who has run away to Tokyo befriends a girl...', '2025-05-04 06:39:13', 1),
(12, 'Spirited Away', 1, 2, '5.8', '2001-07-20', 'A young girl enters the world of spirits during her family\'s move...', '2025-05-04 13:24:50', 1),
(13, 'Your Name.', 1, 2, '6.0', '2016-08-26', 'Two high school students living in different rural and urban settings...', '2025-05-04 13:24:50', 1),
(14, 'Princess Mononoke', 1, 2, '7.0', '1997-07-12', 'An epic fantasy set in medieval Japan, dealing with the conflict...', '2025-05-04 13:24:50', 1),
(15, 'Akira', 1, 2, '5.5', '1988-07-16', 'A science fiction action film set in a dystopian Tokyo...', '2025-05-04 21:54:19', 1),
(16, 'Violet Evergarden: The Movie', 1, 2, '7.3', '2020-09-18', 'The conclusion to the story of Violet Evergarden...', '2025-05-04 06:39:13', 1),
(17, 'A Silent Voice', 1, 2, '7.5', '2016-09-17', 'A former bully seeks redemption by reconnecting with a deaf girl...', '2025-05-04 21:54:04', 1),
(18, 'Howl\'s Moving Castle', 1, 2, '4.0', '2004-11-20', 'A young hatter is cursed by a witch and encounters a wizard...', '2025-05-04 07:40:38', 1),
(19, 'The Girl Who Leapt Through Time', 1, 2, '4.8', '2006-07-15', 'A high school girl gains the ability to leap through time...', '2025-05-04 13:24:50', 1),
(20, 'Paprika', 1, 2, '7.0', '2006-09-02', 'A psychological thriller about a research psychologist who uses a device...', '2025-05-04 21:52:34', 1),
(21, 'Code Geass: Lelouch of the Rebellion R2', 1, 1, '5.8', '2008-04-06', 'The continuation of Lelouch\'s rebellion against the Holy Britannian Empire...', '2025-05-04 13:24:50', 70),
(22, 'Steins;Gate', 1, 1, '7.0', '2011-04-06', 'A group of friends discovers a way to send messages to the past...', '2025-05-04 13:24:50', 26),
(23, 'Cowboy Bebop', 1, 1, '6.8', '1998-04-03', 'The adventures of a group of bounty hunters in the solar system...', '2025-05-04 13:24:50', 88),
(24, 'Neon Genesis Evangelion', 1, 1, '8.0', '1995-10-04', 'In a post-apocalyptic world, a teenage boy is recruited to pilot a giant bio-machine...', '2025-05-04 06:39:13', 82),
(25, 'Clannad: After Story', 1, 1, '6.3', '2008-10-03', 'The sequel to Clannad, following the life of Tomoya Okazaki and Nagisa Furukawa...', '2025-05-04 13:24:50', 47),
(26, 'Erased', 1, 1, '6.6', '2016-01-08', 'A young man with the ability to travel back in time to prevent tragedies...', '2025-05-04 19:02:01', 67),
(27, 'Toradora!', 1, 1, '6.0', '2008-10-02', 'The unexpected partnership between two high school students with mutual crushes...', '2025-05-04 21:52:32', 92),
(28, 'Angel Beats!', 1, 1, '7.3', '2010-04-03', 'A group of teenagers in the afterlife fighting against their fate...', '2025-05-04 07:40:39', 68),
(29, 'Puella Magi Madoka Magica', 1, 1, '7.7', '2011-01-07', 'A group of middle school girls are granted magical powers...', '2025-05-04 13:24:50', 54),
(30, 'Re:Zero - Starting Life in Another World', 1, 1, '9.0', '2016-04-04', 'A NEET is suddenly transported to another world...', '2025-05-04 13:24:50', 56),
(31, 'Berserk', 0, NULL, '7.5', '1989-08-25', 'A dark fantasy manga following the life of the lone swordsman Guts...', '2025-05-04 13:24:50', 32),
(32, 'Vagabond', 0, NULL, '6.0', '1998-09-21', 'A fictionalized account of the life of the legendary swordsman Miyamoto Musashi...', '2025-05-04 13:24:50', 253),
(33, 'Vinland Saga', 0, NULL, '7.8', '2005-04-13', 'A historical manga set in Viking times, following the story of Thorfinn...', '2025-05-04 07:40:38', 294),
(34, 'Kingdom', 0, NULL, '8.0', '2006-01-26', 'A historical epic set in the Warring States period of China...', '2025-05-04 13:24:50', 119),
(35, 'One-Punch Man', 0, NULL, '4.7', '2012-06-14', 'The story of Saitama, a superhero who can defeat any enemy with a single punch...', '2025-05-04 13:24:50', 280),
(36, 'Tokyo Ghoul', 0, NULL, '7.0', '2011-09-08', 'In Tokyo, ghouls disguised as humans prey on the living...', '2025-05-04 13:24:50', 166),
(37, 'Bleach', 0, NULL, '5.8', '2001-08-07', 'The adventures of Ichigo Kurosaki, who gains the powers of a Soul Reaper...', '2025-05-04 13:24:50', 267),
(38, 'Fairy Tail', 0, NULL, '9.0', '2006-08-02', 'The adventures of Lucy Heartfilia and the Fairy Tail guild...', '2025-05-04 13:24:50', 247),
(39, 'Seven Deadly Sins', 0, NULL, '6.2', '2012-10-03', 'A group of legendary knights who were falsely accused of treason...', '2025-05-04 13:24:50', 134),
(40, 'Black Clover', 0, NULL, '6.8', '2015-02-16', 'In a world where magic is everything, a boy born without magic aims to become the Wizard King...', '2025-05-04 06:39:13', 206),
(41, 'Code Geass: Akito the Exiled', 1, 3, '6.7', '2012-06-23', 'An OVA series set between the two seasons of Code Geass...', '2025-05-04 13:24:50', 3),
(42, 'Mobile Suit Gundam Unicorn', 1, 3, '5.7', '2010-03-12', 'An OVA series set in the Universal Century timeline of Gundam...', '2025-05-04 21:52:34', 7),
(43, 'Hellsing Ultimate', 1, 3, '4.8', '2006-02-10', 'An OVA series adapting the Hellsing manga more faithfully...', '2025-05-04 13:24:50', 13),
(44, 'Kaguya-sama: Love Is War? Ultra Romantic', 1, 4, '6.0', '2022-04-09', 'The third season of the Kaguya-sama: Love Is War ONA series...', '2025-05-04 16:54:53', 27),
(45, 'Aggretsuko', 1, 4, '5.3', '2018-04-20', 'An ONA series about a red panda who deals with her frustrations through death metal karaoke...', '2025-05-04 07:40:38', 37),
(46, 'Pokémon Origins', 1, 4, '8.0', '2013-10-02', 'A four-part ONA series that follows the storyline of the original Pokémon Red and Blue games...', '2025-05-04 13:24:50', 2),
(47, 'Attack on Titan: Chronicle', 1, 5, '6.5', '2020-07-17', 'A compilation movie summarizing the first three seasons of Attack on Titan...', '2025-05-04 07:43:24', 1),
(48, 'Jujutsu Kaisen 0', 1, 2, '8.3', '2021-12-24', 'A prequel movie to the Jujutsu Kaisen anime series...', '2025-05-04 13:24:50', 1),
(49, 'My Hero Academia: World Heroes\' Mission', 1, 2, '7.5', '2021-08-06', 'The third movie in the My Hero Academia film series...', '2025-05-04 13:24:50', 1),
(50, 'One Piece Film: Red', 1, 2, '5.8', '2022-08-06', 'The fifteenth feature film in the One Piece movie series...', '2025-05-04 13:24:50', 1),
(51, 'Erased: Re-Run', 1, 3, '5.0', '2017-03-29', 'A special OVA episode of Erased.', '2025-05-04 13:24:50', 1),
(52, 'KonoSuba: God\'s Blessing on This Wonderful World! Movie: Legend of Crimson', 1, 2, '5.0', '2019-08-30', 'The KonoSuba gang ventures to Kazuma\'s hometown.', '2025-05-04 13:24:50', 1),
(53, 'Re:Zero - Starting Life in Another World - Memory Snow', 1, 3, '5.0', '2018-10-06', 'An OVA episode taking place between episodes of Re:Zero.', '2025-05-04 13:24:50', 1),
(54, 'That Time I Got Reincarnated as a Slime Movie: Scarlet Bond', 1, 2, '5.0', '2022-11-25', 'A new adventure for Rimuru and his companions.', '2025-05-04 13:24:50', 1),
(55, 'Mushoku Tensei: Jobless Reincarnation II - Isekai Ittara Honki Dasu Part 2', 1, 1, '5.0', '2024-04-07', 'The continuation of Rudeus\'s journey in the new world.', '2025-05-04 13:24:50', 21),
(56, 'Mushoku Tensei: Jobless Reincarnation', 1, 1, '5.0', '2021-01-11', 'A NEET is reincarnated into a world of magic.', '2025-05-04 13:24:50', 10),
(57, 'Vinland Saga Season 2', 1, 1, '5.0', '2023-01-10', 'Thorfinn seeks meaning in his life after the death of Askeladd.', '2025-05-04 13:24:50', 15),
(58, 'To Your Eternity Season 2', 1, 1, '5.0', '2022-10-23', 'Fushi continues his immortal journey, encountering new people and challenges.', '2025-05-04 13:24:50', 19),
(59, 'Ranking of Kings: Treasure Chest of Courage', 1, 1, '5.0', '2023-04-14', 'Short stories and side episodes from the world of Ranking of Kings.', '2025-05-04 13:24:50', 23),
(60, 'Cyberpunk: Edgerunners', 1, 4, '5.0', '2022-09-13', 'An ONA series set in the world of Cyberpunk 2077.', '2025-05-04 13:24:50', 9),
(61, 'Arcane: League of Legends', 1, 4, '9.0', '2021-11-06', 'An ONA series exploring the origins of League of Legends characters.', '2025-05-04 21:54:11', 1),
(62, 'Devilman Crybaby', 1, 4, '5.0', '2018-01-05', 'An ONA adaptation of the classic Devilman manga.', '2025-05-04 13:24:50', 2),
(63, 'Great Teacher Onizuka', 1, 1, '5.0', '1999-06-30', 'A former biker gang leader becomes a teacher.', '2025-05-04 13:24:50', 6),
(64, 'Trigun Stampede', 1, 1, '5.0', '2023-01-07', 'A new take on the classic Trigun story.', '2025-05-04 13:24:50', 22),
(65, 'Bocchi the Rock!', 1, 1, '9.0', '2022-10-09', 'A socially anxious guitarist joins a band.', '2025-05-04 19:01:52', 17),
(66, 'Lycoris Recoil', 1, 1, '5.0', '2022-07-02', 'Two elite agents work undercover at a cafe.', '2025-05-04 13:24:50', 17),
(67, 'Call of the Night', 1, 1, '5.0', '2022-07-08', 'A boy meets a vampire and becomes fascinated by the night.', '2025-05-04 13:24:50', 11),
(68, 'Komi Can\'t Communicate', 1, 1, '5.0', '2021-10-07', 'A socially awkward girl tries to make 100 friends.', '2025-05-04 13:24:50', 1),
(69, 'Sono Bisque Doll wa Koi wo Suru', 1, 1, '5.0', '2022-01-09', 'A shy boy who loves traditional dolls befriends a popular girl.', '2025-05-04 13:24:50', 24),
(70, 'Chainsaw Man', 1, 1, '5.0', '2022-10-12', 'A young man makes a contract with a devil.', '2025-05-04 21:52:35', 17),
(71, 'JoJo\'s Bizarre Adventure', 1, 1, '5.0', '2012-10-06', 'The multi-generational saga of the Joestar family.', '2025-05-04 13:24:50', 13),
(72, 'Attack on Titan The Final Season Part 3', 1, 1, '5.0', '2023-03-04', 'The epic conclusion to the Attack on Titan saga.', '2025-05-04 14:57:33', 13),
(73, 'Code Geass: Lelouch of the Re;surrection', 1, 2, '5.0', '2019-02-09', 'A sequel movie to the Code Geass anime series.', '2025-05-04 13:24:50', 1),
(74, 'Fate/stay night: Heaven\'s Feel III. Spring Song', 1, 2, '5.0', '2020-08-15', 'The final movie in the Heaven\'s Feel trilogy.', '2025-05-04 13:24:50', 1),
(75, 'Gurren Lagann', 1, 1, '5.0', '2007-04-01', 'Two boys living underground break through to the surface.', '2025-05-04 13:24:50', 23),
(76, 'Kill la Kill', 1, 1, '5.0', '2013-10-04', 'A girl seeks revenge for her father\'s murder.', '2025-05-04 13:24:50', 3),
(77, 'Space Dandy', 1, 1, '5.0', '2014-01-05', 'The cosmic adventures of a dandy in space.', '2025-05-04 13:24:50', 20),
(78, 'Mushishi', 1, 1, '5.0', '2005-10-23', 'A man travels the land helping people afflicted by supernatural creatures called Mushi.', '2025-05-04 13:24:50', 14),
(79, 'Natsume\'s Book of Friends', 1, 1, '5.0', '2008-07-07', 'A boy inherits a book of yokai names and begins returning them.', '2025-05-04 13:24:50', 10),
(80, 'Haikyu!!', 1, 1, '5.0', '2014-04-06', 'A short volleyball player aims to become the ace of his high school team.', '2025-05-04 13:24:50', 7),
(81, 'Slam Dunk', 0, NULL, '5.0', '1990-10-01', 'A high school delinquent joins the basketball team to impress a girl.', '2025-05-04 13:24:50', 5),
(82, 'Yotsuba&!', 0, NULL, '5.0', '2003-03-21', 'The everyday adventures of a quirky five-year-old girl.', '2025-05-04 13:24:50', 1),
(83, 'Blade of the Immortal', 0, NULL, '5.0', '1993-06-25', 'A samurai cursed with immortality seeks to kill 1,000 evil men.', '2025-05-04 13:24:50', 19),
(84, 'Planetes', 0, NULL, '5.0', '1999-01-01', 'The lives of debris collectors in Earth orbit.', '2025-05-04 13:24:50', 2),
(85, 'Yokohama Kaidashi Kikou', 0, NULL, '5.0', '1994-04-28', 'A post-apocalyptic story about a robot running a cafe.', '2025-05-04 13:24:50', 12),
(86, 'Nausicaä of the Valley of the Wind', 0, NULL, '5.0', '1982-02-01', 'A princess tries to understand and coexist with giant insects in a toxic world.', '2025-05-04 13:24:50', 23),
(87, 'Ghost in the Shell', 0, NULL, '5.0', '1989-05-05', 'In a cyberpunk future, a cyborg policewoman hunts a mysterious hacker.', '2025-05-04 13:24:50', 20),
(88, 'Akira (Manga)', 0, NULL, '5.0', '1982-12-06', 'A sprawling cyberpunk epic set in Neo-Tokyo.', '2025-05-04 13:24:50', 28),
(89, 'Dragon Ball', 0, NULL, '5.0', '1984-12-03', 'The early adventures of Goku as a child.', '2025-05-04 13:24:50', 20),
(90, 'Dragon Ball Z', 0, NULL, '5.0', '1988-11-02', 'Goku and his friends defend Earth from powerful villains.', '2025-05-04 13:24:50', 15),
(91, 'Berserk (Manga)', 0, NULL, '5.0', '1988-10-01', 'The dark and brutal tale of Guts, the Black Swordsman.', '2025-05-04 13:24:50', 16),
(92, 'Oyasumi Punpun', 0, NULL, '5.0', '2007-03-15', 'A coming-of-age story with surreal and psychological elements.', '2025-05-04 13:24:50', 3),
(93, 'Goodnight Punpun', 0, NULL, '5.0', '2007-03-15', 'An alternate translation/spelling of Oyasumi Punpun.', '2025-05-04 13:24:50', 26),
(94, 'Vinland Saga (Manga)', 0, NULL, '5.0', '2005-04-13', 'A historical epic set in the Viking age.', '2025-05-04 13:24:50', 2),
(95, 'Kingdom (Manga)', 0, NULL, '5.0', '2006-01-26', 'A historical manga about the unification of China.', '2025-05-04 13:24:50', 21),
(96, 'One-Punch Man (Manga)', 0, NULL, '5.0', '2009-06-03', 'A superhero who can defeat any enemy with a single punch faces existential boredom.', '2025-05-04 13:24:50', 9),
(97, 'Tokyo Ghoul (Manga)', 0, NULL, '5.0', '2011-09-08', 'A college student becomes a half-ghoul.', '2025-05-04 13:24:50', 12),
(98, 'Bleach (Manga)', 0, NULL, '5.0', '2001-08-07', 'A high school student gains the powers of a Soul Reaper.', '2025-05-04 13:24:50', 2),
(99, 'Fairy Tail (Manga)', 0, NULL, '5.0', '2006-08-02', 'The adventures of a magical guild.', '2025-05-04 13:24:50', 1),
(100, 'Seven Deadly Sins (Manga)', 0, NULL, '5.0', '2012-10-03', 'A group of legendary knights fight to clear their names.', '2025-05-04 13:24:50', 2),
(101, 'Black Clover (Manga)', 0, NULL, '5.0', '2015-02-16', 'A magicless boy aims to become the Wizard King.', '2025-05-04 13:24:50', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `display_name` varchar(50) DEFAULT NULL,
  `bio` varchar(200) DEFAULT NULL,
  `profile_picture` varchar(50) DEFAULT NULL,
  `light_mode` tinyint(1) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_password_change` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_online` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `display_name`, `bio`, `profile_picture`, `light_mode`, `created_at`, `last_password_change`, `last_online`) VALUES
(10, 'testuser', 'test@example.com', '$2y$10$yRmoc4/wO2FfrghqT8wF3OVk40h.VrspUygwh.lF10bfTmCzJIIkC', 'Test User', 'I like anime lolol hehe', NULL, 0, '2025-04-13 23:08:13', '2025-05-04 16:15:29', '2025-05-04 21:41:45'),
(11, 'ashmaze', 'ash@example.com', '$2y$10$J0z09AFMXgxOEFcK9Xp9wO8q7ndLD7.RFqmhS/YFdi8mJAcwWYoii', NULL, NULL, NULL, 0, '2025-04-13 23:11:07', '2025-05-04 16:09:50', '2025-05-04 16:09:50'),
(12, 'lilithfox', 'lilith@example.com', '$2y$10$Zj1QdR3etMy2QhINHX.ZRO1NWAZFKvDGktPqmsUFTzCwz7KYPH97C', NULL, NULL, NULL, 0, '2025-04-13 23:11:07', '2025-05-04 16:09:50', '2025-05-04 16:09:50'),
(13, 'kaiwave', 'kai@example.com', '$2y$10$EpOWw6AZvjXJeXf0Z.Rut.NptJDWmVtsbmIX5W2C7kO0X.Wj.y9Gq', NULL, NULL, NULL, 0, '2025-04-13 23:11:07', '2025-05-04 16:09:50', '2025-05-04 16:09:50'),
(14, 'nova88', 'nova@example.com', '$2y$10$sYgXxHdpz9kGM5Dch1k02.xZjU2GF6HvFSDYReEgeWHFbGszC7WZK', NULL, NULL, NULL, 0, '2025-04-13 23:11:07', '2025-05-04 16:09:50', '2025-05-04 16:09:50'),
(15, 'emiko_ryu', 'emiko@example.com', '$2y$10$z8Hn2WXbMyF0UF60chceSO3DZUOhqeyJno9jCgLsM3NZBZHUbH1Ne', NULL, NULL, NULL, 0, '2025-04-13 23:11:07', '2025-05-04 16:09:50', '2025-05-04 16:09:50'),
(16, 'zeke_x', 'zeke@example.com', '$2y$10$V6.vVg9ln4AwxYNzMyJ1VeKnNaFa7GMdjEf1p7U7rmyFh5WLLK4PS', NULL, NULL, NULL, 0, '2025-04-13 23:11:07', '2025-05-04 16:09:50', '2025-05-04 16:09:50'),
(17, 'ari_moon', 'ari@example.com', '$2y$10$4gZscO7Q53kwuEVdy2wB5.N2yoZKyY4DyBcU4mGn5ESviyAtQ0M5C', NULL, NULL, NULL, 0, '2025-04-13 23:11:07', '2025-05-04 16:09:50', '2025-05-04 16:09:50'),
(18, 'valentina', 'val@example.com', '$2y$10$z/N9tPtiWoxmCdN4cCuvn.wJOUdQ2H/nOP3ZCRlsRzmt1kYZ0M0cq', NULL, NULL, NULL, 0, '2025-04-13 23:11:07', '2025-05-04 16:09:50', '2025-05-04 16:09:50'),
(19, 'tomix', 'tomix@example.com', '$2y$10$GZh1NZHdSTBLwR33/8xJFeNZUUkGpB.DP92ljOnZ.KQupYJrQHX2q', NULL, NULL, NULL, 0, '2025-04-13 23:11:07', '2025-05-04 16:09:50', '2025-05-04 16:09:50'),
(20, 'six', 'six@example.com', '$2y$10$UDjVxhiAIheK4VIfCQ4GxuKjlVWOsHx3qD/7bdtkq35dR5ZU5djmO', NULL, NULL, NULL, 0, '2025-04-14 17:37:24', '2025-05-04 16:09:50', '2025-05-04 16:09:50'),
(21, 'Ginger Ale', 'gingerale@example.com', '$2y$10$C4ti30Usn.HIf8a0ggBrzeF6tn8WrA5RUCvFDu.CVHGlny/CN10oC', NULL, NULL, NULL, 0, '2025-05-04 08:06:24', '2025-05-04 16:09:50', '2025-05-04 16:09:50'),
(22, 'walkthrough_acc', 'walkthrough_acc@example.com', '$2y$10$XR9KC2XTfgYrT4ic6peBK.cJ3NPKUS0mnGbMQ6y7FaJen.AXjwVfi', 'Walkthrough Account', 'Will you set the bio now?', 'BANA.PNG', 0, '2025-05-04 18:57:34', '2025-05-04 19:06:40', '2025-05-04 19:16:56'),
(23, 'walkthroughacc', 'walkthroughacc@example.com', '$2y$10$z/RqYow4LOzKfjExUgjCnOhPYrlW0IjvRcpLzdJR.RWS0FJMPqNs6', 'Walkthrough Acc', 'I really like anime!', NULL, 0, '2025-05-04 19:23:45', '2025-05-04 19:27:33', '2025-05-04 19:23:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `map`
--
ALTER TABLE `map`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_content_user` (`content_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `maze`
--
ALTER TABLE `maze`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `map`
--
ALTER TABLE `map`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=733;

--
-- AUTO_INCREMENT for table `maze`
--
ALTER TABLE `maze`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `map`
--
ALTER TABLE `map`
  ADD CONSTRAINT `map_ibfk_1` FOREIGN KEY (`content_id`) REFERENCES `maze` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `map_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
