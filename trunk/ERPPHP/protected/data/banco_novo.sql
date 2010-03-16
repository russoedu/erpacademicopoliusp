-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.1.44-community


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema erp
--

CREATE DATABASE IF NOT EXISTS erp;
USE erp;

--
-- Definition of table `aluno`
--

DROP TABLE IF EXISTS `aluno`;
CREATE TABLE `aluno` (
  `id_aluno` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `rg` varchar(9) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `telefone` varchar(10) NOT NULL,
  `celular` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tbl_users_id` int(11) NOT NULL,
  PRIMARY KEY (`id_aluno`),
  KEY `fk_Aluno_tbl_users1` (`tbl_users_id`),
  CONSTRAINT `fk_Aluno_tbl_users1` FOREIGN KEY (`tbl_users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aluno`
--

/*!40000 ALTER TABLE `aluno` DISABLE KEYS */;
/*!40000 ALTER TABLE `aluno` ENABLE KEYS */;


--
-- Definition of table `biblioteca`
--

DROP TABLE IF EXISTS `biblioteca`;
CREATE TABLE `biblioteca` (
  `id_biblioteca` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `local` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_biblioteca`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `biblioteca`
--

/*!40000 ALTER TABLE `biblioteca` DISABLE KEYS */;
/*!40000 ALTER TABLE `biblioteca` ENABLE KEYS */;


--
-- Definition of table `bibliotecario`
--

DROP TABLE IF EXISTS `bibliotecario`;
CREATE TABLE `bibliotecario` (
  `id_bibliotecario` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `tbl_users_id` int(11) NOT NULL,
  PRIMARY KEY (`id_bibliotecario`),
  KEY `fk_Bibliotecario_tbl_users1` (`tbl_users_id`),
  CONSTRAINT `fk_Bibliotecario_tbl_users1` FOREIGN KEY (`tbl_users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bibliotecario`
--

/*!40000 ALTER TABLE `bibliotecario` DISABLE KEYS */;
/*!40000 ALTER TABLE `bibliotecario` ENABLE KEYS */;


--
-- Definition of table `curso`
--

DROP TABLE IF EXISTS `curso`;
CREATE TABLE `curso` (
  `id_curso` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `duracao` int(2) NOT NULL,
  `periodo` varchar(15) NOT NULL,
  `descricao` text,
  PRIMARY KEY (`id_curso`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `curso`
--

/*!40000 ALTER TABLE `curso` DISABLE KEYS */;
/*!40000 ALTER TABLE `curso` ENABLE KEYS */;


--
-- Definition of table `curso_aluno`
--

DROP TABLE IF EXISTS `curso_aluno`;
CREATE TABLE `curso_aluno` (
  `id_curso` int(11) NOT NULL,
  `id_aluno` int(11) NOT NULL,
  `status` enum('CURSANDO','TRANCADO','FORMADO') NOT NULL DEFAULT 'CURSANDO',
  `ano_inicio` year(4) NOT NULL,
  `semestre_inicio` varchar(8) NOT NULL,
  `ano_fim` year(4) DEFAULT NULL,
  `semestre_fim` varchar(8) DEFAULT NULL,
  PRIMARY KEY (`id_curso`,`id_aluno`),
  KEY `fk_idCurso` (`id_curso`),
  KEY `fk_idAluno` (`id_aluno`),
  CONSTRAINT `fk_idCurso` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_idAluno` FOREIGN KEY (`id_aluno`) REFERENCES `aluno` (`id_aluno`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `curso_aluno`
--

/*!40000 ALTER TABLE `curso_aluno` DISABLE KEYS */;
/*!40000 ALTER TABLE `curso_aluno` ENABLE KEYS */;


--
-- Definition of table `disciplina`
--

DROP TABLE IF EXISTS `disciplina`;
CREATE TABLE `disciplina` (
  `id_disciplina` int(11) NOT NULL AUTO_INCREMENT,
  `id_curso` int(11) NOT NULL,
  `id_professor_responsavel` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `sigla` varchar(10) NOT NULL,
  `creditos_aula` int(2) NOT NULL,
  `creditos_trabalho` int(2) NOT NULL,
  `semestre` int(2) NOT NULL,
  `programa` text,
  PRIMARY KEY (`id_disciplina`),
  KEY `fk_Disciplina_Curso` (`id_curso`),
  KEY `fk_Disciplina_Professor1` (`id_professor_responsavel`),
  CONSTRAINT `fk_Disciplina_Curso` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Disciplina_Professor1` FOREIGN KEY (`id_professor_responsavel`) REFERENCES `professor` (`id_professor`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `disciplina`
--

/*!40000 ALTER TABLE `disciplina` DISABLE KEYS */;
/*!40000 ALTER TABLE `disciplina` ENABLE KEYS */;


--
-- Definition of table `emprestimo`
--

DROP TABLE IF EXISTS `emprestimo`;
CREATE TABLE `emprestimo` (
  `id_emprestimo` int(11) NOT NULL AUTO_INCREMENT,
  `data_retirada` date NOT NULL,
  `data_devolucao` date NOT NULL,
  `id_aluno` int(11) NOT NULL,
  `id_livro` int(11) NOT NULL,
  `data_devolucao_efetiva` date DEFAULT NULL,
  PRIMARY KEY (`id_emprestimo`),
  KEY `fk_Emprestimo_Aluno` (`id_aluno`),
  KEY `fk_Emprestimo_Livro1` (`id_livro`),
  CONSTRAINT `fk_Emprestimo_Aluno` FOREIGN KEY (`id_aluno`) REFERENCES `aluno` (`id_aluno`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Emprestimo_Livro1` FOREIGN KEY (`id_livro`) REFERENCES `livro` (`id_livro`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emprestimo`
--

/*!40000 ALTER TABLE `emprestimo` DISABLE KEYS */;
/*!40000 ALTER TABLE `emprestimo` ENABLE KEYS */;


--
-- Definition of table `gestoracademico`
--

DROP TABLE IF EXISTS `gestoracademico`;
CREATE TABLE `gestoracademico` (
  `id_gestor_academico` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `tbl_users_id` int(11) NOT NULL,
  PRIMARY KEY (`id_gestor_academico`),
  KEY `fk_AdminAcademico_tbl_users1` (`tbl_users_id`),
  CONSTRAINT `fk_AdminAcademico_tbl_users1` FOREIGN KEY (`tbl_users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gestoracademico`
--

/*!40000 ALTER TABLE `gestoracademico` DISABLE KEYS */;
/*!40000 ALTER TABLE `gestoracademico` ENABLE KEYS */;


--
-- Definition of table `horario`
--

DROP TABLE IF EXISTS `horario`;
CREATE TABLE `horario` (
  `id_horario` int(11) NOT NULL,
  `id_oferecimento` int(11) NOT NULL,
  `dia` enum('SEGUNDA','TERÇA','QUARTA','QUINTA','SEXTA','SÁBADO') NOT NULL DEFAULT 'SEGUNDA',
  `horario_inicio` time NOT NULL,
  `horario_fim` time NOT NULL,
  PRIMARY KEY (`id_horario`,`id_oferecimento`),
  KEY `fk_Horario_Oferecimento` (`id_oferecimento`),
  CONSTRAINT `fk_Horario_Oferecimento` FOREIGN KEY (`id_oferecimento`) REFERENCES `oferecimento` (`id_oferecimento`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `horario`
--

/*!40000 ALTER TABLE `horario` DISABLE KEYS */;
/*!40000 ALTER TABLE `horario` ENABLE KEYS */;


--
-- Definition of table `livro`
--

DROP TABLE IF EXISTS `livro`;
CREATE TABLE `livro` (
  `id_livro` int(11) NOT NULL AUTO_INCREMENT,
  `id_biblioteca` int(11) NOT NULL,
  `isbn` int(11) NOT NULL,
  `exemplar` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `autor` varchar(100) NOT NULL,
  `editora` varchar(45) NOT NULL,
  `ano` varchar(4) NOT NULL,
  `edicao` int(11) NOT NULL,
  `local` varchar(10) NOT NULL,
  PRIMARY KEY (`id_livro`),
  KEY `fk_Livro_Biblioteca` (`id_biblioteca`),
  CONSTRAINT `fk_Livro_Biblioteca` FOREIGN KEY (`id_biblioteca`) REFERENCES `biblioteca` (`id_biblioteca`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `livro`
--

/*!40000 ALTER TABLE `livro` DISABLE KEYS */;
/*!40000 ALTER TABLE `livro` ENABLE KEYS */;


--
-- Definition of table `oferecimento`
--

DROP TABLE IF EXISTS `oferecimento`;
CREATE TABLE `oferecimento` (
  `id_oferecimento` int(11) NOT NULL AUTO_INCREMENT,
  `id_disciplina` int(11) NOT NULL,
  `id_professor` int(11) NOT NULL,
  `id_turma` int(11) NOT NULL,
  `id_sala` int(11) NOT NULL,
  `data_inicio` date NOT NULL,
  `data_fim` date NOT NULL,
  `vagas` int(11) NOT NULL,
  PRIMARY KEY (`id_oferecimento`),
  KEY `fk_Oferecimento_Disciplina1` (`id_disciplina`),
  KEY `fk_Oferecimento_Professor1` (`id_professor`),
  CONSTRAINT `fk_Oferecimento_Disciplina1` FOREIGN KEY (`id_disciplina`) REFERENCES `disciplina` (`id_disciplina`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Oferecimento_Professor1` FOREIGN KEY (`id_professor`) REFERENCES `professor` (`id_professor`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `oferecimento`
--

/*!40000 ALTER TABLE `oferecimento` DISABLE KEYS */;
/*!40000 ALTER TABLE `oferecimento` ENABLE KEYS */;


--
-- Definition of table `oferecimento_aluno`
--

DROP TABLE IF EXISTS `oferecimento_aluno`;
CREATE TABLE `oferecimento_aluno` (
  `id_oferecimento` int(11) NOT NULL AUTO_INCREMENT,
  `id_aluno` int(11) NOT NULL,
  `nota_final` decimal(2,0) DEFAULT NULL,
  `frequencia_final` decimal(2,0) DEFAULT NULL,
  `aprovado` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id_oferecimento`,`id_aluno`),
  KEY `idOferecimento` (`id_oferecimento`),
  KEY `idAluno` (`id_aluno`),
  CONSTRAINT `idOferecimento` FOREIGN KEY (`id_oferecimento`) REFERENCES `oferecimento` (`id_oferecimento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `idAluno` FOREIGN KEY (`id_aluno`) REFERENCES `aluno` (`id_aluno`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `oferecimento_aluno`
--

/*!40000 ALTER TABLE `oferecimento_aluno` DISABLE KEYS */;
/*!40000 ALTER TABLE `oferecimento_aluno` ENABLE KEYS */;


--
-- Definition of table `professor`
--

DROP TABLE IF EXISTS `professor`;
CREATE TABLE `professor` (
  `id_professor` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `tbl_users_id` int(11) NOT NULL,
  PRIMARY KEY (`id_professor`),
  KEY `fk_Professor_tbl_users1` (`tbl_users_id`),
  CONSTRAINT `fk_Professor_tbl_users1` FOREIGN KEY (`tbl_users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `professor`
--

/*!40000 ALTER TABLE `professor` DISABLE KEYS */;
/*!40000 ALTER TABLE `professor` ENABLE KEYS */;


--
-- Definition of table `profiles`
--

DROP TABLE IF EXISTS `profiles`;
CREATE TABLE `profiles` (
  `user_id` int(11) NOT NULL,
  `lastname` varchar(50) NOT NULL DEFAULT '',
  `firstname` varchar(50) NOT NULL DEFAULT '',
  `about` text,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `profiles`
--

/*!40000 ALTER TABLE `profiles` DISABLE KEYS */;
INSERT INTO `profiles` VALUES  (1,'Admin','Administrator',''),
 (2,'Demo','Demo','');
/*!40000 ALTER TABLE `profiles` ENABLE KEYS */;


--
-- Definition of table `profiles_fields`
--

DROP TABLE IF EXISTS `profiles_fields`;
CREATE TABLE `profiles_fields` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `varname` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `field_type` varchar(50) NOT NULL,
  `field_size` int(3) NOT NULL DEFAULT '0',
  `field_size_min` int(3) NOT NULL DEFAULT '0',
  `required` int(1) NOT NULL DEFAULT '0',
  `match` varchar(255) NOT NULL,
  `range` varchar(255) NOT NULL,
  `error_message` varchar(255) NOT NULL,
  `other_validator` varchar(255) NOT NULL,
  `default` varchar(255) NOT NULL,
  `position` int(3) NOT NULL DEFAULT '0',
  `visible` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `varname` (`varname`,`visible`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `profiles_fields`
--

/*!40000 ALTER TABLE `profiles_fields` DISABLE KEYS */;
INSERT INTO `profiles_fields` VALUES  (1,'lastname','Last Name','INT',50,3,1,'','','Incorrect Last Name (length between 3 and 50 characters).','','',1,3),
 (2,'firstname','First Name','INT',50,3,1,'','','Incorrect First Name (length between 3 and 50 characters).','','',0,3),
 (3,'about','About me','TEXT',1500,0,0,'','','','','',10,0);
/*!40000 ALTER TABLE `profiles_fields` ENABLE KEYS */;


--
-- Definition of table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `activkey` varchar(128) NOT NULL DEFAULT '',
  `createtime` int(10) NOT NULL DEFAULT '0',
  `lastvisit` int(10) NOT NULL DEFAULT '0',
  `superuser` int(1) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  KEY `status` (`status`),
  KEY `superuser` (`superuser`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES  (1,'admin','21232f297a57a5a743894a0e4a801fc3','webmaster@example.com','9a24eff8c15a6a141ece27eb6947da0f',1261146094,1268486985,1,1),
 (2,'demo','fe01ce2a7fbac8fafaed7c982a04e229','demo@example.com','099f825543f7850cc038b90aaff39fac',1261146094,1261146094,0,1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;