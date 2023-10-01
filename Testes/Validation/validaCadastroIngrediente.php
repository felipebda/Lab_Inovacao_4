<?php 
    include_once "../Connection/conexao.php";
    require "../Classes/Ingrediente.php";
    require "../Classes/IngredienteFuncoes.php";


    $novoIngrediente = $_POST["nome_ingrediente"];
    $descricaoIngrediete = $_POST["desc_ingrediente"];
    $ativo = 1;
    
    if(!isset($_POST["tipo_cadastro"]))
    {
        header("Location: cadastroIngrediente.php");

    }
    else
    {
        //Criar o objeto ingrediente
        $ingrediente = new Ingrediente(null,$novoIngrediente, $descricaoIngrediete, $ativo);

        //Criar objeto Ingrediente Funcao para ativar as funcoes
        $ingredienteFuncoes = new IngredienteFuncoes($pdo);
        $ingredienteFuncoes->cadastrar($ingrediente);

        header("Location: ../Pages/secaoAdmin.php");
    }
    

?>

