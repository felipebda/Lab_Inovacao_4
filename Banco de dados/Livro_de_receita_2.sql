-- MySQL Workbench Synchronization
-- Generated: 2023-08-22 09:23
-- Model: New Model
-- Version: 1.0
-- Project: Name of the project
-- Author: felip

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

CREATE SCHEMA IF NOT EXISTS `Livro_de_Receita2` DEFAULT CHARACTER SET utf8 ;

CREATE TABLE IF NOT EXISTS `Livro_de_Receita2`.`Receita` (
  `nome` VARCHAR(45) NOT NULL COMMENT 'Contem o nome da receita\n\nExemplo\n\nFeijoada\nLasanha de Carne\nFeijoada Baiana\n...',
  `cozinheiro` SMALLINT(6) NOT NULL,
  `idRec` INT(10) UNSIGNED NOT NULL COMMENT 'Contem o Identificador unico da receita\n\nExemplo\n\nId Receita\n\n0001\n0002\n0003\n0004\n...',
  `dt_criacao` DATE NOT NULL COMMENT 'Contem a data de cadastramento da receita no sistema\n\nExemplo\n\nData de Criacao\n02/05/2022\n15/10/2023\n...',
  `id_categ` SMALLINT(6) NOT NULL,
  `modo_preparo` VARCHAR(1000) NOT NULL COMMENT 'Contem a descricao do modo de preparo da receita\n\nExemplo\n\nModo de preparo\n\n',
  `porcoes` SMALLINT(6) NULL DEFAULT NULL COMMENT 'Contem a informacao de quantidade de porcoes que a receita atende\n\n\nExemplo\n\nquantidade\n\n004\n0010\n',
  `degustador` SMALLINT(6) NULL DEFAULT NULL,
  `dt_degustacao` DATE NULL DEFAULT NULL,
  `nota_degustacao` DECIMAL(3,1) NULL DEFAULT NULL,
  `ind_inedita` CHAR(1) NOT NULL COMMENT 'Contem um indicador de receita ineditas. A receita e inedita quando nao foi publicada em nenhum livro\n\n\nExemplo\n\ninedita      \n\nS              (S e sim)\nN              (N e nao, ou seja, ja foi publicada)',
  INDEX `fk_Receita_Funcionario_idx` (`cozinheiro` ASC) VISIBLE,
  PRIMARY KEY (`nome`, `cozinheiro`),
  INDEX `fk_Receita_Categoria1_idx` (`id_categ` ASC) VISIBLE,
  UNIQUE INDEX `idRec_UNIQUE` (`idRec` ASC) VISIBLE,
  INDEX `fk_Receita_Funcionario1_idx` (`degustador` ASC) VISIBLE,
  CONSTRAINT `fk_Receita_Funcionario`
    FOREIGN KEY (`cozinheiro`)
    REFERENCES `Livro_de_Receita2`.`Funcionario` (`idFunc`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Receita_Categoria1`
    FOREIGN KEY (`id_categ`)
    REFERENCES `Livro_de_Receita2`.`Categoria` (`idCategoria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Receita_Funcionario1`
    FOREIGN KEY (`degustador`)
    REFERENCES `Livro_de_Receita2`.`Funcionario` (`idFunc`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `Livro_de_Receita2`.`Funcionario` (
  `idFunc` SMALLINT(6) NOT NULL AUTO_INCREMENT COMMENT 'Contem o identificador unico da tabela Funcionario (PK)\n \nidFuncionario\n0001\n0002\n0003\n0004\n...',
  `rg` CHAR(15) NOT NULL COMMENT 'Contem o numero de identificacao do registro geral do funcionario.\n\nEx: \nRG\n4587208\n1345943\n...',
  `nome` VARCHAR(80) NOT NULL COMMENT 'Informacao do nome do funcionario\n\nExemplo:\n\nNome\nEduardo Martins Se\nLucia Almeida Santana\nMarcos Alberto Pereira Souza\n...',
  `dt_ingr` DATE NOT NULL COMMENT 'Contem a data de ingresso (admissao) do funcionario\n\nExemplo\n\nData Ingresso\n\n01/12/2022\n05/08/1997\n...',
  `salario` DECIMAL(9,2) NOT NULL COMMENT 'Especificifica o salario do funcionario\n\nExemplo\n\nSalario\n\n20000,00\n  6500,00',
  `idCargo` SMALLINT(6) NOT NULL,
  `nome_fantasia` VARCHAR(45) NULL DEFAULT NULL COMMENT 'Contem o nome fantasia utilizado pelo cozinheiro\n\nExemplo\n\nnome_fantasia\n\nRei das Pizzas\nO principe dos pasteis',
  PRIMARY KEY (`idFunc`),
  INDEX `fk_Funcionario_Cargo1_idx` (`idCargo` ASC) VISIBLE,
  CONSTRAINT `fk_Funcionario_Cargo1`
    FOREIGN KEY (`idCargo`)
    REFERENCES `Livro_de_Receita2`.`Cargo` (`idCargo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `Livro_de_Receita2`.`Livro` (
  `idLivro` SMALLINT(6) NOT NULL AUTO_INCREMENT COMMENT 'Contem o identificador unico do livro\n\nExemplo\n\nId Livro          Titulo \n\n0001             Maravilhas de Doce\n0002             Receitas Natalinas',
  `titulo_livro` VARCHAR(45) NOT NULL COMMENT 'Contem o titulo unico do livro\n\nExemplo\n\nId Livro          Titulo \n\n0001             Maravilhas de Doce\n0002             Receitas Natalinas',
  `isbn` CHAR(13) NOT NULL COMMENT 'ISBN (International Standard Book Number/ Padrão Internacional de Numeração de Livro) é um padrão numérico criado com o objetivo de fornecer uma espécie de “RG” para publicações monográficas, como livros, artigos e apostilas.\n\nExemplo\n\n12312123456121',
  `editor` SMALLINT(6) NOT NULL COMMENT 'Contem o codigo do funcionario editor do livro\n\nExemplo\n\nEditor\n\n0001\n0002\n0003\n...',
  PRIMARY KEY (`idLivro`),
  UNIQUE INDEX `nome_livro_UNIQUE` (`titulo_livro` ASC) VISIBLE,
  UNIQUE INDEX `isbn_UNIQUE` (`isbn` ASC) VISIBLE,
  INDEX `fk_Livro_Funcionario1_idx` (`editor` ASC) VISIBLE,
  CONSTRAINT `fk_Livro_Funcionario1`
    FOREIGN KEY (`editor`)
    REFERENCES `Livro_de_Receita2`.`Funcionario` (`idFunc`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `Livro_de_Receita2`.`Cargo` (
  `idCargo` SMALLINT(6) NOT NULL AUTO_INCREMENT COMMENT 'Contem o identificador unico da tabela Cargo\n\nExemplo\n\nId Cargo\n\n001     Cozinheiro\n002     Degustador\n003     Editor\n004     Analista de Sistema\n...\n',
  `descicao` VARCHAR(45) NOT NULL COMMENT 'Contem a descricao do cargo ocupado pelo funcionario\n\nExemplo\n\nId Cargo  Descricao\n\n001           Cozinheiro\n002           Degustador\n003           Editor\n004           Analista de Sistema\n...\n...',
  PRIMARY KEY (`idCargo`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `Livro_de_Receita2`.`Categoria` (
  `idCategoria` SMALLINT(6) NOT NULL AUTO_INCREMENT COMMENT 'Contem o identificador unico da categoria de classiificacao das receitas\n\nExemplo\n\nidCategoria      Descricao\n\n001                    Carne\n002                    Aves\n003                    Peixes',
  `descricao` CHAR(25) NOT NULL COMMENT 'Contem a descricao da categoria de classiificacao das receitas\n\nExemplo\n\nidCategoria      Descricao\n\n001                    Carne\n002                    Aves\n003                    Peixes',
  PRIMARY KEY (`idCategoria`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `Livro_de_Receita2`.`Ingrediente` (
  `idIngrediente` INT(11) NOT NULL AUTO_INCREMENT COMMENT 'Contem a identificacao unica do ingrediente\n\nExemplo\n\nIdIngrediente       Descricao\n\n0001                      Acucar\n0002                      Farinha\n0003                      Ovo',
  `nome` VARCHAR(45) NOT NULL COMMENT 'Contem a descricao do ingrediente\n\nExemplo\n\nIdIngrediente       nome\n\n0001                      Acucar\n0002                      Farinha\n0003                      Ovo',
  `descricao` VARCHAR(200) NULL DEFAULT NULL COMMENT 'Comtem a descricao para ingredientes exoticos\n\nExemplo\n\nUmeboshi    Uma ameixa ruim',
  PRIMARY KEY (`idIngrediente`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `Livro_de_Receita2`.`Receita_has_Ingrediente` (
  `nome` VARCHAR(45) NOT NULL COMMENT 'Contem o nome da receita\n\nExemplo\n\nFeijoada\nLasanha de Carne\nFeijoada Baiana\n...',
  `cozinheiro` SMALLINT(6) NOT NULL COMMENT 'Contem o identificador unico da tabela Funcionario (PK). Sendo permitido criar receita somente COZINHEIRO\n \nidFuncionario\n0001\n0002\n0003\n0004\n...',
  `idIngrediente` INT(11) NOT NULL COMMENT 'Contem a identificacao unica do ingrediente\n\nExemplo\n\nIdIngrediente       Descricao\n\n0001                      Acucar\n0002                      Farinha\n0003                      Ovo',
  `idMedida` SMALLINT(6) NOT NULL COMMENT 'Contem o identificador unico da medida dos ingreditentes\n\n\nExemplo\n\nidMedida                    descricao\n001                             Gramas\n002                             Kilogramas\n003                             Litros\n004                             Mililitros',
  `qtd_medida` SMALLINT(6) NULL DEFAULT NULL COMMENT 'Contem a quantidade da medida do ingrediente participante da receita\n\nExemplo\n\n0002\n0001\n...',
  PRIMARY KEY (`nome`, `cozinheiro`, `idIngrediente`),
  INDEX `fk_Receita_has_Ingrediente_Ingrediente1_idx` (`idIngrediente` ASC) VISIBLE,
  INDEX `fk_Receita_has_Ingrediente_Receita1_idx` (`nome` ASC, `cozinheiro` ASC) VISIBLE,
  INDEX `fk_Receita_has_Ingrediente_Medida_Ingrediente1_idx` (`idMedida` ASC) VISIBLE,
  CONSTRAINT `fk_Receita_has_Ingrediente_Receita1`
    FOREIGN KEY (`nome` , `cozinheiro`)
    REFERENCES `Livro_de_Receita2`.`Receita` (`nome` , `cozinheiro`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Receita_has_Ingrediente_Ingrediente1`
    FOREIGN KEY (`idIngrediente`)
    REFERENCES `Livro_de_Receita2`.`Ingrediente` (`idIngrediente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Receita_has_Ingrediente_Medida_Ingrediente1`
    FOREIGN KEY (`idMedida`)
    REFERENCES `Livro_de_Receita2`.`Medida_Ingrediente` (`idMedida`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `Livro_de_Receita2`.`Medida_Ingrediente` (
  `idMedida` SMALLINT(6) NOT NULL AUTO_INCREMENT COMMENT 'Contem o identificador unico da medida dos ingreditentes\n\n\nExemplo\n\nidMedida                    descricao\n001                             Gramas\n002                             Kilogramas\n003                             Litros\n004                             Mililitros',
  `descricao` VARCHAR(45) NOT NULL COMMENT 'Contem a descricao da medida dos ingreditentes\n\n\nExemplo\n\nidMedida                    descricao\n001                             Gramas\n002                             Kilogramas\n003                             Litros\n004                             Mililitros',
  PRIMARY KEY (`idMedida`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `Livro_de_Receita2`.`Restaurante` (
  `idRestaurante` INT(11) NOT NULL AUTO_INCREMENT COMMENT 'Contem o identificador unico do restaurante\n\nExemplo\n\nidRestaurante             nome\n001                              Restaurante Churrascada\n002                             Churrascaria Churrascada',
  `nome` VARCHAR(45) NOT NULL COMMENT 'Contem o nome do restaurante que o cozinheiro ja trabalhou.\n\nExemplo\n\nidRestaurante             nome\n001                              Restaurante Churrascada\n002                             Churrascaria Churrascada',
  `contato` VARCHAR(45) NULL DEFAULT NULL COMMENT 'Informa a referencia de um contato\n\nExemplo\n\nContato\n\nMaria Rosangela Alvez Peira Matoso',
  PRIMARY KEY (`idRestaurante`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `Livro_de_Receita2`.`Referencia` (
  `idFunc` SMALLINT(6) NOT NULL COMMENT 'Contem o identificador unico da tabela Funcionario (PK)\n \nidFuncionario\n0001\n0002\n0003\n0004\n...',
  `idRestaurante` INT(11) NOT NULL COMMENT 'Contem o identificador unico do restaurante\n\nExemplo\n\nRestaurante Apache',
  `dt_inicio` DATE NOT NULL COMMENT 'Contem a data de admissao do funcionario do restaurante referenciado\n\nExemplo\n\ndt_inicio   \n\n02/02/1988',
  `dt_fim` DATE NULL DEFAULT NULL COMMENT 'Contem a data de desligamento do funcionario do restaurante referenciado\n\nExemplo\n\ndt_fim\n\n02/01/1988\n',
  PRIMARY KEY (`idFunc`, `idRestaurante`),
  INDEX `fk_Funcionario_has_Restaurante_Restaurante1_idx` (`idRestaurante` ASC) VISIBLE,
  INDEX `fk_Funcionario_has_Restaurante_Funcionario1_idx` (`idFunc` ASC) VISIBLE,
  CONSTRAINT `fk_Funcionario_has_Restaurante_Funcionario1`
    FOREIGN KEY (`idFunc`)
    REFERENCES `Livro_de_Receita2`.`Funcionario` (`idFunc`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Funcionario_has_Restaurante_Restaurante1`
    FOREIGN KEY (`idRestaurante`)
    REFERENCES `Livro_de_Receita2`.`Restaurante` (`idRestaurante`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `Livro_de_Receita2`.`Parametros` (
  `idMes` SMALLINT(6) NOT NULL COMMENT 'Contem o mes corrente determinado para producao das receitas\n\nExemplo\n\nMes              Ano          Qtd Receita\n\n05                2023                 4\n06                2023                 5\n.........',
  `idAno` SMALLINT(6) NOT NULL COMMENT 'Contem o ano  determinado para producao das receitas\n\nExemplo\n\nMes              Ano          Qtd Receita\n\n05                2023                 4\n06                2023                 5\n.........',
  `qtd_receitas` SMALLINT(6) NOT NULL COMMENT 'Contema quantidade de receitas a serem produzidas  no mes/ano determinado para a producao de receita.\nExemplo\n\nMes              Ano          Qtd Receita\n\n05                2023                 4\n06                2023                 5\n.........',
  PRIMARY KEY (`idMes`, `idAno`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `Livro_de_Receita2`.`Publicacao` (
  `Livro_idLivro` SMALLINT(6) NOT NULL,
  `Receita_nome` VARCHAR(45) NOT NULL,
  `Receita_cozinheiro` SMALLINT(6) NOT NULL,
  PRIMARY KEY (`Livro_idLivro`, `Receita_nome`, `Receita_cozinheiro`),
  INDEX `fk_Livro_has_Receita_Receita1_idx` (`Receita_nome` ASC, `Receita_cozinheiro` ASC) VISIBLE,
  INDEX `fk_Livro_has_Receita_Livro1_idx` (`Livro_idLivro` ASC) VISIBLE,
  CONSTRAINT `fk_Livro_has_Receita_Livro1`
    FOREIGN KEY (`Livro_idLivro`)
    REFERENCES `Livro_de_Receita2`.`Livro` (`idLivro`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Livro_has_Receita_Receita1`
    FOREIGN KEY (`Receita_nome` , `Receita_cozinheiro`)
    REFERENCES `Livro_de_Receita2`.`Receita` (`nome` , `cozinheiro`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
