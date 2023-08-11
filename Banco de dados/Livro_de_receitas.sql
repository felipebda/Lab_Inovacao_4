-- MySQL Workbench Synchronization
-- Generated: 2023-08-11 08:55
-- Model: New Model
-- Version: 1.0
-- Project: Name of the project
-- Author: felip

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

ALTER SCHEMA `livro_de_receita`  DEFAULT CHARACTER SET utf8  DEFAULT COLLATE utf8_general_ci ;

ALTER TABLE `livro_de_receita`.`Receita` 
DROP FOREIGN KEY `fk_Receita_Categoria1`,
DROP FOREIGN KEY `fk_Receita_Funcionario1`;

ALTER TABLE `livro_de_receita`.`Funcionario` 
DROP FOREIGN KEY `fk_Funcionario_Cargo1`;

ALTER TABLE `livro_de_receita`.`Livro` 
DROP FOREIGN KEY `fk_Livro_Funcionario1`;

ALTER TABLE `livro_de_receita`.`Receita_has_Ingrediente` 
DROP FOREIGN KEY `fk_Receita_has_Ingrediente_Ingrediente1`,
DROP FOREIGN KEY `fk_Receita_has_Ingrediente_Medida_Ingrediente1`;

ALTER TABLE `livro_de_receita`.`Referencia` 
DROP FOREIGN KEY `fk_Funcionario_has_Restaurante_Funcionario1`,
DROP FOREIGN KEY `fk_Funcionario_has_Restaurante_Restaurante1`;

ALTER TABLE `livro_de_receita`.`Receita` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ,
CHANGE COLUMN `nome` `nome` VARCHAR(45) NOT NULL COMMENT 'Contem o nome da receita\n\nExemplo\n\nFeijoada\nLasanha de Carne\nFeijoada Baiana\n...' ,
CHANGE COLUMN `idRec` `idRec` INT(10) UNSIGNED NOT NULL COMMENT 'Contem o Identificador unico da receita\n\nExemplo\n\nId Receita\n\n0001\n0002\n0003\n0004\n...' ,
CHANGE COLUMN `dt_criacao` `dt_criacao` DATE NOT NULL COMMENT 'Contem a data de cadastramento da receita no sistema\n\nExemplo\n\nData de Criacao\n02/05/2022\n15/10/2023\n...' ,
CHANGE COLUMN `modo_preparo` `modo_preparo` VARCHAR(1000) NOT NULL COMMENT 'Contem a descricao do modo de preparo da receita\n\nExemplo\n\nModo de preparo\n\n' ,
CHANGE COLUMN `porcoes` `porcoes` SMALLINT(6) NULL DEFAULT NULL COMMENT 'Contem a informacao de quantidade de porcoes que a receita atende\n\n\nExemplo\n\nquantidade\n\n004\n0010\n' ,
CHANGE COLUMN `ind_inedita` `ind_inedita` CHAR(1) NOT NULL COMMENT 'Contem um indicador de receita ineditas. A receita e inedita quando nao foi publicada em nenhum livro\n\n\nExemplo\n\ninedita      \n\nS              (S e sim)\nN              (N e nao, ou seja, ja foi publicada)' ;
;

ALTER TABLE `livro_de_receita`.`Funcionario` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ,
CHANGE COLUMN `idFunc` `idFunc` SMALLINT(6) NOT NULL AUTO_INCREMENT COMMENT 'Contem o identificador unico da tabela Funcionario (PK)\n \nidFuncionario\n0001\n0002\n0003\n0004\n...' ,
CHANGE COLUMN `rg` `rg` CHAR(15) NOT NULL COMMENT 'Contem o numero de identificacao do registro geral do funcionario.\n\nEx: \nRG\n4587208\n1345943\n...' ,
CHANGE COLUMN `nome` `nome` VARCHAR(80) NOT NULL COMMENT 'Informacao do nome do funcionario\n\nExemplo:\n\nNome\nEduardo Martins Se\nLucia Almeida Santana\nMarcos Alberto Pereira Souza\n...' ,
CHANGE COLUMN `dt_ingr` `dt_ingr` DATE NOT NULL COMMENT 'Contem a data de ingresso (admissao) do funcionario\n\nExemplo\n\nData Ingresso\n\n01/12/2022\n05/08/1997\n...' ,
CHANGE COLUMN `salario` `salario` DECIMAL(9,2) NOT NULL COMMENT 'Especificifica o salario do funcionario\n\nExemplo\n\nSalario\n\n20000,00\n  6500,00' ,
CHANGE COLUMN `nome_fantasia` `nome_fantasia` VARCHAR(45) NULL DEFAULT NULL COMMENT 'Contem o nome fantasia utilizado pelo cozinheiro\n\nExemplo\n\nnome_fantasia\n\nRei das Pizzas\nO principe dos pasteis' ;

