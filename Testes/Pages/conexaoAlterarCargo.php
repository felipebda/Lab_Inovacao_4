<?php
    include_once "conexao.php";

    //Tratamento da informação do formulario coerente ao Banco de dados
    $AlterarIdCargo = intval($_POST['tipo_alterar']);
    $novoNomeCargo = $_POST["nome_cargo"];


    if(!isset($_POST["tipo_alterar"]))
    {
        header("Location: atualizaCargo.php");
    }
    else
    {
            //Comando
            $query = "UPDATE Cargo SET descicao = :n WHERE idCargo = :id";
            //Tratamento dos dados
            $command = $pdo->prepare($query);
            $command->bindValue(":n",$novoNomeCargo);
            $command->bindValue(":id",$AlterarIdCargo);
            $command->execute();
            
            //Ao termino, direcionar à pagina do administrador
            header("Location: secaoAdmin.php");
    }


?>