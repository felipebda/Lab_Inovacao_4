<?php
    include_once "../Connection/conexao.php";
    require "../Classes/RestauranteFuncoes.php";

    //Tratamento da informação do formulario coerente ao Banco de dados
    $IdRestaurante = intval($_POST['tipo_alterar']);
    $novoNomeRestaurante = $_POST["nome_restaurante"];
    $novoContato = $_POST["contato"];

    if(!isset($_POST["tipo_alterar"]))
    {
        header("Location: atualizaIngrediente.php");
    }
    else
    {
        $RestauranteFuncoes = new RestauranteFuncoes($pdo);
        $RestauranteFuncoes->alterar(intVal($IdRestaurante), $novoNomeRestaurante, $novoContato);
        header("Location: ../Pages/secaoAdmin.php");
    }

?>