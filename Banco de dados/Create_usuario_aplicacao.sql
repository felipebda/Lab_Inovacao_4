!--- Rodar esse código no root depois entrar no usuário da aplicação

CREATE USER `receita_apl`@`localhost` IDENTIFIED BY 'Livrodereceita23%';

/* se quiser alterar a senha 

ALTER USER `receita_apl`@`%` IDENTIFIED BY 'novasenha';

*/


/* concede privilégios para que o receita_apl possa executar SELECT, INSERT, DELETE e  UPDATE nas tabelas do schema livro_de_receita
 */

GRANT ALL PRIVILEGES ON `livro_de_receita2`.* TO 'receita_apl'@'localhost'; 

/*mostra as permissões do usuário receita_apl

SHOW GRANTS FOR `receita_apl`@`localhost`;

*/