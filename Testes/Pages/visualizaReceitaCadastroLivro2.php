<?php
session_start();
include_once "../Connection/conexao.php";

//Pegar Informações necessárias
//$idReceita = intval($_POST["idVisualizaReceita"]);
$idReceita = intval($_POST["id_receita"]);
$nomeReceita = $_POST["nome_receita"];
$idCozinheiro = intval($_POST["id_cozinheiro"]);
//echo "idReceita: ".$idReceita."<br>";
//echo "nomeReceita: ".$nomeReceita."<br>";
//echo "idCozinheiro: ".$idCozinheiro."<br>";

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
$queryReceita->bindValue(":id", $idReceita);
$queryReceita->execute();

$resultadoReceita = $queryReceita->fetch(PDO::FETCH_ASSOC);

//$idCozinheiro = $resultadoReceita["cozinheiro"];
//$nomeReceita = $resultadoReceita["nome"];

//FAZER BUSCA SEPARADA DOS DEGUSTADORES
$idReceita = intval($resultadoReceita['idRec']);
$sqlDegustador = "SELECT re.degustador,
                         fu.nome,
                         re.dt_degustacao,
                         re.nota_degustacao
                  FROM receita re
                  JOIN funcionario fu ON re.degustador = fu.idFunc
                  WHERE re.idRec = :id";

$queryDegustador = $pdo->prepare($sqlDegustador);
$queryDegustador->bindValue(":id",$idReceita);
$queryDegustador->execute();

$resultadoDegustador = $queryDegustador->fetch(PDO::FETCH_ASSOC);
//var_dump($resultadoDegustador);

//FAZER BUSCA DE LISTA DE INGREDIENTES
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
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>My CookBook</title>
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
            <h3>Visualização de Receita</h3>
            </div>
            <div class = col-8>
            </div>
            <div class = col-2>
            <h4><!--Em branco --></h4>
            </div>

            <hr>
        </div>
    </div>
    
    <div class="container">
      <div class="row justify-content-center">
        <div class=" text-center">
          <h2><!--Em branco --></h2>
        </div>
      </div>
    </div>
    <!--Visualização das informações da receita -->
    <div class="container mt-3">
      <div class="row">
        <div class="card mx-auto" style="width: 38rem;">
          <img src=<?php echo"../Images/receitas/".$resultadoReceita['imagem'].".jpg"; ?> class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title"><?php echo $resultadoReceita["nome"];?></h5>
            <br>
            <p class="card-text"><b>Autor da receita:</b> <?php echo $resultadoReceita["nome_cozinheiro"];?> </p>
            <p class="card-text"><b>Categoria:</b> <?php echo $resultadoReceita["descricao_categ"];?> </p>
            <p class="card-text"><b>Data de criacao: </b><?php echo $resultadoReceita["dt_criacao"];?> </p>
            <p class="card-text"><b>Porções: </b><?php echo $resultadoReceita["porcoes"];?> </p>
            <p class="card-text"><b>Receita Inédita: </b><?php if($resultadoReceita["ind_inedita"] == 1){echo "Sim";}else{echo"Não.";}?></p>
            <?php
              if(!$resultadoDegustador)
              {
                ?>
                  <p class="card-text"><b>Degustador: </b>Pendente</p>
                  <p class="card-text"><b>Data degustacao: </b>Pendente</p>
                  <p class="card-text"><b>Nota: </b>Pendente</p>
                <?php
              }
              else
              {
                ?>
                <p class="card-text"><b>Degustador: </b><?php echo $resultadoDegustador['nome'];?></p>
                <p class="card-text"><b>Data degustacao: </b><?php echo $resultadoDegustador['dt_degustacao'];?></p>
                <p class="card-text"><b>Nota: </b><?php echo $resultadoDegustador['nota_degustacao'];?></p>
                <?php
              }
            ?>
            <hr>
            <p class="card-text"><b>Lista de Ingredientes</b></p>
            <ul>
              <?php
                while($row = $queryReceitaIngrediente->fetch(PDO::FETCH_ASSOC))
                {
                    echo "<li>".$row["qtd_medida"]." ".$row["descricao"]." de ". $row["nome"]."</li>";
                }
              ?>
            </ul>
            <hr>
            <p class="card-text"><b>Modo de Preparo </b>
              <br>
              <?php echo $resultadoReceita["modo_preparo"];?>
            </p>
          </div>
          <br>
          <ul class="list-group list-group-flush">
          <a class="btn btn-primary" href="cadastroLivro2.php" role="button">Voltar </a>
          </ul>
        </div>
      </div>
    </div>


  <!--FOOTER -->
  <footer class="py-3 my-4" >
    <ul class="nav justify-content-center border-bottom pb-3 mb-3">
      <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Home</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Editora</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Contato</a></li>
    </ul>
    <p class="text-center text-muted">© 2023 My CookBook, Inc</p>
  </footer>
  <!--END FOOTER -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>