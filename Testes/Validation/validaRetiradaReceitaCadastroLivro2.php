<?php

//NOVO -COMECAR A SESSION ---------------------------------------------------------------------------------------
session_start();

include_once "../Connection/conexao.php";

//ID do Livro
$idLivro =  intval($_SESSION['idLivro']);
//Informações do Formulario
$nomeReceita = $_POST['nome_receita'];
$iDCozinheiro = intval($_POST['id_cozinheiro']);

//FAZER A RETIRADA DA RECEITA NA PUBLICAÇÂO

try
{
    $sqlRetiradaReceitaLivro = "DELETE FROM publicacao
                                WHERE Livro_idLivro = :id AND
                                Receita_nome = :r AND
                                Receita_cozinheiro = :c";
    
    $queryRetiradaReceitaLivro = $pdo->prepare($sqlRetiradaReceitaLivro);
    $queryRetiradaReceitaLivro->bindValue(":id",$idLivro);
    $queryRetiradaReceitaLivro->bindValue(":r",$nomeReceita);
    $queryRetiradaReceitaLivro->bindValue(":c",$iDCozinheiro);
    $queryRetiradaReceitaLivro->execute();

    header("Location: ../Pages/cadastroLivro2.php");
}
catch(Exception $e)
{
    echo "<script>alert('Houve um problema na retirada da Receita.')</script>";
    echo "<script>window.location.href = '../Pages/cadastroLivro2.php'</script>";
}

?>