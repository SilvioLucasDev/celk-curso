-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 09-Jun-2022 às 19:00
-- Versão do servidor: 8.0.27
-- versão do PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projeto_adm`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `adms_colors`
--

DROP TABLE IF EXISTS `adms_colors`;
CREATE TABLE IF NOT EXISTS `adms_colors` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(44) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(44) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `adms_colors`
--

INSERT INTO `adms_colors` (`id`, `name`, `color`, `created`, `modified`) VALUES
(1, 'Azul', '#0275d8', '2022-03-23 15:26:59', NULL),
(2, 'Cinza', '#868e95', '2022-03-23 15:26:59', NULL),
(3, 'Verde', '#5cb85c', '2022-03-23 15:26:59', NULL),
(4, 'Vermelho', '#d9534f', '2022-03-23 15:26:59', NULL),
(5, 'Laranjado', '#f0ad4e', '2022-03-23 15:26:59', NULL),
(6, 'Azul Claro', '#17a2b8', '2022-03-23 15:26:59', NULL),
(7, 'Cinza Claro', '#343a40', '2022-03-23 15:26:59', NULL),
(8, 'Branco', '#f8f9fa', '2022-03-23 15:26:59', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `adms_confs_emails`
--

DROP TABLE IF EXISTS `adms_confs_emails`;
CREATE TABLE IF NOT EXISTS `adms_confs_emails` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(220) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(220) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(220) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `host` varchar(220) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(220) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(220) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `smtpsecure` varchar(220) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `port` int NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `adms_confs_emails`
--

INSERT INTO `adms_confs_emails` (`id`, `title`, `name`, `email`, `host`, `username`, `password`, `smtpsecure`, `port`, `created`, `modified`) VALUES
(1, 'Atendimento', 'Atendimento da empresa xxx', 'atendimento@hotmail.com', 'smtp.mailtrap.io', 'ed12dd02941308', '3c0bf6100311cd', 'PHPMailer::ENCRYPTION_STARTTLS', 587, '2022-03-23 12:26:24', NULL),
(2, 'Suporte', 'Suporte da empresa xxx', 'suporte@hotmail.com', 'smtp.mailtrap.io', 'ed12dd02941308', '3c0bf6100311cd', 'PHPMailer::ENCRYPTION_STARTTLS', 587, '2022-03-23 12:42:44', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `adms_sits_users`
--

DROP TABLE IF EXISTS `adms_sits_users`;
CREATE TABLE IF NOT EXISTS `adms_sits_users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(44) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `adms_color_id` int NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `adms_color_id` (`adms_color_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `adms_sits_users`
--

INSERT INTO `adms_sits_users` (`id`, `name`, `adms_color_id`, `created`, `modified`) VALUES
(1, 'Ativo', 3, '2022-03-23 15:28:25', NULL),
(2, 'Inativo', 5, '2022-03-23 15:26:59', NULL),
(3, 'Aguardado Confirmação', 1, '2022-03-23 15:26:59', NULL),
(4, 'Spam', 4, '2022-03-23 15:26:59', NULL),
(5, 'Descadastrado', 4, '2022-03-23 15:26:59', NULL),
(6, 'Inválido', 4, '2022-04-23 11:46:21', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `adms_users`
--

DROP TABLE IF EXISTS `adms_users`;
CREATE TABLE IF NOT EXISTS `adms_users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(220) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nickname` varchar(44) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(220) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user` varchar(220) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(220) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `recover_password` varchar(220) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `conf_email` varchar(220) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(220) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adms_sits_user_id` int NOT NULL DEFAULT '3',
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `adms_sits_user_id` (`adms_sits_user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `adms_users`
--

INSERT INTO `adms_users` (`id`, `name`, `nickname`, `email`, `user`, `password`, `recover_password`, `conf_email`, `image`, `adms_sits_user_id`, `created`, `modified`) VALUES
(1, 'Silvio', 'Silvio Lucas', 'silviolucas_santos@hotmail.com', 'silviolucas_santos@hotmail.com', '$2y$10$gJ30NZ7KcvfW24mMejOuQOjrVKDgmAwMFI2wgMFk42S2Jl7LnmEZG', NULL, NULL, 'lucas.jpg', 1, '2022-02-23 16:22:54', '2022-04-04 20:00:26'),
(2, 'Kelly', NULL, 'kelly@hotmail.com', 'kelly@hotmail.com', '$2y$10$gJ30NZ7KcvfW24mMejOuQOjrVKDgmAwMFI2wgMFk42S2Jl7LnmEZG', NULL, NULL, NULL, 3, '2022-03-08 16:10:09', '2022-04-05 16:32:35'),
(3, 'Jessica', NULL, 'jessica@hotmail.com', 'jessica@hotmail.com', '$2y$10$gJ30NZ7KcvfW24mMejOuQOjrVKDgmAwMFI2wgMFk42S2Jl7LnmEZG', NULL, NULL, NULL, 2, '2022-03-08 16:13:25', NULL),
(4, 'SLDS', 'SLDS', 'teste@teste.com', 'teste@teste.com', '$2y$10$gJ30NZ7KcvfW24mMejOuQOjrVKDgmAwMFI2wgMFk42S2Jl7LnmEZG', NULL, NULL, 'image.jpeg', 4, '2022-03-08 17:37:18', NULL),
(5, 'SLDS2', 'SLDS2', 'teste2@teste.com', 'teste2@teste.com', '$2y$10$gJ30NZ7KcvfW24mMejOuQOjrVKDgmAwMFI2wgMFk42S2Jl7LnmEZG', NULL, NULL, NULL, 3, '2022-03-16 18:08:01', NULL),
(6, 'SLDS3', 'SLDS3', 'teste3@teste.com', 'teste3@teste.com', '$2y$10$gJ30NZ7KcvfW24mMejOuQOjrVKDgmAwMFI2wgMFk42S2Jl7LnmEZG', NULL, NULL, NULL, 1, '2022-03-22 14:55:11', '2022-04-05 16:33:07');

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `adms_sits_users`
--
ALTER TABLE `adms_sits_users`
  ADD CONSTRAINT `adms_sits_users_ibfk_1` FOREIGN KEY (`adms_color_id`) REFERENCES `adms_colors` (`id`);

--
-- Limitadores para a tabela `adms_users`
--
ALTER TABLE `adms_users`
  ADD CONSTRAINT `adms_users_ibfk_1` FOREIGN KEY (`adms_sits_user_id`) REFERENCES `adms_sits_users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
