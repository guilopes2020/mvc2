-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10-Set-2021 às 17:48
-- Versão do servidor: 10.4.20-MariaDB
-- versão do PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `cadastro`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `assistindo`
--

CREATE TABLE `assistindo` (
  `id` int(11) NOT NULL,
  `data` date DEFAULT NULL,
  `idcliente` int(11) DEFAULT NULL,
  `idcurso` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `assistindo`
--

INSERT INTO `assistindo` (`id`, `data`, `idcliente`, `idcurso`) VALUES
(1, '2012-03-15', 4, 8),
(2, '2012-03-15', 8, 7),
(3, '2015-05-03', 4, 3),
(4, '2019-09-10', 11, 2),
(5, '2018-08-15', 8, 3),
(6, '2010-04-12', 10, 8),
(7, '2012-09-19', 12, 11),
(8, '2018-08-15', 8, 3),
(9, '2017-03-30', 2, 12);

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `prof` varchar(15) DEFAULT NULL,
  `nascimento` date DEFAULT NULL,
  `sexo` enum('M','F') DEFAULT NULL,
  `peso` decimal(5,2) DEFAULT NULL,
  `altura` decimal(3,2) DEFAULT NULL,
  `nacionalidade` varchar(20) NOT NULL DEFAULT 'Brasil',
  `cursopreferido` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `email`, `prof`, `nascimento`, `sexo`, `peso`, `altura`, `nacionalidade`, `cursopreferido`) VALUES
(2, 'Maria', 'mariajdhjdh@gregrge.com', 'atendente', '1955-05-17', 'F', '58.70', '1.53', 'Brasil', 9),
(4, 'Iolandaaa', 'emenga@dgfg.com', 'Puterasss', '1967-05-30', 'F', '53.80', '1.55', 'Colombia', 8),
(8, 'antonierosss', 'arto@hddg.com.br', 'programador', '1981-09-24', 'M', '80.90', '1.81', 'russia', 7),
(10, 'cavalitoncionss', 'dgfhdgfdh@gfgfgv.com', 'greolerass', '1985-08-25', 'M', '79.30', '1.85', 'holanda', 5),
(11, 'Dsfgdfghdfjghdfjg', 'djkfghdfhgdjfhgjd@gtgtgtg.com', 'Pedreiro', '1992-01-05', 'F', '61.30', '1.75', 'Brasil', 5),
(12, 'vann', 'maverickeras@gregreg.com', 'programador', '1988-02-15', 'M', '87.90', '1.85', 'holanda', 5),
(34, 'Gregregoriossrerrettt', 'fghgdgfhgccc@fdfdfdr.com', 'Pedrero', '1985-08-25', 'M', '87.80', '1.92', 'RUSSIA', 8),
(35, 'Bregonighrtsss', 'sdjhsjdh@gsdhgsdh.com', 'Programadora', '1974-10-05', 'M', '87.90', '1.78', 'Russia', 3),
(49, 'dghdfgdfkj', 'burro@agosto.com', 'puta', '1985-08-25', 'M', '59.80', '1.53', 'holanda', 4),
(50, 'guilopesarmindo', 'guilopesarmindo@hotmail.com', 'developer', '1982-04-03', 'M', '80.90', '1.75', 'brasil', 4),
(51, 'sdfsdfs', 'sdfsdf@ffdfdf.com', 'lakalaka', '1975-10-23', 'F', '80.90', '1.72', 'Russia', 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cursos`
--

CREATE TABLE `cursos` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `descricao` text DEFAULT NULL,
  `carga` int(10) UNSIGNED DEFAULT NULL,
  `totaulas` int(10) UNSIGNED DEFAULT NULL,
  `ano` year(4) DEFAULT 2021
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cursos`
--

INSERT INTO `cursos` (`id`, `nome`, `descricao`, `carga`, `totaulas`, `ano`) VALUES
(1, 'HTML 5', 'Curso HTML 5', 40, 10, 2017),
(2, 'PHP 8', 'Curso de PHP8 para iniciantes', 45, 15, 2018),
(3, 'JAVA', 'Curso de JAVA', 42, 15, 2012),
(4, 'WORD', 'Curso de Word para iniciantes', 38, 12, 2019),
(5, 'MySQL', 'Curso de MySQL para iniciantes', 40, 15, 2021),
(7, 'Phynton', 'curso  de phynton', 35, 15, 2019),
(8, 'Logica', 'curso  de logica', 38, 14, 2017),
(9, 'C#', 'curso  de C# para iniciantes', 39, 12, 2017),
(10, 'C', 'curso  de C', 40, 20, 2012),
(11, 'Adobe Effect', 'curso  de Adobe Effect', 38, 16, 2020),
(12, 'Linux', 'curso  de Linux para intermediarios', 40, 20, 2012),
(13, 'Photoshop', 'curso para iniciantes de photoshop', 40, 25, 2020);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `assistindo`
--
ALTER TABLE `assistindo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idcliente` (`idcliente`),
  ADD KEY `idcurso` (`idcurso`);

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cursopreferido` (`cursopreferido`);

--
-- Índices para tabela `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nome` (`nome`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `assistindo`
--
ALTER TABLE `assistindo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de tabela `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `assistindo`
--
ALTER TABLE `assistindo`
  ADD CONSTRAINT `assistindo_ibfk_1` FOREIGN KEY (`idcliente`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `assistindo_ibfk_2` FOREIGN KEY (`idcurso`) REFERENCES `cursos` (`id`);

--
-- Limitadores para a tabela `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`cursopreferido`) REFERENCES `cursos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
