<?php
//Abrir seçao
session_start();

include_once "../Connection/conexao.php";



//echo "Entrou pagina 2". "<br>";

$idReceitaSession = intval($_SESSION["idReceitaCadastro"]);
//var_dump($idReceitaSession);
//echo "idReceita = ".$idReceitaSession;
//echo"<br><br>";

//-------PEGAR AS INFORMAÇÔES DA RECEITA E COMPLEMENTAR COM NOVAS INFORMAÇÔES-----------------

$nomeReceita = "";
$idCozinheiro = 0;
$nomeCozinheiro = "";
$idReceita = 0;
$dataCriacao = "";
$idCategoria = 0;
$porcoesReceita = 0;
$inedita = 0;

//SQL da receita
$sqlReceita = "SELECT * FROM receita WHERE idRec = :id";

$buscaReceita = $pdo->prepare($sqlReceita);
$buscaReceita->bindValue(":id", $idReceitaSession);
$buscaReceita->execute();

$resultadoReceita = $buscaReceita->fetch(PDO::FETCH_ASSOC);

$nomeReceita = $resultadoReceita['nome'];
$idCozinheiro = $resultadoReceita['cozinheiro'];
$idReceita = $resultadoReceita['idRec'];
$dataCriacao = $resultadoReceita['dt_criacao'];
$idCategoria = $resultadoReceita['id_categ'];
$inedita = $resultadoReceita['ind_inedita'];

/* 
APAGAR QUANDO ESTIVER COMPLETO!!!
var_dump($nomeReceita);
echo "<br>";
var_dump($idCozinheiro);
echo "<br>";
var_dump($idReceita);
echo "<br>";
var_dump($dataCriacao);
echo "<br>";
var_dump($idCategoria);
echo "<br>";
var_dump($inedita);
echo "<br>";
*/

//-------------------------------------------------------------------

//---SQL PARA PEGAR NOME DO COZINHEIRO---------------------

$sqlNomeCozinheiro = "SELECT * FROM funcionario WHERE idFunc = :id";
$buscaNomeCozinheiro = $pdo->prepare($sqlNomeCozinheiro);

$buscaNomeCozinheiro->bindValue(":id", $idCozinheiro);
$buscaNomeCozinheiro->execute();
$resultadoNomeCozinheiro = $buscaNomeCozinheiro->fetch(PDO::FETCH_ASSOC);

$nomeCozinheiro = $resultadoNomeCozinheiro['nome'];

//APAGAR QUANDO ESTIVER COMPLETO
//var_dump($nomeCozinheiro);
//--------------------------------------------------------

//--SQL PARA PEGAR NOME DA CATEGORIA--------------------------------

$sqlNomeCategoria = "SELECT * FROM categoria WHERE idCategoria = :id";
$buscaNomeCategoria = $pdo->prepare($sqlNomeCategoria);

$buscaNomeCategoria->bindValue(":id", $idCategoria);
$buscaNomeCategoria->execute();

$resultadoNomeCategoria = $buscaNomeCategoria->fetch(PDO::FETCH_ASSOC);

$nomeCategoria = $resultadoNomeCategoria['descricao'];
//APAGAR QUANDO ESTIVER COMPLETO
//var_dump($nomeCategoria);

//-----------------------------------------------------------------

//-----SQL PARA PEGAR AS INFORMAÇÕES DOS INGREDIENTES
$sqlBuscaIngrediente = "SELECT * FROM ingrediente where ativo = 1 ORDER BY nome ASC";
$queryBuscaIngrediente= $pdo->query($sqlBuscaIngrediente);

//-------------------------------------

//---SQL PEGAR INFORMAÇÕES DAS MEDIDAS------------------
$sqlBuscaMedida = "SELECT * FROM medida_ingrediente where ativo = 1 ORDER BY idMedida ASC";
$queryBuscaMedida= $pdo->query($sqlBuscaMedida);

//---------------------------------------------------

//---------SQL PEGAR INFORMACOES DE INGREDIENTES JA INCLUSO NA RECEITA

$sqlReceitaIngrediente = "SELECT ri.idIngrediente, i.nome, m.descricao, ri.qtd_medida 
                          FROM receita_has_ingrediente ri JOIN ingrediente i ON  ri.idIngrediente = i.idIngrediente JOIN medida_ingrediente m ON ri.idMedida = m.idMedida WHERE ri.nome = :n AND ri.cozinheiro = :c";
$queryReceitaIngrediente = $pdo->prepare($sqlReceitaIngrediente);
$queryReceitaIngrediente->bindValue(":n",$nomeReceita);
$queryReceitaIngrediente->bindValue(":c",$idCozinheiro);
$queryReceitaIngrediente->execute();


//DESCOBRIR SE POSSUI ITENS EM RECEITA HAS INGREDIENTE

$sqlTemIngrediente = "SELECT ri.idIngrediente, i.nome, m.descricao, ri.qtd_medida 
                      FROM receita_has_ingrediente ri JOIN ingrediente i ON  ri.idIngrediente = i.idIngrediente JOIN medida_ingrediente m ON ri.idMedida = m.idMedida WHERE ri.nome = :n AND ri.cozinheiro = :c";
