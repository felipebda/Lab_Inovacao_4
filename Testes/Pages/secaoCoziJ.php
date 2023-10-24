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
    <link rel="stylesheet" href="../Style/home.css">
    <link rel="shortcut icon" href="../Icons/book.svg" type="image/x-icon">
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
          <li class="nav-item"><a href="index1.php" class="nav-link text-dark" aria-current="page">Home</a></li>
          <li class="nav-item"><a href="#" class="nav-link text-dark">Editora</a></li>
          <li class="nav-item"><a href="#" class="nav-link text-dark">Contato</a></li>
          <li class="nav-item"><a href="Pages/login.php" class="nav-link text-dark active">Acesso</a></li>
        </ul>
      </header>
    </div>
    <!--END HEADER -->  

    
    <div class="container">
      <div class="row">
        <div class= "col-3">
          <?php echo "Bem vindo, ". $nome; ?>
        </div>
        <div class= "col-7" ></div>
        <div class= "col-2"> <?php echo "Perfil: <b>COZINHEIRO</b>"; ?></div>
      </div>
    </div>
    <section class="conteiner-fluid m-0 my-4 pt-5 pb-5 d-flex justify-content-center">
      <div class="container m-0 p-0 pt-5 pb-5 d-flex justify-content-space">
        <!--Inverti o A pelo button e funcionou-->
        <a href="cadastroReceita1.php" class="text-decoration-none text-dark"><img src="../Icons/adicionar_receita.png" alt="" width="30%">
          <button id="cat" class="container col-3 p-2 pt-4 text-center">
          
            <h6 class="pt-3">Adicionar Receita</p>
          </button>
          </a>
        <button id="cat" class="container col-3 p-2 pt-4 text-center">
          <a href="#" class="text-decoration-none text-dark"><img src="../Icons/modificar_receita.png" alt="" width="30%">
            <h6 class="pt-3">Modificar Receita</p></a>
        </button>
        <button id="cat" class="container col-3 p-2 pt-4 text-center">
          <a href="#" class="text-decoration-none text-dark"><img src="../Icons/pesquisar_receita.png" alt="" width="30%">
            <h6 class="pt-3">Pesquisar Receita</p></a>
        </button>    
      </div>
    </section>


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
    <!--BOOTSTRAP JAVASCRIPT-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>

