<?php
include_once "../Connection/conexao.php";
require "../Classes/Funcionario.php";

//PUXAR IMAGEM PARA DA PASTA TMP
if (isset($_FILES["imagem"]) && !empty($_FILES["imagem"])) {
  move_uploaded_file($_FILES["imagem"]["tmp_name"], "../Images/usuarios/" . $_FILES["imagem"]["name"]);
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My CookBook - Seu acervo de receitas perto de você </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="../Style/cadastro.css">
    <link rel="shortcut icon" href="../Icons/book.svg" type="image/x-icon">

</head>

<body>
    <!-- HEADER -->
    <div class="container">
      <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
      <a href="../index1.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-book me-2" viewBox="0 0 16 16">
          <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
        </svg>
          <span class="fs-4">My CookBook</span>
        </a>

        <ul class="nav nav-pills">
        <li class="nav-item"><a href="../index1.php" class="nav-link text-dark" aria-current="page">Home</a></li>
        <li class="nav-item"><a href="#" class="nav-link text-dark">Editora</a></li>
        <li class="nav-item"><a href="#" class="nav-link text-dark">Contato</a></li>
        <button type="button" class="btn btn-dark dropdown"><a href="#" class="d-block link-light text-decoration-none" data-bs-toggle="dropdown" aria-expanded="false">Acesso</a></li>
          <ul class="dropdown-menu text-small">
            <li><a  class="dropdown-item" href="../Pages/login.php">Entrar</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Cadastro</a></li>
          </ul>
        </button>
      </ul>
      </header>
    </div>
    <!--END HEADER -->  

    
    <div class="container">
    <main class="container-fluid m-0 p-0 bg-white d-flex justify-content-center align-items-center flex-column text-center bdmain">
        <section class="container-fluid m-0 p-0 text-center pt-4">
        <p class="h3 text-dark">CADASTRO DE FUNCIONÁRIO</p>
        </section>
        <section class="container-fluid m-0 p-0 text-center pt-4">
          <form action="../Validation/validaFuncionario.php" method="POST" enctype="multipart/form-data">

          <label id="rg" for="rg" style="font-size: 12px; font-weight: bold;">INFORME O RG:
              <input class="form-control text-center mt-2" type="text" name="rg" style="width: 350px;" placeholder="xxxxxxx" required>
            </label><br><br>

            <label for="nome" style="font-size: 12px; font-weight: bold;">NOME COMPLETO:
              <input type="text" name="nome" class="form-control text-center mt-2" style="width: 350px;" placeholder="Digite seu nome completo" required>
            </label><br><br> 
              
            <label for="dt_ingr" style="font-size: 12px; font-weight: bold;">DATA DE INGRESSO:
              <input type="date" name="dt_ingr" class="form-control text-center mt-2" style="width: 350px;" required>
            </label><br><br>

            
            <label for="nome" style="font-size: 12px; font-weight: bold;">INFORME SEU SALÁRIO:
              <input type="number" min="0" max="10000" step=".01" name="salario" class="form-control text-center mt-2" style="width: 350px;" placeholder="xxxx,xx" required>
            </label><br><br>

            <label for="idCargo" id="idCargo" style="font-size: 12px; font-weight: bold;">SELECIONE SEU CARGO:
              <select type="select" for="idCargo" name="idCargo" class="form-control text-center mt-2" style="width: 350px;" required>
                <option disabled selected>Selecione o cargo</option>
                <option value="2">Cozinheiro</option>
                <option value="3">Degustador</option>
                <option value="4">Editor</option>
                </select>
            </label><br><br>

            <label for="nome" style="font-size: 12px; font-weight: bold;">SE POSSUIR NOME FANTASIA, INFORME-O:
              <input type="text" name="nome_fantasia" class="form-control text-center mt-2" style="width: 350px;" placeholder="Digite seu nome fantasia" required>
            </label><br><br>


            <label for="email" id="email"  style="font-size: 12px; font-weight: bold;">E-MAIL:
              <input type="email" name="email" class="form-control text-center mt-2" style="width: 350px;" placeholder="exemple@exemple.com" required>
            </label><br><br>
            
            <label for="senha" id="senha"  style="font-size: 12px; font-weight: bold;">SENHA:
              <input type="password" name="senha" class="form-control text-center mt-2" style="width: 350px;" placeholder="Crie sua senha" required>
            </label><br><br>

            <label for="imagem" id="imagem"  style="font-size: 12px; font-weight: bold;">SELECIONE UMA IMAGEM:
              <input type="file" name="imagem" accept="image/*" class="form-control mt-2">
            </label><br><br> 
            <label for="ativo">Ativo</label>
            <input type="radio" name="ativo" id="ativo" value = "1" checked>

            <div id="btt" class="my-4">
              <button type="submit" name="cadastrar" class="btn btn-outline-dark">Cadastrar</button>
            </div>
          </form>
        </section>          

    </main>
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


    <!--BOOTSTRAP JAVASCRIPT-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>