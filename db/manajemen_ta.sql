-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2020 at 03:13 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manajemen_ta`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `bimbingan`
--

CREATE TABLE `bimbingan` (
  `id_bimbingan` int(11) NOT NULL,
  `nim` varchar(12) NOT NULL,
  `niy` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `nidn` varchar(20) NOT NULL,
  `nama_dosen` char(60) NOT NULL,
  `jabfung` char(2) NOT NULL,
  `email` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`nidn`, `nama_dosen`, `jabfung`, `email`) VALUES
('0006027001', 'Eko Aribowo, S.T., M.Kom.', 'LK', NULL),
('0014107301', 'Ali Tarmuji, S.T., M. Cs.', 'AA', NULL),
('0015118001', 'Fiftin Noviyanto, S.T., M.Cs.', 'L', NULL),
('0019087601', 'Nur Rochmah Dyah Pujiastuti, S.T, M.Kom.', 'L', NULL),
('0020077901', 'Bambang Robi\'in, S.T.,M.T.', 'SP', NULL),
('0407016801', 'Drs. Tedy Setiadi, M.T.', 'L', 'astolvosilv@gmail.com'),
('0504088601', 'Dwi Normawati, S.T., M.Eng.', 'SP', NULL),
('0504116601', 'Drs. Wahyu Pujiono, M.Kom', 'LK', NULL),
('0505038301', 'Andri Pranolo, S.Kom., M. Cs.', 'AA', NULL),
('0505118901', 'Ahmad Azhari, S.Kom., M.Eng.', 'AA', NULL),
('0506016701', 'Mushlihudin, S.T., M.T.', 'AA', NULL),
('0507087202', 'Rusydi Umar, S.T., M.T., Ph.D.', 'L', NULL),
('0509038402', 'Guntur Maulana Zamroni, B.Sc., M.Kom.', 'SP', NULL),
('0509048901', 'Nuril Anwar, S.T.,M.Kom.', 'AA', NULL),
('0510076701', 'Dr. Abdul Fadlil, M.T.', 'L', NULL),
('0510077302', 'Murinto, S.Si., M.Kom.', 'L', 'dzitnirobi@gmail.com'),
('0510088001', 'Dr. Imam Riyadi, M.Kom.', 'L', NULL),
('0511037401', 'Mursid WH, S.Si., M.Kom.', 'L', NULL),
('0511098401', 'Lisna Zahrotun, S.T., M.Cs.', 'AA', NULL),
('0512078304', 'Herman Yuilansyah, S.T., M.Eng.', 'L', NULL),
('0515058802', 'Fitri Indra Indikawati, S.Kom, M.Eng', 'SP', NULL),
('0516127501', 'Sri Winiarti, S.T., M.Cs.', 'AA', NULL),
('0519108901', 'Murein Miksa Mardhia, S.T., M.T.', 'AA', NULL),
('0520046901', 'Kartika Firdausy, S.T., M.T.', 'L', NULL),
('0520098702', 'Ika Arfiani, S.T., M.Cs.', 'SP', NULL),
('0521127303', 'Taufiq Ismail, S.T., M.Cs.', 'AA', NULL),
('0521128502', 'Dewi Pramudi Ismi, S.T., M.CompSc', 'AA', NULL),
('0522018302', 'Anna Hendri Soleliza Jones, S. Kom, M.Cs.', 'AA', NULL),
('0523068801', 'Supriyanto, S.T., M.T.', 'AA', 'selierybdo@gmail.com'),
('0523077902', 'Ardiansyah, S.T., M.Cs.', 'L', 'hayabushatry@gmail.com'),
('0524047701', 'Yana Hendriana, S.T., M.Eng.', 'SP', NULL),
('0524118801', 'Adhi Prahara, S.Si., M.Cs.', 'AA', NULL),
('0526018502', 'Arfiani Nur Khusna, S.T., M.Kom.', 'AA', NULL),
('0528058401', 'Jefree Fahana, ST., M.Kom.', 'SP', NULL),
('0529056601', 'Ir. Ardi Pujiyanta, M.T.', 'AA', 'luthfiantoro1@gmail.com'),
('0530077601', 'Dewi Soyusiawati, S.T., M.T.', 'AA', NULL),
('0530077701', 'Sri Handayaningsih, S.T., M.T.', 'AA', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_dosen`
--

