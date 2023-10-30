<?php
//Abrir seçao
session_start();

include_once "../Connection/conexao.php";

//echo "Entrou pagina 3". "<br>";
$idReceitaSession = intval($_SESSION["idReceitaCadastro"]);
//var_dump($idReceitaSession);
//echo "idReceita = ".$idReceitaSession;
//echo"<br><br>"

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
            <h3>Cadastro de Receita</h3>
            </div>
            <div class = col-8>
            </div>
            <div class = col-2>
            <h4>etapa 3/4</h4>
            </div>

            <hr>
        </div>
    </div>

    <!--Formulario de inscrição de ingredientes na receita -->
    <div class="container mt-3">
    <form action="../Validation/validaInsercaoPreparoReceita.php" method="post">
            <h3>Descrição da Receita</h3>
            <div class="row">
                <div class="col-3"></div>
                <div class="col-6">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Número de Porções</span>
                        <input type="number" class="form-control" name="porcoes" min="1" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="col-3"></div>
            </div>
            <div class="row">
            <div class="col-3"></div>
                <div class="col-6">
                    <div class="input-group">
                        <span class="input-group-text">Modo de Preparo</span>
                        <textarea class="form-control" name="preparo" style="height: 200px" aria-label="With textarea"></textarea>
                        
                    </div>
                </div>
                <div class="col-3"></div>
            </div>
            <div class="row">
                <div class="col-3"></div>
                <div class="col-6 d-flex justify-content-center align-items-center">
                    <button class="btn btn-primary w-30 py-2 mt-3" type="submit">Próxima Etapa</button>
                    <input type="hidden" name="idReceita" id="idReceita" value=<?php echo$idReceitaSession; ?>>
                </div>
                <div class="col-3"></div>

            </div>
        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>