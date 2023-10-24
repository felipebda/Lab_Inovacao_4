<?php
//Abrir seçao
session_start();
include_once "../Connection/conexao.php";

$idReceitaSession = intval($_SESSION["idReceitaCadastro"]);
$nomeReceita = $_FILES["imagem"]["name"];
$nomeReceita = str_replace(".jpg", "", $nomeReceita);
$nomeReceita = "idRec_".$idReceitaSession."_".$nomeReceita;


echo$idReceitaSession."<br>";
echo$nomeReceita."<br>";

//TESTE DE SALVAR IMAGEM

//var_dump($_POST['imagem']);


//SALVAR FOTO NO DIRETÓRIO
if(isset($_FILES['imagem']))
{
    $ext = strtolower(substr($_FILES['imagem']['name'],-4)); //Pegando extensão do arquivo
    $new_name = $nomeReceita.$ext; //Definindo um novo nome para o arquivo
    $dir = '../Images/receitas/'; //Diretório para uploads 
    move_uploaded_file($_FILES['imagem']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
    echo("Imagen enviada com sucesso!");
} 

//ACRESCENTAR O NOME DA IMAGEM DA RECEITA NA TABELA RECEITA
$sqlNomeFoto = "UPDATE receita
                SET imagem = :nome
                WHERE idRec = :id";

$queryNomeFoto = $pdo->prepare($sqlNomeFoto);
$queryNomeFoto->bindValue(":nome",$nomeReceita);
$queryNomeFoto->bindValue(":id",$idReceitaSession);
$queryNomeFoto->execute();


header("Location: ../Pages/cadastroReceitaFinal.php");


?>