<?php
    include_once "../Connection/conexao.php";
    require "../CLasses/RestauranteFuncoes.php";

    //Tratamento da informação do formulario coerente ao Banco de dados
    $idRestaurante = intval($_POST['tipo_excluir']);


    if(!isset($_POST["tipo_excluir"]))
    {
        header("Location: cadastroRestaurante.php");

    }
    else
    {

        //Intanciar ingredienteFuncoes para utilizar a funcao
        $restauranteFuncoes = new RestauranteFuncoes($pdo);
        $restauranteFuncoes->inativar($idRestaurante);

        header("Location: ../Pages/secaoAdmin.php");
    }
?>

