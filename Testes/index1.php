<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My CookBook - Seu acervo de receitas perto de você </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="Style/home.css">
    <link rel="shortcut icon" href="Icons/book.svg" type="image/x-icon">

</head>
<body>
    <!-- HEADER -->
    <div class="container">
      <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
        <a href="index1.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-book me-2" viewBox="0 0 16 16">
          <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
        </svg>
          <span class="fs-4">My CookBook</span>
        </a>

        <ul class="nav nav-pills">
        <li class="nav-item"><a href="index1.php" class="nav-link text-dark" aria-current="page">Home</a></li>
        <li class="nav-item"><a href="#" class="nav-link text-dark">Editora</a></li>
        <li class="nav-item"><a href="#" class="nav-link text-dark">Contato</a></li>
        <button type="button" class="btn btn-dark dropdown"><a href="#" class="d-block link-light text-decoration-none" data-bs-toggle="dropdown" aria-expanded="false">Acesso</a></li>
          <ul class="dropdown-menu text-small">
            <li><a  class="dropdown-item" href="Pages/login.php">Entrar</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="Pages/cadastroFuncionario.php">Cadastro</a></li>
          </ul>
        </button>
      </ul>
      </header>
    </div>
    <!--END HEADER -->

    <!--HEROES -->
    <div class ="bg-secondary bg-opacity-50 " >
    <div class="container col-xxl-8 px-4 py-5">
      <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
        <!--CARROUSSEL -->
        <div class="col-10 col-sm-8 col-lg-6">
          <div id="carouselExampleCaptions" class="carousel slide">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="Images/livro_aberto_up.jpg" class="d-block w-100" alt="Biblioteca">
                <div class="carousel-caption d-none d-md-block">
                  <h5><span class="text-bg-secondary px-2 rounded-1 bg-opacity-50">Organize suas receitas</span></h5>
                  <p class="text-bg-secondary px-2 rounded-1 bg-opacity-50">Organize insumos e modo de preparo de uma maneita simples e intuitiva!</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="Images/time_up.jpg" class="d-block w-100" alt="Equipe">
                <div class="carousel-caption d-none d-md-block">
                  <h5><span class="text-bg-secondary px-2 rounded-1 bg-opacity-50">Organize seu time</span></h5>
                  <p class="text-bg-secondary px-2 rounded-1 bg-opacity-50">Administre informações dos colaboradores e organize suas produtividades e funções.</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="Images/livros_food_up.jpg" class="d-block w-100" alt="livros">
                <div class="carousel-caption d-none d-md-block">
                  <h5><span class="text-bg-secondary px-2 rounded-1 bg-opacity-50">Organize suas projetos</span></h5>
                  <p class="text-bg-secondary px-2 rounded-1 bg-opacity-50">Selecione suas receitas especificas e unifique em livros personalizados!</p>
                </div>
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
          <!-- <img src="bootstrap-themes.png" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy"> -->
        </div>
        <!--END CARROUSSEL -->
        <div class="col-lg-6">
          <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3">Organize suas receitas</h1>
          <p class="lead">A My GuideBook nasceu de uma equipe apaixonada por comida e cozinha, para facilitar a criação e organização de receitas de tanto para uso individual como para empresas produzirem seus acervos. </p>
          <div class="d-grid gap-2 d-md-flex justify-content-md-start">
            <button type="button" class="btn btn-primary btn-lg px-4 me-md-2">Primary</button>
            <button type="button" class="btn btn-outline-secondary btn-lg px-4">Default</button>
          </div>
        </div>
      </div>
    </div>
    </div>
    <!--END HEROES -->

    <!--TESTIMONY --> 
    <div class="container mt-5 text-center">
    <div class="row">
      <div class="col-lg-4 ">
        <img src="Images/felipe.jpg" class="rounded-circle" height="150" alt="pessoa">

        <h4>Felipe - CEO da My Cookbook</h4>
        <p>"Foi pela paixão em cozinhar que teve a iniciativa de tornar a publicação de receitas organizadas e eficiente para todos!"</p>
        <p><a class="btn btn-secondary" href="#">View details »</a></p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
      <img src="Images/ale.jpg" class="rounded-circle" height="150" alt="pessoa">

      <h4>Alexandra - Editora Chefe da Boca</h4>
        <p>"Pela dificuldade de organizar minhas publicações em minha editora, usar o My CookBook deixou as publicações das receitas dos colaboradores mais intuitiva e simples."</p>
        <p><a class="btn btn-secondary" href="#">View details »</a></p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
      <img src="Images/nina.jpg" class="rounded-circle" width="150px" height="150px" alt="pessoa">

        <h4>Janaina - Estudante</h4>
        <p>"Queria achar um lugar para que eu guardasse todas as minhas receitas favoritas. A My CookBook ajuda a guardar para que eu fique com as receitas a qualquer hora!"</p>
        <p><a class="btn btn-secondary" href="#">View details »</a></p>
      </div><!-- /.col-lg-4 -->
    </div>
    </div>
    <!--END TESTIMONY -->

    <!-- PARCEIROS -->
    <div class="bg-secondary bg-opacity-50">
      <div class="container py-5">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2>Parceiros</h2>
          </div>
          <div class="col-lg-3">
            <img src="Images/editoraglobo_logo.png" height="200" alt="logo da editora globo">
          </div>
          <div class="col-lg-3">
            <img src="Images/abril_logo.png" height="200" alt="logo da editora globo">
          </div>
          <div class="col-lg-3">
            <img src="Images/atica_logo.png" height="200" alt="logo da editora globo">
          </div>
          <div class="col-lg-3">
            <img src="Images/saraiva_logo.png" height="200" alt="logo da editora globo">
          </div>
        </div>
      </div>
    </div>
    <!-- END PARCEIROS -->

    <!--FOOTER -->
    <footer class="py-3 my-4" >
    <ul class="nav justify-content-center border-bottom pb-3 mb-3">
      <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Home</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Editora</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Contato</a></li>
    </ul>
    <p class="text-center text-muted">© 2023 My CookBook, Inc</p>
  </footer>

    <!--BOOTSTRAP JAVASCRIPT-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>