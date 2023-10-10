<?php
    include_once "../Connection/conexao.php";
    require "../Classes/CargoFuncoes.php";

    //Tratamento da informação do formulario coerente ao Banco de dados
    $AlterarIdCargo = intval($_POST['tipo_alterar']);
    $novoNomeCargo = $_POST["nome_cargo"];


    if(!isset($_POST["tipo_alterar"]))
    {
        header("Location: atualizaCargo.php");
    }
    else
    {
        $cargoFuncoes = new CargoFuncoes($pdo);
        $cargoFuncoes->alterar($AlterarIdCargo,$novoNomeCargo);
        
            /*
            //Comando
            $query = "UPDATE Cargo SET descicao = :n WHERE idCargo = :id";
            //Tratamento dos dados
            $command = $pdo->prepare($query);
            $command->bindValue(":n",$novoNomeCargo);
            $command->bindValue(":id",$AlterarIdCargo);
            $command->execute();
            */
            
        //Ao termino, direcionar à pagina do administrador
        header("Location: ../Pages/secaoAdmin.php");
    }


?>