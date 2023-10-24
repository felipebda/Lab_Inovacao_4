<?php
    include_once "../Connection/conexao.php";
    require "../Classes/FuncionarioFuncoes.php";
    require "../Classes/Funcionario.php";
    require "../Validation/validaFuncionario.php";

    if(isset($_POST["tipo_acesso"]))
    {
        try
        {
        //PEGAR A REQUISIÇÃO DO LOGIN:
        $emailFunc = $_POST["email"];
        $senhaPura = $_POST["senha"];
        
        //INSTANCIAR FUNCIONARIO COM OS MÉTODOS:
        $funcionarioFuncao = new FuncionarioFuncoes($pdo);

        //PEGAR HASH PELO EMAIL NO DB:
        $senhaSegura = $funcionarioFuncao->getHash($emailFunc);
        
        //VERIFICAR SE O HASH DESCRIPTOGRAFA IGUAL A SENHA QUE O USUÁRIO INSERIU:
        $verificaSenha = $funcionarioFuncao->validarSenha($senhaPura, $senhaSegura);
        
        //CRIAR OBJETO PÓS VALIDAÇÃO:
        $objFuncionario = $funcionarioFuncao->criarObjeto($emailFunc, $verificaSenha);

        //BUSCAR O ID DO CARGO NO OBJETO CRIADO ACIMA:
        $buscarCargo = $funcionarioFuncao->buscarCargo($emailFunc);
        

        //SETAR O COOKIE:
        $setCookie = $funcionarioFuncao->setCookie($emailFunc, $verificaSenha, $buscarCargo);
        
        //DIREICIONAR SECAO DE FUNCIONARIO DE ACORDO COM O ID DO CARGO:
        $direcionaSecao = $funcionarioFuncao->direcionarSecao($setCookie);
       
        }
        catch(Exception $e)
        {
            header("Location: login.php");
            echo "Excecao capturada: ".$e->getMessage()."\n";
            exit();
        } 


    }


?>