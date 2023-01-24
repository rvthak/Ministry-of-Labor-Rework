-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Φιλοξενητής: 127.0.0.1
-- Χρόνος δημιουργίας: 20 Ιαν 2021 στις 22:37:19
-- Έκδοση διακομιστή: 10.4.17-MariaDB
-- Έκδοση PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `sdi1800141`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `adeies`
--

CREATE TABLE `adeies` (
  `employee_id` varchar(9) NOT NULL,
  `name_employee` varchar(25) NOT NULL,
  `business_name` varchar(20) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `type` text NOT NULL,
  `confirmed` tinyint(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `adeies`
--

INSERT INTO `adeies` (`employee_id`, `name_employee`, `business_name`, `start_date`, `end_date`, `type`, `confirmed`) VALUES
('192837465', 'Δήμητρα Παπαδάκη', 'Παιχνιδίσματα', '2021-01-20', '2021-01-30', 'Άδεια λόγω ασθένειας', 0),
('192837465', 'Δήμητρα Παπαδάκη', 'Παιχνιδίσματα', '2021-01-21', '2021-01-29', 'Άδεια μητρότητας', 0),
('192837465', 'Δήμητρα Παπαδάκη', 'Παιχνιδίσματα', '2021-02-14', '2021-02-20', 'Ετήσια άδεια', 0),
('987654321', 'Γιώργος Ξένος', 'Παιχνιδίσματα', '2021-01-17', '2021-01-29', 'Άδεια λόγω ασθένειας', 1),
('987654321', 'Γιώργος Ξένος', 'Παιχνιδίσματα', '2021-01-20', '2021-01-21', 'Άδεια εμβολιασμού κατά του COVID-19', 0),
('987654321', 'Γιώργος Ξένος', 'Παιχνιδίσματα', '2021-02-01', '2021-02-05', 'Άδεια γονικής φροντίδας', 0),
('987654321', 'Γιώργος Ξένος', 'Παιχνιδίσματα', '2021-02-10', '2021-02-24', 'Άδεια λόγω Aσθένειας', 1),
('987654321', 'Γιώργος Ξένος', 'Παιχνιδίσματα', '2021-02-15', '2021-02-20', 'Άδεια γάμου', 0);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `business_data`
--

CREATE TABLE `business_data` (
  `id` varchar(9) NOT NULL,
  `business_name` varchar(25) NOT NULL,
  `year` year(4) NOT NULL,
  `status` varchar(15) NOT NULL,
  `office` varchar(10) NOT NULL,
  `region` varchar(10) NOT NULL,
  `end_mng` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `business_data`
--

INSERT INTO `business_data` (`id`, `business_name`, `year`, `status`, `office`, `region`, `end_mng`) VALUES
('123456789', 'Παιχνιδίσματα', 2000, 'Ενεργή', 'Πεύκη', 'Αττική', '2030-10-11');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `business_employees`
--

CREATE TABLE `business_employees` (
  `business_id` varchar(9) NOT NULL,
  `business_name` varchar(25) NOT NULL,
  `employee_id` varchar(9) NOT NULL,
  `status` varchar(15) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `business_employees`
--

INSERT INTO `business_employees` (`business_id`, `business_name`, `employee_id`, `status`, `start_date`, `end_date`) VALUES
('123456789', 'Παιχνιδίσματα', '192837465', 'Αναβολή', '2020-11-01', '0000-00-00'),
('123456789', 'Παιχνιδίσματα', '987654321', 'Τηλεργασία', '2020-12-15', '0000-00-00');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `rantevou`
--

CREATE TABLE `rantevou` (
  `datetime` datetime NOT NULL,
  `user_id` varchar(9) NOT NULL,
  `text` text NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `mail` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `rantevou`
--

INSERT INTO `rantevou` (`datetime`, `user_id`, `text`, `name`, `phone`, `mail`) VALUES
('2021-01-22 10:00:00', '', 'Ενημέρωση για καφετέριες', 'Ραφαέλα', '6938472635', 'rafaela@mail.com'),
('2021-01-23 11:00:00', '', 'Ενημέρωση για καφετέριες.', 'Ραφαέλα', '6995142863', NULL),
('2021-01-30 11:00:00', '', 'Ενημέρωση.', 'Ραφαέλα', '6947284913', NULL),
('2021-03-21 09:00:00', '123456789', 'Ενημέρωση για την πανδημία.', 'Παιχνιδίσματα', '699514286', 'paixnidismata@mail.com'),
('2021-03-22 10:30:00', '192837465', 'Ενημέρωση για παιδοτόπους', 'Δήμητρα Παπαδάκη', '699436786', 'dimitrapap@mail.com'),
('2021-03-24 09:00:00', '987654321', 'Ενημέρωση για το άνοιγμα των παιδοτόπων.', 'Γιώργος Ξένος', '698934573', 'giorgosxenos@mail.com');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `users`
--

CREATE TABLE `users` (
  `id` varchar(9) NOT NULL,
  `role_id` tinyint(2) DEFAULT 1,
  `name` varchar(25) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `password`, `email`, `phone`) VALUES
('123456789', 2, 'Παιχνιδίσματα', 'eg8!#6', 'paixnidismata@mail.com', '699514286'),
('192837465', 1, 'Δήμητρα Παπαδάκη', '680000', 'dimitrapap@mail.com', '699436786'),
('987654321', 1, 'Γιώργος Ξένος', '670000', 'giorgosxenos@mail.com', '698934573');

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `adeies`
--
ALTER TABLE `adeies`
  ADD PRIMARY KEY (`employee_id`,`business_name`,`start_date`);

--
-- Ευρετήρια για πίνακα `business_data`
--
ALTER TABLE `business_data`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `business_employees`
--
ALTER TABLE `business_employees`
  ADD PRIMARY KEY (`business_id`,`employee_id`);

--
-- Ευρετήρια για πίνακα `rantevou`
--
ALTER TABLE `rantevou`
  ADD PRIMARY KEY (`datetime`);

--
-- Ευρετήρια για πίνακα `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
