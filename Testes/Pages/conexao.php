<?php
//Variaveis de conexao
    $dbname = "livro_de_receita";
    $local = "localhost";
    $user = "root";
    $password = "123456";

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