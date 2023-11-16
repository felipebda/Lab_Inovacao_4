<?php
//NOVO -COMECAR A SESSION ---------------------------------------------------------------------------------------
session_start();

include_once '../Connection/conexao.php';

//ID USUARIO usuario
$idFunc = intval($_SESSION['idFunc']);

//Pegar informações do livro
$idLivro = intval($_POST["idLivro"]);
//var_dump($idLivro);

//PEGAR INFORMACOES DO LIVRO 

$slqLivro = "SELECT li.idLivro as idLivro,
             li.titulo_livro as titulo,
             li.isbn as isbn,
             li.editor as idEditor,
             fu.nome as nome_editor
             FROM livro li
             JOIN funcionario fu on li.editor = fu.idFunc
             WHERE idLivro = $idLivro";

$queryLivro =  $pdo->query($slqLivro);
$queryLivro->execute();

$resultadoLivro = $queryLivro->fetch(PDO::FETCH_ASSOC);
//var_dump($resultadoLivro);

//TODO - DESCOBRIR SE POSSUI RECEITA EM PUBLICACOES
$sqlBuscaTemReceita = "SELECT pu.Livro_idLivro as idLivro,
                    pu.Receita_nome as receita,
                    pu.Receita_cozinheiro as idCozinheiro,
                    fu.nome as nomeCozinheiro,
                    re.idRec as idRec
                    from publicacao pu
                    join funcionario fu on pu.Receita_cozinheiro = fu.idFunc
                    join receita re on pu.Receita_cozinheiro = re.cozinheiro
                    where Livro_idLivro = $idLivro";

$queryBuscaTemReceita = $pdo->query($sqlBuscaTemReceita);
$queryBuscaTemReceita->execute();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My CookBook - Seu acervo de receitas perto de você </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="Style/home.css">

    <style>
        .configbuttonblue{
            border:none;
            background-color:transparent;
            color:blue;
        }
    </style>
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

    <!--INFORMATION DROPBOX -->
    <div class= "container mt-3">
        <div class="row">
            <div class = col-2>
                <h3>Confirmação de Publicação</h3>
            </div>
        <hr>
        </div>
    </div>

    <div class="container">
      <div class="row justify-content-center">
        <div class=" text-center">
          <h2>Deseja publicar livro?</h2>
        </div>
      </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="card mx-auto" style="width: 38rem;">
                <img src="../Images/culinary book.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h3 class=" text-center"><?php echo $resultadoLivro["titulo"] ; ?></h3>
                    <br>
                    <p class="card-text"><b>ISBN: </b><span><?php echo $resultadoLivro["isbn"] ?></span></p>
                    <p class="card-text"><b>Editor Responsavel: </b><span><?php echo $resultadoLivro["nome_editor"] ?></span></p>
                    <p class="card-text"><b>Receitas: </b></p>

                    <ol>
                        <?php
                            while($row =$queryBuscaTemReceita->fetch(PDO::FETCH_ASSOC))
                            {
                                echo "<li>".$row["receita"]."</li>";
                            }
                        ?>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-2">
                <a href="publicaReceita1.php"><button type="button" class="btn btn-primary">Voltar a tela inicial</button></a>
            </div>
            <div class="col-2">
                <form action="livroPDF.php" method="post">
                    <input type="hidden" name="idLivro" id="idLivro" value=<?php echo $idLivro;?>>
                    <button type="submit" class="btn btn-success">
                            Publicar
                    </button>
                </form>
            </div>
            <div class="col-4"></div>

        </div>

    </div>


    
</body>
</html>