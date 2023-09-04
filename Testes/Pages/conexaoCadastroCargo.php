<?php
    include_once "conexao.php";

    $novoCargo = $_POST["nome_cargo"];


    if(!isset($_POST["tipo_cadastro"]))
    {
        header("Location: cadastroCargo.php");

    }
    else
    {
        if($_POST["tipo_cadastro"] == "cargo")
        {
            $query = "INSERT INTO cargo (descicao) VALUES (:d)";
    
            $command = $pdo->prepare($query);
            $command->bindValue(":d",$novoCargo);
            $command->execute();

            header("Location: secaoAdmin.php");


        }
    }


    

?>

