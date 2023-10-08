<?php
    include_once "../Connection/conexao.php";
    require "../Classes/Restaurante.php";
    require "../Classes/RestauranteFuncoes.php";

    $novoRestaurante = $_POST["nome_restaurante"];
    $contato = $_POST["contato"];
    $ativo = 1;

    if(!isset($_POST["tipo_cadastro"]))
    {
        header("Location: cadastroRestaurante.php");

    }
    else
    {

        
        //Criar o objeto restaurante
        $restaurante = new Restaurante(null, $novoRestaurante, $contato, $ativo);

        //Criar objeto Restaurante Funcao para ativar as funcoes
        $RestauranteFuncoes = new RestauranteFuncoes($pdo);
        $RestauranteFuncoes->cadastrar($restaurante);

        header("Location: ../Pages/secaoAdmin.php");
        
    }

?>

