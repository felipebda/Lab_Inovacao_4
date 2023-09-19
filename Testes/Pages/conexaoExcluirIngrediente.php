<?php
    include_once "../Connection/conexao.php";

    //Tratamento da informação do formulario coerente ao Banco de dados
    $ExcluirIdIngrediente = intval($_POST['tipo_excluir']);

    if(!isset($_POST["tipo_excluir"]))
    {
        header("Location: cadastroCargo.php");

    }
    else
    {
            //Comando
            $query = "DELETE FROM ingrediente WHERE idIngrediente = :id";
    
            //Tratamento dos dados
            $command = $pdo->prepare($query);
            $command->bindValue(":id",$ExcluirIdIngrediente);
            $command->execute();

            //Ao termino, direcionar à pagina do administrador
            header("Location: secaoAdmin.php");
    }
?>

