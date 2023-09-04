<?php
//Variaveis de conexao
    $dbname = "livro_de_receita2";
    $local = "localhost";
    $user = "exemplo_usuario";
    $password = "exemplo_senha";

//CONEXAO COM BANCO DE DADOS
try
{
    $pdo = new PDO("mysql:dbname=".$dbname.";host=".$local."",$user,$password);
    
}
catch(PDOException $e)
{
    echo "Erro ao conectar com banco de dados: ".$e->getMessage();
}

?>