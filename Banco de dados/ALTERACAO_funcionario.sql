/*PARA ADICIONAR AS COLUNAS DE EMAIL, SENHA E  IMAGEM À TABELA FUNCIONARIO */
ALTER TABLE funcionario ADD COLUMN emailFunc varchar(45);
ALTER TABLE funcionario ADD COLUMN senha varchar(64);
ALTER TABLE funcionario ADD COLUMN imagem varchar(70);
ALTER TABLE funcionario ADD COLUMN ativo integer; 
ALTER TABLE funcionario MODIFY COLUMN senha varchar(255);

SHOW GRANTS FOR `receita_apl`@`localhost`;

SELECT * FROM funcionario;

UPDATE `livro_de_receita2`.`funcionario`
                            SET `ativo` = 1
                            WHERE `idFunc` = 2;
                            


