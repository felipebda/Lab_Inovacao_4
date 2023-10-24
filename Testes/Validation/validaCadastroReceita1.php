<?php
    //Começar uma seção para persistencia de dados
    session_start();

    include_once "../Connection/conexao.php";
    require "../Classes/ReceitaFuncoes.php";

    //Instanciando objetos para aplicar suas funcoes
    $receitaFuncoes = new ReceitaFuncoes($pdo);

    //RECEBER AS INFORMACOES DO CADASTRO
    $nomeReceita = $_POST["nome_receita"];
    $dataReceita =$_POST["data_receita"];
    $idCozinheiro = intval($_POST["id_cozinheiro"]);
    $nomeCozinheiro = $_POST["nome_cozinheiro"];
    $idCategoria = intval($_POST["idCategoria"]);

    //GARANTIR O ACRESCIMA CERTO DO IDRECEITA
    $idReceita = 0;

    $idReceita = $receitaFuncoes->adicionarId();


    //APAGAR OU COMENTAR DEPOIS DE COMPLETO
    //echo $idReceita;

    //PERSISTENCIA DE DADOS DA NOVA RECEITA PARA PROXIMA PÁGINA
    //Criar um cookie para pegarmos a informação da nova receita nas paginas de cadastro
    $_SESSION["idReceitaCadastro"] = $idReceita;


    if(!isset($_POST['tipo_cadastro']))
    {
        header("Location: ../Pages/cadastroReceita1.php");
    }
    else
    {
        $receitaFuncoes->inserirReceitaPreliminar($nomeReceita,$idCozinheiro,$idReceita, $dataReceita,$idCategoria);

        //jogar para próxima pagina de cadastro
        header("Location: ../Pages/cadastroReceita2.php");
    }

    //PERSISTENCIA DE DADOS DA NOVA RECEITA PARA PROXIMA PÁGINA




?>