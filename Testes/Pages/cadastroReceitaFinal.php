<?php
session_start();
include_once "../Connection/conexao.php";

echo"Conseguimos!!!"."<br>";

$idReceitaSession = intval($_SESSION["idReceitaCadastro"]);

//PEGAR TODAS AS INFORMACOES DA RECEITA PARA MOSTRAR AO COZINHEIRO SUA RECEITA NOVA
$sqlReceita = "SELECT re.nome,re.cozinheiro,
               fu.nome as nome_cozinheiro,
               re.idRec, re.dt_criacao,
               re.id_categ,
               cat.descricao as descricao_categ,
               re.modo_preparo, 
               re.porcoes,
               re.degustador,
               re.dt_degustacao,
               re.nota_degustacao,
               re.ind_inedita,
               re.imagem
               FROM receita re
               JOIN funcionario fu ON re.cozinheiro = fu.idFunc
               JOIN categoria cat ON  re.id_categ = cat.idCategoria
               WHERE re.idRec = :id";

$queryReceita = $pdo->prepare($sqlReceita);
$queryReceita->bindValue(":id", $idReceitaSession);
$queryReceita->execute();

$resultadoReceita = $queryReceita->fetch(PDO::FETCH_ASSOC);

$idCozinheiro = $resultadoReceita["cozinheiro"];
$nomeReceita = $resultadoReceita["nome"];

//FAZER BUSCA SEPARADA DOS DEGUSTADORES
$sqlReceitaIngrediente = "SELECT ri.idIngrediente, i.nome, m.descricao, ri.qtd_medida 
                          FROM receita_has_ingrediente ri JOIN ingrediente i ON  ri.idIngrediente = i.idIngrediente JOIN medida_ingrediente m ON ri.idMedida = m.idMedida WHERE ri.nome = :n AND ri.cozinheiro = :c";
$queryReceitaIngrediente = $pdo->prepare($sqlReceitaIngrediente);
$queryReceitaIngrediente->bindValue(":n",$nomeReceita);
$queryReceitaIngrediente->bindValue(":c",$idCozinheiro);
$queryReceitaIngrediente->execute();

//echo"id cozinheiro: ".$resultadoReceita["cozinheiro"]."<br>";
//echo"nome cozinheiro: ".$resultadoReceita["nome_cozinheiro"]."<br>";



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <h2>Cadastro de Receita concluida</h2>

    <!--Visualização das informações da receita -->
    <div>
        <img src=<?php echo"../Images/receitas/".$resultadoReceita['imagem'].".jpg"; ?> alt="Descrição da imagem" width="200px" heigh="300px">
        <p>Nome da Receita: <?php echo $resultadoReceita["nome"];?></p>
        <p>Nome do cozinheiro: <?php echo $resultadoReceita["nome_cozinheiro"];?> </p>
        <p>Categoria: <?php echo $resultadoReceita["descricao_categ"];?> </p>
        <p>Data de criacao:<?php echo $resultadoReceita["dt_criacao"];?> </p>
        <p>Porções:<?php echo $resultadoReceita["porcoes"];?> </p>
        <p>Receita Inédita: <?php if($resultadoReceita["ind_inedita"] == 1){echo "Sim";}else{echo"Não.";}?></p>
        <p></p>

        <h3>Lista de Ingredientes</h3>
        <ul>
            <?php
                while($row = $queryReceitaIngrediente->fetch(PDO::FETCH_ASSOC))
                {
                    echo "<li>".$row["qtd_medida"]." ".$row["descricao"]." de ". $row["nome"]."</li>";
                }
            ?>
        </ul>
        <br>

        <h3>Modo de Preparo</h3>
        <p><?php echo $resultadoReceita["modo_preparo"];?> </p></p>


    </div>





    
</body>
</html>