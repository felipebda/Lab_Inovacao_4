Ç<?php
//NOVO -COMECAR A SESSION ---------------------------------------------------------------------------------------
session_start();

include_once '../Connection/conexao.php';

echo "Entrou";

//RECEBER AS INFORMACOES DO CADASTRO
$nomeLivro = $_POST["nome_livro"];
$isbn = $_POST["isbn"];
$nomeEditor = $_POST["id_editor"];


try
{
    //INSERIR INFORMAÇÕES NA TABELA LIVRO
    $sqlInsertLivro = "INSERT iNTO livro (titulo_livro, isbn, editor) VALUES (:t, :i, :id)";
    $queryInsertLivro = $pdo->prepare($sqlInsertLivro);
    $queryInsertLivro->bindValue(":t", $nomeLivro);
    $queryInsertLivro->bindValue(":i", $isbn);
    $queryInsertLivro->bindValue(":id", intval($nomeEditor));
    $queryInsertLivro->execute();


    //Fazer a consulta para pegar o ID do LIVRO

    $sqlBuscaIdLivro = "SELECT idLivro FROM livro WHERE titulo_livro = :t AND isbn = :i AND editor = :id";
    $queryBuscaIdLivro = $pdo->prepare($sqlBuscaIdLivro);
    $queryBuscaIdLivro->bindValue(":t", $nomeLivro);
    $queryBuscaIdLivro->bindValue(":i", $isbn);
    $queryBuscaIdLivro->bindValue(":id", intval($nomeEditor));
    $queryBuscaIdLivro->execute();

    $resultadoBuscaIdLivro = $queryBuscaIdLivro->fetch(PDO::FETCH_ASSOC);


    //Mandar para a página de inserir as receitas

    $_SESSION['idLivro'] = intval($resultadoBuscaIdLivro['idLivro']);

    

    header("Location: ../Pages/cadastroLivro2.php");


}
catch(Exception $e)
{
    echo "<script>alert('Nome muito comprido. Até 45 caracteres.')</script>";
    echo "<script>window.location.href = '../Pages/cadastroLivro1.php'</script>";

}




?>