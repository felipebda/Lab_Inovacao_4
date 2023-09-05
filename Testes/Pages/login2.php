<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My CookBook - Seu acervo de receitas perto de você </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="../Style/login.css">
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
            <li><a  class="dropdown-item" href="#">Entrar</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="../Pages/cadastroFuncionario.php">Cadastro</a></li>
          </ul>
        </button>
      </ul>
    </header>
  </div>
  <!--END HEADER --> 
    
    <!-- LOGIN WINDOW  -->
    <div class="container col-4">
        <main class="form-signin w-100 m-auto">
            <form action="conexaoLogin.php" method="post">
              <div class="container col-6 pt-4 pb-4" style="text-align:center">
              <svg xmlns="http://www.w3.org/2000/svg" width="72" height="57" fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
              <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
              </svg> 
              <h1 class="h3 mb-3 fw-normal">Acesso a conta</h1>
              </div>
                <div class="form-floating rounded-top">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
                <label for="floatingInput">Email </label>
                </div>

                <div class="form-floating mt-2">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="senha">
                <label for="floatingPassword">Senha</label>
                </div>
                <section>
                <sub><a class="text-decoration-none" href="#">Esqueci minha senha</a></sub>
                </section><br>

                <div class="text-center mt-3">
                  <input type="hidden" name="tipo_acesso" value="login">
                 
                  <button class="btn btn-dark w-25 py-2 mt-1 mb-5 text-center" type="submit">Acessar</button>
                </div>

                <section class="text-center mt-2">         
                <p class="mb-0 pb-0">Não tem conta?</p>
                  <sub class="mt-0 pt-0"><a class="text-decoration-none" href="#">Cadastre-se aqui!</a></sub>
                </section><br>

                <!-- CHECKBOX DE LEMBRAR LOGIN ----- DESCARTAR
                <div class="form-check text-start my-3">
                <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Lembrar log-in
                </label>
                </div> -->
            </form>
        </main>
    </div>
  <!-- END LOGIN WINDOW -->

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