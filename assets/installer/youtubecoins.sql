-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Nov 01, 2022 at 01:17 PM
-- Server version: 5.7.40
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `youtubecoins`
--

-- --------------------------------------------------------

--
-- Table structure for table `analytics_views`
--

DROP TABLE IF EXISTS `analytics_views`;
CREATE TABLE `analytics_views` (
  `id` int(11) NOT NULL,
  `ip` varchar(100) NOT NULL,
  `url` varchar(255) NOT NULL,
  `created_date` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `analytics_views`
--

INSERT INTO `analytics_views` (`id`, `ip`, `url`, `created_date`) VALUES
(18, '1', '185', '1431273297'),
(17, '1', '0', '1431272973'),
(19, '31', '203', '1571546036'),
(20, '31', '208', '1571546252'),
(21, '1', '208', '1666788827'),
(22, '1', '201', '1666788841'),
(23, '1', '210', '1666789115'),
(24, '1', '213', '1666792635'),
(25, '33', '210', '1667128296'),
(26, '33', '197', '1667128316'),
(27, '33', '195', '1667141875');

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE `articles` (
  `ar_id` int(11) NOT NULL,
  `ar_author` varchar(200) DEFAULT NULL,
  `ar_title` varchar(255) NOT NULL,
  `ar_slug` varchar(255) NOT NULL,
  `ar_user_id` int(11) NOT NULL,
  `ar_first` tinyint(1) DEFAULT NULL COMMENT '1,0',
  `ar_main_thumb` varchar(255) NOT NULL,
  `ar_main_photo` varchar(255) NOT NULL,
  `ar_introduction` text NOT NULL,
  `ar_video` text NOT NULL,
  `ar_tags` varchar(200) NOT NULL,
  `ar_last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ar_created_date` bigint(20) NOT NULL,
  `ar_state` tinyint(4) NOT NULL,
  `ar_ord` int(11) NOT NULL,
  `bridge_category_id` int(11) NOT NULL,
  `ar_active` tinyint(4) NOT NULL,
  `ar_pages_counter` int(11) DEFAULT NULL,
  `ar_file_path` varchar(255) DEFAULT NULL,
  `ar_likes` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`ar_id`, `ar_author`, `ar_title`, `ar_slug`, `ar_user_id`, `ar_first`, `ar_main_thumb`, `ar_main_photo`, `ar_introduction`, `ar_video`, `ar_tags`, `ar_last_update`, `ar_created_date`, `ar_state`, `ar_ord`, `bridge_category_id`, `ar_active`, `ar_pages_counter`, `ar_file_path`, `ar_likes`) VALUES
(192, '', 'Sony 4K Demo: Another World', 'Sony-4K-Demo:-Another-World', 1, 0, 'https://i.ytimg.com/vi/xcJtL7QggTI/hqdefault.jpg', 'https://i.ytimg.com/vi/xcJtL7QggTI/hqdefault.jpg', 'Sony 4K Demo: Another World', '<iframe width=\"480\" height=\"270\" src=\"https://www.youtube.com/embed/xcJtL7QggTI?feature=oembed&autoplay=1\" frameborder=\"0\" gesture=\"media\" allowfullscreen></iframe>', 'youtube', '2022-10-30 17:46:03', 1510575663, 1, 26, 40, 1, 0, '', 0),
(193, '', 'Football in Ultra HD (2160p 4k)', 'Football-in-Ultra-HD--2160p-4k-', 1, 0, 'https://i.ytimg.com/vi/G4t6TqG5LM8/hqdefault.jpg', 'https://i.ytimg.com/vi/G4t6TqG5LM8/hqdefault.jpg', 'Football in Ultra HD (2160p 4k)', '<iframe width=\"480\" height=\"270\" src=\"https://www.youtube.com/embed/G4t6TqG5LM8?feature=oembed&autoplay=1\" frameborder=\"0\" gesture=\"media\" allowfullscreen></iframe>', 'youtube', '2022-10-30 17:46:03', 1510575685, 1, 25, 40, 1, 0, '', 0),
(194, '', '[4K Resolution] People Are Awesome - God Level in 4K 60 fps', '[4K-Resolution]-People-Are-Awesome---God-Level-in-4K-60-fps', 1, 0, 'https://i.ytimg.com/vi/DK1EGe68PvA/hqdefault.jpg', 'https://i.ytimg.com/vi/DK1EGe68PvA/hqdefault.jpg', '[4K Resolution] People Are Awesome - God Level in 4K 60 fps', '<iframe width=\"480\" height=\"270\" src=\"https://www.youtube.com/embed/DK1EGe68PvA?feature=oembed&autoplay=1\" frameborder=\"0\" gesture=\"media\" allowfullscreen></iframe>', 'youtube', '2022-10-30 17:46:03', 1510575703, 1, 24, 40, 1, 0, '', 0),
(195, '', '4K African Wildlife | African Nature Showreel 2017 by Robert Hofmeyr', '4K-African-Wildlife-|-African-Nature-Showreel-2017-by-Robert-Hofmeyr', 1, 0, 'https://i.ytimg.com/vi/TxbE79-1OSI/hqdefault.jpg', 'https://i.ytimg.com/vi/TxbE79-1OSI/hqdefault.jpg', '4K African Wildlife | African Nature Showreel 2017 by Robert Hofmeyr', '<iframe width=\"480\" height=\"270\" src=\"https://www.youtube.com/embed/TxbE79-1OSI?feature=oembed&autoplay=1\" frameborder=\"0\" gesture=\"media\" allowfullscreen></iframe>', 'youtube', '2022-10-30 17:46:03', 1510575720, 1, 23, 40, 1, 0, '', 0),
(196, '', '4K Ultra HD Video of Wild Animals - 1 HR 4K Wildlife Scenery with Floating Music', '4K-Ultra-HD-Video-of-Wild-Animals---1-HR-4K-Wildlife-Scenery-with-Floating-Music', 1, 0, 'https://i.ytimg.com/vi/TKmGU77INaM/hqdefault.jpg', 'https://i.ytimg.com/vi/TKmGU77INaM/hqdefault.jpg', '4K Ultra HD Video of Wild Animals - 1 HR 4K Wildlife Scenery with Floating Music', '<iframe width=\"480\" height=\"270\" src=\"https://www.youtube.com/embed/TKmGU77INaM?feature=oembed&autoplay=1\" frameborder=\"0\" gesture=\"media\" allowfullscreen></iframe>', 'youtube', '2022-10-30 17:46:03', 1510575747, 1, 22, 40, 1, 0, '', 0),
(197, '', 'The World in HDR in 4K (ULTRA HD)', 'The-World-in-HDR-in-4K--ULTRA-HD-', 1, 0, 'https://i.ytimg.com/vi/tO01J-M3g0U/hqdefault.jpg', 'https://i.ytimg.com/vi/tO01J-M3g0U/hqdefault.jpg', 'The World in HDR in 4K (ULTRA HD)', '<iframe width=\"480\" height=\"270\" src=\"https://www.youtube.com/embed/tO01J-M3g0U?feature=oembed&autoplay=1\" frameborder=\"0\" gesture=\"media\" allowfullscreen></iframe>', 'youtube', '2022-10-30 17:46:03', 1510575763, 1, 18, 40, 1, 0, '', 0),
(203, '', 'SONY 4K hdr demo video for 4k tv-2160p', 'SONY-4K-hdr-demo-video-for-4k-tv-2160p', 1, 0, 'https://i.ytimg.com/vi/Bey4XXJAqS8/hqdefault.jpg', 'https://i.ytimg.com/vi/Bey4XXJAqS8/hqdefault.jpg', 'SONY 4K hdr demo video for 4k tv-2160p', '<iframe width=\"480\" height=\"270\" src=\"https://www.youtube.com/embed/Bey4XXJAqS8?feature=oembed&autoplay=1\" frameborder=\"0\" gesture=\"media\" allowfullscreen></iframe>', 'youtube', '2022-10-30 17:46:03', 1510576138, 1, 9, 40, 1, 0, '', 0),
(204, '', '4k hdr demo 60fps wildlife video for 4k oled tv', '4k-hdr-demo-60fps-wildlife-video-for-4k-oled-tv', 1, 0, 'https://i.ytimg.com/vi/W7uyDjwAsU8/hqdefault.jpg', 'https://i.ytimg.com/vi/W7uyDjwAsU8/hqdefault.jpg', '4k hdr demo 60fps wildlife video for 4k oled tv', '<iframe width=\"480\" height=\"270\" src=\"https://www.youtube.com/embed/W7uyDjwAsU8?feature=oembed&autoplay=1\" frameborder=\"0\" gesture=\"media\" allowfullscreen></iframe>', 'youtube', '2022-10-30 17:46:03', 1510576166, 1, 15, 40, 1, 0, '', 0),
(201, '', 'PACIFIC RIM 2: UPRISING Official Trailer [4K ULTRA HD - 2018] Sci-Fi Action Movie', 'PACIFIC-RIM-2:-UPRISING-Official-Trailer-[4K-ULTRA-HD---2018]-Sci-Fi-Action-Movie', 1, 0, 'https://i.ytimg.com/vi/dH60pKPdScg/hqdefault.jpg', 'https://i.ytimg.com/vi/dH60pKPdScg/hqdefault.jpg', 'PACIFIC RIM 2: UPRISING Official Trailer [4K ULTRA HD - 2018] Sci-Fi Action Movie', '<iframe width=\"480\" height=\"270\" src=\"https://www.youtube.com/embed/dH60pKPdScg?feature=oembed&autoplay=1\" frameborder=\"0\" gesture=\"media\" allowfullscreen></iframe>', 'youtube', '2022-10-30 17:46:03', 1510576058, 1, 17, 40, 1, 0, '', 0),
(202, '', '4K Video of Colorful Liquid in Space', '4K-Video-of-Colorful-Liquid-in-Space', 1, 0, 'https://i.ytimg.com/vi/bKk_7NIKY3Y/hqdefault.jpg', 'https://i.ytimg.com/vi/bKk_7NIKY3Y/hqdefault.jpg', '4K Video of Colorful Liquid in Space', '<iframe width=\"480\" height=\"270\" src=\"https://www.youtube.com/embed/bKk_7NIKY3Y?feature=oembed&autoplay=1\" frameborder=\"0\" gesture=\"media\" allowfullscreen></iframe>', 'youtube', '2022-10-30 17:46:03', 1510576096, 1, 16, 40, 1, 0, '', 0),
(199, '', 'Real 4K HDR 60fps: LG Jazz HDR UHD (Chromecast Ultra)', 'Real-4K-HDR-60fps:-LG-Jazz-HDR-UHD--Chromecast-Ultra-', 1, 0, 'https://i.ytimg.com/vi/mkggXE5e2yk/hqdefault.jpg', 'https://i.ytimg.com/vi/mkggXE5e2yk/hqdefault.jpg', 'Real 4K HDR 60fps: LG Jazz HDR UHD (Chromecast Ultra)', '<iframe width=\"480\" height=\"270\" src=\"https://www.youtube.com/embed/mkggXE5e2yk?feature=oembed&autoplay=1\" frameborder=\"0\" gesture=\"media\" allowfullscreen></iframe>', 'youtube', '2022-10-30 17:46:03', 1510575915, 1, 20, 40, 1, 0, '', 0),
(205, '', '5k video ultrahd samsung hdr demo video for 5k qled tv', '5k-video-ultrahd-samsung-hdr-demo-video-for-5k-qled-tv', 1, 0, 'https://i.ytimg.com/vi/b4Yx9eHfsuc/hqdefault.jpg', 'https://i.ytimg.com/vi/b4Yx9eHfsuc/hqdefault.jpg', '5k video ultrahd samsung hdr demo video for 5k qled tv', '<iframe width=\"480\" height=\"270\" src=\"https://www.youtube.com/embed/b4Yx9eHfsuc?feature=oembed&autoplay=1\" frameborder=\"0\" gesture=\"media\" allowfullscreen></iframe>', 'youtube', '2022-10-30 17:46:03', 1510576194, 1, 14, 40, 1, 0, '', 0),
(206, '', 'Ultra HD 4K HDR DEMO Video Beautiful Sea 2018', 'Ultra-HD-4K-HDR-DEMO-Video-Beautiful-Sea-2018', 1, 0, 'https://i.ytimg.com/vi/0C7WhiWplEs/hqdefault.jpg', 'https://i.ytimg.com/vi/0C7WhiWplEs/hqdefault.jpg', 'Ultra HD 4K HDR DEMO Video Beautiful Sea 2018', '<iframe width=\"480\" height=\"270\" src=\"https://www.youtube.com/embed/0C7WhiWplEs?feature=oembed&autoplay=1\" frameborder=\"0\" gesture=\"media\" allowfullscreen></iframe>', 'youtube', '2022-10-30 17:46:03', 1510576223, 1, 13, 40, 1, 0, '', 0),
(207, '', 'Experience 4k dolby vision atmos demo in 4k for 4k oled tv', 'Experience-4k-dolby-vision-atmos-demo-in-4k-for-4k-oled-tv', 1, 0, 'https://i.ytimg.com/vi/kl2fqaHH4mM/hqdefault.jpg', 'https://i.ytimg.com/vi/kl2fqaHH4mM/hqdefault.jpg', 'Experience 4k dolby vision atmos demo in 4k for 4k oled tv', '<iframe width=\"480\" height=\"270\" src=\"https://www.youtube.com/embed/kl2fqaHH4mM?feature=oembed&autoplay=1\" frameborder=\"0\" gesture=\"media\" allowfullscreen></iframe>', 'youtube', '2022-10-30 17:46:03', 1510576265, 1, 12, 40, 1, 0, '', 0),
(208, '', 'NFS Payback - FASTEST CAR / FULLY UPGRADED KOENIGSEGG REGERA!!', 'NFS-Payback---FASTEST-CAR-/-FULLY-UPGRADED-KOENIGSEGG-REGERA!!', 1, 0, 'https://i.ytimg.com/vi/BDJkwVvQ4K4/hqdefault.jpg', 'https://i.ytimg.com/vi/BDJkwVvQ4K4/hqdefault.jpg', 'NFS Payback - FASTEST CAR / FULLY UPGRADED KOENIGSEGG REGERA!!', '<iframe width=\"480\" height=\"270\" src=\"https://www.youtube.com/embed/BDJkwVvQ4K4?feature=oembed&autoplay=1\" frameborder=\"0\" gesture=\"media\" allowfullscreen></iframe>', 'youtube', '2022-10-31 13:28:16', 1510576333, 1, 7, 40, 0, 0, '', 0),
(210, '', 'The Great Wall of China in 4k - DJI Phantom 4', 'The-Great-Wall-of-China-in-4k---DJI-Phantom-4', 1, 0, 'https://i.ytimg.com/vi/EotbKqZmBuY/hqdefault.jpg', 'https://i.ytimg.com/vi/EotbKqZmBuY/hqdefault.jpg', 'The Great Wall of China in 4k - DJI Phantom 4', '<iframe width=\"480\" height=\"270\" src=\"https://www.youtube.com/embed/EotbKqZmBuY?feature=oembed&autoplay=1\" frameborder=\"0\" gesture=\"media\" allowfullscreen></iframe>', 'youtube', '2022-10-30 17:46:03', 1510576424, 1, 5, 40, 1, 0, '', 0),
(211, '', 'TOKYO - JAPAN 4K', 'TOKYO---JAPAN-4K', 1, 0, 'https://i.ytimg.com/vi/aANLWsATis8/hqdefault.jpg', 'https://i.ytimg.com/vi/aANLWsATis8/hqdefault.jpg', 'TOKYO - JAPAN 4K', '<iframe width=\"480\" height=\"270\" src=\"https://www.youtube.com/embed/aANLWsATis8?feature=oembed&autoplay=1\" frameborder=\"0\" gesture=\"media\" allowfullscreen></iframe>', 'youtube', '2022-10-30 17:46:03', 1510576449, 1, 10, 40, 1, 0, '', 0),
(212, NULL, 'لازم تشوف هذه الشنطة المستحيلة !!', 'لازم-تشوف-هذه-الشنطة-المستحيلة-!!', 1, 0, 'https://i.ytimg.com/vi/3TakwdJH_5E/hqdefault.jpg', 'https://i.ytimg.com/vi/3TakwdJH_5E/hqdefault.jpg', 'لازم تشوف هذه الشنطة المستحيلة !!', '<iframe width=\"200\" height=\"113\" src=\"https://www.youtube.com/embed/3TakwdJH_5E?feature=oembed&autoplay=1\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen title=\"لازم تشوف هذه الشنطة المستحيلة !!\"></iframe>', 'youtube', '2022-10-30 17:46:03', 1666790123, 1, 8, 40, 1, NULL, NULL, NULL),
(213, NULL, 'تخيل الإيجابية طلعت مش حل؟ ', 'تخيل-الإيجابية-طلعت-مش-حل؟-', 1, 0, 'https://i.ytimg.com/vi/xxbDbFHRpOo/hqdefault.jpg', 'https://i.ytimg.com/vi/xxbDbFHRpOo/hqdefault.jpg', 'تخيل الإيجابية طلعت مش حل؟ ', '<iframe width=\"200\" height=\"113\" src=\"https://www.youtube.com/embed/xxbDbFHRpOo?feature=oembed&autoplay=1\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen title=\"تخيل الإيجابية طلعت مش حل؟ ', 'youtube', '2022-10-30 17:46:03', 1666792618, 1, 6, 44, 1, NULL, NULL, NULL),
(214, NULL, 'الفرق بين كرسي الجيمنج و كرسي المكتب', 'الفرق-بين-كرسي-الجيمنج-و-كرسي-المكتب', 33, 0, 'https://i.ytimg.com/vi/dlKPTNsqgkc/hq2.jpg', 'https://i.ytimg.com/vi/dlKPTNsqgkc/hq2.jpg', 'الفرق بين كرسي الجيمنج و كرسي المكتب', '<iframe width=\"200\" height=\"113\" src=\"https://www.youtube.com/embed/dlKPTNsqgkc?feature=oembed&autoplay=1\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen title=\"الفرق بين كرسي الجيمنج و كرسي المكتب\"></iframe>', 'youtube', '2022-10-31 12:15:39', 1667122032, 1, 4, 56, 0, NULL, NULL, NULL),
(215, NULL, 'CodeIgniter 4 User Login Tutorial - Part 2 - User Registration', 'CodeIgniter-4-User-Login-Tutorial---Part-2---User-Registration', 33, 0, 'https://i.ytimg.com/vi/SbiszsRnETo/hqdefault.jpg', 'https://i.ytimg.com/vi/SbiszsRnETo/hqdefault.jpg', 'CodeIgniter 4 User Login Tutorial - Part 2 - User Registration', '<iframe width=\"200\" height=\"113\" src=\"https://www.youtube.com/embed/SbiszsRnETo?feature=oembed&autoplay=1\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen title=\"CodeIgniter 4 User Login Tutorial - Part 2 - User Registration\"></iframe>', 'youtube', '2022-10-30 17:46:03', 1667151896, 1, 3, 56, 1, NULL, NULL, NULL),
(216, NULL, 'Nature 4K - Rainforest - Jungle Animals- Nature Relaxation Film - Meditation Relaxing Music', 'Nature-4K---Rainforest---Jungle-Animals--Nature-Relaxation-Film---Meditation-Relaxing-Music', 33, 0, 'https://i.ytimg.com/vi/oLCcgiQYFaU/hqdefault.jpg', 'https://i.ytimg.com/vi/oLCcgiQYFaU/hqdefault.jpg', 'Nature 4K - Rainforest - Jungle Animals- Nature Relaxation Film - Meditation Relaxing Music', '<iframe width=\"200\" height=\"113\" src=\"https://www.youtube.com/embed/oLCcgiQYFaU?feature=oembed&autoplay=1\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen title=\"Nature 4K - Rainforest - Jungle Animals- Nature Relaxation Film - Meditation Relaxing Music\"></iframe>', 'youtube', '2022-10-30 17:46:03', 1667151932, 1, 2, 40, 1, NULL, NULL, NULL),
(217, NULL, '전세계 최초! 15년 동안 연구하여 양식에 성공한 전설의 물고기 황금광어 Amazing golden flounder at Korean fish farm - Korean food', '전세계-최초!-15년-동안-연구하여-양식에-성공한-전설의-물고기-황금광어-Amazing-golden-flounder-at-Korean-fish-farm---Korean-food', 33, 1, 'https://i.ytimg.com/vi/y0D1cluPbsQ/hqdefault.jpg', 'https://i.ytimg.com/vi/y0D1cluPbsQ/hqdefault.jpg', '전세계 최초! 15년 동안 연구하여 양식에 성공한 전설의 물고기 황금광어 Amazing golden flounder at Korean fish farm - Korean food', '<iframe width=\"200\" height=\"113\" src=\"https://www.youtube.com/embed/y0D1cluPbsQ?feature=oembed&autoplay=1\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen title=\"전세계 최초! 15년 동안 연구하여 양식에 성공한 전설의 물고기 황금광어 Amazing golden flounder at Korean fish farm - Korean food\"></iframe>', 'youtube', '2022-10-30 17:46:03', 1667151962, 1, 1, 56, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `articles_comments`
--

DROP TABLE IF EXISTS `articles_comments`;
CREATE TABLE `articles_comments` (
  `comment_id` int(11) NOT NULL,
  `comment_content` text NOT NULL,
  `bridge_user_id` int(11) NOT NULL,
  `comment_created_date` int(11) NOT NULL,
  `bridge_ar_id` int(11) NOT NULL,
  `comment_state` tinyint(4) NOT NULL,
  `comment_correct` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `articles_comments`
--

INSERT INTO `articles_comments` (`comment_id`, `comment_content`, `bridge_user_id`, `comment_created_date`, `bridge_ar_id`, `comment_state`, `comment_correct`) VALUES
(1, 'ok', 1, 1424029859, 135, 1, 1),
(2, 'ok', 1, 1424070883, 133, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `articles_likes`
--

DROP TABLE IF EXISTS `articles_likes`;
CREATE TABLE `articles_likes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ar_id` int(11) NOT NULL,
  `created_date` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `articles_likes`
--

INSERT INTO `articles_likes` (`id`, `user_id`, `ar_id`, `created_date`) VALUES
(261, 1, 33, '1419407695'),
(131, 1, 26, '1418531767'),
(140, 1, 26, '1418531767'),
(167, 1, 29, '1418537547'),
(155, 1, 27, '1418534760'),
(258, 1, 30, '1419407656'),
(267, 1, 47, '1423303324'),
(181, 1, 32, '1418592685'),
(190, 1, 36, '1418830774'),
(262, 1, 34, '1419411345'),
(199, 1, 35, '1418882798'),
(265, 1, 37, '1419419411'),
(225, 0, 39, '1419357540'),
(266, 1, 28, '1419420462'),
(272, 1, 66, '1423314801'),
(273, 1, 51, '1423319597'),
(274, 1, 50, '1423319600'),
(275, 1, 49, '1423319604'),
(276, 1, 48, '1423319609'),
(277, 1, 75, '1423347296'),
(278, 1, 57, '1423385879'),
(318, 14, 102, '1423605340'),
(284, 14, 101, '1423552011'),
(285, 1, 102, '1423552727'),
(286, 1, 101, '1423552736'),
(287, 1, 100, '1423552742'),
(307, 14, 57, '1423586707'),
(302, 14, 72, '1423570739'),
(294, 14, 73, '1423556571'),
(295, 20, 107, '1423557317'),
(296, 20, 109, '1423558151'),
(297, 1, 105, '1423559318'),
(300, 14, 108, '1423561746'),
(301, 21, 100, '1423563618'),
(303, 1, 118, '1423571105'),
(304, 14, 50, '1423575137'),
(305, 25, 73, '1423575807'),
(314, 14, 49, '1423594438'),
(312, 14, 124, '1423592608'),
(313, 14, 48, '1423594201'),
(316, 14, 107, '1423595315'),
(320, 30, 74, '1423607735'),
(321, 1, 131, '1423661187'),
(322, 1, 130, '1423665299'),
(362, 1, 133, '1424002715'),
(371, 1, 156, '1425829276');

-- --------------------------------------------------------

--
-- Table structure for table `articles_top_up`
--

DROP TABLE IF EXISTS `articles_top_up`;
CREATE TABLE `articles_top_up` (
  `id` int(11) NOT NULL,
  `ar_id` int(11) NOT NULL,
  `current_balance` int(11) NOT NULL,
  `first_balance` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ar_views_counter` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `articles_top_up`
--

INSERT INTO `articles_top_up` (`id`, `ar_id`, `current_balance`, `first_balance`, `created_at`, `ar_views_counter`) VALUES
(1, 216, 94, 100, '2022-10-30 19:03:56', 10),
(2, 217, 17, 20, '2022-10-30 19:04:52', NULL),
(3, 215, 97, 100, '2022-10-30 19:05:23', NULL),
(4, 214, 0, 100, '2022-10-30 19:06:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `article_views_counter`
--

DROP TABLE IF EXISTS `article_views_counter`;
CREATE TABLE `article_views_counter` (
  `id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `article_views_counter`
--

INSERT INTO `article_views_counter` (`id`, `article_id`, `user_id`, `created_at`) VALUES
(1, 213, 33, '2022-10-30 15:31:26'),
(2, 216, 33, '2022-10-31 08:05:02'),
(3, 212, 33, '2022-10-31 11:15:21'),
(4, 199, 33, '2022-10-31 11:17:34'),
(5, 201, 33, '2022-10-31 11:21:01'),
(6, 208, 33, '2022-10-31 11:23:57'),
(7, 212, 33, '2022-10-31 11:29:10'),
(8, 202, 33, '2022-10-31 11:32:21'),
(9, 212, 33, '2022-10-31 11:33:22'),
(10, 216, 33, '2022-10-31 11:53:50'),
(11, 217, 33, '2022-10-31 11:54:07'),
(12, 214, 33, '2022-10-31 12:01:22'),
(13, 214, 33, '2022-10-31 12:09:04'),
(14, 214, 33, '2022-10-31 12:10:47'),
(15, 214, 33, '2022-10-31 12:11:42'),
(16, 214, 33, '2022-10-31 12:13:57'),
(17, 214, 33, '2022-10-31 12:15:39'),
(18, 215, 33, '2022-10-31 12:32:42'),
(19, 216, 33, '2022-10-31 13:20:01'),
(20, 208, 33, '2022-10-31 13:28:16');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL COMMENT 'category id',
  `category_name` varchar(100) NOT NULL COMMENT 'category name',
  `category_icon_code` varchar(50) NOT NULL COMMENT 'ui kit icon codes',
  `category_last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'last update',
  `category_created_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'created date',
  `category_ord` int(11) NOT NULL COMMENT 'sort',
  `category_state` tinyint(1) NOT NULL COMMENT 'state',
  `category_active` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_icon_code`, `category_last_update`, `category_created_date`, `category_ord`, `category_state`, `category_active`) VALUES
(40, 'English', '0', '2015-04-16 07:36:41', '0000-00-00 00:00:00', 0, 1, 1),
(41, 'Español', '0', '2015-04-16 07:36:55', '0000-00-00 00:00:00', 0, 1, 1),
(42, 'Português', '0', '2015-04-16 07:37:10', '0000-00-00 00:00:00', 0, 1, 1),
(43, 'Français', '0', '2015-04-16 07:37:20', '0000-00-00 00:00:00', 0, 1, 1),
(44, 'Deutsch', '0', '2015-04-16 07:37:29', '0000-00-00 00:00:00', 0, 1, 1),
(45, 'Italiano', '0', '2015-04-16 07:37:36', '0000-00-00 00:00:00', 0, 1, 1),
(46, 'Čeština', '0', '2015-04-16 07:37:50', '0000-00-00 00:00:00', 0, 1, 1),
(47, 'Ελληνικά', '0', '2015-04-16 07:37:59', '0000-00-00 00:00:00', 0, 1, 1),
(48, 'Русский', '0', '2015-04-16 07:38:11', '0000-00-00 00:00:00', 0, 1, 1),
(49, '中文 (简体)', '0', '2015-04-16 07:38:25', '0000-00-00 00:00:00', 0, 1, 1),
(50, '日本語', '0', '2015-04-16 07:38:37', '0000-00-00 00:00:00', 0, 1, 1),
(52, 'Tiếng Việt', '0', '2015-04-16 07:41:39', '0000-00-00 00:00:00', 0, 1, 1),
(53, 'ภาษาไทย', '0', '2015-04-16 07:42:20', '0000-00-00 00:00:00', 0, 1, 1),
(54, 'हिन्दी', '0', '2015-04-16 07:42:39', '0000-00-00 00:00:00', 0, 1, 1),
(55, 'বাংলা', '0', '2015-04-16 07:42:56', '0000-00-00 00:00:00', 0, 1, 1),
(56, 'العربية', '0', '2015-04-16 07:43:21', '0000-00-00 00:00:00', 0, 1, 1),
(57, 'Türkçe', '0', '2015-04-16 07:43:31', '0000-00-00 00:00:00', 0, 1, 1),
(58, 'עברית', '0', '2015-04-16 07:43:40', '0000-00-00 00:00:00', 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE `ci_sessions` (
  `id` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('d0091c73a8ec90130e6face6f5ccc2cc29610e19', '172.26.0.1', 1667298418, 0x5f5f63695f6c6173745f726567656e65726174657c693a313636373239383431383b73656c65637465642d7468656d657c733a32353a2275696b69742e616c6d6f73742d666c61742e6d696e2e637373223b646f776e6c6f61642d696672616d657c693a313b63617465676f72795f6e616d657c733a31333a22416c6c204c616e677561676573223b61727469636c65735f6c696d69745f636f756e7465727c693a363b66696c74657251756572797c733a303a22223b61727469636c65735f6c696d69747c693a3135303b757365725f646174617c4f3a383a22737464436c617373223a31393a7b733a373a22757365725f6964223b733a323a223333223b733a31313a2263757272656e63795f6964223b733a313a2230223b733a31313a226c616e67756167655f6964223b733a313a2230223b733a31303a22636f756e7472795f6964223b733a313a2230223b733a31333a22757365725f757365726e616d65223b733a31313a224162646f61686d65643131223b733a373a22747970655f6964223b733a313a2230223b733a31333a22757365725f70617373776f7264223b733a33323a223235643535616432383361613430306166343634633736643731336330376164223b733a31303a22757365725f656d61696c223b733a33333a22656e672e616264656c7261686d616e2e61686d6564313140676d61696c2e636f6d223b733a383a22757365725f616765223b733a303a22223b733a31323a22757365725f61646472657373223b733a303a22223b733a31303a22757365725f70686f6e65223b733a313a2230223b733a31333a22757365725f67726f75705f6964223b733a313a2233223b733a31373a22757365725f637265617465645f64617465223b733a31303a2231363637313230393238223b733a383a22757365725f6f7264223b733a313a2230223b733a31343a22757365725f69735f6f6e6c696e65223b733a313a2230223b733a31303a22757365725f7374617465223b733a313a2231223b733a31363a22757365725f6c6173742d757064617465223b733a31393a22323032322d31302d33312031303a35363a3336223b733a31303a22757365725f70686f746f223b733a303a22223b733a31323a2270617970616c5f6669656c64223b733a31373a2261736c646b666a73644064666b2e636f6d223b7d),
('ec4b8a4bed82324aacae6e20834e67c0aa9a89fe', '172.26.0.1', 1667305497, 0x73656c65637465642d7468656d657c733a32353a2275696b69742e616c6d6f73742d666c61742e6d696e2e637373223b646f776e6c6f61642d696672616d657c693a313b),
('78fc796bef7c29561490387a506775d1f28e21ac', '172.26.0.1', 1667308665, 0x5f5f63695f6c6173745f726567656e65726174657c693a313636373330383633303b73656c65637465642d7468656d657c733a32353a2275696b69742e616c6d6f73742d666c61742e6d696e2e637373223b646f776e6c6f61642d696672616d657c693a313b757365725f646174617c4f3a383a22737464436c617373223a32323a7b733a373a22757365725f6964223b733a323a223333223b733a31313a2263757272656e63795f6964223b733a313a2230223b733a31313a226c616e67756167655f6964223b733a313a2230223b733a31303a22636f756e7472795f6964223b733a313a2230223b733a31333a22757365725f757365726e616d65223b733a31313a224162646f61686d65643131223b733a373a22747970655f6964223b733a313a2230223b733a31333a22757365725f70617373776f7264223b733a33323a223235643535616432383361613430306166343634633736643731336330376164223b733a31303a22757365725f656d61696c223b733a33333a22656e672e616264656c7261686d616e2e61686d6564313140676d61696c2e636f6d223b733a383a22757365725f616765223b733a303a22223b733a31323a22757365725f61646472657373223b733a303a22223b733a31303a22757365725f70686f6e65223b733a313a2230223b733a31333a22757365725f67726f75705f6964223b733a313a2233223b733a31373a22757365725f637265617465645f64617465223b733a31303a2231363637313230393238223b733a383a22757365725f6f7264223b733a313a2230223b733a31343a22757365725f69735f6f6e6c696e65223b733a313a2230223b733a31303a22757365725f7374617465223b733a313a2231223b733a31363a22757365725f6c6173742d757064617465223b733a31393a22323032322d31312d30312031333a31353a3232223b733a31303a22757365725f70686f746f223b733a303a22223b733a31323a2270617970616c5f6669656c64223b733a31373a2261736c646b666a73644064666b2e636f6d223b733a31363a22726566657272616c5f636f756e746572223b733a313a2231223b733a373a22757365725f6970223b4e3b733a31363a22726566657272616c5f757365725f6964223b4e3b7d63617465676f72795f6e616d657c733a31333a22416c6c204c616e677561676573223b61727469636c65735f6c696d69745f636f756e7465727c693a313b66696c74657251756572797c733a303a22223b);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups` (
  `gr_id` int(11) NOT NULL,
  `gr_name` varchar(255) NOT NULL,
  `gr_created_date` bigint(20) NOT NULL,
  `gr_ord` int(11) NOT NULL,
  `gr_state` tinyint(1) NOT NULL,
  `gr_last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM AVG_ROW_LENGTH=41 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`gr_id`, `gr_name`, `gr_created_date`, `gr_ord`, `gr_state`, `gr_last_update`) VALUES
(1, 'adminstration', 1385025326, 1, 1, '2014-12-23 09:52:19'),
(3, 'users', 0, 1, 1, '2014-12-23 09:52:19');

-- --------------------------------------------------------

--
-- Table structure for table `group_rights_bridge`
--

DROP TABLE IF EXISTS `group_rights_bridge`;
CREATE TABLE `group_rights_bridge` (
  `gr_id` int(11) NOT NULL,
  `gr_group_id` int(11) NOT NULL,
  `gr_right_id` int(11) NOT NULL
) ENGINE=MyISAM AVG_ROW_LENGTH=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group_rights_bridge`
--

INSERT INTO `group_rights_bridge` (`gr_id`, `gr_group_id`, `gr_right_id`) VALUES
(1, 1, 1),
(2, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

DROP TABLE IF EXISTS `options`;
CREATE TABLE `options` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Site Options';

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `name`, `value`) VALUES
(1, 'selected-theme', 'default'),
(2, 'keywords', 'youtube,coins,media script'),
(3, 'description', 'Your website name - sharing site'),
(4, 'title', 'Your website name - sharing site'),
(5, 'website-name', 'Youtube Coins'),
(6, 'ads-header', ''),
(11, 'favicon', '/assets/themes/default/images/coin.png'),
(7, 'ads-footer', NULL),
(36, 'recapatcha-api-key', '6Lcq-QoTAAAAALqQY5E_VwDtG_FyjQ1kC7tvKCrD'),
(37, 'paypal-email', 'php.power.arts@gmail.com'),
(38, 'paypal-product-name', '100 Coin'),
(39, 'paypal-amount', '100'),
(8, 'site-logo', '/assets/uploads/logo112.png'),
(9, 'uk-theme', 'uikit.almost-flat.min.css'),
(10, 'admin-selected-theme', 'default'),
(12, 'css-file', 'html, body, div, span, applet, object, iframe, h1, h2, h3, h4, h5, h6, p, blockquote, pre, a, abbr, acronym, address, big, cite, code, del, dfn, em, img, ins, kbd, q, s, samp, small, strike, strong, sub, sup, tt, var, b, u, i, dl, dt, dd, ol, nav ul, nav li, fieldset, form, label, legend, table, caption, tbody, tfoot, thead, tr, th, td, article, aside, canvas, details, embed, figure, figcaption, footer, header, hgroup, menu, nav, output, ruby, section, summary, time, mark, audio, video {\r\n    margin: 0;\r\n    padding: 0;\r\n    border: 0;\r\n    font-size: 100%;\r\n    font: inherit;\r\n    vertical-align: baseline;\r\n}\r\n\r\narticle, aside, details, figcaption, figure, footer, header, hgroup, menu, nav, section {\r\n    display: block;\r\n}\r\n\r\nol, ul {\r\n    list-style: none;\r\n    margin: 0px;\r\n    padding: 0px;\r\n}\r\n\r\nblockquote, q {\r\n    quotes: none;\r\n}\r\n\r\nblockquote:before, blockquote:after, q:before, q:after {\r\n    content: \'\';\r\n    content: none;\r\n}\r\n\r\ntable {\r\n    border-collapse: collapse;\r\n    border-spacing: 0;\r\n}\r\n\r\n/* start editing from here */\r\na {\r\n    text-decoration: none;\r\n}\r\n\r\n.txt-rt {\r\n    text-align: right;\r\n}\r\n\r\n/* text align right */\r\n.txt-lt {\r\n    text-align: left;\r\n}\r\n\r\n/* text align left */\r\n.txt-center {\r\n    text-align: center;\r\n}\r\n\r\n/* text align center */\r\n.float-rt {\r\n    float: right;\r\n}\r\n\r\n/* float right */\r\n.float-lt {\r\n    float: left;\r\n}\r\n\r\n/* float left */\r\n.clear {\r\n    clear: both;\r\n}\r\n\r\n/* clear float */\r\n.pos-relative {\r\n    position: relative;\r\n}\r\n\r\n/* Position Relative */\r\n.pos-absolute {\r\n    position: absolute;\r\n}\r\n\r\n/* Position Absolute */\r\n.vertical-base {\r\n    vertical-align: baseline;\r\n}\r\n\r\n/* vertical align baseline */\r\n.vertical-top {\r\n    vertical-align: top;\r\n}\r\n\r\n/* vertical align top */\r\nnav.vertical ul li {\r\n    display: block;\r\n}\r\n\r\n/* vertical menu */\r\nnav.horizontal ul li {\r\n    display: inline-block;\r\n}\r\n\r\n/* horizontal menu */\r\nimg {\r\n    max-width: 100%;\r\n}\r\n\r\n/*end reset*/\r\nbody {\r\n    font-family: \'Open Sans\', sans-serif;\r\n    background: #F0EFEE;\r\n}\r\n\r\n/*---start-wrap----*/\r\n.wrap {\r\n    width: 80%;\r\n    margin: 0 auto;\r\n}\r\n\r\n/*---start-header----*/\r\n.header {\r\n    background: 0px 0px #FFF;\r\n    padding: 1em 0 1em;\r\n    border-bottom: 1px solid rgba(214, 213, 212, 0.64);\r\n    position: fixed;\r\n    width: 100%;\r\n    top: 0;\r\n    z-index: 999;\r\n}\r\n\r\n.logo {\r\n    float: left;\r\n}\r\n\r\n.logo img {\r\n    display: inline-block;\r\n}\r\n\r\n.nav-icon {\r\n    float: left;\r\n    margin: 0.6% 2% 0 8%;\r\n    width: 4.55%;\r\n}\r\n\r\n.nav-icon a span {\r\n    width: 48px;\r\n    height: 34px;\r\n    display: block;\r\n    background: url(../images/nav-icon.png) no-repeat 0px 0px;\r\n}\r\n\r\n.top-searchbar {\r\n    float: left;\r\n    width: 35%;\r\n    position: relative;\r\n    margin-left: 1em;\r\n}\r\n\r\n.text-white {\r\n    color: #ffffff\r\n}\r\n\r\n.top-searchbar input[type=\"text\"] {\r\n    margin-top: 0.55em;\r\n    width: 100%;\r\n    padding: 0.58em 1em;\r\n    border: 1px solid #E7E7E7;\r\n    transition: border-color 0.3s all;\r\n    -webkit-transition: border-color 0.3s all;\r\n    -moz-transition: border-color 0.3s all;\r\n    -o-transition: border-color 0.3s all;\r\n    outline: none;\r\n    border-radius: 0.3em;\r\n    -webkit-border-radius: 0.3em;\r\n    -moz-border-radius: 0.3em;\r\n    -o-border-radius: 0.3em;\r\n    -webkit-appearance: none;\r\n    font-family: \'Open Sans\', sans-serif;\r\n    color: #777;\r\n    position: relative;\r\n}\r\n\r\n.top-searchbar input[type=\"text\"] {\r\n    background: #F7F6F6;\r\n}\r\n\r\n.top-searchbar input[type=\"text\"]:hover {\r\n    border: 1px solid #DDDDDD;\r\n}\r\n\r\n.top-searchbar input[type=\"submit\"] {\r\n    position: absolute;\r\n    background: url(../images/search-icon.png) no-repeat 0px 0px;\r\n    height: 26px;\r\n    width: 26px;\r\n    display: inline-block;\r\n    border: none;\r\n    top: 12px;\r\n    right: -22px;\r\n    outline: none;\r\n    cursor: pointer;\r\n}\r\n\r\n.box {\r\n    position: absolute;\r\n    top: -100px;\r\n    width: 100%;\r\n    color: #7F7F7F;\r\n    margin: auto;\r\n    padding: 0px;\r\n    z-index: 999999;\r\n    text-align: center;\r\n    left: 0px;\r\n}\r\n\r\n.box_content_center {\r\n    background: rgba(240, 239, 238, 0.74);\r\n}\r\n\r\na.boxclose {\r\n    cursor: pointer;\r\n    text-align: center;\r\n    display: block;\r\n    position: absolute;\r\n    top: 1.9em;\r\n    right: 15em;\r\n}\r\n\r\n#activator {\r\n}\r\n\r\n.menu_box_list {\r\n    display: inline-block;\r\n    padding: 2.1em 0;\r\n}\r\n\r\n.menu_box_list ul li {\r\n    display: inline-block;\r\n}\r\n\r\n.menu_box_list li a {\r\n    display: block;\r\n    color: #363636;\r\n    font-size: 0.875em;\r\n    margin: 0.44em 2em;\r\n    font-weight: 900;\r\n    text-transform: uppercase;\r\n    text-align: left;\r\n    -webkit-transition: all 0.5s ease-in-out;\r\n    -moz-transition: all 0.5s ease-in-out;\r\n    -o-transition: all 0.5s ease-in-out;\r\n    transition: all 0.5s ease-in-out;\r\n}\r\n\r\n.menu_box_list li a:hover {\r\n    color: #B9CB41;\r\n}\r\n\r\n.menu_box_list li a > i > img {\r\n    vertical-align: middle;\r\n    padding-right: 10px;\r\n}\r\n\r\n.boxclose span {\r\n    width: 35px;\r\n    height: 35px;\r\n    display: inline-block;\r\n    background: url(../images/close2.png) no-repeat 0px 0px;\r\n}\r\n\r\n.boxclose span:hover {\r\n    background: url(../images/close2h.png) no-repeat 0px 0px;\r\n}\r\n\r\n/*--userinfo--*/\r\n.userinfo {\r\n    float: right;\r\n    margin-top: .4em;\r\n}\r\n.user ul li {\r\n    display: inline-block;\r\n}\r\n\r\n.user ul li a span {\r\n    vertical-align: middle;\r\n    margin-left: 0.8em;\r\n    font-size: 1em;\r\n}\r\n\r\n.user ul li a {\r\n    transition: 0.5s all;\r\n    -webkit-transition: 0.5s all;\r\n    -moz-transition: 0.5s all;\r\n    -o-transition: 0.5s all;\r\n}\r\n\r\n\r\n.user ul li a img {\r\n    border-radius: 30em;\r\n    -webkit-border-radius: 30em;\r\n    -moz-border-radius: 30em;\r\n    -o-border-radius: 30em;\r\n    vertical-align: middle;\r\n\r\n}\r\n\r\n/*--//userinfo--*/\r\n/*----start-post-grids----*/\r\n.post-share span {\r\n    background: url(../images/facebook.png) no-repeat 0px 0px;\r\n    height: 26px;\r\n    width: 26px;\r\n    display: inline-block;\r\n    border-radius: 30em;\r\n    -webkit-border-radius: 30em;\r\n    -moz-border-radius: 30em;\r\n    -o-border-radius: 30em;\r\n}\r\n\r\n.post-share span:hover {\r\n    background: url(../images/facebookh.png) no-repeat 0px 0px;\r\n}\r\n\r\n.rateit span {\r\n    height: 18px;\r\n    width: 76px;\r\n    background: url(../images/start-rate.png) no-repeat 0px 0px;\r\n    display: inline-block;\r\n}\r\n\r\n.rateit span:hover {\r\n    background: url(../images/start-rateh.png) no-repeat 0px 0px;\r\n}\r\n\r\n.post-basic-info {\r\n    padding: 7% 7% 5% 7%;\r\n}\r\n\r\n.post-basic-info h3 a {\r\n    color: #717171;\r\n    font-size: 1.2em;\r\n    margin-bottom: 0.2em;\r\n    display: block;\r\n    transition: 0.5s all;\r\n    -webkit-transition: 0.5s all;\r\n    -moz-transition: 0.5s all;\r\n    -o-transition: 0.5s all;\r\n}\r\n\r\n.post-basic-info h3 a:hover {\r\n    color: #B9CB41;\r\n}\r\n\r\n.post-basic-info span a {\r\n    color: #ACAAAA;\r\n    font-size: 0.9em;\r\n}\r\n\r\n.post-basic-info span a label {\r\n    height: 12px;\r\n    width: 12px;\r\n    display: inline-block;\r\n    background: url(../images/map-pin.png) no-repeat 0px 0px;\r\n    margin-right: 0.4em;\r\n    transition: 0.5s all;\r\n    -webkit-transition: 0.5s all;\r\n    -moz-transition: 0.5s all;\r\n    -o-transition: 0.5s all;\r\n}\r\n\r\n.post-basic-info span a:hover {\r\n    color: #B9CB41;\r\n}\r\n\r\n.post-basic-info p {\r\n    font-size: 0.875em;\r\n    color: #B7B5B5;\r\n    margin: 0.6em 0;\r\n    line-height: 1.5em;\r\n}\r\n\r\n/*--post-info-rate-share--*/\r\n.post-info-rate-share {\r\n    border-top: 1px solid rgba(183, 181, 181, 0.36);\r\n    padding: 4% 0 2%;\r\n}\r\n\r\n.rateit {\r\n    float: left;\r\n    margin: 0.18em 0 0 1em;\r\n}\r\n\r\n.post-share {\r\n    float: right;\r\n    margin-right: 1.5em;\r\n}\r\n\r\n/*--footer--*/\r\n.footer {\r\n    position: fixed;\r\n    bottom: 10px;\r\n    right: 15px;\r\n    background-color: transparent;\r\n}\r\n\r\n.footer p {\r\n    color: #8C8C8C;\r\n    font-size: 0.9em;\r\n    background-color: transparent;\r\n}\r\n\r\n.footer p a {\r\n    color: #B9CB41;\r\n    transition: 0.5s all;\r\n    -webkit-transition: 0.5s all;\r\n    -moz-transition: 0.5s all;\r\n    -o-transition: 0.5s all;\r\n}\r\n\r\n.footer p a:hover {\r\n    color: #8C8C8C;\r\n}\r\n\r\n/*----start-single-page----*/\r\n.artical-content h3 a {\r\n    font: 400 28px/28px \'Open Sans\', sans-serif;\r\n    color: #626262;\r\n    text-align: left;\r\n    font-weight: 400;\r\n    padding: 0.9em 0 0;\r\n    display: block;\r\n}\r\n\r\n.artical-content p {\r\n    font: normal 16px/26px \'Open Sans\', sans-serif, Helvetica, sans-serif;\r\n    color: #9b9b9b;\r\n    padding: 17px 0px;\r\n    font-weight: 400;\r\n}\r\n\r\n.artical-content img {\r\n    width: 100%;\r\n}\r\n\r\n/*----share-artical----*/\r\n.share-artical ul li {\r\n    display: inline-block;\r\n    padding-right: 10px;\r\n}\r\n\r\n.share-artical ul li img {\r\n    vertical-align: text-top;\r\n    padding-right: 7px;\r\n}\r\n\r\n.share-artical ul li a {\r\n    font: 400 14px/22px \'Open Sans\', sans-serif;\r\n    color: #cbcbc3;\r\n    padding-left: 20px;\r\n    font-weight: 400;\r\n}\r\n\r\n.share-artical ul li a:hover {\r\n    color: #B9CB41;\r\n}\r\n\r\n/*---comment-box----*/\r\n.single-page {\r\n    margin-top: 8em;\r\n    background: #fff;\r\n    padding: 2%;\r\n}\r\n\r\n/*----artical-links---*/\r\n.artical-links {\r\n    padding: 10px 0px;\r\n    float: left;\r\n}\r\n\r\n.share-artical {\r\n    float: right;\r\n    padding: 10px;\r\n}\r\n\r\n.artical-links ul li {\r\n    display: inline-block;\r\n}\r\n\r\n.artical-links ul li img {\r\n    vertical-align: middle;\r\n    padding-right: 10px;\r\n}\r\n\r\n.artical-links ul li a {\r\n    font: 400 14px/22px \'Open Sans\', sans-serif;\r\n    color: #cbcbc3;\r\n    padding-left: 20px;\r\n    font-weight: 400;\r\n}\r\n\r\n.artical-links ul li a:hover {\r\n    color: #B9CB41;\r\n}\r\n\r\n/*----start-comment-section---*/\r\nh4.style1 a {\r\n    font: 400 20px/28px \'Open Sans\', sans-serif;\r\n    color: #363636;\r\n    text-transform: uppercase;\r\n    padding: 1em 0;\r\n    -webkit-transition: all 0.3s ease-out;\r\n    -moz-transition: all 0.3s ease-out;\r\n    -ms-transition: all 0.3s ease-out;\r\n    -o-transition: all 0.3s ease-out;\r\n    transition: all 0.3s ease-out;\r\n}\r\n\r\nh3.style {\r\n    font: 400 13px/28px \'Open Sans\', sans-serif;\r\n    color: #363636;\r\n    text-align: left;\r\n    text-transform: uppercase;\r\n    padding: 0.8em 0 0;\r\n}\r\n\r\np.para {\r\n    font-size: 0.875em;\r\n    color: #B7B5B5;\r\n    margin: 0.6em 0;\r\n    line-height: 1.8em;\r\n    font-weight: 400;\r\n}\r\n\r\n.grids_of_2 h2 {\r\n    font: 400 30px/28px \'Open Sans\', sans-serif;\r\n    color: #363636;\r\n    text-align: left;\r\n    padding: 1em 0 0.5em;\r\n}\r\n\r\n.grid1_of_2 {\r\n    margin-top: 0.8em;\r\n}\r\n\r\n.grid_img {\r\n    float: left;\r\n    width: 8.33333%;\r\n    margin-right: 2%;\r\n}\r\n\r\n.grid_text {\r\n    float: left;\r\n    width: 88.33333%\r\n}\r\n\r\n.grid_text h3 {\r\n    text-align: left;\r\n}\r\n\r\n\r\n.grid1_of_2.left {\r\n    margin-left: 14%;\r\n}\r\n\r\n/*---comment-box----*/\r\n.artical-commentbox {\r\n    margin: 1em 0;\r\n}\r\n\r\n.table-form {\r\n    margin: 0em auto;\r\n}\r\n\r\n.table-form form input[type=\"text\"] {\r\n    font-family: \'Open Sans\', sans-serif;\r\n    border: 1px solid rgba(192, 192, 192, 0.61);\r\n    outline: none;\r\n    padding: 12px;\r\n    color: #333333;\r\n    overflow: hidden;\r\n    width: 30%;\r\n    display: block;\r\n    border-radius: 4px;\r\n    -webkit-border-radius: 4px;\r\n    -moz-border-radius: 4px;\r\n    -o-border-radius: 4px;\r\n    transition: border-color 0.3s;\r\n    -o-transition: border-color 0.3s;\r\n    -ms-transition: border-color 0.3s;\r\n    -moz-transition: border-color 0.3s;\r\n    -webkit-transition: border-color 0.3s;\r\n    -webkit-appearance: none;\r\n    box-shadow: 0px 0px 1px rgba(0, 0, 0, 0.05);\r\n    -webkit-box-shadow: 0px 0px 1px rgba(0, 0, 0, 0.05);\r\n    -moz-box-shadow: 0px 0px 1px rgba(0, 0, 0, 0.05);\r\n    -o-box-shadow: 0px 0px 1px rgba(0, 0, 0, 0.05);\r\n}\r\n\r\n.table-form textarea {\r\n    font-family: \'Open Sans\', sans-serif;\r\n    padding: 8px;\r\n    outline: none;\r\n    color: #333333;\r\n    border: 1px solid rgba(192, 192, 192, 0.61);\r\n    width: 60%;\r\n    height: 180px;\r\n    resize: none;\r\n    border-radius: 4px;\r\n    -webkit-border-radius: 4px;\r\n    -moz-border-radius: 4px;\r\n    -o-border-radius: 4px;\r\n    transition: border-color 0.3s;\r\n    -o-transition: border-color 0.3s;\r\n    -ms-transition: border-color 0.3s;\r\n    -moz-transition: border-color 0.3s;\r\n    -webkit-transition: border-color 0.3s;\r\n    -webkit-appearance: none;\r\n    box-shadow: 0px 0px 1px rgba(0, 0, 0, 0.05);\r\n    -webkit-box-shadow: 0px 0px 1px rgba(0, 0, 0, 0.05);\r\n    -moz-box-shadow: 0px 0px 1px rgba(0, 0, 0, 0.05);\r\n    -o-box-shadow: 0px 0px 1px rgba(0, 0, 0, 0.05);\r\n}\r\n\r\n.table-form form input[type=\"text\"]:hover, .table-form textarea:hover {\r\n    border: 1px solid #B9CB41;\r\n}\r\n\r\n.table-form input[type=\"submit\"] {\r\n    font-family: \'Open Sans\', sans-serif;\r\n    color: #5a5a5a;\r\n    padding: 0.8em 1.5em;\r\n    background: #fff;\r\n    text-decoration: none;\r\n    text-shadow: none;\r\n    border: 1px solid rgba(192, 192, 192, 0.61);\r\n    display: block;\r\n    -webkit-transition: all 0.3s ease-out;\r\n    -moz-transition: all 0.3s ease-out;\r\n    -ms-transition: all 0.3s ease-out;\r\n    -o-transition: all 0.3s ease-out;\r\n    transition: all 0.3s ease-out;\r\n    border-radius: 4px;\r\n    -webkit-border-radius: 4px;\r\n    -moz-border-radius: 4px;\r\n    -o-border-radius: 4px;\r\n    cursor: pointer;\r\n    font-size: 1em;\r\n    outline: none;\r\n}\r\n\r\n.table-form input[type=\"submit\"]:hover {\r\n    color: #B9CB41;\r\n    border: 1px solid #B9CB41;\r\n}\r\n\r\n.table-form label {\r\n    display: block;\r\n    margin: 0.4em 0 0.5em;\r\n    font-family: \'Open Sans\', sans-serif;\r\n    color: #363636;\r\n    font-weight: 100;\r\n}\r\n\r\n.table-form div {\r\n    margin: 0.5em 0;\r\n}\r\n\r\n.table-form div {\r\n    margin: 1em 0;\r\n}\r\n\r\n/*----//End-comment-section---*/\r\n\r\n.map {\r\n    margin-bottom: 30px;\r\n}\r\n\r\n.list3 li > img {\r\n    float: left;\r\n    margin-right: 10px;\r\n}\r\n\r\n.extra-wrap {\r\n    overflow: hidden;\r\n}\r\n\r\n.extra-wrap p {\r\n    color: #626262;\r\n    line-height: 1.8em;\r\n    font-size: 0.85em;\r\n    margin-bottom: 5px;\r\n    font-family: \'Open Sans\', sans-serif;\r\n}\r\n\r\nspan.mail a {\r\n    color: #B9CB41;\r\n}\r\n\r\nspan.mail a:hover {\r\n    color: #626262;\r\n}\r\n\r\n.contact-to input[type=\"text\"] {\r\n    padding: 12px 10px;\r\n    width: 30.66%;\r\n    font-family: \'Open Sans\', sans-serif;\r\n    margin: 12px 0;\r\n    border: 1px solid rgba(192, 192, 192, 0.61);\r\n    color: #626262;\r\n    background: #FFF;\r\n    float: left;\r\n    outline: none;\r\n    font-size: 0.85em;\r\n    transition: border-color 0.3s;\r\n    -o-transition: border-color 0.3s;\r\n    -ms-transition: border-color 0.3s;\r\n    -moz-transition: border-color 0.3s;\r\n    -webkit-transition: border-color 0.3s;\r\n    box-shadow: 0px 0px 1px rgba(0, 0, 0, 0.05);\r\n    -webkit-box-shadow: 0px 0px 1px rgba(0, 0, 0, 0.05);\r\n    -moz-box-shadow: 0px 0px 1px rgba(0, 0, 0, 0.05);\r\n    -o-box-shadow: 0px 0px 1px rgba(0, 0, 0, 0.05);\r\n    border-radius: 4px;\r\n    -webkit-border-radius: 4px;\r\n    -moz-border-radius: 4px;\r\n    -o-border-radius: 4px;\r\n}\r\n\r\n.contact-to input[type=\"text\"]:nth-child(2), .contact-to input[type=\"text\"]:nth-child(3) {\r\n    margin-left: 10px;\r\n}\r\n\r\n.text2 input[type=\"text\"], .text2 textarea {\r\n    width: 97.7%;\r\n    margin: 12px 0;\r\n    border: 1px solid rgba(192, 192, 192, 0.61);\r\n    color: #626262;\r\n    font-family: \'Open Sans\', sans-serif;\r\n    outline: none;\r\n    margin-bottom: 25px;\r\n    height: 100px;\r\n    padding: 12px 10px;\r\n    font-size: 0.85em;\r\n    transition: border-color 0.3s;\r\n    -o-transition: border-color 0.3s;\r\n    -ms-transition: border-color 0.3s;\r\n    -moz-transition: border-color 0.3s;\r\n    -webkit-transition: border-color 0.3s;\r\n    box-shadow: 0px 0px 1px rgba(0, 0, 0, 0.05);\r\n    -webkit-box-shadow: 0px 0px 1px rgba(0, 0, 0, 0.05);\r\n    -moz-box-shadow: 0px 0px 1px rgba(0, 0, 0, 0.05);\r\n    -o-box-shadow: 0px 0px 1px rgba(0, 0, 0, 0.05);\r\n    border-radius: 4px;\r\n    -webkit-border-radius: 4px;\r\n    -moz-border-radius: 4px;\r\n    -o-border-radius: 4px;\r\n}\r\n\r\n.text2 textarea {\r\n    height: 180px;\r\n}\r\n\r\n.text2 input[type=\"text\"]:hover, .text2 textarea:hover, .contact-to input[type=\"text\"]:hover {\r\n    border: 1px solid #B9CB41;\r\n}\r\n\r\n.contact-form input[type=\"submit\"] {\r\n    font-family: \'Open Sans\', sans-serif;\r\n    color: #5a5a5a;\r\n    padding: 0.8em 1.5em;\r\n    background: #fff;\r\n    text-decoration: none;\r\n    text-shadow: none;\r\n    border: 1px solid rgba(192, 192, 192, 0.61);\r\n    display: block;\r\n    -webkit-transition: all 0.3s ease-out;\r\n    -moz-transition: all 0.3s ease-out;\r\n    -ms-transition: all 0.3s ease-out;\r\n    -o-transition: all 0.3s ease-out;\r\n    transition: all 0.3s ease-out;\r\n    border-radius: 4px;\r\n    -webkit-border-radius: 4px;\r\n    -moz-border-radius: 4px;\r\n    -o-border-radius: 4px;\r\n    cursor: pointer;\r\n    font-size: 1em;\r\n    outline: none;\r\n}\r\n\r\n.contact-form input[type=\"submit\"]:hover {\r\n    color: #B9CB41;\r\n    border: 1px solid #B9CB41;\r\n}\r\n\r\n.span_1_of_first1 h5 {\r\n    color: #363636;\r\n    text-transform: uppercase;\r\n    font-size: 1.2em;\r\n    transition: 0.5s all;\r\n    -webkit-transition: 0.5s all;\r\n    -moz-transition: 0.5s all;\r\n    -o-transition: 0.5s all;\r\n    font-family: \'Open Sans\', sans-serif;\r\n    margin-bottom: 0.6em;\r\n}\r\n\r\n.span_1_of_first1 {\r\n    width: 29.5%;\r\n}\r\n\r\n.col_1_of_bottom:first-child {\r\n    margin-left: 0;\r\n}\r\n\r\n.col_1_of_bottom {\r\n    display: block;\r\n    float: left;\r\n    margin: 1% 0 1% 3.6%;\r\n}\r\n\r\n.contact-grids {\r\n    margin-bottom: 1em;\r\n}\r\n\r\n/*----//End-contact----*/\r\n/*---//End-wrap----*/\r\n/*--media Quries for 1440px-monitors-*/\r\n@media only screen and (max-width: 1440px) and (min-width: 1366px) {\r\n    .wrap {\r\n        width: 85%;\r\n    }\r\n}\r\n\r\n/*--//End-media Quries for 1440px-monitors-*/\r\n/*--media Quries for 1366px-monitors-*/\r\n@media only screen and (max-width: 1366px) and (min-width: 1280px) {\r\n    .wrap {\r\n        width: 90%;\r\n    }\r\n\r\n    .footer {\r\n        bottom: 0px;\r\n        right: 0px;\r\n        background-color: transparent;\r\n    }\r\n}\r\n\r\n/*--//End-media Quries for 1366px-monitors-*/\r\n/*--media Quries for 1280px-monitors-*/\r\n@media only screen and (max-width: 1280px) and (min-width: 1024px) {\r\n    .wrap {\r\n        width: 80%;\r\n    }\r\n\r\n    .footer {\r\n        bottom: 0px;\r\n        right: 0px;\r\n        background-color: transparent;\r\n    }\r\n\r\n    .contact-to input[type=\"text\"] {\r\n        width: 30.2%;\r\n    }\r\n}\r\n\r\n/*--//End-media Quries for 1280px-monitors-*/\r\n/*--media Quries for 1024px-monitors-*/\r\n@media only screen and (max-width: 1024px) and (min-width: 768px) {\r\n    .wrap {\r\n        width: 90%;\r\n    }\r\n\r\n    .footer {\r\n        bottom: 0px;\r\n        right: 0px;\r\n        background-color: transparent;\r\n    }\r\n\r\n    .contact-to input[type=\"text\"] {\r\n        width: 30%;\r\n    }\r\n\r\n    .text2 input[type=\"text\"], .text2 textarea {\r\n        width: 97.3%;\r\n    }\r\n\r\n    .top-searchbar {\r\n        width: 36%;\r\n    }\r\n\r\n    a.boxclose {\r\n        right: 6em;\r\n        top: 2em;\r\n    }\r\n\r\n    .userinfo {\r\n        display: none;\r\n    }\r\n}\r\n\r\n/*--//End-media Quries for 1024px-monitors-*/\r\n/*--media Quries for 768px-monitors-*/\r\n@media only screen and (max-width: 768px) and (min-width: 640px) {\r\n    .wrap {\r\n        width: 90%;\r\n    }\r\n\r\n    .footer {\r\n        bottom: 0px;\r\n        right: 0px;\r\n        background-color: transparent;\r\n    }\r\n\r\n    .contact-to input[type=\"text\"] {\r\n        width: 28.91%;\r\n    }\r\n\r\n    .text2 input[type=\"text\"], .text2 textarea {\r\n        width: 96.4%;\r\n        margin-bottom: 16px;\r\n        resize: none;\r\n    }\r\n\r\n    .contact-form input[type=\"submit\"] {\r\n        padding: 0.6em 1.2em;\r\n    }\r\n\r\n    .top-searchbar {\r\n        width: 29%;\r\n    }\r\n\r\n    a.boxclose {\r\n        right: 1em;\r\n        top: 2em;\r\n    }\r\n\r\n    .para1 {\r\n        display: none;\r\n    }\r\n\r\n    .nav-icon {\r\n        margin: 1.2% 2% 0 6%;\r\n    }\r\n\r\n    .artical-content h3 a {\r\n        font: 400 24px/36px \'Open Sans\', sans-serif;\r\n        padding: 0.5em 0 0;\r\n    }\r\n\r\n    .artical-content p:nth-child(1) {\r\n        display: none;\r\n    }\r\n\r\n    .artical-content p {\r\n        font: normal 14px/22px \'Open Sans\', sans-serif, Helvetica, sans-serif;\r\n        padding: 8px 0px;\r\n    }\r\n\r\n    .artical-links {\r\n        float: none;\r\n    }\r\n\r\n    .share-artical {\r\n        float: none;\r\n        margin: 0em 0 0 0;\r\n        padding: 0;\r\n    }\r\n\r\n    .share-artical ul li a, .artical-links ul li a {\r\n        padding-right: 20px;\r\n        padding-left: 0;\r\n    }\r\n\r\n    .grids_of_2 h2 {\r\n        font: 400 26px/28px \'Open Sans\', sans-serif;\r\n        padding: 0.8em 0 0.5em;\r\n    }\r\n\r\n    h4.style1 a {\r\n        font: 400 17px/14px \'Open Sans\', sans-serif;\r\n    }\r\n\r\n    .grids_of_2 h2 {\r\n        font: 400 24px/14px \'Open Sans\', sans-serif;\r\n        padding: 0.5em 0 0.2em;\r\n    }\r\n\r\n    .table-form form input[type=\"text\"] {\r\n        width: 46%;\r\n        padding: 10px;\r\n    }\r\n\r\n    .table-form textarea {\r\n        width: 85%;\r\n        padding: 10px;\r\n    }\r\n\r\n    .table-form input[type=\"submit\"] {\r\n        padding: 0.6em 1.2em;\r\n    }\r\n\r\n    .menu_box_list li a {\r\n        margin: 0.44em 1.5em;\r\n    }\r\n\r\n    .userinfo {\r\n        display: none;\r\n    }\r\n}\r\n\r\n/*--//End-media Quries for 768px-monitors-*/\r\n/*--media Quries for 640px-monitors-*/\r\n@media only screen and (max-width: 640px) and (min-width: 480px) {\r\n    .wrap {\r\n        width: 90%;\r\n    }\r\n\r\n    .footer {\r\n        bottom: 0px;\r\n        right: 0px;\r\n        background-color: transparent;\r\n    }\r\n\r\n    .contact-to input[type=\"text\"] {\r\n        width: 96%;\r\n    }\r\n\r\n    .contact-to input[type=\"text\"]:nth-child(2), .contact-to input[type=\"text\"]:nth-child(3) {\r\n        margin-left: 0px;\r\n    }\r\n\r\n    .text2 input[type=\"text\"], .text2 textarea {\r\n        width: 96.4%;\r\n        margin-bottom: 16px;\r\n        resize: none;\r\n    }\r\n\r\n    .contact-form input[type=\"submit\"] {\r\n        padding: 0.6em 1.2em;\r\n    }\r\n\r\n    .top-searchbar {\r\n        width: 47%;\r\n    }\r\n\r\n    a.boxclose {\r\n        right: 1em;\r\n        top: 2em;\r\n    }\r\n\r\n    .para1 {\r\n        display: none;\r\n    }\r\n\r\n    .nav-icon {\r\n        margin: 1.2% 2% 0 6%;\r\n    }\r\n\r\n    .artical-content h3 a {\r\n        font: 400 24px/36px \'Open Sans\', sans-serif;\r\n        padding: 0.5em 0 0;\r\n    }\r\n\r\n    .artical-content p:nth-child(1) {\r\n        display: none;\r\n    }\r\n\r\n    .userinfo {\r\n        display: none;\r\n    }\r\n\r\n    .artical-content p {\r\n        font: normal 14px/22px \'Open Sans\', sans-serif, Helvetica, sans-serif;\r\n        padding: 8px 0px;\r\n    }\r\n\r\n    .artical-links {\r\n        float: none;\r\n    }\r\n\r\n    .share-artical {\r\n        float: none;\r\n        margin: 0em 0 0 0;\r\n        padding: 0;\r\n    }\r\n\r\n    .share-artical ul li a, .artical-links ul li a {\r\n        padding-right: 20px;\r\n        padding-left: 0;\r\n    }\r\n\r\n    .grids_of_2 h2 {\r\n        font: 400 26px/28px \'Open Sans\', sans-serif;\r\n        padding: 0.8em 0 0.5em;\r\n    }\r\n\r\n    h4.style1 a {\r\n        font: 400 17px/14px \'Open Sans\', sans-serif;\r\n    }\r\n\r\n    .grids_of_2 h2 {\r\n        font: 400 24px/14px \'Open Sans\', sans-serif;\r\n        padding: 0.5em 0 0.2em;\r\n    }\r\n\r\n    .table-form form input[type=\"text\"] {\r\n        width: 46%;\r\n        padding: 10px;\r\n    }\r\n\r\n    .table-form textarea {\r\n        width: 85%;\r\n        padding: 10px;\r\n    }\r\n\r\n    .table-form input[type=\"submit\"] {\r\n        padding: 0.6em 1.2em;\r\n    }\r\n\r\n    .menu_box_list li a {\r\n        margin: 0.44em 1.5em;\r\n    }\r\n\r\n    .header {\r\n        padding: 1em 0 0.6em;\r\n    }\r\n\r\n    .menu_box_list ul li {\r\n        display: block;\r\n    }\r\n\r\n    .box {\r\n        top: -12px;\r\n    }\r\n\r\n    .map {\r\n        display: none;\r\n    }\r\n\r\n    .col_1_of_bottom {\r\n        float: none;\r\n        margin: 1% 0 1% 0%;\r\n    }\r\n\r\n    .span_1_of_first1 {\r\n        width: 100%;\r\n    }\r\n\r\n    .single-page, .contact-info {\r\n        margin-top: 7em;\r\n        padding: 4% 4% 5% 4%;\r\n    }\r\n}\r\n\r\n/*--//End-media Quries for 640px-monitors-*/\r\n/*--media Quries for 480px-monitors-*/\r\n@media only screen and (max-width: 480px) and (min-width: 320px) {\r\n    .wrap {\r\n        width: 90%;\r\n    }\r\n\r\n    .footer {\r\n        bottom: 0px;\r\n        right: 0px;\r\n        background-color: transparent;\r\n    }\r\n\r\n    .contact-to input[type=\"text\"] {\r\n        width: 94.5%;\r\n    }\r\n\r\n    .contact-to input[type=\"text\"]:nth-child(2), .contact-to input[type=\"text\"]:nth-child(3) {\r\n        margin-left: 0px;\r\n    }\r\n\r\n    .ads-header {\r\n        margin-top: 80px;\r\n    }\r\n\r\n    .text2 input[type=\"text\"], .text2 textarea {\r\n        width: 94.5%;\r\n        margin-bottom: 16px;\r\n        resize: none;\r\n    }\r\n\r\n    .contact-form input[type=\"submit\"] {\r\n        padding: 0.6em 1.2em;\r\n    }\r\n\r\n    .top-searchbar {\r\n        width: 94%;\r\n        float: none;\r\n        margin: 0;\r\n        clear: both;\r\n    }\r\n\r\n    a.boxclose {\r\n        right: 1em;\r\n        top: 2em;\r\n    }\r\n\r\n    .para1, .para2 {\r\n        display: none;\r\n    }\r\n\r\n    .nav-icon {\r\n        margin: 2.5% 6.8% 0 0%;\r\n        float: right;\r\n    }\r\n\r\n    .artical-content h3 a {\r\n        font: 400 20px/31px \'Open Sans\', sans-serif;\r\n        padding: 0.5em 0 0;\r\n    }\r\n\r\n    .artical-links ul li {\r\n        display: block;\r\n    }\r\n\r\n    .share-artical ul li {\r\n        display: block;\r\n    }\r\n\r\n    .artical-content p:nth-child(1) {\r\n        display: none;\r\n    }\r\n\r\n    .userinfo {\r\n        display: none;\r\n    }\r\n\r\n    .artical-content p {\r\n        font: normal 14px/22px \'Open Sans\', sans-serif, Helvetica, sans-serif;\r\n        padding: 8px 0px;\r\n    }\r\n\r\n    .artical-links {\r\n        float: none;\r\n    }\r\n\r\n    .share-artical {\r\n        float: none;\r\n        margin: 0em 0 0 0;\r\n        padding: 0;\r\n    }\r\n\r\n    .share-artical ul li a, .artical-links ul li a {\r\n        padding-right: 20px;\r\n        padding-left: 0;\r\n    }\r\n\r\n    .grids_of_2 h2 {\r\n        font: 400 26px/28px \'Open Sans\', sans-serif;\r\n        padding: 0.8em 0 0.5em;\r\n    }\r\n\r\n    h4.style1 a {\r\n        font: 400 17px/14px \'Open Sans\', sans-serif;\r\n    }\r\n\r\n    .grids_of_2 h2 {\r\n        font: 400 24px/14px \'Open Sans\', sans-serif;\r\n        padding: 0.5em 0 0.2em;\r\n    }\r\n\r\n    .table-form form input[type=\"text\"] {\r\n        width: 94.8%;\r\n        padding: 10px;\r\n    }\r\n\r\n    .table-form textarea {\r\n        width: 94.5%;\r\n        padding: 10px;\r\n    }\r\n\r\n    .table-form input[type=\"submit\"] {\r\n        padding: 0.6em 1.2em;\r\n    }\r\n\r\n    .menu_box_list li a {\r\n        margin: 0.44em 1.5em;\r\n    }\r\n\r\n    .header {\r\n        padding: 1em 0 0.6em;\r\n    }\r\n\r\n    .menu_box_list ul li {\r\n        display: block;\r\n    }\r\n\r\n    .box {\r\n        top: -12px;\r\n    }\r\n\r\n    .map {\r\n        display: none;\r\n    }\r\n\r\n    .col_1_of_bottom {\r\n        float: none;\r\n        margin: 1% 0 1% 0%;\r\n    }\r\n\r\n    .span_1_of_first1 {\r\n        width: 100%;\r\n    }\r\n\r\n    .single-page, .contact-info {\r\n        margin-top: 9.5em;\r\n        padding: 4% 4% 5% 4%;\r\n    }\r\n\r\n    .span_1_of_first1 h5 {\r\n        font-size: 1em;\r\n    }\r\n}\r\n\r\n/*--//End-media Quries for 480px-monitors-*/\r\n/*--media Quries for 320px-monitors-*/\r\n@media only screen and (max-width: 320px) and (min-width: 240px) {\r\n    .ads-header {\r\n        margin-top: 85px;\r\n    }\r\n    .wrap {\r\n        width: 90%;\r\n    }\r\n\r\n    .footer {\r\n        bottom: 0px;\r\n        right: 0px;\r\n        background-color: transparent;\r\n    }\r\n\r\n    .contact-to input[type=\"text\"] {\r\n        width: 91.5%;\r\n        padding: 9px 10px\r\n    }\r\n\r\n    .contact-to input[type=\"text\"]:nth-child(2), .contact-to input[type=\"text\"]:nth-child(3) {\r\n        margin-left: 0px;\r\n    }\r\n\r\n    .text2 input[type=\"text\"], .text2 textarea {\r\n        width: 91.5%;\r\n        margin-bottom: 16px;\r\n        resize: none;\r\n        -webkit-appearance: none;\r\n    }\r\n\r\n    .text2 textarea {\r\n        height: 100px;\r\n        -webkit-appearance: none;\r\n    }\r\n\r\n    .contact-form input[type=\"submit\"] {\r\n        padding: 0.6em 1.2em;\r\n    }\r\n\r\n    .top-searchbar {\r\n        width: 90%;\r\n        float: none;\r\n        margin: 0;\r\n        clear: both;\r\n    }\r\n\r\n    a.boxclose {\r\n        right: 1em;\r\n        top: 2em;\r\n    }\r\n\r\n    .para1, .para2 {\r\n        display: none;\r\n    }\r\n\r\n    .nav-icon {\r\n        margin: 2.5% 12.8% 0 0%;\r\n        float: right;\r\n    }\r\n\r\n    .artical-content h3 a {\r\n        font: 400 16px/23px \'Open Sans\', sans-serif;\r\n        padding: 0.5em 0 0;\r\n    }\r\n\r\n    .artical-links ul li {\r\n        display: block;\r\n    }\r\n\r\n    .share-artical ul li {\r\n        display: block;\r\n    }\r\n\r\n    .artical-content p:nth-child(1) {\r\n        display: none;\r\n    }\r\n\r\n    .userinfo {\r\n        display: none;\r\n    }\r\n\r\n    .artical-content p {\r\n        font: normal 14px/22px \'Open Sans\', sans-serif, Helvetica, sans-serif;\r\n        padding: 8px 0px;\r\n    }\r\n\r\n    .artical-links {\r\n        float: none;\r\n    }\r\n\r\n    .share-artical {\r\n        float: none;\r\n        margin: 0em 0 0 0;\r\n        padding: 0;\r\n    }\r\n\r\n    .share-artical ul li a, .artical-links ul li a {\r\n        padding-right: 20px;\r\n        padding-left: 0;\r\n    }\r\n\r\n    .grids_of_2 h2 {\r\n        font: 400 26px/28px \'Open Sans\', sans-serif;\r\n        padding: 0.8em 0 0.5em;\r\n    }\r\n\r\n    h4.style1 a {\r\n        font: 400 17px/14px \'Open Sans\', sans-serif;\r\n    }\r\n\r\n    .grids_of_2 h2 {\r\n        font: 400 24px/14px \'Open Sans\', sans-serif;\r\n        padding: 0.5em 0 0.2em;\r\n    }\r\n\r\n    .table-form form input[type=\"text\"] {\r\n        width: 91.8%;\r\n        padding: 10px;\r\n    }\r\n\r\n    .table-form textarea {\r\n        width: 92%;\r\n        padding: 10px;\r\n        height: 100px;\r\n    }\r\n\r\n    .table-form input[type=\"submit\"] {\r\n        padding: 0.6em 1.2em;\r\n    }\r\n\r\n    .menu_box_list li a {\r\n        margin: 0.44em 1.5em;\r\n    }\r\n\r\n    .header {\r\n        padding: 1em 0 0.6em;\r\n    }\r\n\r\n    .menu_box_list ul li {\r\n        display: block;\r\n    }\r\n\r\n    .box {\r\n        top: -12px;\r\n    }\r\n\r\n    .map {\r\n        display: none;\r\n    }\r\n\r\n    .col_1_of_bottom {\r\n        float: none;\r\n        margin: 1% 0 1% 0%;\r\n    }\r\n\r\n    .span_1_of_first1 {\r\n        width: 100%;\r\n    }\r\n\r\n    .single-page, .contact-info {\r\n        margin-top: 9em;\r\n        padding: 4% 4% 5% 4%;\r\n    }\r\n\r\n    .span_1_of_first1 h5 {\r\n        font-size: 1em;\r\n    }\r\n}\r\n\r\n/*--//End-media Quries for 320px-monitors-*/\r\n\r\n/**\r\n * Grid container\r\n */\r\n#main {\r\n    margin-top: 9em;\r\n}\r\n#tiles {\r\n    list-style-type: none;\r\n    position: relative; /** Needed to ensure items are laid out relative to this container **/\r\n    margin: 0;\r\n    padding: 0;\r\n}\r\n#tiles li:hover img{\r\n    opacity:0.8;\r\n}\r\n/**\r\n * Grid items\r\n */\r\n#tiles li {\r\n    width: 280px;\r\n    background-color:#ffffff;\r\n    border: 1px solid #dedede;\r\n    border-radius: 3px;\r\n    -moz-border-radius: 3px;\r\n    -webkit-border-radius: 3px;\r\n    display: none;\r\n    cursor: pointer;\r\n    border-radius: 0.3em;\r\n}\r\n#tiles li img{\r\n    border-top-left-radius:0.3em;\r\n    border-top-right-radius:0.3em;\r\n}\r\n#tiles li.inactive {\r\n    visibility: hidden;\r\n    opacity: 0;\r\n}\r\n\r\n#tiles li img {\r\n    display: block;\r\n}\r\n\r\n/**\r\n * Grid item text\r\n */\r\n\r\nfooter {\r\n    text-align: center;\r\n}\r\n\r\nfooter a {\r\n    color: #435DC5;\r\n    text-decoration: none;\r\n}\r\n\r\n/**\r\n * Progress bar for imagesLoaded\r\n */\r\n.progress-bar {\r\n    background-color: #0BC20B;\r\n    height: 2px;\r\n    position: absolute;\r\n    top: 0;\r\n    left: 0;\r\n    right: 0;\r\n    width: 0;\r\n    box-shadow: 0 1px 3px rgba(11, 194, 11, 0.2);\r\n    -webkit-transition: width 0.3s ease-out;\r\n    -moz-transition: width 0.3s ease-out;\r\n    -o-transition: width 0.3s ease-out;\r\n    transition: width 0.3s ease-out;\r\n}\r\n\r\n/**\r\n * Placerholder css\r\n */\r\n.wookmark-placeholder {\r\n    border-radius: 2px;\r\n    -moz-border-radius: 2px;\r\n    -webkit-border-radius: 2px;\r\n    background-color: #eee;\r\n    border: 1px solid #dedede;\r\n    z-index: -1;\r\n}\r\n\r\n.example-tiles {\r\n    position: relative; /** Needed to ensure items are laid out relative to this container **/\r\n    margin: 0;\r\n    padding: 0;\r\n}\r\n\r\n.example-tiles li {\r\n    display: block;\r\n    list-style-type: none;\r\n    float: left;\r\n    margin: 5px;\r\n    -webkit-transition: all 0.3s ease-out;\r\n    -moz-transition: all 0.3s ease-out;\r\n    -o-transition: all 0.3s ease-out;\r\n    transition: all 0.3s ease-out;\r\n}\r\n\r\n.example-tiles a,\r\n.example-tiles a:hover {\r\n    color: #555;\r\n    background-color: #eee;\r\n    text-align: center;\r\n    display: table-cell;\r\n    vertical-align: middle;\r\n    width: 200px;\r\n    height: 200px;\r\n    font-size: 2em;\r\n    font-weight: bold;\r\n    text-decoration: none;\r\n    border: 1px solid #ddd;\r\n    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.4);\r\n    padding: 5px 8px;\r\n    border-radius: 3px;\r\n}\r\n\r\n.example-tiles a:hover {\r\n    background-color: #ddd;\r\n}\r\n/*--media Quries for 640px-monitors-*/\r\n@media only screen and (max-width:640px) and (min-width:480px) {\r\n    #main {\r\n        margin-top: 7em;\r\n    }\r\n}\r\n/*--media Quries for 480px-monitors-*/\r\n@media only screen and (max-width:480px) and (min-width:320px) {\r\n    #main {\r\n        margin-top: 9.5em;\r\n    }\r\n}\r\n/*--media Quries for 320px-monitors-*/\r\n@media only screen and (max-width:320px) and (min-width:240px) {\r\n    #main {\r\n        margin-top: 9em;\r\n    }\r\n    #tiles li {\r\n        width: 266px;\r\n    }\r\n}'),
(13, 'comments-sitting-1', NULL),
(14, 'auto-approve-article', '1'),
(15, 'ads-article', '<a href=\"http://codecanyon.net/user/phpPowerArts/portfolio?ref=phpPowerArts\" target=\"_blank\">\r\n                <img src=\"https://via.placeholder.com/700x100\" >\r\n            </a>'),
(16, 'infront-article-message', ''),
(17, 'cache-state', NULL),
(18, 'cache-period', '0'),
(19, 'google-login-state', '1'),
(20, 'google-api-key', 'AIzaSyDzHYyzo_MMwVb34wX8t6OnUJg4qCcmcZI'),
(21, 'google-client-id', '172629656440-69656pqish119tcifeh70p5vsg8i54vv.apps.googleusercontent.com'),
(22, 'google-client-secret', 'gCLYdIcDJguK9h612w2yYXlC'),
(23, 'site-watermark-path', 'http://youlevelup.phppowerarts.com/assets/uploads/Youtube-icon13.png'),
(24, 'site-watermark-state', NULL),
(25, 'register-points', '20'),
(26, 'login-points', '5'),
(27, 'add-new-article-points', '10'),
(28, 'earned-views-points', '3'),
(30, 'main-seconds-count-up', '156655'),
(31, 'last-seconds-count-up', '1667308665'),
(32, 'about', '<br/>\r\n<div class=\"popin_about\">\r\n    	<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>    </div>'),
(33, 'contact', '<br/>\r\n<p>Feel free to contact us if you have any question by sending us an email to <b>php.power.arts@gmail.com</b>\r\nor Skype <b>phppowerarts</b>\r\n</p>\r\n<p>We\'ll be very glad to receive your comments and suggestions.</p>'),
(34, 'how-it-works', '<br/><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>'),
(35, 'website-email', ''),
(40, 'paypal-price', '1'),
(41, 'paypal-currency', '$'),
(42, 'paypal-sand-box', '1'),
(43, 'facebook-login-state', NULL),
(44, 'fb-appId', ''),
(45, 'fb-secret', ''),
(46, 'ads-footer', NULL),
(47, 'comments-sitting-1', NULL),
(48, 'site-watermark-state', NULL),
(49, 'cache-state', NULL),
(50, 'facebook-login-state', NULL),
(51, 'ads-footer', NULL),
(52, 'comments-sitting-1', NULL),
(53, 'site-watermark-state', NULL),
(54, 'cache-state', NULL),
(55, 'facebook-login-state', NULL),
(56, 'ads-footer', NULL),
(57, 'comments-sitting-1', NULL),
(58, 'site-watermark-state', NULL),
(59, 'cache-state', NULL),
(60, 'facebook-login-state', NULL),
(61, 'ads-footer', NULL),
(62, 'comments-sitting-1', NULL),
(63, 'site-watermark-state', NULL),
(64, 'cache-state', NULL),
(65, 'facebook-login-state', NULL),
(67, 'referral_awards', '10');

-- --------------------------------------------------------

--
-- Table structure for table `points`
--

DROP TABLE IF EXISTS `points`;
CREATE TABLE `points` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `points` int(11) NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `points`
--

INSERT INTO `points` (`id`, `user_id`, `points`, `last_update`) VALUES
(29, 1, 3290, '2022-10-27 12:08:22'),
(30, 1, 3290, '2022-10-27 12:08:22'),
(31, 14, 242, '2017-11-13 12:26:36'),
(32, 31, 6, '2019-10-20 04:37:32'),
(33, 33, 212, '2022-11-01 13:17:14'),
(34, 34, 20, '0000-00-00 00:00:00'),
(35, 35, 20, '0000-00-00 00:00:00'),
(36, 36, 20, '0000-00-00 00:00:00'),
(37, 37, 20, '0000-00-00 00:00:00'),
(38, 38, 30, '2022-11-01 13:05:05'),
(39, 39, 20, '0000-00-00 00:00:00'),
(40, 40, 20, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `rights`
--

DROP TABLE IF EXISTS `rights`;
CREATE TABLE `rights` (
  `right_id` int(11) NOT NULL,
  `right_name` varchar(100) NOT NULL,
  `right_title` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM AVG_ROW_LENGTH=59 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rights`
--

INSERT INTO `rights` (`right_id`, `right_name`, `right_title`) VALUES
(1, 'manage-all', 'manage all'),
(2, 'manage-one-account', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `status` enum('pending','completed') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `amount`, `status`, `created_at`, `updated_at`) VALUES
(7, 33, 1000, 'pending', '2022-10-30 12:57:00', NULL),
(8, 33, 1000, 'pending', '2022-10-30 12:59:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `currency_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `user_username` varchar(150) NOT NULL COMMENT 'user name',
  `type_id` int(11) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_age` varchar(10) NOT NULL COMMENT 'user age',
  `user_address` varchar(100) NOT NULL COMMENT 'user adress',
  `user_phone` int(11) NOT NULL,
  `user_group_id` int(11) NOT NULL,
  `user_created_date` int(11) NOT NULL,
  `user_ord` int(11) NOT NULL,
  `user_is_online` bit(1) NOT NULL,
  `user_state` varchar(1) NOT NULL,
  `user_last-update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_photo` varchar(200) NOT NULL,
  `paypal_field` varchar(255) NOT NULL,
  `referral_counter` int(11) NOT NULL DEFAULT '0',
  `user_ip` varchar(25) DEFAULT NULL,
  `referral_user_id` int(11) DEFAULT NULL
) ENGINE=MyISAM AVG_ROW_LENGTH=68 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `currency_id`, `language_id`, `country_id`, `user_username`, `type_id`, `user_password`, `user_email`, `user_age`, `user_address`, `user_phone`, `user_group_id`, `user_created_date`, `user_ord`, `user_is_online`, `user_state`, `user_last-update`, `user_photo`, `paypal_field`, `referral_counter`, `user_ip`, `referral_user_id`) VALUES
(1, 0, 0, 0, 'admin', 0, '1d305be29d6202ac45c7186432b70fe1', 'eng.mohamed.php@gmail.com', '', '', 0, 1, 1419078848, 0, b'1', '1', '2022-10-25 17:30:07', '/assets/uploads/if_11_smiley_2659955.png', '', 0, NULL, NULL),
(8, 0, 0, 0, 'user1', 0, 'e10adc3949ba59abbe56e057f20f883e', 'stop1@gmail.com', '', '', 0, 3, 1419002651, 0, b'1', '0', '2014-12-22 11:14:12', '', '', 0, NULL, NULL),
(7, 0, 0, 0, 'user2', 0, 'e10adc3949ba59abbe56e057f20f883e', 'stop@gmail.com', '', '', 0, 3, 1419002291, 0, b'1', '0', '2014-12-22 11:07:55', '', '', 0, NULL, NULL),
(9, 0, 0, 0, 'user4', 0, 'e10adc3949ba59abbe56e057f20f883e', 'eng@gh.com', '', '', 0, 3, 1419002733, 0, b'1', '1', '2014-12-22 10:40:43', '', '', 0, NULL, NULL),
(10, 0, 0, 0, 'user6', 0, 'e10adc3949ba59abbe56e057f20f883e', 'admina@aaa.com', '', '', 0, 3, 1419002884, 0, b'1', '1', '2014-12-22 10:40:43', '', '', 0, NULL, NULL),
(11, 0, 0, 0, 'user7', 0, 'e10adc3949ba59abbe56e057f20f883e', 'admi@bbb.com', '', '', 0, 3, 1419002927, 0, b'1', '1', '2014-12-22 10:40:43', '', '', 0, NULL, NULL),
(12, 0, 0, 0, 'user12', 0, 'e10adc3949ba59abbe56e057f20f883e', 'admin2@gmil.com', '', '', 0, 3, 1419061201, 0, b'1', '1', '2014-12-22 10:40:43', '', '', 0, NULL, NULL),
(13, 0, 0, 0, 'waleed', 0, 'e10adc3949ba59abbe56e057f20f883e', 'eng.mohamed2.php@gmail.com', '', '', 0, 3, 1419245760, 0, b'1', '1', '2014-12-22 11:04:38', 'http://localhost/test-hd/assets/uploads/Capture1.PNG', '', 0, NULL, NULL),
(14, 0, 0, 0, 'demouser', 0, 'e10adc3949ba59abbe56e057f20f883e', 'demo@demo.com', '', '', 0, 3, 1423382364, 0, b'1', '1', '2015-02-10 16:19:17', 'http://hd-images-store.byethost11.com/assets/uploads/Screenshot_2.png', '', 0, NULL, NULL),
(15, 0, 0, 0, 'Balance-ton-Buzz', 0, '', 'balancetonbuzz@gmail.com', '', '', 0, 0, 1423547033, 0, b'1', '', '2015-02-10 05:43:50', 'https://lh6.googleusercontent.com/-lbrpVszAuxQ/AAAAAAAAAAI/AAAAAAAAADQ/uyJGBtLvMno/photo.jpg', '', 0, NULL, NULL),
(16, 0, 0, 0, 'amirhoosein-t', 0, '', 'p30search@gmail.com', '', '', 0, 0, 1423548903, 0, b'1', '', '2015-02-10 06:15:00', 'https://lh5.googleusercontent.com/-lna-fTII0xA/AAAAAAAAAAI/AAAAAAAAAOc/ovM94CQ4fe8/photo.jpg', '', 0, NULL, NULL),
(17, 0, 0, 0, 'ken-zacharias', 0, '', 'obenunten.de@googlemail.com', '', '', 0, 0, 1423550495, 0, b'1', '', '2015-02-10 06:42:21', 'http://hd-images-store.byethost11.com/assets/uploads/580_1000.jpg', '', 0, NULL, NULL),
(18, 0, 0, 0, 'wallpapers', 0, '180eaa6544beb5fa329645416424ba32', 'rosi_styles@hotmail.com', '', '', 0, 3, 1423552240, 0, b'1', '1', '2015-02-10 07:10:37', '', '', 0, NULL, NULL),
(19, 0, 0, 0, 'Thossaporn-Boonyarangkul', 0, '', 'tung@dmc.tv', '', '', 0, 0, 1423553853, 0, b'1', '', '2015-02-10 07:37:30', 'https://lh6.googleusercontent.com/-PWXARRL709o/AAAAAAAAAAI/AAAAAAAACI0/4kX1cNR1aZs/photo.jpg', '', 0, NULL, NULL),
(20, 0, 0, 0, 'mukesh-mishra', 0, '', 'mukeshsense1@gmail.com', '', '', 0, 0, 1423557311, 0, b'1', '', '2015-02-10 08:35:08', 'https://lh6.googleusercontent.com/-jrADVHrqK8Q/AAAAAAAAAAI/AAAAAAAAABI/403b29WXUeU/photo.jpg', '', 0, NULL, NULL),
(21, 0, 0, 0, 'ser', 0, '5ef5b49227eec18d80eb26394d17c35c', 'serhanu@hotmail.com', '', '', 0, 3, 1423563615, 0, b'1', '1', '2015-02-10 10:20:12', '', '', 0, NULL, NULL),
(22, 0, 0, 0, 'ismail', 0, 'f3b32717d5322d7ba7c505c230785468', 'sadas@msn.com', '', '', 0, 3, 1423564382, 0, b'1', '1', '2015-02-10 10:32:58', '', '', 0, NULL, NULL),
(23, 0, 0, 0, 'iso', 0, 'f3b32717d5322d7ba7c505c230785468', 'aaa@msn.com', '', '', 0, 3, 1423564466, 0, b'1', '1', '2015-02-10 10:50:32', 'http://hd-images-store.byethost11.com/assets/uploads/', '', 0, NULL, NULL),
(24, 0, 0, 0, 'testttt', 0, '', 'i.kemelqwerty@gmail.com', '', '', 0, 0, 1423569161, 0, b'1', '', '2015-02-10 11:53:54', 'https://lh4.googleusercontent.com/-IzMjH0jT1gc/AAAAAAAAAAI/AAAAAAAAABE/A430yIs0ahs/photo.jpg', '', 0, NULL, NULL),
(25, 0, 0, 0, 'jofuz', 0, 'f4bc0e4fc90cc55315b3ce1f1a821aa7', 'jofuz@flurred.com', '', '', 0, 3, 1423575715, 0, b'1', '1', '2015-02-10 13:41:52', '', '', 0, NULL, NULL),
(26, 0, 0, 0, 'Jimmy-Cooper-JimmyCooperTV', 0, '', 'mrbloodysh4xxor@gmail.com', '', '', 0, 0, 1423584692, 0, b'1', '', '2015-02-10 16:11:28', 'https://lh5.googleusercontent.com/-M36VmeyNrBI/AAAAAAAAAAI/AAAAAAAAA7w/oVt208I_fIA/photo.jpg', '', 0, NULL, NULL),
(27, 0, 0, 0, 'Gheni-Ablez', 0, '', 'gheniablez@gmail.com', '', '', 0, 0, 1423586794, 0, b'1', '', '2015-02-10 16:46:30', 'https://lh3.googleusercontent.com/-XdUIqdMkCWA/AAAAAAAAAAI/AAAAAAAAAAA/4252rscbv5M/photo.jpg', '', 0, NULL, NULL),
(28, 0, 0, 0, 'Michael-Kuhn', 0, '', 'michi.kuhn1997@gmail.com', '', '', 0, 0, 1423589253, 0, b'1', '', '2015-02-10 17:27:29', 'https://lh5.googleusercontent.com/-uuSxVs59HKA/AAAAAAAAAAI/AAAAAAAAACk/KHXQb-1DByM/photo.jpg', '', 0, NULL, NULL),
(29, 0, 0, 0, 'tester', 0, 'f5d1278e8109edd94e1e4197e04873b9', 'cuvugiow@disposableinbox.com', '', '', 0, 3, 1423590895, 0, b'1', '1', '2015-02-10 17:54:51', '', '', 0, NULL, NULL),
(30, 0, 0, 0, 'Murat-zay', 0, '', 'ozayzmurat@gmail.com', '', '', 0, 0, 1423607726, 0, b'1', '', '2015-02-10 22:35:22', 'https://lh4.googleusercontent.com/-xGQWCw1Y_Lw/AAAAAAAAAAI/AAAAAAAABvk/OLNOhLAHLkY/photo.jpg', '', 0, NULL, NULL),
(31, 0, 0, 0, 'Mohammed-Mahdy', 0, '', 'eng.mohamed.php@gmail.com', '', '', 0, 0, 1571545906, 0, b'0', '', '2019-10-20 04:31:46', 'https://lh3.googleusercontent.com/a-/AAuE7mBCBhoMyvsqH3tZ3YCjGdUupP3MsgIdqA-gY262Ow=s96-c', '', 0, NULL, NULL),
(32, 0, 0, 0, 'Mohammed-Mahdy', 0, '', 'eng.mohamed.php@gmail.com', '', '', 0, 0, 1571546060, 0, b'0', '', '2019-10-20 04:34:20', 'https://lh3.googleusercontent.com/a-/AAuE7mBCBhoMyvsqH3tZ3YCjGdUupP3MsgIdqA-gY262Ow=s96-c', '', 0, NULL, NULL),
(33, 0, 0, 0, 'Abdoahmed11', 0, '25d55ad283aa400af464c76d713c07ad', 'eng.abdelrahman.ahmed11@gmail.com', '', '', 0, 3, 1667120928, 0, b'0', '1', '2022-11-01 13:15:22', '', 'asldkfjsd@dfk.com', 1, NULL, NULL),
(39, 0, 0, 0, 'gajepygop', 0, 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'nojufo@mailinator.com', '', '', 0, 3, 1667307905, 0, b'0', '1', '2022-11-01 13:05:05', '', '', 0, '172.26.0.1', NULL),
(38, 0, 0, 0, 'belamuhup', 0, 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'sihoqi@mailinator.com', '', '', 0, 3, 1667307850, 0, b'0', '1', '2022-11-01 13:05:05', '', '', 1, '172.26.0.1', NULL),
(40, 0, 0, 0, 'mifubidu', 0, 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'hijaryrehy@mailinator.com', '', '', 0, 3, 1667308522, 0, b'0', '1', '2022-11-01 13:15:22', '', '', 0, '172.26.0.1', 33);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `analytics_views`
--
ALTER TABLE `analytics_views`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`ar_id`);

--
-- Indexes for table `articles_comments`
--
ALTER TABLE `articles_comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `articles_likes`
--
ALTER TABLE `articles_likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `articles_top_up`
--
ALTER TABLE `articles_top_up`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `article_views_counter`
--
ALTER TABLE `article_views_counter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`gr_id`);

--
-- Indexes for table `group_rights_bridge`
--
ALTER TABLE `group_rights_bridge`
  ADD PRIMARY KEY (`gr_id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `points`
--
ALTER TABLE `points`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rights`
--
ALTER TABLE `rights`
  ADD PRIMARY KEY (`right_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `analytics_views`
--
ALTER TABLE `analytics_views`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `ar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=218;

--
-- AUTO_INCREMENT for table `articles_comments`
--
ALTER TABLE `articles_comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `articles_likes`
--
ALTER TABLE `articles_likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=372;

--
-- AUTO_INCREMENT for table `articles_top_up`
--
ALTER TABLE `articles_top_up`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `article_views_counter`
--
ALTER TABLE `article_views_counter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'category id', AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `gr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `group_rights_bridge`
--
ALTER TABLE `group_rights_bridge`
  MODIFY `gr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `points`
--
ALTER TABLE `points`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `rights`
--
ALTER TABLE `rights`
  MODIFY `right_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

-- --------------------------------------------------------
-- Marketplace-ready demo refresh
-- --------------------------------------------------------

DROP TABLE IF EXISTS `payments`;
CREATE TABLE `payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `statement` varchar(255) DEFAULT NULL,
  `status` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DELETE FROM `options` WHERE `id` IN (46,47,48,49,50,51,52,53,54,55,56,57,58,59,60,61,62,63,64,65);
UPDATE `options` SET `value` = 'Youtube Coins' WHERE `name` = 'website-name';
UPDATE `options` SET `value` = 'Youtube Coins | Rewarded Video Promotion Platform' WHERE `name` = 'title';
UPDATE `options` SET `value` = 'Launch viral video campaigns, reward real viewers with coins, and let creators cash out performance-driven engagement.' WHERE `name` = 'description';
UPDATE `options` SET `value` = 'rewarded video, viral marketing, video promotion, creator coins, engagement exchange' WHERE `name` = 'keywords';
UPDATE `options` SET `value` = '/assets/uploads/logo112.png' WHERE `name` = 'site-logo';
UPDATE `options` SET `value` = '/assets/themes/default/images/coin.png' WHERE `name` = 'favicon';
UPDATE `options` SET `value` = '<p>Youtube Coins is a turnkey rewarded-view platform for video creators, communities, and growth teams. Members earn coins for watching promoted content, creators spend coins to push their videos into premium placements, and administrators manage campaigns, payouts, and platform economics from a single dashboard.</p>' WHERE `name` = 'about';
UPDATE `options` SET `value` = '<p>Need help with onboarding or custom branding? Email <strong>hello@bakerysoft.net</strong> and our support team will respond within one business day.</p><p>This demo includes creator accounts, payout history, highlighted campaigns, and multilingual content so buyers can evaluate the full user journey immediately.</p>' WHERE `name` = 'contact';
UPDATE `options` SET `value` = '<p>1. Users register and instantly receive starter coins.</p><p>2. They watch promoted videos and earn more coins after each valid view.</p><p>3. Creators spend coins to place their own videos in the Level Up slot and gain more visibility.</p><p>4. Members can request withdrawals, while admins review payment proofs and approve or reject top-ups.</p>' WHERE `name` = 'how-it-works';
UPDATE `options` SET `value` = 'Featured campaign: ' WHERE `name` = 'infront-article-message';
UPDATE `options` SET `value` = '' WHERE `name` = 'recapatcha-api-key';
UPDATE `options` SET `value` = '' WHERE `name` IN ('google-api-key', 'google-client-id', 'google-client-secret', 'fb-appId', 'fb-secret');
UPDATE `options` SET `value` = '' WHERE `name` = 'paypal-email';
UPDATE `options` SET `value` = 'Growth Pack - 100 Coins' WHERE `name` = 'paypal-product-name';
UPDATE `options` SET `value` = '100' WHERE `name` = 'paypal-amount';
UPDATE `options` SET `value` = '$' WHERE `name` = 'paypal-currency';
UPDATE `options` SET `value` = '1' WHERE `name` = 'paypal-price';
UPDATE `options` SET `value` = '1' WHERE `name` = 'paypal-sand-box';
UPDATE `options` SET `value` = '1' WHERE `name` = 'auto-approve-article';
UPDATE `options` SET `value` = '20' WHERE `name` = 'register-points';
UPDATE `options` SET `value` = '5' WHERE `name` = 'login-points';
UPDATE `options` SET `value` = '10' WHERE `name` = 'add-new-article-points';
UPDATE `options` SET `value` = '3' WHERE `name` = 'earned-views-points';
UPDATE `options` SET `value` = '15' WHERE `name` = 'referral_awards';
UPDATE `options` SET `value` = '0' WHERE `name` = 'google-login-state';
UPDATE `options` SET `value` = '0' WHERE `name` = 'facebook-login-state';
UPDATE `options` SET `value` = '' WHERE `name` = 'ads-header';
UPDATE `options` SET `value` = '' WHERE `name` = 'ads-footer';
UPDATE `options` SET `value` = '' WHERE `name` = 'ads-article';
UPDATE `options` SET `value` = 'hello@bakerysoft.net' WHERE `name` = 'website-email';
UPDATE `options` SET `value` = '278640' WHERE `name` = 'main-seconds-count-up';
UPDATE `options` SET `value` = '1774550400' WHERE `name` = 'last-seconds-count-up';

DELETE FROM `analytics_views`;
DELETE FROM `article_views_counter`;
DELETE FROM `articles_comments`;
DELETE FROM `articles_likes`;
DELETE FROM `articles_top_up`;
DELETE FROM `articles`;
DELETE FROM `payments`;
DELETE FROM `transactions`;
DELETE FROM `points`;
DELETE FROM `users` WHERE `user_id` NOT IN (1,33,38,39,40);

UPDATE `users`
SET
  `user_username` = 'admin',
  `user_password` = 'e10adc3949ba59abbe56e057f20f883e',
  `user_email` = 'admin@youtubecoins.demo',
  `user_group_id` = 1,
  `user_state` = '1',
  `user_photo` = '/assets/uploads/if_11_smiley_2659955.png',
  `paypal_field` = 'admin-payments@youtubecoins.demo',
  `referral_counter` = 0,
  `user_ip` = '127.0.0.1',
  `referral_user_id` = NULL
WHERE `user_id` = 1;

UPDATE `users`
SET
  `user_username` = 'democreator',
  `user_password` = 'e10adc3949ba59abbe56e057f20f883e',
  `user_email` = 'demo@youtubecoins.demo',
  `user_group_id` = 3,
  `user_state` = '1',
  `user_photo` = '/assets/uploads/if_11_smiley_2659955.png',
  `paypal_field` = 'creator@youtubecoins.demo',
  `referral_counter` = 4,
  `user_ip` = '10.0.0.33',
  `referral_user_id` = 1
WHERE `user_id` = 33;

UPDATE `users`
SET
  `user_username` = 'brandpilot',
  `user_password` = 'e10adc3949ba59abbe56e057f20f883e',
  `user_email` = 'brand@youtubecoins.demo',
  `user_group_id` = 3,
  `user_state` = '1',
  `user_photo` = '/assets/uploads/if_11_smiley_2659955.png',
  `paypal_field` = 'brand@youtubecoins.demo',
  `referral_counter` = 1,
  `user_ip` = '10.0.0.38',
  `referral_user_id` = 33
WHERE `user_id` = 38;

UPDATE `users`
SET
  `user_username` = 'socialspark',
  `user_password` = 'e10adc3949ba59abbe56e057f20f883e',
  `user_email` = 'social@youtubecoins.demo',
  `user_group_id` = 3,
  `user_state` = '1',
  `user_photo` = '/assets/uploads/if_11_smiley_2659955.png',
  `paypal_field` = 'social@youtubecoins.demo',
  `referral_counter` = 2,
  `user_ip` = '10.0.0.39',
  `referral_user_id` = 33
WHERE `user_id` = 39;

UPDATE `users`
SET
  `user_username` = 'arabicstudio',
  `user_password` = 'e10adc3949ba59abbe56e057f20f883e',
  `user_email` = 'arabic@youtubecoins.demo',
  `user_group_id` = 3,
  `user_state` = '1',
  `user_photo` = '/assets/uploads/if_11_smiley_2659955.png',
  `paypal_field` = 'arabic@youtubecoins.demo',
  `referral_counter` = 0,
  `user_ip` = '10.0.0.40',
  `referral_user_id` = 1
WHERE `user_id` = 40;

INSERT INTO `users` (`user_id`, `currency_id`, `language_id`, `country_id`, `user_username`, `type_id`, `user_password`, `user_email`, `user_age`, `user_address`, `user_phone`, `user_group_id`, `user_created_date`, `user_ord`, `user_is_online`, `user_state`, `user_last-update`, `user_photo`, `paypal_field`, `referral_counter`, `user_ip`, `referral_user_id`) VALUES
(41, 0, 0, 0, 'insightloop', 0, 'e10adc3949ba59abbe56e057f20f883e', 'insight@youtubecoins.demo', '', '', 0, 3, 1773950400, 0, b'0', '1', '2026-03-20 09:15:00', '/assets/uploads/if_11_smiley_2659955.png', 'insight@youtubecoins.demo', 1, '10.0.0.41', 33),
(42, 0, 0, 0, 'streamforge', 0, 'e10adc3949ba59abbe56e057f20f883e', 'stream@youtubecoins.demo', '', '', 0, 3, 1774036800, 0, b'0', '1', '2026-03-21 11:30:00', '/assets/uploads/if_11_smiley_2659955.png', 'stream@youtubecoins.demo', 0, '10.0.0.42', 38);

INSERT INTO `points` (`id`, `user_id`, `points`, `last_update`) VALUES
(101, 1, 9500, '2026-03-26 09:00:00'),
(102, 33, 1840, '2026-03-26 14:22:00'),
(103, 38, 1260, '2026-03-26 12:10:00'),
(104, 39, 740, '2026-03-26 10:35:00'),
(105, 40, 980, '2026-03-26 08:50:00'),
(106, 41, 620, '2026-03-25 18:05:00'),
(107, 42, 410, '2026-03-24 16:40:00');

INSERT INTO `articles` (`ar_id`, `ar_author`, `ar_title`, `ar_slug`, `ar_user_id`, `ar_first`, `ar_main_thumb`, `ar_main_photo`, `ar_introduction`, `ar_video`, `ar_tags`, `ar_last_update`, `ar_created_date`, `ar_state`, `ar_ord`, `bridge_category_id`, `ar_active`, `ar_pages_counter`, `ar_file_path`, `ar_likes`) VALUES
(301, 'democreator', 'Cinematic Cairo Rooftops at Sunrise', 'Cinematic-Cairo-Rooftops-at-Sunrise', 33, 1, 'https://i.ytimg.com/vi/Bey4XXJAqS8/hqdefault.jpg', 'https://i.ytimg.com/vi/Bey4XXJAqS8/hqdefault.jpg', 'A polished lifestyle short designed to showcase how creators can buy premium placement and turn attention into measurable traffic.', '<iframe width=\"480\" height=\"270\" src=\"https://www.youtube.com/embed/Bey4XXJAqS8?feature=oembed&autoplay=1\" frameborder=\"0\" allowfullscreen></iframe>', 'travel, lifestyle, cairo', '2026-03-26 09:00:00', 1774506000, 1, 8, 40, 1, 412, '', 19),
(302, 'brandpilot', 'Product Teaser: Smart Desk Setup in 60 Seconds', 'Product-Teaser-Smart-Desk-Setup-in-60-Seconds', 38, 0, 'https://i.ytimg.com/vi/mkggXE5e2yk/hqdefault.jpg', 'https://i.ytimg.com/vi/mkggXE5e2yk/hqdefault.jpg', 'A short-form product launch creative with strong thumbnails and a concise CTA, ideal for paid promotion experiments.', '<iframe width=\"480\" height=\"270\" src=\"https://www.youtube.com/embed/mkggXE5e2yk?feature=oembed&autoplay=1\" frameborder=\"0\" allowfullscreen></iframe>', 'tech, startup, teaser', '2026-03-26 08:30:00', 1774502400, 1, 7, 40, 1, 298, '', 14),
(303, 'socialspark', 'How to Turn a Simple Reel into a Viral Story Arc', 'How-to-Turn-a-Simple-Reel-into-a-Viral-Story-Arc', 39, 0, 'https://i.ytimg.com/vi/DK1EGe68PvA/hqdefault.jpg', 'https://i.ytimg.com/vi/DK1EGe68PvA/hqdefault.jpg', 'A creator-education clip that demonstrates how knowledge content also performs well inside a rewarded-view marketplace.', '<iframe width=\"480\" height=\"270\" src=\"https://www.youtube.com/embed/DK1EGe68PvA?feature=oembed&autoplay=1\" frameborder=\"0\" allowfullscreen></iframe>', 'education, creators, strategy', '2026-03-26 08:00:00', 1774498800, 1, 6, 40, 1, 221, '', 11),
(304, 'arabicstudio', 'مراجعة سريعة: أفضل إعدادات التصوير للمحتوى القصير', 'مراجعة-سريعة-أفضل-إعدادات-التصوير-للمحتوى-القصير', 40, 0, 'https://i.ytimg.com/vi/3TakwdJH_5E/hqdefault.jpg', 'https://i.ytimg.com/vi/3TakwdJH_5E/hqdefault.jpg', 'Arabic creator content that proves the script can support multilingual communities and region-focused campaigns.', '<iframe width=\"480\" height=\"270\" src=\"https://www.youtube.com/embed/3TakwdJH_5E?feature=oembed&autoplay=1\" frameborder=\"0\" allowfullscreen></iframe>', 'arabic, creator, tutorial', '2026-03-25 17:45:00', 1774412700, 1, 5, 56, 1, 186, '', 9),
(305, 'insightloop', 'Travel B-Roll Workflow for Solo Creators', 'Travel-B-Roll-Workflow-for-Solo-Creators', 41, 0, 'https://i.ytimg.com/vi/tO01J-M3g0U/hqdefault.jpg', 'https://i.ytimg.com/vi/tO01J-M3g0U/hqdefault.jpg', 'An evergreen tutorial campaign positioned to attract creators looking for repeatable production systems.', '<iframe width=\"480\" height=\"270\" src=\"https://www.youtube.com/embed/tO01J-M3g0U?feature=oembed&autoplay=1\" frameborder=\"0\" allowfullscreen></iframe>', 'travel, workflow, creator', '2026-03-25 14:10:00', 1774399800, 1, 4, 40, 1, 173, '', 8),
(306, 'streamforge', 'Behind the Scenes of a Launch-Day Creator Campaign', 'Behind-the-Scenes-of-a-Launch-Day-Creator-Campaign', 42, 0, 'https://i.ytimg.com/vi/G4t6TqG5LM8/hqdefault.jpg', 'https://i.ytimg.com/vi/G4t6TqG5LM8/hqdefault.jpg', 'A campaign diary entry that highlights the platform from the marketer perspective: views, boosts, and payout readiness.', '<iframe width=\"480\" height=\"270\" src=\"https://www.youtube.com/embed/G4t6TqG5LM8?feature=oembed&autoplay=1\" frameborder=\"0\" allowfullscreen></iframe>', 'marketing, campaign, behind-the-scenes', '2026-03-25 12:00:00', 1774392000, 1, 3, 40, 1, 142, '', 6),
(307, 'democreator', 'Weekend Food Vlog: Street Flavors in Downtown', 'Weekend-Food-Vlog-Street-Flavors-in-Downtown', 33, 0, 'https://i.ytimg.com/vi/0C7WhiWplEs/hqdefault.jpg', 'https://i.ytimg.com/vi/0C7WhiWplEs/hqdefault.jpg', 'Lifestyle footage with broad appeal, included so buyers can imagine restaurant, travel, and local discovery use cases.', '<iframe width=\"480\" height=\"270\" src=\"https://www.youtube.com/embed/0C7WhiWplEs?feature=oembed&autoplay=1\" frameborder=\"0\" allowfullscreen></iframe>', 'food, vlog, lifestyle', '2026-03-24 18:30:00', 1774338600, 1, 2, 40, 1, 131, '', 5),
(308, 'brandpilot', 'Micro Brand Storytelling for Ecommerce Shorts', 'Micro-Brand-Storytelling-for-Ecommerce-Shorts', 38, 0, 'https://i.ytimg.com/vi/W7uyDjwAsU8/hqdefault.jpg', 'https://i.ytimg.com/vi/W7uyDjwAsU8/hqdefault.jpg', 'An ecommerce-focused video that rounds out the demo with a business use case beyond creators and influencers.', '<iframe width=\"480\" height=\"270\" src=\"https://www.youtube.com/embed/W7uyDjwAsU8?feature=oembed&autoplay=1\" frameborder=\"0\" allowfullscreen></iframe>', 'ecommerce, storytelling, ads', '2026-03-24 11:15:00', 1774312500, 1, 1, 40, 1, 118, '', 4);

INSERT INTO `articles_top_up` (`id`, `ar_id`, `current_balance`, `first_balance`, `created_at`, `ar_views_counter`) VALUES
(101, 301, 72, 100, '2026-03-26 09:05:00', 14),
(102, 302, 48, 80, '2026-03-26 08:40:00', 11),
(103, 304, 35, 60, '2026-03-25 17:50:00', 8),
(104, 308, 19, 40, '2026-03-24 11:20:00', 6);

INSERT INTO `article_views_counter` (`id`, `article_id`, `user_id`, `created_at`) VALUES
(101, 301, 38, '2026-03-26 09:12:00'),
(102, 301, 39, '2026-03-26 09:14:00'),
(103, 302, 33, '2026-03-26 08:55:00'),
(104, 303, 41, '2026-03-26 08:20:00'),
(105, 304, 33, '2026-03-25 18:00:00'),
(106, 305, 42, '2026-03-25 14:22:00'),
(107, 306, 39, '2026-03-25 12:25:00'),
(108, 307, 40, '2026-03-24 18:50:00');

INSERT INTO `articles_comments` (`comment_id`, `comment_content`, `bridge_user_id`, `comment_created_date`, `bridge_ar_id`, `comment_state`, `comment_correct`) VALUES
(101, 'Strong thumbnail and a very clear hook. This is exactly the kind of video I would promote first.', 38, 1774507500, 301, 1, 1),
(102, 'The pacing here is great. It feels like a real product teaser rather than filler demo content.', 39, 1774504200, 302, 1, 0),
(103, 'جميل جدا، المحتوى واضح وسهل الفهم ويعطي فكرة ممتازة عن المنصة.', 40, 1774414200, 304, 1, 1),
(104, 'Would love to see this creator run a larger 500-coin campaign next.', 41, 1774395600, 306, 1, 0);

INSERT INTO `articles_likes` (`id`, `user_id`, `ar_id`, `created_date`) VALUES
(1001, 33, 302, '1774504200'),
(1002, 38, 301, '1774507800'),
(1003, 39, 301, '1774507860'),
(1004, 40, 304, '1774414380'),
(1005, 41, 303, '1774499400'),
(1006, 42, 305, '1774400400'),
(1007, 39, 306, '1774393500'),
(1008, 33, 307, '1774339800'),
(1009, 38, 308, '1774314000');

INSERT INTO `analytics_views` (`id`, `ip`, `url`, `created_date`) VALUES
(101, '33', '301', '1774507500'),
(102, '38', '301', '1774507800'),
(103, '39', '302', '1774504200'),
(104, '40', '304', '1774414380'),
(105, '41', '303', '1774499400'),
(106, '42', '305', '1774400400');

INSERT INTO `transactions` (`id`, `user_id`, `amount`, `status`, `created_at`, `updated_at`) VALUES
(101, 33, 450, 'completed', '2026-03-18 09:20:00', '2026-03-18 10:05:00'),
(102, 33, 300, 'pending', '2026-03-26 16:10:00', NULL),
(103, 38, 650, 'completed', '2026-03-17 13:15:00', '2026-03-17 14:00:00'),
(104, 39, 220, 'completed', '2026-03-14 11:45:00', '2026-03-14 12:10:00'),
(105, 40, 180, 'pending', '2026-03-24 08:50:00', NULL),
(106, 41, 120, 'completed', '2026-03-13 17:30:00', '2026-03-13 18:00:00');

INSERT INTO `payments` (`id`, `user_id`, `amount`, `statement`, `status`, `created_at`, `updated_at`) VALUES
(101, 33, 25.00, '/assets/uploads/logo111.png', 'approved', '2026-03-18 09:00:00', '2026-03-18 10:05:00'),
(102, 40, 15.00, '/assets/uploads/logo112.png', 'pending', '2026-03-24 08:10:00', NULL),
(103, 41, 10.00, '/assets/uploads/logo11.png', 'rejected', '2026-03-12 15:40:00', '2026-03-12 16:00:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