ALTER TABLE `livro_de_receita`.`Livro` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ,
CHANGE COLUMN `idLivro` `idLivro` SMALLINT(6) NOT NULL AUTO_INCREMENT COMMENT 'Contem o identificador unico do livro\n\nExemplo\n\nId Livro          Titulo \n\n0001             Maravilhas de Doce\n0002             Receitas Natalinas' ,
CHANGE COLUMN `titulo_livro` `titulo_livro` VARCHAR(45) NOT NULL COMMENT 'Contem o titulo unico do livro\n\nExemplo\n\nId Livro          Titulo \n\n0001             Maravilhas de Doce\n0002             Receitas Natalinas' ,
CHANGE COLUMN `isbn` `isbn` CHAR(13) NOT NULL COMMENT 'ISBN (International Standard Book Number/ Padrão Internacional de Numeração de Livro) é um padrão numérico criado com o objetivo de fornecer uma espécie de “RG” para publicações monográficas, como livros, artigos e apostilas.\n\nExemplo\n\n12312123456121' ,
CHANGE COLUMN `editor` `editor` SMALLINT(6) NOT NULL COMMENT 'Contem o codigo do funcionario editor do livro\n\nExemplo\n\nEditor\n\n0001\n0002\n0003\n...' ;

ALTER TABLE `livro_de_receita`.`Cargo` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ,
CHANGE COLUMN `idCargo` `idCargo` SMALLINT(6) NOT NULL AUTO_INCREMENT COMMENT 'Contem o identificador unico da tabela Cargo\n\nExemplo\n\nId Cargo\n\n001     Cozinheiro\n002     Degustador\n003     Editor\n004     Analista de Sistema\n...\n' ,
CHANGE COLUMN `descicao` `descicao` VARCHAR(45) NOT NULL COMMENT 'Contem a descricao do cargo ocupado pelo funcionario\n\nExemplo\n\nId Cargo  Descricao\n\n001           Cozinheiro\n002           Degustador\n003           Editor\n004           Analista de Sistema\n...\n...' ;

ALTER TABLE `livro_de_receita`.`Categoria` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ,
CHANGE COLUMN `idCategoria` `idCategoria` SMALLINT(6) NOT NULL AUTO_INCREMENT COMMENT 'Contem o identificador unico da categoria de classiificacao das receitas\n\nExemplo\n\nidCategoria      Descricao\n\n001                    Carne\n002                    Aves\n003                    Peixes' ,
CHANGE COLUMN `descricao` `descricao` CHAR(25) NOT NULL COMMENT 'Contem a descricao da categoria de classiificacao das receitas\n\nExemplo\n\nidCategoria      Descricao\n\n001                    Carne\n002                    Aves\n003                    Peixes' ;

ALTER TABLE `livro_de_receita`.`Ingrediente` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ,
CHANGE COLUMN `idIngrediente` `idIngrediente` INT(11) NOT NULL AUTO_INCREMENT COMMENT 'Contem a identificacao unica do ingrediente\n\nExemplo\n\nIdIngrediente       Descricao\n\n0001                      Acucar\n0002                      Farinha\n0003                      Ovo' ,
CHANGE COLUMN `nome` `nome` VARCHAR(45) NOT NULL COMMENT 'Contem a descricao do ingrediente\n\nExemplo\n\nIdIngrediente       nome\n\n0001                      Acucar\n0002                      Farinha\n0003                      Ovo' ,
CHANGE COLUMN `descricao` `descricao` VARCHAR(200) NULL DEFAULT NULL COMMENT 'Comtem a descricao para ingredientes exoticos\n\nExemplo\n\nUmeboshi    Uma ameixa ruim' ;

