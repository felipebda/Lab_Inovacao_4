<?php
    include_once "conexao.php";

    //Tratamento da informação do formulario coerente ao Banco de dados
    $ExcluirIdCargo = intval($_POST['tipo_excluir']);


    if(!isset($_POST["tipo_excluir"]))
    {
        header("Location: cadastroCargo.php");

    }
    else
    {
            //Comando
            $query = "DELETE FROM cargo WHERE idCargo = :id";
    
            //Tratamento dos dados
            $command = $pdo->prepare($query);
            $command->bindValue(":id",$ExcluirIdCargo);
            $command->execute();

            //Ao termino, direcionar à pagina do administrador
            header("Location: secaoAdmin.php");
    }
?>