CREATE TABLE `jadwal_dosen` (
  `id` int(11) NOT NULL,
  `hari` varchar(10) NOT NULL,
  `dosen` varchar(15) NOT NULL,
  `jam_mulai` varchar(6) NOT NULL,
  `jam_selesai` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal_dosen`
--

INSERT INTO `jadwal_dosen` (`id`, `hari`, `dosen`, `jam_mulai`, `jam_selesai`) VALUES
(1, 'Senin', '0522018302', '07.00', '10.25'),
(2, 'Senin', '0521128502', '08.45', '10.25'),
(3, 'Senin', '0521127303', '09.35', '14.10'),
(4, 'Senin', '0530077601', '10.30', '12.10'),
(5, 'Senin', '0530077601', '14.15', '16.05'),
(6, 'Senin', '0506016701', '14.15', '17.50'),
(7, 'Selasa', '0521127303', '08.45', '10.25'),
(8, 'Selasa', '0520098702', '08.45', '12.10'),
(9, 'Selasa', '0516127501', '08.45', '12.10'),
(10, 'Selasa', '0505118901', '09.35', '14.10'),
(11, 'Selasa', '0505118901', '16.10', '17.50'),
(12, 'Selasa', '0504088601', '10.30', '12.10'),
(13, 'Selasa', '0522018302', '12.30', '15.05'),
(14, 'Selasa', '0519108901', '15.15', '17.50'),
(15, 'Selasa', '0524118801', '15.15', '17.50'),
(16, 'Rabu', '0504116601', '07.00', '09.35'),
(17, 'Rabu', '0521128502', '07.00', '12.10'),
(18, 'Rabu', '0523332333', '10.30', '12.10'),
(19, 'Rabu', '0530077601', '10.30', '12.10'),
(20, 'Rabu', '0526018502', '12.30', '16.05'),
(21, 'Rabu', '0520098702', '12.30', '16.05'),
(22, 'Rabu', '0511098401', '12.30', '17.50'),
(23, 'Rabu', '0528123222', '12.30', '17.50'),
(24, 'Rabu', '0516127501', '12.30', '14.10'),
(25, 'Rabu', '0524118801', '15.15', '20.10'),
(26, 'Kamis', '0504116601', '07.00', '09.35'),
(27, 'Kamis', '0521128502', '07.00', '12.10'),
(28, 'Kamis', '0521128502', '15.15', '17.50'),
(29, 'Kamis', '0019087601', '07.00', '08.40'),
(30, 'Kamis', '0516127501', '07.00', '10.25'),
(31, 'Kamis', '0511098401', '08.45', '12.10'),
(32, 'Kamis', '0522018302', '08.45', '10.25'),
(33, 'Kamis', '0523332333', '08.45', '10.25'),
(34, 'Kamis', '0526018502', '08.45', '10.25'),
(35, 'Kamis', '0526018502', '16.10', '17.50'),
(36, 'Kamis', '0519108901', '09.35', '12.10'),
(37, 'Kamis', '0523068801', '12.30', '14.10'),
(38, 'Kamis', '0526112312', '12.30', '15.05'),
(39, 'Kamis', '0521127303', '12.30', '15.05'),
(40, 'Kamis', '0528058401', '12.30', '16.05'),
(41, 'Kamis', '0530077601', '12.30', '14.10'),
(42, 'Kamis', '0524118801', '15.15', '20.10'),
(43, 'Kamis', '0506016701', '15.15', '17.50'),
(44, 'Kamis', '0507087202', '15.15', '17.00'),
(45, 'Kamis', '0509048901', '16.10', '20.10'),
(46, 'Kamis', '0528123222', '18.30', '20.10'),
(47, 'Jum\'at', '0510088001', '07.00', '09.35'),
(48, 'Jum\'at', '0523332333', '07.00', '08.40'),
(49, 'Jum\'at', '0521127303', '07.00', '08.40'),
(50, 'Jum\'at', '407016801', '07.00', '08.40'),
(51, 'Jum\'at', '0019087601', '07.00', '08.40'),
(52, 'Jum\'at', '0019087601', '12.30', '14.10'),
(53, 'Jum\'at', '0516127501', '07.00', '08.40'),
(54, 'Jum\'at', '0507087202', '12.30', '15.05'),
(55, 'Jum\'at', '0510077302', '12.30', '14.10'),
(56, 'Jum\'at', '0014107301', '12.30', '17.50'),
(57, 'Jum\'at', '0528058401', '12.30', '17.50'),
(58, 'Jum\'at', '0519108901', '12.30', '14.10'),
(59, 'Jum\'at', '0519108901', '16.10', '17.50'),
(60, 'Jum\'at', '0509048901', '13.20', '20.10'),
(61, 'Jum\'at', '0526018502', '14.15', '17.50'),
(62, 'Jum\'at', '0523068801', '15.15', '17.50'),
(63, 'Sabtu', '0504116601', '07.00', '09.35'),
(64, 'Sabtu', '0511098401', '07.00', '09.35'),
(65, 'Sabtu', '0407016801', '07.00', '10.25'),
(66, 'Sabtu', '0504088601', '07.00', '10.25'),
(67, 'Sabtu', '0520098702', '07.00', '08.40'),
(68, 'Sabtu', '0509048901', '09.35', '11.20'),
(69, 'Sabtu', '0509048901', '15.15', '17.50'),
(70, 'Sabtu', '0014107301', '10.30', '14.10'),
(71, 'Sabtu', '0510077302', '10.30', '12.10'),
(72, 'Sabtu', '0523077902', '12.30', '17.50'),
(73, 'Sabtu', '0523068801', '12.30', '14.10'),
(74, 'Sabtu', '0524118801', '15.15', '17.50'),
(75, 'Sabtu', '0506016701', '15.15', '17.50'),
(76, 'Sabtu', '0528058401', '15.15', '17.50');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_dosen1`
--

CREATE TABLE `jadwal_dosen1` (
  `id` int(11) NOT NULL,
  `hari` varchar(12) NOT NULL,
  `dosen` varchar(12) NOT NULL,
  `jam_mulai` varchar(12) NOT NULL,
  `jam_selesai` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal_dosen1`
--

INSERT INTO `jadwal_dosen1` (`id`, `hari`, `dosen`, `jam_mulai`, `jam_selesai`) VALUES
(22, 'senin', '0510077302', '08.45', '09.35'),
(23, 'senin', '0510077302', '09.35', '10.25'),
(24, 'senin', '0510077302', '10.30', '11.20'),
(25, 'senin', '0510077302', '11.20', '12.10'),
(26, 'senin', '0510077302', '16.10', '17.00'),
(27, 'senin', '0510077302', '17.00', '17.50'),
(28, 'jumat', '0510077302', '15.15', '16.05'),
(29, 'jumat', '0510077302', '16.10', '17.00'),
(30, 'jumat', '0510077302', '17.00', '17.50'),
(246, 'selasa', '0523077902', '07.00', '07.50'),
(247, 'selasa', '0523077902', '07.50', '08.40'),
(248, 'selasa', '0523077902', '08.45', '09.35'),
(249, 'selasa', '0523077902', '12.30', '13.20'),
(250, 'selasa', '0523077902', '13.20', '14.10'),
(251, 'selasa', '0523077902', '14.15', '15.05'),
(252, 'kamis', '0523077902', '07.00', '07.50'),
(253, 'kamis', '0523077902', '07.50', '08.40'),
(254, 'kamis', '0523077902', '08.45', '09.35'),
(297, 'senin', '0014107301', '07.00', '07.50'),
(298, 'senin', '0014107301', '07.50', '08.40'),
(299, 'senin', '0014107301', '08.45', '09.35'),
(300, 'senin', '0014107301', '12.30', '13.20'),
(301, 'senin', '0014107301', '13.20', '14.10'),
(302, 'selasa', '0014107301', '14.15', '15.05'),
(303, 'selasa', '0014107301', '15.15', '16.05'),
(304, 'rabu', '0014107301', '10.30', '11.20'),
(305, 'rabu', '0014107301', '11.20', '12.10'),
(306, 'rabu', '0014107301', '12.30', '13.20'),
(307, 'rabu', '0014107301', '13.20', '14.10'),
(308, 'sabtu', '0014107301', '09.35', '10.25'),
(309, 'sabtu', '0014107301', '10.30', '11.20'),
(310, 'sabtu', '0014107301', '11.20', '12.10'),
(311, 'sabtu', '0014107301', '12.30', '13.20'),
(312, 'sabtu', '0014107301', '13.20', '14.10'),
(313, 'sabtu', '0014107301', '14.15', '15.05'),
(314, 'senin', '0019087601', '08.45', '09.35'),
(315, 'senin', '0019087601', '09.35', '10.25'),
(316, 'selasa', '0019087601', '12.30', '13.20'),
(317, 'selasa', '0019087601', '13.20', '14.10'),
(318, 'kamis', '0019087601', '07.00', '07.50'),
(319, 'kamis', '0019087601', '07.50', '08.40'),
(320, 'kamis', '0019087601', '14.15', '15.05'),
(321, 'kamis', '0019087601', '15.15', '16.05'),
(322, 'sabtu', '0019087601', '08.45', '09.35'),
(323, 'sabtu', '0019087601', '09.35', '10.25'),
(324, 'senin', '0020077901', '14.15', '15.05'),
(325, 'senin', '0020077901', '15.15', '16.05'),
(326, 'senin', '0020077901', '16.10', '17.00'),
(327, 'senin', '0020077901', '17.00', '17.50'),
(328, 'selasa', '0020077901', '12.30', '13.20'),
(329, 'selasa', '0020077901', '13.20', '14.10'),
(330, 'selasa', '0020077901', '14.15', '15.05'),
(331, 'rabu', '0020077901', '14.15', '15.05'),
(332, 'rabu', '0020077901', '15.15', '16.05'),
(333, 'rabu', '0020077901', '16.10', '17.00'),
(334, 'rabu', '0020077901', '17.00', '17.50'),
(335, 'jumat', '0020077901', '08.45', '09.35'),
(336, 'jumat', '0020077901', '09.35', '10.25'),
(337, 'jumat', '0020077901', '10.30', '11.20'),
(338, 'jumat', '0020077901', '12.30', '13.20'),
(339, 'jumat', '0020077901', '13.20', '14.10'),
(340, 'jumat', '0020077901', '14.15', '15.05'),
(341, 'jumat', '0020077901', '16.10', '17.00'),
(342, 'jumat', '0020077901', '17.00', '17.50'),
(343, 'senin', '0504088601', '10.30', '11.20'),
(344, 'senin', '0504088601', '11.20', '12.10'),
(345, 'selasa', '0504088601', '08.45', '09.35'),
(346, 'selasa', '0504088601', '09.35', '10.25'),
(347, 'selasa', '0504088601', '12.30', '13.20'),
(348, 'selasa', '0504088601', '13.20', '14.10'),
(349, 'rabu', '0504088601', '10.30', '11.20'),
(350, 'rabu', '0504088601', '11.20', '12.10'),
(351, 'rabu', '0504088601', '12.30', '13.20'),
(352, 'rabu', '0504088601', '13.20', '14.10'),
(353, 'kamis', '0504088601', '07.00', '07.50'),
(354, 'kamis', '0504088601', '07.50', '08.40'),
(355, 'senin', '0504116601', '07.00', '07.50'),
(356, 'senin', '0504116601', '07.50', '08.40'),
(357, 'senin', '0504116601', '08.45', '09.35'),
(358, 'senin', '0504116601', '09.35', '10.25'),
(359, 'senin', '0504116601', '12.30', '13.20'),
(360, 'senin', '0504116601', '13.20', '14.10'),
(361, 'senin', '0504116601', '14.15', '15.05'),
(362, 'selasa', '0504116601', '07.00', '07.50'),
(363, 'selasa', '0504116601', '07.50', '08.40'),
(364, 'selasa', '0504116601', '08.45', '09.35'),
(365, 'rabu', '0504116601', '07.00', '07.50'),
(366, 'rabu', '0504116601', '07.50', '08.40'),
(367, 'rabu', '0504116601', '08.45', '09.35'),
(368, 'kamis', '0504116601', '07.00', '07.50'),
(369, 'kamis', '0504116601', '07.50', '08.40'),
(370, 'kamis', '0504116601', '08.45', '09.35'),
(371, 'kamis', '0504116601', '10.30', '11.20'),
(372, 'kamis', '0504116601', '11.20', '12.10'),
(373, 'jumat', '0504116601', '08.45', '09.35'),
(374, 'jumat', '0504116601', '09.35', '10.25'),
(375, 'jumat', '0504116601', '10.30', '11.20'),
(376, 'jumat', '0504116601', '12.30', '13.20'),
(377, 'jumat', '0504116601', '13.20', '14.10'),
(378, 'senin', '0505118901', '16.10', '17.00'),
(379, 'senin', '0505118901', '17.00', '17.50'),
(380, 'selasa', '0505118901', '16.10', '17.00'),
(381, 'selasa', '0505118901', '17.00', '17.50'),
(382, 'rabu', '0505118901', '10.30', '11.20'),
(383, 'rabu', '0505118901', '11.20', '12.10'),
(384, 'rabu', '0505118901', '12.30', '13.20'),
(385, 'rabu', '0505118901', '13.20', '14.10'),
(386, 'senin', '0506016701', '10.30', '11.20'),
(387, 'senin', '0506016701', '11.20', '12.10'),
(388, 'selasa', '0506016701', '14.15', '15.05'),
(389, 'selasa', '0506016701', '15.15', '16.05'),
(390, 'rabu', '0506016701', '16.10', '17.00'),
(391, 'rabu', '0506016701', '17.00', '17.50'),
(392, 'kamis', '0506016701', '15.15', '16.05'),
(393, 'kamis', '0506016701', '16.10', '17.00'),
(394, 'kamis', '0506016701', '17.00', '17.50'),
(395, 'jumat', '0506016701', '08.45', '09.35'),
(396, 'jumat', '0506016701', '09.35', '10.25'),
(397, 'jumat', '0506016701', '10.30', '11.20'),
(398, 'sabtu', '0506016701', '15.15', '16.05'),
(399, 'sabtu', '0506016701', '16.10', '17.00'),
(400, 'sabtu', '0506016701', '17.00', '17.50'),
(401, 'kamis', '0507087202', '12.30', '13.20'),
(402, 'kamis', '0507087202', '13.20', '14.10'),
(403, 'jumat', '0507087202', '08.45', '09.35'),
(404, 'jumat', '0507087202', '09.35', '10.25'),
(405, 'jumat', '0507087202', '10.30', '11.20'),
(406, 'jumat', '0507087202', '12.30', '13.20'),
(407, 'jumat', '0507087202', '13.20', '14.10'),
(408, 'jumat', '0507087202', '14.15', '15.05'),
(409, 'jumat', '0507087202', '15.15', '16.05'),
(410, 'jumat', '0507087202', '16.10', '17.00'),
(411, 'jumat', '0507087202', '17.00', '17.50'),
(412, 'senin', '0509038402', '09.35', '10.25'),
(413, 'senin', '0509038402', '10.30', '11.20'),
(414, 'senin', '0509038402', '11.20', '12.10'),
(415, 'selasa', '0509038402', '15.15', '16.05'),
(416, 'selasa', '0509038402', '16.10', '17.00'),
(417, 'selasa', '0509038402', '17.00', '17.50'),
(418, 'kamis', '0509038402', '15.15', '16.05'),
(419, 'kamis', '0509038402', '16.10', '17.00'),
(420, 'kamis', '0509038402', '17.00', '17.50'),
(421, 'jumat', '0509038402', '12.30', '13.20'),
(422, 'jumat', '0509038402', '13.20', '14.10'),
(423, 'jumat', '0509038402', '15.15', '16.05'),
(424, 'jumat', '0509038402', '16.10', '17.00'),
(425, 'jumat', '0509038402', '17.00', '17.50'),
(439, 'selasa', '0510088001', '08.45', '09.35'),
(440, 'selasa', '0510088001', '09.35', '10.25'),
(441, 'selasa', '0510088001', '10.30', '11.20'),
(442, 'selasa', '0510088001', '11.20', '12.10'),
(443, 'selasa', '0510088001', '12.30', '13.20'),
(444, 'selasa', '0510088001', '13.20', '14.10'),
(445, 'selasa', '0510088001', '16.10', '17.00'),
(446, 'selasa', '0510088001', '17.00', '17.50'),
(447, 'selasa', '0510088001', '18.30', '19.20'),
(448, 'selasa', '0510088001', '19.20', '20.10'),
(449, 'kamis', '0510088001', '09.35', '10.25'),
(450, 'kamis', '0510088001', '10.30', '11.20'),
(451, 'kamis', '0510088001', '11.20', '12.10'),
(452, 'kamis', '0510088001', '12.30', '13.20'),
(453, 'kamis', '0510088001', '13.20', '14.10'),
(454, 'kamis', '0510088001', '14.15', '15.05'),
(455, 'kamis', '0510088001', '18.30', '19.20'),
(456, 'kamis', '0510088001', '19.20', '20.10'),
(457, 'kamis', '0510088001', '20.10', '21.00'),
(458, 'jumat', '0510088001', '07.00', '07.50'),
(459, 'jumat', '0510088001', '07.50', '08.40'),
(460, 'jumat', '0510088001', '08.45', '09.35'),
(461, 'jumat', '0510088001', '12.30', '13.20'),
(462, 'jumat', '0510088001', '13.20', '14.10'),
(463, 'jumat', '0510088001', '14.15', '15.05'),
(464, 'jumat', '0510088001', '18.30', '19.20'),
(465, 'jumat', '0510088001', '19.20', '20.10'),
(466, 'senin', '0511098401', '12.30', '13.20'),
(467, 'senin', '0511098401', '13.20', '14.10'),
(468, 'selasa', '0511098401', '07.00', '07.50'),
(469, 'selasa', '0511098401', '07.50', '08.40'),
(470, 'selasa', '0511098401', '08.45', '09.35'),
(471, 'selasa', '0511098401', '09.35', '10.25'),
(472, 'selasa', '0511098401', '10.30', '11.20'),
(473, 'selasa', '0511098401', '11.20', '12.10'),
(474, 'rabu', '0511098401', '08.45', '09.35'),
(475, 'rabu', '0511098401', '09.35', '10.25'),
(476, 'kamis', '0511098401', '09.35', '10.25'),
(477, 'kamis', '0511098401', '10.30', '11.20'),
(478, 'kamis', '0511098401', '11.20', '12.10'),
(479, 'kamis', '0511098401', '12.30', '13.20'),
(480, 'kamis', '0511098401', '13.20', '14.10'),
(481, 'senin', '0515058802', '07.00', '07.50'),
(482, 'senin', '0515058802', '07.50', '08.40'),
(483, 'senin', '0515058802', '08.45', '09.35'),
(484, 'senin', '0515058802', '09.35', '10.25'),
(485, 'rabu', '0515058802', '14.15', '15.05'),
(486, 'rabu', '0515058802', '15.15', '16.05'),
(487, 'kamis', '0515058802', '10.30', '11.20'),
(488, 'kamis', '0515058802', '11.20', '12.10'),
(489, 'jumat', '0515058802', '09.35', '10.25'),
(490, 'jumat', '0515058802', '10.30', '11.20'),
(491, 'jumat', '0515058802', '15.15', '16.05'),
(492, 'jumat', '0515058802', '16.10', '17.00'),
(493, 'jumat', '0515058802', '17.00', '17.50'),
(494, 'senin', '0516127501', '08.45', '09.35'),
(495, 'senin', '0516127501', '09.35', '10.25'),
(496, 'senin', '0516127501', '10.30', '11.20'),
(497, 'senin', '0516127501', '11.20', '12.10'),
(498, 'selasa', '0516127501', '07.00', '07.50'),
(499, 'selasa', '0516127501', '07.50', '08.40'),
(500, 'senin', '0519108901', '07.00', '07.50'),
(501, 'senin', '0519108901', '07.50', '08.40'),
(502, 'senin', '0519108901', '08.45', '09.35'),
(503, 'senin', '0519108901', '14.15', '15.05'),
(504, 'senin', '0519108901', '15.15', '16.05'),
(505, 'rabu', '0519108901', '09.35', '10.25'),
(506, 'rabu', '0519108901', '10.30', '11.20'),
(507, 'rabu', '0519108901', '11.20', '12.10'),
(508, 'kamis', '0519108901', '08.45', '09.35'),
(509, 'kamis', '0519108901', '09.35', '10.25'),
(510, 'kamis', '0519108901', '10.30', '11.20'),
(511, 'kamis', '0519108901', '11.20', '12.10'),
(512, 'kamis', '0519108901', '12.30', '13.20'),
(513, 'kamis', '0519108901', '13.20', '14.10'),
(514, 'kamis', '0519108901', '14.15', '15.05'),
(515, 'senin', '0520098702', '12.30', '13.20'),
(516, 'senin', '0520098702', '13.20', '14.10'),
(517, 'senin', '0520098702', '14.15', '15.05'),
(518, 'senin', '0520098702', '15.15', '16.05'),
(519, 'selasa', '0520098702', '10.30', '11.20'),
(520, 'selasa', '0520098702', '11.20', '12.10'),
(521, 'selasa', '0520098702', '16.10', '17.00'),
(522, 'selasa', '0520098702', '17.00', '17.50'),
(523, 'kamis', '0520098702', '08.45', '09.35'),
(524, 'kamis', '0520098702', '09.35', '10.25'),
(525, 'sabtu', '0520098702', '07.00', '07.50'),
(526, 'sabtu', '0520098702', '07.50', '08.40'),
(527, 'sabtu', '0520098702', '08.45', '09.35'),
(528, 'sabtu', '0520098702', '09.35', '10.25'),
(529, 'senin', '0521127303', '07.00', '07.50'),
(530, 'senin', '0521127303', '07.50', '08.40'),
(531, 'senin', '0521127303', '14.15', '15.05'),
(532, 'senin', '0521127303', '15.15', '16.05'),
(533, 'rabu', '0521127303', '07.00', '07.50'),
(534, 'rabu', '0521127303', '07.50', '08.40'),
(535, 'kamis', '0521127303', '12.30', '13.20'),
(536, 'kamis', '0521127303', '13.20', '14.10'),
(537, 'jumat', '0521127303', '07.00', '07.50'),
(538, 'jumat', '0521127303', '07.50', '08.40'),
(539, 'jumat', '0521127303', '12.30', '13.20'),
(540, 'jumat', '0521127303', '13.20', '14.10'),
(541, 'jumat', '0521127303', '14.15', '15.05'),
(542, 'senin', '0521128502', '09.35', '10.25'),
(543, 'senin', '0521128502', '10.30', '11.20'),
(544, 'senin', '0521128502', '11.20', '12.10'),
(545, 'selasa', '0521128502', '14.15', '15.05'),
(546, 'selasa', '0521128502', '15.15', '16.05'),
(547, 'rabu', '0521128502', '07.00', '07.50'),
(548, 'rabu', '0521128502', '07.50', '08.40'),
(549, 'rabu', '0521128502', '08.45', '09.35'),
(550, 'rabu', '0521128502', '09.35', '10.25'),
(551, 'rabu', '0521128502', '10.30', '11.20'),
(552, 'rabu', '0521128502', '11.20', '12.10'),
(553, 'jumat', '0521128502', '12.30', '13.20'),
(554, 'jumat', '0521128502', '13.20', '14.10'),
(555, 'jumat', '0521128502', '14.15', '15.05'),
(556, 'senin', '0522018302', '07.00', '07.50'),
(557, 'senin', '0522018302', '07.50', '08.40'),
(558, 'senin', '0522018302', '12.30', '13.20'),
(559, 'senin', '0522018302', '13.20', '14.10'),
(560, 'rabu', '0522018302', '12.30', '13.20'),
(561, 'rabu', '0522018302', '13.20', '14.10'),
(562, 'jumat', '0522018302', '12.30', '13.20'),
(563, 'jumat', '0522018302', '13.20', '14.10'),
(564, 'jumat', '0522018302', '14.15', '15.05'),
(565, 'senin', '0524118801', '12.30', '13.20'),
(566, 'senin', '0524118801', '13.20', '14.10'),
(567, 'senin', '0524118801', '16.10', '17.00'),
(568, 'senin', '0524118801', '17.00', '17.50'),
(569, 'rabu', '0524118801', '16.10', '17.00'),
(570, 'rabu', '0524118801', '17.00', '17.50'),
(571, 'rabu', '0524118801', '18.30', '19.20'),
(572, 'rabu', '0524118801', '19.20', '20.10'),
(573, 'sabtu', '0524118801', '10.30', '11.20'),
(574, 'sabtu', '0524118801', '11.20', '12.10'),
(575, 'sabtu', '0524118801', '12.30', '13.20'),
(576, 'sabtu', '0524118801', '13.20', '14.10'),
(577, 'senin', '0526018502', '16.10', '17.00'),
(578, 'senin', '0526018502', '17.00', '17.50'),
(579, 'selasa', '0526018502', '10.30', '11.20'),
(580, 'selasa', '0526018502', '11.20', '12.10'),
(581, 'rabu', '0526018502', '08.45', '09.35'),
(582, 'rabu', '0526018502', '09.35', '10.25'),
(583, 'rabu', '0526018502', '10.30', '11.20'),
(584, 'rabu', '0526018502', '11.20', '12.10'),
(585, 'rabu', '0526018502', '14.15', '15.05'),
(586, 'rabu', '0526018502', '15.15', '16.05'),
(587, 'kamis', '0526018502', '08.45', '09.35'),
(588, 'kamis', '0526018502', '09.35', '10.25'),
(589, 'senin', '0528058401', '07.00', '07.50'),
(590, 'senin', '0528058401', '07.50', '08.40'),
(591, 'rabu', '0528058401', '07.00', '07.50'),
(592, 'rabu', '0528058401', '07.50', '08.40'),
(593, 'rabu', '0528058401', '08.45', '09.35'),
(594, 'rabu', '0528058401', '12.30', '13.20'),
(595, 'rabu', '0528058401', '13.20', '14.10'),
(596, 'rabu', '0528058401', '14.15', '15.05'),
(597, 'kamis', '0528058401', '10.30', '11.20'),
(598, 'kamis', '0528058401', '11.20', '12.10'),
(599, 'kamis', '0528058401', '12.30', '13.20'),
(600, 'kamis', '0528058401', '13.20', '14.10'),
(601, 'kamis', '0528058401', '14.15', '15.05'),
(602, 'kamis', '0528058401', '15.15', '16.05'),
(603, 'jumat', '0528058401', '16.10', '17.00'),
(604, 'jumat', '0528058401', '17.00', '17.50'),
(605, 'jumat', '0528058401', '18.30', '19.20'),
(606, 'jumat', '0528058401', '19.20', '20.10'),
(620, 'selasa', '0530077601', '08.45', '09.35'),
(621, 'selasa', '0530077601', '09.35', '10.25'),
(622, 'selasa', '0530077601', '10.30', '11.20'),
(623, 'selasa', '0530077601', '11.20', '12.10'),
(624, 'kamis', '0530077601', '07.00', '07.50'),
(625, 'kamis', '0530077601', '07.50', '08.40'),
(626, 'kamis', '0530077601', '10.30', '11.20'),
(627, 'kamis', '0530077601', '11.20', '12.10'),
(628, 'jumat', '0530077601', '07.00', '07.50'),
(629, 'jumat', '0530077601', '07.50', '08.40'),
(630, 'senin', '0530077701', '14.15', '15.05'),
(631, 'senin', '0530077701', '15.15', '16.05'),
(632, 'rabu', '0530077701', '16.10', '17.00'),
(633, 'rabu', '0530077701', '17.00', '17.50'),
(634, 'kamis', '0530077701', '09.35', '10.25'),
(635, 'kamis', '0530077701', '10.30', '11.20'),
(636, 'kamis', '0530077701', '11.20', '12.10'),
(637, 'jumat', '0530077701', '07.00', '07.50'),
(638, 'jumat', '0530077701', '07.50', '08.40'),
(639, 'jumat', '0530077701', '08.45', '09.35'),
(667, 'selasa', '0523068801', '16.10', '17.00'),
(668, 'selasa', '0523068801', '17.00', '17.50'),
(669, 'rabu', '0523068801', '07.00', '07.50'),
(670, 'rabu', '0523068801', '07.50', '08.40'),
(671, 'rabu', '0523068801', '16.10', '17.00'),
(672, 'rabu', '0523068801', '17.00', '17.50'),
(673, 'kamis', '0523068801', '12.30', '13.20'),
(674, 'kamis', '0523068801', '13.20', '14.10'),
(675, 'sabtu', '0523068801', '07.00', '07.50'),
(676, 'sabtu', '0523068801', '07.50', '08.40'),
(677, 'sabtu', '0523068801', '10.30', '11.20'),
(678, 'sabtu', '0523068801', '11.20', '12.10'),
(716, 'kamis', '0509048901', '08.45', '09.35'),
(717, 'kamis', '0509048901', '09.35', '10.25'),
(718, 'jumat', '0509048901', '07.00', '07.50'),
(719, 'jumat', '0509048901', '07.50', '08.40'),
(720, 'jumat', '0509048901', '16.10', '17.00'),
(721, 'jumat', '0509048901', '17.00', '17.50'),
(722, 'sabtu', '0509048901', '07.00', '07.50'),
(723, 'sabtu', '0509048901', '07.50', '08.40'),
(724, 'sabtu', '0509048901', '08.45', '09.35'),
(725, 'sabtu', '0509048901', '12.30', '13.20'),
(726, 'sabtu', '0509048901', '13.20', '14.10'),
(727, 'sabtu', '0509048901', '14.15', '15.05'),
(728, 'sabtu', '0509048901', '15.15', '16.05'),
(983, 'senin', '0529056601', '14.15', '15.05'),
(984, 'senin', '0529056601', '15.15', '16.05'),
(985, 'rabu', '0529056601', '14.15', '15.05'),
(986, 'rabu', '0529056601', '16.10', '17.00'),
(987, 'rabu', '0529056601', '17.00', '17.50'),
(988, 'jumat', '0529056601', '08.45', '09.35'),
(989, 'jumat', '0529056601', '09.35', '10.25'),
(990, 'jumat', '0529056601', '10.30', '11.20'),
(991, 'sabtu', '0529056601', '07.00', '07.50'),
(992, 'sabtu', '0529056601', '07.50', '08.40'),
(993, 'sabtu', '0529056601', '08.45', '09.35'),
(994, 'sabtu', '0529056601', '12.30', '13.20'),
(995, 'sabtu', '0529056601', '13.20', '14.10'),
(996, 'sabtu', '0529056601', '14.15', '15.05');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_pendadaran`
--

CREATE TABLE `jadwal_pendadaran` (
  `id` int(11) NOT NULL,
  `tanggal` varchar(11) NOT NULL,
  `hari` varchar(12) NOT NULL,
  `dosen` varchar(12) NOT NULL,
  `mhs_terlibat` varchar(12) NOT NULL,
  `jam_mulai` varchar(12) NOT NULL,
  `jam_selesai` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal_pendadaran`
--

INSERT INTO `jadwal_pendadaran` (`id`, `tanggal`, `hari`, `dosen`, `mhs_terlibat`, `jam_mulai`, `jam_selesai`) VALUES
(677, '25-09-2020', 'jumat', '0523077902', '1600018100', '07.00', '09.35'),
(678, '25-09-2020', 'jumat', '0523068801', '1600018100', '07.00', '09.35'),
(679, '25-09-2020', 'jumat', '0407016801', '1600018100', '07.00', '09.35'),
(689, '06-10-2020', 'selasa', '0524118801', '1600018070', '12.30', '15.05'),
(690, '06-10-2020', 'selasa', '0520098702', '1600018070', '12.30', '15.05'),
(691, '06-10-2020', 'selasa', '0504116601', '1600018070', '12.30', '15.05'),
(698, '07-10-2020', 'rabu', '0523077902', '1600018080', '08.45', '11.20'),
(699, '07-10-2020', 'rabu', '0523068801', '1600018080', '08.45', '11.20'),
(700, '07-10-2020', 'rabu', '0530077601', '1600018080', '08.45', '11.20');

-- --------------------------------------------------------

--
-- Table structure for table `judul_dosen`
--

CREATE TABLE `judul_dosen` (
  `nim` varchar(10) NOT NULL,
  `penguji1` varchar(12) NOT NULL,
  `penguji2` varchar(12) NOT NULL,
  `judul1` text NOT NULL,
  `judul2` text NOT NULL,
  `skor1` varchar(6) NOT NULL,
  `skor2` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `judul_dosen`
--

INSERT INTO `judul_dosen` (`nim`, `penguji1`, `penguji2`, `judul1`, `judul2`, `skor1`, `skor2`) VALUES
('1300018102', '0507087202', '', 'Sistem Informasi dan Sistem Rekomendasi Penjualan Online dengan Metode Collaborative pada Toko Jingga Fashion', '', '0.226', ''),
('1300018137', '0407016801', '', 'Aplikasi Game Tradisional Benthik Berbasis Dekstop', '', '0.289', ''),
('1300018157', '0526018502', '', 'Aplikasi Sistem Informasi Peminjaman Aset Untuk Takmir Berbasis Web Menggunakan Konsep MVC (Model View Controller) Dengan Menggunakan Framework Codeigniter Di BIFAS UAD', '', '0.451', ''),
('1400018025', '0504116601', '', 'Media pembelajaran Bahasa Indonesia', '', '0.567', ''),
('1400018055', '0006027001', '', 'Sistem Informasi Notaris Berbasis WEB Pada Kantor Kementrian Hukum dan HAM DIY', '', '0.424', ''),
('1400018072', '0520046901', '', 'Sistem Informasi Geografis Pencarian Asrama Mahasiswa Daerah di kota Yogyakarta Berbasis Android', '', '0.503', ''),
('1400018080', '0520046901', '', 'Sistem Informasi Geografis Pencarian Asrama Mahasiswa Daerah di kota Yogyakarta Berbasis Android', '', '0.503', ''),
('1400018110', '0510077302', '', 'Media Pembelajaran Penerapan Integral untuk Mencari Luas, Volume dan Panjang Berbasis Multimedia', '', '0.365', ''),
('1400018120', '0504116601', '', 'Media pembelajaran Bahasa Indonesia', '', '0.567', ''),
('1400018153', '0510088001', '', 'Analisis Forensik Jaringan Terhadap Serangan Man In The Middle Attack (MTMA) Menggunakan Metode Live Forensik', '', '0.436', ''),
('1400018220', '0510088001', '', 'Analisis Forensik Whatsapp Messanger Berbasis Android Menggunakan Metode Text Mining', '', '0.286', ''),
('1400018225', '0507087202', '', 'Aplikasi Penterjemahan Bahasa Lintang - Bahasa Indonesia', '', '0.671', ''),
('1400018232', '0507087202', '', 'Aplikasi Penterjemahan Bahasa Lintang - Bahasa Indonesia', '', '0.53', ''),
('1500018005', '0530077601', '', 'Pengembangan Aplikasi Berbasis Web Untuk Hasil Produksi Teh Hitam Menggunakan Metode K-Means Clustering', '', '0.471', ''),
('1500018029', '0407016801', '', 'Pengembangan Sistem Informasi dan administrasi Kependudukan Multiuser', '', '0.5', ''),
('1500018036', '0510076701', '', 'Sistem Identifikasi CitraJenis Kayu Solid Berdasarkan Tekstur Menggunakan Gray Level Co-Occurrence Matrix (GLCM) dengan Klasifikasi Jarak Enclidean', '', '0.395', ''),
('1500018038', '0523077902', '', 'Layanan Informasi Event Menggunakan LBS  Berbasis jQuery Mobile ', '', '0.442', ''),
('1500018046', '0521127303', '', 'Sistem Informasi Keuangan Untuk Pembayaran Uang Pendidikan Dengan Metode Prototype', '', '0.474', ''),
('1500018058', '0516127501', '', 'Sistem Konsultasi Keuangan dalam Menentukan Kredit atau Pinjaman Dengan Menggunakan Metode KNN (K-Nearest Meighbor)', '', '0.456', ''),
('1500018066', '0006027001', '', 'Sistem Pakar untuk Diagnosa Komplikasi Pada Ibu dan Janin di masa Kehamilan Berbasis Mobile', '', '0.359', ''),
('1500018071', '0530077701', '', 'Pengembangan User Interface /User Experience Sistem Informasi Ruang Dengan Metode UCD', '', '0.548', ''),
('1500018075', '0006027001', '', 'Analisis Keamanan User Pada Moodle Berdasarkan Pada Leveling User dan Metode Enkripsi', '', '0.426', ''),
('1500018078', '0516127501', '', 'Penerapan Data Mining Untuk Kklasifikasi Status Gizi Bayi dengan Metode K-Means', '', '0.471', ''),
('1500018082', '0510088001', '', 'Desain dan Implementasi Virtualisasi Server Menggunakan Proxmox', '', '0.309', ''),
('1500018090', '0510077302', '', 'Animasi Dongen Kancil dan Buaya Pesan Moral untuk anak-anak berbasis multimedia', '', '0.333', ''),
('1500018093', '0530077601', '', 'Sistem Pendukung Keputusan Penentuan Calon Petugas Haji dengan Metode SAW', '', '0.503', ''),
('1500018100', '0516127501', '', 'Perancangan dan Implementasi Sistem Pendukung Keputusan Penentuan Jenis dan Kualitas Kulit Hewan', '', '0.717', ''),
('1500018114', '0006027001', '', 'Sistem Pendukung Keputusan Pemilihan Lokasi Warnet dengan Metode AHP', '', '0.75', ''),
('1500018116', '0510076701', '', 'Sistem Identifikasi Citra Jenis Rosella Menggunakan Metode Product dan Metode Cosine Similarity', '', '0.248', ''),
('1500018120', '0015118001', '', 'Pengembangan Sistem Komplain Berbasis Mobile', '', '0.548', ''),
('1500018123', '0521127303', '', 'Rancang Bangun Sistem Layanan Service Sepeda Motor Pada AHASS Tembi Jaya Motor Menggunakan SMS Gateway', '', '0.306', ''),
('1500018129', '0407016801', '', 'Aplikasi Penerjemah Bahasa Indonesia ke Bahasa Korea dan Bahasa Korea ke Indonesia', '', '0.662', ''),
('1500018132', '0015118001', '', 'Game Edukasi Meningkatkan daya Ingat Anak \"Bermain Bersama Modo dan Modi\"', '', '0.447', ''),
('1500018144', '0512078304', '', 'Penerapan data mining dalam mencari pola asosiasi dengan menggunakan metode lgoritma apriori pada tracer study', '', '0.56', ''),
('1500018148', '0014107301', '', 'Pembuatan Model CRM di Seksi Koperasi Menggunakan Metode Cobit 4.1 (Studi Kasus :Di DISPERINDANGKOP DIY)', '', '0.424', ''),
('1500018150', '0529056601', '', 'Analisis Investasi Pada Rumah Kontrakan dengan menggunakan metode fuzzy', '', '0.655', ''),
('1500018155', '0504116601', '', 'Media Pembelajaran Aksara Sumbawa Berbasis Multimedia Pada Pelajaran Muatan Lokal', '', '0.513', ''),
('1500018156', '0510088001', '', 'Analisa Perbandingan Teknik  Hacking SQL Injection Pada Keamanan Web', '', '0.433', ''),
('1500018157', '0530077601', '', 'Sistem Pendukung Keputusan Diagnosa Kerusakan Printer Inkjet Dengan Metode Forward Forward Chaining', '', '0.566', ''),
('1500018160', '0504116601', '', 'Media Pembelajaran Aksara Sumbawa Berbasis Multimedia Pada Pelajaran Muatan Lokal', '', '0.522', ''),
('1500018164', '0014107301', '', 'Studi Analisa QoS pada Standar Tiphon pada Jaringan WIFI Hotspot dan Optimasi Jaringan (Studi Kasus : Kampus 3 UAD)', '', '0.272', ''),
('1500018167', '0510077302', '', 'Penerapan Data Mining Untuk Prediksi Lama Studi Mahasiswa Teknik Informatika UAD dengan Metode K-Nearest Neighbor (K-NN)', '', '0.472', ''),
('1500018185', '0510088001', '', 'Analisis Forensik Jaringan Terhadap Serangan Man In The Middle Attack (MTMA) Menggunakan Metode Live Forensik', '', '0.436', ''),
('1500018191', '0530077601', '', 'Analisis sintak pada aplikasi terjemahan bahasa Indonesia ke bahasa Banyumas', '', '0.316', ''),
('1500018198', '0006027001', '', 'Sistem Pakar untuk Diagnosa Komplikasi Pada Ibu dan Janin di masa Kehamilan Berbasis Mobile', '', '0.566', ''),
('1500018200', '0512078304', '', 'Pengembangan Aplikasi mobile untuk mahasiswa UAD menggunakan metode test driven development (TDD)', '', '0.364', ''),
('1500018204', '0510077302', '', 'Implementasi Media Pembelajaran Clipping pada Mata Kuliah Grafika Komputer Berbasis Multimedia', '', '0.316', ''),
('1500018207', '0014107301', '', 'Analisis dan Optimasi Media Sosial Sebagai Pendukung E-Learning Dalam Pembelajaran di Universitas Ahmad Dahlan Yogyakarta', '', '0.455', ''),
('1500018213', '0529056601', '', 'Sistem Pendukung Keputusan untuk Memprediksi Pengambilan Keputusan Pemberian Kredit Nasabah dengan Metode Logika Fuzzy Tsukamoto (Studi Kasus BMT Ash Shof Kutoarjo)', '', '0.412', ''),
('1500018214', '0510077302', '', 'Penerapan Data Mining Untuk Prediksi Lama Studi Mahasiswa Teknik Informatika UAD dengan Metode K-Nearest Neighbor (K-NN)', '', '0.356', ''),
('1500018230', '0510088001', '', 'Analisis Forensik Jaringan Terhadap Serangan Man In The Middle Attack (MTMA) Menggunakan Metode Live Forensik', '', '0.505', ''),
('1500018245', '0407016801', '', 'Sistem Pendukung Keputusan Pemilihan Sekolah Menengah Kejuruan Menggunakan Metode SAW', '', '0.717', ''),
('1500018251', '0015118001', '', 'Rancang Bangun Sistem Pelacakan Barang secara real time berbasis Mobile push nitification', '', '0.377', ''),
('1500018256', '0512078304', '', 'MOSELE : Aplikasi Web Clearning Budidaya Lele Berbasis Web', '', '0.424', ''),
('1500018257', '0529056601', '', 'Diagnosa Penyakit Paru-Paru dengan JST Metode Kohonen Berbasis Web', '', '0.375', ''),
('1500018259', '0523077902', '', 'Pembangunan Aplikasi E-Menu pada Restoran Berbasis Android', '', '0.272', ''),
('1500018265', '0512078304', '', 'MOSELE : Aplikasi Web Clearning Budidaya Lele Berbasis Web', '', '0.447', ''),
('1500018266', '0510076701', '', 'Sistem Identifikasi Citra Jenis Rosella Menggunakan Metode Product dan Metode Cosine Similarity', '', '0.351', ''),
('1500018267', '0407016801', '', 'Data Mining Kunjungan Wisata Menggunakan Metode K-Means Clustering Dengan Cosine Similarity', '', '0.507', ''),
('1500018268', '0530077601', '', 'Pemanfaatan Pembobotan TF-IDF Untuk Pencarian Data Skripsi', '', '0.289', ''),
('1500018269', '0516127501', '', 'Identifikasi Kualitas Daging Sapi Menggunakan Metode k-Means Clustering', '', '0.401', ''),
('1500018270', '0510088001', '', 'Analisa Perbandingan Teknik  Hacking SQL Injection Pada Keamanan Web', '', '0.354', ''),
('1500018271', '0510088001', '', 'Analisis dan Perancangan Proxy Server Menggunakan Virtual Machine', '', '0.286', ''),
('1500018276', '0407016801', '', 'Membangun Sistem Informasi Penjualan Berbasis Web pada Keramik Dasilan', '', '0.668', ''),
('1500018278', '0530077701', '', 'Analisis Penerimaan Pengguna Terhadap Penggunaan Sistem Informasi Managemen Ruang Menggunakan Teknologi Acceptance Model', '', '0.385', ''),
('1500018279', '0512078304', '', 'Implementasi Data Mining Untuk Melakukan Klasifikasi Data Tracer Study Menggunakan Metode Naive Bayes', '', '0.552', ''),
('1500018282', '0407016801', '', 'Membangun Sistem Informasi Penjualan Berbasis Web pada Keramik Dasilan', '', '0.535', ''),
('1500018294', '0006027001', '', 'Pengenalan dan Pembelajaran Sandi-Sandi Pramuka dengan Media Pembelajaran Interaktif Berbasis Multimedia', '', '0.426', ''),
('1500018296', '0510076701', '', 'Sistem Pendukung Keputusan Penentuan Penerima Pinjaman Lunak dan Bergulir Menggunakan AHP', '', '0.559', ''),
('1500018298', '0407016801', '', 'Penerapan Web Service dalam Pengembangan Sistem Penilaian KKN UAD', '', '0.375', ''),
('1500018299', '0006027001', '', 'Sistem Pendukung Keputusan Pemilihan Lokasi Warnet dengan Metode AHP', '', '0.5', ''),
('1500018300', '0505038301', '', 'Agen Crawler Alamat Email Menggunakan Metode Bread First Crawling', '', '0', ''),
('1500018301', '0510077302', '', 'Analisis Perbandingan Segmentasi Citra Digital Menggunakan Metode Level-Set Caselles, Chan & Vese dan Lankton ', '', '0.471', ''),
('1500018304', '0014107301', '', 'Studi Analisa QoS pada Standar Tiphon pada Jaringan WIFI Hotspot dan Optimasi Jaringan (Studi Kasus : Kampus 3 UAD)', '', '0.316', ''),
('1500018311', '0510088001', '', 'Analisis Forensik Jaringan Terhadap Serangan Man In The Middle Attack (MTMA) Menggunakan Metode Live Forensik', '', '0.483', ''),
('1500018319', '0530077601', '', 'Sistem Pendukung Keputusan Penentuan Calon Petugas Haji dengan Metode SAW', '', '0.527', '');

-- --------------------------------------------------------

--
-- Table structure for table `logbook`
--

CREATE TABLE `logbook` (
  `nim` varchar(12) NOT NULL,
  `tgl_bimbingan` varchar(11) NOT NULL,
  `kegiatan_bimbingan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(12) NOT NULL,
  `nama_mhs` char(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama_mhs`) VALUES
('12018011', 'Ardian Dwi Prasetyo'),
('12018051', 'Nurul Qomariah'),
('123456', 'Ardani Prasetyo'),
('1300018006', 'Hendra Nugraha'),
('1300018102', 'Muhamad Irsang'),
('1300018136', 'Sri Rahayu Rahmatika'),
('1300018137', 'Ega Putra Buana'),
('1300018157', 'Hakim Fauzi'),
('1400018001', 'Octavianto Rizal Chang'),
('1400018006', 'Syaripudin Khairil Anwar'),
('1400018008', 'Ariemby Kusuma Wardany'),
('1400018010', 'Eko Saputro'),
('1400018014', 'DIAN HAFSARI'),
('1400018015', 'M. Saiful Hadi'),
('1400018025', 'Windy Shela Ramadhani'),
('1400018026', 'Farradz Agam Alhammidana'),
('1400018038', 'Siti Sofia Rani'),
('1400018040', 'Muhamad Arip'),
('1400018048', 'Muhammad Rizky Fauzi'),
('1400018049', 'Ade Dharma Ariawan'),
('1400018052', 'Prasti kusuma dinata'),
('1400018055', 'Bayu Khoirul Muntaha'),
('1400018058', 'Fakhrizal'),
('1400018072', 'Risky Andika Kurniawan'),
('1400018080', 'Hisyam Dwi Wibowo'),
('1400018088', 'Noor Hasan Fachmi'),
('1400018102', 'Nurrahmi'),
('1400018110', 'Denny Hilmawan Rahmatullah Wolley'),
('1400018118', 'Halima Tus Adia Seran'),
('1400018120', 'Akbar Wicaksono'),
('1400018125', 'Trianja Haryadi'),
('1400018133', 'Bayu Maulana Yogi Kisworo'),
('1400018137', 'Satrio Haryo Yudanto'),
('1400018141', 'Andwiki Novrizon Putra'),
('1400018153', 'Erico Ryandika Miftahgitas'),
('1400018158', 'Zaqy Yamini'),
('1400018161', 'Dicky Haryadi'),
('1400018168', 'M. Faqihudin'),
('1400018201', 'Nia Pangestuning Sarastri'),
('1400018211', 'Andiy Irwanda'),
('1400018214', 'Sri Wahyuni'),
('1400018218', 'Anggita Putri Nur Anida'),
('1400018220', 'Hendrizal'),
('1400018225', 'Ahmad Reza Nurjaman'),
('1400018232', 'Dana Adhika'),
('1400018244', 'Nana Kurniawan'),
('1400018249', 'Muhammad Sidik'),
('1400018254', 'Uswatun Khasanah'),
('1500015634', 'ardea'),
('15000156341', 'sapriudin'),
('1500017177', 'Ade Dermawan'),
('1500018002', 'Fajar Syams Hilmi Prinantyo'),
('1500018003', 'Marzota Dwi R'),
('1500018004', 'Arica Putra Subandria'),
('1500018005', 'Muhammad Renardi Haris'),
('1500018011', 'Imam Suryanto'),
('1500018013', 'Fahri ardianto'),
('1500018015', 'Rr. Delavega Widya Ningrum'),
('1500018016', 'Chairunnisa Ulima Iswidyadhana'),
('1500018018', 'Edi Siswanto'),
('1500018019', 'Galih Tsabit Ulumudin'),
('1500018020', 'Betty Ratna Sari'),
('1500018022', 'Taslim Mamulaty M'),
('1500018023', 'Ratna Triayu Lestari'),
('1500018026', 'Reda fitriani'),
('1500018027', 'Okta riandika wibowo'),
('1500018028', 'Dina lisiana putri'),
('1500018029', 'Muhammad Saepul Hadi'),
('1500018032', 'Nora Novita Lestari'),
('1500018033', 'fatimatuzuhro'),
('1500018035', 'Rika Nursita'),
('1500018036', 'Reza Widhi Juardana'),
('1500018038', 'Alex Nugraha'),
('1500018046', 'Suwanto'),
('1500018048', 'Lalu Sabrina Ganata'),
('1500018049', 'Arif Lukman Prasetio'),
('1500018050', 'Khansa Bella Rizky'),
('1500018052', 'Dwi Harlina Saka Putri'),
('1500018053', 'Sherly Putri Pertiwi'),
('1500018058', 'Lalu Abd. Halim Yatna'),
('1500018059', 'Ajie Kurnia Saputra Swara'),
('1500018061', 'Muhammad Sutikno'),
('1500018063', 'M. Salman Alfarisi'),
('1500018065', 'Okta Fandrian'),
('1500018066', 'Siti Nurrohmah'),
('1500018068', 'Maulana Agung Pribadi'),
('1500018069', 'Gatot Aries Munandar'),
('1500018071', 'Arma Yoga Prasetyo'),
('1500018074', 'Rynto Eik Sahgitya'),
('1500018075', 'Agus susilo jatmiko'),
('1500018078', 'Gieovanni Wisnu Pramudya'),
('1500018081', 'Thedi Wirayasa'),
('1500018082', 'Yogi Handika'),
('1500018083', 'Ridho Febrian'),
('1500018084', 'Hafidz Pudyastawa Aji'),
('1500018085', 'Firman Nur Efendi'),
('1500018086', 'Ginanjar Syahrul Barkah'),
('1500018088', 'Hendika Hardianto'),
('1500018089', 'Nur Awal Hidayanto'),
('1500018090', 'Bagus Prasetiya'),
('1500018093', 'Ari Zona Akbar'),
('1500018100', 'Baiq Ade Febriami'),
('1500018102', 'Mayang Notri'),
('1500018108', 'Jati Pandu Saputra'),
('1500018112', 'Gilang yuda pramana'),
('1500018113', 'Mada Satya Bayu Ambika'),
('1500018114', 'Vita Silvia'),
('1500018116', 'Jepri Anwar'),
('1500018118', 'Indriyanto Adi Prasetyo'),
('1500018120', 'M Rasyidi Hi Husen'),
('1500018123', 'Fuad Izzudin Ariwibowo'),
('1500018127', 'Raka Primayuda'),
('1500018129', 'Irpan'),
('1500018132', 'Walhudin Win Akwan'),
('1500018134', 'Setyawan wahyu utomo'),
('1500018135', 'Hiwilma Cleta Ermanti'),
('1500018140', 'Ela Dwi Anggraini'),
('1500018143', 'Fachrul Rozi'),
('1500018144', 'Firmansyah'),
('1500018145', 'Nur Farikhah'),
('1500018146', 'Muhamad Fadli'),
('1500018148', 'Kurniawan Sukimin Atmodjo'),
('1500018150', 'Fachry Akbar'),
('1500018151', 'Diokta Fajri'),
('1500018153', 'Muhchromin Sucron Makmun'),
('1500018155', 'Setiawan Panjirai'),
('1500018156', 'Amirul Shidiq'),
('1500018157', 'Hafijai'),
('1500018159', 'Andri Rizki Saputra'),
('1500018160', 'Hadi Mustopa'),
('1500018161', 'Indah Sawitri Ramonasari'),
('1500018162', 'Ratih Puspita Sari'),
('1500018163', 'Tia Purwantias'),
('1500018164', 'Saiful Bahri'),
('1500018166', 'Muhammad Lala Nur Syarif'),
('1500018167', 'Rahmat Ardila Dwi Yulianto'),
('1500018169', 'Izu Tolandona'),
('1500018171', 'Hayu Permata Sari'),
('1500018172', 'Ghaida Hayati Azzahro'),
('1500018173', 'Avinny Meidiana'),
('1500018174', 'Luthfi Ryanto'),
('1500018176', 'Aulyah Zakilah Ifani'),
('1500018183', 'Dimas Panji Setiawan'),
('1500018185', 'Sandi Dermawan'),
('1500018186', 'Rahmasari Adi Putri Imaniati'),
('1500018187', 'Khoiriyatus Sya\'biyah'),
('1500018188', 'Fitra Hari Akbar'),
('1500018190', 'Desita Putri Niranda'),
('1500018191', 'Lalu Adam Risaldi'),
('1500018195', 'Falal Nurhanif W'),
('1500018196', 'Nova Anggraini'),
('1500018197', 'Oob Aji Pangestu'),
('1500018198', 'Gusti Chandra Kurniawan'),
('1500018199', 'Desti Dwi Kusumandari'),
('1500018200', 'Krisbiantoro Prabowo'),
('1500018202', 'Devi Nanda Aryani Sirait'),
('1500018203', 'Vita Wijiarti'),
('1500018204', 'Danang Sulistiyono'),
('1500018207', 'Imam Fathanah'),
('1500018208', 'Indra wijaya'),
('1500018209', 'Ummul Fadhilah'),
('1500018211', 'Hanun Fitriani Latuconsina'),
('1500018213', 'Eka Bagus Saputro'),
('1500018214', 'Idris Maulana'),
('1500018217', 'Mohammad Bayu Putra Kumbara'),
('1500018218', 'Panca Handika Suwardi'),
('1500018219', 'Ahmad Fahriz Thiago'),
('1500018222', 'Asadul Bahri'),
('1500018225', 'Luthfi Habibie Amirudin'),
('1500018227', 'Indra Khairul Amri'),
('1500018229', 'Havidz Sastra Mahardika'),
('1500018230', 'Ma\'iya Aulia Afifati'),
('1500018232', 'Irfan Soudry Khisanudin'),
('1500018234', 'Syah Reza Pahlevi Sahadi'),
('1500018235', 'Utami Merdekawati'),
('1500018236', 'Nurhanif'),
('1500018237', 'Nurul Iqbari'),
('1500018241', 'septiono'),
('1500018242', 'Eka Pitriyani'),
('1500018245', 'Muhammad Arif Nuur Hafidz'),
('1500018246', 'Ganis Adzkiya'),
('1500018247', 'Faisal Kurniawan'),
('1500018249', 'Anugrah Bintang Perdana'),
('1500018251', 'Muhammad Basirudin'),
('1500018256', 'Bagas Yoga Prasetyo'),
('1500018257', 'Marli Prasetio'),
('1500018259', 'Yana Safitri'),
('1500018265', 'Taufan Chrisna Admaja'),
('1500018266', 'Herbudi Wahyu Utomo'),
('1500018267', 'Dwi Septiani Maharani Suwandi'),
('1500018268', 'Rohmakh Fitriani'),
('1500018269', 'Rohmat Agung Pamungkas'),
('1500018270', 'Andi Fadel Muhammad'),
('1500018271', 'Agil Nofiyan'),
('1500018276', 'Ahmad Rizky Hartono'),
('1500018278', 'Muhammad Attila Addarda'),
('1500018279', 'Silviana Efendy'),
('1500018280', 'Gontang Ragil Prakasa'),
('1500018281', 'Slamet heryanto'),
('1500018282', 'Afina Nurlaelli'),
('1500018283', 'Maunah Soleh'),
('1500018294', 'Fahmi Alfanwaiz'),
('1500018296', 'Rafif Awal Febriantoro'),
('1500018298', 'Akbar Ramadhan'),
('1500018299', 'Febri Ramadhan'),
('1500018300', 'Muhammad Ilham Azmi'),
('1500018301', 'Riska Syamsunu Aji'),
('1500018303', 'Velda Vania Maharani'),
('1500018304', 'Vendratama Catur Prasetya'),
('1500018306', 'Mutiaraning Umahati'),
('1500018310', 'Faiz Isnan Abdurrachman'),
('1500018311', 'Kiki Agus Setiawan'),
('1500018317', 'Ika Panca Septiana'),
('1500018318', 'Khairu Rizal Amrulloh'),
('1500018319', 'Ari Rahayu'),
('158886767689', 'ardeaas'),
('1600018070', 'Ahmad Yasin Habibilah'),
('1600018080', 'Muhammad Nur Widya Luthfiantoro'),
('1600018094', 'Rahmad Kurniawan Aprizal'),
('1600018100', 'Arfiansyah'),
('16001321', 'Ardian Dwi Prasetyo');

-- --------------------------------------------------------

--
-- Table structure for table `pendadaran`
--

CREATE TABLE `pendadaran` (
  `nim` varchar(20) NOT NULL,
  `tanggal` varchar(12) NOT NULL,
  `jam` varchar(20) NOT NULL,
  `ruang` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendadaran`
--

INSERT INTO `pendadaran` (`nim`, `tanggal`, `jam`, `ruang`) VALUES
('1600018070', '06/10/2020', '12.30 - 15.05', 'Ruang 1'),
('1600018080', '07/10/2020', '08.45 - 11.20', 'Ruang 1'),
('1600018100', '25/09/2020', '07.00 - 09.35', 'Ruang 1');

-- --------------------------------------------------------

--
-- Table structure for table `penjadwalan`
--

CREATE TABLE `penjadwalan` (
  `jamke` int(11) NOT NULL,
  `jam_mulai` varchar(6) NOT NULL,
  `jam_selesai` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjadwalan`
--

INSERT INTO `penjadwalan` (`jamke`, `jam_mulai`, `jam_selesai`) VALUES
(1, '07.00', '07.50'),
(2, '07.50', '08.40'),
(3, '08.45', '09.35'),
(4, '09.35', '10.25'),
(5, '10.30', '11.20'),
(6, '11.20', '12.10'),
(7, '12.30', '13.20'),
(8, '13.20', '14.10'),
(9, '14.15', '15.05'),
(10, '15.15', '16.05'),
(11, '16.10', '17.00'),
(12, '17.00', '17.50'),
(13, '18.30', '19.20'),
(14, '19.20', '20.10'),
(15, '20.10', '21.00');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `id` int(11) NOT NULL,
  `periode` varchar(30) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`id`, `periode`, `status`) VALUES
(1, 'Gasal 17/18', 'Close'),
(2, 'Genap 17/18', 'Close'),
(3, 'Gasal 18/19', 'Close'),
(4, 'Genap 18/19', 'Close'),
(5, 'Genap 20/21', 'Close'),
(6, 'Gasal 20/21', 'Open');

-- --------------------------------------------------------

--
-- Table structure for table `seminar`
--

CREATE TABLE `seminar` (
  `nim` varchar(20) NOT NULL,
  `tanggal` varchar(12) NOT NULL,
  `jam` varchar(6) NOT NULL,
  `ruang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `skripsi`
--

CREATE TABLE `skripsi` (
  `nim` varchar(20) NOT NULL,
  `judul` varchar(500) NOT NULL,
  `pembimbing` varchar(200) NOT NULL,
  `tgl_mulai_meto` varchar(13) NOT NULL,
  `semester` varchar(30) NOT NULL,
  `penguji1` varchar(200) NOT NULL,
  `penguji2` varchar(200) NOT NULL,
  `status` enum('Metopen','Skripsi','Gagal','Lulus') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skripsi`
--

INSERT INTO `skripsi` (`nim`, `judul`, `pembimbing`, `tgl_mulai_meto`, `semester`, `penguji1`, `penguji2`, `status`) VALUES
('12018011', 'Pengembangan Game Anak Soleh Berbasis Role Playingg Game (RPG) Pada Materi Sejarah Nabi dan Rosul Sebagai Media Pembelajaran Mandiri', '0504116601', '16/07/2019', 'Gasal 18/19', '0528058401', '0529056601', 'Lulus'),
('12018051', 'Perancangan Game The Adventure of West-Born Guardian Menggunakan Metode Multimedia Development Life Cycle Berbasis Adobe Flash', '0505118901', '16/07/2019', 'Gasal 18/19', '0528058401', '0510088001', 'Lulus'),
('123456', 'penjadwalan menggunakan algoritma semut', '0006027001', '10/09/2020', 'Gasal 20/21', '', '', 'Metopen'),
('1300018006', 'Rancang Bangun Sistem Informasi Bursa Kerja Khusus Berbasis Web Dengan Menggunakan Metode MVC (Studi Kasus pada SMKN 1 Cijulang)', '0521127303', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1300018102', 'Optimasi Keamanan Plug-in pada Open Journal Sistem (OJS Versi 0.3)', '0509048901', '25/03/2019', 'Genap 18/19', '', '', 'Metopen'),
('1300018136', 'Aplikasi Pengamanan Dokumen Keuangan Digital Signature Menggunakan Advance Encryption Standard', '0019087601', '25/03/2019', 'Genap 18/19', '', '', 'Metopen'),
('1300018137', 'Membuat Kamus Digital Tentang Istilah-Istilah Dalam Ilmu Pertanian Berbasis Dekstop', '0523077902', '25/03/2019', 'Genap 18/19', '', '', 'Metopen'),
('1300018157', 'Analisis dan Perancangan Sistem Informasi Pustaka Islam Bustanul Ulum Berbasis Web Menggunakan Arsitektur MVC dengan Framework Codeigniter', '0407016801', '25/03/2019', 'Genap 18/19', '', '', 'Metopen'),
('1400018001', 'Penambahan Chapter 3 pada Game Legenda Karna : Sang Anak Surya dengan metode Rapid Application Development', '0523068801', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1400018006', 'Analisis Firewall Aplikasi Web Untuk Pencegahan SQL Injection Menggunakan Naysi', '0019087601', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1400018008', 'Pemeriksaan Makna Kalimat dengan Metode N-Grams', '0530077601', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1400018010', 'Penerapan Kriptografi Advanced Encryption Standard (AES) dan Steganografi Metode Least Significant Bit (LSB) Untuk Mengingkatkan Keamanan Data Cloud Computing', '0019087601', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1400018014', 'Sistem Pendukung Keputusan Pembagian Daging Hewan  Qurban Dipadukuhan Samirono Dengan Metode Fuzzy Multi Decission Making (FDADM) dan Simple Addative Weighting (SAW)', '0506016701', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1400018015', 'Pengembangan Model 3d Untuk Game Portal Akademik Menggunakan Metode Digital Sculpting', '0523068801', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1400018025', 'Penerapan Stemming dalam Pembelajaran Kalimat Berimbuhan Bahasa Indonesia', '0530077601', '25/03/2019', 'Genap 18/19', '', '', 'Metopen'),
('1400018026', 'Sistem Klasifikasi Diagnosis Penyakit Gagal Ginjal Berbasis Web Menggunakan Metode Algoritma C4.5 (Studi Kasus di RSUD Ciamis)', '0504088601', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1400018038', 'Rekonstruksi 3D Model Wajah Untuk Avatar Game Virtual Akademik Menggunakan Sensor Kinect 2', '0524118801', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1400018040', 'Penerapan Analytical Hierarchy Process Pada Game Virtual Akademik UAD Untuk Memberi Rekomendasi Bidang Minat', '0523068801', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1400018048', 'Game Edukasi Huruf Hijaiyah dan Surah Berbasis Android Sebagai Media Digital Belajar Anak Usia Dini Dengan Teknik Animasi Komputer Menggunakan Metode MDLC', '0523068801', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1400018049', 'Implementasi Metode Forward Chaining Untuk Pelevelan Game Puzzle Studi Kasus Paud Dini Laras Yogyakarta', '0505118901', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1400018052', 'pengembangan model karakter game legenda karna anak sang surya', '0523068801', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1400018055', 'Sistem Informasi pada Kantor Agama (KUA)', '0407016801', '25/03/2019', 'Genap 18/19', '', '', 'Metopen'),
('1400018058', 'Rancang Bangun Aplikasi Penentu Harga Pokok Produksi Menggunakan Metode Job Order Costing Pada Toko Jersey Ojan Sport', '0014107301', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1400018072', 'Pencarian SPBU Terdekat di Kota Yogyakarta Menggunakan Metode Djikstra Berbasis Android', '0507087202', '25/03/2019', 'Genap 18/19', '', '', 'Metopen'),
('1400018080', 'Pencarian Atm BNI Terdekat di Kota Yogyakarta Menggunakan Metode Koloni Berbasis Android', '0507087202', '25/03/2019', 'Genap 18/19', '', '', 'Metopen'),
('1400018088', 'Sistem Informasi Tracking Sales Menggunakan Google Direction API Berbasis Android di Yuka Fashion', '0507087202', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1400018102', 'Pengembangan Aplikasi Stemming Pencarian Kata Dasar Dalam bahasa Inggris Menggunakan Algoritma Porter', '0530077601', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1400018110', 'Penerapan FSA dalam pencarian nomor telfon dalam dokumen', '0530077601', '25/03/2019', 'Genap 18/19', '', '', 'Metopen'),
('1400018118', 'Aplikasi Pembelajaran Anak Soleh Menggunakan Media Permainan Puzzle Berbasis Android', '0504116601', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1400018120', 'Penerapan Stemming Dalam Pembelajaran Kalimat Berimbuhan Bahasa Indonesia', '0530077601', '25/03/2019', 'Genap 18/19', '', '', 'Metopen'),
('1400018125', 'Rekomendasi lokasi wisata terdekat bagi wisatawan wilayah yogyakarta menggunakan pemanfaatan algoritma A* Berbasis WEB. ', '0407016801', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1400018133', 'Analisis dan Implementasi Back Office Sistem Laporan Sekolah Berbasis Website', '0504116601', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1400018137', 'Studi dan Implementasi Data Mining Asociation Rule Untuk Menentukan Pola Layouting Katalog Penawaran Kaos Jogja Distri Muslim', '0407016801', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1400018141', 'Pengungkapan Keamana Enkripsi MD5 di Eleaning UAD menggunakan Moodle', '0006027001', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1400018153', 'Analisis Bukti Digital Forensik pada Aplikasi Wechat dengan Metode NIST', '0019087601', '25/03/2019', 'Genap 18/19', '', '', 'Metopen'),
('1400018158', 'Pengembangan Media Pembelajaran IPA Kelas III SD Materi Gerak Benda Berbasis Media Pembelajaran Interaktif', '0521127303', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1400018161', 'Sistem Rekomendasi Kuliner Kota Yogyakarta Dengan Graph Database', '0407016801', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1400018168', 'Text Mining Pada Media Sosial Twitter (Studi Kasus: Topik #2019gantipresiden)', '0526018502', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1400018201', 'Pengembangan Stemming Bahasa Jawa Menggunakan Metode Algoritma Porter Untuk Mencari Akar Kata', '0530077601', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1400018211', 'Pengelompokkan Hasil Temuan Audit Mutu Internal Universitas Ahmad Dahlan Dengan Metode K-Means', '0530077601', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1400018214', 'Pengukuran Kinerja Lembaga Dengan Peneapan Sentimen Analisis', '0516127501', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1400018218', 'Analisis Frequent Term pada Komentar Publik Terhadap Perguruan Tinggi', '0512078304', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1400018220', 'Perancangan game edukasi 2D \"Budidaya tanaman kelapa sawit\" berbasis Android menggunakan Construct 2', '0504116601', '25/03/2019', 'Genap 18/19', '', '', 'Metopen'),
('1400018225', 'Pembuatan Aplikasi Kamus Percakapan Bahasa Indonesia - Bahasa Jepang', '0530077601', '25/03/2019', 'Genap 18/19', '', '', 'Metopen'),
('1400018232', 'Penerapan stemming dalam penterjemahan bahasa', '0530077601', '25/03/2019', 'Genap 18/19', '', '', 'Metopen'),
('1400018244', 'Pemanfaatan Bahasa Alami dalam Penelusuran Temuan Audit Mutu Internal', '0530077601', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1400018249', 'Studi dan Implementasi Teori Graf Untuk Mengukur Tingkat Kepentingan Aktor dalam SOP Akademik UAD', ' 0407016801', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1400018254', 'Pengembangan Media Big Book Untuk Meningkatkan Minat Belajar Sejarah Kerajaan Kelas IV SD Muhammadiyah Pepe', '0504116601', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500015634', 'penjadwalan menggunakan algoritma semut', '0006027001', '18/08/2020', 'Genap 18/19', '', '', 'Metopen'),
('15000156341', 'Penjadwalan menggunakan metode ', '0529056601', '18/08/2020', 'Genap 18/19', '', '', 'Metopen'),
('1500017177', 'ID-3 Untuk Diagnosa Penyakit Saluran Pencernaan Pada Balita', '0522018302', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018002', 'Clustering Analisis Sentimen Pada Indeks Kinerja Dosen Menggunakan Metode K Means', ' 0523077902', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018003', 'Pembuatan Web Penentuan Software Effort dengan Fuzzy Use Case Point', ' 0523077902', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018004', 'Association Rule Mining Peminjaman Buku Perpustakaan Universitas Ahmad Dahlan menggunakan Algoritma FP Growth', ' 0523077902', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018005', 'Pengembangan Aplikasi Pengelolaan Tugas Akhir Menggunakan Metode Agile', ' 0523077902', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018011', 'Forensic Mobile Pada Aplikasi Android E-commerve Menggunakan Logical Extraction Method', '0509048901', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018013', 'Aplikasi Peringkas Teks Bahasa Indonesia Dengan Metode Clustering', ' 0521128502', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018015', 'Implementasi Cosine Similarity dalam Pengecekan Keaslian Dokumen Tugas Pemrograman Mahasiswa', '0530077601', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018016', 'Sistem Pendeteksi Kemiripan Dokumen Artikel Dosen Pada Eprint UAD Menggunakan Metode Latent Semantic Analysis (LSA)', '0526018502', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018018', 'Sistem Pendukung Keputusan Pemilihan Kain Tenun Ende Lio Menggunakan Metode Simple Additive Weighting', '0505118901', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018019', 'Sistem Pendukung Keputusan Penentuan Serbuk Kayu Untuk Menentukan Tumbuh Kembang Jamur Menggunakan Metode Simple Additive Weighting', '0505118901', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018020', 'Penentuan Kelayakan Tempat Tinggal Dengan Menggunakan Metode K-Means Clustering', ' 0407016801', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018022', 'Penerapan Algoritma Boyer-Moore Dalam Aplikasi Kamus Istilah Broadcasting', '0530077601', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018023', 'Sistem Pendukung Keputusan Analisis Efisiensi Modal Kerja Pada Perusahaan Yang Terdaftar di BEI', '0522018302', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018026', 'Aplkasi Pendeteksi Kemiripan Portal Berita Online Menggunakan Metode Lavenstein Distance', '0526018502', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018027', 'Deteksi Jenis Kertas Tisu Menggunakan Pendekatan Ciri Tekstur', '0510077302', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018028', 'penerapan data mining untuk clustering prediksi penyakit ispa dengan metode k-means', ' 0407016801', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018029', 'Pengembangan Sistem Informasi Distribusi Zakat di LAZISmu DIY', '0505118901', '25/03/2019', 'Genap 18/19', '', '', 'Metopen'),
('1500018032', 'Penerapan Stemming Pada Kata Berimbuhan Bahasa Jawa Dengan Menggunakan Algoritma Nazief dan Andriani', '0530077601', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018033', 'Rancang Bangun e-commerce untuk penjualan produk pemeliharaan sawit berbasis pwa (Progressive Web Apps) Studi Kasus Toko Aroldi Jaya, Belanti Jaya, Batanghari, Jambi', '0014107301', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018035', 'Penerapan text mining pengelompokkan judul manajemen tugas proyek menggunakan metode k-means dengan cosine similarity', '0407016801', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018036', 'Menentukan Kualitas Daun Teh Kering Menggunakan Metode Gray Level Co-Occurrence Matrix', '0530077701', '25/03/2019', 'Genap 18/19', '', '', 'Metopen'),
('1500018038', 'Layanan Teknologi Informasi Berbasis Mobile Untuk Pelayanan Kesehatan Pada Ibu Hamil Menggunakan Pendekatan Customer Relationship Management', '0530077701', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018046', 'SPK investasi perusahaan di bei dengan metode rasio keuangan', '0522018302', '25/03/2019', 'Genap 18/19', '', '', 'Metopen'),
('1500018048', 'Klassifikasi Jenis Kayu Berdasarkan Kode Mutu Kayu Dengan Menggunakan Metode K-Means', '0505118901', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018049', 'Implementasi Resful Web Service Untuk Integrasi Sistem Informasi Penjualan Reseller', '0006027001', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018050', 'Aplikasi Kamus Slang Menggunakan Metode Brute Force', '0530077601', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018052', 'Text mining dalam klarifikasi dan pencarian judul buku pada perpustakaan menggunakan metode naive bayes', '0512078304', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018053', 'Perancangan Chatbot Penerimaan Mahasiswa bru Menggunakan Metode AIML Sebagai Virtual Assistant Berbasis Web', '0530077601', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018058', 'Sistem Rekomendasi Pembelian Smartphone Menggunakan Metode K-Nearst Neighboard (KNN)', '0519108901', '25/03/2019', 'Genap 18/19', '', '', 'Metopen'),
('1500018059', 'Analisis Pengarus Game Pada Aktivitas Kognitif Anak Menggunakan Alat EEG dengan Metode K-Means dan Cluster', '0505118901', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018061', 'Sistem pendukung keputusan pemilihan smartphone menggunakan metode analitical hierarchy process ', '0505118901', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018063', 'Perancangan Aplikasi Kamus Istilah Kesenian Pada Fakultas Seni Rupa Institut Seni Indonesia (ISI) Yogyakarta Dengan Menggunakan Spellcheck Leuenstein Distance Berbasis Web', '0530077601', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018065', 'Sistem Pendukung eputusan Diagnosa Gangguan Kepribadian Antisosial', '0522018302', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018066', 'Diagnosis Penyakit Pre Eklamsia pada Ibu Hamil dengan Algoritma C4.5 Berbasis Rules Datamining', '0504088601', '25/03/2019', 'Genap 18/19', '', '', 'Metopen'),
('1500018068', 'Steganografi Gambar Dengan Metode LSB Untuk Proteksi Komunikasi Pada Media Online', '0006027001', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018069', 'Aplikasi Steganografi Menggunakan Metode LSB Pada Citra Digital', '0006027001', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018071', 'Perancangan Desain User Interface dan User Experience Aplikasi Chains', '0523068801', '25/03/2019', 'Genap 18/19', '', '', 'Metopen'),
('1500018074', 'Implementasi Metode Motion Graphic Pada Video Animation Pendaftaran Offline di Universitas Ahmad Dahlan', '0520098702', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018075', 'Analisis keamanan WLAN pada tetring', '0521127303', '25/03/2019', 'Genap 18/19', '', '', 'Metopen'),
('1500018078', 'Penerapan Data Mining untuk Klasterisasi Pemustaka dengan Metode KMeans Berdasarkan Kunjungan', '0407016801', '25/03/2019', 'Genap 18/19', '', '', 'Metopen'),
('1500018081', 'Evaluasi Kualitas Website Digilib UAD Menggunakan Webqual 4.0 dan Importance Performance Analysis', '0019087601', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018082', 'Implementasi Shape Tween pada animasi bahaya penggunaan gadget untuk game battle royale pada anak', '0520098702', '25/03/2019', 'Genap 18/19', '', '', 'Metopen'),
('1500018083', 'Penerapan Metode Stop Motion Animation Pada Video Profil Kelompok Keilmuan Relata Dan Sistem Cerdas Prodi Teknik Informatika UAD', '0520098702', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018084', 'Evaluasi Kualitas Website Digilib UAD Menggunakan Metode Usability Testing', '0019087601', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018085', 'Perancangan Game Edukasi \"Petualangan Anak Sholeh\" Menggunakan Adobe Flash Berbasis Android', '0520098702', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018086', 'Pola Peminjaman Buku Perpustakaan Universitas Ahmad Dahlan Menggunakan Algoritma Eclat', '0511098401', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018088', 'Penentuan Masa Tanam Tanaman Pangan Berdasarkan Cuaca dan Hasil Panen Menggunakan Metode Naïve Bayes', '0015118001', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018089', 'Pengenalan Gerakan Isyarat Dengan Sensor Kinect Menggunakan Long Short-Term Memory', '0524118801', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018090', 'Implementasi Motion Tewwn pada animasi bahaya penggunaan gadget pada anak anak', '0520098702', '25/03/2019', 'Genap 18/19', '', '', 'Metopen'),
('1500018093', 'Sistem Pendukung Keputusan Pentuan Kelayakan Industri Rumahan dengan Metode Simple Additive Weighting (SAW)', '0516127501', '25/03/2019', 'Genap 18/19', '', '', 'Metopen'),
('1500018100', 'Sistem Pendukung Keputusan Penentuan Jenis Kualitas Kayu Jati', '0504088601', '25/03/2019', 'Genap 18/19', '', '', 'Metopen'),
('1500018102', 'Pengelompokan data bank sampah menggunakan metode AHC', '0511098401', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018108', 'penerapan Search Engine Optimisation dengan metode result rich snippet google pada muslim-bloggers.com', '0526018502', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018112', 'Penerapan Metode Image Stitching Pada Pembuatan Virtual Reality Pengenalan Islamic Center Universitas Ahmad Dahlan', '0520098702', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018113', 'Mobile Forensic Instant Messenger Berbasis Android Menggunakan Metode Live Forensic', '0509048901', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018114', 'Sistem Pendukung Keputusan Pemilihan Kamera DSLR dengan Metode AHP', '0504088601', '25/03/2019', 'Genap 18/19', '', '', 'Metopen'),
('1500018116', 'Investigasi Forensik Tindak Kejahatan  E-Commerce dengan Metode Eksperiment  Reaserch', '0510088001', '25/03/2019', 'Genap 18/19', '', '', 'Metopen'),
('1500018118', 'penggunaan metode c45 clustering dalam penentuan penerima beasiswa universitas ahmad dahlan yogyakarta', '0512078304', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018120', 'Perancangan Sistem Pembelajaran Augmen Reality Berbasis Mobile', '0524118801', '25/03/2019', 'Genap 18/19', '', '', 'Metopen'),
('1500018123', 'Deteksi Sepeda Motor Tanpa Helm pada Video lalu lintas', '0530077601', '25/03/2019', 'Genap 18/19', '', '', 'Metopen'),
('1500018127', 'Rekomendasi Jenis Tanaman Pangan Berdasarkan Data Prediksi Cuaca Menggunakan Metode Simple Additive Weighting (SAW)', '0015118001', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018129', 'Klasifikasi artikel bahasa Indonesia ', '0530077601', '25/03/2019', 'Genap 18/19', '', '', 'Metopen'),
('1500018132', 'Efektifitas Game Edukasi Untuk Meningkatkan Kemampuan Perhitungan Bagi Anak Kesulitan Belajar', '0020077901', '25/03/2019', 'Genap 18/19', '', '', 'Metopen'),
('1500018134', 'Penerapan Metode Flexible Pointer Pada Simulasi Interaktif Pengenalan Anatomi Gigi Manusia Berbasis Virtual Reality', '0523068801', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018135', 'Penerapan Data Mining Untuk Pencarian Pola Asosiasi Data Penjualan Pada Ki-kha Shop Menggunakan Algoritma FP-Growth', '0511098401', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018140', 'Penerapan metode Association Rules menggunakan algoritma apriori untuk mengidentifikasi fitur yang sering diakses bersamaan pada log data akses portal dosen universitas ahmad dahlan', '0521128502', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018143', 'Implementasi Chatbot Pada Sistem Penerimaan Mahasiswa Baru Universitas Ahmad Dahlam Dengan Metode Vector Space Model', '0523077902', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018144', 'Penerapan Metode Crips Data Mining dengan Algoritma FP-Growth untuk Mendapatkan Pola Asosiasi (Studi Kasus SeblakCuzz Pusat Yogyakarta)  ', '0511098401', '25/03/2019', 'Genap 18/19', '', '', 'Metopen'),
('1500018145', 'Sistem Pakar Diagnosa Penyakit Gigi dan Mulut dengan Metode Naïve Bayes', '0521128502', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018146', 'Penerapan Metode Motion Graphic Pada Video Animasi Kerja Praktek DI Teknik Informaika Universitas Ahmad Dahlan', '0520098702', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018148', 'Pembuatan Model Prediksi Dampak Kecelakaan Lalu Lintas pada Pengguna Jalan Menggunakan Klasifikasi Data Mining dengan Metode Pohon Keputusan (studi kasus : Polres Bantul)', '0407016801', '25/03/2019', 'Genap 18/19', '', '', 'Metopen'),
('1500018150', 'Analisis Forentik Malicious pada Hardisk dengan Menggunakan Metode (NPJ)', '0510088001', '25/03/2019', 'Genap 18/19', '', '', 'Metopen'),
('1500018151', 'Penerapan metode frame by frame pada iklan layanan masyarakat menejemen tugas proyek teknik informatika universitas ahmad dahlan.', '0520098702', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018153', 'Implementasi Metode Cart Untuk Mendiagnosa Penyakit Hepatitis A pada Anak', '0522018302', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018155', 'Media Pembelajaran Augmented Reality, Pengembangan Media Pembelajaran Berbasis Augmented Reality di Pembelajaran Ilmu Pengetahuan Alam Sekolah Dasar', '0020077901', '25/03/2019', 'Genap 18/19', '', '', 'Metopen'),
('1500018156', 'Analisa Tingkat Keamanan Suatu Web dengan Serangan Injection', '0019087601', '25/03/2019', 'Genap 18/19', '', '', 'Metopen'),
('1500018157', 'Sistem pendukung keputusan Diagnosa kerusakan pada komputer', '0522018302', '25/03/2019', 'Genap 18/19', '', '', 'Metopen'),
('1500018159', 'Sistem Pakar Diagnosa Kerusakan Mobil Mitsubishi MVP dengan Menggunakan Metode Fuzzy K-NN', '0521128502', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018160', 'Media Pembelajaran Augmented Reality', '0020077901', '25/03/2019', 'Genap 18/19', '', '', 'Metopen'),
('1500018161', 'Sistem Rekomendasi Khutbak Jumat Berdasarkan Trending Topic Twitter Menggunakan Vector Space Model', '0523077902', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018162', 'Sistem Pakar Diagnosis Hama dan Penyakit Tanaman Kelapa Sawit Menggunakan Metode Dempster Shafer', '0521128502', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018163', 'Penerapan Association Rules menggunakan algoritma fp growth untuk analisis pola pelaksanaan skripsi pada program studi teknik Informatika UAD', '0512078304', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018164', 'Analisa Forensik Facebook dalam Kasus Cybercrime ', '0510088001', '25/03/2019', 'Genap 18/19', '', '', 'Metopen'),
('1500018166', 'Penerapan Sistem Pendukung Keputusan Pada Sistem Irigasi Otomatis Menggunakan Wireless Sensor Network (WSN)', '0015118001', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018167', 'Penerapan data mining untuk memprediksi koleksi yang sering si pinjam di perpustakan UAD ', '0407016801', '25/03/2019', 'Genap 18/19', '', '', 'Metopen'),
('1500018169', 'Implementasi Wireless Sensor Network (WSN) Pada Pemantauan Sistem Irigasi Sawah Menggunakan Micro Computer', '0015118001', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018171', 'Sistem Pakar Diagnosa Masalah Kehamilan Menggunakan Metode Fuzzy Tsukamoto', '0521128502', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018172', 'Penanganan Missing Value Pada Dataset Estimasi Effort Perangkat Lunak Menggunakan Decision Tree', '0523077902', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018173', 'Penerapan Association Rules untuk Mengidentifikasi Fitur Yang diakses bersamaan pada log data portal mahasiswa universitas ahmad dahlan dengan algoritma apriori', '0521128502', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018174', 'Forensic Local GPS Pada Smarthone Platform Android', '0509048901', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018176', 'Analisis algoritma LUC berdasarkan kecepatan dan ukuran file ', '0019087601', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018183', 'Analisis Perbandingan Algoritma Kriptografi Elgamal dan Base64 Berdasarkan Kecepatan dan Ukuran File', '0019087601', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018185', 'Analisis Forensik Web Terhadap Serangan CSRF(Frame Woth OWASP)', '0509048901', '25/03/2019', 'Genap 18/19', '', '', 'Metopen'),
('1500018186', 'Prediksi  lama studi mahasiswa FTI dengan metode naive bayes', '0512078304', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018187', 'Clustering data Mahasiswa FTI dengan Metode Fuzzy C-Means', '0512078304', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018188', 'Sistem Pakar Diagnosa Penyakit Sapi Menggunakan Metode Fuzzy C-Means Clustering', '0521128502', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018190', 'Sistem Rekomendasi Pemilihan Program Studi dengan Metode FCM', '0512078304', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018191', 'Analisis ForensikDigital pada Aplikasi Twitter untuk Penanganan Cybercrime', '0510088001', '25/03/2019', 'Genap 18/19', '', '', 'Metopen'),
('1500018195', 'Sistem Pakar Diagnosa Infeksi Saluran Pernapasan Akut (ISPA) Pada Balita Menggunakan C4.5', '0522018302', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018196', 'Pengelompokkan Judul Penelitian Dosen Menggunakan Metode Suffix Tree Clustering', '0511098401', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018197', 'Rancangan Skema Login Menggunakan Metode Steganografi Least Significant Bit (LSB) Untuk Mengurangi Kemungkinan Keylogger', '0006027001', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018198', 'Sistem pakar diagnosa kerusakan transmisi manual pada mobil ', '0516127501', '25/03/2019', 'Genap 18/19', '', '', 'Metopen'),
('1500018199', 'Pengelompokkan Data Kerja Praktek Teknik Kimia Menggunakan Metode K-Medoids', '0511098401', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018200', 'Pengembangan Aplikasi Topik Tugas Akhir Mahasiswa Sastra Inggris dengan Menggunakan Cosine Similarity', '0516127501', '25/03/2019', 'Genap 18/19', '', '', 'Metopen'),
('1500018202', 'Penerapan Metode Dictation Grammar Pada Virtual Asistant Cloud', '0523068801', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018203', 'Penerapan Text Mining Dalam Pengelompokkan Data Kerja Praktek Menggunakan Metode K-Means', '0511098401', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018204', 'Implementasi Teknollogi Augmented Reality Media Pengenalan Aksara Lampung Berbasis Android', '0520098702', '25/03/2019', 'Genap 18/19', '', '', 'Metopen'),
('1500018207', 'Pemanfaatan Web Crawler untuk mengumpulkan informasi pada media sosial twitter tentang Universitas Ahmad Dahlan', '0512078304', '25/03/2019', 'Genap 18/19', '', '', 'Metopen'),
('1500018208', 'Penerapan Markerless Defined Target Untuk Aplikasi Perencana Tata Letak Perabot Berbasis Augmented Reality', '0523068801', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018209', 'Implementasi pengelompokan data kerja praktek prodi teknik informatika menggunakan metode K-Means', '0407016801', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018211', 'Penerapan Data Mining untuk Pengelompokkan Data Pelanggan Agen Lion Parcel dengan Metode Fuzzy C-means', '0511098401', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018213', 'Sistem pengambilan keputusan inventory obat pada puskesmas sukorejo 1 kendal dengan metode fifo', '0522018302', '25/03/2019', 'Genap 18/19', '', '', 'Metopen'),
('1500018214', 'Prediksi persentase masa studi kelulusan tepat waktu teknik industri dengan metode c45 pak', '0511098401', '25/03/2019', 'Genap 18/19', '', '', 'Metopen'),
('1500018217', 'Implementasi Service Oriented Architecture Pada Aplikasi Pemesanan Makanan Berbasis Mobile Android Di Kantin ADI Kampus 3 UAD', '0507087202', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018218', 'evaluasi kualitas website PPDB.smkn1karimun.sch.id menggunakan frameworkk webquel', '0019087601', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018219', 'Peningkatan Keamanan Basis Data Pada Website SMK N 1 Karimun Dengan Kriptografi Caesar Chiper dan RSA', '0019087601', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018222', 'Pengenalan Suara dan Objek Hewan Sebagai Media Pembelajaran Siswa SD Kelas 4 Berbasis Macromedia Flash', '0510077302', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018225', 'Evaluasi Kualitas Website PPDB.smkn1karimun.sch.id menggunakan Framework webquel. Dan Analisa Metode Quality Function Deployment (QFD)', '0019087601', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018227', 'Deteksi Perubahan Objek Menggunakan Metode Template Matching', '0510077302', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018229', 'Media Pembelajaran Pengenalan Huruf Abjad Untuk Anak TK', '0510077302', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018230', 'Forensik Email untuk Mendeteksi Serangan Phishing Menggunakan Metode NIST', '0521127303', '25/03/2019', 'Genap 18/19', '', '', 'Metopen'),
('1500018232', 'Deteksi Kematangan Buah Naga Menggunakan Metode Naïve Bayes Berbasis Ruang Warna Hue Saturation Value', '0510077302', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018234', 'Sistem Pengenalan Dosen Di Kampus Melalui Kamera Pengawas Dengan Metode Background Subtraction dan Eigenface', '0505118901', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018235', 'Analisis Data Transaksi di Apotek Al-Fath Medic Berdasarkan Cuaca Menggunakan Algoritma Apriori', '0511098401', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018236', 'Penerapan data mining untuk memprediksi kelulusan mahasiswa berdasarkan kunjungan di perpustakaan dengan metode C45', '0407016801', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018237', 'Rekomendasi Website Pemesanan Hotel Menggunakan Metode Analytic Network Proccess (AMP)', '0526018502', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018241', 'Aplikasi Multimedia Interaktif dengan Model Addie Pada Mata Pelajaran Pancasila', '0510077302', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018242', 'Rekomendasi Pembimbing dan Penguji Tugas Akhir Menggunakan Vector Space Model', '0523077902', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018245', 'Sistem Pendukung Keputusan Pemilihan Suppllied Kain Menggunakan Metode Promotehee', '0510077302', '25/03/2019', 'Genap 18/19', '', '', 'Metopen'),
('1500018246', 'Sistem Rekomendasi Konten Dalam Jejaring Sosial Youtube', '0407016801', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018247', 'Penerapan Data Mining Penjualan Sepatu Menggunakan Metode Klasifikasi Algoritma Apriori dan C45', '0510077302', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018249', 'Pengenalan Wajah Untuk Presensi Mahasiswa Universitas Ahmad Dahlan Menggunakan Convolutional Neural Network', '0524118801', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018251', 'Optimasi keamanan Plug-in pada Open Journal Sistem(OJS Versi 0.3)2.Rancang Bangun IoT Forensics pada perangkat Mobile 3.IoT Attack berbasis Open Router', '0509048901', '25/03/2019', 'Genap 18/19', '', '', 'Metopen'),
('1500018256', 'Analisis Investigasi Forensik Line Massenger Berbasis Web ', '0510088001', '25/03/2019', 'Genap 18/19', '', '', 'Metopen'),
('1500018257', 'Analisis Investigasi Forensik Telegram Messenger Berbasis Web Metode NIST', '0510088001', '25/03/2019', 'Genap 18/19', '', '', 'Metopen'),
('1500018259', 'Analisa dan Perbandingan Bukti Forensik Aplikasi Media Sosial Facebook dan Twitter pada Smartphone Android', '0506016701', '25/03/2019', 'Genap 18/19', '', '', 'Metopen'),
('1500018265', 'Analisis Pencarian Berita Hoax pada Aplikasi Whatsapp Messenger Berbasis Web', '0521127303', '25/03/2019', 'Genap 18/19', '', '', 'Metopen'),
('1500018266', 'Penerapan Metode InterPenerapan Metode Interpolation Search Pada Aplikasi Kamus Istilah Ekonomi', '0530077601', '25/03/2019', 'Genap 18/19', '', '', 'Metopen'),
('1500018267', 'Penerapan Data Mining untuk Memprediksi Penentuan Skripsi Prodi Sastra Inggris UAD Menggunakan Metode Cosine Similarity', '0516127501', '25/03/2019', 'Genap 18/19', '', '', 'Metopen'),
('1500018268', 'Analisis Association Rule pada Data Mahasiswa Skripsi Prodi Sastra Inggris', '0516127501', '25/03/2019', 'Genap 18/19', '', '', 'Metopen'),
('1500018269', 'Penerapan Metode Naive Bayes dalam pengidentifikasian kualitas kesuburan tanah', '0511098401', '25/03/2019', 'Genap 18/19', '', '', 'Metopen'),
('1500018270', 'Forensik Web Terhadap Serangan SQL Injection', '0019087601', '25/03/2019', 'Genap 18/19', '', '', 'Metopen'),
('1500018271', 'Analisis Forensik Digital pada Web Server untuk Penanganan Kasus Cyber Crime Phising', '0506016701', '25/03/2019', 'Genap 18/19', '', '', 'Metopen'),
('1500018276', 'Sistem Informasi Penjualan dengan Berbasis Web dengan Metode CRM', '0507087202', '25/03/2019', 'Genap 18/19', '', '', 'Metopen'),
('1500018278', 'Analisis Penggunaan QOS(Quality Of Service) pada Komputer', '0521127303', '25/03/2019', 'Genap 18/19', '', '', 'Metopen'),
('1500018279', 'Penerapan Data Mining dalam Melakukan Analisis Pola Asosiasi Menggunakan Metode FP.Growht Pada Data Nilai Mahasiswa T.Industri', '0511098401', '25/03/2019', 'Genap 18/19', '', '', 'Metopen'),
('1500018280', 'Penentuan Reviewer Otomatis Pada Open Jurnal System Menggunakan Latent Semantic Analysis', '0523077902', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018281', 'Aplikasi kamus bahasa indonesia -ngapak berbasis web dengan metode sequential search', '0506016701', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018282', 'Sistem Informasi Penjualan dengan Berbasis Mobile dengan Metode CRM', '0507087202', '25/03/2019', 'Genap 18/19', '', '', 'Metopen'),
('1500018283', 'Aplikasi Android Pembelajaran Anak Sholeh Tentang Game Tebak Huruf Hijaiyah Untuk Anak Paud Menggunakan Android Studio', '0504116601', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018294', 'Media Pembelajaran Pengenalan Objek Dengan Augmented Reality Untuk Anak Gangguan Pendengaran', '0020077901', '25/03/2019', 'Genap 18/19', '', '', 'Metopen'),
('1500018296', 'Sistem Pendukung Keputusan Penentuan Prioritas Bantuan Start-Up Menggunakan Anlitical Herarechy Process', '0507087202', '25/03/2019', 'Genap 18/19', '', '', 'Metopen'),
('1500018298', 'Pengembangan rekomendasi sistem pada reservasi wisata dengan menerapkan metode profile matching', '0523068801', '25/03/2019', 'Genap 18/19', '', '', 'Metopen'),
('1500018299', 'Sistem Pendukung Keputusan Persetujuan Kredit Usaha Mikro dengan Metode (Moora)', '0507087202', '25/03/2019', 'Genap 18/19', '', '', 'Metopen'),
('1500018300', 'Analysis & Implementasi kelayakan website Bimawa UAD dengan Metode Usability Testing', '0519108901', '25/03/2019', 'Genap 18/19', '', '', 'Metopen'),
('1500018301', 'Analisis Bukti Digital Serangan Bomb Mail Menggunakan Metode NIST', '0521127303', '25/03/2019', 'Genap 18/19', '', '', 'Metopen'),
('1500018303', 'Aplikasi Android Pembelajaran Anak Sholeh Tentang Game Tebak Gambar Untuk Anak PAUD Menggunakan Android Studio', '0504116601', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018304', 'Analisa Forensik Layanan Jaringan Cloud', '0510088001', '25/03/2019', 'Genap 18/19', '', '', 'Metopen'),
('1500018306', 'Pembangunan Aplikasi Pembelajaran Doa Sehari Hari Anak Soleh Berbasis Android Menggunakan Android Studio', '0504116601', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018310', 'Sistem Penentuan Kelayakan Usaha Industri Rumahan Dengan Metode Profile Matching', '0516127501', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018311', 'Investigasi Forensik pada E-Mail Spooting Menggunakan Metode Networks Forensik Development Life Cycle (NFDLC)', '0521127303', '25/03/2019', 'Genap 18/19', '', '', 'Metopen'),
('1500018317', 'Perancangan Aplikasi Android Macam-macam Shalat dan Gerakannya Untuk Media Pembelajaran Anak Sholeh Usia Dini', '0504116601', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018318', 'Sistem Penentuan Potensi Daerah Industri Rumahan Wilayah Kabupaten Bantuk Dengan Metode Transfer Learning', '0516127501', '16/07/2019', 'Gasal 18/19', '', '', 'Metopen'),
('1500018319', 'Sistem Pendukung Pengambilan Keputusan untuk Penerimaan Pegawai dengan Metode SAW (Simple Additive Weighting)', '0507087202', '25/03/2019', 'Genap 18/19', '', '', 'Metopen'),
('1588867676898', 'Pendaftaran parkir', '0006027001', '18/08/2020', 'Genap 18/19', '', '', 'Metopen'),
('1600018070', 'implementasi metode motion capture pada animasi 3d', '0524118801', '15/09/2020', 'Gasal 20/21', '0520098702', '0504116601', 'Skripsi'),
('1600018080', 'Penjadwalan tugas akhir otomatis menggunakan metode matriks', '0523077902', '16/09/2020', 'Gasal 20/21', '0523068801', '0530077601', 'Skripsi'),
('1600018094', 'Pembuatan animasi 3d tarian tradisional', '0020077901', '15/09/2020', 'Gasal 20/21', '0504116601', '', 'Skripsi'),
('1600018100', 'Rancang bangun agenda penjadwalan rapat program sutdi menggunakan metode waterfall', '0523077902', '11/09/2020', 'Gasal 20/21', '0523068801', '0407016801', 'Skripsi');

-- --------------------------------------------------------

--
-- Table structure for table `temp_judul`
--

CREATE TABLE `temp_judul` (
  `dosen` varchar(50) NOT NULL,
  `judul` varchar(500) NOT NULL,
  `skor` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `bimbingan`
--
ALTER TABLE `bimbingan`
  ADD PRIMARY KEY (`id_bimbingan`,`nim`,`niy`),
  ADD KEY `nim` (`nim`,`niy`),
  ADD KEY `niy` (`niy`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nidn`),
  ADD KEY `niy` (`nidn`);

--
-- Indexes for table `jadwal_dosen`
--
ALTER TABLE `jadwal_dosen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal_dosen1`
--
ALTER TABLE `jadwal_dosen1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal_pendadaran`
--
ALTER TABLE `jadwal_pendadaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `judul_dosen`
--
ALTER TABLE `judul_dosen`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `logbook`
--
ALTER TABLE `logbook`
  ADD PRIMARY KEY (`nim`,`tgl_bimbingan`),
  ADD KEY `id_bimbingan` (`nim`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `pendadaran`
--
ALTER TABLE `pendadaran`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `penjadwalan`
--
ALTER TABLE `penjadwalan`
  ADD PRIMARY KEY (`jamke`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seminar`
--
ALTER TABLE `seminar`
  ADD PRIMARY KEY (`nim`),
  ADD KEY `nim` (`nim`);

--
-- Indexes for table `skripsi`
--
ALTER TABLE `skripsi`
  ADD PRIMARY KEY (`nim`,`judul`),
  ADD KEY `niy` (`pembimbing`),
  ADD KEY `nim` (`nim`),
  ADD KEY `judul` (`judul`,`pembimbing`);

--
-- Indexes for table `temp_judul`
--
ALTER TABLE `temp_judul`
  ADD PRIMARY KEY (`dosen`,`judul`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bimbingan`
--
ALTER TABLE `bimbingan`
  MODIFY `id_bimbingan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jadwal_dosen`
--
ALTER TABLE `jadwal_dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `jadwal_dosen1`
--
ALTER TABLE `jadwal_dosen1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=997;

--
-- AUTO_INCREMENT for table `jadwal_pendadaran`
--
ALTER TABLE `jadwal_pendadaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=701;

--
-- AUTO_INCREMENT for table `penjadwalan`
--
ALTER TABLE `penjadwalan`
  MODIFY `jamke` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
