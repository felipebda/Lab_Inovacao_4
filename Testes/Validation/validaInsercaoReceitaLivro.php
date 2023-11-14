<?php

//NOVO -COMECAR A SESSION ---------------------------------------------------------------------------------------
session_start();

include_once "../Connection/conexao.php";


//ID do Livro
$idLivro =  intval($_SESSION['idLivro']);
//Informações do Formulario
$nomeReceita = $_POST['nome_receita'];
$iDCozinheiro = intval($_POST['id_cozinheiro']);
//echo $nomeReceita. "  ". $iDCozinheiro. " ".$idLivro;

//INSERIR INFORMACOES EM PUBLICAÇOES

try
{
    $sqlInserirReceitaLivro = "INSERT into publicacao (Livro_idLivro, Receita_nome, Receita_cozinheiro)
                           VALUES (:l, :r, :c)";

    $queryInserirReceitaLivro = $pdo->prepare($sqlInserirReceitaLivro);
    $queryInserirReceitaLivro->bindValue(":l",$idLivro);
    $queryInserirReceitaLivro->bindValue(":r",$nomeReceita);
    $queryInserirReceitaLivro->bindValue(":c",$iDCozinheiro);
    $queryInserirReceitaLivro->execute();

    header("Location: ../Pages/cadastroLivro2.php");
}
catch(Exception $e)
{
    echo "<script>alert('Houve um problema no cadastro de Receita.')</script>";
    echo "<script>window.location.href = '../Pages/cadastroLivro2.php'</script>";
}



?>