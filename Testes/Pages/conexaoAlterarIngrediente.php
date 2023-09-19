<?php
    include_once "../Connection/conexao.php";

    //Tratamento da informação do formulario coerente ao Banco de dados
    $IdIngrediente = intval($_POST['tipo_alterar']);
    $novoNomeIngrediente = $_POST["nome_ingrediente"];
    $novaDescricaoIngrediente = $_POST["descricao_ingrediente"];

    //echo $IdIngrediente."<br>";
    //echo $novoNomeIngrediente."<br>";
    //echo $novaDescricaoIngrediente."<br>";

    if(!isset($_POST["tipo_alterar"]))
    {
        header("Location: atualizaIngrediente.php");
    }
    else
    {
            //Comando
            $query = "UPDATE ingrediente SET nome = :n, descricao = :d WHERE idIngrediente = :id";
            //Tratamento dos dados
            $command = $pdo->prepare($query);
            $command->bindValue(":n",$novoNomeIngrediente);
            $command->bindValue(":d",$novaDescricaoIngrediente);
            $command->bindValue(":id",$IdIngrediente);
            $command->execute();
            
            //Ao termino, direcionar à pagina do administrador
            header("Location: secaoAdmin.php");
    }

?>

