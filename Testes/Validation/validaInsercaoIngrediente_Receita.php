<?php
//Abrir seçao
session_start();

include_once "../Connection/conexao.php";

$idReceita = intval($_SESSION["idReceitaCadastro"]);

$nomeReceita = "";
$idCozinheiro = 0;
$idIngrediente = 0;
$idMedida = 0;
$quantidade = 0;



if((!isset($_POST['idIngrediente'])) || (!isset($_POST['idMedida'])) || (!isset($_POST['quantidade'])) || (intval($_POST['quantidade'] == 0)))
{
    header("Location: ../Pages/cadastroReceita2.php");
}
else
{
    $idIngrediente = intval($_POST['idIngrediente']);
    $idMedida = intval($_POST['idMedida']);
    $quantidade = intval($_POST['quantidade']);
    var_dump($idIngrediente);
    var_dump($idMedida);
    var_dump($quantidade);
}

var_dump($idReceita);

//TODO - PEGAR INFORMACOES PARA PREENCHIMENTO DOS DADOS

$sqlInfoReceita = "SELECT * FROM receita WHERE idRec = :id";
$queryInfoReceita = $pdo->prepare($sqlInfoReceita);
$queryInfoReceita->bindValue(":id",$idReceita);
$queryInfoReceita->execute();

$resultadoInfoReceita = $queryInfoReceita->fetch(PDO::FETCH_ASSOC);

$nomeReceita = $resultadoInfoReceita['nome'];
$idCozinheiro = $resultadoInfoReceita['cozinheiro'];

echo "<br>";
var_dump($nomeReceita);
var_dump($idCozinheiro);
//-----------------------------------------------

//INSERIR INFORMAÇÕES NA TABELA
$sqlInserirMedidaIngrediente = "INSERT INTO receita_has_ingrediente (nome, cozinheiro, idIngrediente, idMedida, qtd_medida) VALUES (:n, :idCozi, :idIngre, :idMed, :quant)";
$queryInserirMedidaIngrediente = $pdo->prepare($sqlInserirMedidaIngrediente);

$queryInserirMedidaIngrediente->bindValue(":n",$nomeReceita);
$queryInserirMedidaIngrediente->bindValue(":idCozi",$idCozinheiro);
$queryInserirMedidaIngrediente->bindValue(":idIngre",$idIngrediente);
$queryInserirMedidaIngrediente->bindValue(":idMed",$idMedida);
$queryInserirMedidaIngrediente->bindValue(":quant",$quantidade);
$queryInserirMedidaIngrediente->execute();

header("Location: ../Pages/cadastroReceita2.php");

?>

