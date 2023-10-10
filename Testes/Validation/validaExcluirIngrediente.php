<?php
    include_once "../Connection/conexao.php";
    require "../CLasses/IngredienteFuncoes.php";

    //Tratamento da informação do formulario coerente ao Banco de dados
    $idIngrediente = intval($_POST['tipo_excluir']);

    if(!isset($_POST["tipo_excluir"]))
    {
        header("Location: cadastroIngrediente.php");

    }
    else
    {

        //Intanciar ingredienteFuncoes para utilizar a funcao
        $ingredienteFuncoes = new IngredienteFuncoes($pdo);
        $ingredienteFuncoes->inativar($idIngrediente);

        header("Location: ../Pages/secaoAdmin.php");
    }
?>

