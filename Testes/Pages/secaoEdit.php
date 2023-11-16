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

/*//CONEXAO COM BANCO DE DADOS
try
{
  $pdo = new PDO("mysql:dbname=".$dbname.";host=".$local."",$user,$password);
}
catch(PDOException $e)
{
   echo "Erro ao conectar com banco de dados: ".$e->getMessage();
}
*/


?>
<!DOCTYPE html>
<html lang="pt-br">
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
          <?php echo "Bem vindo, ".$buscaEditor['nome_editor'] ?>
        </div>
        <div class= "col-7" ></div>
        <div class= "col-2"> <?php echo "Cargo: Editor"; ?></div>
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
      
      

      <!--Criar Livro -->
      <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-journal-plus" viewBox="0 0 16 16">
      <path fill-rule="evenodd" d="M8 5.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 .5-.5z"/>
      <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
      <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
      </svg>
      <div class="btn-group">
      <a href="cadastroLivro1.php"><button class="btn btn-primary" type="submit">Criar Livro</button></a>
      </div>
      


      <!-- Editar Receitas -->  <!--alterar texto de receitas ja publicadas-->
      <?xml version="1.0" encoding="utf-8"?><!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
      <svg width="35px" height="35px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M21.0039 12C21.0039 16.9706 16.9745 21 12.0039 21C9.9675 21 3.00463 21 3.00463 21C3.00463 21 4.56382 17.2561 3.93982 16.0008C3.34076 14.7956 3.00391 13.4372 3.00391 12C3.00391 7.02944 7.03334 3 12.0039 3C16.9745 3 21.0039 7.02944 21.0039 12Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
      <path d="M8.40499 13.975C8.44031 13.7985 8.45796 13.7102 8.49025 13.6279C8.51891 13.5548 8.55608 13.4853 8.60098 13.421C8.65157 13.3484 8.71523 13.2848 8.84255 13.1574L13 9C13.5523 8.44772 14.4477 8.44772 15 9C15.5523 9.55228 15.5523 10.4477 15 11L10.8426 15.1574C10.7152 15.2848 10.6516 15.3484 10.579 15.399C10.5147 15.4439 10.4452 15.4811 10.3721 15.5097C10.2898 15.542 10.2015 15.5597 10.025 15.595L8 16L8.40499 13.975Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
      </svg>
      <div class="btn-group">
      <button class="btn btn-primary" type="submit">Editar receitas</button> 
      </div>

      <!--Receitas publicadas-->  <!-- consulta de receitas-->
      <?xml version="1.0" encoding="utf-8"?><!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
      <svg width="35px" height="35px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
      <rect width="24" height="24" fill="white"/>
      <path d="M12 6.90909C10.8999 5.50893 9.20406 4.10877 5.00119 4.00602C4.72513 3.99928 4.5 4.22351 4.5 4.49965C4.5 6.54813 4.5 14.3034 4.5 16.597C4.5 16.8731 4.72515 17.09 5.00114 17.099C9.20405 17.2364 10.8999 19.0998 12 20.5M12 6.90909C13.1001 5.50893 14.7959 4.10877 18.9988 4.00602C19.2749 3.99928 19.5 4.21847 19.5 4.49461C19.5 6.78447 19.5 14.3064 19.5 16.5963C19.5 16.8724 19.2749 17.09 18.9989 17.099C14.796 17.2364 13.1001 19.0998 12 20.5M12 6.90909L12 20.5" stroke="#000000" stroke-linejoin="round"/>
      <path d="M19.2353 6H21.5C21.7761 6 22 6.22386 22 6.5V19.539C22 19.9436 21.5233 20.2124 21.1535 20.0481C20.3584 19.6948 19.0315 19.2632 17.2941 19.2632C14.3529 19.2632 12 21 12 21C12 21 9.64706 19.2632 6.70588 19.2632C4.96845 19.2632 3.64156 19.6948 2.84647 20.0481C2.47668 20.2124 2 19.9436 2 19.539V6.5C2 6.22386 2.22386 6 2.5 6H4.76471" stroke="#000000" stroke-linejoin="round"/>
      </svg>  
      <div class="btn-group">
      <button class="btn btn-primary" type="submit"><a href="livro.php" class="nav-link active">Livro</a> </button>
      </div>

      
       <!--Publicar Receitas -->  <!-- ja publicar as receitas-->
       <?xml version="1.0" encoding="utf-8"?><!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
      <svg width="35px" height="35px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M8 12.5L10.5 15L16 9M7.2 20H16.8C17.9201 20 18.4802 20 18.908 19.782C19.2843 19.5903 19.5903 19.2843 19.782 18.908C20 18.4802 20 17.9201 20 16.8V7.2C20 6.0799 20 5.51984 19.782 5.09202C19.5903 4.71569 19.2843 4.40973 18.908 4.21799C18.4802 4 17.9201 4 16.8 4H7.2C6.0799 4 5.51984 4 5.09202 4.21799C4.71569 4.40973 4.40973 4.71569 4.21799 5.09202C4 5.51984 4 6.07989 4 7.2V16.8C4 17.9201 4 18.4802 4.21799 18.908C4.40973 19.2843 4.71569 19.5903 5.09202 19.782C5.51984 20 6.07989 20 7.2 20Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
      </svg>
      <div class="btn-group">
      <a href="publicaReceita1.php"><button class="btn btn-primary" type="submit">Publicar receitas</button></div></a>


     <!--Categorias--> <!--Consultar e criar as categorias-->  
     <?xml version="1.0" encoding="utf-8"?><!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
      <svg width="35px" height="35px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M8 12.5L10.5 15L16 9M7.2 20H16.8C17.9201 20 18.4802 20 18.908 19.782C19.2843 19.5903 19.5903 19.2843 19.782 18.908C20 18.4802 20 17.9201 20 16.8V7.2C20 6.0799 20 5.51984 19.782 5.09202C19.5903 4.71569 19.2843 4.40973 18.908 4.21799C18.4802 4 17.9201 4 16.8 4H7.2C6.0799 4 5.51984 4 5.09202 4.21799C4.71569 4.40973 4.40973 4.71569 4.21799 5.09202C4 5.51984 4 6.07989 4 7.2V16.8C4 17.9201 4 18.4802 4.21799 18.908C4.40973 19.2843 4.71569 19.5903 5.09202 19.782C5.51984 20 6.07989 20 7.2 20Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
      </svg>
      <div class="btn-group">
      <button class="btn btn-primary" type="submit"><a href="consultaCategoria.php" class="nav-link active">Categorias</a> </button></div>

      <!--<li class="nav-item"><a href="../index1.php" class="nav-link active" aria-current="page">Home</a></li>-->
    </div>
    <!-- END INFORMATION DROPBOX -->






    <!--BOOTSTRAP JAVASCRIPT-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>
 