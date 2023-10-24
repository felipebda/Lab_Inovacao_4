<?php
//Abrir seçao
session_start();

include_once "../Connection/conexao.php";

//Pegar as informações do formulario
$idReceita = intval($_POST["idReceita"]);
$porcoes = intval($_POST["porcoes"]);
$preparo = $_POST["preparo"];

echo "entrou";
echo $idReceita."<br>";
echo $porcoes."<br>";
echo $preparo."<br>";

//INSERIR INFORMACOES NA RECEITA - UPDATE

$sqlInserirPreparo = "UPDATE receita
                      SET porcoes = :p,
                          modo_preparo = :m
                      WHERE idRec = :id ";

$queryInserirPreparo = $pdo->prepare($sqlInserirPreparo);
$queryInserirPreparo->bindValue(":p",$porcoes);
$queryInserirPreparo->bindValue(":m",$preparo);
$queryInserirPreparo->bindValue(":id",$idReceita);
$queryInserirPreparo->execute();


header("Location: ../Pages/cadastroReceita4.php");

?>