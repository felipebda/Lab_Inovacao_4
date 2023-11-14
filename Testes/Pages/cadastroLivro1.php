<?php
//NOVO -COMECAR A SESSION ---------------------------------------------------------------------------------------
session_start();

include_once '../Connection/conexao.php';

//ID USUARIO usuario
$idFunc = intval($_SESSION['idFunc']);

$sqlEditor = "SELECT fu.nome as nome_editor, ca.descicao as nome_cargo
                       FROM funcionario fu
                       JOIN cargo ca on fu.idCargo = ca.idCargo
                       WHERE idFunc = $idFunc";
    
$queryEditor = $pdo->query($sqlEditor);
$queryEditor->execute();

$buscaEditor = $queryEditor->fetch(PDO::FETCH_ASSOC);

echo $buscaEditor['nome_editor'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My CookBook - Seu acervo de receitas perto de você </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="Style/home.css">
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
            <h3>Cadastro de Livro</h3>
            </div>
            <div class = col-8>
            </div>
            <div class = col-2>
            <h4></h4>
            </div>

            <hr>
        </div>
    </div>

    <!-- JANELA CADASTRO  -->
    <div class="container col-4">
        <main class="form-signin w-100 m-auto">
            <form action="../Validation/validaCadastroLivro1.php" method="post">
            <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72" fill="currentColor" class="bi bi-journal-plus" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M8 5.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 .5-.5z"/>
                <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
                <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
            </svg>

            <h1 class="h3 mb-3 fw-normal">Informações Iniciais do Livro</h1>

            <!--NOME DA LIVRO -->
            <div class="form-floating rounded-top">
                <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="nome_livro" required>
                <label for="floatingInput">Nome do Livro </label>
                </div>
            

            <!--CODIGO ISBN -->
            <div class="form-floating rounded-top">
                <input type="text" pattern="[0-9]{13}" maxlength="13" class="form-control"  id="floatingInput" placeholder="name@example.com" name="isbn" required>
                <label for="floatingInput">Código ISBN </label>
            </div>

            <!--EDITOR RESPONSAVEL -->
            <div class="form-floating rounded-top">
                <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="nome_cozinheiro" value = <?php echo '"'.$buscaEditor['nome_editor']. '"'; ?> readonly>
                <label for="floatingInput">Editor </label>

                <input type="hidden" id="id_editor" name="id_editor" value = <?php echo '"'.$idFunc.'"';?>>
            </div>

            <button class="btn btn-primary w-25 py-2 mt-3" type="submit">Continuar</button>


            </form>

            <a href="secaoEdit.php"><button class="btn btn-success w-25 py-2 mt-3" type="submit">Voltar</button></a>



        </main>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>