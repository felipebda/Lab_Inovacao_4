ALTER TABLE categoria ADD COLUMN ativo integer;

SELECT * FROM categoria;

UPDATE `livro_de_receita2`.`categoria`
                            SET `ativo` = 0
                            WHERE `idCategoria` = 1;
