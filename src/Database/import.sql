-- Gruppo Di Lena, Ferrari, Lavezzi, Marchetto G., Pavan
-- Classe 5F A.S. 2022-2023
-- Query per la popolazione del database di VISE
-- N.B. : lo script è valido SOLO per MySQL




-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 19, 2023 alle 02:47
-- Versione del server: 10.4.28-MariaDB
-- Versione PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vise_db`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `card`
--

CREATE TABLE `card` (
  `id` int(11) NOT NULL,
  `user_id` varchar(30) NOT NULL,
  `card_name` varchar(20) DEFAULT NULL,
  `pan` varchar(16) NOT NULL,
  `expiration_date` date NOT NULL,
  `billing_address` varchar(100) NOT NULL,
  `payment_gateway_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `card`
--

INSERT INTO `card` (`id`, `user_id`, `card_name`, `pan`, `expiration_date`, `billing_address`, `payment_gateway_id`) VALUES
(1, 'admin', 'Placeholder', '4124312', '2023-05-27', 'Viaaa', 1),
(3, 'gmarck04', 'Postepay Evolution', '111222333444555', '2023-05-01', 'Via O. Munerati, 68', 1),
(4, 'gmarck04', 'Mastercard', '12123123', '2023-05-05', 'Via O. Munerati', 1),
(5, 'Sabbia', 'Postepay Evolution', '12123123', '2023-05-02', 'Via O. Munerati, 8', 1),
(7, 'admin', 'American Express Pla', '777777777777', '2023-05-05', 'Dinny St., 78AB, Columbus', 1),
(8, 'admin', 'Postepay Evolution', '74567', '2023-05-03', 'Mental Illness Institute', 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `sender_user_id` varchar(16) NOT NULL,
  `receiver_user_id` varchar(16) NOT NULL,
  `payment_date_time` datetime NOT NULL,
  `amount` decimal(6,2) NOT NULL,
  `account_payment` tinyint(1) NOT NULL,
  `card_payment` tinyint(1) NOT NULL,
  `sender_card_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `payment`
--

INSERT INTO `payment` (`id`, `sender_user_id`, `receiver_user_id`, `payment_date_time`, `amount`, `account_payment`, `card_payment`, `sender_card_id`) VALUES
(5, 'admin', 'sabbia', '2023-05-19 01:32:02', 45.00, 1, 0, 1),
(6, 'admin', 'sabbia', '2023-05-19 01:32:44', 56.00, 1, 1, 1),
(7, 'admin', 'sabbia', '2023-05-19 01:34:52', 99.99, 1, 1, 1),
(8, 'admin', 'sabbia', '2023-05-19 01:37:59', 99.99, 1, 0, 1),
(9, 'admin', 'sabbia', '2023-05-19 01:39:39', 99.99, 1, 0, 1),
(10, 'admin', 'sabbia', '2023-05-19 01:41:14', 99.99, 1, 0, 1),
(11, 'Sabbia', 'admin', '2023-05-19 01:44:12', 100.00, 0, 1, 1),
(12, 'admin', 'sabbia', '2023-05-19 02:00:24', 25.00, 1, 0, 1),
(13, 'admin', 'sabbia', '2023-05-19 02:03:56', 10.00, 1, 0, 1),
(14, 'admin', 'sabbia', '2023-05-19 02:05:14', 2.00, 1, 0, 1),
(15, 'admin', 'sabbia', '2023-05-19 02:06:36', 2.00, 1, 0, 1),
(16, 'admin', 'sabbia', '2023-05-19 02:07:37', 2.00, 1, 0, 1),
(17, 'admin', 'sabbia', '2023-05-19 02:09:18', 2.00, 1, 0, 1),
(18, 'admin', 'sabbia', '2023-05-19 02:11:54', 1.00, 1, 0, 1),
(19, 'admin', 'sabbia', '2023-05-19 02:13:00', 1.00, 1, 0, 1),
(20, 'Sabbia', 'admin', '2023-05-19 02:13:49', 1.00, 1, 0, 1),
(21, 'admin', 'sabbia', '2023-05-19 02:17:35', 2.00, 1, 0, 1),
(22, 'Sabbia', 'admin', '2023-05-19 02:21:33', 0.50, 1, 0, 1),
(23, 'Sabbia', 'sabbia', '2023-05-19 02:21:46', 0.50, 1, 0, 1),
(24, 'Sabbia', 'sabbia', '2023-05-19 02:22:21', 1.00, 1, 0, 1),
(25, 'Sabbia', 'sabbia', '2023-05-19 02:24:15', 2.00, 1, 0, 1),
(26, 'Sabbia', 'admin', '2023-05-19 02:29:18', 3.00, 1, 0, 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `payment_gateway`
--

CREATE TABLE `payment_gateway` (
  `id` int(11) NOT NULL,
  `card_token` varchar(200) NOT NULL,
  `credit_circuit` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `payment_gateway`
--

INSERT INTO `payment_gateway` (`id`, `card_token`, `credit_circuit`) VALUES
(1, '2w123231', 'Poste Italiane');

-- --------------------------------------------------------

--
-- Struttura della tabella `user_account`
--

CREATE TABLE `user_account` (
  `username` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(64) NOT NULL,
  `tax_code` varchar(16) NOT NULL,
  `mobile_number` varchar(20) NOT NULL,
  `birth_date` date NOT NULL,
  `registration_date` date NOT NULL,
  `balance` decimal(5,2) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `user_account`
--

INSERT INTO `user_account` (`username`, `name`, `last_name`, `email`, `password`, `tax_code`, `mobile_number`, `birth_date`, `registration_date`, `balance`, `status`) VALUES
('admin', 'admin', 'admin', 'admin@gmail.com', '8C6976E5B5410415BDE908BD4DEE15DFB167A9C873FC4BB8A81F6F2AB448A918', 'DMNDMN69S69E420X', '3333333333', '1969-05-01', '2023-05-14', 450.00, 1),
('gmarck04', 'Giovanni', 'Marchetto', 'gmarck04@gmail.com', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'MRCTTOOO', '3922657585', '2004-12-26', '0000-00-00', 0.00, 1),
('Sabbia', 'Andrea', 'Lavezzi', 'andrealavezzi9@gmail.com', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'LVZNDR04S09H620S', '3488959795', '2004-11-09', '0000-00-00', 39.00, 1);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_payment_gateway_card_id` (`payment_gateway_id`),
  ADD KEY `fk_card_user_id` (`user_id`);

--
-- Indici per le tabelle `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_payment_sender_id` (`sender_user_id`),
  ADD KEY `fk_payment_receiver_id` (`receiver_user_id`),
  ADD KEY `fk_payment_sender_card_id` (`sender_card_id`);

--
-- Indici per le tabelle `payment_gateway`
--
ALTER TABLE `payment_gateway`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `card`
--
ALTER TABLE `card`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT per la tabella `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT per la tabella `payment_gateway`
--
ALTER TABLE `payment_gateway`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `card`
--
ALTER TABLE `card`
  ADD CONSTRAINT `fk_card_user_id` FOREIGN KEY (`user_id`) REFERENCES `user_account` (`username`),
  ADD CONSTRAINT `fk_payment_gateway_card_id` FOREIGN KEY (`payment_gateway_id`) REFERENCES `payment_gateway` (`id`);

--
-- Limiti per la tabella `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `fk_payment_receiver_id` FOREIGN KEY (`receiver_user_id`) REFERENCES `user_account` (`username`),
  ADD CONSTRAINT `fk_payment_sender_card_id` FOREIGN KEY (`sender_card_id`) REFERENCES `card` (`id`),
  ADD CONSTRAINT `fk_payment_sender_id` FOREIGN KEY (`sender_user_id`) REFERENCES `user_account` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
