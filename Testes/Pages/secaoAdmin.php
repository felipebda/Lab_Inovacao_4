<?php
  //Variaveis de conexao
  $dbname = "livro_de_receita";
  $local = "localhost";
  $user = "root";
  $password = "123456";

  //Variaveis usuario
  $idFunc = 0;
  $rg = "";
  $nome = "";
  $dt_ingr = "";
  $salario = 0;
  $idcargo = 0;
  $nome_fantasia = "";
  $email = "";
  $senha = "";

  $nome_cargo = "";

  //CONEXAO COM BANCO DE DADOS
  try
  {
      $pdo = new PDO("mysql:dbname=".$dbname.";host=".$local."",$user,$password);
  }
  catch(PDOException $e)
  {
      echo "Erro ao conectar com banco de dados: ".$e->getMessage();
  }

  //ACESSO VIA COOKIE
  if(isset($_COOKIE["u_email"]) && !isset($_POST["tipo_acesso"]))
  {
    $id_func = intval($_COOKIE['u_idcargo']);

    $q_cookie = $pdo->prepare("SELECT * FROM funcionario WHERE idCargo = :id");
    $q_cookie->bindValue(":id", $id_func);
    $q_cookie->execute();

    $lista_cookie = $q_cookie->fetchAll(PDO::FETCH_ASSOC);
    
    $idFunc = $lista_cookie[0]["idFunc"];
    $rg = $lista_cookie[0]["rg"];
    $nome = $lista_cookie[0]["nome"];
    $dt_ingr = $lista_cookie[0]["dt_ingr"];
    $salario = $lista_cookie[0]["salario"];
    $idcargo = $lista_cookie[0]["idCargo"];
    $nome_fantasia = $lista_cookie[0]["nome_fantasia"];
    $email = $lista_cookie[0]["email"];
    $senha = $lista_cookie[0]["senha"];
  }

  
  
 






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

    <!-- INTRODUCTION -->
    <div class="container">
      <div class="row">
        <div class= "col-3">
          <?php echo "Bem vindo, ". $nome; ?>
        </div>
        <div class= "col-7" ></div>
        <div class= "col-2"> <?php echo "Cargo: Administrador"; ?></div>
      </div>
    </div>
    <!--END INTRODUCTION -->

    <!--INFORMATION DROPBOX -->
    <div class= "container mt-3">
      <div class="row">
        <div class = col-2>
          <h3>INFORMAÇÕES</h3>
        </div>
        <hr>
      </div>
      <!-- Example single danger button -->
      <div class="btn-group">
        <!-- Funcionarios -->
        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
        </svg>
        <button type="button" class="btn btn-primary dropdown-toggle mx-2" data-bs-toggle="dropdown" aria-expanded="false">
          Funcionarios
        </button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="#">Adicionar Funcionario</a></li>
          <li><a class="dropdown-item" href="#">Consultar Funcionario</a></li>
          <li><a class="dropdown-item" href="#">Something else here</a></li>
          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item bg-danger text-light" href="#">Excluir Funcionario</a></li>
        </ul>
      </div>

      <!--Cargo--> 
      <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-clipboard2" viewBox="0 0 16 16">
      <path d="M3.5 2a.5.5 0 0 0-.5.5v12a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5v-12a.5.5 0 0 0-.5-.5H12a.5.5 0 0 1 0-1h.5A1.5 1.5 0 0 1 14 2.5v12a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 14.5v-12A1.5 1.5 0 0 1 3.5 1H4a.5.5 0 0 1 0 1h-.5Z"/>
      <path d="M10 .5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5.5.5 0 0 1-.5.5.5.5 0 0 0-.5.5V2a.5.5 0 0 0 .5.5h5A.5.5 0 0 0 11 2v-.5a.5.5 0 0 0-.5-.5.5.5 0 0 1-.5-.5Z"/>
      </svg>
      <div class="btn-group">
        <button type="button" class="btn btn-primary dropdown-toggle mx-2" data-bs-toggle="dropdown" aria-expanded="false">
          Cargos
        </button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="#">Adicionar Cargo</a></li>
          <li><a class="dropdown-item" href="#">Consultar Cargo</a></li>
          <li><a class="dropdown-item" href="#">Something else here</a></li>
          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item bg-danger text-light" href="#">Excluir cargo</a></li>
        </ul>
      </div>

      <!--INSUMO -->
      <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-apple" viewBox="0 0 16 16">
      <path d="M11.182.008C11.148-.03 9.923.023 8.857 1.18c-1.066 1.156-.902 2.482-.878 2.516.024.034 1.52.087 2.475-1.258.955-1.345.762-2.391.728-2.43Zm3.314 11.733c-.048-.096-2.325-1.234-2.113-3.422.212-2.189 1.675-2.789 1.698-2.854.023-.065-.597-.79-1.254-1.157a3.692 3.692 0 0 0-1.563-.434c-.108-.003-.483-.095-1.254.116-.508.139-1.653.589-1.968.607-.316.018-1.256-.522-2.267-.665-.647-.125-1.333.131-1.824.328-.49.196-1.422.754-2.074 2.237-.652 1.482-.311 3.83-.067 4.56.244.729.625 1.924 1.273 2.796.576.984 1.34 1.667 1.659 1.899.319.232 1.219.386 1.843.067.502-.308 1.408-.485 1.766-.472.357.013 1.061.154 1.782.539.571.197 1.111.115 1.652-.105.541-.221 1.324-1.059 2.238-2.758.347-.79.505-1.217.473-1.282Z"/>
      <path d="M11.182.008C11.148-.03 9.923.023 8.857 1.18c-1.066 1.156-.902 2.482-.878 2.516.024.034 1.52.087 2.475-1.258.955-1.345.762-2.391.728-2.43Zm3.314 11.733c-.048-.096-2.325-1.234-2.113-3.422.212-2.189 1.675-2.789 1.698-2.854.023-.065-.597-.79-1.254-1.157a3.692 3.692 0 0 0-1.563-.434c-.108-.003-.483-.095-1.254.116-.508.139-1.653.589-1.968.607-.316.018-1.256-.522-2.267-.665-.647-.125-1.333.131-1.824.328-.49.196-1.422.754-2.074 2.237-.652 1.482-.311 3.83-.067 4.56.244.729.625 1.924 1.273 2.796.576.984 1.34 1.667 1.659 1.899.319.232 1.219.386 1.843.067.502-.308 1.408-.485 1.766-.472.357.013 1.061.154 1.782.539.571.197 1.111.115 1.652-.105.541-.221 1.324-1.059 2.238-2.758.347-.79.505-1.217.473-1.282Z"/>
      </svg>
      <div class="btn-group">
        <button type="button" class="btn btn-primary dropdown-toggle mx-2" data-bs-toggle="dropdown" aria-expanded="false">
          Ingredientes
        </button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="#">Adicionar Ingredientes</a></li>
          <li><a class="dropdown-item" href="#">Consultar Ingredientes</a></li>
          <li><a class="dropdown-item" href="#">Something else here</a></li>
          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item bg-danger text-light" href="#">Excluir Ingredientes</a></li>
        </ul>
      </div>

    </div>
    <!-- END INFORMATION DROPBOX -->






    <!--BOOTSTRAP JAVASCRIPT-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>