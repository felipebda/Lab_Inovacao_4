<?php

if (!isset($_POST["cadastrar"])) {

    echo "erro no cadastro";
} else {

    include_once "../Connection/conexao.php";
    require "../Classes/Medida.php";
    require "../Classes/medidaFuncoes.php";


    //CRIANDO NOVO OBJETO medida:'
    $medida = new Medida(
              null,
              $_POST['descricao'],

    );
       
    //INSTANCIANDO O OBJ COM CONEXAO PDO E EXECUTANDO FUNCAO DE CADASTRAR
    $medidaFuncao = new medidaFuncoes($pdo);
    $medidaFuncao->cadastrarMedida($medida);

    echo "Sucesso: inclusao de medida";

    //header("Location: consultaMedida.php");
}
