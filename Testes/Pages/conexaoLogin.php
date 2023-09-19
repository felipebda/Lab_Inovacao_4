<?php
    include_once "../Connection/conexao.php";

    //Variaveis usuario
    $idFunc = 0;
    $rg = "";
    $nome = "";
    $dt_ingr = "";
    $salario = 0;
    $idcargo = 0;
    $nome_fantasia = "";
    $email = "";
    $senha = "";
  
    $nome_cargo = "";

    //ACESSO PADRAO - VIA LOGIN

    if(isset($_POST["tipo_acesso"]))
    {
        try
        {
        $email = $_POST["email"];
        $senha = $_POST["senha"];

        $query = $pdo->prepare("SELECT * FROM funcionario WHERE emailFunc = :e AND senha = :s");
        $query->bindValue(":e", $email);
        $query->bindValue(":s", $senha);
        $query->execute();
        //var_dump ($query);

        $lista = $query->fetchAll(PDO::FETCH_ASSOC);
        if(count($lista) == 0)
        {
            throw new Exception("Erro na busca do funcionario no login", 1);
        }

        $idFunc = $lista[0]["idFunc"];
        $rg = $lista[0]["rg"];
        $nome = $lista[0]["nome"];
        $dt_ingr = $lista[0]["dt_ingr"];
        $salario = $lista[0]["salario"];
        $idcargo = $lista[0]["idCargo"];
        $nome_fantasia = $lista[0]["nome_fantasia"];
        $email = $lista[0]["emailFunc"];
        $senha = $lista[0]["senha"];

        // TODO: Fazer um cookie com o id do usuario
        setcookie('u_email', $email, time()+3000);
        setcookie('u_senha', $senha, time()+3000);
        setcookie('u_idcargo', $idcargo, time()+3000);
        
        //DIRECIONAR A PAGINA PELO CARGO
        if ($idcargo == 1) 
        {
            header("Location: secaoAdmin.php");
            exit();
        }
        else if($idcargo == 3)
        {
            header("Location: secaoCozi.php");
            exit();
        }
        }
        catch(Exception $e)
        {
            header("Location: login.php");
            echo "Excecao capturada: ".$e->getMessage()."\n";
            exit();
        } 
    }


?>