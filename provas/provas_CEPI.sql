create database provas_cepi;
use provas_cepi;
CREATE TABLE `turma01` (
  `nome` varchar(100) NOT NULL,
  `cod` int NOT NULL AUTO_INCREMENT,
  `status_aluno` varchar(15) DEFAULT NULL,
  `Q1` char(10) DEFAULT NULL,
  `Q2` char(10) DEFAULT NULL,
  `Q3` char(10) DEFAULT NULL,
  `Q4` char(10) DEFAULT NULL,
  `Q5` char(10) DEFAULT NULL,
  `Q6` char(10) DEFAULT NULL,
  `Q7` char(10) DEFAULT NULL,
  `Q8` char(10) DEFAULT NULL,
  `Q9` char(10) DEFAULT NULL,
  `Q10` char(10) DEFAULT NULL,
  `Q11` char(10) DEFAULT NULL,
  `Q12` char(10) DEFAULT NULL,
  `Q13` char(10) DEFAULT NULL,
  `Q14` char(10) DEFAULT NULL,
  `Q15` char(10) DEFAULT NULL,
  `Q16` char(10) DEFAULT NULL,
  `Q17` char(10) DEFAULT NULL,
  `Q18` char(10) DEFAULT NULL,
  `Q19` char(10) DEFAULT NULL,
  `Q20` char(10) DEFAULT NULL,
  `Q21` char(10) DEFAULT NULL,
  `Q22` char(10) DEFAULT NULL,
  `Q23` char(10) DEFAULT NULL,
  `Q24` char(10) DEFAULT NULL,
  `Q25` char(10) DEFAULT NULL,
  `Q26` char(10) DEFAULT NULL,
  `Q27` char(10) DEFAULT NULL,
  `Q28` char(10) DEFAULT NULL,
  `Q29` char(10) DEFAULT NULL,
  `Q30` char(10) DEFAULT NULL,
  `Q31` char(10) DEFAULT NULL,
  `Q32` char(10) DEFAULT NULL,
  `Q33` char(10) DEFAULT NULL,
  `Q34` char(10) DEFAULT NULL,
  `Q35` char(10) DEFAULT NULL,
  PRIMARY KEY (`cod`)
);
alter table provas_cepi.turma01 add column acertos int after status_aluno;