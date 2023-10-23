<?php
session_start();

include_once "../Connection/conexao.php";

$idReceita = intval($_SESSION["idReceitaCadastro"]);
$idIngrediente = intval($_POST['excluir_ing_receita']);

//TODO -- PEGAR AS INFORMACOES DO NOME DA RECEITA E DO IDCOZINHEIRO PARA FAZER A EXCLUSAO
$sqlInfoReceita = "SELECT nome,cozinheiro FROM receita WHERE idRec = :id";
$buscaInfoReceita = $pdo->prepare($sqlInfoReceita);
$buscaInfoReceita->bindValue(":id",$idReceita);
$buscaInfoReceita->execute();
$resultadoInfoReceita = $buscaInfoReceita->fetch(PDO::FETCH_ASSOC);

$nomeReceita = $resultadoInfoReceita['nome'];
$idCozinheiro = intval($resultadoInfoReceita['cozinheiro']);

echo"id do ingrediente = ".$idIngrediente;
echo"<br>";
echo "idd a receita = ".$idReceita;
echo"<br>";
echo "nome receita = ".$resultadoInfoReceita['nome'];
echo"<br>";
echo "id funcionario = ".$resultadoInfoReceita['cozinheiro'];

//FAZER EXCLUSAO DDO INGREDIENTE EM RECEITA_HAS_INGREDIENTE

$sqlExcluirIngrediente = "DELETE FROM receita_has_ingrediente WHERE nome = :n AND cozinheiro = :c AND idIngrediente = :ing";
$buscaEcluirIngrediente = $pdo->prepare($sqlExcluirIngrediente);
$buscaEcluirIngrediente->bindValue(":n",$nomeReceita);
$buscaEcluirIngrediente->bindValue(":c",$idCozinheiro);
$buscaEcluirIngrediente->bindValue(":ing",$idIngrediente);
$buscaEcluirIngrediente->execute();

//TODO -- LEVAR PARA A PAGINA CADASTRO RECEITA2.PHP

header("Location:../Pages/cadastroReceita2.php");
?>