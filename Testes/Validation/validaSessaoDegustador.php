<?php

//if (!isset($_POST[""])) {

//    echo "erro no upload de dados";
//} else {

    include_once "../Connection/conexao.php";
    require "../Classes/Funcionario.php";
    require "../Classes/FuncionarioFuncoes.php";

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
  
    //ACESSO VIA COOKIE
    if(isset($_COOKIE["u_email"]) && !isset($_POST["tipo_acesso"]))
    {
      $id_func = intval($_COOKIE['u_idcargo']);
  
      $q_cookie = $pdo->prepare("SELECT * FROM funcionario WHERE idCargo = :id");
      $q_cookie->bindValue(":id", $id_func);
      $q_cookie->execute();
    
  
      $lista_cookie = $q_cookie->fetchAll(PDO::FETCH_ASSOC);
      
      $idFunc = $lista_cookie[0]["idFunc"];
      $rg = $lista_cookie[0]["rg"];
      $nome = $lista_cookie[0]["nome"];
      $dt_ingr = $lista_cookie[0]["dt_ingr"];
      $salario = $lista_cookie[0]["salario"];
      $idcargo = $lista_cookie[0]["idCargo"];
      $nome_fantasia = $lista_cookie[0]["nome_fantasia"];
      $email = $lista_cookie[0]["emailFunc"];
      $senha = $lista_cookie[0]["senha"];
    }

?>

