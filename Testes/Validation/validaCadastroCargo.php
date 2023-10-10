<?php
    include_once "../Connection/conexao.php";
    require "../Classes/Cargo.php";
    require "../Classes/CargoFuncoes.php";
    
    //$novoCargo = $_POST["nome_cargo"];

    //INFORMAR ATIVO
    
    
    if(!isset($_POST["tipo_cadastro"]))
    {
        header("Location: cadastroCargo.php");

    }
    else
    {
            //CRIANDO NOVO OBJETO cargo:'
            $cargo = new Cargo(
                null,
                $_POST['descicao'],
                $_POST['ativo'],

            );

            //INSTANCIANDO O OBJ COM CONEXAO PDO E EXECUTANDO FUNCAO DE CADASTRAR
            $cargoFuncao = new CargoFuncoes($pdo);
            $cargoFuncao->cadastrar($cargo);

            echo "Sucesso: inclusao de categoria";
            header("Location: ../Pages/secaoAdmin.php");

            /*
            $query = "INSERT INTO cargo (descicao) VALUES (:d)";
    
            $command = $pdo->prepare($query);
            $command->bindValue(":d",$novoCargo);
            $command->execute();

            header("Location: ../Pages/secaoAdmin.php");*/
    }
    


    

?>