ALTER TABLE `livro_de_receita`.`Receita_has_Ingrediente` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ,
CHANGE COLUMN `nome` `nome` VARCHAR(45) NOT NULL COMMENT 'Contem o nome da receita\n\nExemplo\n\nFeijoada\nLasanha de Carne\nFeijoada Baiana\n...' ,
CHANGE COLUMN `cozinheiro` `cozinheiro` SMALLINT(6) NOT NULL COMMENT 'Contem o identificador unico da tabela Funcionario (PK). Sendo permitido criar receita somente COZINHEIRO\n \nidFuncionario\n0001\n0002\n0003\n0004\n...' ,
CHANGE COLUMN `idIngrediente` `idIngrediente` INT(11) NOT NULL COMMENT 'Contem a identificacao unica do ingrediente\n\nExemplo\n\nIdIngrediente       Descricao\n\n0001                      Acucar\n0002                      Farinha\n0003                      Ovo' ,
CHANGE COLUMN `idMedida` `idMedida` SMALLINT(6) NOT NULL COMMENT 'Contem o identificador unico da medida dos ingreditentes\n\n\nExemplo\n\nidMedida                    descricao\n001                             Gramas\n002                             Kilogramas\n003                             Litros\n004                             Mililitros' ,
CHANGE COLUMN `qtd_medida` `qtd_medida` SMALLINT(6) NULL DEFAULT NULL COMMENT 'Contem a quantidade da medida do ingrediente participante da receita\n\nExemplo\n\n0002\n0001\n...' ;

ALTER TABLE `livro_de_receita`.`Medida_Ingrediente` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ,
CHANGE COLUMN `idMedida` `idMedida` SMALLINT(6) NOT NULL AUTO_INCREMENT COMMENT 'Contem o identificador unico da medida dos ingreditentes\n\n\nExemplo\n\nidMedida                    descricao\n001                             Gramas\n002                             Kilogramas\n003                             Litros\n004                             Mililitros' ,
CHANGE COLUMN `descricao` `descricao` VARCHAR(45) NOT NULL COMMENT 'Contem a descricao da medida dos ingreditentes\n\n\nExemplo\n\nidMedida                    descricao\n001                             Gramas\n002                             Kilogramas\n003                             Litros\n004                             Mililitros' ;

ALTER TABLE `livro_de_receita`.`Restaurante` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ,
CHANGE COLUMN `idRestaurante` `idRestaurante` INT(11) NOT NULL AUTO_INCREMENT COMMENT 'Contem o identificador unico do restaurante\n\nExemplo\n\nidRestaurante             nome\n001                              Restaurante Churrascada\n002                             Churrascaria Churrascada' ,
CHANGE COLUMN `nome` `nome` VARCHAR(45) NOT NULL COMMENT 'Contem o nome do restaurante que o cozinheiro ja trabalhou.\n\nExemplo\n\nidRestaurante             nome\n001                              Restaurante Churrascada\n002                             Churrascaria Churrascada' ,
CHANGE COLUMN `contato` `contato` VARCHAR(45) NULL DEFAULT NULL COMMENT 'Informa a referencia de um contato\n\nExemplo\n\nContato\n\nMaria Rosangela Alvez Peira Matoso' ;

ALTER TABLE `livro_de_receita`.`Referencia` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ,
CHANGE COLUMN `idFunc` `idFunc` SMALLINT(6) NOT NULL COMMENT 'Contem o identificador unico da tabela Funcionario (PK)\n \nidFuncionario\n0001\n0002\n0003\n0004\n...' ,
CHANGE COLUMN `idRestaurante` `idRestaurante` INT(11) NOT NULL COMMENT 'Contem o identificador unico do restaurante\n\nExemplo\n\nRestaurante Apache' ,
CHANGE COLUMN `dt_inicio` `dt_inicio` DATE NOT NULL COMMENT 'Contem a data de admissao do funcionario do restaurante referenciado\n\nExemplo\n\ndt_inicio   \n\n02/02/1988' ,
CHANGE COLUMN `dt_fim` `dt_fim` DATE NULL DEFAULT NULL COMMENT 'Contem a data de desligamento do funcionario do restaurante referenciado\n\nExemplo\n\ndt_fim\n\n02/01/1988\n' ;

