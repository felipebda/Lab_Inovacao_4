<?php

if (!isset($_POST["cadastrar"])) {

    echo "erro no upload de dados";
} else {

    include_once "conexao.php";
    require "../Classes/Funcionario.php";
    require "../Classes/FuncionarioFuncoes.php";

    if (isset($_FILES["imagem"]) && !empty($_FILES["imagem"])) {
        $imagem = "../Images/usuarios/" . $_FILES["imagem"]["name"];
        move_uploaded_file($_FILES["imagem"]["tmp_name"], $imagem);
    } else {
        $imagem = "imagem em branco!";
    }

    //CRIANDO NOVO OBJETO FUNCIONARIO:
    $funcionario = new Funcionario(
        null,
        $_POST['rg'],
        $_POST['nome'],
        $_POST['dt_ingr'],
        $_POST['salario'],
        $_POST['idCargo'],
        $_POST['nome_fantasia'],
        $_POST['email'],
        $_POST['senha'],
        //erro aqui na imagem
        $_POST['imagem']

    );

    //INSTANCIANDO O OBJ COM CONEXAO PDO E EXECUTANDO FUNCAO DE CADASTRAR
    $funcionarioFuncao = new FuncionarioFuncoes($pdo);
    $funcionarioFuncao->cadastrar($funcionario);

    echo "Inclusao com sucesso";

    header("Location: login.php");
}
