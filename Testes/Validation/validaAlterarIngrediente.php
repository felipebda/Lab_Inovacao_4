<?php
    include_once "../Connection/conexao.php";
    require "../Classes/IngredienteFuncoes.php";

    //Tratamento da informação do formulario coerente ao Banco de dados
    $IdIngrediente = intval($_POST['tipo_alterar']);
    $novoNomeIngrediente = $_POST["nome_ingrediente"];
    $novaDescricaoIngrediente = $_POST["descricao_ingrediente"];

    //echo $IdIngrediente."<br>";
    //echo $novoNomeIngrediente."<br>";
    //echo $novaDescricaoIngrediente."<br>";

    if(!isset($_POST["tipo_alterar"]))
    {
        header("Location: atualizaIngrediente.php");
    }
    else
    {
        $ingredienteFuncoes = new IngredienteFuncoes($pdo);
        $ingredienteFuncoes->alterar(intVal($IdIngrediente), $novoNomeIngrediente, $novaDescricaoIngrediente);
        header("Location: ../Pages/secaoAdmin.php");
    }

?>

