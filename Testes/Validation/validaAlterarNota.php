<?php
    session_start();
    $idFunc = $_SESSION['idFunc'];
    

    include_once "../Connection/conexao.php";
    require "../Classes/Receita.php";
    require "../Classes/ReceitaFuncoes.php";
    

    //Tratamento da informação do formulario coerente ao Banco de dados
    $AlterarIdRec = intval($_POST['tipo_alterar']);
    $novaNotaDegustacao = $_POST["nota_degustacao"];


    if(!isset($_POST["tipo_alterar"]))
    {
        header("Location: atualizaCargo.php");
    }
    else
    {
        
        $receitaFuncoes = new ReceitaFuncoes($pdo);
        $receitaFuncoes->alterar($idFunc, $AlterarIdRec,$novaNotaDegustacao);
            
        //Ao termino, direcionar à pagina do administrador
        header("Location: ../Pages/consultaReceitaDegust.php");
    }


?>