ALTER TABLE `livro_de_receita`.`Parametros` 
CHARACTER SET = utf8 , COLLATE = utf8_general_ci ,
CHANGE COLUMN `idMes` `idMes` SMALLINT(6) NOT NULL COMMENT 'Contem o mes corrente determinado para producao das receitas\n\nExemplo\n\nMes              Ano          Qtd Receita\n\n05                2023                 4\n06                2023                 5\n.........' ,
CHANGE COLUMN `idAno` `idAno` SMALLINT(6) NOT NULL COMMENT 'Contem o ano  determinado para producao das receitas\n\nExemplo\n\nMes              Ano          Qtd Receita\n\n05                2023                 4\n06                2023                 5\n.........' ,
CHANGE COLUMN `qtd_receitas` `qtd_receitas` SMALLINT(6) NOT NULL COMMENT 'Contema quantidade de receitas a serem produzidas  no mes/ano determinado para a producao de receita.\nExemplo\n\nMes              Ano          Qtd Receita\n\n05                2023                 4\n06                2023                 5\n.........' ;

CREATE TABLE IF NOT EXISTS `livro_de_receita`.`Publicacao` (
  `Livro_idLivro` SMALLINT(6) NOT NULL,
  `Receita_nome` VARCHAR(45) NOT NULL,
  `Receita_cozinheiro` SMALLINT(6) NOT NULL,
  PRIMARY KEY (`Livro_idLivro`, `Receita_nome`, `Receita_cozinheiro`),
  INDEX `fk_Livro_has_Receita_Receita1_idx` (`Receita_nome` ASC, `Receita_cozinheiro` ASC) VISIBLE,
  INDEX `fk_Livro_has_Receita_Livro1_idx` (`Livro_idLivro` ASC) VISIBLE,
  CONSTRAINT `fk_Livro_has_Receita_Livro1`
    FOREIGN KEY (`Livro_idLivro`)
    REFERENCES `livro_de_receita`.`Livro` (`idLivro`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Livro_has_Receita_Receita1`
    FOREIGN KEY (`Receita_nome` , `Receita_cozinheiro`)
    REFERENCES `livro_de_receita`.`Receita` (`nome` , `cozinheiro`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

ALTER TABLE `livro_de_receita`.`Receita` 
DROP FOREIGN KEY `fk_Receita_Funcionario`;

ALTER TABLE `livro_de_receita`.`Receita` ADD CONSTRAINT `fk_Receita_Funcionario`
  FOREIGN KEY (`cozinheiro`)
  REFERENCES `livro_de_receita`.`Funcionario` (`idFunc`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Receita_Categoria1`
  FOREIGN KEY (`id_categ`)
  REFERENCES `livro_de_receita`.`Categoria` (`idCategoria`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Receita_Funcionario1`
  FOREIGN KEY (`degustador`)
  REFERENCES `livro_de_receita`.`Funcionario` (`idFunc`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `livro_de_receita`.`Funcionario` 
ADD CONSTRAINT `fk_Funcionario_Cargo1`
  FOREIGN KEY (`idCargo`)
  REFERENCES `livro_de_receita`.`Cargo` (`idCargo`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `livro_de_receita`.`Livro` 
ADD CONSTRAINT `fk_Livro_Funcionario1`
  FOREIGN KEY (`editor`)
  REFERENCES `livro_de_receita`.`Funcionario` (`idFunc`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `livro_de_receita`.`Receita_has_Ingrediente` 
DROP FOREIGN KEY `fk_Receita_has_Ingrediente_Receita1`;

ALTER TABLE `livro_de_receita`.`Receita_has_Ingrediente` ADD CONSTRAINT `fk_Receita_has_Ingrediente_Receita1`
  FOREIGN KEY (`nome` , `cozinheiro`)
  REFERENCES `livro_de_receita`.`Receita` (`nome` , `cozinheiro`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Receita_has_Ingrediente_Ingrediente1`
  FOREIGN KEY (`idIngrediente`)
  REFERENCES `livro_de_receita`.`Ingrediente` (`idIngrediente`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Receita_has_Ingrediente_Medida_Ingrediente1`
  FOREIGN KEY (`idMedida`)
  REFERENCES `livro_de_receita`.`Medida_Ingrediente` (`idMedida`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `livro_de_receita`.`Referencia` 
ADD CONSTRAINT `fk_Funcionario_has_Restaurante_Funcionario1`
  FOREIGN KEY (`idFunc`)
  REFERENCES `livro_de_receita`.`Funcionario` (`idFunc`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Funcionario_has_Restaurante_Restaurante1`
  FOREIGN KEY (`idRestaurante`)
  REFERENCES `livro_de_receita`.`Restaurante` (`idRestaurante`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
