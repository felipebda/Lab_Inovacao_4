<?php

if (!isset($_POST["cadastrar"])) {

    echo "erro no cadastro";
} else {

    include_once "../Connection/conexao.php";
    require "../Classes/Categoria.php";
    require "../Classes/CategoriaFuncoes.php";


    //CRIANDO NOVO OBJETO categoria:'
    $categoria = new Categoria(
              null,
              $_POST['descricao'],

    );
       
    //INSTANCIANDO O OBJ COM CONEXAO PDO E EXECUTANDO FUNCAO DE CADASTRAR
    $categoriaFuncao = new CategoriaFuncoes($pdo);
    $categoriaFuncao->cadastrar($categoria);

    echo "Sucesso: inclusao de categoria";

    //header("Location: consultaCategoria.php");
}
