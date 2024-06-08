-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2023 at 09:29 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reciclame`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_adm`
--

CREATE TABLE `tb_adm` (
  `idAdm` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_adm`
--

INSERT INTO `tb_adm` (`idAdm`, `usuario`, `senha`) VALUES
(2, 'admin', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5');

-- --------------------------------------------------------

--
-- Table structure for table `tb_empresas`
--

CREATE TABLE `tb_empresas` (
  `idEmpresa` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cnpj` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(64) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `localizacao` varchar(255) NOT NULL,
  `tel` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_empresas`
--

INSERT INTO `tb_empresas` (`idEmpresa`, `nome`, `cnpj`, `email`, `senha`, `latitude`, `longitude`, `localizacao`, `tel`) VALUES
(15, 'Kanksreciclagem', '9999999999999', 'rafaelhenriquetrooll@gmail.com', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', -22.4251541, -46.8301717, 'R. Carlos Venturini, 99 - Lot. Joao de Barros, Itapira - SP, 13976-145, Brazil', '(19) 45645-6654'),
(16, 'ascorsi', '9999999999999', 'carlos05muringa@gmail.com', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', -22.4301964, -46.8254453, 'R. Sd. Constitucionalista, 98 - Jardim Soares, Itapira - SP, 13976-025, Brazil', '(19) 45645-6654'),
(17, 'etevaldo', '9999999999999', 'adria.cruz@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', -22.4144207, -46.8188405, 'R. David Faraco, 153 - Jardim Galego, Itapira - SP, 13971-260, Brazil', '(19) 45645-6654');

-- --------------------------------------------------------

--
-- Table structure for table `tb_lixeiras`
--

CREATE TABLE `tb_lixeiras` (
  `idLixeira` int(11) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `peso` float NOT NULL,
  `volume` float NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `nome` varchar(255) NOT NULL,
  `idEmpresa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_lixeiras`
--

INSERT INTO `tb_lixeiras` (`idLixeira`, `tipo`, `peso`, `volume`, `latitude`, `longitude`, `nome`, `idEmpresa`) VALUES
(39, 'Plastico', 50, 50, -22.4255683, -46.8300221, 'Carlos venturine, Della Rocha, itapira , brasil', 15),
(41, 'Plastico', 50, 50, -22.4445997, -46.8187192, 'Av. dos Italianos, 2120 - Prados, Itapira - SP', 16),
(43, 'Plastico', 50, 50, -22.4329607, -46.8319485, 'R. Tereza Lera Paoletti, Bela Vista, Itapira, brasil', 15),
(44, 'Plastico', 50, 50, -22.4445997, -46.8187192, 'Av. dos Italianos, 2120 - Prados, Itapira - SP', 15),
(45, 'Papel', 50, 50, -22.4155876, -46.8214036, 'R. David Faraco, 445 - Jardim Galego, Itapira - SP, 13971-260', 17),
(46, 'Metal', 50, 50, -22.4255683, -46.8300221, 'Carlos venturine, Della Rocha, itapira , brasil', 17),
(47, 'Papel', 50, 50, -22.4255683, -46.8300221, 'Carlos venturine, Della Rocha, itapira , brasil', 15);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_adm`
--
ALTER TABLE `tb_adm`
  ADD PRIMARY KEY (`idAdm`);

--
-- Indexes for table `tb_empresas`
--
ALTER TABLE `tb_empresas`
  ADD PRIMARY KEY (`idEmpresa`);

--
-- Indexes for table `tb_lixeiras`
--
ALTER TABLE `tb_lixeiras`
  ADD PRIMARY KEY (`idLixeira`),
  ADD KEY `fk_idEmpresa` (`idEmpresa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_adm`
--
ALTER TABLE `tb_adm`
  MODIFY `idAdm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_empresas`
--
ALTER TABLE `tb_empresas`
  MODIFY `idEmpresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tb_lixeiras`
--
ALTER TABLE `tb_lixeiras`
  MODIFY `idLixeira` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_lixeiras`
--
ALTER TABLE `tb_lixeiras`
  ADD CONSTRAINT `fk_idEmpresa` FOREIGN KEY (`idEmpresa`) REFERENCES `tb_empresas` (`idEmpresa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
