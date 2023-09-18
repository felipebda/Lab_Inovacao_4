<?php 
    include_once "conexao.php";

    $novoIngrediente = $_POST["nome_ingrediente"];
    $descricaoIngrediete = $_POST["desc_ingrediente"];

    /*
    echo $novoIngrediente."<br>";
    echo $descricaoIngrediete."<br>";
    */
    
    if(!isset($_POST["tipo_cadastro"]))
    {
        header("Location: cadastroIngrediente.php");

    }
    else
    {
        if($_POST["tipo_cadastro"] == "ingrediente")
        {
            $query = "INSERT INTO ingrediente (nome, descricao) VALUES (:n, :d)";
    
            $command = $pdo->prepare($query);
            $command->bindValue(":n",$novoIngrediente);
            $command->bindValue(":d",$descricaoIngrediete);
            $command->execute();

            header("Location: secaoAdmin.php");
        }
    }
    

?>

