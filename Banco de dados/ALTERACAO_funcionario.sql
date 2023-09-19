/*PARA ADICIONAR AS COLUNAS DE EMAIL, SENHA E  IMAGEM À TABELA FUNCIONARIO */
ALTER TABLE funcionario ADD COLUMN emailFunc varchar(45);
ALTER TABLE funcionario ADD COLUMN senha varchar(64);
ALTER TABLE funcionario ADD COLUMN imagem varchar(70);

SHOW GRANTS FOR `receita_apl`@`localhost`;

SELECT * FROM funcionario;