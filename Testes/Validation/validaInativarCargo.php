<?php
    include_once "../Connection/conexao.php";
    require "../Classes/CargoFuncoes.php";

    //Tratamento da informação do formulario coerente ao Banco de dados
    $excluirIdCargo = intval($_POST['tipo_excluir']);


    if(!isset($_POST["tipo_excluir"]))
    {
        header("Location: cadastroCargo.php");

    }
    else
    {
        //Fazer objeto da classe CargoFuncoes
        $cargoFuncoes = new CargoFuncoes($pdo);
        $cargoFuncoes->inativar($excluirIdCargo);

            //Ao termino, direcionar à pagina do administrador
            header("Location: ../Pages/secaoAdmin.php");
    }
?>