$queryTemIngediente = $pdo->prepare($sqlReceitaIngrediente);
$queryTemIngediente->bindValue(":n",$nomeReceita);
$queryTemIngediente->bindValue(":c",$idCozinheiro);
$queryTemIngediente->execute();
$buscaTemIngrediente = $queryTemIngediente->fetchAll(PDO::FETCH_ASSOC);

//------------------------------------------------------------------

?>



<!DOCTYPE html>
<html lang="en">
<head>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>My CookBook</title>
</head>
<body>
    <!-- HEADER -->
    <div class="container">
      <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-book me-2" viewBox="0 0 16 16">
          <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
        </svg>
          <span class="fs-4">My CookBook</span>
        </a>

        <ul class="nav nav-pills">
          <li class="nav-item"><a href="../index1.php" class="nav-link active" aria-current="page">Home</a></li>
          <li class="nav-item"><a href="#" class="nav-link">Features</a></li>
          <li class="nav-item"><a href="#" class="nav-link">Pricing</a></li>
          <li class="nav-item"><a href="#" class="nav-link">FAQs</a></li>
          <li class="nav-item"><a href="#" class="nav-link">About</a></li>
        </ul>
      </header>
    </div>
    <!--END HEADER -->

    <div class= "container mt-3">
        <div class="row">
            <div class = col-2>
            <h3>Cadastro de Receita</h3>
            </div>
            <div class = col-8>
            </div>
            <div class = col-2>
            <h4>etapa 2/4</h4>
            </div>

            <hr>
        </div>
    </div>


    <!--Formulario de inscrição de ingredientes na receita -->
    <div class="container mt-3">
        <h3>Adicionar Ingredientes</h3>

        <form class="form-signin w-100 m-auto" action="../Validation/validaInsercaoIngrediente_Receita.php" method="post">
        <div class="row">
            <div class = "col-3">
                <label for="IdIngregiente">Lista de Ingrediente</label>
                <br>
                <!--//Separar por categoria-->
                <select class="form-select" name="idIngrediente" id="idIngrediente" size = "5" required>
                    <option disabled selected value> -- escolha uma opção -- </option>
                    <?php 
                    
                        while($row = $queryBuscaIngrediente->fetch(PDO::FETCH_ASSOC))
                        {
                            echo '<option value="'.$row['idIngrediente'].'">'.$row['nome'].'</option>';
                        }
                    ?>
                </select>   
            </div>

            <div class="col-3">
                <!--//Separar por categoria-->
                <label for="IdIngregiente">Lista de Categoria</label>
                <select class="form-select" name="idMedida" id="idMedida" size = "5" required>
                    <option disabled selected value> -- escolha uma opção -- </option>
                        <?php 
                            
                            while($row = $queryBuscaMedida->fetch(PDO::FETCH_ASSOC))
                            {
                                echo '<option value="'.$row['idMedida'].'">'.$row['descricao'].'</option>';
                            }
                        ?>
                </select>
            </div>

            <div class="col-3">
                <label for="quantidade">Quantidade</label>
                <input type="number" class="form-control" id="quantidade" name="quantidade" min="1" required>
            </div>

            <div class="col-3">
                
                <button class="btn btn-primary w-30 py-2 mt-3" type="submit">Adicionar</button>
                <br>
                
                
            </div>
            </form>
        </div>
        <a href="cadastroReceita3.php">
            <button class="btn btn-success w-30 py-2 mt-3">Continuar</button>
        </a>
    </div>


    <!--Tabela de Ingredientes, caso tenha -->
    <div class="container mt-5">
        <h3>Registro de ingredientes</h3>
        <?php
            if($buscaTemIngrediente == null)
            {
        ?>

            <div class="row">
                <div class ="d-flex justify-content-center align-items-center mt-5">
                    <p>Não há ingredientes inseridos na receita.</p>
                </div>

            </div>
        <?php    
        }
        else
        {
            ?>
                <table class="table">
                <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Quantidade</th>
                            <th>Medida</th>
                            <th>Excluir</th>
                        </tr>
                    </thead>
                
                <tbody>
                    <?php
                        while($row = $queryReceitaIngrediente->fetch(PDO::FETCH_ASSOC))
                        {
                            echo '<tr>';
                            echo '<td>'.$row['nome'].'</td>';
                            echo '<td>'.$row['qtd_medida'].'</td>';
                            echo '<td>'.$row['descricao'].'</td>';
                            ?>

                                <td>
                                    <form action="../Validation/validaExcluirIngredienteReceita.php" method="post">
                                        <input type="hidden" name="excluir_ing_receita" id="excluir_ing_receita" value=<?php echo '"'.$row['idIngrediente'].'"'; ?> >
                                        <button type="submit"><span>X</span></button>
                                    </form>
                                </td>

                            <?php
                            echo "</tr>";
                        }
                    ?>
                


            <?php
        }

        ?>
                </tbody>
                </table>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>

